import React, { useRef } from 'react';
import { Button, TextField, FormGroup, Typography } from '@material-ui/core';
import fetch from 'cross-fetch';

const VisioWidget = ({ animal }) => {
  const formRef = useRef(null);
  const handleClick = () => {
    const ins = document.querySelectorAll('input', formRef);
    const data = Array.from(ins).reduce((acc, el) => {
      acc[el.name] = el.value;
      return acc;
    }, {});
    const message = {
      title: 'Demande de RDV',
      receiver: 'admin',
      content: `Demande de visio-conférence avec ${animal.name} le ${data.day} à ${data.hour}.`
    };
    fetch('/message', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json' 
      },
      body: JSON.stringify(message)
    })
      .then(response => response.status === 200
        ? response.json()
        : { error: 'Erreur lors de la demande' }
      )
      .then(result => {
        alert(result.success || result.error);
      });
  };
  return (
    <div>
      <form ref={formRef}>
        <Typography>Demander un rendez-vous</Typography>
        <FormGroup row={true}>
          <TextField type="date" name="day" label="Date souhaitée" InputLabelProps={{
            shrink: true,
          }} />
          <TextField type="time" name="hour" label="Heure souhaitée" InputLabelProps={{
            shrink: true,
          }} />

          <Button
            variant="contained"
            color="primary"
            onClick={handleClick}
            style={{ marginTop: '2em', marginLeft: '.5em' }}
          >
            Envoyer
          </Button>
        </FormGroup>
      </form>
    </div>
  );
};

export default VisioWidget;

