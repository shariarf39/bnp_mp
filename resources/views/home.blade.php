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

    .hero-slider {
        position: relative;
        width: 100%;
        height: 400px;
        overflow: hidden;
    }

    .hero-slider-track {
        display: flex;
        transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
    }

    .hero-slide {
        min-width: 100%;
        height: 100%;
        position: relative;
    }

    .hero-slide img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
        background: transparent;
    }

    .slider-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 0.5rem;
        z-index: 10;
    }

    .slider-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.3s;
        border: 2px solid rgba(255, 255, 255, 0.8);
    }

    .slider-dot.active {
        width: 30px;
        border-radius: 5px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-color: white;
    }

    .slider-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s;
        opacity: 0;
    }

    .hero-image-main:hover .slider-nav {
        opacity: 1;
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
        color: #667eea;
        font-size: 1.2rem;
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

    /* Extra Small Screens (Small Mobile) */
    @media (max-width: 480px) {
        .container {
            padding: 0 1rem;
        }

        .hero h1 {
            font-size: 1.5rem;
        }

        .hero p {
            font-size: 0.9rem;
        }

        .hero-badge {
            font-size: 0.75rem;
            padding: 0.4rem 0.8rem;
        }

        .stats {
            grid-template-columns: 1fr;
            gap: 1rem;
            margin-top: -1rem;
        }

        .stat-item {
            text-align: center;
        }

        .section-title {
            font-size: 1.5rem;
        }

        .section-subtitle {
            font-size: 0.85rem;
        }

        .gallery-grid {
            grid-template-columns: 1fr;
        }

        .gallery-item {
            height: 220px;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            font-size: 0.9rem;
        }

        .profile-text h2 {
            font-size: 1.5rem;
        }

        .goal-card {
            padding: 1.25rem;
        }

        .goal-icon {
            width: 45px;
            height: 45px;
            font-size: 1.2rem;
        }
    }

    @media (max-width: 768px) {
        .hero {
            min-height: auto;
            padding: 2rem 0;
        }

        .hero-content {
            grid-template-columns: 1fr;
            gap: 1.5rem;
            padding: 1.5rem 1rem;
        }

        .hero-text {
            text-align: center;
        }

        .hero h1 {
            font-size: 1.8rem;
            line-height: 1.3;
        }

        .hero p {
            font-size: 1rem;
            line-height: 1.6;
        }

        .hero-badge {
            font-size: 0.85rem;
            padding: 0.5rem 1rem;
        }

        .hero-buttons {
            flex-direction: column;
            gap: 1rem;
            justify-content: center;
        }

        .hero-buttons .btn {
            width: 100%;
            justify-content: center;
        }

        .hero-image-main {
            transform: none;
            margin: 0 auto;
        }

        .hero-image-main img {
            height: 350px;
            max-width: 100%;
        }

        .hero-floating-card {
            display: none;
        }

        /* Stats Section */
        .stats {
            margin-top: -2rem;
            padding: 1.5rem 1rem;
            gap: 1.5rem;
            grid-template-columns: 1fr 1fr;
        }

        .stat-item {
            padding: 1.5rem 1rem;
        }

        .stat-number {
            font-size: 2rem;
        }

        .stat-label {
            font-size: 0.85rem;
        }

        .stat-item::after {
            display: none;
        }

        /* Profile Section */
        .profile-section {
            padding: 3rem 1rem;
        }

        .profile-content {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .profile-image {
            max-width: 100%;
            margin: 0 auto;
        }

        .profile-text h2 {
            font-size: 1.8rem;
        }

        .profile-text p {
            font-size: 0.95rem;
        }

        .values-list {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }

        .value-item {
            font-size: 0.9rem;
        }

        /* Goals Section */
        .goals-section {
            padding: 3rem 1rem;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .section-subtitle {
            font-size: 0.95rem;
        }

        .goals-grid {
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }

        .goal-card {
            padding: 1.5rem;
        }

        .goal-icon {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
        }

        .goal-content h3 {
            font-size: 1.1rem;
        }

        .goal-content p {
            font-size: 0.9rem;
        }

        /* Gallery Section */
        .gallery-preview {
            padding: 3rem 1rem;
        }

        .gallery-grid {
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .gallery-item {
            height: 180px;
        }

        .gallery-overlay h4 {
            font-size: 0.95rem;
        }

        .gallery-overlay p {
            font-size: 0.8rem;
        }

        /* Contact CTA */
        .contact-cta {
            padding: 3rem 1rem;
        }

        /* Contact Form Styles - Professional Design */
        .contact-cta .form-section {
            animation: none;
            opacity: 1;
        }

        .contact-cta .form-container {
            background: #ffffff !important;
            border-radius: 16px;
            padding: 2rem 2rem;
            position: relative;
            z-index: 30;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(102, 126, 234, 0.1);
            max-width: 650px;
            margin: 0 auto;
            opacity: 1 !important;
        }

        .contact-cta .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #667eea);
            background-size: 300% 100%;
            animation: gradientMove 3s linear infinite;
            border-radius: 16px 16px 0 0;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 0%; }
            100% { background-position: 300% 0%; }
        }

        /* Professional Form Styling */
        .contact-cta .form-group,
        .hero-main-content .form-group {
            margin-bottom: 1.25rem;
        }

        .contact-cta .form-group label,
        .hero-main-content .form-group label {
            display: block !important;
            width: 100% !important;
            text-align: left !important;
            margin-bottom: 0.5rem !important;
            color: #1e293b !important;
            font-weight: 600 !important;
            font-size: 0.9rem !important;
            letter-spacing: 0.01em;
        }

        .contact-cta .form-group label i,
        .hero-main-content .form-group label i {
            margin-right: 0.4rem;
            color: #667eea;
            font-size: 0.9rem;
        }

        .contact-cta .form-group input,
        .contact-cta .form-group textarea,
        .contact-cta .form-group select,
        .hero-main-content .form-group input,
        .hero-main-content .form-group textarea,
        .hero-main-content .form-group select {
            display: block !important;
            width: 100% !important;
            box-sizing: border-box !important;
            background: #f8fafc !important;
            color: #1e293b !important;
            border-radius: 10px !important;
            border: 2px solid #e2e8f0 !important;
            padding: 0.75rem 1rem !important;
            font-size: 0.95rem !important;
            font-family: 'Noto Sans Bengali', sans-serif !important;
            transition: all 0.3s ease;
            line-height: 1.5;
        }

        .contact-cta .form-group input::placeholder,
        .contact-cta .form-group textarea::placeholder,
        .hero-main-content .form-group input::placeholder,
        .hero-main-content .form-group textarea::placeholder {
            color: #94a3b8;
        }

        .contact-cta .form-group input:focus,
        .contact-cta .form-group textarea:focus,
        .contact-cta .form-group select:focus,
        .hero-main-content .form-group input:focus,
        .hero-main-content .form-group textarea:focus,
        .hero-main-content .form-group select:focus {
            outline: none;
            background: #ffffff;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .contact-cta .form-row,
        .hero-main-content .form-row {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            gap: 1rem !important;
            margin-bottom: 0 !important;
        }

        .contact-cta .form-row .form-group,
        .hero-main-content .form-row .form-group {
            margin-bottom: 1.25rem;
        }

        .contact-cta .form-group textarea,
        .hero-main-content .form-group textarea {
            resize: vertical;
            min-height: 100px;
            line-height: 1.6;
        }

        .contact-cta .form-group select,
        .hero-main-content .form-group select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23667eea' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 3rem;
        }

        .contact-cta .form-group select option,
        .hero-main-content .form-group select option {
            background: #ffffff;
            color: #1e293b;
            padding: 0.5rem;
        }

        @media (max-width: 768px) {
            .contact-cta .form-row,
            .hero-main-content .form-row { 
                grid-template-columns: 1fr !important;
                gap: 0 !important;
            }
            .contact-cta .form-container,
            .hero-main-content .form-container { 
                margin-left: auto; 
                margin-right: auto;
                padding: 1.5rem !important;
                max-width: 100%;
            }

            .form-header h2 {
                font-size: 1.3rem !important;
            }

            .form-header p {
                font-size: 0.85rem !important;
            }

            .submit-btn {
                font-size: 0.95rem !important;
                padding: 0.85rem 1.25rem !important;
            }
        }
        }

        .form-header {
            text-align: center;
            margin-bottom: 1.75rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .form-header h2 {
            font-size: 1.5rem;
            margin-bottom: 0.4rem;
            color: #1e293b;
            font-weight: 700;
        }

        .form-header h2 i {
            color: #667eea;
            margin-right: 0.4rem;
        }

        .form-header p {
            color: #64748b;
            font-size: 0.9rem;
            margin: 0;
        }

        .submit-btn {
            width: 100%;
            padding: 0.9rem 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Noto Sans Bengali', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            margin-top: 0.25rem;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.45);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .alert {
            padding: 0.85rem 1.25rem;
            border-radius: 10px;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: flex-start;
            gap: 0.65rem;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .alert-success {
            background: #f0fdf4;
            border: 2px solid #86efac;
            color: #166534;
        }

        .alert-success i {
            color: #22c55e;
            font-size: 1.1rem;
            margin-top: 0.1rem;
        }

        .alert-error {
            background: #fef2f2;
            border: 2px solid #fca5a5;
            color: #991b1b;
        }

        .alert-error i {
            color: #ef4444;
            font-size: 1.1rem;
            margin-top: 0.1rem;
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
                <span>{{ $content['hero_badge_text'] ?? 'বাংলাদেশ জাতীয়তাবাদী দল (BNP)' }}</span>
            </div>
            <h1>{{ $content['hero_title'] ?? 'একটি সুন্দর ও ঐক্যবদ্ধ আগামী গড়ার প্রত্যয়ে' }}</h1>
            <p>{{ $content['hero_subtitle'] ?? 'গণতন্ত্রের পথেই মুক্তি, যেখানে আপনার প্রতিটি কথাই মূল্যবান এবং প্রতিটি ভোটই গড়বে আমাদের জাতির ভাগ্য।' }}</p>
            <div class="hero-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    <span>{{ $content['hero_button_primary'] ?? 'আজই যোগ দিন' }}</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <a href="{{ route('about') }}" class="btn btn-secondary">
                    <span>{{ $content['hero_button_secondary'] ?? 'আরও জানুন' }}</span>
                    <i class="fas fa-info-circle"></i>
                </a>
            </div>
        </div>
        
        <div class="hero-image">
            <div class="hero-image-main">
                <div class="hero-slider">
                    <div class="hero-slider-track" id="sliderTrack">
                        @forelse($heroSlides as $slide)
                        <div class="hero-slide">
                            <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}">
                        </div>
                        @empty
                        <div class="hero-slide">
                            <img src="https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=800&h=600&fit=crop" alt="Default" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 800 600%22><defs><linearGradient id=%22grad1%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22><stop offset=%220%25%22 style=%22stop-color:%23667eea%22/><stop offset=%22100%25%22 style=%22stop-color:%23764ba2%22/></linearGradient></defs><rect fill=%22url(%23grad1)%22 width=%22800%22 height=%22600%22/><text x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 fill=%22white%22 font-size=%2240%22>রাজনৈতিক নেতা</text></svg>'">
                        </div>
                        @endforelse
                    </div>
                </div>
                @if(isset($heroSlides) && $heroSlides->count() > 1)
                <div class="slider-nav prev" onclick="moveSlide(-1)">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="slider-nav next" onclick="moveSlide(1)">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="slider-dots" id="sliderDots"></div>
                @endif
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
            <span class="stat-number">{{ $content['stat1_number'] ?? '১০+' }}</span>
            <span class="stat-label">{{ $content['stat1_label'] ?? 'বছর সমাজ সেবা' }}</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $content['stat2_number'] ?? '৫০+' }}</span>
            <span class="stat-label">{{ $content['stat2_label'] ?? 'উদ্যোগ/প্রকল্প' }}</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $content['stat3_number'] ?? '২৪/৭' }}</span>
            <span class="stat-label">{{ $content['stat3_label'] ?? 'জনগণের পাশে' }}</span>
        </div>
    </div>
