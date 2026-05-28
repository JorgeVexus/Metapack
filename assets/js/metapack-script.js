/**
 * METAPACK - Scripts Globales (v1.0.3)
 */

(function () {
    "use strict";

    if (window.metapackInitialized) return;
    window.metapackInitialized = true;

    document.addEventListener('DOMContentLoaded', function () {
        console.log('--- METAPACK DEBUG START ---');

        // 1. MENU MÓVIL
        const btnToggle = document.getElementById('mp-navToggle');
        const navMenu = document.getElementById('mp-nav');

        if (btnToggle && navMenu) {
            btnToggle.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                const isOpen = navMenu.classList.contains('mp-nav--is-open');
                if (isOpen) {
                    navMenu.classList.remove('mp-nav--is-open');
                    btnToggle.classList.remove('mp-toggle--is-active');
                    document.body.style.overflow = '';
                } else {
                    navMenu.classList.add('mp-nav--is-open');
                    btnToggle.classList.add('mp-toggle--is-active');
                    document.body.style.overflow = 'hidden';
                }
            });

            const links = navMenu.querySelectorAll('a');
            links.forEach(link => {
                link.addEventListener('click', () => {
                    navMenu.classList.remove('mp-nav--is-open');
                    btnToggle.classList.remove('mp-toggle--is-active');
                    document.body.style.overflow = '';
                });
            });
        }

        // 2. ACORDEÓN DE FAQ
        const faqItems = document.querySelectorAll('.mp-faq-item');
        faqItems.forEach(item => {
            const question = item.querySelector('.mp-faq-item__question');
            if (question) {
                question.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const wasOpen = item.classList.contains('mp-item--is-open');
                    faqItems.forEach(i => i.classList.remove('mp-item--is-open'));
                    if (!wasOpen) {
                        item.classList.add('mp-item--is-open');
                    }
                });
            }
        });

        // 3. ANIMACIONES AL SCROLL (Refactored for faster reveal)
        const revealElements = document.querySelectorAll('.mp-reveal-up, .mp-reveal-left, .mp-reveal-right, .mp-reveal-zoom, .mp-reveal-scale, .mp-reveal-blur');
        console.log('Metapack: Reveal elements found:', revealElements.length);

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, {
                threshold: 0.05, // Trigger as soon as 5% is visible
                rootMargin: '50px' // Start 50px before entering
            });

            revealElements.forEach(el => {
                // Force reveal if it's already at the top of the page
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight) {
                    el.classList.add('active');
                } else {
                    observer.observe(el);
                }
            });
        } else {
            revealElements.forEach(el => el.classList.add('active'));
        }

        // 4. HEADER SHADOW
        const header = document.getElementById('mp-header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 30) {
                header.classList.add('mp-header--scrolled');
            } else {
                header.classList.remove('mp-header--scrolled');
            }
        });

        // 5. CUSTOM FILE UPLOAD
        const fileInputs = document.querySelectorAll('.mp-file-input');
        fileInputs.forEach(input => {
            input.addEventListener('change', function (e) {
                const container = this.closest('.mp-file-upload-container');
                if (!container) return;

                const title = container.querySelector('.mp-file-title');
                const subtitle = container.querySelector('.mp-file-subtitle');

                if (this.files && this.files.length > 0) {
                    const fileName = this.files[0].name;
                    if (title) title.textContent = fileName;
                    if (subtitle) subtitle.textContent = 'Archivo seleccionado';
                    container.classList.add('has-file');
                } else {
                    // Reset defaults if cleared
                    if (title) title.textContent = 'Adjuntar referencia o logotipo (Opcional)';
                    if (subtitle) subtitle.textContent = 'JPG, PNG o PDF hasta 5MB';
                    container.classList.remove('has-file');
                }
            });
        });

        // 6. TESTIMONIALS INFINITE SLIDER
        const track = document.getElementById('mp-testimonialsTrack');
        if (track) {
            const originalCards = track.querySelectorAll('.mp-testimonial-card');
            const cardCount = originalCards.length;

            if (cardCount > 3) {
                // Clone all cards for infinite effect
                // We clone enough to cover the viewport width + buffer
                originalCards.forEach(card => {
                    const clone = card.cloneNode(true);
                    clone.setAttribute('aria-hidden', 'true');
                    track.appendChild(clone);
                });

                let currentIndex = 0;
                let isPaused = false;
                let sliderInterval;

                // Function to get current card width (responsive)
                const getCardWidth = () => {
                    const card = track.querySelector('.mp-testimonial-card');
                    const style = window.getComputedStyle(track);
                    const gap = parseFloat(style.gap) || 30; // 30px from CSS
                    return card.offsetWidth + gap;
                };

                const moveSlider = () => {
                    if (isPaused) return;

                    currentIndex++;
                    const cardWidth = getCardWidth();

                    track.style.transition = 'transform 0.5s ease-in-out';
                    track.style.transform = `translateX(-${currentIndex * cardWidth}px)`;

                    // Reset when reaching the end of original set
                    if (currentIndex >= cardCount) {
                        setTimeout(() => {
                            track.style.transition = 'none';
                            currentIndex = 0;
                            track.style.transform = `translateX(0)`;
                        }, 500); // 500 matches transition duration
                    }
                };

                // Start Auto-play
                sliderInterval = setInterval(moveSlider, 3500);

                // Pause on hover
                track.addEventListener('mouseenter', () => isPaused = true);
                track.addEventListener('mouseleave', () => isPaused = false);

                // Touch handling for mobile
                let touchStartX = 0;
                let touchEndX = 0;

                track.addEventListener('touchstart', e => {
                    touchStartX = e.changedTouches[0].screenX;
                    isPaused = true;
                }, { passive: true });

                track.addEventListener('touchend', e => {
                    touchEndX = e.changedTouches[0].screenX;
                    isPaused = false;
                    // Simple swipe check
                    /*
                    if (touchStartX - touchEndX > 50) {
                        // Swiped Left (Next)
                        moveSlider();
                        // Reset interval to avoid double jump
                        clearInterval(sliderInterval);
                        sliderInterval = setInterval(moveSlider, 3500);
                    }
                    */
                }, { passive: true });
            }
        }

        // 7. MAQUILA CAROUSEL (Re-implemented from legacy)
        const maquilaTrack = document.getElementById('mp-maquilaTrack');
        const maquilaPrev = document.getElementById('mp-maquilaPrev');
        const maquilaNext = document.getElementById('mp-maquilaNext');
        let maquilaIndex = 0;

        if (maquilaTrack && maquilaPrev && maquilaNext) {
            const slides = maquilaTrack.querySelectorAll('.mp-maquila-slide');
            const slideCount = slides.length;

            function updateMaquilaSlide() {
                if (slides.length === 0) return;
                const slideWidth = slides[0].offsetWidth; // Full width of slide
                maquilaTrack.style.transition = 'transform 0.5s ease-in-out';
                maquilaTrack.style.transform = `translateX(-${maquilaIndex * slideWidth}px)`;
            }

            maquilaNext.addEventListener('click', function () {
                if (maquilaIndex < slideCount - 1) {
                    maquilaIndex++;
                } else {
                    maquilaIndex = 0; // Loop back
                }
                updateMaquilaSlide();
            });

            maquilaPrev.addEventListener('click', function () {
                if (maquilaIndex > 0) {
                    maquilaIndex--;
                } else {
                    maquilaIndex = slideCount - 1; // Loop to end
                }
                updateMaquilaSlide();
            });

            // Handle window resize
            window.addEventListener('resize', updateMaquilaSlide);
        }

        // 8. COUNTER ANIMATION FOR STATS (Re-implemented from legacy)
        if ('IntersectionObserver' in window) {
            const statNumbers = document.querySelectorAll('.mp-stat-item__number'); // Updated class name from front-page.php

            const counterObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        const text = target.textContent;

                        // Only animate if it contains a number
                        if (text.match(/\d+/)) {
                            const number = parseInt(text.replace(/[^\d]/g, ''));
                            const prefix = text.match(/^[^\d]*/) ? text.match(/^[^\d]*/)[0] : '';
                            const suffix = text.replace(/^[^\d]*\d+/, '');

                            animateCounter(target, number, prefix, suffix);
                        }

                        // Stop observing once animated
                        counterObserver.unobserve(target);
                    }
                });
            }, { threshold: 0.5 });

            statNumbers.forEach(function (stat) {
                counterObserver.observe(stat);
            });
        }

        function animateCounter(element, target, prefix, suffix) {
            let current = 0;
            const duration = 2000; // 2 seconds
            const steps = 60;
            const increment = target / steps;
            const intervalTime = duration / steps;

            const timer = setInterval(function () {
                current += increment;
                if (current >= target) {
                    element.textContent = prefix + target + suffix;
                    clearInterval(timer);
                } else {
                    element.textContent = prefix + Math.floor(current) + suffix;
                }
            }, intervalTime);
        }

        // 9. VIDEO PERFORMANCE OPTIMIZATION (Pause when off-screen)
        const heroVideo = document.querySelector('.mp-hero__video');
        if (heroVideo && 'IntersectionObserver' in window) {
            const videoObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (!entry.isIntersecting && !heroVideo.paused) {
                        heroVideo.pause();
                    } else if (entry.isIntersecting && heroVideo.paused) {
                        heroVideo.play().catch(() => { }); // Catch autoplay restrictions
                    }
                });
            }, { threshold: 0.25 });
            videoObserver.observe(heroVideo);
        }

        console.log('--- METAPACK DEBUG READY ---');
    });

})();
