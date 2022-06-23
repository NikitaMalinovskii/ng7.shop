// Javascript for responsive navigation sidebar menu

var menu = document.querySelector(".menu");
var menuBtn = document.querySelector(".menu-btn");
var closeBtn = document.querySelector(".close-btn");

menuBtn.addEventListener('click', function(){
    menu.classList.add('active');
    console.log('test')
})

closeBtn.addEventListener('click', function(){
    menu.classList.remove('active');
})