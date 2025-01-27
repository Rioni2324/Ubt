document.addEventListener("DOMContentLoaded", function () {
    const burgerMenu = document.querySelector('.burger-menu');
    const navLinks = document.querySelector('.nav-links');

    burgerMenu.addEventListener('click', function () {
        navLinks.classList.toggle('active');
    });
});


function toggleContent(button) {
    const content = button.previousElementSibling;
    content.style.display = content.style.display === 'block' ? 'none' : 'block';
    button.textContent = content.style.display === 'block' ? 'LESS' : 'MORE';
}


document.querySelector('.slider-track').addEventListener('animationiteration', () => {
    const track = document.querySelector('.slider-track');
    track.style.animation = 'none';
    void track.offsetHeight; 
    track.style.animation = 'scroll 20s linear infinite';
});


window.addEventListener('resize', () => {
    const track = document.querySelector('.slider-track');
    track.style.animation = 'none';
    void track.offsetHeight;
    track.style.animation = 'scroll 20s linear infinite';
});