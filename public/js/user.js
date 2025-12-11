
  // ==================== Enhanced About Section Animations ====================

function initializeAboutAnimations() {
    const animatedElements = document.querySelectorAll('[data-scroll-animation]');
    
    const observerOptions = {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                
                // Start counter animation if it's a stat item
                if (entry.target.classList.contains('stat-item')) {
                    const statNumber = entry.target.querySelector('.stat-number');
                    if (statNumber) {
                        animateCounter(statNumber);
                    }
                }
                
                // Start skill bar animation
                if (entry.target.classList.contains('skill-item')) {
                    const progressBar = entry.target.querySelector('.skill-progress');
                    const percentage = entry.target.querySelector('.skill-percentage');
                    if (progressBar && percentage) {
                        animateSkillBar(progressBar, percentage);
                    }
                }
                
                // Unobserve after animation
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    animatedElements.forEach(element => {
        observer.observe(element);
    });
}

/**
 * Animate Counter Numbers
 */
function animateCounter(element) {
    const target = parseInt(element.getAttribute('data-count'));
    const duration = 2000;
    const increment = target / (duration / 16);
    let current = 0;
    
    const timer = setInterval(() => {
        current += increment;
        
        if (current >= target) {
            element.textContent = formatNumber(target);
            clearInterval(timer);
        } else {
            element.textContent = formatNumber(Math.floor(current));
        }
    }, 16);
}

/**
 * Animate Skill Progress Bars
 */
function animateSkillBar(progressBar, percentageElement) {
    const targetProgress = parseInt(progressBar.getAttribute('data-progress'));
    const targetPercentage = parseInt(percentageElement.getAttribute('data-percentage'));
    
    // Animate progress bar width
    setTimeout(() => {
        progressBar.style.width = targetProgress + '%';
    }, 100);
    
    // Animate percentage counter
    let current = 0;
    const duration = 2000;
    const increment = targetPercentage / (duration / 16);
    
    const timer = setInterval(() => {
        current += increment;
        
        if (current >= targetPercentage) {
            percentageElement.textContent = targetPercentage + '%';
            clearInterval(timer);
        } else {
            percentageElement.textContent = Math.floor(current) + '%';
        }
    }, 16);
}

/**
 * Format Number with Commas
 */
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

/**
 * Add ripple effect to feature items
 */
function initializeFeatureAnimations() {
    const features = document.querySelectorAll('.feature-item');
    
    features.forEach(feature => {
        feature.addEventListener('mouseenter', function() {
            const ripple = this.querySelector('.icon-ripple');
            if (ripple) {
                ripple.style.animation = 'none';
                setTimeout(() => {
                    ripple.style.animation = 'ripple 0.6s ease-out';
                }, 10);
            }
        });
    });
}

/**
 * Parallax effect for floating shapes
 */
function initializeParallaxShapes() {
    const shapes = document.querySelectorAll('.floating-shape');
    
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        
        shapes.forEach((shape, index) => {
            const speed = (index + 1) * 0.05;
            shape.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
}

/**
 * Interactive particle effect
 */
function initializeParticleInteraction() {
    const particles = document.querySelectorAll('.particle');
    
    document.addEventListener('mousemove', (e) => {
        const mouseX = e.clientX;
        const mouseY = e.clientY;
        
        particles.forEach(particle => {
            const rect = particle.getBoundingClientRect();
            const particleX = rect.left + rect.width / 2;
            const particleY = rect.top + rect.height / 2;
            
            const deltaX = mouseX - particleX;
            const deltaY = mouseY - particleY;
            const distance = Math.sqrt(deltaX * deltaX + deltaY * deltaY);
            
            if (distance < 200) {
                const angle = Math.atan2(deltaY, deltaX);
                const force = (200 - distance) / 200;
                const moveX = Math.cos(angle) * force * 20;
                const moveY = Math.sin(angle) * force * 20;
                
                particle.style.transform = `translate(${-moveX}px, ${-moveY}px)`;
            } else {
                particle.style.transform = 'translate(0, 0)';
            }
        });
    });
}

/**
 * Add 3D tilt effect to image
 */
function initialize3DTilt() {
    const imageWrapper = document.querySelector('.image-wrapper');
    
    if (imageWrapper) {
        imageWrapper.addEventListener('mousemove', (e) => {
            const rect = imageWrapper.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;
            
            imageWrapper.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
        });
        
        imageWrapper.addEventListener('mouseleave', () => {
            imageWrapper.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
        });
    }
}

// Initialize all animations on DOM ready
document.addEventListener('DOMContentLoaded', function() {
    initializeAboutAnimations();
    initializeFeatureAnimations();
    initializeParallaxShapes();
    initializeParticleInteraction();
    initialize3DTilt();
});

// ----------------category start

// Intersection Observer for Scroll Animations
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.category-card');
    
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    cards.forEach(card => {
        observer.observe(card);
    });
    
    // Optional: Add different animation types on scroll
    const animationTypes = ['fadeUp', 'slideInLeft', 'slideInRight', 'scaleIn', 'rotateIn'];
    
    // You can randomize animations if you want
    // cards.forEach((card, index) => {
    //     const randomAnimation = animationTypes[Math.floor(Math.random() * animationTypes.length)];
    //     card.setAttribute('data-scroll', randomAnimation);
    // });
    
    // Header Animation
    const header = document.querySelector('.section-header');
    header.style.opacity = '0';
    header.style.transform = 'translateY(-30px)';
    header.style.transition = 'all 0.8s ease';
    
    setTimeout(() => {
        header.style.opacity = '1';
        header.style.transform = 'translateY(0)';
    }, 100);
});

// Optional: Parallax effect on scroll
window.addEventListener('scroll', function() {
    const shapes = document.querySelectorAll('.shape');
    const scrolled = window.pageYOffset;
    
    shapes.forEach((shape, index) => {
        const speed = (index + 1) * 0.1;
        shape.style.transform = `translateY(${scrolled * speed}px)`;
    });
});



// ----------------------FOOTER



function initializeFooterAnimations() {
    const footerElements = document.querySelectorAll('[data-scroll-animation]');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    footerElements.forEach(element => {
        observer.observe(element);
    });
}

/**
 * Back to Top Button Functionality
 */
function initializeBackToTop() {
    const backToTopBtn = document.getElementById('backToTop');
    
    if (!backToTopBtn) return;
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.add('show');
        } else {
            backToTopBtn.classList.remove('show');
        }
    });
    
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

/**
 * Social Links Animation
 */
function initializeSocialLinks() {
    const socialLinks = document.querySelectorAll('.social-link');
    
    socialLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.animation = 'none';
            setTimeout(() => {
                this.style.animation = '';
            }, 10);
        });
    });
}

// Initialize all footer functions
document.addEventListener('DOMContentLoaded', function() {
    initializeFooterAnimations();
    initializeBackToTop();
    initializeSocialLinks();
});