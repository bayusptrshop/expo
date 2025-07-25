
<header class="navbar-wrapper">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <!-- Logo/Brand -->
            <a class="navbar-brand" href="/">
                <div class="brand-container">
                    <div class="brand-logo">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M7.5 12.5L10.5 15.5L16.5 9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <span class="brand-text">Expo</span>
                </div>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/penilaian">
                            <i class="bi bi-clipboard-data"></i>
                            <span>Penilaian</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/scan">
                            <i class="bi bi-qr-code-scan"></i>
                            <span>Scan QR</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">
                            <i class="bi bi-speedometer2"></i>
                            <span>Admin</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kontestan">
                            <i class="bi bi-trophy"></i>
                            <span>Kontestan</span>
                        </a>
                    </li>
                </ul>

                <!-- Right side actions -->
                <div class="navbar-actions">
                    <a href="#" class="btn btn-primary">
                        <i class="bi bi-person-plus"></i>
                        <span>Daftar</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Spacer to prevent content from hiding under fixed navbar -->
    <div class="navbar-spacer"></div>
</header>

<!-- Bootstrap Icons CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    /* Navbar Styling */
    :root {
        --navbar-height: 70px;
        --navbar-height-mobile: 60px;
        --primary: #4361ee;
        --primary-dark: #3a0ca3;
        --primary-light: #4895ef;
        --dark: #212529;
        --light: #f8f9fa;
        --gray: #6c757d;
        --gray-light: #e9ecef;
        --transition: all 0.3s ease;
    }

    /* Navbar Wrapper */
    .navbar-wrapper {
        position: relative;
        z-index: 1030; /* Higher than default Bootstrap navbar */
    }

    /* Navbar Spacer - prevents content from hiding under fixed navbar */
    .navbar-spacer {
        height: var(--navbar-height);
    }

    /* Main Navbar */
    .navbar {
        height: var(--navbar-height);
        background-color: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        transition: var(--transition);
    }

    /* Navbar Brand/Logo */
    .navbar-brand {
        padding: 0;
        margin-right: 2rem;
    }

    .brand-container {
        display: flex;
        align-items: center;
    }

    .brand-logo {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--primary);
        color: white;
        border-radius: 8px;
        margin-right: 10px;
    }

    .brand-logo svg {
        width: 20px;
        height: 20px;
    }

    .brand-text {
        font-weight: 700;
        font-size: 1.25rem;
        color: var(--dark);
    }

    /* Navbar Toggler */
    .navbar-toggler {
        border: none;
        padding: 0;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background-color: var(--gray-light);
    }

    .navbar-toggler:focus {
        box-shadow: none;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* Navbar Nav */
    .navbar-nav {
        gap: 0.5rem;
    }

    .nav-item {
        position: relative;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem !important;
        color: var(--dark);
        font-weight: 500;
        border-radius: 8px;
        transition: var(--transition);
    }

    .nav-link i {
        margin-right: 8px;
        font-size: 1.1rem;
        color: var(--gray);
        transition: var(--transition);
    }

    .nav-link:hover {
        background-color: rgba(67, 97, 238, 0.1);
        color: var(--primary);
    }

    .nav-link:hover i {
        color: var(--primary);
    }

    .nav-link.active {
        background-color: rgba(67, 97, 238, 0.15);
        color: var(--primary);
    }

    .nav-link.active i {
        color: var(--primary);
    }

    /* Navbar Actions */
    .navbar-actions {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .navbar-actions .btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.25rem;
        font-weight: 500;
        border-radius: 8px;
        transition: var(--transition);
    }

    .navbar-actions .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .navbar-actions .btn-primary:hover {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }

    /* Scrolled State */
    .navbar.scrolled {
        height: 60px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    /* Responsive Adjustments */
    @media (max-width: 991.98px) {
        .navbar {
            height: var(--navbar-height-mobile);
        }

        .navbar-spacer {
            height: var(--navbar-height-mobile);
        }

        .navbar-collapse {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            margin-top: 0.5rem;
            max-height: calc(100vh - var(--navbar-height-mobile) - 2rem);
            overflow-y: auto;
        }

        .navbar-nav {
            gap: 0.25rem;
        }

        .navbar-actions {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-light);
        }

        .navbar-actions .btn {
            width: 100%;
            justify-content: center;
        }

        .brand-logo {
            width: 28px;
            height: 28px;
        }

        .brand-logo svg {
            width: 18px;
            height: 18px;
        }

        .brand-text {
            font-size: 1.1rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add active class to current page nav link
        const currentLocation = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentLocation) {
                link.classList.add('active');
            }
        });

        // Add scrolled class to navbar on scroll
        const navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Close navbar collapse on click outside
        document.addEventListener('click', function(event) {
            const navbarCollapse = document.getElementById('navbarContent');
            const navbarToggler = document.querySelector('.navbar-toggler');

            if (navbarCollapse.classList.contains('show') &&
                !navbarCollapse.contains(event.target) &&
                !navbarToggler.contains(event.target)) {
                navbarToggler.click();
            }
        });
    });
</script>
