import React, { forwardRef } from 'react';
import FormGroup from '@material-ui/core/FormGroup';
import TextField from '@material-ui/core/TextField';

const RegisterForm = forwardRef((props, ref) => {
  return (
    <form ref={ref}>
      <FormGroup>
        <TextField id="register-username" name="username" label="Nom d'utilisateur" />
      </FormGroup>
      <FormGroup>
        <TextField id="register-email" name="email" type="email" label="Adresse email" />
      </FormGroup>
      <FormGroup>
        <TextField id="register-password1" name="password1" type="password" label="Mot de passe" />
      </FormGroup>
      <FormGroup>
        <TextField id="register-password2" name="password2" type="password" label="Confirmer le mot de passe" />
      </FormGroup>
    </form>
  );
});

export default RegisterForm;
