const header = document.getElementById('header');
const logonav = document.getElementById('logo-nav');
const listnav = document.querySelector('.list-nav');

window.addEventListener('load', () => {
  if (headerStatus) {
    header.style.backgroundColor = '#2c4257cb';
    logonav.style.width = '30px';
    listnav.style.alignItems = 'center';
    listnav.style.margin = '15px';
  }
  console.log(headerStatus);
});

window.addEventListener('scroll', () => {
  let scroll = window.scrollY; // Corrected to window.scrollY
  if (scrolls) {
    if (!headerStatus) {
      if (scroll > 450) {
        header.style.backgroundColor = '#2c4257cb';
        logonav.style.width = '30px';
        listnav.style.margin = '15px';
        listnav.style.alignItems = 'center'; // Added alignItems setting
      } else if (scroll < 430) {
        header.style.backgroundColor = 'transparent';
        logonav.style.width = '60px';
        listnav.style.margin = '20px';
        listnav.style.alignItems = 'normal';
      }
    }
  }
});
