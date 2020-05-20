import React, { useState } from 'react';
import Board from './Board';

const calculateWinner = squares => {
  const lines = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6],
  ];
  for (let i = 0; i < lines.length; i++) {
    const [a, b, c] = lines[i];
    if (squares[a] && squares[a] === squares[b] && squares[a] === squares[c]) {
      return squares[a];
    }
  }
  return null;
};

const Game = () => {
  const [stepNumber, setStepNumber] = useState(0);
  const [xIsNext, setXIsNext] = useState(true);
  const [history, setHistory] = useState([{
    squares: Array(9).fill(null),
  }]);

  const handleClick = i => {
    const hist = history.slice(0, stepNumber + 1);
    const curr = hist[hist.length - 1];
    const sqrs = curr.squares.slice();
    if (calculateWinner(sqrs) || sqrs[i]) { return; }
    sqrs[i] = xIsNext ? 'X' : 'O';
    setStepNumber(hist.length);
    setXIsNext(!xIsNext);
    setHistory(hist.concat([{ squares: sqrs }]));
  };

  const jumpTo = step => {
    setStepNumber(step);
    setXIsNext(step % 2 === 0);
  };

  const current = history[stepNumber];
  const winner = calculateWinner(current.squares);
  const moves = history.map((step, move) => {
    const desc = move
      ? 'Revenir au tour n°' + move
      : 'Revenir au début de la partie';
    return (
      <li key={move}>
        <button onClick={() => jumpTo(move)}>{desc}</button>
      </li>
    );
  });
  const status = winner
    ? winner + ' a gagné'
    : 'Prochain joueur : ' + (xIsNext ? 'X' : 'O');
  return (
    <div className="game">
      <div className="game-board">
        <Board
          squares={current.squares}
          onClick={(i) => handleClick(i)}
        />
      </div>
      <div className="game-info">
        <div>{status}</div>
        <ol>{moves}</ol>
      </div>
    </div>
  );
};

export default Game;
