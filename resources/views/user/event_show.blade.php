{{-- resources/views/user/events/show.blade.php --}}
@extends('user.layouts.master')

@section('content')
<title>{{ $event->name }} - Event Details</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto', sans-serif;
        background: #f1f3f6;
        color: #212121;
    }

    /* ========== BACK BUTTON ========== */
    .back-btn {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 1000;
        background: white;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        color: #212121;
    }

    .back-btn:hover {
        background: #2874f0;
        color: white;
        transform: scale(1.05);
    }

    /* ========== CONTAINER ========== */
    .container {
        max-width: 1280px;
        margin: 80px auto 40px;
        padding: 0 20px;
    }

    /* ========== BREADCRUMB ========== */
    .breadcrumb {
        background: white;
        padding: 12px 16px;
        font-size: 0.75rem;
        margin-bottom: 0;
        color: #878787;
    }

    .breadcrumb a {
        color: #878787;
        text-decoration: none;
    }

    .breadcrumb a:hover {
        color: #2874f0;
    }

    .breadcrumb-separator {
        margin: 0 6px;
        font-size: 0.6rem;
    }

    /* ========== MAIN LAYOUT ========== */
    .event-wrapper {
        display: grid;
        grid-template-columns: 450px 1fr;
        gap: 0;
        background: white;
        min-height: 600px;
    }

    /* ========== LEFT SECTION: IMAGE & BOOKING ========== */
    .left-section {
        padding: 20px;
        border-right: 1px solid #f0f0f0;
        display: flex;
        flex-direction: column;
        position: sticky;
        top: 0;
        height: fit-content;
    }

    /* Image Slider */
    .image-slider {
        position: relative;
        width: 100%;
        height: 480px;
        overflow: hidden;
        margin-bottom: 20px;
        background: #fafafa;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .slider-track {
        display: flex;
        height: 100%;
        width: 100%;
        transition: transform 0.4s ease-in-out;
    }

    .slide {
        min-width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .slide img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .slide-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #2874f0 0%, #1e5bc6 100%);
        color: white;
        font-size: 1.5rem;
        font-weight: 500;
    }

    /* Slider Controls */
    .slider-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.95);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        z-index: 10;
    }

    .slider-nav:hover {
        background: white;
        transform: translateY(-50%) scale(1.1);
    }

    .slider-nav.prev {
        left: 15px;
    }

    .slider-nav.next {
        right: 15px;
    }

    .slider-nav i {
        color: #212121;
        font-size: 1rem;
    }

    /* Thumbnail Strip */
    .thumbnail-strip {
        display: flex;
        gap: 12px;
        overflow-x: auto;
        padding: 8px 0;
        margin-bottom: 20px;
        scrollbar-width: thin;
        scrollbar-color: #c2c2c2 transparent;
    }

    .thumbnail-strip::-webkit-scrollbar {
        height: 4px;
    }

    .thumbnail-strip::-webkit-scrollbar-track {
        background: transparent;
    }

    .thumbnail-strip::-webkit-scrollbar-thumb {
        background: #c2c2c2;
        border-radius: 2px;
    }

    .thumbnail {
        min-width: 75px;
        width: 75px;
        height: 75px;
        border: 1.5px solid #e0e0e0;
        cursor: pointer;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .thumbnail:hover {
        border-color: #2874f0;
    }

    .thumbnail.active {
        border-color: #2874f0;
        border-width: 2px;
    }

    .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 12px;
        margin-bottom: 25px;
    }

    .action-btn {
        flex: 1;
        padding: 12px;
        border: 1px solid #c2c2c2;
        background: white;
        font-size: 0.9rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        color: #212121;
    }

    .action-btn:hover {
        border-color: #2874f0;
        color: #2874f0;
    }

    .action-btn i {
        font-size: 1.1rem;
    }

    /* Booking Section */
    .booking-section {
        border-top: 1px solid #f0f0f0;
        padding-top: 20px;
    }

    .price-container {
        margin-bottom: 20px;
    }

    .price-tag {
        display: flex;
        align-items: baseline;
        gap: 12px;
        margin-bottom: 8px;
    }

    .current-price {
        font-size: 2rem;
        font-weight: 500;
        color: #212121;
    }

    .original-price {
        font-size: 1rem;
        color: #878787;
        text-decoration: line-through;
    }

    .discount {
        color: #388e3c;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .free-tag {
        font-size: 2rem;
        font-weight: 500;
        color: #388e3c;
    }

    .tax-info {
        font-size: 0.75rem;
        color: #878787;
        margin-bottom: 15px;
    }

    .booking-actions {
        display: flex;
        gap: 12px;
    }

    .btn-book {
        flex: 1;
        padding: 16px;
        background: #ff9f00;
        color: white;
        border: none;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-book:hover:not(:disabled) {
        background: #e68a00;
    }

    .btn-book:disabled {
        background: #c2c2c2;
        cursor: not-allowed;
    }

    .btn-wishlist {
        flex: 1;
        padding: 16px;
        background: white;
        color: #212121;
        border: 1px solid #c2c2c2;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-wishlist:hover {
        border-color: #2874f0;
    }

    .availability-info {
        background: #fff9e6;
        border-left: 3px solid #ff9f00;
        padding: 12px;
        margin-top: 15px;
        font-size: 0.85rem;
        color: #212121;
    }

    /* ========== RIGHT SECTION: EVENT DETAILS ========== */
    .right-section {
        padding: 30px 40px;
    }

    /* Event Header */
    .event-header {
        margin-bottom: 25px;
    }

    .event-title {
        font-size: 1.6rem;
        font-weight: 400;
        color: #212121;
        margin-bottom: 8px;
        line-height: 1.4;
    }

    .event-subtitle {
        font-size: 1rem;
        color: #878787;
        margin-bottom: 15px;
    }

    /* Rating & Status */
    .event-badges {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #f0f0f0;
    }

    .rating-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #388e3c;
        color: white;
        padding: 5px 10px;
        border-radius: 3px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .rating-badge i {
        font-size: 0.7rem;
    }

    .reviews-count {
        font-size: 0.85rem;
        color: #878787;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 12px;
        border-radius: 3px;
        font-size: 0.75rem;
        font-weight: 500;
        text-transform: uppercase;
    }

    .status-active {
        background: #e6f7ed;
        color: #00854d;
    }

    .status-completed {
        background: #f0f0f0;
        color: #878787;
    }

    .status-cancelled {
        background: #ffebee;
        color: #c62828;
    }

    /* Event Details List */
    .details-list {
        margin-bottom: 30px;
    }

    .detail-item {
        display: flex;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-icon {
        width: 40px;
        flex-shrink: 0;
    }

    .detail-icon i {
        font-size: 1.3rem;
        color: #2874f0;
    }

    .detail-content {
        flex: 1;
    }

    .detail-label {
        font-size: 0.75rem;
        color: #878787;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }

    .detail-value {
        font-size: 0.95rem;
        color: #212121;
        font-weight: 500;
    }

    .detail-subvalue {
        font-size: 0.85rem;
        color: #2874f0;
        margin-top: 2px;
    }

    /* Description */
    .description-section {
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid #f0f0f0;
    }

    .section-title {
        font-size: 1.2rem;
        font-weight: 500;
        color: #212121;
        margin-bottom: 15px;
    }

    .description-text {
        font-size: 0.95rem;
        line-height: 1.7;
        color: #212121;
    }

    /* Specifications Table */
    .specs-table {
        margin-top: 25px;
    }

    .spec-row {
        display: grid;
        grid-template-columns: 180px 1fr;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .spec-row:last-child {
        border-bottom: none;
    }

    .spec-label {
        font-size: 0.9rem;
        color: #878787;
    }

    .spec-value {
        font-size: 0.9rem;
        color: #212121;
    }

    /* ========== RESPONSIVE DESIGN ========== */
    @media (max-width: 1024px) {
        .event-wrapper {
            grid-template-columns: 400px 1fr;
        }

        .left-section {
            padding: 15px;
        }

        .right-section {
            padding: 20px 25px;
        }

        .image-slider {
            height: 400px;
        }
    }

    @media (max-width: 768px) {
        .container {
            margin: 60px auto 20px;
            padding: 0 10px;
        }

        .event-wrapper {
            grid-template-columns: 1fr;
        }

        .left-section {
            border-right: none;
            border-bottom: 1px solid #f0f0f0;
            position: static;
            padding: 15px;
        }

        .right-section {
            padding: 20px 15px;
        }

        .image-slider {
            height: 350px;
        }

        .current-price {
            font-size: 1.8rem;
        }

        .event-title {
            font-size: 1.4rem;
        }

        .booking-actions {
            flex-direction: column;
        }

        .breadcrumb {
            font-size: 0.7rem;
            padding: 10px 12px;
        }

        .spec-row {
            grid-template-columns: 1fr;
            gap: 5px;
        }
    }

    @media (max-width: 480px) {
        .image-slider {
            height: 280px;
        }

        .thumbnail {
            min-width: 60px;
            width: 60px;
            height: 60px;
        }

        .action-buttons {
            flex-direction: column;
        }

        .current-price {
            font-size: 1.6rem;
        }

        .event-title {
            font-size: 1.2rem;
        }

        .back-btn {
            width: 40px;
            height: 40px;
        }
    }
</style>

<!-- Back Button -->
<a href="{{ url()->previous() }}" class="back-btn">
    <i class="fas fa-arrow-left"></i>
</a>

<div class="container">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="{{ url()->previous() }}">Events</a>
        <span class="breadcrumb-separator">›</span>
        <span>{{ Str::limit($event->name, 50) }}</span>
    </div>

    <!-- Main Event Wrapper -->
    <div class="event-wrapper">

        <!-- ========== LEFT SECTION: IMAGE SLIDER & BOOKING ========== -->
        <div class="left-section">
            <h1 class="event-title text-center">{{ $event->name }}</h1>
            @php
            $images = json_decode($event->image, true);
            $imageCount = is_array($images) ? count($images) : 0;
            @endphp

            <!-- Image Slider -->
            <div class="image-slider">
                @if($imageCount > 0)
                <div class="slider-track" id="sliderTrack">
                    @foreach($images as $image)
                    <div class="slide">
                        <img src="{{ asset('event/' . $image) }}" alt="{{ $event->name }}">
                    </div>
                    @endforeach
                </div>

                <!-- Navigation -->
                @if($imageCount > 1)
                <button class="slider-nav prev" onclick="changeSlide(-1)">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="slider-nav next" onclick="changeSlide(1)">
                    <i class="fas fa-chevron-right"></i>
                </button>
                @endif
                @else
                <div class="slide-placeholder">
                    {{ $event->name }}
                </div>
                @endif
            </div>

            <!-- Thumbnails -->
            @if($imageCount > 1)
            <div class="thumbnail-strip">
                @foreach($images as $index => $image)
                <div class="thumbnail {{ $index === 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})">
                    <img src="{{ asset('event/' . $image) }}" alt="Image {{ $index + 1 }}">
                </div>
                @endforeach
            </div>
            @endif

            <!-- Action Buttons -->


            <!-- Booking Section -->
            <div class="booking-section">
                <!-- Price -->
                <div class="price-container">
                    <div class="price-tag">
                        @if($event->price > 0)
                        <span class="current-price">₹{{ number_format($event->price, 2) }}</span>

                        @else
                        <span class="free-tag">FREE ENTRY</span>
                        @endif
                    </div>
                    @if($event->price > 0)
                    <div class="tax-info">+ ₹{{ number_format($event->price * 0.18, 2) }} GST (18%)</div>
                    @endif
                </div>

                <!-- Booking Buttons -->
                <div class="booking-actions">
                    @if($event->status == 'active' && $event->num_tickets > 0)

                    <!-- BOOK NOW FORM -->
                    <form action="{{ route('event.booking', $event->slug) }}" method="post" style="flex:1">
                        @csrf                      
                        {{-- <input type="hidden" name="event_id" value="{{ $event->id }}"> --}}

                        <button type="submit" class="btn-book">
                            <i class="fas fa-shopping-cart"></i> Book Now
                        </button>
                    </form>
                    <div class="action-buttons">
                        <button class="action-btn" onclick="shareEvent()">
                            <i class="fas fa-share-alt"></i>
                            <span>Share</span>
                        </button>
                    </div>
                    @elseif($event->status == 'completed')
                    <button class="btn-book" disabled>
                        Event Completed
                    </button>
                    @elseif($event->status == 'cancelled')
                    <button class="btn-book" disabled style="background: #c62828;">
                        Event Cancelled
                    </button>
                    @else
                    <button class="btn-book" disabled>
                        Sold Out
                    </button>
                    @endif
                </div>

                <!-- Availability Info -->
                @if($event->status == 'active' && $event->num_tickets > 0)
                <div class="availability-info">
                   
                        <i class="fas fa-check-circle"></i>
                        {{ number_format($event->available_tickets) }} tickets available
                       
                </div>
                @endif
            </div>
        </div>

        <!-- ========== RIGHT SECTION: EVENT DETAILS ========== -->
        <div class="right-section">

            <!-- Event Header -->
            <div class="event-header">


                @if($event->sub_title)
                <p class="event-subtitle">{{ $event->sub_title }}</p>
                @endif


            </div>

            <!-- Event Details -->
            <div class="details-list">
                <!-- Start Date & Time -->
                <div class="detail-item">
                    <div class="detail-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="detail-content">
                        <div class="detail-label">Event Starts</div>
                        <div class="detail-value">{{ $event->start_date->format('l, F d, Y') }}</div>
                        <div class="detail-subvalue">{{ $event->start_date->format('h:i A') }}</div>
                    </div>
                </div>

                <!-- End Date & Time -->
                <div class="detail-item">
                    <div class="detail-icon">
                        <i class="fas fa-calendar-times"></i>
                    </div>
                    <div class="detail-content">
                        <div class="detail-label">Event Ends</div>
                        <div class="detail-value">{{ $event->end_date->format('l, F d, Y') }}</div>
                        <div class="detail-subvalue">{{ $event->end_date->format('h:i A') }}</div>
                    </div>
                </div>

                <!-- Location -->
                <div class="detail-item">
                    <div class="detail-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="detail-content">
                        <div class="detail-label">Venue</div>
                        <div class="detail-value">{{ $event->location }}</div>
                    </div>
                </div>

                <!-- Duration -->
                <div class="detail-item">
                    <div class="detail-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="detail-content">
                        <div class="detail-label">Duration</div>
                        <div class="detail-value">
                            @php
                            $duration = $event->start_date->diffInDays($event->end_date);
                            @endphp
                            {{ $duration > 0 ? $duration . ' ' . ($duration == 1 ? 'Day' : 'Days') : 'Same Day Event' }}
                        </div>
                    </div>
                </div>

                <!-- Tickets Available -->
                <div class="detail-item">
                    <div class="detail-icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="detail-content">
                        <div class="detail-label">Tickets Available</div>
                        <div class="detail-value">{{ number_format($event->available_tickets) }} Tickets</div>
                    </div>
                </div>

                @if($event->description)
                <div class="detail-item">
                    <div class="detail-icon">
                        <i class="fas fa-align-left"></i>
                    </div>

                    <div class="detail-content">
                        <div class="detail-label">About Event</div>
                        <div class="detail-value">
                            {{ $event->description }}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>

<script>
    // ========== IMAGE SLIDER ========== //
    let currentIndex = 0;
    const totalImages = {{ $imageCount }};
    let autoSlideTimer;

    function goToSlide(index) {
        if (totalImages === 0) return;
        
        currentIndex = index;
        updateSlider();
        resetAutoSlide();
    }

    function changeSlide(direction) {
        if (totalImages === 0) return;        
        currentIndex += direction;        
        if (currentIndex < 0) {
            currentIndex = totalImages - 1;
        } else if (currentIndex >= totalImages) {
            currentIndex = 0;
        }
        
        updateSlider();
        resetAutoSlide();
    }

    function updateSlider() {
        const track = document.getElementById('sliderTrack');
        const thumbnails = document.querySelectorAll('.thumbnail');
        
        if (track) {
            track.style.transform = `translateX(-${currentIndex * 100}%)`;
        }
        
        thumbnails.forEach((thumb, index) => {
            thumb.classList.toggle('active', index === currentIndex);
        });
    }

    function startAutoSlide() {
        if (totalImages <= 1) return;        
        autoSlideTimer = setInterval(() => {
            changeSlide(1);
        }, 4000);
    }

    function resetAutoSlide() {
        clearInterval(autoSlideTimer);
        startAutoSlide();
    }

    // Initialize
    if (totalImages > 1) {
        startAutoSlide();
        
        // Pause on hover
        const slider = document.querySelector('.image-slider');
        if (slider) {
            slider.addEventListener('mouseenter', () => clearInterval(autoSlideTimer));
            slider.addEventListener('mouseleave', startAutoSlide);
        }
    }

    // ========== WISHLIST ========== //
    function toggleWishlist() {
        const icon = document.getElementById('wishlistIcon');
        const text = document.getElementById('wishlistText');
        
        if (icon.classList.contains('far')) {
            icon.classList.remove('far');
            icon.classList.add('fas');
            icon.style.color = '#ff6161';
            if (text) text.textContent = 'Saved';
        } else {
            icon.classList.remove('fas');
            icon.classList.add('far');
            icon.style.color = '';
            if (text) text.textContent = 'Save';
        }
    }

   
    // ========== SHARE ========== //
    function shareEvent() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $event->name }}',
                text: 'Check out this amazing event!',
                url: window.location.href
            });
        } else {
            alert('Share this event: ' + window.location.href);
        }
    }

    // ========== KEYBOARD NAVIGATION ========== //
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') changeSlide(-1);
        if (e.key === 'ArrowRight') changeSlide(1);
    });
</script>

@endsection