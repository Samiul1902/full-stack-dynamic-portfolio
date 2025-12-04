// public/js/app.js

document.addEventListener('DOMContentLoaded', () => {
    // ---------- Smooth scroll for internal links ----------
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', event => {
            const href = link.getAttribute('href');
            if (!href || href === '#') return;

            const targetId = href.substring(1);
            const target = document.getElementById(targetId);

            if (target) {
                event.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // ---------- Animate skill bars when visible ----------
    const skillBars = document.querySelectorAll('.skill-bar-fill');

    if (skillBars.length > 0 && 'IntersectionObserver' in window) {
        const skillsObserver = new IntersectionObserver(
            entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const level = entry.target.getAttribute('data-level') || 0;
                        entry.target.style.width = level + '%';
                    }
                });
            },
            { threshold: 0.3 }
        );

        skillBars.forEach(bar => skillsObserver.observe(bar));
    } else {
        // Fallback: just set width immediately if IntersectionObserver not supported
        skillBars.forEach(bar => {
            const level = bar.getAttribute('data-level') || 0;
            bar.style.width = level + '%';
        });
    }

    // ---------- Fade-in animation for cards & timeline ----------
    const animatedItems = document.querySelectorAll(
        '.project-card, .timeline-item'
    );

    animatedItems.forEach(item => {
        item.classList.add('fade-hidden');
    });

    if ('IntersectionObserver' in window) {
        const fadeObserver = new IntersectionObserver(
            entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                        fadeObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.2 }
        );

        animatedItems.forEach(item => fadeObserver.observe(item));
    } else {
        animatedItems.forEach(item => item.classList.add('fade-in'));
    }
});
