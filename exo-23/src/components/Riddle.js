import React from 'react';

const computeDisplay = (phrase, usedLetters) => phrase.replace(
  /\w/g, letter => (usedLetters.includes(letter) ? letter : '_')
);

const Riddle = ({ state: { phrase, usedLetters } }) => {
  return (
    <div className="riddle">
      <pre>
        {computeDisplay(phrase, usedLetters)}
      </pre>
    </div>
  );
};

export default Riddle;