</div>

<!-- Goals Section -->
<section class="goals-section">
    <div class="container">
        <h2 class="section-title">{{ $content['goals_title'] ?? 'আমাদের' }} <span class="highlight">লক্ষ্য</span></h2>
        <p class="section-subtitle">{{ $content['goals_subtitle'] ?? 'স্বাস্থ্য, শিক্ষা, কর্মসংস্থান, সামাজিক নিরাপত্তা এবং মানবিক সহায়তা—এগুলোকে অগ্রাধিকার দিয়ে টেকসই উন্নয়ন।' }}</p>
        <div class="goals-grid">
            <div class="goal-card">
                <div class="goal-icon">
                    <i class="fas fa-{{ $content['goal1_icon'] ?? 'balance-scale' }}"></i>
                </div>
                <div class="goal-content">
                    <h3>{{ $content['goal1_title'] ?? 'গণতন্ত্র ও ন্যায়বিচার' }}</h3>
                    <p>{{ $content['goal1_description'] ?? 'সকল নাগরিকের ভোটের অধিকার রক্ষা এবং স্বাধীন বিচার ব্যবস্থা নিশ্চিত করা আমাদের প্রধান লক্ষ্য।' }}</p>
                </div>
            </div>

            <div class="goal-card">
                <div class="goal-icon">
                    <i class="fas fa-{{ $content['goal2_icon'] ?? 'graduation-cap' }}"></i>
                </div>
                <div class="goal-content">
                    <h3>{{ $content['goal2_title'] ?? 'শিক্ষা ও স্বাস্থ্যসেবা' }}</h3>
                    <p>{{ $content['goal2_description'] ?? 'মানসম্মত শিক্ষা এবং স্বাস্থ্যসেবা সবার জন্য সহজলভ্য করা এবং দক্ষ জনশক্তি গড়ে তোলা।' }}</p>
                </div>
            </div>

            <div class="goal-card">
                <div class="goal-icon">
                    <i class="fas fa-{{ $content['goal3_icon'] ?? 'chart-line' }}"></i>
                </div>
                <div class="goal-content">
                    <h3>{{ $content['goal3_title'] ?? 'দেশীয় অর্থনীতি' }}</h3>
                    <p>{{ $content['goal3_description'] ?? 'আমি দেশের অর্থনৈতিক উন্নয়ন ও কর্মসংস্থানের সুযোগ বৃদ্ধির জন্য কাজ করতে চাই। আমার লক্ষ্য হল, নতুন উদ্যোগ ও পরিকল্পনার মাধ্যমে দেশের অর্থনীতি আরও শক্তিশালী করা।' }}</p>
                </div>
            </div>

            <div class="goal-card">
                <div class="goal-icon">
                    <i class="fas fa-{{ $content['goal4_icon'] ?? 'venus' }}"></i>
                </div>
                <div class="goal-content">
                    <h3>{{ $content['goal4_title'] ?? 'নারী অধিকার' }}</h3>
                    <p>{{ $content['goal4_description'] ?? 'আমি নারী অধিকারের প্রতি অত্যন্ত প্রতিশ্রুতিবদ্ধ। আমি এমন একটি সমাজ গড়ে তুলতে চাই যেখানে নারীরা সমান অধিকার ও মর্যাদা পাবে।' }}</p>
                </div>
            </div>

            <div class="goal-card">
                <div class="goal-icon">
                    <i class="fas fa-{{ $content['goal5_icon'] ?? 'globe' }}"></i>
                </div>
                <div class="goal-content">
                    <h3>{{ $content['goal5_title'] ?? 'বৈদেশিক নীতি' }}</h3>
                    <p>{{ $content['goal5_description'] ?? 'একটি শক্তিশালী এবং বন্ধুত্বপূর্ণ বৈদেশিক নীতি গড়ে তোলা আমার অন্যতম উদ্দেশ্য, যা দেশের আন্তর্জাতিক সম্পর্ককে আরও উন্নত করবে এবং বাণিজ্যিক সুযোগ সৃষ্টি করবে।' }}</p>
                </div>
            </div>

            <div class="goal-card">
                <div class="goal-icon">
                    <i class="fas fa-{{ $content['goal6_icon'] ?? 'book-open' }}"></i>
                </div>
                <div class="goal-content">
                    <h3>{{ $content['goal6_title'] ?? 'শিক্ষার প্রতি মনোযোগ' }}</h3>
                    <p>{{ $content['goal6_description'] ?? 'শিক্ষার মান উন্নয়ন এবং সবার জন্য সমান শিক্ষার সুযোগ নিশ্চিত করা আমার প্রধান লক্ষ্য। শিক্ষিত সমাজই দেশের পথ প্রদর্শক এবং উন্নয়নের চালিকা শক্তি।' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Profile Section -->
<section class="profile-section">
    <div class="profile-content">
        <div class="profile-image">
            @if(!empty($content['leader_image']))
                <img src="{{ asset('storage/' . $content['leader_image']) }}" alt="Political Leader">
            @else
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=600&h=700&fit=crop" alt="Political Leader" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 500%22><defs><linearGradient id=%22grad2%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22><stop offset=%220%25%22 style=%22stop-color:%234CAF50;stop-opacity:1%22 /><stop offset=%22100%25%22 style=%22stop-color:%232196F3;stop-opacity:1%22 /></linearGradient></defs><rect fill=%22url(%23grad2)%22 width=%22400%22 height=%22500%22/><circle cx=%22200%22 cy=%22150%22 r=%2280%22 fill=%22white%22 opacity=%220.3%22/><rect x=%22120%22 y=%22250%22 width=%22160%22 height=%22200%22 rx=%2210%22 fill=%22white%22 opacity=%220.3%22/><text x=%2250%25%22 y=%2295%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 fill=%22white%22 font-size=%2230%22 font-family=%22Arial%22>BNP নেতা</text></svg>'">
            @endif
            <div class="profile-badge">
                <i class="fas fa-star"></i> {{ $content['leader_badge'] ?? 'তরুণ প্রজন্মের আদর্শ' }}
            </div>
        </div>
        <div class="profile-text">
            <h2>{{ $content['leader_title'] ?? 'তরুণ প্রজন্মের আদর্শিক নেতা' }}</h2>
            <p>{{ $content['leader_description'] ?? 'সকলের অংশগ্রহণে উন্নয়ন—মানুষের অধিকার, ন্যায়বিচার ও সমান সুযোগ নিশ্চিত করাই লক্ষ্য।' }}</p>
            <p>{{ $content['leader_bio'] ?? 'রাজনৈতিক জীবনের শুরু হয়েছিল ছাত্র রাজনীতিতে যোগদানের মাধ্যমে। একজন মেধাবী ছাত্রনেতা হিসেবে তরুণদের অধিকার আদায়ে সর্বদা সোচ্চার থেকেছেন।' }}</p>
            
            <div class="values-list">
                <div class="value-item">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ $content['leader_value1'] ?? 'জনসেবায় স্বচ্ছতা ও জবাবদিহিতা' }}</span>
                </div>
                <div class="value-item">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ $content['leader_value2'] ?? 'দ্রুত সাড়া ও বাস্তবসম্মত উদ্যোগ' }}</span>
                </div>
                <div class="value-item">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ $content['leader_value3'] ?? 'সমাজের প্রতিটি মানুষের অন্তর্ভুক্তি' }}</span>
                </div>
                <div class="value-item">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ $content['leader_value4'] ?? 'শিক্ষা-স্বাস্থ্যকে অগ্রাধিকার' }}</span>
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
            @if($activities && $activities->count() > 0)
                @foreach($activities as $activity)
                    <div class="gallery-item">
                        @if($activity->image)
                            <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}">
                        @else
                            <img src="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 400%22><defs><linearGradient id=%22g{{ $loop->iteration }}%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22><stop offset=%220%25%22 style=%22stop-color:%234CAF50%22/><stop offset=%22100%25%22 style=%22stop-color:%232196F3%22/></linearGradient></defs><rect fill=%22url(%23g{{ $loop->iteration }})%22 width=%22400%22 height=%22400%22/><text x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 fill=%22white%22 font-size=%2235%22>{{ $activity->title }}</text></svg>" alt="{{ $activity->title }}">
                        @endif
                        <div class="gallery-overlay">
                            <h4>{{ $activity->title }}</h4>
                            @if($activity->description)
                                <p>{{ Str::limit($activity->description, 60) }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Fallback static content if no activities -->
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
            @endif
        </div>

        <div style="text-align: center; margin-top: 2rem;">
            <a href="{{ route('gallery') }}" class="btn btn-primary">সব দেখুন</a>
        </div>
    </div>
</section>

<!-- Contact Form Section (embedded) -->
<section class="contact-cta" style="padding: 4rem 2rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
        <div class="form-section">
            <div class="form-container" style="background: #ffffff !important; border-radius: 16px; padding: 2rem; max-width: 650px; margin: 0 auto; box-shadow: 0 20px 60px rgba(0,0,0,0.15); position: relative; z-index: 30;">
                <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #667eea); border-radius: 16px 16px 0 0;"></div>
                <div class="form-header" style="text-align: center; margin-bottom: 1.75rem; padding: 1rem 0; padding-top: 0.5rem; border-bottom: 2px solid #f1f5f9;">
                    <h2 style="font-size: 1.5rem; margin-bottom: 0.4rem; color: #1e293b; font-weight: 700;"><i class="fas fa-paper-plane" style="color: #667eea; margin-right: 0.4rem;"></i> বার্তা পাঠান</h2>
                    <p style="color: #64748b; font-size: 0.9rem; margin: 0;">আপনার মতামত বা পরামর্শ এখানে সরাসরি পাঠাতে পারেন</p>
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
                    <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 0;">
                        <div class="form-group" style="margin-bottom: 1.25rem;">
                            <label for="name_home" style="display: block; width: 100%; text-align: left; margin-bottom: 0.5rem; color: #1e293b; font-weight: 600; font-size: 0.9rem;">আপনার নাম *</label>
                            <input type="text" id="name_home" name="name" value="{{ old('name') }}" required placeholder="পূর্ণ নাম লিখুন" style="display: block; width: 100%; box-sizing: border-box; background: #f8fafc; color: #1e293b; border-radius: 10px; border: 2px solid #e2e8f0; padding: 0.75rem 1rem; font-size: 0.95rem; font-family: 'Noto Sans Bengali', sans-serif;">
                        </div>

                        <div class="form-group" style="margin-bottom: 1.25rem;">
                            <label for="phone_home" style="display: block; width: 100%; text-align: left; margin-bottom: 0.5rem; color: #1e293b; font-weight: 600; font-size: 0.9rem;">ফোন নম্বর</label>
                            <input type="tel" id="phone_home" name="phone" value="{{ old('phone') }}" placeholder="০১XXXXXXXXX" style="display: block; width: 100%; box-sizing: border-box; background: #f8fafc; color: #1e293b; border-radius: 10px; border: 2px solid #e2e8f0; padding: 0.75rem 1rem; font-size: 0.95rem; font-family: 'Noto Sans Bengali', sans-serif;">
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 1.25rem;">
                        <label for="subject_home" style="display: block; width: 100%; text-align: left; margin-bottom: 0.5rem; color: #1e293b; font-weight: 600; font-size: 0.9rem;">বিষয়</label>
                        <select id="subject_home" name="subject" style="display: block; width: 100%; box-sizing: border-box; background: #f8fafc; color: #1e293b; border-radius: 10px; border: 2px solid #e2e8f0; padding: 0.75rem 1rem; font-size: 0.95rem; font-family: 'Noto Sans Bengali', sans-serif; cursor: pointer;">
                            <option value="">বিষয় নির্বাচন করুন</option>
                            <option value="general">সাধারণ অনুসন্ধান</option>
                            <option value="support">সহায়তা অনুরোধ</option>
                            <option value="feedback">মতামত ও পরামর্শ</option>
                            <option value="volunteer">স্বেচ্ছাসেবক হতে চাই</option>
                            <option value="other">অন্যান্য</option>
                        </select>
                    </div>

                    <div class="form-group" style="margin-bottom: 1.25rem;">
                        <label for="message_home" style="display: block; width: 100%; text-align: left; margin-bottom: 0.5rem; color: #1e293b; font-weight: 600; font-size: 0.9rem;">আপনার বার্তা *</label>
                        <textarea id="message_home" name="message" required placeholder="আপনার মতামত, পরামর্শ বা যেকোনো বার্তা লিখুন..." style="display: block; width: 100%; box-sizing: border-box; background: #f8fafc; color: #1e293b; border-radius: 10px; border: 2px solid #e2e8f0; padding: 0.75rem 1rem; font-size: 0.95rem; font-family: 'Noto Sans Bengali', sans-serif; resize: vertical; min-height: 100px; line-height: 1.6;">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="submit-btn" style="width: 100%; padding: 0.9rem 1.5rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 10px; font-size: 1rem; font-weight: 600; cursor: pointer; font-family: 'Noto Sans Bengali', sans-serif; display: flex; align-items: center; justify-content: center; gap: 0.6rem; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3); margin-top: 0.25rem;">
                        <i class="fas fa-paper-plane"></i>
                        <span>বার্তা পাঠান</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
// Hero Image Slider
let currentSlide = 0;
const slides = document.querySelectorAll('.hero-slide');
const totalSlides = slides.length;
const sliderTrack = document.getElementById('sliderTrack');
const dotsContainer = document.getElementById('sliderDots');
let autoSlideInterval;

// Create dots
for (let i = 0; i < totalSlides; i++) {
    const dot = document.createElement('div');
    dot.className = 'slider-dot' + (i === 0 ? ' active' : '');
    dot.onclick = () => goToSlide(i);
    dotsContainer.appendChild(dot);
}

function updateSlider() {
    sliderTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
    
    // Update dots
    const dots = document.querySelectorAll('.slider-dot');
    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === currentSlide);
    });
}

