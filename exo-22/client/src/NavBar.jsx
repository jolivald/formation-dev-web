import React from 'react';
import AppBar from '@material-ui/core/AppBar';
import Toolbar from '@material-ui/core/Toolbar';
import Typography from '@material-ui/core/Typography';
import Button from '@material-ui/core/Button';
import Link from '@material-ui/core/Link';
import LockOpen from '@material-ui/icons/LockOpen';


import Badge from '@material-ui/core/Badge';
import MailIcon from '@material-ui/icons/Mail';

/*
TODO:
 if logged => icon buttons profile & messages
 else => button login/register
*/
const NavBar = ({ buttonLabel, onClick, accreditation }) => {
  return (
    <AppBar position="static">
      <Toolbar>
        <Typography variant="h6" style={{ flexGrow: 1 }}>
          <Link href="/" color="inherit">PetNet</Link>
        </Typography>
        {accreditation === 0 && (
          <Button onClick={onClick} color="inherit">
            <LockOpen />
            {buttonLabel}
          </Button>
        )}
        {accreditation > 0 && (<>
          <Button color="inherit"><MailIcon />
            <Badge badgeContent={2} color="secondary">Message</Badge>
          </Button>
          <Button href="/logout" color="inherit">
            <LockOpen />
            Déconnexion
          </Button>
        </>)}
      </Toolbar>
    </AppBar>
  );
};

export default NavBar;
