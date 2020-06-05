import React, { useState, useEffect } from 'react';
import fetch from 'cross-fetch';
import List from '@material-ui/core/List';
import Avatar from '@material-ui/core/Avatar';
import Typography from '@material-ui/core/Typography';
import SearchIcon from '@material-ui/icons/Search';
import PetsIcon from '@material-ui/icons/Pets';
import ArrowBackIcon from '@material-ui/icons/ArrowBack';

import { ListItem, ListItemText, ListItemAvatar, ListItemSecondaryAction, IconButton, Button} from '@material-ui/core';

const UserView = () => {
  const [animals, setAnimals] = useState([]);
  const [view, setView] = useState(null);
  useEffect(() => {
    return fetch('/animals', {
      method: 'GET'
    })
      .then(response => response.json())
      .then((result) => {
        setAnimals(result);
      })
  }, []);
  const handleClick = it => setView(it);
  return view
    ? (<>
      <Typography variant="h6">TODO accordion {view.name}</Typography>
      <Button 
        variant="contained"
        color="primary"
        onClick={() => handleClick(null)}
      >
        <ArrowBackIcon/>
        Retour
      </Button>
    </>)
    : (<>
    <Typography variant="h6">Vos animaux pris en charge par nos soins</Typography>
    <List>
      {animals.map(animal => (
        <ListItem onClick={() => handleClick(animal)}>
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
  </>);
};

export default UserView;
