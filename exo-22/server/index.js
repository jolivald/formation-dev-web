const path = require('path');
const express = require('express');
const mongoose = require('mongoose');

mongoose.connect('mongodb://mongo:27017', {
  useNewUrlParser: true,
  useUnifiedTopology: true
});

const db = mongoose.connection;
const app = express();
const port = 8081;

const clientPath = path.join(__dirname, '../client/build');
app.use(express.static(clientPath));

app.get('/', (req, res) => {
  res.sendFile(path.join(clientPath, 'index.html'));
});

db.once('open', () => {
  app.listen(port, () => console.log('Express server: http://localhost:' + port));
});


