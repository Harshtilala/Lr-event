@extends('user.layouts.master')

@section('content')
    <title>About Us </title>
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
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: moveBackground 20s linear infinite;
        }

        @keyframes moveBackground {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
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
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(10deg); }
        }

        /* Container */
        .container {
            max-width: 1200px;
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

        .scroll-reveal-scale {
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .scroll-reveal-scale.active {
            opacity: 1;
            transform: scale(1);
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

        /* Mission Cards */
        .mission-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .mission-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .mission-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .mission-card:hover::before {
            transform: scaleX(1);
        }

        .mission-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }

        .mission-card .icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            font-size: 2rem;
            color: white;
            transition: all 0.4s ease;
        }

        .mission-card:hover .icon {
            transform: rotateY(360deg);
        }

        .mission-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
        }

        .mission-card p {
            color: #666;
            line-height: 1.8;
        }

        /* Stats Section */
        .stats {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            text-align: center;
        }

        .stat-item {
            padding: 30px;
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            display: block;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Timeline */
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #667eea, #764ba2);
        }

        .timeline-item {
            margin-bottom: 50px;
            position: relative;
        }

        .timeline-item:nth-child(odd) .timeline-content {
            margin-left: auto;
            margin-right: 0;
        }

        .timeline-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            width: calc(50% - 40px);
            position: relative;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            background: #667eea;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 0 0 4px #667eea;
            top: 30px;
            z-index: 1;
        }

        .timeline-year {
            font-size: 1.3rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 10px;
        }

        .timeline-item h4 {
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: #333;
        }

        .timeline-item p {
            color: #666;
            line-height: 1.6;
        }

        /* Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }

        .team-member {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .team-member:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        }

        .team-image {
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            position: relative;
            overflow: hidden;
        }

        .team-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .team-member:hover .team-image::before {
            opacity: 1;
        }

        .team-image i {
            font-size: 6rem;
            color: rgba(255,255,255,0.5);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .team-info {
            padding: 25px;
            text-align: center;
        }

        .team-info h4 {
            font-size: 1.3rem;
            margin-bottom: 8px;
            color: #333;
        }

        .team-info p {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-links a:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            transform: translateY(-3px);
        }

        /* Skills Section */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .skill-item {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .skill-name {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-weight: 600;
            color: #333;
        }

        .skill-bar {
            width: 100%;
            height: 10px;
            background: #e9ecef;
            border-radius: 10px;
            overflow: hidden;
        }

        .skill-progress {
            height: 100%;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 10px;
            width: 0;
            transition: width 1.5s ease-in-out;
        }

        .skill-item.active .skill-progress {
            width: var(--progress);
        }

        /* Values Section */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .value-card {
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: -100%;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            transition: top 0.4s ease;
            z-index: 0;
        }

        .value-card:hover::before {
            top: 0;
        }

        .value-card:hover {
            color: white;
            transform: scale(1.05);
        }

        .value-card .icon {
            font-size: 3rem;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
            transition: all 0.4s ease;
        }

        .value-card h4 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        .value-card p {
            position: relative;
            z-index: 1;
            line-height: 1.6;
        }

        .value-card:hover .icon,
        .value-card:hover h4,
        .value-card:hover p {
            color: white;
        }

        /* Call to Action */
        .cta {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 0;
            text-align: center;
            color: white;
        }

        .cta h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .cta-button {
            display: inline-block;
            padding: 15px 40px;
            background: white;
            color: #667eea;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        /* Responsive */
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

            .timeline::before {
                left: 20px;
            }

            .timeline-content {
                width: calc(100% - 60px);
                margin-left: 60px !important;
            }

            .timeline-dot {
                left: 20px;
            }

            .timeline-item:nth-child(odd) .timeline-content {
                margin-right: auto;
            }
        }

        /* Particle Animation */
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
    </style>
</head>
<body>

    <!-- Hero Section -->
    <div class="hero">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="hero-content">
            <h1>About US</h1>
            <p>Innovation • Excellence • Growth</p>
        </div>
    </div>

    <!-- Mission & Vision Section -->
    <section class="section-white">
        <div class="container">
            <div class="section-title scroll-reveal">
                <h2>Our Mission & Vision</h2>
                <p>Driving innovation and excellence in everything we do</p>
            </div>
            <div class="mission-cards">
                <div class="mission-card scroll-reveal-left">
                    <div class="icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>To deliver cutting-edge solutions that empower businesses and transform industries through innovative technology and exceptional service.</p>
                </div>
                <div class="mission-card scroll-reveal">
                    <div class="icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>To be the global leader in technological innovation, creating a future where technology seamlessly enhances human potential.</p>
                </div>
                <div class="mission-card scroll-reveal-right">
                    <div class="icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Our Values</h3>
                    <p>Integrity, innovation, and customer-centricity drive every decision we make and every solution we create.</p>
                </div>
            </div>
        </div>
    </section>


 
    <!-- Values Section -->
    <section class="section-white">
        <div class="container">
            <div class="section-title scroll-reveal">
                <h2>Core Values</h2>
                <p>Principles that guide our every action</p>
            </div>
            <div class="values-grid">
                <div class="value-card scroll-reveal-scale">
                    <div class="icon">🎯</div>
                    <h4>Excellence</h4>
                    <p>We strive for excellence in every project and interaction.</p>
                </div>
                <div class="value-card scroll-reveal-scale">
                    <div class="icon">🤝</div>
                    <h4>Integrity</h4>
                    <p>Honesty and transparency are the foundation of our relationships.</p>
                </div>
                <div class="value-card scroll-reveal-scale">
                    <div class="icon">💡</div>
                    <h4>Innovation</h4>
                    <p>We constantly push boundaries to create cutting-edge solutions.</p>
                </div>
                <div class="value-card scroll-reveal-scale">
                    <div class="icon">🌟</div>
                    <h4>Customer First</h4>
                    <p>Our clients' success is our top priority and motivation.</p>
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
        document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right, .scroll-reveal-scale').forEach(el => {
            observer.observe(el);
        });

        // Counter Animation
        const counters = document.querySelectorAll('.counter');
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = +counter.getAttribute('data-target');
                    const increment = target / 100;
                    let count = 0;

                    const updateCounter = () => {
                        if (count < target) {
                            count += increment;
                            counter.textContent = Math.ceil(count) + '+';
                            setTimeout(updateCounter, 20);
                        } else {
                            counter.textContent = target + '+';
                        }
                    };

                    updateCounter();
                    counterObserver.unobserve(counter);
                }
            });
        }, observerOptions);

        counters.forEach(counter => counterObserver.observe(counter));

        // Skill bars animation
        const skillItems = document.querySelectorAll('.skill-item');
        const skillObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        skillItems.forEach(item => skillObserver.observe(item));

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

        // Smooth scroll behavior
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
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
    </script>
@endsection