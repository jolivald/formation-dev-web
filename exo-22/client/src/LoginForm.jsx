import React, { forwardRef } from 'react';
import FormGroup from '@material-ui/core/FormGroup';
import TextField from '@material-ui/core/TextField';

const LoginForm = forwardRef((props, ref) => {
  return (
    <form ref={ref}>
      <FormGroup>
        <TextField id="login-username" name="username" label="Nom d'utilisateur" />
      </FormGroup>
      <FormGroup>
        <TextField id="login-password" name="password" type="password" label="Mot de passe" />
      </FormGroup>
    </form>
  );
});

export default LoginForm;
