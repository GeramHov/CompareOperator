// LOGO ANIMATION

const logo = document.querySelector(".logo");
const logoHover = document.querySelector(".logo-hover");
const originalSrc = logo.src;
const hoverSrc = "../LOGO/logohover.png";

logo.addEventListener("mouseover", () => {
  logo.src = hoverSrc;
  logoHover.style.display = "block";
});

logo.addEventListener("mouseout", () => {
  logo.src = originalSrc;
  logoHover.style.display = "none";
});
