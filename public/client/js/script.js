const element = document.getElementById('scrolling-text');
const text = "This is a sample scrolling text that scrolls to the right continuously.";
let index = 0;

function showCharacters() {
    if (index <= text.length) {
        element.textContent = text.slice(0, index);
        index++;
        setTimeout(showCharacters, 25); // speed control
    } else {
        setTimeout(() => {
            element.textContent = "";
            index = 0;
            showCharacters();
        }, 1500); // pause after full text
    }
}

showCharacters();



document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card');

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => observer.observe(card));
});
const backToTop = document.getElementById("backToTop");
window.onscroll = function () {
    backToTop.style.display = (document.documentElement.scrollTop > 100) ? "block" : "none";
};
backToTop.onclick = function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};

const lightbox = GLightbox({
    selector: '.glightbox'
});
