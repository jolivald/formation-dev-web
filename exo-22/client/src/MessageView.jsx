import React, { useState, useContext } from 'react';
import { AppContext } from './App';
//import fetch from 'cross-fetch';
import Paper from '@material-ui/core/Paper';
import Tabs from '@material-ui/core/Tabs';
import Tab from '@material-ui/core/Tab';
import { Typography, Button } from '@material-ui/core';
import TabPanel from './TabPanel';
import MessageList from './MessageList';
import MessageForm from './MessageForm';

const createProps = index => ({
  id: `admin-tab-${index}`,
  'aria-controls': `admin-tabpanel-${index}`
});

const MessageView = ({ accreditation }) => {
  const dispatch = useContext(AppContext);
  const [value, setValue] = useState(0);
  const handleChange = (event, newValue) => {
    setValue(newValue);
  };
  return (
    <div>
      <Paper square>
        <Tabs value={value} onChange={handleChange} aria-label="admin tabs">
          <Tab label="Boite de réception" {...createProps(0)} />
          <Tab label="Boite d'envoi" {...createProps(1)} />
        </Tabs>
      </Paper>
      <TabPanel value={value} index={0}>
        <Typography variant="h6">
          Messages reçus
        </Typography>
        <MessageList />
      </TabPanel>
      <TabPanel value={value} index={1}>
        <Typography variant="h6">
          Ecrire un message
        </Typography>
        <MessageForm accreditation={accreditation} />
      </TabPanel>
    </div>
  );
};

export default MessageView;
