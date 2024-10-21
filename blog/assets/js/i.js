// ======================= humburger ===============================

document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementsByClassName('toggle-btn')[0];
    const navbarLinks = document.getElementsByClassName('navbar-links')[0];
  
    toggleButton.addEventListener('click', () => {
      navbarLinks.classList.toggle('active');
    });
  }
);


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
      









