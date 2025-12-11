@extends('user.layouts.master')

@section('title', 'Home - Event Management')

@section('content')
 <link rel="stylesheet" href="{{ asset('css/user.css') }}">
<!-- Slider Section -->
<section class="slider">
    <div class="slider-container">
        
{{-- @foreach ($slider as $index => $slid)
    @if($slid->status != 0)
        <div class="slider-item {{ $index == 0 ? 'active' : '' }}">
            <img src="{{ asset('slider/' . $slid->image) }}" alt="Conference Event" style="opacity: 0.5;">
            <div class="slider-content">
                <h1 class="slider-title">{{ $slid->title }}</h1>
                <p class="slider-text">{{ $slid->description }}</p>
                <button class="cta-button">Get Started</button>
            </div>
        </div>
    @endif
@endforeach --}}
<div class="slider-item active">
    <video autoplay loop muted playsinline
        style="width:100%; height:100%; object-fit:cover; opacity:0.5;">
        <source src="{{ asset('slider/VN20251210_213033.mp4') }}" type="video/mp4">
    </video>

    <div class="slider-content">
        <!-- Rotating Title -->
        <h1 class="slider-title animated-text" id="dynamicTitle">
            Book Smarter. Celebrate Better.
        </h1>

        <!-- Rotating Description -->
        <p class="slider-text animated-text" id="dynamicDesc">
            We bring your vision to life with world-class event planning and seamless execution.
        </p>

        <button class="cta-button">Get Started</button>
    </div>
</div>

<style>
    .animated-text {
        opacity: 0;
        transition: opacity 1s ease;
    }
    .animated-text.show {
        opacity: 1;
    }
</style>

<script>
    const titles = [
        "Book Smarter. Celebrate Better.",
        "Get Your Tickets with Just One Click",
        "One Platform. Endless Events.",
        "Turning Moments Into Memories"
    ];

    const descriptions = [
        "We bring your vision to life with world-class event planning and seamless execution.",
        "Fast, simple, and reliable ticket booking for all your favorite events.",
        "A single platform where every event meets the perfect audience.",
        "Creating memories through unforgettable event experiences."
    ];

    let index = 0;

    function updateContent() {
        const titleEl = document.getElementById('dynamicTitle');
        const descEl = document.getElementById('dynamicDesc');

        // Fade Out
        titleEl.classList.remove('show');
        descEl.classList.remove('show');

        setTimeout(() => {
            // Change Text
            index = (index + 1) % titles.length;
            titleEl.textContent = titles[index];
            descEl.textContent = descriptions[index];

            // Fade In
            titleEl.classList.add('show');
            descEl.classList.add('show');
        }, 1000);
    }

    // Initial show animation on load
    document.getElementById('dynamicTitle').classList.add('show');
    document.getElementById('dynamicDesc').classList.add('show');

    // Update every 4 seconds
    setInterval(updateContent, 4000);
</script>


  
</section>

<!-- Category Section -->

<section class="category-section" id="category">
    <div class="container">
        <div class="section-header">
            <div class="header-badge">
                <span class="badge-icon">✦</span>
                <span class="badge-text">Our Services</span>
            </div>
            <h2 class="section-title">Event Categories</h2>
            <p class="section-subtitle">Discover amazing events we manage for you</p>
            <div class="title-underline">
                <span class="underline-dot"></span>
            </div>
        </div>
        
        <div class="category-grid">
            <!-- Category 1 - Conferences -->
            <div class="category-card" data-scroll="fade-up">
                <div class="category-image">
                    <img src="https://www.shutterstock.com/image-vector/garba-night-poster-navratri-dussehra-260nw-2510322977.jpg?w=400&h=300&fit=crop" alt="Conferences">
                    <div class="color-overlay" style="background: linear-gradient(135deg, rgba(99, 102, 241, 0.85), rgba(168, 85, 247, 0.85));"></div>
                </div>
                <div class="category-info">
              
                    <h3 class="category-name">Navratri</h3>
                </div>
            </div>

       <div class="category-card" data-scroll="fade-up">
    <div class="category-image">
        <img src="https://images.unsplash.com/photo-1603228254119-e6a4d095dc59?fm=jpg&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG9saSUyMGZlc3RpdmFsfGVufDB8fDB8fHww&ixlib=rb-4.1.0&q=60&w=3000?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop" alt="Holi">
        <div class="color-overlay" style="background: linear-gradient(135deg, rgba(236, 72, 153, 0.85), rgba(239, 68, 68, 0.85));"></div>
    </div>
    <div class="category-info">
      
        <h3 class="category-name">Holi</h3>
    </div>
</div>
            <!-- Category 3 - Concerts -->
            <div class="category-card" data-scroll="fade-up">
                <div class="category-image">
                    <img src="https://images.unsplash.com/photo-1501386761578-eac5c94b800a?w=400&h=300&fit=crop" alt="Concerts">
                    <div class="color-overlay" style="background: linear-gradient(135deg, rgba(245, 158, 11, 0.85), rgba(251, 146, 60, 0.85));"></div>
                </div>
                <div class="category-info">
                   
                    <h3 class="category-name">Music Concerts</h3>
                </div>
            </div>

            <!-- Category 4 - Sports Events -->
            <div class="category-card" data-scroll="fade-up">
                <div class="category-image">
                    <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=400&h=300&fit=crop" alt="Sports Events">
                    <div class="color-overlay" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.85), rgba(5, 150, 105, 0.85));"></div>
                </div>
                <div class="category-info">
                 
                    <h3 class="category-name">Sports Events</h3>
                </div>
            </div>

            <!-- Category 5 - Exhibitions -->
            <div class="category-card" data-scroll="fade-up">
                <div class="category-image">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=400&h=300&fit=crop" alt="Exhibitions">
                    <div class="color-overlay" style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.85), rgba(124, 58, 237, 0.85));"></div>
                </div>
                <div class="category-info">
                   
                    <h3 class="category-name">Exhibitions</h3>
                </div>
            </div>

            <!-- Category 6 - Networking -->
            <div class="category-card" data-scroll="fade-up">
                <div class="category-image">
                    <img src="http://www.hamaraevent.com/uploads/blog/0832549001497083011.jpg?w=400&h=300&fit=crop" alt="Networking">
                    <div class="color-overlay" style="background: linear-gradient(135deg, rgba(14, 165, 233, 0.85), rgba(59, 130, 246, 0.85));"></div>
                </div>
                <div class="category-info">
                  
                    <h3 class="category-name">New Year Party</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>
