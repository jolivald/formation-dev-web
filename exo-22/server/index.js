const path = require('path');
const express = require('express');
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

app.use(express.urlencoded({ extended: false }))
app.use(express.json())
app.use(session({ secret: 'petnet secret cookie flavor' }));
app.use(passport.initialize());
app.use(passport.session());

// serve static react app
app.use(express.static(clientPath));
app.get('/', (req, res) => {
  res.sendFile(path.join(clientPath, 'index.html'));
});

// passport config
passport.use(new LocalStrategy(User.authenticate()));
passport.serializeUser(User.serializeUser());
passport.deserializeUser(User.deserializeUser());

db.once('open', () => {
  app.listen(port, () => console.log('Express server: http://localhost:' + port));
});


