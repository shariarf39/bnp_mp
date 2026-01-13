@extends('layouts.master')

@section('title', 'হোম - BNP রাজনৈতিক নেতা')

@section('styles')
<style>
    /* Hero Section */
    .hero {
        position: relative;
        background: linear-gradient(135deg, #ffffff 0%, #f5f7fa 100%);
        color: #2c3e50;
        padding: 0;
        overflow: hidden;
        min-height: 70vh;
        display: flex;
        align-items: center;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 50%, rgba(102, 126, 234, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(118, 75, 162, 0.08) 0%, transparent 50%);
        animation: gradientShift 15s ease infinite;
    }

    .hero::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 10%;
        width: 450px;
        height: 450px;
        background-image: url('/images/bnp_logo.png');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        opacity: 0.08;
        transform: translateY(-50%);
        z-index: 1;
        pointer-events: none;
    }

    @keyframes gradientShift {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.8; }
    }

    .hero-pattern {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(102, 126, 234, 0.03) 35px, rgba(102, 126, 234, 0.03) 70px);
        pointer-events: none;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 2rem;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
    }

    .hero-text {
        text-align: left;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: rgba(102, 126, 234, 0.1);
        padding: 0.4rem 1rem;
        border-radius: 50px;
        font-size: 0.75rem;
        margin-bottom: 1.2rem;
        border: 1px solid rgba(102, 126, 234, 0.2);
        animation: fadeInUp 1s ease;
        color: #667eea;
    }

    .hero-badge i {
        color: #667eea;
    }

    .hero h1 {
        font-size: 2.2rem;
        margin-bottom: 1rem;
        line-height: 1.3;
        background: linear-gradient(135deg, #2c3e50 0%, #667eea 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: fadeInUp 1s ease 0.2s backwards;
    }

    .hero p {
        font-size: 1rem;
        margin-bottom: 1.5rem;
        line-height: 1.6;
        color: #64748b;
        animation: fadeInUp 1s ease 0.3s backwards;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        animation: fadeInUp 1s ease 0.4s backwards;
    }

    .hero-image {
        position: relative;
        animation: fadeInRight 1s ease 0.5s backwards;
    }

    .hero-image-main {
        position: relative;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        transform: perspective(1000px) rotateY(-5deg);
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .hero-image-main:hover {
        transform: perspective(1000px) rotateY(0deg) scale(1.02);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.5);
    }

    .hero-image-main img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        display: block;
    }

    .hero-floating-card {
        position: absolute;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        padding: 1rem;
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        animation: floatCard 3s ease-in-out infinite;
    }

    .hero-floating-card.card-1 {
        top: 10%;
        right: -10%;
        animation-delay: 0s;
    }

    .hero-floating-card.card-2 {
        bottom: 15%;
        left: -5%;
        animation-delay: 1s;
    }

    @keyframes floatCard {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    .floating-card-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
    }

    .floating-card-text h4 {
        color: #333;
        font-size: 0.95rem;
        margin-bottom: 0.2rem;
    }

    .floating-card-text p {
        color: #666;
        font-size: 0.75rem;
        margin: 0;
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .btn {
        padding: 0.75rem 1.8rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.95rem;
        position: relative;
        overflow: hidden;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn span {
        position: relative;
        z-index: 1;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
    }

    .btn-secondary {
        background: rgba(102, 126, 234, 0.08);
        color: #667eea;
        border: 2px solid rgba(102, 126, 234, 0.3);
    }

    .btn-secondary:hover {
        background: rgba(102, 126, 234, 0.15);
        border-color: #667eea;
        transform: translateY(-3px);
    }

    /* Stats Section */
    .stats {
        background: white;
        padding: 1.8rem 2rem;
        margin-top: -3rem;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(102, 126, 234, 0.15);
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 2rem;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        z-index: 10;
        border: 2px solid rgba(102, 126, 234, 0.1);
    }

    .stat-item {
        text-align: center;
        position: relative;
    }

    .stat-item::after {
        content: '';
        position: absolute;
        right: -1.5rem;
        top: 50%;
        transform: translateY(-50%);
        width: 2px;
        height: 60%;
        background: linear-gradient(to bottom, transparent, #667eea, transparent);
    }

    .stat-item:last-child::after {
        display: none;
    }

    .stat-number {
        font-size: 2.2rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: block;
        margin-bottom: 0.3rem;
    }

    .stat-label {
        color: #555;
        font-size: 0.9rem;
        font-weight: 500;
    }

    /* Goals Section */
    .goals-section {
        padding: 5rem 2rem;
        background: linear-gradient(135deg, #f5f7fa 0%, #ffffff 100%);
        position: relative;
    }

    .section-title {
        text-align: left;
        font-size: 2.5rem;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        font-weight: 800;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .section-title .highlight {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-subtitle {
        text-align: left;
        color: #666;
        font-size: 1rem;
        margin-bottom: 3.5rem;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.8;
    }

    .goals-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .goal-card {
        background: white;
        padding: 2.5rem;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(102, 126, 234, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        gap: 1.8rem;
        align-items: flex-start;
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
    }

    .goal-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
        transform: scaleY(0);
        transform-origin: top;
        transition: transform 0.4s ease;
    }

    .goal-card:hover::before {
        transform: scaleY(1);
    }

    .goal-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 45px rgba(102, 126, 234, 0.25);
        border-color: rgba(102, 126, 234, 0.3);
    }

    .goal-icon {
        flex-shrink: 0;
        width: 65px;
        height: 65px;
        background: linear-gradient(135deg, #e0e7ff 0%, #ede9fe 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #667eea;
        font-size: 1.8rem;
        transition: all 0.4s ease;
        position: relative;
    }

    .goal-icon::after {
        content: '';
        position: absolute;
        inset: -8px;
        background: radial-gradient(circle, rgba(102, 126, 234, 0.2), transparent);
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .goal-card:hover .goal-icon {
        transform: scale(1.1) rotate(5deg);
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.45);
    }

    .goal-card:hover .goal-icon::after {
        opacity: 1;
    }

    .goal-content {
        flex: 1;
    }

    .goal-card h3 {
        color: #2c3e50;
        margin-bottom: 0.8rem;
        font-size: 1.35rem;
        font-weight: 700;
        transition: color 0.3s;
    }

    .goal-card:hover h3 {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .goal-card p {
        color: #64748b;
        line-height: 1.8;
        font-size: 0.98rem;
        margin: 0;
    }

    @media (max-width: 968px) {
        .goals-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Profile Section */
    .profile-section {
        padding: 4rem 2rem;
        background: linear-gradient(135deg, #ffffff 0%, #f5f7fa 100%);
        position: relative;
        overflow: hidden;
    }

    .profile-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 70% 30%, rgba(102, 126, 234, 0.06) 0%, transparent 50%),
            radial-gradient(circle at 30% 70%, rgba(118, 75, 162, 0.06) 0%, transparent 50%);
    }

    .profile-content {
        max-width: 1100px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .profile-image {
        position: relative;
    }

    .profile-image img {
        width: 100%;
        border-radius: 30px;
        box-shadow: 0 20px 60px rgba(102, 126, 234, 0.25);
        border: 5px solid rgba(102, 126, 234, 0.1);
    }

    .profile-badge {
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.6rem 1.5rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.85rem;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        white-space: nowrap;
    }

    .profile-text {
        color: #2c3e50;
    }

    .profile-text h2 {
        font-size: 2rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .profile-text p {
        font-size: 0.95rem;
        color: #64748b;
        line-height: 1.7;
        margin-bottom: 1rem;
    }

    .values-list {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin: 2rem 0;
    }

    .value-item {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        background: white;
        padding: 0.8rem 1.2rem;
        border-radius: 12px;
        border: 2px solid rgba(102, 126, 234, 0.1);
        transition: all 0.3s;
    }

    .value-item:hover {
        background: rgba(102, 126, 234, 0.05);
        transform: translateX(10px);
        border-color: rgba(102, 126, 234, 0.3);
    }

    .value-item i {
        color: #667eea;
        font-size: 1.1rem;
    }

    .value-item span {
        color: #2c3e50;
        font-size: 0.9rem;
    }

    /* Gallery Preview */
    .gallery-preview {
        padding: 4rem 2rem;
        background: linear-gradient(180deg, #f5f7fa 0%, #ffffff 100%);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 2rem auto;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 25px;
        aspect-ratio: 1;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        cursor: pointer;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .gallery-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(102, 126, 234, 0.35);
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.6s;
    }

    .gallery-item:hover img {
        transform: scale(1.15);
    }

    .gallery-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
        padding: 2rem;
        color: white;
        transform: translateY(100%);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .gallery-item:hover .gallery-overlay {
        transform: translateY(0);
    }

    .gallery-overlay h4 {
        font-size: 1.1rem;
        margin-bottom: 0.3rem;
        font-weight: 700;
    }

    .gallery-overlay p {
        font-size: 0.85rem;
        opacity: 0.9;
    }

    /* Contact CTA */
    .contact-cta {
        padding: 4rem 2rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .contact-cta::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: 
            radial-gradient(circle, rgba(255, 255, 255, 0.1) 10%, transparent 10%),
            radial-gradient(circle, rgba(255, 255, 255, 0.1) 10%, transparent 10%);
        background-size: 50px 50px;
        background-position: 0 0, 25px 25px;
        animation: movePattern 20s linear infinite;
    }

    @keyframes movePattern {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    .contact-cta .container {
        position: relative;
        z-index: 2;
    }

    .contact-cta h2 {
        font-size: 2rem;
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .contact-cta p {
        font-size: 1rem;
        margin-bottom: 1.8rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        color: rgba(255, 255, 255, 0.9);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .hero {
            min-height: auto;
            padding: 3rem 0;
        }

        .hero-content {
            grid-template-columns: 1fr;
            gap: 2rem;
            padding: 2rem 1rem;
        }

        .hero-text {
            text-align: center;
        }

        .hero h1 {
            font-size: 2.2rem;
        }

        .hero p {
            font-size: 1.1rem;
        }

        .hero-buttons {
            justify-content: center;
        }

        .hero-image-main {
            transform: none;
        }

        .hero-image-main img {
            height: 400px;
        }

        .hero-floating-card {
            display: none;
        }

        .stats {
            margin-top: -3rem;
            padding: 2rem 1.5rem;
            gap: 2rem;
        }

        .stat-number {
            font-size: 2.5rem;
        }

        .stat-item::after {
            display: none;
        }

        .profile-content {
            grid-template-columns: 1fr;
        }

        .values-list {
            grid-template-columns: 1fr;
        }

        .section-title {
            font-size: 2rem;
        }

        .goals-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-pattern"></div>
    <div class="hero-content">
        <div class="hero-text">
            <div class="hero-badge">
                <i class="fas fa-check-circle"></i>
                <span>বাংলাদেশ জাতীয়তাবাদী দল (BNP)</span>
            </div>
            <h1>একটি সুন্দর ও ঐক্যবদ্ধ আগামী গড়ার প্রত্যয়ে</h1>
            <p>গণতন্ত্রের পথেই মুক্তি, যেখানে আপনার প্রতিটি কথাই মূল্যবান এবং প্রতিটি ভোটই গড়বে আমাদের জাতির ভাগ্য।</p>
            <div class="hero-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    <span>আজই যোগ দিন</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <a href="{{ route('about') }}" class="btn btn-secondary">
                    <span>আরও জানুন</span>
                    <i class="fas fa-info-circle"></i>
                </a>
            </div>
        </div>
        
        <div class="hero-image">
            <div class="hero-image-main">
                <img src="https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=800&h=600&fit=crop" alt="Political Leader" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 800 600%22><defs><linearGradient id=%22grad1%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22><stop offset=%220%25%22 style=%22stop-color:%234CAF50;stop-opacity:1%22 /><stop offset=%22100%25%22 style=%22stop-color:%232196F3;stop-opacity:1%22 /></linearGradient></defs><rect fill=%22url(%23grad1)%22 width=%22800%22 height=%22600%22/><circle cx=%22400%22 cy=%22250%22 r=%22100%22 fill=%22white%22 opacity=%220.3%22/><rect x=%22300%22 y=%22370%22 width=%22200%22 height=%22180%22 rx=%2210%22 fill=%22white%22 opacity=%220.3%22/><text x=%2250%25%22 y=%2295%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 fill=%22white%22 font-size=%2240%22 font-family=%22Arial%22>রাজনৈতিক নেতা</text></svg>'">
            </div>
            
            <div class="hero-floating-card card-1">
                <div class="floating-card-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="floating-card-text">
                    <h4>১০,০০০+</h4>
                    <p>সক্রিয় সমর্থক</p>
                </div>
            </div>
            
            <div class="hero-floating-card card-2">
                <div class="floating-card-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="floating-card-text">
                    <h4>৫০+ প্রকল্প</h4>
                    <p>সফলভাবে সম্পন্ন</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<div class="container" style="margin-top: -4rem;">
    <div class="stats">
        <div class="stat-item">
            <span class="stat-number">১০+</span>
            <span class="stat-label">বছর সমাজ সেবা</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">৫০+</span>
            <span class="stat-label">উদ্যোগ/প্রকল্প</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">২৪/৭</span>
            <span class="stat-label">জনগণের পাশে</span>
        </div>
    </div>
</div>

<!-- Goals Section -->
<section class="goals-section">
    <div class="container">
        <h2 class="section-title">আমাদের <span class="highlight">লক্ষ্য</span></h2>
        <p class="section-subtitle">স্বাস্থ্য, শিক্ষা, কর্মসংস্থান, সামাজিক নিরাপত্তা এবং মানবিক সহায়তা—এগুলোকে অগ্রাধিকার দিয়ে টেকসই উন্নয়ন।</p>
        <div class="goals-grid">
            <div class="goal-card">
                <div class="goal-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="goal-content">
                    <h3>সামাজিক নিরাপত্তা</h3>
                    <p>আমি বিশ্বাস করি যে, প্রতিটি মানুষের জন্য একটি সুরক্ষিত এবং নিশ্চিন্ত ভবিষ্যত তৈরি করা উচিত। আমি এমন একটি পরিবেশ গঠন করতে চাই যেখানে সকলেই সমান সুযোগ ও সুরক্ষা পাবে।</p>
                </div>
            </div>

            <div class="goal-card">
                <div class="goal-icon">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <div class="goal-content">
                    <h3>চিকিৎসা সেবা</h3>
                    <p>আমি চাই সকলের জন্য উন্নত এবং সহজলভ্য চিকিৎসা সেবা নিশ্চিত করা হোক। স্বাস্থ্যসেবা ব্যবস্থার উন্নয়ন এবং সকল নাগরিকের জন্য এটি সহজে প্রাপ্য হোক, এটাই আমার লক্ষ্য।</p>
                </div>
            </div>

            <div class="goal-card">
                <div class="goal-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="goal-content">
                    <h3>দেশীয় অর্থনীতি</h3>
                    <p>আমি দেশের অর্থনৈতিক উন্নয়ন ও কর্মসংস্থানের সুযোগ বৃদ্ধির জন্য কাজ করতে চাই। আমার লক্ষ্য হল, নতুন উদ্যোগ ও পরিকল্পনার মাধ্যমে দেশের অর্থনীতি আরও শক্তিশালী করা।</p>
                </div>
            </div>

            <div class="goal-card">
                <div class="goal-icon">
                    <i class="fas fa-venus"></i>
                </div>
                <div class="goal-content">
                    <h3>নারী অধিকার</h3>
                    <p>আমি নারী অধিকারের প্রতি অত্যন্ত প্রতিশ্রুতিবদ্ধ। আমি এমন একটি সমাজ গড়ে তুলতে চাই যেখানে নারীরা সমান অধিকার ও মর্যাদা পাবে।</p>
                </div>
            </div>

            <div class="goal-card">
                <div class="goal-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <div class="goal-content">
                    <h3>বৈদেশিক নীতি</h3>
                    <p>একটি শক্তিশালী এবং বন্ধুত্বপূর্ণ বৈদেশিক নীতি গড়ে তোলা আমার অন্যতম উদ্দেশ্য, যা দেশের আন্তর্জাতিক সম্পর্ককে আরও উন্নত করবে এবং বাণিজ্যিক সুযোগ সৃষ্টি করবে।</p>
                </div>
            </div>

            <div class="goal-card">
                <div class="goal-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="goal-content">
                    <h3>শিক্ষার প্রতি মনোযোগ</h3>
                    <p>শিক্ষার মান উন্নয়ন এবং সবার জন্য সমান শিক্ষার সুযোগ নিশ্চিত করা আমার প্রধান লক্ষ্য। শিক্ষিত সমাজই দেশের পথ প্রদর্শক এবং উন্নয়নের চালিকা শক্তি।</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Profile Section -->
<section class="profile-section">
    <div class="profile-content">
        <div class="profile-image">
            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=600&h=700&fit=crop" alt="Political Leader" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 500%22><defs><linearGradient id=%22grad2%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22><stop offset=%220%25%22 style=%22stop-color:%234CAF50;stop-opacity:1%22 /><stop offset=%22100%25%22 style=%22stop-color:%232196F3;stop-opacity:1%22 /></linearGradient></defs><rect fill=%22url(%23grad2)%22 width=%22400%22 height=%22500%22/><circle cx=%22200%22 cy=%22150%22 r=%2280%22 fill=%22white%22 opacity=%220.3%22/><rect x=%22120%22 y=%22250%22 width=%22160%22 height=%22200%22 rx=%2210%22 fill=%22white%22 opacity=%220.3%22/><text x=%2250%25%22 y=%2295%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 fill=%22white%22 font-size=%2230%22 font-family=%22Arial%22>BNP নেতা</text></svg>'">
            <div class="profile-badge">
                <i class="fas fa-star"></i> তরুণ প্রজন্মের আদর্শ
            </div>
        </div>
        <div class="profile-text">
            <h2>তরুণ প্রজন্মের আদর্শিক নেতা</h2>
            <p>সকলের অংশগ্রহণে উন্নয়ন—মানুষের অধিকার, ন্যায়বিচার ও সমান সুযোগ নিশ্চিত করাই লক্ষ্য।</p>
            <p>রাজনৈতিক জীবনের শুরু হয়েছিল ছাত্র রাজনীতিতে যোগদানের মাধ্যমে। একজন মেধাবী ছাত্রনেতা হিসেবে তরুণদের অধিকার আদায়ে সর্বদা সোচ্চার থেকেছেন।</p>
            
            <div class="values-list">
                <div class="value-item">
                    <i class="fas fa-check-circle"></i>
                    <span>জনসেবায় স্বচ্ছতা ও জবাবদিহিতা</span>
                </div>
                <div class="value-item">
                    <i class="fas fa-check-circle"></i>
                    <span>দ্রুত সাড়া ও বাস্তবসম্মত উদ্যোগ</span>
                </div>
                <div class="value-item">
                    <i class="fas fa-check-circle"></i>
                    <span>সমাজের প্রতিটি মানুষের অন্তর্ভুক্তি</span>
                </div>
                <div class="value-item">
                    <i class="fas fa-check-circle"></i>
                    <span>শিক্ষা-স্বাস্থ্যকে অগ্রাধিকার</span>
                </div>
            </div>

            <div class="hero-buttons" style="justify-content: flex-start;">
                <a href="{{ route('about') }}" class="btn btn-primary">আমার সম্পর্কে</a>
                <a href="{{ route('gallery') }}" class="btn btn-secondary">কার্যক্রম দেখুন</a>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Preview -->
<section class="gallery-preview">
    <div class="container">
        <h2 class="section-title">আমাদের কার্যক্রম</h2>
        <p class="section-subtitle">মানবিক সহায়তা, স্বাস্থ্যসেবা, সামাজিক উন্নয়ন এবং মাঠপর্যায়ের উদ্যোগের কিছু ঝলক।</p>
        
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=400&h=400&fit=crop" alt="Gallery 1" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 400%22><defs><linearGradient id=%22g1%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22><stop offset=%220%25%22 style=%22stop-color:%234CAF50%22/><stop offset=%22100%25%22 style=%22stop-color:%232196F3%22/></linearGradient></defs><rect fill=%22url(%23g1)%22 width=%22400%22 height=%22400%22/><text x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 fill=%22white%22 font-size=%2240%22>সামাজিক কাজ</text></svg>'">
                <div class="gallery-overlay">
                    <h4>মানবিক সহায়তা</h4>
                    <p>দরিদ্র পরিবারে খাদ্য সামগ্রী বিতরণ</p>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?w=400&h=400&fit=crop" alt="Gallery 2" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 400%22><defs><linearGradient id=%22g2%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22><stop offset=%220%25%22 style=%22stop-color:%232196F3%22/><stop offset=%22100%25%22 style=%22stop-color:%239C27B0%22/></linearGradient></defs><rect fill=%22url(%23g2)%22 width=%22400%22 height=%22400%22/><text x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 fill=%22white%22 font-size=%2240%22>স্বাস্থ্যসেবা</text></svg>'">
                <div class="gallery-overlay">
                    <h4>স্বাস্থ্যসেবা কর্মসূচি</h4>
                    <p>বিনামূল্যে চিকিৎসা শিবির</p>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=400&h=400&fit=crop" alt="Gallery 3" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 400%22><defs><linearGradient id=%22g3%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22><stop offset=%220%25%22 style=%22stop-color:%239C27B0%22/><stop offset=%22100%25%22 style=%22stop-color:%23FF5722%22/></linearGradient></defs><rect fill=%22url(%23g3)%22 width=%22400%22 height=%22400%22/><text x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 fill=%22white%22 font-size=%2235%22>শিক্ষা কর্মসূচি</text></svg>'">
                <div class="gallery-overlay">
                    <h4>শিক্ষা সহায়তা</h4>
                    <p>মেধাবী শিক্ষার্থীদের বৃত্তি প্রদান</p>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1540910419892-4a36d2c3266c?w=400&h=400&fit=crop" alt="Gallery 4" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 400%22><defs><linearGradient id=%22g4%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22><stop offset=%220%25%22 style=%22stop-color:%23FF5722%22/><stop offset=%22100%25%22 style=%22stop-color:%234CAF50%22/></linearGradient></defs><rect fill=%22url(%23g4)%22 width=%22400%22 height=%22400%22/><text x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 fill=%22white%22 font-size=%2240%22>জনসভা</text></svg>'">
                <div class="gallery-overlay">
                    <h4>জনসভা ও মিটিং</h4>
                    <p>জনগণের সাথে সরাসরি মতবিনিময়</p>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 2rem;">
            <a href="{{ route('gallery') }}" class="btn btn-primary">সব দেখুন</a>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="contact-cta">
    <div class="container">
        <h2>আসুন, সকলে মিলে একটি সুন্দর ভবিষ্যৎ গড়ি</h2>
        <p>উন্নত আগামী বিনির্মাণে, নেতৃত্বে ঐক্যবদ্ধ হোন! এই যাত্রায় সামিল হোন।</p>
        <a href="{{ route('contact') }}" class="btn btn-primary">যোগাযোগ করুন</a>
    </div>
</section>
@endsection
