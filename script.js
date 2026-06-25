// script.js

// Dynamic footer year
const yearSpan = document.getElementById("year");
if (yearSpan) {
  yearSpan.textContent = new Date().getFullYear();
}

// Simple fake submit for the contact form (front-end only)
/*
const contactForm = document.querySelector('.contact__form');

if (contactForm) {
  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    alert('Thanks for reaching out! This form is not connected to a backend yet.');
  });
}
*/