// Sidebar Navigation Link
const navLinks = document.querySelectorAll(".nav__link");

navLinks.forEach((link) => link.addEventListener("click", onClickNavlink));

function onClickNavlink(e) {
    e.preventDefault();
    this.lastElementChild.classList.toggle("show-menu");
}
