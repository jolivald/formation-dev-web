const mongoose = require('mongoose');
const { AnimalSchema } = require('./Animal');
const { MessageSchema } = require('./Message');
const { AppointmentSchema } = require('./Appointment');
const passportLocalMongoose = require('passport-local-mongoose');

const UserSchema = new mongoose.Schema({
  username: String,
  password: String,
  email: String,
  fistName: String,
  lastName: String,
  phone: Number,
  accreditation: Number,
  animals: [AnimalSchema],           // user has many animals
  messages: [MessageSchema],         // user has many messages
  appointments: [AppointmentSchema], // user has many appointments
  createdAt: Date,
  createdBy: String,
  updatedAt: Date,
  updatedBy: String
});

UserSchema.plugin(passportLocalMongoose);

const User = mongoose.model('User', UserSchema);

module.exports = User;
module.exports.UserSchema = UserSchema;
