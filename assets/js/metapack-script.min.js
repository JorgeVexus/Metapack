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

        // 4. HEADER SMART SCROLL (Hide on scroll down, show on scroll up)
        const header = document.getElementById('mp-header');
        if (header) {
            console.log('Metapack: Smart scroll header initialized.');
            let lastScrollY = window.scrollY || window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;

            window.addEventListener('scroll', (e) => {
                const target = e.target === document ? document.documentElement : e.target;
                const currentScrollY = window.scrollY || window.pageYOffset || document.documentElement.scrollTop || (target && typeof target.scrollTop === 'number' ? target.scrollTop : 0) || 0;
                console.log('Metapack Scroll: scrollY = ' + currentScrollY + ', lastScrollY = ' + lastScrollY + ', eventTarget =', e.target);

                // Scrolled style (white background)
                if (currentScrollY > 30) {
                    header.classList.add('mp-header--scrolled');
                } else {
                    header.classList.remove('mp-header--scrolled');
                }

                // Hide/Show logic
                const isMenuOpen = navMenu && navMenu.classList.contains('mp-nav--is-open');
                if (currentScrollY > lastScrollY && currentScrollY > 150 && !isMenuOpen) {
                    // Scrolling down & past header height & menu is not open -> Hide
                    header.classList.add('mp-header--hidden');
                } else {
                    // Scrolling up -> Show
                    header.classList.remove('mp-header--hidden');
                }

                lastScrollY = currentScrollY;
            }, true); // Use capture phase to catch scroll events on any scrollable container
        } else {
            console.log('Metapack: Header element (#mp-header) not found.');
        }

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

        // 6. SLIDER DE TESTIMONIOS (Responsive, Touch & Infinite)
        const track = document.getElementById('mp-testimonialsTrack');
        const pagination = document.getElementById('mp-testimonialsPagination');
        if (track) {
            const slider = track.parentElement; // .mp-testimonials__slider
            const originalCards = Array.from(track.querySelectorAll('.mp-testimonial-card'));
            const cardCount = originalCards.length;

            if (cardCount > 1) {
                let currentIndex = 0;
                let isPaused = false;
                let sliderInterval;

                const dots = pagination ? Array.from(pagination.querySelectorAll('.mp-pagination-dot')) : [];

                const getCardStep = () => {
                    const firstCard = originalCards[0];
                    if (!firstCard) return 0;
                    const style = window.getComputedStyle(track);
                    const gap = parseFloat(style.columnGap || style.gap) || 0;
                    return firstCard.getBoundingClientRect().width + gap;
                };

                const setCurrentIndex = (nextIndex) => {
                    currentIndex = Math.max(0, Math.min(cardCount - 1, nextIndex));
                };

                const updateDots = () => {
                    if (dots.length === 0) return;
                    const activeIndex = currentIndex % cardCount;
                    dots.forEach((dot, idx) => {
                        if (idx === activeIndex) {
                            dot.classList.add('mp-pagination-dot--active');
                        } else {
                            dot.classList.remove('mp-pagination-dot--active');
                        }
                    });
                };

                const updateTestimonialTrack = (animate = true) => {
                    const cardStep = getCardStep();
                    if (!cardStep) return;
                    track.style.transition = animate ? 'transform 0.5s ease-in-out' : 'none';
                    track.style.transform = `translate3d(-${currentIndex * cardStep}px, 0, 0)`;
                    updateDots();
                };

                const moveSlider = () => {
                    if (isPaused) return;
                    setCurrentIndex(currentIndex === cardCount - 1 ? 0 : currentIndex + 1);
                    updateTestimonialTrack(true);
                };

                // Dot navigation clicks
                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        setCurrentIndex(index);
                        updateTestimonialTrack(true);
                        clearInterval(sliderInterval);
                        sliderInterval = setInterval(moveSlider, 3500);
                    });
                });

                // Init layout
                updateTestimonialTrack(false);

                // Recalcular el paso sin alterar el índice al rotar o redimensionar.
                window.addEventListener('resize', () => {
                    updateTestimonialTrack(false);
                });

                // Start Auto-play
                sliderInterval = setInterval(moveSlider, 3500);

                // Pause on hover
                track.addEventListener('mouseenter', () => isPaused = true);
                track.addEventListener('mouseleave', () => isPaused = false);

                // Touch handling for mobile swipe
                let touchStartX = 0;
                let touchEndX = 0;

                track.addEventListener('touchstart', e => {
                    touchStartX = e.changedTouches[0].screenX;
                    isPaused = true;
                }, { passive: true });

                track.addEventListener('touchend', e => {
                    touchEndX = e.changedTouches[0].screenX;
                    isPaused = false;
                    const diff = touchStartX - touchEndX;
                    if (Math.abs(diff) > 40) {
                        if (diff > 0) {
                            setCurrentIndex(currentIndex === cardCount - 1 ? 0 : currentIndex + 1);
                        } else {
                            setCurrentIndex(currentIndex === 0 ? cardCount - 1 : currentIndex - 1);
                        }
                        updateTestimonialTrack(true);
                        clearInterval(sliderInterval);
                        sliderInterval = setInterval(moveSlider, 3500);
                    }
                }, { passive: true });
            }
        }

        // 7. MAQUILA CAROUSEL (Re-implemented with touch & responsive fixes)
        const maquilaTrack = document.getElementById('mp-maquilaTrack');
        const maquilaPrev = document.getElementById('mp-maquilaPrev');
        const maquilaNext = document.getElementById('mp-maquilaNext');
        let maquilaIndex = 0;

        if (maquilaTrack) {
            const slides = maquilaTrack.querySelectorAll('.mp-maquila-slide');
            const slideCount = slides.length;

            function updateMaquilaSlide() {
                if (slides.length === 0) return;
                const viewport = maquilaTrack.parentElement;
                const slideWidth = viewport ? viewport.clientWidth : slides[0].offsetWidth;
                maquilaTrack.style.transition = 'transform 0.5s ease-in-out';
                maquilaTrack.style.transform = `translateX(-${maquilaIndex * slideWidth}px)`;
            }

            if (maquilaNext) {
                maquilaNext.addEventListener('click', function () {
                    if (maquilaIndex < slideCount - 1) {
                        maquilaIndex++;
                    } else {
                        maquilaIndex = 0; // Loop back
                    }
                    updateMaquilaSlide();
                });
            }

            if (maquilaPrev) {
                maquilaPrev.addEventListener('click', function () {
                    if (maquilaIndex > 0) {
                        maquilaIndex--;
                    } else {
                        maquilaIndex = slideCount - 1; // Loop to end
                    }
                    updateMaquilaSlide();
                });
            }

            // Touch swipe support for Maquila carousel
            let mTouchStartX = 0;
            let mTouchEndX = 0;

            maquilaTrack.addEventListener('touchstart', e => {
                mTouchStartX = e.changedTouches[0].screenX;
            }, { passive: true });

            maquilaTrack.addEventListener('touchend', e => {
                mTouchEndX = e.changedTouches[0].screenX;
                const diff = mTouchStartX - mTouchEndX;
                if (Math.abs(diff) > 40) {
                    if (diff > 0) {
                        if (maquilaIndex < slideCount - 1) maquilaIndex++;
                        else maquilaIndex = 0;
                    } else {
                        if (maquilaIndex > 0) maquilaIndex--;
                        else maquilaIndex = slideCount - 1;
                    }
                    updateMaquilaSlide();
                }
            }, { passive: true });

            // Handle window resize
            window.addEventListener('resize', updateMaquilaSlide);
        }

        // 8. COUNTER ANIMATION FOR STATS (Re-implemented from legacy)
        if ('IntersectionObserver' in window) {
            // .mp-stat-item__number = front-page KPIs
            // .mp-stat-animate       = quienes somos historia stats
            const statNumbers = document.querySelectorAll('.mp-stat-item__number, .mp-stat-animate');

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

        // 10. PRODUCTS CAROUSEL (Featured Products Slider)
        const prodViewport = document.querySelector('.mp-products__viewport');
        const prodTrack = document.getElementById('mp-productsTrack');
        const prodPagination = document.getElementById('mp-productsPagination');

        if (prodViewport && prodTrack && prodPagination) {
            const dots = prodPagination.querySelectorAll('.mp-pagination-dot');
            const slides = prodTrack.querySelectorAll('.mp-product-slide');

            if (slides.length > 0 && dots.length > 0) {
                let currentIndex = 0;

                const getPageWidth = () => {
                    const slide = slides[0];
                    const slideStyle = window.getComputedStyle(slide);
                    const marginLeft = parseFloat(slideStyle.marginLeft) || 0;
                    const marginRight = parseFloat(slideStyle.marginRight) || 0;
                    const slideWidth = slide.offsetWidth + marginLeft + marginRight;
                    return 3 * slideWidth;
                };

                function updateCarousel(isScrollEvent = false) {
                    if (!isScrollEvent) {
                        const pageWidth = getPageWidth();
                        prodViewport.scrollTo({
                            left: currentIndex * pageWidth,
                            behavior: 'smooth'
                        });
                    }

                    // Update active dot class
                    dots.forEach((dot, index) => {
                        if (index === currentIndex) {
                            dot.classList.add('mp-pagination-dot--active');
                        } else {
                            dot.classList.remove('mp-pagination-dot--active');
                        }
                    });
                }

                dots.forEach((dot, index) => {
                    dot.addEventListener('click', function () {
                        currentIndex = index;
                        updateCarousel(false);
                    });
                });

                // Listen to scroll events on viewport to update dots during swipe
                let scrollTimeout;
                prodViewport.addEventListener('scroll', () => {
                    clearTimeout(scrollTimeout);
                    scrollTimeout = setTimeout(() => {
                        const pageWidth = getPageWidth();
                        const scrollLeft = prodViewport.scrollLeft;
                        const newIndex = Math.round(scrollLeft / pageWidth);
                        if (newIndex !== currentIndex && newIndex < dots.length) {
                            currentIndex = newIndex;
                            updateCarousel(true);
                        }
                    }, 100);
                }, { passive: true });

                // Reset position on window resize to prevent alignment issues
                window.addEventListener('resize', () => {
                    currentIndex = 0;
                    updateCarousel(false);
                });
            }
        }

        // 11. BLOG CAROUSEL (Blog Slider)
        const blogViewport = document.querySelector('.mp-blog__viewport');
        const blogTrack = document.getElementById('mp-blogTrack');
        const blogPagination = document.getElementById('mp-blogPagination');

        if (blogViewport && blogTrack && blogPagination) {
            const dots = blogPagination.querySelectorAll('.mp-pagination-dot');
            const slides = blogTrack.querySelectorAll('.mp-blog-slide');

            if (slides.length > 0 && dots.length > 0) {
                let currentIndex = 0;

                const getPageWidth = () => {
                    const slide = slides[0];
                    const slideStyle = window.getComputedStyle(slide);
                    const marginLeft = parseFloat(slideStyle.marginLeft) || 0;
                    const marginRight = parseFloat(slideStyle.marginRight) || 0;
                    const slideWidth = slide.offsetWidth + marginLeft + marginRight;
                    return 2 * slideWidth;
                };

                function updateCarousel(isScrollEvent = false) {
                    if (!isScrollEvent) {
                        const pageWidth = getPageWidth();
                        blogViewport.scrollTo({
                            left: currentIndex * pageWidth,
                            behavior: 'smooth'
                        });
                    }

                    // Update active dot class
                    dots.forEach((dot, index) => {
                        if (index === currentIndex) {
                            dot.classList.add('mp-pagination-dot--active');
                        } else {
                            dot.classList.remove('mp-pagination-dot--active');
                        }
                    });
                }

                dots.forEach((dot, index) => {
                    dot.addEventListener('click', function () {
                        currentIndex = index;
                        updateCarousel(false);
                    });
                });

                // Listen to scroll events on viewport to update dots during swipe
                let scrollTimeout;
                blogViewport.addEventListener('scroll', () => {
                    clearTimeout(scrollTimeout);
                    scrollTimeout = setTimeout(() => {
                        const pageWidth = getPageWidth();
                        const scrollLeft = blogViewport.scrollLeft;
                        const newIndex = Math.round(scrollLeft / pageWidth);
                        if (newIndex !== currentIndex && newIndex < dots.length) {
                            currentIndex = newIndex;
                            updateCarousel(true);
                        }
                    }, 100);
                }, { passive: true });

                // Reset position on window resize to prevent alignment issues
                window.addEventListener('resize', () => {
                    currentIndex = 0;
                    updateCarousel(false);
                });
            }
        }

        console.log('--- METAPACK DEBUG READY ---');
    });

})();
