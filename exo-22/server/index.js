const path = require('path');
const express = require('express');
const cookieParser = require('cookie-parser');
const session = require('express-session');
const flash = require('connect-flash');
const mongoose = require('mongoose');
const passport = require('passport');
const LocalStrategy = require('passport-local').Strategy;
const User = require('./model/User');
const Animal = require('./model/Animal');

mongoose.connect('mongodb://mongo:27017', {
  useNewUrlParser: true,
  useUnifiedTopology: true
});

const db = mongoose.connection;
const app = express();
const port = 8081;
const clientPath = path.join(__dirname, '../client/build');

app.use(express.urlencoded({ extended: false }));
app.use(express.json());
app.use(cookieParser());
app.use(session({ secret: 'petnet secret cookie flavor' }));
app.use(flash());
app.use(passport.initialize());
app.use(passport.session());

// serve static react app
app.use(express.static(clientPath));
app.get('/', (req, res) => {
  res.cookie('user', {
    username: req.cookie.username || 'anonyme',
    accreditation: req.cookie.accreditation || 0
  });
  res.sendFile(path.join(clientPath, 'index.html'));
});

// json api
app.post(
  '/login',
  passport.authenticate('local', {
    failureFlash: true
  }),
  (req, res) => {
    const userDetail = {
      username: req.user.username,
      accreditation: req.user.accreditation
    };
    //res.cookie('user', userDetail);
    res.json({
      success: true,
      payload: userDetail
    });
  }
);

app.get('/logout', (req, res) => {
  req.logout();
  res.redirect('/');
});

app.post('/register', (req, res, next) => {
  const { username, email, password1, password2 } = req.body;
  if (password1 !== password2){
    return res.json({
      error: 'Erreur de confirmation du mot de passe'
    });
  }
  // TODO more validation
  const newUser = new User({
    username,
    email,
    password: password1,
    accreditation: 1,
    createdAt: Date.now(),
    createdBy: username
  });
  User.register(newUser, password1)
    .then(user => user.save())
    .catch(err => res.json({
      error: err.message
    }))
    .then(() => {
      const userDetail = {
        username: newUser.username,
        accreditation: newUser.accreditation
      };
      //res.cookie('user', userDetail);
      res.json({
        success: 'Utilisateur enregistré avec succès',
        payload: userDetail
      });
      return true;
    });
});

app.post(
  '/animal',
  passport.authenticate('local', {
    failureFlash: true
  }),
  (req, res) => {
    const { name, age, race } = req.body;
    const animal = new Animal({
      name, race, age
    });
    animal.save()
      .catch(err => res.json({
        error: err.message
      }))
      .then(() => res.json({
        success: 'Animal enregistré avec succès'
      }));
  }
);

app.get(
  '/users',
  passport.authenticate('local', {
    failureFlash: true
  }),
  (req, res) => {
    User.find({}, (err, users) => {
      if (err){
        res.json({ error: err.message });
      } else {
        res.json({
          success: true,
          payload: users.map(user => ({
            id: user._id,
            username: user.username
          }))
        });
      }
    });

  }
);

// passport config
passport.use(User.createStrategy());
//passport.use(new LocalStrategy(User.authenticate()));
passport.serializeUser(User.serializeUser());
passport.deserializeUser(User.deserializeUser());

db.once('open', () => {
  app.listen(port, () => console.log('Express server: http://localhost:' + port));
});


