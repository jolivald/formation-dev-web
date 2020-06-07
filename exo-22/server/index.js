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
const Message = require('./model/Message');

mongoose.connect('mongodb://mongo:27017', {
  useNewUrlParser: true,
  useUnifiedTopology: true
});

const db = mongoose.connection;
const app = express();
const port = 8081;
const clientPath = path.join(__dirname, '../client/build');

const isAuthenticated = (req, res, next) => {
  if (req.user){ next(); }
  else { res.json({
    error: 'Vous n\'avez pas la permission d\'effectuer cette action'
  }) }
};

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
    Message.find({ receiver: req.user._id, viewed: false }, (err, messages) => {
      const userDetail = {
        username: req.user.username,
        accreditation: req.user.accreditation,
        messageCount: messages.length
      };
      //res.cookie('user', userDetail);
      res.json({
        success: true,
        payload: userDetail
      });
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
  isAuthenticated,
  (req, res) => {
    const { name, age, race, owner, type } = req.body;
    User.findOne({ username: owner }, (err, user) => {
      if (err){
        return res.json({ error: err.message });
      }
      user.animals.push({
        name, race, age, type,
        owner: user._id,
        createdAt: Date.now(),
        createdBy: req.user.username
      });
      /*const animal = new Animal({
        name, race, age, type,
        owner: user._id,
        createdAt: Date.now(),
        createdBy: req.user.username
      });
      animal*/
      user.save()
        .catch(err => res.json({
          error: err.message 
        }))
        .then(() => res.json({
          success: 'Animal enregistré avec succès'
        }));
    });
    
  }
);

app.get('/animals', isAuthenticated, (req, res) => {
  const animals = req.user.animals.map(animal => animal.toJSON());
  res.json(animals);
});

app.get(
  '/users',
  isAuthenticated,
  (req, res) => {
    User.find({}, (err, users) => {
      if (err){
        res.json({ error: err.message });
      }
      else {
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

app.post(
  '/message',
  isAuthenticated,
  (req, res) => {
    const { _id, username } = req.user;
    const { title, content, receiver } = req.body;
    User.findOne({ username: receiver }, (err, user) => {
      if (err){
        return res.json({ error: res.message });
      }
      const message = new Message({
        title, content,
        viewed: false,
        sender: _id,
        receiver: user._id,
        createdAt: Date.now(),
        createdBy: username 
      });
      message.save()
        .catch(err => res.json({
          error: err.message 
        }))
        .then(() => res.json({
          success: 'Message envoyé avec succès'
        }));
    });
  }
);

app.get('/messages', isAuthenticated, (req, res) => {
  Message.find({ receiver: req.user._id }, (err, messages) => {
    if (err){
      return res.json({ error: res.message });
    }
    const data = messages.map(message => message.toJSON());
    res.json({
      success: true,
      payload: data
    });
  });
});

app.post('/read', isAuthenticated, (req, res) => {
  Message.findOne({ _id: req.body.id }, (err, message) => {
    if (err){
      return res.json({ error: err.message });
    }
    message.viewed = true;
    message.save()
    .catch(err => res.json({
      error: err.message 
    }))
    .then(() => res.json({
      success: true
    }));
  })
});

// passport config
passport.use(User.createStrategy());
//passport.use(new LocalStrategy(User.authenticate()));
passport.serializeUser(User.serializeUser());
passport.deserializeUser(User.deserializeUser());

db.once('open', () => {
  app.listen(port, () => console.log('Express server: http://localhost:' + port));
});


