import React from 'react';

const Slider = ({ label, value, onChange }) => {
  const id = 'slider-'+label.toLowerCase();
  return (
    <div className="slider">
      <label htmlFor={id}>{label}</label>
      <input type="range" min="0" max="255" step="1"
        {...{ id, value }}
        onChange={event => onChange(event.target.value)}
      />
      <span>{value}</span>
    </div>
  );
};

export default Slider;
