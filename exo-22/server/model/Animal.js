const mongoose = require('mongoose');
const { CareSchema } = require('./Care');

const AnimalSchema = new mongoose.Schema({
  name: String,
  race: String,
  age: Number,
  cares: [CareSchema], // animal has many cares
  geolocation: Boolean,
  createdAt: Date,
  createdBy: String,
  updatedAt: { type: Date, default: Date.now },
  updatedBy: String
});

const Animal = mongoose.model('Animal', AnimalSchema);

module.exports = Animal;
module.exports.AnimalSchema = AnimalSchema;

