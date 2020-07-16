import React, { useReducer } from 'react';
import Riddle from './Riddle';
import Keyboard from './Keyboard';

const initialState = {
  phrase: 'i love javascript',
  chars: 12,
  attempts: 0,
  found: 0,
  usedLetters: []
};

const appReducer = (state, action) => {
  const { type, payload } = action;
  switch (type){
    case 'TRY_LETTER':
      const { phrase, attempts, found, usedLetters } = state;
      return {
        ...state,
        attempts: attempts + 1,
        found: found + (phrase.includes(payload) ? 1 : 0),
        usedLetters: [
          ...usedLetters,
          action.payload
        ]
      };
    default:
      throw new Error(`Invalid action dispatched: ${action.type}`);
  }
};

function App() {
  const [state, dispatch] = useReducer(appReducer, initialState);
  return (<>
    <header>
      <h1>Jeu de pendu</h1>
      {state.found === state.chars
        ? (<p>Victoire!</p>)
        : (<p>Nombre d'essais: {state.attempts}</p>)
      }
      <hr />
    </header>
    <main>
      <Riddle {...{state, dispatch }}/>
      <Keyboard {...{state, dispatch }} />
    </main>
  </>);
}

export default App;
