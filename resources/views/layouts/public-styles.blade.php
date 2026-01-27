<style>
        :root {
            /* Color Palette - Inspired by Masjid Merah Logo */
            --primary: #8B1538;      /* Deep Maroon - warna utama logo */
            --primary-light: #A94259; /* Lighter Maroon */
            --primary-dark: #6B0F2C;  /* Darker Maroon */
            --secondary: #D4AF37;     /* Gold - aksen emas */
            --accent: #F5F5F0;        /* Off-white cream */
            --dark: #2D1B2E;          /* Deep Purple-brown */
            --light: #FFFFFF;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* ========== PRELOADER ========== */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        #preloader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .spinner {
            width: 60px;
            height: 60px;
            position: relative;
        }

        .spinner::before {
            content: '';
            box-sizing: border-box;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 60px;
            height: 60px;
            margin-top: -30px;
            margin-left: -30px;
            border-radius: 50%;
            border: 3px solid rgba(139, 21, 56, 0.1);
            border-top-color: rgba(139, 21, 56, 0.8);
            animation: spinner 0.8s linear infinite;
        }

        @keyframes spinner {
            to { transform: rotate(360deg); }
        }

        /* ========== PAGE TRANSITION ========== */
        .page-transition {
            animation: fadeSlideIn 1s ease-out;
        }

        @keyframes fadeSlideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Page exit animation */
        body.page-exit {
            animation: fadeSlideOut 0.5s ease-in forwards;
        }

        @keyframes fadeSlideOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-30px);
            }
        }

        /* Navbar Transparent with Scroll Effect */
        .navbar-public {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: transparent;
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-public.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            padding: 0.75rem 0;
        }

        .navbar-brand {
            font-size: 1.2rem;
            font-weight: bold;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 10px;
            white-space: nowrap;
            transition: color 0.3s;
        }

        .navbar-public.scrolled .navbar-brand {
            color: var(--primary) !important;
        }

        .navbar-brand img {
            height: 40px;
            width: auto;
            flex-shrink: 0;
            transition: all 0.3s;
        }

        .navbar-public.scrolled .navbar-brand img {
            height: 35px;
        }

        .navbar-brand span {
            display: inline-block;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            transition: text-shadow 0.3s;
        }

        .navbar-public.scrolled .navbar-brand span {
            text-shadow: none;
        }

        .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }

        .navbar-public.scrolled .navbar-nav .nav-link {
            color: var(--dark);
            text-shadow: none;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--secondary);
        }

        .navbar-public.scrolled .navbar-nav .nav-link:hover,
        .navbar-public.scrolled .navbar-nav .nav-link.active {
            color: var(--primary);
        }

        .navbar-toggler {
            border-color: rgba(255,255,255,0.5);
        }

        .navbar-public.scrolled .navbar-toggler {
            border-color: rgba(139,21,56,0.3);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .navbar-public.scrolled .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28139, 21, 56, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .dropdown-item:hover {
            background-color: var(--accent);
            color: var(--primary);
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            margin-top: -90px;
            padding-top: 90px;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ asset('images/hero-masjid.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: scroll;
            z-index: 0;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(139,21,56,0.7) 0%, rgba(45,27,46,0.6) 0%);
            z-index: 1;
        }

        .hero-section .container {
            position: relative;
            z-index: 2;
        }

        .hero-logo {
            width: 200px;
            height: 200px;
            margin-bottom: 30px;
            filter: drop-shadow(0 8px 16px rgba(0,0,0,0.4));
            object-fit: contain;
        }

        .hero-section h1 {
            font-family: 'Gotham', 'Montserrat', 'Arial Black', sans-serif;
            font-size: 70px;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 3px 3px 12px rgba(0,0,0,0.6);
            letter-spacing: 0.5px;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .hero-section .hero-subtitle {
            font-family: 'Gotham', 'Montserrat', 'Arial Black', sans-serif;
            font-size: 70px;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 3px 3px 12px rgba(0,0,0,0.6);
            letter-spacing: 0.5px;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .hero-section p {
            font-size: 1.5rem;
            opacity: 0.95;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.6);
            max-width: 800px;
            margin: 0 auto 1.5rem;
            font-style: italic;
        }

        .hero-section .lead {
            font-size: 1.5rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        /* Section */
        .section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .section-title p {
            font-size: 1.1rem;
            color: #6b7280;
        }

        /* Cards */
        .card-modern {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(139,21,56,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
        }

        .card-modern:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(139,21,56,0.2);
        }

        .card-modern img {
            height: 200px;
            object-fit: cover;
        }

        .card-header {
            background: var(--primary) !important;
            color: white !important;
            border: none;
        }

        /* Bagan Struktur Pengurus */
        .bagan-card {
            width: 260px;
            text-align: center;
            position: relative;
        }

        .bagan-card img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            border: 4px solid var(--secondary);
            border-radius: 14px;
            background: #f0f0f0;
        }

        .bagan-label {
            background: var(--primary);
            color: #fff;
            padding: 14px 12px;
            margin-top: -22px;
            clip-path: polygon(5% 0, 100% 0, 95% 100%, 0 100%);
        }

        .bagan-label h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 600;
        }

        .bagan-label p {
            margin: 6px 0 0;
            font-size: 13px;
            line-height: 1.3;
        }

        /* Stats */
        .stat-item {
            text-align: center;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(139,21,56,0.1);
        }

        .stat-item i {
            font-size: 3rem;
            color: var(--secondary);
            margin-bottom: 1rem;
        }

        .stat-item h3 {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .stat-item p {
            color: #6b7280;
            margin: 0;
        }

        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 50px 0 20px;
        }

        .footer h5 {
            font-weight: bold;
            margin-bottom: 20px;
            color: var(--secondary);
            font-size: 1rem;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .footer h5 img {
            height: 35px;
            width: auto;
            flex-shrink: 0;
        }

        .footer a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer a:hover {
            color: var(--secondary);
            padding-left: 5px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            margin-top: 30px;
            text-align: center;
            color: rgba(255,255,255,0.6);
        }

        .footer .bi {
            color: var(--secondary);
        }

        /* Buttons */
        .btn-primary-custom {
            background: var(--primary);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s;
            color: white;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139,21,56,0.4);
            color: white;
        }

        .btn-light:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--primary);
        }

        .btn-outline-light:hover {
            background: var(--secondary);
            border-color: var(--secondary);
            color: var(--dark);
        }

        .bg-primary {
            background-color: var(--primary) !important;
        }

        .bg-secondary {
            background-color: var(--secondary) !important;
        }

        .text-primary {
            color: var(--primary) !important;
        }

        .border-primary {
            border-color: var(--primary) !important;
        }

        .border-secondary {
            border-color: var(--secondary) !important;
        }

        /* CTA Section with Background */
        .cta-section {
            position: relative;
            padding: 100px 0;
            color: white;
            text-align: center;
            overflow: hidden;
            isolation: isolate;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ asset('images/depanmasjid.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: scroll;
            z-index: -2;
        }

        .cta-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(139,21,56,0.7) 0%, rgba(45,27,46,0.6) 0%);
            z-index: -1;
        }

        .cta-section .container {
            position: relative;
            z-index: 1;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.4);
        }

        .cta-section .lead {
            font-size: 1.25rem;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.4);
        }

        @media (max-width: 768px) {
            .cta-section {
                padding: 60px 0;
            }

            .cta-section h2 {
                font-size: 1.75rem;
            }

            .cta-section .lead {
                font-size: 1rem;
            }

            .hero-logo {
                width: 120px;
                height: 120px;
            }

            .hero-section h1,
            .hero-section .hero-subtitle {
                font-size: 32px;
            }

            .hero-section .lead {
                font-size: 1.2rem;
            }

            .hero-section p {
                font-size: 0.95rem;
            }

            .section-title h2 {
                font-size: 1.75rem;
            }

            /* Fix Navbar Mobile Transparency */
            .navbar-public {
                background: rgba(255, 255, 255, 0.98) !important;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }

            .navbar-collapse {
                background: white !important;
                margin-top: 0.5rem;
                padding: 1rem;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            }

            .navbar-brand {
                color: var(--primary) !important;
                font-size: 0.85rem;
                gap: 8px;
            }

            .navbar-brand img {
                height: 35px;
            }

            .navbar-brand span {
                text-shadow: none !important;
                line-height: 1.2;
                max-width: 200px;
            }

            .navbar-nav .nav-link {
                color: var(--dark) !important;
                text-shadow: none !important;
            }

            .navbar-toggler {
                border-color: rgba(139,21,56,0.3);
            }

            .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28139, 21, 56, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }

            .navbar-public {
                padding: 0.75rem 0;
            }

            .navbar-public.scrolled {
                padding: 0.5rem 0;
            }

            .footer h5 {
                font-size: 0.9rem;
                margin-bottom: 15px;
            }

            .footer h5 img {
                height: 30px;
            }

            .footer {
                padding: 30px 0 15px;
            }

            .footer p,
            .footer li {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 0.75rem;
                gap: 6px;
            }

            .navbar-brand img {
                height: 30px;
            }

            .navbar-public.scrolled .navbar-brand img {
                height: 25px;
            }

            .navbar-brand span {
                max-width: 160px;
                word-break: break-word;
            }

            .footer h5 {
                font-size: 0.85rem;
            }

            .footer h5 img {
                height: 25px;
            }
        }

        @media (max-width: 400px) {
            .navbar-brand {
                font-size: 0.7rem;
            }

            .navbar-brand span {
                max-width: 140px;
            }
        }
    </style>
