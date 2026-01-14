@extends('layouts.master')

@section('title', 'যোগাযোগ - BNP রাজনৈতিক নেতা')

@section('styles')
<style>
    /* Main Hero with Spider Web Animation */
    .contact-hero {
        background: linear-gradient(135deg, #0c1929 0%, #1a1a2e 50%, #16213e 100%);
        color: white;
        padding: 4rem 2rem;
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    /* Spider Web Canvas Background */
    .spider-web-canvas {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    /* Animated Gradient Orbs */
    .gradient-orbs {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
    }

    .orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.4;
        animation: orbFloat 20s ease-in-out infinite;
    }

    .orb-1 {
        width: 400px;
        height: 400px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        top: -100px;
        left: -100px;
        animation-delay: 0s;
    }

    .orb-2 {
        width: 300px;
        height: 300px;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        top: 50%;
        right: -50px;
        animation-delay: -5s;
    }

    .orb-3 {
        width: 350px;
        height: 350px;
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        bottom: -100px;
        left: 30%;
        animation-delay: -10s;
    }

    .orb-4 {
        width: 250px;
        height: 250px;
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        top: 20%;
        right: 30%;
        animation-delay: -15s;
    }

    @keyframes orbFloat {
        0%, 100% { transform: translate(0, 0) scale(1); }
        25% { transform: translate(50px, -30px) scale(1.1); }
        50% { transform: translate(-30px, 50px) scale(0.9); }
        75% { transform: translate(-50px, -20px) scale(1.05); }
    }

    /* Glowing Lines Animation */
    .glow-lines {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        overflow: hidden;
    }

    .glow-line {
        position: absolute;
        width: 2px;
        height: 100%;
        background: linear-gradient(to bottom, transparent, rgba(102, 126, 234, 0.5), transparent);
        animation: lineMove 8s linear infinite;
    }

    .glow-line:nth-child(1) { left: 10%; animation-delay: 0s; }
    .glow-line:nth-child(2) { left: 25%; animation-delay: -2s; }
    .glow-line:nth-child(3) { left: 40%; animation-delay: -4s; }
    .glow-line:nth-child(4) { left: 55%; animation-delay: -6s; }
    .glow-line:nth-child(5) { left: 70%; animation-delay: -1s; }
    .glow-line:nth-child(6) { left: 85%; animation-delay: -3s; }

    @keyframes lineMove {
        0% { transform: translateY(-100%); opacity: 0; }
        50% { opacity: 1; }
        100% { transform: translateY(100%); opacity: 0; }
    }

    /* Hero Content Layout - Form beside Leader */
    .hero-main-content {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 3rem;
        align-items: center;
        position: relative;
        z-index: 10;
        width: 100%;
    }

    /* Leader Section */
    .leader-section {
        text-align: center;
        animation: fadeInLeft 1s ease-out;
    }

    @keyframes fadeInLeft {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .leader-image-container {
        position: relative;
        width: 320px;
        height: 380px;
        margin: 0 auto 2rem;
    }

    /* Animated Border Ring */
    .image-ring {
        position: absolute;
        top: -15px;
        left: -15px;
        right: -15px;
        bottom: -15px;
        border: 3px solid transparent;
        border-radius: 30px;
        background: linear-gradient(135deg, #667eea, #764ba2, #f093fb, #667eea) border-box;
        -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
        mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        animation: ringRotate 4s linear infinite;
    }

    @keyframes ringRotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .leader-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 25px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
    }

    .leader-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
    }

    .leader-placeholder i {
        font-size: 6rem;
        color: rgba(255, 255, 255, 0.3);
    }

    .leader-info {
        text-align: center;
    }

    .leader-info h2 {
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, #fff 0%, #e0e7ff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .leader-info p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 1rem;
    }

    .leader-badge {
        display: inline-block;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 0.5rem 1.5rem;
        border-radius: 30px;
        font-size: 0.85rem;
        margin-top: 1rem;
    }

    /* Contact Details under Leader */
    .quick-contact-info {
        margin-top: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .quick-info-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: rgba(255, 255, 255, 0.05);
        padding: 1rem 1.5rem;
        border-radius: 15px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s;
    }

    .quick-info-item:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateX(10px);
    }

    .quick-info-item i {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
    }

    .quick-info-item span {
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.9);
    }

    .quick-info-item a {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
    }

    /* Form Section */
    .form-section {
        animation: fadeInRight 1s ease-out 0.3s both;
    }

    @keyframes fadeInRight {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .form-container {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 30px;
        padding: 3rem;
        position: relative;
        overflow: hidden;
    }

    .form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #667eea);
        background-size: 300% 100%;
        animation: gradientMove 3s linear infinite;
    }

    @keyframes gradientMove {
        0% { background-position: 0% 0%; }
        100% { background-position: 300% 0%; }
    }

    .form-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .form-header h2 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, #fff 0%, #e0e7ff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .form-header p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 1rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 1rem 1.2rem;
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        font-family: 'Noto Sans Bengali', sans-serif;
        font-size: 1rem;
        transition: all 0.3s;
        background: rgba(255, 255, 255, 0.05);
        color: white;
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: rgba(255, 255, 255, 0.4);
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #667eea;
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
    }

    .form-group select option {
        background: #1a1a2e;
        color: white;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .submit-btn {
        width: 100%;
        padding: 1.2rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 15px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        font-family: 'Noto Sans Bengali', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        position: relative;
        overflow: hidden;
    }

    .submit-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .submit-btn:hover::before {
        left: 100%;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
    }

    .alert {
        padding: 1rem 1.5rem;
        border-radius: 15px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        backdrop-filter: blur(10px);
    }

    .alert-success {
        background: rgba(34, 197, 94, 0.2);
        border: 1px solid rgba(34, 197, 94, 0.3);
        color: #86efac;
    }

    .alert-error {
        background: rgba(239, 68, 68, 0.2);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #fca5a5;
    }

    /* Social Links */
    .social-links-hero {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 2rem;
    }

    .social-links-hero a {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        transition: all 0.3s;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .social-links-hero a:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        transform: translateY(-5px) scale(1.1);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    }

    /* Floating Icons Animation */
    .floating-icons {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 2;
        pointer-events: none;
        overflow: hidden;
    }

    .float-icon {
        position: absolute;
        font-size: 1.5rem;
        color: rgba(255, 255, 255, 0.1);
        animation: floatIcon 20s linear infinite;
    }

    .float-icon:nth-child(1) { left: 5%; animation-delay: 0s; }
    .float-icon:nth-child(2) { left: 15%; animation-delay: -3s; }
    .float-icon:nth-child(3) { left: 25%; animation-delay: -6s; }
    .float-icon:nth-child(4) { left: 75%; animation-delay: -9s; }
    .float-icon:nth-child(5) { left: 85%; animation-delay: -12s; }
    .float-icon:nth-child(6) { left: 95%; animation-delay: -15s; }

    @keyframes floatIcon {
        0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
        10% { opacity: 0.3; }
        90% { opacity: 0.3; }
        100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
    }

    /* CTA Section */
    .cta-section {
        padding: 5rem 2rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .cta-content {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
        color: white;
    }

    .cta-content h2 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .cta-content p {
        font-size: 1.2rem;
        opacity: 0.9;
        margin-bottom: 2rem;
    }

    .cta-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .cta-btn {
        padding: 1rem 2.5rem;
        border-radius: 30px;
        font-size: 1.1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .cta-btn-primary {
        background: white;
        color: #667eea;
    }

    .cta-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .cta-btn-secondary {
        background: transparent;
        color: white;
        border: 2px solid white;
    }

    .cta-btn-secondary:hover {
        background: white;
        color: #667eea;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .hero-main-content {
            grid-template-columns: 1fr;
            gap: 3rem;
        }

        .leader-section {
            order: 1;
        }

        .form-section {
            order: 2;
        }

        .leader-image-container {
            width: 280px;
            height: 340px;
        }

        .quick-contact-info {
            display: none;
        }
    }

    @media (max-width: 576px) {
        .contact-hero {
            padding: 2rem 1rem;
            min-height: auto;
        }

        .leader-image-container {
            width: 220px;
            height: 280px;
        }

        .form-container {
            padding: 2rem 1.5rem;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .form-header h2 {
            font-size: 1.5rem;
        }

        .leader-info h2 {
            font-size: 1.4rem;
        }

        .cta-content h2 {
            font-size: 1.8rem;
        }
    }
</style>
@endsection

@section('content')
@php
    $leaderImage = \App\Models\SiteContent::getValue('leader_image');
    $leaderName = \App\Models\SiteContent::getValue('leader_name', 'নেতার নাম');
    $leaderTitle = \App\Models\SiteContent::getValue('leader_title', 'রাজনৈতিক নেতা');
    $footerPhone = \App\Models\SiteContent::getValue('footer_phone', '+৮৮০ ১XXX-XXXXXX');
    $footerEmail = \App\Models\SiteContent::getValue('footer_email', 'info@example.com');
    $footerAddress = \App\Models\SiteContent::getValue('footer_address', 'ঢাকা, বাংলাদেশ');
    $facebookUrl = \App\Models\SiteContent::getUrl('footer_facebook_url', '#');
    $youtubeUrl = \App\Models\SiteContent::getUrl('footer_youtube_url', '#');
    $twitterUrl = \App\Models\SiteContent::getUrl('footer_twitter_url', '#');
@endphp

<!-- Main Hero Section with Spider Web Animation -->
<section class="contact-hero">
    <!-- Animated Gradient Orbs -->
    <div class="gradient-orbs">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
        <div class="orb orb-4"></div>
    </div>

    <!-- Glowing Lines -->
    <div class="glow-lines">
        <div class="glow-line"></div>
        <div class="glow-line"></div>
        <div class="glow-line"></div>
        <div class="glow-line"></div>
        <div class="glow-line"></div>
        <div class="glow-line"></div>
    </div>

    <!-- Floating Icons -->
    <div class="floating-icons">
        <i class="fas fa-envelope float-icon"></i>
        <i class="fas fa-phone float-icon"></i>
        <i class="fas fa-comment float-icon"></i>
        <i class="fas fa-heart float-icon"></i>
        <i class="fas fa-star float-icon"></i>
        <i class="fas fa-users float-icon"></i>
    </div>

    <!-- Spider Web Canvas -->
    <canvas class="spider-web-canvas" id="spiderWebCanvas"></canvas>

    <!-- Main Content: Leader + Form side by side -->
    <div class="hero-main-content">
        <!-- Leader Section (Left) -->
        <div class="leader-section">
            <div class="leader-image-container">
                <div class="image-ring"></div>
                @if($leaderImage)
                    <img src="{{ asset('storage/' . $leaderImage) }}" alt="{{ $leaderName }}">
                @else
                    <div class="leader-placeholder">
                        <i class="fas fa-user"></i>
                    </div>
                @endif
            </div>

            <div class="leader-info">
                <h2>{{ $leaderName }}</h2>
                <p>{{ $leaderTitle }}</p>
                <span class="leader-badge"><i class="fas fa-check-circle"></i> সদা আপনার সেবায়</span>
            </div>

            <!-- Quick Contact Info -->
            <div class="quick-contact-info">
                <div class="quick-info-item">
                    <i class="fas fa-phone-alt"></i>
                    <a href="tel:{{ $footerPhone }}"><span>{{ $footerPhone }}</span></a>
                </div>
                <div class="quick-info-item">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:{{ $footerEmail }}"><span>{{ $footerEmail }}</span></a>
                </div>
                <div class="quick-info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $footerAddress }}</span>
                </div>
            </div>

            <!-- Social Links -->
            <div class="social-links-hero">
                <a href="{{ $facebookUrl }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ $youtubeUrl }}" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="{{ $twitterUrl }}" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

        <!-- Form Section (Right) -->
        <div class="form-section">
            <div class="form-container">
                <div class="form-header">
                    <h2><i class="fas fa-paper-plane"></i> বার্তা পাঠান</h2>
                    <p>আপনার মতামত বা পরামর্শ জানান</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <div>
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name"><i class="fas fa-user"></i> আপনার নাম *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="পূর্ণ নাম লিখুন">
                        </div>

                        <div class="form-group">
                            <label for="phone"><i class="fas fa-phone"></i> ফোন নম্বর</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="০১XXXXXXXXX">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject"><i class="fas fa-tag"></i> বিষয়</label>
                        <select id="subject" name="subject">
                            <option value="">বিষয় নির্বাচন করুন</option>
                            <option value="general">সাধারণ অনুসন্ধান</option>
                            <option value="support">সহায়তা অনুরোধ</option>
                            <option value="feedback">মতামত ও পরামর্শ</option>
                            <option value="volunteer">স্বেচ্ছাসেবক হতে চাই</option>
                            <option value="other">অন্যান্য</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message"><i class="fas fa-comment-dots"></i> আপনার বার্তা *</label>
                        <textarea id="message" name="message" required placeholder="আপনার মতামত, পরামর্শ বা যেকোনো বার্তা লিখুন...">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i>
                        <span>বার্তা পাঠান</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-content">
        <h2>স্বেচ্ছাসেবক হিসেবে যোগ দিন</h2>
        <p>আমাদের উন্নয়ন যাত্রায় অংশীদার হোন। একসাথে আমরা পরিবর্তন আনতে পারি।</p>
        <div class="cta-buttons">
            <a href="#" class="cta-btn cta-btn-primary">
                <i class="fas fa-hands-helping"></i> স্বেচ্ছাসেবক হতে চাই
            </a>
            <a href="{{ $facebookUrl }}" target="_blank" class="cta-btn cta-btn-secondary">
                <i class="fab fa-facebook-f"></i> ফেসবুকে যোগ দিন
            </a>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Spider Web Animation with Moving Lines (মাকড়সার জাল)
    const canvas = document.getElementById('spiderWebCanvas');
    const ctx = canvas.getContext('2d');

    let width, height;
    let particles = [];
    let mouse = { x: null, y: null, radius: 150 };

    function resize() {
        width = canvas.width = window.innerWidth;
        height = canvas.height = canvas.parentElement.offsetHeight;
    }

    class Particle {
        constructor() {
            this.x = Math.random() * width;
            this.y = Math.random() * height;
            this.vx = (Math.random() - 0.5) * 0.8;
            this.vy = (Math.random() - 0.5) * 0.8;
            this.radius = Math.random() * 2 + 1;
        }

        update() {
            // Bounce off edges
            if (this.x < 0 || this.x > width) this.vx = -this.vx;
            if (this.y < 0 || this.y > height) this.vy = -this.vy;

            // Mouse interaction
            if (mouse.x !== null) {
                const dx = mouse.x - this.x;
                const dy = mouse.y - this.y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < mouse.radius) {
                    const force = (mouse.radius - dist) / mouse.radius;
                    this.vx -= dx * force * 0.02;
                    this.vy -= dy * force * 0.02;
                }
            }

            this.x += this.vx;
            this.y += this.vy;
        }

        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(102, 126, 234, 0.6)';
            ctx.fill();
        }
    }

    function init() {
        resize();
        particles = [];
        const particleCount = Math.min(100, Math.floor((width * height) / 15000));
        for (let i = 0; i < particleCount; i++) {
            particles.push(new Particle());
        }
    }

    function connectParticles() {
        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                const maxDist = 150;

                if (dist < maxDist) {
                    const opacity = 1 - (dist / maxDist);
                    ctx.beginPath();
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    
                    // Gradient line color
                    const gradient = ctx.createLinearGradient(
                        particles[i].x, particles[i].y,
                        particles[j].x, particles[j].y
                    );
                    gradient.addColorStop(0, `rgba(102, 126, 234, ${opacity * 0.5})`);
                    gradient.addColorStop(1, `rgba(118, 75, 162, ${opacity * 0.5})`);
                    
                    ctx.strokeStyle = gradient;
                    ctx.lineWidth = opacity * 1.5;
                    ctx.stroke();
                }
            }
        }
    }

    function animate() {
        ctx.clearRect(0, 0, width, height);

        particles.forEach(p => {
            p.update();
            p.draw();
        });

        connectParticles();
        requestAnimationFrame(animate);
    }

    // Mouse movement
    canvas.addEventListener('mousemove', (e) => {
        const rect = canvas.getBoundingClientRect();
        mouse.x = e.clientX - rect.left;
        mouse.y = e.clientY - rect.top;
    });

    canvas.addEventListener('mouseleave', () => {
        mouse.x = null;
        mouse.y = null;
    });

    window.addEventListener('resize', () => {
        resize();
        init();
    });

    init();
    animate();

    // Auto-hide success message
    setTimeout(function() {
        const alert = document.querySelector('.alert-success');
        if (alert) {
            alert.style.transition = 'all 0.5s';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';
            setTimeout(() => alert.remove(), 500);
        }
    }, 5000);

    // Form submit animation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const submitBtn = form.querySelector('.submit-btn');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>পাঠানো হচ্ছে...</span>';
        submitBtn.disabled = true;
    });
</script>
@endsection