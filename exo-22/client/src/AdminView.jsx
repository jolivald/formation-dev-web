import React, { useState, useRef } from 'react';
import fetch from 'cross-fetch';
import Paper from '@material-ui/core/Paper';
import Tabs from '@material-ui/core/Tabs';
import Tab from '@material-ui/core/Tab';
import { Typography, Button } from '@material-ui/core';
import TabPanel from './TabPanel';
import RegisterForm from './RegisterForm';
import AnimalForm from './AnimalForm';

const createProps = index => ({
  id: `admin-tab-${index}`,
  'aria-controls': `admin-tabpanel-${index}`
});

const AdminView = () => {
  const [value, setValue] = useState(0);
  const userRef = useRef(null);
  const animalRef = useRef(null);
  const forms = [userRef, animalRef];
  const apis = ['/register', '/animal'];
  const handleChange = (event, newValue) => {
    setValue(newValue);
  };
  const handleSubmit = () => {
    const form = forms[value];
    const ins = document.querySelectorAll('input', form);
    const data = Array.from(ins).reduce((acc, el) => {
      acc[el.name] = el.value;
      return acc;
    }, {});
    console.log('user data', data);
    fetch(apis[value], {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify(data)
    })
      .then(response => response.status === 200
        ? response.json()
        : { error: 'Erreur lors de l\'enregistrement' }
      )
      .then(result => {
        console.log('result', result);
        alert(result.success || result.error);
      });
  };
  return (
    <div>
      <Paper square>
        <Tabs value={value} onChange={handleChange} aria-label="admin tabs">
          <Tab label="Utilisateur" {...createProps(0)} />
          <Tab label="Animal" {...createProps(1)} />
        </Tabs>
      </Paper>

      <TabPanel value={value} index={0}>
        <Typography variant="h6">
          Enregistrer un utilisateur
        </Typography>
        <RegisterForm ref={userRef}/>
        <Button
          onClick={handleSubmit}
          variant="contained"
          color="primary"
          style={{ marginTop: '2em' }}
        >
          Envoyer
        </Button>
      </TabPanel>

      <TabPanel value={value} index={1}>
        <Typography variant="h6">
          Enregistrer un animal
        </Typography>
        <AnimalForm ref={animalRef} />
        <Button
          onClick={handleSubmit}
          variant="contained"
          color="primary"
          style={{ marginTop: '2em' }}
        >
          Envoyer
        </Button>
      </TabPanel>
    </div>
  );
};

export default AdminView;
