const mongoose = require('mongoose');
const ObjectId = mongoose.Schema.Types.ObjectId;

const AppointmentSchema = new mongoose.Schema({
  date: Date,
  sender: ObjectId, // appointment has one sender
  animal: ObjectId, // appointment has one animal
  createdAt: Date,
  createdBy: String,
  updatedAt: Date,
  updatedBy: String
});

const Appointment = mongoose.model('Appointment', AppointmentSchema);

module.exports = Appointment;
module.exports.AppointmentSchema = AppointmentSchema;
