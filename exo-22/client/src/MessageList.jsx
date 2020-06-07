import React, { useState, useEffect, useContext } from 'react';
import { AppContext } from './App';
import fetch from 'cross-fetch';
import { List, ListItem, ListItemText, ListItemAvatar, Avatar, ListItemSecondaryAction, IconButton } from '@material-ui/core';
import MailIcon from '@material-ui/icons/Mail';
import SearchIcon from '@material-ui/icons/Search';

const MessageList = () => {
  const dispatch = useContext(AppContext);
  const [messages, setMessages] = useState([]);
  const handleClick = (message) => {
    dispatch({
      type: 'SET_VIEW',
      payload: { view: 'read', props: { message } }
    });
  };
  useEffect(() => {
    fetch('/messages', { method: 'GET' })
      .then(response => response.json())
      .then(result => {
        setMessages(result.payload)
      });
  }, []);
  if (messages.length === 0){
    return (<p>Aucun message</p>);
  }
  return (
    <List>
      {messages.map(message => {
        return (
          <ListItem key={message._id} onClick={() => handleClick(message)}>
            <ListItemAvatar>
              <Avatar>
                <MailIcon />
              </Avatar>
            </ListItemAvatar>
            {message.viewed
              ? (<ListItemText primary={message.title} secondary={message.createdBy} />)
              : (<ListItemText
                primary={message.title}
                secondary={message.createdBy}
                primaryTypographyProps={{ style: { fontWeight: 'bold' }}}
              />)
            }
            <ListItemSecondaryAction>
              <IconButton onClick={() => handleClick(message)}>
                <SearchIcon />
              </IconButton>
            </ListItemSecondaryAction>
            
          </ListItem>
        );
      })}
    </List>
  );
};

export default MessageList;
