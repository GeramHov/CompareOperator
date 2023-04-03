const logo = document.querySelector('.logo');
const originalSrc = logo.src;
const hoverSrc = '../LOGO/logohover.png';

logo.addEventListener('mouseover', () => {
        logo.src = hoverSrc;
});

logo.addEventListener('mouseout', () => {
    logo.src = originalSrc;
});