const hamburger = document.querySelector('.hamburger');
const list = document.querySelector('.list');
hamburger.addEventListener('click', function(){
    list.classList.toggle('show');
});
