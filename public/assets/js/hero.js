const heroSection = document.querySelector('.hero-section');
const prevHero = document.getElementById('prev-hero');
const nextHero = document.getElementById('next-hero');
const backgroundChangeInterval = 5000;
let i = 0;
let interval;

const updateBackgroundImage = () => {
  heroSection.style.backgroundImage = `url(${backgroundHero[i]})`;
};

updateBackgroundImage();

const startAutoSlide = () => {
  interval = window.setInterval(() => {
    i = (i + 1) % backgroundHero.length;
    updateBackgroundImage();
  }, backgroundChangeInterval);
};

prevHero.addEventListener('click', () => {
  i = (i - 1 + backgroundHero.length) % backgroundHero.length;
  updateBackgroundImage();
  resetAutoSlide();
});

nextHero.addEventListener('click', () => {
  i = (i + 1) % backgroundHero.length;
  updateBackgroundImage();
  resetAutoSlide();
});

const resetAutoSlide = () => {
  clearInterval(interval);
  startAutoSlide();
};

startAutoSlide();
