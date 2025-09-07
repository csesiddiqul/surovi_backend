
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
