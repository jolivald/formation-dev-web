import React from 'react';

const Demo = ({ red, green, blue }) => (
  <div id="demo" style={{
    backgroundColor: `rgb(${red}, ${green}, ${blue})`
  }} />
);

export default Demo;
