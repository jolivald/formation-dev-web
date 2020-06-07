import React from 'react';
import Typography from '@material-ui/core/Typography';
import mishka from './images/mishka_home.jpg';

const VisitorView = () => {
  return (
    <div className="visitor-view">
      <Typography variant="h6">Bienvenue sur PetNet</Typography>
      <p>Grâce à cette application vous pouvez gérer tous ce qui concerne l'hébergement de vos animaux préférés.</p>
      <img src={mishka} alt="deux beaux chiens" />
    </div>
  );
};

export default VisitorView;
