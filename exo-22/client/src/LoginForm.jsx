import React from 'react';
import FormGroup from '@material-ui/core/FormGroup';
import TextField from '@material-ui/core/TextField';

const LoginForm = () => {
  return (
    <form>
      <FormGroup>
        <TextField id="standard-basic" label="Nom d'utilisateur" />
      </FormGroup>
      <FormGroup>
        <TextField id="standard-basic" label="Mot de passe" />
      </FormGroup>
    </form>
  );
};

export default LoginForm;
