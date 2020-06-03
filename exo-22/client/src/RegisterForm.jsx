import React from 'react';
import FormGroup from '@material-ui/core/FormGroup';
import TextField from '@material-ui/core/TextField';

const RegisterForm = () => {
  return (
    <form>
      <FormGroup>
        <TextField id="standard-basic" label="Nom d'utilisateur" />
      </FormGroup>
      <FormGroup>
        <TextField id="standard-basic" label="Adresse email" />
      </FormGroup>
      <FormGroup>
        <TextField id="standard-basic" label="Mot de passe" />
      </FormGroup>
      <FormGroup>
        <TextField id="standard-basic" label="Confirmer le mot de passe" />
      </FormGroup>
    </form>
  );
};

export default RegisterForm;
