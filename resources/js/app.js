import './bootstrap';
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import { initThreeBackground } from './ThreeBackground';

Alpine.plugin(intersect);

Alpine.directive('tilt', (el) => {
    el.style.transformStyle = 'preserve-3d';

    el.addEventListener('mousemove', (e) => {
        const rect = el.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        // Calculate rotation (max 15 degrees)
        const rotateX = ((y - centerY) / centerY) * -10;
        const rotateY = ((x - centerX) / centerX) * 10;

        el.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
        el.style.transition = 'transform 0.1s ease-out';
    });

    el.addEventListener('mouseleave', () => {
        el.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
        el.style.transition = 'transform 0.5s ease-out';
    });
});

window.Alpine = Alpine;
Alpine.start();

// Init 3D Background if canvas exists
document.addEventListener('DOMContentLoaded', () => {
    initThreeBackground('bg-canvas');
});
