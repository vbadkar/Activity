// funtion for hamburger toggle
const hamburger = document.querySelector('.hamburger');
const list = document.querySelector('.list');
const icon = document.querySelector('.close');
hamburger.addEventListener('click', function(){
    list.classList.toggle('show');
    hamburger.classList.toggle('hide');
    icon.classList.toggle('show');
});
icon.addEventListener('click', function(){
    list.classList.toggle('show');
    hamburger.classList.remove('hide');
    icon.classList.remove('show');
});