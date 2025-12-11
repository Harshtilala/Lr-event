  

        // Sidebar Toggle Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const darkModeToggle = document.getElementById('darkModeToggle');
            const body = document.body;

            // Mobile sidebar toggle
            if (window.innerWidth <= 768) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });
            }

            // Close sidebar on mobile when clicking outside
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                        sidebar.classList.remove('show');
                    }
                }
            });

            // Animate content on page load
            const contentCards = document.querySelectorAll('.card, .glass-card');
            contentCards.forEach((card, index) => {
                card.classList.add('content-card');
                card.style.animationDelay = `${index * 0.1}s`;
            });

            // Page transition effect for navigation
            const navLinks = document.querySelectorAll('.sidebar-menu a');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const mainContent = document.querySelector('.content-wrapper');
                    mainContent.style.animation = 'fadeOut 0.3s ease-out';
                    
                    setTimeout(() => {
                        mainContent.style.animation = 'fadeInUp 0.5s ease-out';
                    }, 300);
                });
            });
        });

        // Additional animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'slideInUp 0.6s ease-out forwards';
                }
            });
        }, observerOptions);

        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('.animate-on-scroll');
            animatedElements.forEach(el => observer.observe(el));
        });
           // Extra button to hide sidebar
const hideSidebarToggle = document.getElementById('hideSidebarToggle');

if (hideSidebarToggle) {
    hideSidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('hidden');
        mainContent.classList.toggle('hidden');
    });
}

    