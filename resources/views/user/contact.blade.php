@extends('user.layouts.master')

@section('content')
<title>Contact Us</title>
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        overflow-x: hidden;
        color: #333;
    }

    /* Hero Section */
    .hero {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
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
    }

    .hero h1 {
        font-size: 5rem;
        font-weight: 700;
        margin-bottom: 20px;
        opacity: 0;
        transform: translateY(-50px);
        animation: fadeInDown 1s ease forwards;
    }

    .hero p {
        font-size: 1.5rem;
        opacity: 0;
        transform: translateY(50px);
        animation: fadeInUp 1s ease 0.3s forwards;
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
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Section Styling */
    section {
        padding: 100px 0;
        position: relative;
    }

    .section-white {
        background: #fff;
    }

    .section-light {
        background: #f8f9fa;
    }

    /* Scroll Reveal Elements */
    .scroll-reveal {
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .scroll-reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    .scroll-reveal-left {
        opacity: 0;
        transform: translateX(-50px);
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .scroll-reveal-left.active {
        opacity: 1;
        transform: translateX(0);
    }

    .scroll-reveal-right {
        opacity: 0;
        transform: translateX(50px);
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .scroll-reveal-right.active {
        opacity: 1;
        transform: translateX(0);
    }

    /* Section Title */
    .section-title {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-title h2 {
        font-size: 3rem;
        font-weight: 700;
        color: #333;
        position: relative;
        display: inline-block;
        margin-bottom: 15px;
    }

    .section-title h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        border-radius: 2px;
    }

    .section-title p {
        color: #666;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 20px auto 0;
    }

    /* Contact Wrapper - Info Left, Form Right */
    .contact-wrapper {
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 30px;
        align-items: start;
    }

    /* Contact Form - Full Width on Right */
    .contact-form {
        background: white;
        padding: 40px;
        border-radius: 30px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    }

    .form-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .form-header h3 {
        font-size: 2.2rem;
        color: #333;
        margin-bottom: 10px;
        font-weight: 700;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .form-header p {
        color: #666;
        font-size: 1rem;
    }

    /* Form Fields */
    .form-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: #333;
        font-size: 0.95rem;
    }

    .form-group label .required {
        color: #e74c3c;
        margin-left: 3px;
    }

    .form-group label i {
        margin-right: 8px;
        color: #667eea;
        font-size: 0.9rem;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 16px 24px;
        border: 2px solid #e9ecef;
        border-radius: 50px;
        font-size: 1rem;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }

    .form-group textarea {
        border-radius: 25px;
        resize: vertical;
        min-height: 140px;
        padding: 20px 24px;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        transform: translateY(-2px);
    }

    .form-group input[type="date"] {
        cursor: pointer;
    }

    .form-group select {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23667eea' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 20px center;
        background-size: 20px;
        padding-right: 50px;
    }

    .submit-btn {
        width: 100%;
        padding: 18px 40px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.4s ease;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
        margin-top: 20px;
    }

    .submit-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .submit-btn:hover::before {
        width: 400px;
        height: 400px;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
    }

    .submit-btn:active {
        transform: translateY(-1px);
    }

    .submit-btn span {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .submit-btn i {
        font-size: 1.2rem;
    }

    /* Contact Sidebar - Left Side */
    .contact-sidebar {
        position: sticky;
        top: 100px;
    }

    .contact-info-box {
        background: transparent;
        padding: 20px;
        border-radius: 30px;
        box-shadow: none;
        color: #333;
    }

    .contact-info-header {
        text-align: center;
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 2px solid rgba(102, 126, 234, 0.2);
    }

    .contact-info-header h3 {
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 8px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .contact-info-header p {
        font-size: 0.85rem;
        color: #666;
    }

    .contact-info-item {
        background: white;
        padding: 20px;
        border-radius: 15px;
        margin-bottom: 15px;
        transition: all 0.4s ease;
        border: 2px solid #e9ecef;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .contact-info-item:hover {
        transform: translateX(10px);
        border-color: #667eea;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.15);
    }

    .contact-info-item:last-child {
        margin-bottom: 0;
    }

    .contact-info-item .icon {
        width: 45px;
        height: 45px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
        font-size: 1.1rem;
        background: linear-gradient(135deg, #667eea, #764ba2);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        transition: all 0.4s ease;
    }

    .contact-info-item .icon i {
        color: white;
    }

    .contact-info-item:hover .icon {
        transform: rotate(360deg) scale(1.1);
    }

    .contact-info-item h4 {
        font-size: 1rem;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    .contact-info-item p {
        font-size: 0.85rem;
        line-height: 1.6;
        color: #666;
        margin: 0;
    }

    .contact-info-item a {
        color: #667eea;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-block;
        margin-top: 5px;
        font-size: 0.85rem;
    }

    .contact-info-item a:hover {
        color: #764ba2;
        padding-left: 5px;
        text-decoration: underline;
    }

    .contact-info-item .info-detail {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 6px;
    }

    .contact-info-item .info-detail i {
        font-size: 0.8rem;
        color: #667eea;
    }

    /* Alert Messages */
    .alert {
        padding: 18px 24px;
        border-radius: 50px;
        margin-bottom: 30px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 12px;
        animation: slideInDown 0.5s ease;
    }

    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
        border: 2px solid #28a745;
    }

    .alert-error {
        background: linear-gradient(135deg, #f8d7da, #f5c6cb);
        color: #721c24;
        border: 2px solid #dc3545;
    }

    .alert i {
        font-size: 1.3rem;
    }

    /* Error Messages */
    .error-message {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: 8px;
        display: none;
        padding-left: 24px;
    }

    .form-group.has-error .error-message {
        display: block;
    }

    .form-group input.error,
    .form-group select.error,
    .form-group textarea.error {
        border-color: #e74c3c;
        animation: shake 0.5s;
    }

    @keyframes shake {

        0%,
        100% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-10px);
        }

        75% {
            transform: translateX(10px);
        }
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
        background: rgba(255, 255, 255, 0.5);
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

    /* Loading State */
    .submit-btn.loading {
        pointer-events: none;
        opacity: 0.7;
    }

    .submit-btn.loading::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        top: 50%;
        left: 50%;
        margin-left: -10px;
        margin-top: -10px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spinner 0.8s linear infinite;
    }

    @keyframes spinner {
        to {
            transform: rotate(360deg);
        }
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .contact-wrapper {
            grid-template-columns: 280px 1fr;
        }
    }

    @media (max-width: 992px) {
        .contact-wrapper {
            grid-template-columns: 1fr;
        }

        .contact-sidebar {
            position: static;
            margin-bottom: 40px;
            order: -1;
        }

        .contact-info-box {
            padding: 30px;
        }
    }

    @media (max-width: 768px) {
        .hero h1 {
            font-size: 3rem;
        }

        .hero p {
            font-size: 1.2rem;
        }

        .section-title h2 {
            font-size: 2rem;
        }

        .contact-form {
            padding: 30px 20px;
            border-radius: 20px;
        }

        .contact-info-box {
            padding: 25px 20px;
            border-radius: 20px;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 14px 20px;
        }
    }

    @media (max-width: 480px) {
        .hero h1 {
            font-size: 2.5rem;
        }

        .contact-form {
            padding: 25px 15px;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero">
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="hero-content">
        <h1>Contact Us</h1>
        <p>Let's Plan Your Event Together</p>
    </div>
</div>

<!-- Contact Form Section -->
<section class="section-light">
    <div class="container">
        <div class="section-title scroll-reveal">
            <h2>Plan Your Event</h2>
            <p>Fill out the form and we'll get back to you within 24 hours</p>
        </div>

        <div class="contact-wrapper">
            <!-- Contact Info Sidebar - Left Side -->
            <div class="contact-sidebar scroll-reveal-left">
                <div class="contact-info-box">
                    <div class="contact-info-header">
                        <h3>Get In Touch</h3>
                        <p>We're here to help you</p>
                    </div>

                    <div class="contact-info-item">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4>Our Location</h4>
                        <p>123 Event Street<br>New York, NY 10001<br>United States</p>
                    </div>

                    <div class="contact-info-item">
                        <div class="icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h4>Phone Numbers</h4>
                        <div class="info-detail">
                            <i class="fas fa-phone"></i>
                            <a href="tel:+1234567890">+1 (234) 567-890</a>
                        </div>
                        <div class="info-detail">
                            <i class="fas fa-mobile-alt"></i>
                            <a href="tel:+1234567891">+1 (234) 567-891</a>
                        </div>
                        <p style="margin-top: 12px; font-size: 0.85rem;">
                            <i class="far fa-clock"></i> Mon-Fri: 9AM - 6PM
                        </p>
                    </div>

                    <div class="contact-info-item">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4>Email Address</h4>
                        <div class="info-detail">
                            <i class="fas fa-envelope-open"></i>
                            <a href="mailto:info@events.com">info@events.com</a>
                        </div>
                        <div class="info-detail">
                            <i class="fas fa-headset"></i>
                            <a href="mailto:support@events.com">support@events.com</a>
                        </div>
                        <p style="margin-top: 12px; font-size: 0.85rem;">
                            <i class="fas fa-clock"></i> 24/7 Support Available
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Form - Right Side -->
            <div class="contact-form scroll-reveal-right">
                @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
                @endif

                <div class="form-header">
                    <h3>Send Us a Details</h3>
                    {{-- <p>We'd love to hear from you and discuss your event</p> --}}
                </div>

                <form action="{{ route('contact.store') }}" method="POST" id="contactForm">
                    @csrf

                    <!-- Personal Information -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">
                                <i class="fas fa-user"></i>
                                Full Name <span class="required">*</span>
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                placeholder="Enter Your Name">
                            @error('name')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">
                                <i class="fas fa-envelope"></i>
                                Email Address <span class="required">*</span>
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                placeholder="Enter Your E-Mail">
                            @error('email')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact">
                                <i class="fas fa-phone"></i>
                                Contact Number <span class="required">*</span>
                            </label>
                            <input type="tel" id="contact" maxlength="10" name="contact" value="{{ old('contact') }}"
                                required placeholder="+1 (234) 567-8900">
                            @error('contact')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="event_type">
                                <i class="fas fa-calendar-alt"></i>
                                Event Type <span class="required">*</span>
                            </label>
                            <select id="event_type" name="event_type" required>
                                <option value="">Select Event Type</option>
                                @foreach ($categorys as $category)

                                <option value="{{ $category->title }}">{{ $category->title }}</option>


                                @endforeach
                                {{-- <option value="Corporate Event" {{ old('event_type')=='Corporate Event'
                                    ? 'selected' : '' }}>Corporate Event</option>
                                <option value="Birthday Party" {{ old('event_type')=='Birthday Party' ? 'selected' : ''
                                    }}>Birthday Party</option>
                                <option value="Conference" {{ old('event_type')=='Conference' ? 'selected' : '' }}>
                                    Conference</option>
                                <option value="Concert" {{ old('event_type')=='Concert' ? 'selected' : '' }}>Concert
                                </option>
                                <option value="Exhibition" {{ old('event_type')=='Exhibition' ? 'selected' : '' }}>
                                    Exhibition</option>
                                <option value="Seminar" {{ old('event_type')=='Seminar' ? 'selected' : '' }}>Seminar
                                </option>
                                <option value="Other" {{ old('event_type')=='Other' ? 'selected' : '' }}>Other</option>
                                --}}
                            </select>
                            @error('event_type')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Event Details -->
                    <div class="form-group">
                        <label for="event_name">
                            <i class="fas fa-tag"></i>
                            Event Name
                        </label>
                        <input type="text" id="event_name" name="event_name" value="{{ old('event_name') }}"
                            placeholder="Give your event a memorable name">
                        @error('event_name')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="start_date">
                                <i class="fas fa-calendar-check"></i>
                                Start Date <span class="required">*</span>
                            </label>
                            <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}"
                                required min="{{ date('Y-m-d') }}">
                            @error('start_date')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="end_date">
                                <i class="fas fa-calendar-times"></i>
                                End Date
                            </label>
                            <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}"
                                min="{{ date('Y-m-d') }}">
                            @error('end_date')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="location">
                                <i class="fas fa-map-marker-alt"></i>
                                Event Location
                            </label>
                            <input type="text" id="location" name="location" value="{{ old('location') }}"
                                placeholder="Venue or Address">
                            @error('location')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="total_person">
                                <i class="fas fa-users"></i>
                                Expected Attendees
                            </label>
                            <input type="number" id="total_person" name="total_person" value="{{ old('total_person') }}"
                                min="1" placeholder="Number of guests">
                            @error('total_person')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Additional Message -->
                    <div class="form-group">
                        <label for="message">
                            <i class="fas fa-comment-dots"></i>
                            Additional Information
                        </label>
                        <textarea id="message" name="message"
                            placeholder="Tell us more about your event requirements, special requests, or any questions...">{{ old('message') }}</textarea>
                        @error('message')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="submit-btn">
                        <span>
                            <i class="fas fa-paper-plane"></i>
                            Submit Booking Request
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Particles Background -->
<div class="particles" id="particles"></div>

<script>
    // Intersection Observer for Scroll Animations
        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        // Observe all scroll reveal elements
        document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right').forEach(el => {
            observer.observe(el);
        });

        // Create particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 30;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 10 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 5) + 's';
                particlesContainer.appendChild(particle);
            }
        }

        createParticles();

        // Form Validation
        const form = document.getElementById('contactForm');
        const submitBtn = form.querySelector('.submit-btn');

        // Date validation
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');

        startDateInput.addEventListener('change', function() {
            endDateInput.min = this.value;
            if (endDateInput.value && endDateInput.value < this.value) {
                endDateInput.value = '';
            }
        });

        // Form submit with loading state
        form.addEventListener('submit', function(e) {
            submitBtn.classList.add('loading');
            submitBtn.querySelector('span').innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
        });

        // Phone number formatting
      const contactInput = document.getElementById('contact');
const errorMsg = document.getElementById('contact-error');

contactInput.addEventListener('input', function(e) {
    // Allow only numbers
    let value = e.target.value.replace(/\D/g, '');
    e.target.value = value;

    // Validation for exactly 10 digits
    if (value.length === 10) {
        errorMsg.textContent = "";
    } else {
        errorMsg.textContent = "Contact number must be exactly 10 digits.";
    }
});

        // Add parallax effect on scroll
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.hero');
            
            parallaxElements.forEach(el => {
                const speed = 0.5;
                el.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });

        // Auto-hide success/error messages
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';
                setTimeout(() => alert.remove(), 500);
            }, 5000);
        });

        // Input focus animations
        const inputs = document.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
</script>
@endsection