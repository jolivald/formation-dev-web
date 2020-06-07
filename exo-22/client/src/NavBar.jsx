import React, { useContext } from 'react';
import { AppContext } from './App';
import AppBar from '@material-ui/core/AppBar';
import Toolbar from '@material-ui/core/Toolbar';
import Typography from '@material-ui/core/Typography';
import Button from '@material-ui/core/Button';
import LockOpenIcon from '@material-ui/icons/LockOpen';
import ExitToAppIcon from '@material-ui/icons/ExitToApp';

import Badge from '@material-ui/core/Badge';
import PetsIcon from '@material-ui/icons/Pets';
import MailIcon from '@material-ui/icons/Mail';

import MessageView from './MessageView';

const BaseNavbar = ({ children }) => (
  <AppBar position="static">
    <Toolbar>
      <Typography variant="h6" style={{ flexGrow: 1 }}>
        <Button href="/" color="inherit">
          <PetsIcon style={{ marginRight: '.5em' }}/>
          PetNet
        </Button>
      </Typography>
      {children}
    </Toolbar>
  </AppBar>
);

const NavBar = ({ buttonLabel, onClick, accreditation, messageCount }) => {
  const dispatch = useContext(AppContext);
  const handleClick = () => {
    dispatch({
      type: 'SET_VIEW',
      payload: { view: 'message', props: {} }
    });
  };
  switch (accreditation){
    case 2:
    case 1: return (
      <BaseNavbar>
        <Button color="inherit" onClick={handleClick}>
          <Badge badgeContent={messageCount} color="secondary">
            <MailIcon />
          </Badge>
        </Button>
        <Button href="/logout" color="inherit">
          <ExitToAppIcon />
        </Button>
      </BaseNavbar>
    );
    case 0:
    default: return (
      <BaseNavbar>
        <Button onClick={onClick} color="inherit">
          <LockOpenIcon style={{ marginRight: '.5em' }}/>
          {buttonLabel}
        </Button>
      </BaseNavbar>
    );
  }
};

export default NavBar;
