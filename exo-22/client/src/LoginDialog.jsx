import React, { useState } from 'react';
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


const LoginDialog = () => {
  const [value, setValue] = useState(0);
  const handleChange = (event, newValue) => {
    setValue(newValue);
  };
  return (
    <Dialog open={true} aria-labelledby="form-dialog-title">
      <DialogTitle id="form-dialog-title" style={{ padding: 0 }}>
        <AppBar position="static">
          <Tabs value={value} onChange={handleChange} aria-label="simple tabs example">
            <Tab label="Connection" {...createProps(0)} />
            <Tab label="Inscription" {...createProps(1)} />
          </Tabs>
        </AppBar>
      </DialogTitle>
      <DialogContent>
        
        <TabPanel value={value} index={0}>
          <LoginForm />
        </TabPanel>

        <TabPanel value={value} index={1}>
          <RegisterForm />
        </TabPanel>

      </DialogContent>
      <DialogActions>
        <Button color="primary">
          Envoyer
        </Button>
      </DialogActions>
    </Dialog>
  );
};

export default LoginDialog;
