<script>
// Preloader Management
const preloader = document.getElementById('preloader');
window.addEventListener('load', function() {
    setTimeout(() => { preloader.classList.add('hidden'); }, 300);
});
window.addEventListener('pageshow', function(event) {
    preloader.classList.add('hidden');
});
window.addEventListener('beforeunload', function() {
    preloader.classList.remove('hidden');
});

// Page Transition on Link Click
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('a:not([target="_blank"]):not([href^="#"]):not([href^="mailto"]):not([href^="tel"])');
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (!href || href === '#' || href.startsWith('javascript:')) return;
            if (this.getAttribute('data-bs-toggle')) return;
            e.preventDefault();
            preloader.classList.remove('hidden');
            setTimeout(() => { window.location.href = href; }, 500);
        });
    });
});

// Navbar Scroll Effect
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('mainNavbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});
</script>
