{{-- <footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <h4 class="footer-title">About EventHub</h4>
                <p class="footer-text">Your ultimate destination for managing and discovering amazing events. Create, share, and celebrate moments together.</p>
            </div>
            
            <div class="footer-col">
                <h4 class="footer-title">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="#category">Categories</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4 class="footer-title">Contact Info</h4>
                <p class="footer-text">Email: info@eventhub.com</p>
                <p class="footer-text">Phone: +1 (555) 123-4567</p>
                <p class="footer-text">Location: New York, USA</p>
            </div>
            
            <div class="footer-col">
                <h4 class="footer-title">Follow Us</h4>
                <div class="social-links">
                    <a href="#" class="social-link">Facebook</a>
                    <a href="#" class="social-link">Twitter</a>
                    <a href="#" class="social-link">Instagram</a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2024 EventHub. All rights reserved.</p>
        </div>
    </div>
</footer> --}}
 <link rel="stylesheet" href="{{ asset('css/user.css') }}">
<footer class="footer">
    <!-- Wave Animation -->
   

    <div class="container">
        <!-- Footer Grid -->
        <div class="footer-grid">
            <!-- About Column -->
            <div class="footer-col footer-col-about" data-scroll-animation="fade-up" style="--delay: 0.5s">
                <div class="footer-logo">
                   
                    <span class="logo-text">EventHub</span>
                </div>
                <p class="footer-text">Your ultimate destination for managing and discovering amazing events. Create, share, and celebrate moments together.</p>              
            </div>
            
            <!-- Contact Column -->
            <div class="footer-col" data-scroll-animation="fade-up" style="--delay: 0.2s">
                <h4 class="footer-title">
                    <span class="title-icon"><i class="fas fa-address-book"></i></span>
                    Contact Info
                </h4>
                <ul class="footer-contact">
                    <li>
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-info">
                            <span class="contact-label">Email</span>
                            <a href="mailto:info@eventhub.com">info@eventhub.com</a>
                        </div>
                    </li>
                    <li>
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-info">
                            <span class="contact-label">Phone</span>
                            <a href="tel:+15551234567">+1 (555) 123-4567</a>
                        </div>
                    </li>
                    <li>
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-info">
                            <span class="contact-label">Location</span>
                            <span>New York, USA</span>
                        </div>
                    </li>
                </ul>
            </div>            
            <!-- Social Column -->
            <div class="footer-col" data-scroll-animation="fade-up" style="--delay: 0.3s">
                <h4 class="footer-title">
                    <span class="title-icon"><i class="fas fa-share-alt"></i></span>
                    Follow Us
                </h4>
                <p class="footer-text">Connect with us on social media for latest updates and events</p>
                
                <div class="social-links">
                    <a href="#" class="social-link" data-social="facebook">
                        <i class="fab fa-facebook-f"></i>
                        <span class="social-tooltip">Facebook</span>
                    </a>
                    <a href="#" class="social-link" data-social="twitter">
                        <i class="fab fa-twitter"></i>
                        <span class="social-tooltip">Twitter</span>
                    </a>
                    <a href="#" class="social-link" data-social="instagram">
                        <i class="fab fa-instagram"></i>
                        <span class="social-tooltip">Instagram</span>
                    </a>
                    <a href="#" class="social-link" data-social="linkedin">
                        <i class="fab fa-linkedin-in"></i>
                        <span class="social-tooltip">LinkedIn</span>
                    </a>
                    <a href="#" class="social-link" data-social="youtube">
                        <i class="fab fa-youtube"></i>
                        <span class="social-tooltip">YouTube</span>
                    </a>
                </div>
   
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <p class="copyright">
                    <span class="brand">EventHub</span>
                    <span class="separator">|</span>                    
                    All rights reserved
                </p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
            
            <!-- Back to Top Button -->
            <button class="back-to-top" id="backToTop">
                <i class="fas fa-arrow-up"></i>
                <span class="top-text">Top</span>
            </button>
        </div>
    </div>
    
    <!-- Background Decoration -->
    <div class="footer-decoration">
        <div class="deco-circle circle-1"></div>
        <div class="deco-circle circle-2"></div>
        <div class="deco-circle circle-3"></div>
    </div>
</footer>
  <script src="{{ asset('js/user.js') }}"></script>
{{-- <style>
    
</style> --}}
{{-- <script>

    </script> --}}