const openMenu = document.querySelector("#menu-icon");
const menu1 = document.querySelector("#menu1");
const menu2 = document.querySelector("#menu2");
const nav = document.querySelector("#nav");

let menuOpen = false;

openMenu.addEventListener("click", () => {
  if (menuOpen) {
    // Si el menú está abierto, ciérralo
    menu1.classList.add("hidden");
    menu2.classList.remove("ml");
    nav.classList.remove("nav");
    menuOpen = false;
  } else {
    // Si el menú está cerrado, ábrelo
    menu1.classList.remove("hidden");
    menu2.classList.add("ml");
    nav.classList.add("nav");
    menuOpen = true;
  }
});
