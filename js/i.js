// ======================= humburger ===============================

document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementsByClassName('toggle-btn')[0];
    const navbarLinks = document.getElementsByClassName('navbar-links')[0];
  
    toggleButton.addEventListener('click', () => {
      navbarLinks.classList.toggle('active');
    });
  }
);

//========================pre-loder ====================================


// var loader = document.getElementById("preloader");
//         window.addEventListener("load", function(){
//             loader.style.display="none";
// });

// ================================ index.html  (map section - tip generator js)==========================================

const travelTips = [
  "Always carry a photocopy of your passport when traveling abroad.",
  "Research local customs and traditions before visiting a new country.",
  "Pack light to make traveling more convenient and enjoyable.",
  "Use a money belt or hidden pouch to keep your valuables safe.",
  "Learn a few basic phrases in the local language to communicate with locals.",
  "Keep important documents and contact information in a secure digital format.",
  "Stay hydrated and carry a reusable water bottle while traveling.",
  "Take breaks and rest when needed, especially on long journeys.",
  "Be respectful of the environment and local wildlife during outdoor activities.",
  "Stay flexible and open-minded when unexpected changes occur during your trip.",
  "Always have some local currency on hand for small purchases.",
  "Check the weather forecast before packing for your trip.",
  "Keep a first aid kit handy for emergencies.",
  "Respect the local customs and dress modestly when visiting religious sites.",
  "Be mindful of your belongings in crowded tourist areas.",
  "Explore local cuisine and try new foods.",
  "Stay connected with loved ones by sharing your travel experiences.",
  "Be aware of local scams and tourist traps.",
  "Research transportation options in advance to save time and money.",
  "Take photos but also take time to put down your camera and enjoy the moment.",
  "Keep an open mind and embrace cultural differences.",
  "Plan activities that cater to everyone's interests when traveling with family or friends.",
  "Always have travel insurance to cover unexpected expenses.",
  "Respect the environment by minimizing waste and using eco-friendly products.",
  "Stay informed about local laws and regulations to avoid any legal issues.",
  "Engage with locals to learn more about the destination and its culture.",
  "Take care of your health by getting enough rest and staying active.",
  "Learn basic phrases in the local language to communicate with locals.",
  "Keep an eye on your belongings in crowded areas.",
  "Be cautious when trying new foods, especially if you have allergies.",
  "Stay hydrated and drink plenty of water, especially in hot climates.",
  "Take breaks and rest when needed, especially on long journeys.",
  "Stay flexible with your plans and be prepared for unexpected changes.",
  "Be respectful of local customs and traditions.",
  "Keep important documents and valuables secure.",
  "Use sunscreen to protect your skin from sunburn.",
  "Be mindful of your surroundings and stay alert to potential dangers.",
  "Take time to relax and enjoy the experience.",
  "Be courteous to locals and fellow travelers.",
  "Support local businesses and artisans.",
  "Learn about the history and culture of the places you visit.",
  "Stay safe and have fun!"
];

let currentTipIndex = 0;
const tipElement = document.getElementById('tip');

function generateTip() {
  tipElement.textContent = travelTips[currentTipIndex];
  currentTipIndex = (currentTipIndex + 1) % travelTips.length;
}
setInterval(generateTip, 2000);



// ====================== index.html (TESTIMONIAL AUOPLAY) ===============================
 
let currentSlide = 0;
const slides = document.querySelectorAll('.testimonial-card');
const totalSlides = slides.length;

// Initialize by showing the first slide
slides[currentSlide].classList.add('active');

// Function to go to the next slide
function nextSlide() {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide + 1) % totalSlides; // Go to the next slide, loop back if on the last slide
    slides[currentSlide].classList.add('active');
}

// Function to go to the previous slide
function prevSlide() {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; // Go to the previous slide, loop back if on the first slide
    slides[currentSlide].classList.add('active');
}

// Event listeners for arrow clicks
document.getElementById('next').addEventListener('click', nextSlide);
document.getElementById('prev').addEventListener('click', prevSlide);

// Auto-slide every 500 seconds (500,000 milliseconds)
setInterval(nextSlide, 5000); // 500 seconds = 500,000 milliseconds

// ====================== Teetime.html - NewsSwitch tabs ===============================
function openTab(tabName) {
var tabContents = document.querySelectorAll('.tab-content');
tabContents.forEach(tab => {
  tab.style.display = 'none';
});
var tabButtons = document.querySelectorAll('.tab-btn');
tabButtons.forEach(btn => {
  btn.classList.remove('active');
});
document.getElementById(tabName + '-tab').style.display = 'block';
document.querySelector('[onclick="openTab(\'' + tabName + '\')"]').classList.add('active');
}
openTab('All');
      









