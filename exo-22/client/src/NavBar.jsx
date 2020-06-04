import React from 'react';
import AppBar from '@material-ui/core/AppBar';
import Toolbar from '@material-ui/core/Toolbar';
import Typography from '@material-ui/core/Typography';
import Button from '@material-ui/core/Button';
import Link from '@material-ui/core/Link';
import LockOpen from '@material-ui/icons/LockOpen';

/*
TODO:
 if logged => icon buttons profile & messages
 else => button login/register
*/
const NavBar = ({ buttonLabel, onClick }) => {
  return (
    <AppBar position="static">
      <Toolbar>
        <Typography variant="h6" style={{ flexGrow: 1 }}>
          <Link href="/" color="inherit">
          PetNet
          </Link>
        </Typography>
        <LockOpen />
        <Button onClick={onClick} color="inherit">{buttonLabel}</Button>
      </Toolbar>
    </AppBar>
  );
};

export default NavBar;
