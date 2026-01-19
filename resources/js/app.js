import './bootstrap';
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import { initThreeBackground } from './ThreeBackground';

Alpine.plugin(intersect);

Alpine.directive('tilt', (el) => {
    el.style.transformStyle = 'preserve-3d';
    el.style.transform = 'perspective(1000px)';

    // Glare element
    const glare = document.createElement('div');
    glare.style.position = 'absolute';
    glare.style.inset = '0';
    glare.style.background = 'linear-gradient(125deg, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 60%)';
    glare.style.opacity = '0';
    glare.style.transition = 'opacity 0.3s ease-out';
    glare.style.pointerEvents = 'none';
    glare.style.borderRadius = 'inherit';
    el.appendChild(glare);

    el.addEventListener('mousemove', (e) => {
        const rect = el.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const rotateX = ((y - centerY) / centerY) * -5; // Reduced intensity for premium feel
        const rotateY = ((x - centerX) / centerX) * 5;

        // Apply 3D transform
        el.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
        el.style.transition = 'transform 0.1s ease-out';

        // Glare logic
        glare.style.opacity = '0.1'; // Subtle constant glare on hover
        glare.style.transform = `translateX(${(x - centerX) / 5}px) translateY(${(y - centerY) / 5}px)`;
    });

    el.addEventListener('mouseleave', () => {
        el.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
        el.style.transition = 'transform 0.6s cubic-bezier(0.23, 1, 0.32, 1)'; // Smooth spring-like return
        glare.style.opacity = '0';
    });
});

window.Alpine = Alpine;
Alpine.start();

// Init 3D Background if canvas exists
document.addEventListener('DOMContentLoaded', () => {
    initThreeBackground('bg-canvas');
});
