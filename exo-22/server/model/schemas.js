import { Schema, ObjectId } from 'mongoose';

var userSchema = new Schema({
  email: String,
  password: String,
  fistName: String,
  lastName: String,
  phone: Number,
  accreditation: Number,
  createdAt: Date,
  createdBy: String,
  updatedAt: Date,
  updatedBy: String
});

var animalSchema = new Schema({
  name: String,
  race: String,
  age: Number,
  geolocation: Boolean,
  createdAt: Date,
  createdBy: String,
  updatedAt: Date,
  updatedBy: String
});

var messageSchema = new Schema({
  title: String,
  content: String,
  viewed: Boolean,
  sender: ObjectId,
  receiver: ObjectId,
  createdAt: Date,
  createdBy: String,
  updatedAt: Date,
  updatedBy: String
});


var appointmentSchema = new Schema({
  date: Date,
  sender: ObjectId,
  createdAt: Date,
  createdBy: String,
  updatedAt: Date,
  updatedBy: String
});

var careSchema = new Schema({
  date: Date,
  animal: ObjectId,
  employee: ObjectId,
  description: String,
  createdAt: Date,
  createdBy: String,
  updatedAt: Date,
  updatedBy: String
});
