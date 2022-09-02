const nav_bar = document.querySelector(".nav-bar");
const logo = document.querySelector(".logo");
const navbarbgdark = document.querySelector(".navbar-bg-dark");

const responsive = window.matchMedia('(max-width: 992px)');

if (responsive.matches) {
    logo.onclick = function() {  
        if (nav_bar.hasAttribute("open")) {
            nav_bar.removeAttribute("open");
            navbarbgdark.removeAttribute("open");
        } else {
            nav_bar.setAttribute("open", "");
            navbarbgdark.setAttribute("open", "");
        }
    };  
}
