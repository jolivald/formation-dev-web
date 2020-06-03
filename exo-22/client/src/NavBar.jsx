import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import AppBar from '@material-ui/core/AppBar';
import Toolbar from '@material-ui/core/Toolbar';
import Typography from '@material-ui/core/Typography';
import Button from '@material-ui/core/Button';
import Link from '@material-ui/core/Link';
import LockOpen from '@material-ui/icons/LockOpen';

const useStyles = makeStyles((theme) => ({
  menuButton: {
    marginRight: theme.spacing(2),
  },
  title: {
    flexGrow: 1,
  },
}));
/*
TODO:
 if logged => icon buttons profile & messages
 else => button login/register
*/
const NavBar = () => {
  const classes = useStyles();
  return (
    <AppBar position="static">
      <Toolbar>
        {/*<IconButton edge="start" className={classes.menuButton} color="inherit" aria-label="menu">
          <MenuIcon />
        </IconButton>*/}
        <Typography variant="h6" className={classes.title}>
          <Link href="/" color="inherit">
          PetNet
          </Link>
        </Typography>
        <LockOpen />
        <Button color="inherit">Connection</Button>
      </Toolbar>
    </AppBar>
  );
};

export default NavBar;
