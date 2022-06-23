// Javascript for navigation bar effect on scroll

window.addEventListener('scroll', function(){
    var navbar = document.querySelector(".navbar");
    navbar.classList.toggle('sticky', window.scrollY);
})