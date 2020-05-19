import React from 'react';

const Slider = ({ label, value, onChange }) => {
  const id = 'slider-'+label.toLowerCase();
  const dispatch = event =>  onChange(event.target.value);
  return (
    <div className="slider">
      <label htmlFor={id}>{label}</label>
      <input type="range" min="0" max="255" step="1"
        {...{ id, value }}
        onChange={dispatch}
      />
      <input type="number" min="0" max="255" step="1" size="3"
        value={value}
        onChange={dispatch}
      />
    </div>
  );
};

export default Slider;
