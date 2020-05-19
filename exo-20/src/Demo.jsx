import React from 'react';

const rgbToHex = (r, g, b) => {
  return ('#'
    + ('0' + parseInt(r, 10).toString(16)).slice(-2)
    + ('0' + parseInt(g, 10).toString(16)).slice(-2)
    + ('0' + parseInt(b, 10).toString(16)).slice(-2))
    .toUpperCase();
 }

const Demo = ({ red, green, blue }) => (
  <div id="demo" style={{
    backgroundColor: `rgb(${red}, ${green}, ${blue})`
  }}>
    {rgbToHex(red, green, blue)}
  </div>
);

export default Demo;
