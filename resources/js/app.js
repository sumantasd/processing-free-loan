import './bootstrap';
import Alpine from 'alpinejs';
import { createIcons, icons } from 'lucide';

window.Alpine = Alpine;
window.createLucideIcons = () => {
    createIcons({ icons });
};

document.addEventListener('DOMContentLoaded', () => {
    createIcons({ icons });
});

// Re-run icons when Alpine updates DOM or modal opens
document.addEventListener('alpine:initialized', () => {
    createIcons({ icons });
});

Alpine.start();
