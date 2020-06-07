import React, { useState, useRef, useReducer } from 'react';
import Container from '@material-ui/core/Container';
import fetch from 'cross-fetch';
import NavBar from './NavBar';
import LoginDialog from './LoginDialog';
import VisitorView from './VisitorView';
import UserView from './UserView';
import AdminView from './AdminView';
import AnimalView from './AnimalView';
import MessageView from './MessageView';
import MessageReadView from './MessageReadView';

import './App.css';

const appViews = {
  home: VisitorView,
  visitor: VisitorView,
  user: UserView,
  admin: AdminView,
  message: MessageView,
  animal: AnimalView,
  read: MessageReadView
};
const homes = [VisitorView, UserView, AdminView];

const appReducer = (state, action) => {
  //console.log('ACTION', action.type, action.payload, 'STATE', state);
  switch (action.type){
    case 'SET_VIEW':
      const { view, props } = action.payload;
      return { ...state, currentView: appViews[view], currentProps: props };
    case 'TOGGLE_DIALOG':
      return { ...state, dialogOpen: !state.dialogOpen };
    case 'SET_DIALOG_TAB':
      return { ...state, dialogTab: action.payload };
    case 'LOGIN_USER':
      const { username, accreditation, messageCount } = action.payload;
      appViews.home = homes[accreditation];
      return {
        ...state,
        username,
        accreditation,
        messageCount,
        currentView: appViews.home,
        dialogOpen: false
      };
    case 'DECREMENT_MESSAGE_COUNT':
      return { ...state, messageCount: state.messageCount - 1 };
    default:
      throw new Error('Invalid action');
  }
};

const appState = {
  username: 'anonyme',
  accreditation: 0,
  dialogOpen: false,
  dialogTab: 0,
  currentView: VisitorView,
  currentProps: {},
  messageCount: 0
};

const AppContext = React.createContext(null);

const App = () => {
  const [state, dispatch] = useReducer(appReducer, appState);
  const loginRef = useRef(null);
  const registerRef = useRef(null);
  const forms = [loginRef, registerRef];
  const labels = ['Connexion', 'Inscription'];
  const apis = ['/login', '/register'];
  //const CurrentView = state.currentView;
  let { currentView: CurrentView } = state;
  const handleClose = () => {
    dispatch({ type: 'TOGGLE_DIALOG' });
  };
  const handleChange = (event, newValue) => {
    dispatch({
      type: 'SET_DIALOG_TAB',
      payload: newValue
    });
  };
  const handleSubmit = (event) => {
    const form = forms[state.dialogTab];
    const ins = document.querySelectorAll('input', form);
    const data = Array.from(ins).reduce((acc, el) => {
      acc[el.name] = el.value;
      return acc;
    }, {});
    fetch(apis[state.dialogTab], {
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
          dispatch({
            type: 'LOGIN_USER',
            payload: result.payload
          });
        } else {
          alert(result.error);
        }
      });
  };
  //console.log('app render', CurrentView);
  return (
    <AppContext.Provider value={dispatch}>
      
      <NavBar
        buttonLabel={labels[state.dialogTab]}
        onClick={handleClose}
        accreditation={state.accreditation}
        messageCount={state.messageCount}
      />
      <LoginDialog
        {...{ labels, loginRef, registerRef }}
        open={state.dialogOpen}
        tab={state.dialogTab}
        onClose={handleClose}
        onChange={handleChange}
        onSubmit={handleSubmit}
      />
      <Container maxWidth="sm" style={{ marginTop: '1em', backgroundColor: '#fff' }}>
        <CurrentView {...state.currentProps} accreditation={state.accreditation} />
      </Container>
    </AppContext.Provider>
  );
}

export default App;
export { AppContext };