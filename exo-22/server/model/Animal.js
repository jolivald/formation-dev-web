const mongoose = require('mongoose');
const ObjectId = mongoose.Schema.Types.ObjectId;
const { CareSchema } = require('./Care');

const AnimalSchema = new mongoose.Schema({
  name: String,
  race: String,
  age: Number,
  type: String,
  owner: ObjectId,     // animal has one owner
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

