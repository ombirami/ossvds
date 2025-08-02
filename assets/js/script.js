// OSSVDS – Sanatan Utility Script

document.addEventListener('DOMContentLoaded', function () {
    // Navigation highlight
    const current = location.pathname.split("/").slice(-1)[0];
    const links = document.querySelectorAll("nav a");
    links.forEach(link => {
        if (link.getAttribute("href") === current) {
            link.classList.add("active");
        }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Simple alert button (for example/testing)
    const notifyBtns = document.querySelectorAll('.notify-btn');
    notifyBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            alert('🚩 जय श्री राम! OSSVDS सेवा में आपका स्वागत है।');
        });
    });
});
