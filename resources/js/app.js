import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { TextPlugin } from 'gsap/TextPlugin';

gsap.registerPlugin(ScrollTrigger, TextPlugin);

window.Alpine = Alpine;
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

document.addEventListener('alpine:init', () => {
    Alpine.data('mobileMenu', () => ({
        open: false,
        init() {
            this.$watch('open', (val) => {
                document.body.style.overflow = val ? 'hidden' : '';
            });
        },
        toggle() {
            this.open = !this.open;
        },
        close() {
            this.open = false;
        },
    }));

    Alpine.data('cartDrawer', () => ({
        open: false,
        toggle() {
            this.open = !this.open;
        },
        close() {
            this.open = false;
        },
    }));

    Alpine.data('searchModal', () => ({
        open: false,
        query: '',
        results: [],
        toggle() {
            this.open = !this.open;
            if (this.open) {
                this.$nextTick(() => this.$refs.searchInput?.focus());
            }
        },
        close() {
            this.open = false;
            this.query = '';
        },
    }));

    Alpine.data('quantityInput', () => ({
        qty: 1,
        increment() {
            this.qty++;
        },
        decrement() {
            if (this.qty > 1) this.qty--;
        },
    }));

    Alpine.data('accordion', () => ({
        activePanel: null,
        toggle(index) {
            this.activePanel = this.activePanel === index ? null : index;
        },
    }));

    Alpine.data('productGallery', () => ({
        activeIndex: 0,
        images: [],
        setActive(index) {
            this.activeIndex = index;
        },
        next() {
            this.activeIndex = (this.activeIndex + 1) % this.images.length;
        },
        prev() {
            this.activeIndex = (this.activeIndex - 1 + this.images.length) % this.images.length;
        },
    }));

    Alpine.data('tabGroup', () => ({
        activeTab: 0,
        setTab(index) {
            this.activeTab = index;
        },
    }));

    Alpine.data('notification', () => ({
        show: false,
        message: '',
        type: 'success',
        init() {
            window.addEventListener('notify', (e) => {
                this.message = e.detail.message;
                this.type = e.detail.type || 'success';
                this.show = true;
                setTimeout(() => { this.show = false; }, 4000);
            });
        },
    }));

    Alpine.data('particles', () => ({
        particles: [],
        init() {
            this.createParticles();
        },
        createParticles() {
            const container = this.$el;
            const particleCount = 15;
            
            for (let i = 0; i < particleCount; i++) {
                this.particles.push({
                    id: i,
                    size: Math.random() * 8 + 4,
                    left: Math.random() * 100,
                    delay: Math.random() * 5,
                    duration: Math.random() * 10 + 10,
                    opacity: Math.random() * 0.4 + 0.1,
                    type: Math.random() > 0.5 ? 'square' : 'circle',
                    color: ['#2563eb', '#10b981', '#f97316', '#8b5cf6'][Math.floor(Math.random() * 4)]
                });
            }
        }
    }));
});

Alpine.start();

gsap.config({ nullTargets: true });

document.addEventListener('DOMContentLoaded', () => {
    initializeAnimations();
    initializeScrollEffects();
    initialize3DEffects();
    initializeParallax();
});

function initializeAnimations() {
    const heroSection = document.querySelector('.hero-section');
    if (heroSection) {
        const heroTexts = heroSection.querySelectorAll('.animate-hero-text');
        const heroImages = heroSection.querySelectorAll('.animate-hero-image');
        const heroBtns = heroSection.querySelectorAll('.animate-hero-btn');

        if (heroTexts.length > 0) {
            gsap.from(heroTexts, {
                y: 60,
                opacity: 0,
                duration: 0.9,
                stagger: 0.15,
                ease: 'power3.out',
                delay: 0.2
            });
        }

        if (heroImages.length > 0) {
            gsap.from(heroImages, {
                x: 100,
                opacity: 0,
                scale: 0.9,
                duration: 1.2,
                delay: 0.5,
                ease: 'power3.out'
            });
        }

        if (heroBtns.length > 0) {
            gsap.from(heroBtns, {
                y: 30,
                opacity: 0,
                duration: 0.7,
                stagger: 0.1,
                delay: 0.8,
                ease: 'power2.out'
            });
        }

        const badges = heroSection.querySelectorAll('.badge-sale, .badge-new');
        if (badges.length > 0) {
            gsap.from(badges, {
                scale: 0,
                opacity: 0,
                duration: 0.5,
                delay: 1.2,
                ease: 'back.out(1.7)'
            });
        }
    }
}

