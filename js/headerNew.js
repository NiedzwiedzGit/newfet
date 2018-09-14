//select dom items
const menuBtn = document.querySelector(".logo");
const header = document.querySelector(".header");

const subMenuPortfolio = document.querySelector(".sub-menu-portfolio");
const navMenuPortfolio = document.querySelector(".nav-sub-item-container");

const subMenuLoginA = document.querySelector(".sub-menu-login>a");
const subMenuLogin = document.querySelector(".sub-menu-login");
const navMenuLogin = document.querySelector(".login");

const subMenuLanguageA = document.querySelector(".sub-menu-language span");
const subMenuLanguage = document.querySelector(".sub-menu-language");
const navMenuLanguage = document.querySelector(".language");

const navItems = document.querySelectorAll(".nav-item");

//set initial state of the menu
let showMenu = false;
let showSubMenu = false;

menuBtn.addEventListener("click", toggleMenu);
function toggleMenu() {
  if (!showMenu) {
    menuBtn.classList.add("close");
    header.classList.add("show");
    /*menuNav.classList.add("show");
    menuBranding.classList.add("show");*/
    navItems.forEach(item => item.classList.add("show"));

    //set menu state
    showMenu = true;
  } else {
    menuBtn.classList.remove("close");
    header.classList.remove("show");
    /*menuNav.classList.remove("show");
    menuBranding.classList.remove("show");*/
    navItems.forEach(item => item.classList.remove("show"));

    //set menu state
    showMenu = false;
  }
}

subMenuPortfolio.addEventListener("click", subbMenu);
function subbMenu() {
  if (!showSubMenu) {
    subMenuPortfolio.classList.add("flow");
    navMenuPortfolio.classList.add("show");

    subMenuLanguage.classList.remove("flow");
    navMenuLanguage.classList.remove("show");
    //set submenu state
    showSubMenu = true;
  } else {
    subMenuPortfolio.classList.remove("flow");
    navMenuPortfolio.classList.remove("show");
    //set submenu state
    showSubMenu = false;
  }
}

//login menu listener
subMenuLoginA.addEventListener("click", subbMenulogin);
function subbMenulogin() {
  if (!showSubMenu) {
    subMenuLogin.classList.add("flow");
    navMenuLogin.classList.add("show");
    navItems.forEach(item => item.classList.add("hide"));

    subMenuPortfolio.classList.remove("flow");
    navMenuPortfolio.classList.remove("show");
    //set submenu state
    showSubMenu = true;
  } else {
    subMenuLogin.classList.remove("flow");
    navMenuLogin.classList.remove("show");
    navItems.forEach(item => item.classList.remove("hide"));
    //set submenu state
    showSubMenu = false;
  }
}

//language menu listener
subMenuLanguageA.addEventListener("click", subbMenuLanguage);
function subbMenuLanguage() {
  if (!showSubMenu) {
    subMenuLanguage.classList.add("flow");
    navMenuLanguage.classList.add("show");

    subMenuPortfolio.classList.remove("flow");
    navMenuPortfolio.classList.remove("show");
    //set submenu state
    showSubMenu = true;
  } else {
    subMenuLanguage.classList.remove("flow");
    navMenuLanguage.classList.remove("show");
    //set submenu state
    showSubMenu = false;
  }
}
