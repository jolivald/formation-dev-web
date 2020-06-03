import React from 'react';
import NavBar from './NavBar';
import LoginDialog from './LoginDialog';
//import './App.css';

const App = () => {
  return (
    <div className="app">
      <NavBar />
      <LoginDialog/>
    </div>
  );
}

export default App;
