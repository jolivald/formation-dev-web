import React from 'react';
import Typography from '@material-ui/core/Typography';

const VisitorView = () => {
  return (
    <div className="visitor-view">
      <Typography variant="h6">Demonstration</Typography>
      <p>Il y a deux comptes disponibles pour tester l'application.</p>
      <dl>
        <dt>Identifiant:</dt>
        <dd>user</dd>
        <dt>Mot de passe:</dt>
        <dd>demo</dd>
      </dl>
      <dl>
        <dt>Identifiant:</dt>
        <dd>admin</dd>
        <dt>Mot de passe:</dt>
        <dd>demo</dd>
      </dl>
    </div>
  );
};

export default VisitorView;
