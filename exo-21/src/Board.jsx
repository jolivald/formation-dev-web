import React from 'react';
import Square from './Square';

const loop3 = [0, 1, 2];

const Board = ({ squares, onClick }) => (
  <div>
    {loop3.map(i => (
      <div className="board-row">
        {loop3.map(j => {
          const value = j + (i * 3);
          return (<Square value={squares[value]} onClick={() => onClick(value)} />);
        })}
      </div>
    ))}
  </div>
);

export default Board;