function moveSlide(direction) {
    currentSlide += direction;
    
    if (currentSlide >= totalSlides) {
        currentSlide = 0;
    } else if (currentSlide < 0) {
        currentSlide = totalSlides - 1;
    }
    
    updateSlider();
    resetAutoSlide();
}

function goToSlide(index) {
    currentSlide = index;
    updateSlider();
    resetAutoSlide();
}

function autoSlide() {
    currentSlide++;
    if (currentSlide >= totalSlides) {
        currentSlide = 0;
    }
    updateSlider();
}

function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    autoSlideInterval = setInterval(autoSlide, 4000);
}

// Start auto slide
autoSlideInterval = setInterval(autoSlide, 4000);

// Pause on hover
const heroImageMain = document.querySelector('.hero-image-main');
heroImageMain.addEventListener('mouseenter', () => {
    clearInterval(autoSlideInterval);
});

heroImageMain.addEventListener('mouseleave', () => {
    resetAutoSlide();
});

// Contact form behavior (home page)
setTimeout(function() {
    const alert = document.querySelector('.form-section .alert-success');
    if (alert) {
        alert.style.transition = 'all 0.5s';
        alert.style.opacity = '0';
        alert.style.transform = 'translateY(-10px)';
        setTimeout(() => alert.remove(), 500);
    }
}, 5000);

const homeForm = document.querySelector('.form-section form');
if (homeForm) {
    homeForm.addEventListener('submit', function(e) {
        const submitBtn = homeForm.querySelector('.submit-btn');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>পাঠানো হচ্ছে...</span>';
        submitBtn.disabled = true;
    });
}
</script>
@endsection
