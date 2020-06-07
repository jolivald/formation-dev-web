import React, { useContext } from 'react';
import { AppContext } from './App';

const MessageView = () => {
  const dispatch = useContext(AppContext);
  return (
    <div>messages...</div>
  );
};

export default MessageView;
