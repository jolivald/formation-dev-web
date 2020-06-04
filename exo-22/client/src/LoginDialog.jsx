import React from 'react';
import Button from '@material-ui/core/Button';
//import TextField from '@material-ui/core/TextField';
import Dialog from '@material-ui/core/Dialog';
import DialogActions from '@material-ui/core/DialogActions';
import DialogContent from '@material-ui/core/DialogContent';
//import DialogContentText from '@material-ui/core/DialogContentText';
import DialogTitle from '@material-ui/core/DialogTitle';

import AppBar from '@material-ui/core/AppBar';
import Tabs from '@material-ui/core/Tabs';
import Tab from '@material-ui/core/Tab';
import TabPanel from './TabPanel';
import LoginForm from './LoginForm';
import RegisterForm from './RegisterForm';

const createProps = index => ({
  id: `simple-tab-${index}`,
  'aria-controls': `simple-tabpanel-${index}`
});

const LoginDialog = ({
    open,
    tab,
    labels,
    loginRef,
    registerRef,
    onClose,
    onChange,
    onSubmit
  }) => {
  return (
    <Dialog
      open={open}
      onClose={onClose}
      aria-labelledby="form-dialog-title"
    >
      <DialogTitle id="form-dialog-title" style={{ padding: 0 }}>
        <AppBar position="static">
          <Tabs value={tab} onChange={onChange} aria-label="simple tabs example">
            <Tab label={labels[0]} {...createProps(0)} />
            <Tab label={labels[1]} {...createProps(1)} />
          </Tabs>
        </AppBar>
      </DialogTitle>
      <DialogContent>
        
        <TabPanel value={tab} index={0}>
          <LoginForm ref={loginRef} />
        </TabPanel>

        <TabPanel value={tab} index={1}>
          <RegisterForm ref={registerRef} />
        </TabPanel>

      </DialogContent>
      <DialogActions>
        <Button color="primary" onClick={onSubmit}>
          {labels[tab]}
        </Button>
      </DialogActions>
    </Dialog>
  );
};

export default LoginDialog;
