import React, { useReducer, useEffect } from 'react';
import Riddle from './Riddle';
import Keyboard from './Keyboard';

const randomPhrases = [
  'i love javascript',
  'php is dead',
  'css is aweful',
  'lisp is king',
  'oracle killed java'
];

const initialState = {
  phrase: '',
  chars: 0,
  attempts: 0,
  found: 0,
  usedLetters: []
};

const appReducer = (state, action) => {
  const { type, payload } = action;
  switch (type){
    case 'START_GAME':
      const seen = {};
      const newPhrase = randomPhrases[Math.floor(Math.random() * randomPhrases.length)];
      return {
        ...state,
        phrase: newPhrase,
        usedLetters: [],
        found: 0,
        attempts: 0,
        chars: newPhrase.split('').reduce((acc, char) => {
          if (char.match(/\w/)){
            seen[char] || acc++;
            seen[char] = true;
          }
          return acc;
        }, 0)
      }
    case 'TRY_LETTER':
      const { phrase, attempts, found, usedLetters } = state;
      return usedLetters.includes(payload)
        ? state
        : {
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
  const handleClick = () => {
    dispatch({ type: 'START_GAME' });
  };
  const handleKeypress = event => {
    dispatch({ type: 'TRY_LETTER', payload: event.key });
  };
  useEffect(() => {
    // componentDidMount
    document.addEventListener('keypress', handleKeypress);
    dispatch({ type: 'START_GAME', payload: 'lol jk' });
    return () => {
      // componentWillUnmount
      document.removeEventListener('keypress', handleKeypress);
    };
  }, []);
  console.log('app state', state);
  return (<>
    <header>
      <h1>Jeu de pendu</h1>
      {state.found !== state.chars
        ? (<p>Nombre d'essais: {state.attempts}</p>)
        : (<p>
          Vous avez gagné! &nbsp;
          <button onClick={handleClick}>Rejouer</button>
        </p>)
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
