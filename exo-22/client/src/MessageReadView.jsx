import React, { useContext, useEffect } from 'react';
import { AppContext } from './App';
import { Card, CardContent, Typography, CardActions, Button } from '@material-ui/core';
import fetch from 'cross-fetch';

const MessageReadView = ({ message }) => {
  const dispatch = useContext(AppContext);
  const handleClick = () => {
    dispatch({
      type: 'SET_VIEW',
      payload: { view: 'message', props: {} }
    });
  };
  useEffect(() => {
    fetch('/read', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json' 
      },
      body: JSON.stringify({ id: message._id })
    })
      .then(() => dispatch({ type: 'DECREMENT_MESSAGE_COUNT' }));
  }, []);
  return (<>
    <Typography variant="h6">Consulter un message</Typography>
    <Card>
      <CardContent>
        <Typography paragraph={true}>Titre: {message.title}</Typography>
        <Typography paragraph={true}>Message:<br/>{message.content}</Typography>
        <Typography>Envoyé par: {message.createdBy} le: {message.createdAt}</Typography>
      </CardContent>
      <CardActions>
        <Button
          onClick={handleClick}
          variant="contained"
          color="primary"
        >
          Retour
        </Button>
      </CardActions>
    </Card>
  </>);
};

export default MessageReadView;
