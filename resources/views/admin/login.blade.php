{{-- resources/views/auth/login.blade.php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Hub - Admin Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1e3a8a;
            --accent-blue: #3b82f6;
            --light-bg: #f8fafc;
            --dark-blue: #0f172a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated background elements */
        .bg-decoration {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            pointer-events: none;
        }

        .circle-1 {
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 50%;
            top: -100px;
            left: -100px;
            animation: float 8s ease-in-out infinite;
        }

        .circle-2 {
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(30, 58, 138, 0.2);
            border-radius: 50%;
            bottom: -50px;
            right: -50px;
            animation: float 10s ease-in-out infinite reverse;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) translateX(0px);
            }

            50% {
                transform: translateY(30px) translateX(20px);
            }
        }

        .login-container {
            position: relative;
            z-index: 1;
            max-width: 450px;
            width: 100%;
            padding: 20px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            padding: 50px 40px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--accent-blue), var(--primary-blue));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 30px;
            color: white;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
        }

        .login-header h2 {
            color: var(--dark-blue);
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 28px;
        }

        .login-header p {
            color: #64748b;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            color: var(--dark-blue);
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
            font-size: 14px;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .form-control:focus {
            border-color: var(--accent-blue);
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: #94a3b8;
        }

        .input-group-text {
            background: transparent;
            border: 2px solid #e2e8f0;
            border-left: none;
            color: #64748b;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .input-group:focus-within .input-group-text {
            border-color: var(--accent-blue);
            color: var(--accent-blue);
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
            border: 2px solid #cbd5e1;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            accent-color: var(--accent-blue);
        }

        .form-check-input:checked {
            background: var(--accent-blue);
            border-color: var(--accent-blue);
        }

        .form-check-label {
            margin-left: 10px;
            color: #475569;
            cursor: pointer;
            font-size: 14px;
            user-select: none;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 25px;
        }

        .forgot-password a {
            color: var(--accent-blue);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .forgot-password a:hover {
            color: var(--primary-blue);
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            padding: 12px 20px;
            background: linear-gradient(135deg, var(--accent-blue), var(--primary-blue));
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.6s ease;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: #cbd5e1;
            font-size: 14px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        .divider span {
            margin: 0 15px;
            color: #94a3b8;
        }

        .social-login {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .social-btn {
            flex: 1;
            padding: 10px;
            border: 2px solid #e2e8f0;
            background: white;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 18px;
            color: #64748b;
        }

        .social-btn:hover {
            border-color: var(--accent-blue);
            color: var(--accent-blue);
            background: rgba(59, 130, 246, 0.05);
        }

        .signup-link {
            text-align: center;
            color: #475569;
            font-size: 14px;
        }

        .signup-link a {
            color: var(--accent-blue);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .signup-link a:hover {
            color: var(--primary-blue);
        }

        .alert {
            border-radius: 12px;
            border: none;
            margin-bottom: 20px;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
        }

        /* Mobile responsive */
        @media (max-width: 576px) {
            .glass-card {
                padding: 35px 25px;
            }

            .login-header h2 {
                font-size: 24px;
            }

            .login-container {
                padding: 15px;
            }

            .circle-1,
            .circle-2 {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="bg-decoration">
        <div class="circle-1"></div>
        <div class="circle-2"></div>
    </div>

    <div class="login-container">
        <div class="glass-card">
            <!-- Header -->
            <div class="login-header">
                <div class="logo-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h2>Event Hub</h2>
                <p>Admin Login</p>
            </div>

            <!-- Alert Messages -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Login Failed!</strong>
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="admin@example.com" value="{{ old('email') }}" required autofocus>
                    @error('email')
                    <div class="invalid-feedback"
                        style="display: block; color: #dc2626; font-size: 12px; margin-top: 5px;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Enter your password" required>
                        <span class="input-group-text" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                    <div class="invalid-feedback"
                        style="display: block; color: #dc2626; font-size: 12px; margin-top: 5px;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Remember Me -->

                <!-- Forgot Password Link -->


                <!-- Login Button -->
                <button type="submit" class="login-btn">
                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                </button>
            </form>

            <!-- Signup Link -->

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password visibility toggle
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
    </script>
</body>

</html> --}}








{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Hub - Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            color: #333;
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
        /* Add this CSS to your style section: */
.gradient-text {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: gradientShift 3s ease infinite;
    background-size: 200% 200%;
}

@keyframes gradientShift {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
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

        /* Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
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

        /* Login Container */
        .login-container {
            position: relative;
            z-index: 1;
            max-width: 450px;
            width: 100%;
            padding: 20px;
            opacity: 0;
            transform: translateY(50px);
            animation: fadeInUp 1s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Glass Card */
        .glass-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 45px 40px;
            position: relative;
            overflow: hidden;
        }

        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }

        /* Login Header */
        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 30px;
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            transition: all 0.4s ease;
        }

        .logo-icon:hover {
            transform: rotateY(360deg);
        }

        .login-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }

        .login-header p {
            color: #666;
            font-size: 0.9rem;
        }

        /* Alert Messages */
        .alert {
            padding: 14px 18px;
            border-radius: 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            font-size: 0.85rem;
            animation: slideInDown 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
            border: 2px solid #6ee7b7;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
            border: 2px solid #fca5a5;
        }

        .alert i {
            font-size: 1.2rem;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        /* Input Group */
        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            z-index: 2;
            pointer-events: none;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px 12px 45px;
            border: 2px solid #e5e7eb;
            border-radius: 50px;
            font-size: 0.85rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: #fff;
            color: #1f2937;
            outline: none;
        }

        .form-input.password-input {
            padding-right: 45px;
        }

        /* Floating Label */
        .floating-label {
            position: absolute;
            left: 45px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 0.85rem;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            background: #fff;
            padding: 0 6px;
            font-weight: 400;
        }

        /* Active/Focus State */
        .form-input:focus,
        .form-input:not(:placeholder-shown) {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-input:focus~.floating-label,
        .form-input:not(:placeholder-shown)~.floating-label {
            top: -10px;
            left: 38px;
            font-size: 0.7rem;
            color: #667eea;
            font-weight: 600;
        }

        .form-input:focus~.input-icon {
            color: #667eea;
            transform: translateY(-50%) scale(1.05);
        }

        /* Required Indicator */
        .required-indicator {
            color: #ef4444;
            margin-left: 2px;
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 2;
            font-size: 0.95rem;
        }

        .password-toggle:hover {
            color: #667eea;
        }

        /* Error State */
        .form-input.error {
            border-color: #ef4444;
            animation: shake 0.4s;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-4px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(4px);
            }
        }

        .error-message {
            color: #ef4444;
            font-size: 0.7rem;
            margin-top: 6px;
            margin-left: 16px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Submit Button */
        .submit-button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-top: 10px;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .submit-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .submit-button:hover::before {
            left: 100%;
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .button-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            position: relative;
            z-index: 1;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .glass-card {
                padding: 35px 25px;
            }

            .login-header h2 {
                font-size: 1.5rem;
            }

            .login-container {
                padding: 15px;
            }

            .form-input {
                padding: 11px 14px 11px 42px;
                font-size: 0.8rem;
            }

            .input-icon {
                left: 14px;
                font-size: 0.9rem;
            }

            .floating-label {
                left: 42px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <!-- Floating Shapes -->
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>

    <!-- Particles Background -->
    <div class="particles" id="particles"></div>

    <div class="login-container">
        <div class="glass-card">
            <!-- Header -->
            <div class="login-header">
                <div class="logo-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
            
                <h2 class="gradient-text">Event Hub</h2>
                <p>Admin Login</p>
            </div>

            <!-- Alert Messages -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i>
                <div>
                    <strong>Login Failed!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            @if (session('status'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('status') }}</span>
            </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.post') }}" id="loginForm">
                @csrf

                <!-- Email -->
                <div class="input-group">
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" class="form-input @error('email') error @enderror"
                            placeholder=" " value="{{ old('email') }}" required autofocus>
                        <label class="floating-label">
                            Email Address <span class="required-indicator">*</span>
                        </label>
                    </div>
                    @error('email')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="input-group">
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="password" id="password"
                            class="form-input password-input @error('password') error @enderror" placeholder=" "
                            required>
                        <label class="floating-label">
                            Password <span class="required-indicator">*</span>
                        </label>
                        <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                    </div>
                    @error('password')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Login Button -->
                <button type="submit" class="submit-button">
                    <span class="button-content">
                        <span class="button-text">Sign In</span>
                        <i class="fas fa-sign-in-alt button-icon"></i>
                    </span>
                </button>
            </form>
        </div>
    </div>

    <script>
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

        // Password visibility toggle
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.className = type === 'password' ? 'fas fa-eye password-toggle' : 'fas fa-eye-slash password-toggle';
        });

        // Real-time input validation
        const formInputs = document.querySelectorAll('.form-input');

        formInputs.forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('error');
                const errorElement = this.parentElement.parentElement.querySelector('.error-message');
                if (errorElement) {
                    errorElement.style.display = 'none';
                }
            });

            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
    </script>
</body>

</html>