"use strict";

const slider = document.querySelector('.slider');
const quantity = document.querySelector('[for=test-quantity]');
const START_VALUE = 5;

slider.value = START_VALUE;

slider.addEventListener('input', (evt) => {
    slider.step = 1;

    if (slider.value < 3) {
        slider.style.backgroundColor = '#22bf09';
    }

    if (slider.value >= 3 && slider.value <= 5) {
        slider.step = 2;
        slider.style.backgroundColor = '#efe309';
    }

    if (slider.value >= 6 && slider.value <= 8) {
        slider.style.backgroundColor = '#d90718';
    }

    if (slider.value > 8) {
        slider.value = 10;
        slider.style.backgroundColor = '#000000';
    }

    quantity.textContent = `Количество - ${slider.value}`;
});
