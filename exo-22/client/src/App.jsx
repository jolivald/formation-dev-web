import React, { useState, useRef } from 'react';
import fetch from 'cross-fetch';
import NavBar from './NavBar';
import LoginDialog from './LoginDialog';
//import './App.css';

const App = () => {
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
      .then(response => response.json())
      .then(jsonData => console.log(jsonData));
    //console.log('submit', data);
  };
  return (
    <div className="app">
      <NavBar
        buttonLabel={labels[tab]}
        onClick={handleClose}
      />
      <LoginDialog
        {...{ open, tab, labels, loginRef, registerRef }}
        onClose={handleClose}
        onChange={handleChange}
        onSubmit={handleSubmit}
      />
    </div>
  );
}

export default App;