function initializeScrollEffects() {
    gsap.utils.toArray('.animate-on-scroll').forEach((element) => {
        const delay = element.dataset.delay ? parseFloat(element.dataset.delay) : 0;
        
        if (element.classList.contains('animate-slide-up')) {
            gsap.fromTo(element,
                { y: 80, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.8,
                    delay,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 85%',
                        end: 'bottom 20%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        } else if (element.classList.contains('animate-slide-left')) {
            gsap.fromTo(element,
                { x: -100, opacity: 0 },
                {
                    x: 0,
                    opacity: 1,
                    duration: 0.8,
                    delay,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 85%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        } else if (element.classList.contains('animate-slide-right')) {
            gsap.fromTo(element,
                { x: 100, opacity: 0 },
                {
                    x: 0,
                    opacity: 1,
                    duration: 0.8,
                    delay,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 85%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        } else if (element.classList.contains('animate-scale-in')) {
            gsap.fromTo(element,
                { scale: 0.8, opacity: 0 },
                {
                    scale: 1,
                    opacity: 1,
                    duration: 0.7,
                    delay,
                    ease: 'back.out(1.5)',
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 85%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        } else if (element.classList.contains('animate-rotate-in')) {
            gsap.fromTo(element,
                { rotation: -10, opacity: 0, scale: 0.9 },
                {
                    rotation: 0,
                    opacity: 1,
                    scale: 1,
                    duration: 0.8,
                    delay,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 85%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        } else {
            gsap.fromTo(element,
                { y: 40, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.7,
                    delay,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 85%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        }
    });

    gsap.utils.toArray('.card.card-hover, .card-glow').forEach((card, index) => {
        gsap.fromTo(card,
            { y: 60, opacity: 0 },
            {
                y: 0,
                opacity: 1,
                duration: 0.6,
                delay: index * 0.08,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: card,
                    start: 'top 88%',
                    toggleActions: 'play none none reverse'
                }
            }
        );
    });

    gsap.utils.toArray('.section-heading').forEach((heading) => {
        gsap.fromTo(heading,
            { y: 40, opacity: 0 },
            {
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: heading,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            }
        );
    });

    gsap.utils.toArray('.section-subheading').forEach((subheading) => {
        gsap.fromTo(subheading,
            { y: 30, opacity: 0 },
            {
                y: 0,
                opacity: 1,
                duration: 0.7,
                delay: 0.1,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: subheading,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            }
        );
    });
}

function initialize3DEffects() {
    gsap.utils.toArray('.perspective-1000 .card-glow, .perspective-1000 .card').forEach((card) => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 15;
            const rotateY = (centerX - x) / 15;
            
            gsap.to(card, {
                rotateX: -rotateX,
                rotateY: rotateY,
                scale: 1.02,
                duration: 0.4,
                ease: 'power2.out'
            });
        });
        
        card.addEventListener('mouseleave', () => {
            gsap.to(card, {
                rotateX: 0,
                rotateY: 0,
                scale: 1,
                duration: 0.5,
                ease: 'power2.out'
            });
        });
    });

    gsap.utils.toArray('.float-card').forEach((card) => {
        gsap.to(card, {
            y: '+=15',
            duration: 2.5,
            ease: 'sine.inOut',
            yoyo: true,
            repeat: -1,
            delay: Math.random() * 2
        });
    });
}

function initializeParallax() {
    gsap.utils.toArray('[data-parallax]').forEach((element) => {
        const speed = parseFloat(element.dataset.parallax) || 0.5;
        
        gsap.to(element, {
            yPercent: 30 * speed,
            ease: 'none',
            scrollTrigger: {
                trigger: element,
                start: 'top bottom',
                end: 'bottom top',
                scrub: true
            }
        });
    });

    const bgElements = document.querySelectorAll('.bg-parallax');
    bgElements.forEach((el) => {
        gsap.to(el, {
            backgroundPosition: '50% 100%',
            ease: 'none',
            scrollTrigger: {
                trigger: el,
                start: 'top bottom',
                end: 'bottom top',
                scrub: true
            }
        });
    });
}

window.createFloatingParticles = function(containerId, options = {}) {
    const container = document.getElementById(containerId);
    if (!container) return;

    const count = options.count || 20;
    const colors = options.colors || ['#2563eb', '#10b981', '#f97316'];
    const shapes = options.shapes || ['circle', 'square', 'diamond'];

    for (let i = 0; i < count; i++) {
        const particle = document.createElement('div');
        const size = Math.random() * 10 + 4;
        const shape = shapes[Math.floor(Math.random() * shapes.length)];
        const color = colors[Math.floor(Math.random() * colors.length)];
        
        particle.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            background: ${color};
            opacity: ${Math.random() * 0.3 + 0.1};
            left: ${Math.random() * 100}%;
            pointer-events: none;
            z-index: 1;
            ${shape === 'circle' ? 'border-radius: 50%;' : ''}
            ${shape === 'diamond' ? 'transform: rotate(45deg);' : ''}
        `;

        container.appendChild(particle);

        gsap.to(particle, {
            y: `-${window.innerHeight + 100}px`,
            duration: Math.random() * 15 + 15,
            ease: 'none',
            repeat: -1,
            delay: Math.random() * 10,
            onRepeat: () => {
                particle.style.left = `${Math.random() * 100}%`;
            }
        });

        gsap.to(particle, {
            x: `+=${Math.random() * 100 - 50}px`,
            duration: Math.random() * 5 + 3,
            ease: 'sine.inOut',
            repeat: -1,
            yoyo: true
        });

        gsap.to(particle, {
            opacity: 0,
            duration: Math.random() * 3 + 2,
            ease: 'sine.inOut',
            repeat: -1,
            yoyo: true
        });
    }
};

window.animateNumber = function(element, target, duration = 1000) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current).toLocaleString();
    }, 16);
};
