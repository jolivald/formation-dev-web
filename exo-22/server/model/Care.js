const mongoose = require('mongoose');
const ObjectId = mongoose.Schema.Types.ObjectId;

const CareSchema = new mongoose.Schema({
  date: Date,
  description: String,
  animal: ObjectId,   // care has one animal
  employee: ObjectId, // care has one user
  createdAt: Date,
  createdBy: String,
  updatedAt: { type: Date, default: Date.now },
  updatedBy: String
});

const Care = mongoose.model('Care', CareSchema);

module.exports = Care;
module.exports.CareSchema = CareSchema;
