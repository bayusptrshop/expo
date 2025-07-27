<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Expo Management System</title>
    <link rel="icon" href="{{ asset('img/logo-expo.jpg') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="login-card">
                        <div class="row g-0">
                            <!-- Left side - Brand/Image -->
                            <div class="col-md-6 d-none d-md-flex login-banner">
                                <div class="login-banner-content">
                                    <div class="logo-area mb-5">
                                        <img src="{{ asset('img/logo-expo.jpg') }}" alt="Expo Logo" class="logo-image">
                                    </div>
                                    <h2 class="banner-title">Welcome to<br>Expo Management</h2>
                                    <p class="banner-text">Sign in to access your dashboard and manage your expo events
                                        efficiently.</p>
                                    <div class="banner-shape-1"></div>
                                    <div class="banner-shape-2"></div>
                                </div>
                            </div>

                            <!-- Right side - Login Form -->
                            <div class="col-md-6">
                                <div class="login-form-wrapper">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <h3 class="form-title">Sign In</h3>
                                            <p class="form-subtitle">Welcome back! Please login to your account.</p>
                                        </div>
                                        
                                        <div class="d-block d-md-none">
                                            <img src="{{ asset('img/logo-expo.jpg') }}" alt="Expo Logo"
                                                class="mobile-logo">
                                        </div>
                                    </div>

                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                                <div>{{ session('error') }}</div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label for="email" class="form-label">Email Address</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                    <i class="bi bi-envelope"></i>
                                                </span>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Enter your email" required>
                                            </div>
                                            @error('email')
                                                <div class="text-danger mt-1 small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4">
                                            {{-- <div class="d-flex justify-content-between align-items-center mb-1">
                                                <label for="qr_hash" class="form-label">QR Hash</label>
                                                <a href="#" class="forgot-link">Need help?</a>
                                            </div> --}}
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                    <i class="bi bi-qr-code"></i>
                                                </span>
                                                <input type="text" class="form-control" id="qr_hash" name="qr_hash"
                                                    placeholder="Enter your ID Code" required>
                                            </div>
                                            @error('qr_hash')
                                                <div class="text-danger mt-1 small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- <div class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                            <label class="form-check-label" for="remember">
                                                Remember me
                                            </label>
                                        </div> --}}

                                        <button type="submit" class="btn btn-primary btn-login w-100">
                                            Sign In <i class="bi bi-arrow-right ms-1"></i>
                                        </button>

                                        {{-- <div class="text-center mt-4">
                                            <p class="no-account">
                                                Don't have an account? <a href="#" class="signup-link">Contact
                                                    administrator</a>
                                            </p>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a0ca3;
            --primary-light: #4895ef;
            --secondary: #4cc9f0;
            --dark: #212529;
            --light: #f8f9fa;
            --gray: #6c757d;
            --success: #2ecc71;
            --danger: #e74c3c;
            --border-radius: 12px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }

        .login-card {
            background-color: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Banner/Left Side */
        .login-banner {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-banner-content {
            padding: 3rem;
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .banner-title {
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .banner-text {
            opacity: 0.9;
            font-size: 1rem;
            max-width: 90%;
        }

        .logo-image {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid rgba(255, 255, 255, 0.2);
        }

        .banner-shape-1,
        .banner-shape-2 {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .banner-shape-1 {
            width: 300px;
            height: 300px;
            bottom: -150px;
            right: -150px;
        }

        .banner-shape-2 {
            width: 200px;
            height: 200px;
            top: -100px;
            left: -100px;
        }

        /* Form/Right Side */
        .login-form-wrapper {
            padding: 3rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            color: var(--gray);
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        .mobile-logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .form-label {
            font-weight: 500;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .input-group-merge .input-group-text {
            background-color: transparent;
            border-right: none;
            color: var(--gray);
        }

        .input-group-merge .form-control {
            border-left: none;
            padding-left: 0;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: var(--primary);
        }

        .input-group-merge .form-control:focus+.input-group-text {
            border-color: var(--primary);
        }

        .form-control,
        .input-group-text {
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
        }

        .forgot-link {
            color: var(--primary);
            font-size: 0.85rem;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .forgot-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-login {
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            background-color: var(--primary);
            border-color: var(--primary);
            transition: var(--transition);
        }

        .btn-login:hover,
        .btn-login:focus {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }

        .no-account {
            font-size: 0.9rem;
            color: var(--gray);
        }

        .signup-link {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }

        .signup-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .alert {
            border-radius: var(--border-radius);
            border: none;
        }

        /* Responsive Adjustments */
        @media (max-width: 767.98px) {
            .login-form-wrapper {
                padding: 2rem;
            }

            .login-wrapper {
                padding: 1rem;
            }

            .form-title {
                font-size: 1.5rem;
            }

            .form-subtitle {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 575.98px) {
            .login-form-wrapper {
                padding: 1.5rem;
            }
        }
    </style>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'9648edb172a5fe03',t:'MTc1MzQxNzg5NC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
</body>

</html>