</section>



<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<!-- About Section -->
{{-- <section class="about-section" id="about">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2 class="about-title">About EventHub</h2>
                <p class="about-para">EventHub is your comprehensive platform for managing and discovering incredible events. Whether you're organizing a corporate conference, a music festival, or an intimate wedding, our platform provides all the tools you need.</p>
                <p class="about-para">With a user-friendly interface and powerful features, we make event management simple and enjoyable. Connect with thousands of event enthusiasts and create memorable experiences.</p>
                
                <div class="about-features">
                    <div class="feature-item">
                        <span class="feature-icon">✓</span>
                        <span class="feature-text">Easy Event Creation</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">✓</span>
                        <span class="feature-text">Real-time Notifications</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">✓</span>
                        <span class="feature-text">Secure Ticketing</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">✓</span>
                        <span class="feature-text">Analytics Dashboard</span>
                    </div>
                </div>
                
                <button class="cta-button">Learn More</button>
            </div>
            
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=500&h=500&fit=crop" alt="About EventHub">
            </div>
        </div>
    </div>
</section> --}}

<section class="about-section" id="about">
    <div class="container">
        <div class="about-content">
            <div class="about-text" data-scroll-animation="fade-left">
                <div class="about-badge">
                    <span class="badge-dot"></span>
                    <span class="badge-label">About Us</span>
                </div>
                <h2 class="about-title">
                    <span class="word" style="--word-index: 0">About</span>
                    <span class="word" style="--word-index: 1">EventHub</span>
                </h2>
                <p class="about-para">EventHub is your comprehensive platform for managing and discovering incredible events. Whether you're organizing a corporate conference, a music festival, or an intimate wedding, our platform provides all the tools you need.</p>
                <p class="about-para">With a user-friendly interface and powerful features, we make event management simple and enjoyable. Connect with thousands of event enthusiasts and create memorable experiences.</p>
             
                
                <div class="about-features">
                    <div class="feature-item" data-scroll-animation="fade-up" style="--delay: 0.4s">
                        <span class="feature-icon">
                            <i class="fas fa-check"></i>
                            <span class="icon-ripple"></span>
                        </span>
                        <span class="feature-text">Easy Event Creation</span>
                    </div>
                    <div class="feature-item" data-scroll-animation="fade-up" style="--delay: 0.5s">
                        <span class="feature-icon">
                            <i class="fas fa-check"></i>
                            <span class="icon-ripple"></span>
                        </span>
                        <span class="feature-text">Real-time Notifications</span>
                    </div>
                    <div class="feature-item" data-scroll-animation="fade-up" style="--delay: 0.6s">
                        <span class="feature-icon">
                            <i class="fas fa-check"></i>
                            <span class="icon-ripple"></span>
                        </span>
                        <span class="feature-text">Secure Ticketing</span>
                    </div>
                    <div class="feature-item" data-scroll-animation="fade-up" style="--delay: 0.7s">
                        <span class="feature-icon">
                            <i class="fas fa-check"></i>
                            <span class="icon-ripple"></span>
                        </span>
                        <span class="feature-text">Analytics Dashboard</span>
                    </div>
                </div>
                
              
                <button class="cta-button" data-scroll-animation="fade-up" style="--delay: 1.1s">
                    <span class="btn-text">Learn More</span>
                    <span class="btn-icon"><i class="fas fa-arrow-right"></i></span>
                    <span class="btn-glow"></span>
                </button>
            </div>
            
            <div class="about-image" data-scroll-animation="fade-right">
                <div class="image-wrapper">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=500&h=500&fit=crop" alt="About EventHub">
                    <div class="image-overlay"></div>
                    <div class="image-decoration decoration-1"></div>
                    <div class="image-decoration decoration-2"></div>
                    
                    <!-- Animated Corner Brackets -->
                    <div class="corner-bracket bracket-tl"></div>
                    {{-- <div class="corner-bracket bracket-tr"></div> --}}
                    {{-- <div class="corner-bracket bracket-bl"></div> --}}
                    <div class="corner-bracket bracket-br"></div>
                </div>
                
                <!-- Floating Elements -->
                <div class="floating-badge">
                    <div class="badge-icon-wrapper">
                        <i class="fas fa-award"></i>
                        <span class="badge-shine"></span>
                    </div>                    
                </div>
                
                <!-- Floating Shapes -->
                <div class="floating-shape shape-circle">
                    <i class="fas fa-star"></i>
                </div>
                <div class="floating-shape shape-square">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="floating-shape shape-triangle">
                    <i class="fas fa-bolt"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Particle Background -->
    <div class="particles-container">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    
    <!-- Background Decoration -->
    <div class="about-bg-decoration">
        <div class="decoration-circle circle-1"></div>
        <div class="decoration-circle circle-2"></div>
        <div class="decoration-line line-1"></div>
        <div class="decoration-line line-2"></div>
    </div>
</section>

@endsection