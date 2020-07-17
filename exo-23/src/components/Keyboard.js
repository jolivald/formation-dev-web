import React from 'react';

const alphabet = ('abcdefghijklmnopqrstuvwxyz').split('');

const Keyboard = ({ state: { usedLetters }, dispatch }) => {
  const handleClick = function (letter, event){
    dispatch({ type: 'TRY_LETTER', payload: letter });
  };
  return (
    <div className="keyboard">
      {alphabet.map((letter, index) => (
        <button
          key={ index }
          disabled={ usedLetters.includes(letter) }
          onClick={ handleClick.bind(null, letter) }
        >
          { letter.toUpperCase() }
        </button>
      ))}
    </div>
  );
};

export default Keyboard;
