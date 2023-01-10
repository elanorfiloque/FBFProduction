
var opened = false;
console.log("hello"); 
var nav = document.getElementById("nav");
var Btn = document.getElementById("Btn");

    Btn.onclick = toggleNav;

function toggleNav() {
    nav.classList.toggle("active");
    opened = !opened;
    console.log(opened);

    if(opened) {
        document.documentElement.style.overflow = 'hidden';
    } else {
        document.documentElement.style.overflow = 'unset';
    }
}
