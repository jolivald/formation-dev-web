const mongoose = require('mongoose');
const ObjectId = mongoose.Schema.Types.ObjectId;

const MessageSchema = new mongoose.Schema({
  title: String,
  content: String,
  viewed: Boolean,
  sender: ObjectId,   // message has one sender
  receiver: ObjectId, // message has one receiver
  createdAt: Date,
  createdBy: String,
  updatedAt: Date,
  updatedBy: String
});

const Message = mongoose.model('Message', MessageSchema);

module.exports = Message;
module.exports.MessageSchema = MessageSchema;