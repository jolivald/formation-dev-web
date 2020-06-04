const path = require('path');
const express = require('express');
const cookieParser = require('cookie-parser');
const session = require('express-session');
const mongoose = require('mongoose');
const passport = require('passport');
const LocalStrategy = require('passport-local').Strategy;
const User = require('./model/User');

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
app.use(passport.initialize());
app.use(passport.session());

// serve static react app
app.use(express.static(clientPath));
app.get('/', (req, res) => {
  console.log('cookies', req.cookies); 
  res.sendFile(path.join(clientPath, 'index.html'));
});

// json api
app.post(
  '/login',
  passport.authenticate('local'),
  (req, res) => {
    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify({
      success: true,
      payload: {
        username: req.user.username,
        accreditation: req.user.accreditation
      }
    }));
  }
);

app.get('/logout', (req, res) => {
  console.log('logout', req.user.username);
});

app.post('/register', (req, res, next) => {
  const { username, email, password1, password2 } = req.body;
  res.setHeader('Content-Type', 'application/json');
  if (password1 !== password2){
    return res.end(JSON.stringify({
      error: 'Erreur de confirmation du mot de passe'
    }));
  }
  const newUser = new User({
    username,
    email,
    password: password1,
    accreditation: 0,
    createdAt: Date.now(),
    createdBy: 'API server'
  });
  User.register(newUser, password1, (err) => {
    if (err) {
      return res.end(JSON.stringify({
        error: 'Un problème est survenu lors de l\'inscription'
      }));
    }
    res.end(JSON.stringify({
      success: 'Utilisateur enregistré avec succès'
    }));
  });
  newUser.save()
    .then(user => res.end(JSON.stringify({
        success: 'Utilisateur enregistré avec succès'
    })))
    .catch(err => res.end(JSON.stringify({
      error: 'Un problème est survenu lors de l\'inscription'
    })));
});

// passport config
passport.use(new LocalStrategy(User.authenticate()));
passport.serializeUser(User.serializeUser());
passport.deserializeUser(User.deserializeUser());

db.once('open', () => {
  app.listen(port, () => console.log('Express server: http://localhost:' + port));
});


