import React, { useReducer } from 'react';
import Riddle from './Riddle';
import Keyboard from './Keyboard';

const appReducer = (state, action) => {
  console.log('reducer', action, state);
  switch (action.type){
    case 'TRY_LETTER':
      return {
        ...state,
        usedLetters: [
          ...state.usedLetters,
          action.payload
        ]
      };
    default:
      throw new Error(`Invalid action dispatched: ${action.type}`);
  }
};

const initialState = {
  phrase: 'Hello world!',
  usedLetters: []
};

function App() {
  const [state, dispatch] = useReducer(appReducer, initialState);
  return (<>
    <header>
      <h1>Jeu de pendu</h1>
      <hr />
    </header>
    <main>
      <Riddle {...{state, dispatch }}/>
      <Keyboard {...{state, dispatch }} />
    </main>
  </>);
}

export default App;
