import React, { useRef } from 'react';
import { FormGroup, TextField, Button } from '@material-ui/core';
import UserSelect from './UserSelect';
import fetch from 'cross-fetch';

const MessageForm = ({ accreditation }) => {
  const formRef = useRef(null);
  const handleSubmit = () => {
    const ins = document.querySelectorAll('input, textarea', formRef);
    const data = Array.from(ins).reduce((acc, el) => {
      acc[el.name] = el.value;
      return acc;
    }, {});
    console.log('POST msg', data);
    fetch('/message', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json' 
      },
      body: JSON.stringify(data)
    })
    .then(response => response.status === 200
      ? response.json()
      : { error: 'Erreur lors de l\'envoi' }
    )
    .then(result => {
      console.log('result', result);
      alert(result.success || result.error);
    });
  };
  return (
    <form ref={formRef}>
      {accreditation === 2
        ? (
          <FormGroup>
            <UserSelect name="receiver" label="Destinataire" />
          </FormGroup>
        ) : (
          <input type="hidden" name="receiver" value="admin" />
        )
      }
      <FormGroup>
        <TextField id="message-title" name="title" type="text" label="Titre du message" />
      </FormGroup>
      <FormGroup>
        <TextField
          multiline
          rows={5}
          id="message-content"
          name="content"
          type="text"
          label="Contenu de votre message"
        />
      </FormGroup>
      
      <Button
        onClick={handleSubmit}
        variant="contained"
        color="primary"
        style={{ marginTop: '2em' }}
      >
        Envoyer
      </Button>
    </form>
  );
};

export default MessageForm;
