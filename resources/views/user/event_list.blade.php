{{-- resources/views/user/events/index.blade.php --}}
@extends('user.layouts.master')

@section('content')
<title>Events - Our Amazing Events</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: #f8f9fa;
        overflow-x: hidden;
        color: #333;
    }

    /* Hero Section */
    .hero {
        height: 100vh;
        min-height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .hero::before {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        background-size: 50px 50px;
        animation: moveBackground 20s linear infinite;
    }

    @keyframes moveBackground {
        0% {
            transform: translate(0, 0);
        }

        100% {
            transform: translate(50px, 50px);
        }
    }

    .hero-content {
        text-align: center;
        z-index: 1;
        color: white;
        padding: 0 20px;
        width: 100%;
        max-width: 1200px;
    }

    .hero h1 {
        font-size: clamp(2.5rem, 8vw, 5rem);
        font-weight: 700;
        margin-bottom: 20px;
        opacity: 0;
        transform: translateY(-50px);
        animation: fadeInDown 1s ease forwards;
    }

    .hero p {
        font-size: clamp(1rem, 3vw, 1.5rem);
        opacity: 0;
        transform: translateY(50px);
        animation: fadeInUp 1s ease 0.3s forwards;
        margin-bottom: 30px;
    }

    .hero-stats {
        display: flex;
        justify-content: center;
        gap: 50px;
        margin-top: 40px;
        opacity: 0;
        animation: fadeInUp 1s ease 0.6s forwards;
        flex-wrap: wrap;
    }

    .hero-stat {
        text-align: center;
        min-width: 120px;
    }

    .hero-stat .number {
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 700;
        display: block;
        margin-bottom: 5px;
    }

    .hero-stat .label {
        font-size: clamp(0.8rem, 2vw, 1rem);
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    @keyframes fadeInDown {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Floating Shapes */
    .shape {
        position: absolute;
        opacity: 0.1;
        animation: float 6s ease-in-out infinite;
    }

    .shape:nth-child(1) {
        top: 10%;
        left: 10%;
        width: 80px;
        height: 80px;
        background: white;
        border-radius: 50%;
        animation-delay: 0s;
    }

    .shape:nth-child(2) {
        top: 60%;
        right: 10%;
        width: 120px;
        height: 120px;
        background: white;
        border-radius: 30%;
        animation-delay: 2s;
    }

    .shape:nth-child(3) {
        bottom: 10%;
        left: 20%;
        width: 100px;
        height: 100px;
        background: white;
        clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        animation-delay: 4s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0) rotate(0deg);
        }

        50% {
            transform: translateY(-30px) rotate(10deg);
        }
    }

    /* Container */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        width: 100%;
    }

    /* Section Styling */
    section {
        padding: clamp(50px, 10vw, 100px) 0;
        position: relative;
    }

    .section-white {
        background: #fff;
    }

    /* Scroll Reveal Elements */
    .scroll-reveal-scale {
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .scroll-reveal-scale.active {
        opacity: 1;
        transform: scale(1);
    }

    /* Events Grid */
    .events-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(min(100%, 350px), 1fr));
        gap: clamp(20px, 3vw, 40px);
        margin-top: 15px;
        width: 100%;
        justify-items: stretch;
        align-items: start;
    }

    /* Event Card */
    .event-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.233);
        transition: all 0.4s ease;
        cursor: pointer;
        position: relative;
        height: clamp(220px, 30vw, 280px);
        width: 100%;
    }

    .event-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }

    /* Touch devices - prevent transform on tap */
    @media (hover: none) and (pointer: coarse) {
        .event-card:hover {
            transform: translateY(-5px);
        }
    }

    .event-banner {
        width: 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .event-banner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .event-card:hover .event-banner img {
        transform: scale(1.1);
    }

    /* Event Title - Always Visible */
    .event-title-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(41, 41, 41, 0.521) 0%, rgba(44, 44, 44, 0.322) 70%, transparent 100%);
        padding: clamp(20px, 3vw, 30px) clamp(15px, 2vw, 20px) clamp(15px, 2vw, 20px);
        z-index: 2;
        transition: all 0.4s ease;
    }

    .event-title-overlay h3 {
        font-size: clamp(1rem, 2.5vw, 1.5rem);
        font-weight: 700;
        color: white;
        margin: 0;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Event Title - Always Visible at Bottom */
    .event-title-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.7) 70%, transparent 100%);
        padding: clamp(25px, 3vw, 35px) clamp(15px, 2vw, 20px) clamp(15px, 2vw, 20px);
        z-index: 2;
        transition: all 0.4s ease;
    }

    .event-title-overlay h3 {
        font-size: clamp(1.1rem, 2.5vw, 1.6rem);
        font-weight: 700;
        color: white;
        margin: 0;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    /* Hover Details Overlay */
    .event-hover-details {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(37, 37, 37, 0.644) 0%, rgba(51, 51, 51, 0.603) 100%);
        padding: clamp(15px, 3vw, 25px);
        display: flex;
        flex-direction: column;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.4s ease;
        z-index: 3;
    }

    .event-card:hover .event-hover-details {
        opacity: 1;
        visibility: visible;
    }

    /* Mobile/Tablet: Show details on tap */
    @media (hover: none) and (pointer: coarse) {
        .event-card.active .event-hover-details {
            opacity: 1;
            visibility: visible;
        }
    }

    .event-hover-details h3 {
        font-size: clamp(1.1rem, 3vw, 1.8rem);
        font-weight: 700;
        color: white;
        margin-bottom: clamp(15px, 3vw, 25px);
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .event-hover-details .event-meta {
        display: flex;
        flex-direction: column;
        gap: clamp(10px, 2vw, 15px);
    }

    .event-hover-details .event-meta-item {
        display: flex;
        align-items: center;
        gap: clamp(10px, 2vw, 15px);
        color: white;
        font-size: clamp(0.75rem, 1.8vw, 1rem);
    }

    .event-hover-details .event-meta-item i {
        color: white;
        font-size: clamp(1rem, 2.2vw, 1.3rem);
        width: 25px;
        text-align: center;
        flex-shrink: 0;
    }

    .event-hover-details .event-meta-item span {
        font-weight: 500;
        line-height: 1.4;
    }

    .event-date-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background: white;
        padding: clamp(10px, 2vw, 15px);
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        z-index: 2;
    }

    .event-date-badge .day {
        font-size: clamp(1.3rem, 3vw, 2rem);
        font-weight: 700;
        color: #667eea;
        line-height: 1;
    }

    .event-date-badge .month {
        font-size: clamp(0.7rem, 1.5vw, 0.9rem);
        color: #666;
        text-transform: uppercase;
        margin-top: 5px;
    }

    /* Placeholder for no image */
    .event-banner-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        font-size: clamp(1rem, 2.5vw, 1.5rem);
        font-weight: 600;
        text-align: center;
        padding: 20px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: clamp(40px, 8vw, 80px) 20px;
    }

    .empty-state i {
        font-size: clamp(3rem, 8vw, 5rem);
        color: #ddd;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        font-size: clamp(1.2rem, 3vw, 1.5rem);
        color: #666;
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #999;
        font-size: clamp(0.9rem, 2vw, 1rem);
    }

    /* Particles Background */
    .particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(102, 126, 234, 0.3);
        border-radius: 50%;
        animation: rise 10s infinite ease-in;
    }

    @keyframes rise {
        0% {
            bottom: -10px;
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            bottom: 100%;
            opacity: 0;
        }
    }

    /* Responsive Breakpoints */

    /* Large Desktops */
    @media (min-width: 1920px) {
        .container {
            max-width: 1400px;
        }

        .events-grid {
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        }
    }

    /* Desktop */
    @media (min-width: 1200px) and (max-width: 1919px) {
        .events-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Laptop/Small Desktop */
    @media (min-width: 992px) and (max-width: 1199px) {
        .container {
            max-width: 960px;
        }

        .events-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .hero h1 {
            font-size: 4rem;
        }
    }

    /* Tablets */
    @media (min-width: 768px) and (max-width: 991px) {
        .container {
            max-width: 720px;
            padding: 0 15px;
        }

        .events-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .event-card {
            height: 240px;
        }

        .hero h1 {
            font-size: 3.5rem;
        }

        .hero p {
            font-size: 1.3rem;
        }

        .hero-stats {
            gap: 30px;
        }

        .shape {
            display: none;
        }
    }

    /* Small Tablets / Large Phones (Portrait) */
    @media (min-width: 576px) and (max-width: 767px) {
        .container {
            max-width: 540px;
            padding: 0 15px;
        }

        .events-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .event-card {
            height: 260px;
            max-width: 100%;
        }

        .hero {
            min-height: 400px;
        }

        .hero h1 {
            font-size: 2.8rem;
        }

        .hero p {
            font-size: 1.1rem;
        }

        .hero-stats {
            gap: 25px;
            flex-direction: row;
        }

        section {
            padding: 60px 0;
        }
    }

    /* Mobile Phones */
    @media (max-width: 575px) {
        .container {
            padding: 0 15px;
        }

        .events-grid {
            grid-template-columns: 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .event-card {
            height: 240px;
            border-radius: 15px;
        }

        .event-card:hover {
            transform: translateY(-8px);
        }

        .hero {
            height: auto;
            min-height: 100vh;
            padding: 60px 0;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .hero-stats {
            flex-direction: column;
            gap: 20px;
            margin-top: 30px;
        }

        .hero-stat {
            min-width: auto;
        }

        section {
            padding: 50px 0;
        }

        .event-hover-details {
            padding: 15px;
        }

        .event-hover-details h3 {
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .event-hover-details .event-meta {
            gap: 10px;
        }

        .event-hover-details .event-meta-item {
            font-size: 0.85rem;
        }

        .event-date-badge {
            top: 8px;
            left: 8px;
            padding: 8px 12px;
            border-radius: 10px;
        }

        .event-date-badge .day {
            font-size: 1.5rem;
        }

        .event-date-badge .month {
            font-size: 0.75rem;
        }

        .event-title-overlay {
            padding: 15px 12px 12px;
        }

        .event-title-overlay h3 {
            font-size: 1.1rem;
        }

        .shape {
            display: none;
        }
    }

    /* Small Mobile Phones */
    @media (max-width: 375px) {
        .hero h1 {
            font-size: 2rem;
        }

        .hero p {
            font-size: 0.95rem;
        }

        .event-card {
            height: 220px;
        }

        .event-hover-details h3 {
            font-size: 1.1rem;
        }

        .event-hover-details .event-meta-item {
            font-size: 0.8rem;
        }
    }

    /* Landscape Orientation for Mobile */
    @media (max-width: 991px) and (orientation: landscape) {
        .hero {
            min-height: 600px;
        }

        .hero h1 {
            font-size: 2.5rem;
        }

        .hero-stats {
            flex-direction: row;
            gap: 30px;
        }

        .event-card {
            height: 200px;
        }
    }

    /* High DPI Screens */
    @media (-webkit-min-device-pixel-ratio: 2),
    (min-resolution: 192dpi) {
        .event-banner img {
            image-rendering: -webkit-optimize-contrast;
        }
    }

    /* Reduced Motion */
    @media (prefers-reduced-motion: reduce) {

        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }

    /* Print Styles */
    @media print {

        .hero,
        .particles,
        .shape {
            display: none;
        }

        .event-card {
            page-break-inside: avoid;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero">
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="hero-content">
        <h1>{{ $category->title }}</h1>
        <p>Discover Amazing Experiences & Create Lasting Memories</p>
        <div class="hero-stats">
            <div class="hero-stat">
                <span class="number counter" data-target="{{ $events->count() }}">0</span>
                <span class="label">Total Events</span>
            </div>
        </div>
    </div>
</div>

<!-- All Events Section -->
<section class="section-white">
    <div class="container">
        <!-- Events Grid -->
        <div class="events-grid" id="eventsGrid">
            @forelse($events as $index => $event)
            @php
            $images = json_decode($event->image, true);
            @endphp

            <div class="event-card scroll-reveal-scale event-item" data-status="{{ $event->status }}"
                style="animation-delay: {{ $index * 0.1 }}s">

                    <a href="{{ route('event.detail', $event->slug) }}">
                <!-- Event Banner -->
                <div class="event-banner">
                    @if(is_array($images) && count($images)> 0)
                    
                        <img src="{{ asset('event/' . $images[0]) }}" alt="{{ $event->title }}" loading="lazy">
                 

                        @else
                        <!-- Event Title - Always Visible at Bottom -->
                        <div class="event-title-overlay">
                            <h3>{{ $event->name }}</h3>
                        </div>
                        @endif
                    <!-- Date Badge -->
                    <div class="event-date-badge">
                        <div class="day">{{ $event->start_date->format('d') }}</div>
                        <div class="month">{{ $event->start_date->format('M') }}</div>
                    </div>

                    <!-- Event Title - Always Visible -->
                    <div class="event-title-overlay">
                        <h3>{{ $event->name }}</h3>
                    </div>

                    <!-- Hover Details Overlay -->
                    <div class="event-hover-details">
                        <h3>{{ $event->name }}</h3>
                        <div class="event-meta">
                            <div class="event-meta-item">
                                <i class="fas fa-clock"></i>
                                <span><strong>Start:</strong> {{ $event->start_date->format('h:i A, M d, Y') }}</span>
                            </div>
                            <div class="event-meta-item">
                                <i class="fas fa-clock"></i>
                                <span><strong>End:</strong> {{ $event->end_date->format('h:i A, M d, Y') }}</span>
                            </div>
                            <div class="event-meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><strong>Venue:</strong> {{ $event->location }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                   </a>
            </div>
            @empty
            <div class="empty-state" style="grid-column: 1/-1;">
                <i class="fas fa-calendar-times"></i>
                <h3>No Events Found</h3>
                <p>Check back later for upcoming events!</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Particles Background -->
<div class="particles" id="particles"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Prevent multiple initializations
    if (window.eventsPageInitialized) {
        return;
    }
    window.eventsPageInitialized = true;

    // Intersection Observer for Scroll Animations
    const observerOptions = {
        threshold: 0.15,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all scroll reveal elements
    document.querySelectorAll('.scroll-reveal-scale').forEach(el => {
        observer.observe(el);
    });

    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = +counter.getAttribute('data-target');
                
                if (counter.dataset.animated) {
                    return;
                }
                counter.dataset.animated = 'true';

                const increment = target / 50;
                let count = 0;

                const updateCounter = () => {
                    if (count < target) {
                        count += increment;
                        counter.textContent = Math.ceil(count);
                        setTimeout(updateCounter, 30);
                    } else {
                        counter.textContent = target;
                    }
                };

                updateCounter();
                counterObserver.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach(counter => counterObserver.observe(counter));

    // Touch devices - tap to show/hide details
    const isTouchDevice = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);
    
    if (isTouchDevice) {
        document.querySelectorAll('.event-card').forEach(card => {
            card.addEventListener('click', function(e) {
                // Toggle active class
                if (this.classList.contains('active')) {
                    this.classList.remove('active');
                } else {
                    // Remove active from all other cards
                    document.querySelectorAll('.event-card.active').forEach(c => {
                        c.classList.remove('active');
                    });
                    this.classList.add('active');
                }
            });
        });

        // Close details when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.event-card')) {
                document.querySelectorAll('.event-card.active').forEach(card => {
                    card.classList.remove('active');
                });
            }
        });
    }

    // Create particles only once (fewer on mobile)
    const particlesContainer = document.getElementById('particles');
    if (particlesContainer && !particlesContainer.hasChildNodes()) {
        const particleCount = window.innerWidth < 768 ? 20 : 40;
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 10 + 's';
            particle.style.animationDuration = (Math.random() * 10 + 5) + 's';
            particlesContainer.appendChild(particle);
        }
    }

    // Parallax effect on scroll (throttled) - disabled on mobile for performance
    if (window.innerWidth >= 768) {
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    const scrolled = window.pageYOffset;
                    const parallaxElements = document.querySelectorAll('.hero');
                    
                    parallaxElements.forEach(el => {
                        const speed = 0.5;
                        el.style.transform = `translateY(${scrolled * speed}px)`;
                    });
                    
                    ticking = false;
                });
                ticking = true;
            }
        });
    }

    // Handle orientation change
    window.addEventListener('orientationchange', function() {
        setTimeout(() => {
            window.scrollTo(0, 0);
        }, 200);
    });
});
</script>
@endsection