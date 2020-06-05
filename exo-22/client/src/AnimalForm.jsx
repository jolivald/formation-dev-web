import React, { forwardRef } from 'react';
import FormGroup from '@material-ui/core/FormGroup';
import TextField from '@material-ui/core/TextField';

const AnimalForm = forwardRef((props, ref) => {
  return (
    <form ref={ref}>
      <FormGroup>
        <TextField id="register-username" name="name" label="Nom" />
      </FormGroup>
      <FormGroup>
        <TextField id="register-email" name="race" label="Race" />
      </FormGroup>
      <FormGroup>
        <TextField id="register-password1" name="age" type="number" label="Age" />
      </FormGroup>
    </form>
  );
});

export default AnimalForm;
