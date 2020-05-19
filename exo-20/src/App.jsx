import React, { useState } from 'react';
import Demo from './Demo';
import Slider from './Slider';
import './App.css';

const randomColor = () => Math.floor(Math.random() * 256);

const App = () => {
  const [red,   setRed]   = useState(127);
  const [green, setGreen] = useState(127);
  const [blue,  setBlue]  = useState(127);
  const randomize = () => {
    setRed(randomColor());
    setGreen(randomColor());
    setBlue(randomColor());
  };
  return (
    <div>

      <header>
        <h1>React demo</h1>
      </header>

      <Demo {...{ red, green, blue }} />

      <button id="random" onClick={randomize}>Aleatoire</button>

      <Slider label="Rouge" value={red} onChange={setRed}/>
      <Slider label="Vert" value={green} onChange={setGreen}/>
      <Slider label="Bleu" value={blue} onChange={setBlue}/>


    </div>
  );
}

export default App;
