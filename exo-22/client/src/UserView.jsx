import React, { useState, useEffect, useContext } from 'react';
import { AppContext } from './App';
import fetch from 'cross-fetch';
import List from '@material-ui/core/List';
import Avatar from '@material-ui/core/Avatar';
import Typography from '@material-ui/core/Typography';
import SearchIcon from '@material-ui/icons/Search';
import PetsIcon from '@material-ui/icons/Pets';
import ArrowBackIcon from '@material-ui/icons/ArrowBack';
import AnimalView from './AnimalView';

import { ListItem, ListItemText, ListItemAvatar, ListItemSecondaryAction, IconButton, Button} from '@material-ui/core';

const UserView = () => {
  const [animals, setAnimals] = useState([]);
  const dispatch = useContext(AppContext);
  //const [view, setView] = useState(null);
  useEffect(() => {
    fetch('/animals', {
      method: 'GET'
    })
      .then(response => response.json())
      .then((result) => {
        setAnimals(result);
      })
  }, []);
  //const handleClick = it => setView(it);
  const handleClick = (animal) => {
    dispatch({
      type: 'SET_VIEW',
      payload: { view: 'animal', props: { animal } }
    });
  };
  // <AnimalView animal={view} dispatch={dispatch} />
  return (<div>
    <Typography variant="h6">Vos animaux</Typography>
    <List>
      {animals.map(animal => (
        <ListItem key={animal._id} onClick={() => handleClick(animal)}>
          <ListItemAvatar>
            <Avatar>
              <PetsIcon />
            </Avatar>
          </ListItemAvatar>
          <ListItemText
            primary={animal.name}
            secondary={`${animal.race} - ${animal.age} ans`}
          />
          <ListItemSecondaryAction>
            <IconButton onClick={() => handleClick(animal)}>
              <SearchIcon />
            </IconButton>
          </ListItemSecondaryAction>
        </ListItem>
      ))}
    </List>
  </div>);
};

export default UserView;
