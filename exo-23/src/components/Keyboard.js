import React from 'react';

const alphabet = ('abcdefghijklmnopqrstuvwxyz').split('');

const Keyboard = ({ dispatch }) => {
  const handleClick = function (letter, event){
    event.target.disabled = true;
    dispatch({ type: 'TRY_LETTER', payload: letter });
  };
  return (
    <div className="keyboard">
      {alphabet.map((letter, index) => (
        <button
          key={ index }
          onClick={ handleClick.bind(null, letter) }
        >
          { letter }
        </button>
      ))}
    </div>
  );
};

export default Keyboard;
