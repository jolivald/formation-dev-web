import React, { useState, useRef } from 'react';
import Container from '@material-ui/core/Container';
import fetch from 'cross-fetch';
import NavBar from './NavBar';
import LoginDialog from './LoginDialog';
import VisitorView from './VisitorView';
import UserView from './UserView';
import AdminView from './AdminView';

import './App.css';

const App = () => {
  const [cred, setCred] = useState(0);
  const [open, setOpen] = useState(false);
  const [tab, setTab] = useState(0);
  const loginRef = useRef(null);
  const registerRef = useRef(null);
  const labels = ['Connexion', 'Inscription'];
  const forms = [loginRef, registerRef];
  const apis = ['/login', '/register'];
  const handleClose = () => {
    setOpen(!open);
  };
  const handleChange = (event, newValue) => {
    setTab(newValue);
  };
  const handleSubmit = (event) => {
    const form = forms[tab];
    const ins = document.querySelectorAll('input', form);
    const data = Array.from(ins).reduce((acc, el) => {
      acc[el.name] = el.value;
      return acc;
    }, {});
    fetch(apis[tab], {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify(data)
    })
      .then(response => response.status === 200
        ? response.json()
        : { error: 'Identifiants incorrects'}
      )
      .then(result => {
        if (result.success){
          setCred(result.payload.accreditation);
          setOpen(false);
        } else {
          alert(result.error);
        }
      });
  };
  return (
    <div className="app">
      <NavBar
        buttonLabel={labels[tab]}
        onClick={handleClose}
        accreditation={cred}
      />
      <LoginDialog
        {...{ open, tab, labels, loginRef, registerRef }}
        onClose={handleClose}
        onChange={handleChange}
        onSubmit={handleSubmit}
      />
      <Container maxWidth="md">
        {cred === 0 && <VisitorView />}
        {cred === 1 && <UserView />}
        {cred === 2 && <AdminView />}
      </Container>
    </div>
  );
}

export default App;
