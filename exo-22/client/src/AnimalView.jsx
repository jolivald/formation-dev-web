import React, { useState, useContext } from 'react';
import { AppContext } from './App';
import { ExpansionPanel, ExpansionPanelSummary, Typography, ExpansionPanelDetails, Button, List, ListItem, ListItemText, Paper } from '@material-ui/core';
import ArrowBackIcon from '@material-ui/icons/ArrowBack';
import ExpandMoreIcon from '@material-ui/icons/ExpandMore';
import UserView from './UserView';
import VisioWidget from './VisioWidget';

const AnimalView = ({ animal }) => {
  const dispatch = useContext(AppContext);
  const [expanded, setExpanded] = useState(false);
  const handleChange = (panel) => (event, isExpanded) => {
    setExpanded(isExpanded ? panel : false);
  };
  const handleClick = () => {
    dispatch({
      type: 'SET_VIEW',
      payload: { view: 'user', props: {} }
    });
  };
  return (
    <div>
      <Typography variant="h6">Fiche de {animal.name}</Typography>

      <ExpansionPanel expanded={expanded === 'panel1'} onChange={handleChange('panel1')}>
        <ExpansionPanelSummary expandIcon={<ExpandMoreIcon />}>
          <Typography>Informations</Typography>
        </ExpansionPanelSummary>
        <ExpansionPanelDetails>
          <List>
            <ListItem>
              <ListItemText secondary="Type" primary={animal.type === 'dog' ? 'Chien' : 'Chat'} />
            </ListItem>
            <ListItem>
              <ListItemText secondary="Nom" primary={animal.name} />
            </ListItem>
            <ListItem>
              <ListItemText secondary="Age" primary={animal.age+' ans'} />
            </ListItem>
            <ListItem>
              <ListItemText secondary="Race" primary={animal.race} />
            </ListItem>
          </List>
        </ExpansionPanelDetails>
      </ExpansionPanel>

      <ExpansionPanel expanded={expanded === 'panel2'} onChange={handleChange('panel2')}>
        <ExpansionPanelSummary expandIcon={<ExpandMoreIcon />}>
          <Typography>Visio conférence</Typography>
        </ExpansionPanelSummary>
        <ExpansionPanelDetails>
          <div style={{ width: '100%' }} >
            <video controls style={{ width: '100%' }}/>
            <VisioWidget animal={animal}/>
          </div>
        </ExpansionPanelDetails>
      </ExpansionPanel>

      <ExpansionPanel expanded={expanded === 'panel3'} onChange={handleChange('panel3')}>
        <ExpansionPanelSummary expandIcon={<ExpandMoreIcon />}>
          <Typography>Géo localisation</Typography>
        </ExpansionPanelSummary>
        <ExpansionPanelDetails>
          put map here
        </ExpansionPanelDetails>
      </ExpansionPanel>

      <Button
        variant="contained"
        color="primary"
        onClick={handleClick}
        style={{ marginTop: '2em' }}
      >
        <ArrowBackIcon/>
        Retour
      </Button>
    </div>
  );
};

export default AnimalView;
