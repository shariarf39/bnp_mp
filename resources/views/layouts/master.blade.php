<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'রাজনৈতিক নেতা - BNP')</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Noto Sans Bengali', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Header & Navigation */
        .header {
            background: white;
            padding: 0.8rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(102, 126, 234, 0.08);
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 700;
            transition: all 0.3s;
        }

        .logo span {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .logo:hover {
            transform: translateY(-2px);
        }

        .logo-icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon img {
            height: 70px;
            width: auto;
            object-fit: contain;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
        }

        .nav-menu a {
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            padding: 0.6rem 1.2rem;
            border-radius: 10px;
            position: relative;
            font-size: 0.95rem;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transition: width 0.3s;
        }

        .nav-menu a:hover::after, .nav-menu a.active::after {
            width: 70%;
        }

        .nav-menu a:hover, .nav-menu a.active {
            color: #667eea;
            background: rgba(102, 126, 234, 0.08);
        }

        .cta-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
            padding: 0.65rem 1.4rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            font-size: 0.9rem;
        }

        .cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(102, 126, 234, 0.5);
        }

        .nav-menu .cta-btn::after {
            display: none;
        }
        
        .admin-btn {
            background: linear-gradient(135deg, #f59e0b 0%, #ea580c 100%) !important;
            color: white !important;
            padding: 0.65rem 1.4rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
            font-size: 0.9rem;
        }

        .admin-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(245, 158, 11, 0.5);
        }

        .nav-menu .admin-btn::after {
            display: none;
        }

        /* Mobile Menu Toggle */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            color: #667eea;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Main Content */
        main {
            min-height: 60vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: #e2e8f0;
            padding: 4rem 0 0;
            margin-top: 0;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.5), transparent);
        }

        .footer::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.1), transparent);
            border-radius: 50%;
            pointer-events: none;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem 3rem;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 3rem;
            position: relative;
            z-index: 2;
        }

        .footer-logo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin-bottom: 1rem;
            border: 2px solid rgba(102, 126, 234, 0.3);
            object-fit: cover;
        }

        .footer-section h3 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            font-weight: 700;
            font-size: 1.15rem;
            position: relative;
            padding-bottom: 0.8rem;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .footer-section p {
            color: #94a3b8;
            line-height: 1.8;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .footer-section p i {
            color: #667eea;
            width: 20px;
            margin-right: 0.5rem;
        }

        .footer-section a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            margin-bottom: 0.8rem;
            transition: all 0.3s;
            font-size: 0.95rem;
            position: relative;
            padding-left: 1rem;
        }

        .footer-section a::before {
            content: '→';
            position: absolute;
            left: 0;
            opacity: 0;
            transition: all 0.3s;
            color: #667eea;
        }

        .footer-section a:hover {
            color: #667eea;
            padding-left: 1.5rem;
        }

        .footer-section a:hover::before {
            opacity: 1;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            width: 45px;
            height: 45px;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(102, 126, 234, 0.2);
            position: relative;
            overflow: hidden;
            padding: 0;
            margin: 0;
        }

        .social-links a::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .social-links a i {
            position: relative;
            z-index: 2;
            transition: all 0.4s;
        }

        .social-links a:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
            border-color: transparent;
        }

        .social-links a:hover::before {
            opacity: 1;
        }

        .social-links a:hover i {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding: 1.5rem 2rem;
            background: rgba(0, 0, 0, 0.2);
            color: #94a3b8;
            font-size: 0.9rem;
            position: relative;
            z-index: 2;
        }

        .footer-bottom p {
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .mobile-toggle {
                display: block;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                padding: 1rem;
                gap: 0;
                box-shadow: 0 4px 20px rgba(102, 126, 234, 0.15);
            }

            .nav-menu.active {
                display: flex;
            }

            .nav-menu li {
                width: 100%;
            }

            .nav-menu a {
                display: block;
                padding: 1rem;
            }

            .cta-btn {
                display: inline-block;
                margin-top: 1rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">
                <div class="logo-icon">
                    <img src="{{ asset('images/Dhaner-Shish-_2 (1).webp') }}" alt="Logo">
                </div>
                <span>Mirza Abbas</span>
            </a>
            
            <button class="mobile-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>
            
            <nav>
                <ul class="nav-menu" id="navMenu">
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">হোম</a></li>
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">আমার সম্পর্কে</a></li>
                    <li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">গ্যালারি</a></li>
                    <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">যোগাযোগ</a></li>
                    <li><a href="{{ route('admin.hero-slides.index') }}" class="admin-btn"><i class="fas fa-shield-alt"></i> অ্যাডমিন</a></li>
                    <li><a href="{{ route('contact') }}" class="cta-btn">আজই যোগ দিন</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                @if(\App\Models\SiteContent::getValue('about_logo'))
                <img src="{{ asset('storage/' . \App\Models\SiteContent::getValue('about_logo')) }}" alt="Logo" class="footer-logo">
                @endif
                <h3>{{ \App\Models\SiteContent::getValue('footer_about_title', 'আমাদের সম্পর্কে') }}</h3>
                <p>{{ \App\Models\SiteContent::getValue('footer_about_text', 'গণতন্ত্রের পথেই মুক্তি, যেখানে আপনার প্রতিটি কথাই মূল্যবান এবং প্রতিটি ভোটই গড়বে আমাদের জাতির ভাগ্য।') }}</p>
                <div class="social-links">
                    <a href="{{ \App\Models\SiteContent::getUrl('footer_facebook_url', '#') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ \App\Models\SiteContent::getUrl('footer_youtube_url', '#') }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="{{ \App\Models\SiteContent::getUrl('footer_twitter_url', '#') }}" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>দ্রুত লিংক</h3>
                <a href="{{ route('home') }}">হোম</a>
                <a href="{{ route('about') }}">আমার সম্পর্কে</a>
                <a href="{{ route('gallery') }}">গ্যালারি</a>
                <a href="{{ route('contact') }}">যোগাযোগ</a>
            </div>
            
            <div class="footer-section">
                <h3>প্রয়োজনীয় তথ্য</h3>
                <a href="https://www.bnpbd.org/" target="_blank">Bangladesh Nationalist Party</a>
                <a href="http://bangladesh.gov.bd/" target="_blank">বাংলাদেশ সরকারের অফিসিয়াল ওয়েবসাইট</a>
            </div>
            
            <div class="footer-section">
                <h3>যোগাযোগ</h3>
                <p><i class="fas fa-phone"></i> {{ \App\Models\SiteContent::getValue('footer_phone', '+৮৮০ ১XXX-XXXXXX') }}</p>
                <p><i class="fas fa-envelope"></i> {{ \App\Models\SiteContent::getValue('footer_email', 'info@example.com') }}</p>
                <p><i class="fas fa-map-marker-alt"></i> {{ \App\Models\SiteContent::getValue('footer_address', 'ঢাকা, বাংলাদেশ') }}</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} {{ \App\Models\SiteContent::getValue('footer_copyright', 'BNP রাজনৈতিক নেতা। সর্বস্বত্ব সংরক্ষিত।') }}</p>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById('navMenu').classList.toggle('active');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('navMenu');
            const toggle = document.querySelector('.mobile-toggle');
            
            if (!menu.contains(event.target) && !toggle.contains(event.target)) {
                menu.classList.remove('active');
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
