import React, { forwardRef } from 'react';
import FormGroup from '@material-ui/core/FormGroup';
import TextField from '@material-ui/core/TextField';
import Select from '@material-ui/core/Select';
import InputLabel from '@material-ui/core/InputLabel';
import MenuItem from '@material-ui/core/MenuItem';
import UserSelect from './UserSelect';

const AnimalForm = forwardRef((props, ref) => {
  return (
    <form ref={ref}>
      <FormGroup>
        <InputLabel id="animal-select-label">Type</InputLabel>
        <Select
          labelId="animal-select-label"
          id="animal-select"
          name="type"
          value="dog"
        >
          <MenuItem value="dog">Chien</MenuItem>
          <MenuItem value="cat">Chat</MenuItem>
        </Select>
      </FormGroup>
      <FormGroup>
        <UserSelect />
      </FormGroup>
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
