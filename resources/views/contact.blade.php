@extends('layouts.master')

@section('title', 'যোগাযোগ - মির্জা আব্বাস')

@section('styles')
<style>
    /* Background Image Slider - Full Width Top */
    .background-slider {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 220px;
        overflow: hidden;
        z-index: 0;
        background: linear-gradient(180deg, #f8f9fa 0%, white 100%);
    }

    .background-slider .slider-track {
        display: flex;
        gap: 2rem;
        animation: scrollSlider 60s linear infinite;
        height: 100%;
        align-items: center;
        will-change: transform;
        width: max-content; /* Allow track to expand to fit all images */
    }

    @keyframes scrollSlider {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .background-slider .slider-item {
        min-width: 300px;
        max-width: 300px; /* Fixed width for consistent animation */
        height: 180px;
        position: relative;
        flex-shrink: 0;
        transform: rotate(-5deg);
    }

    .background-slider .slider-item:nth-child(even) {
        transform: rotate(5deg);
        margin-top: 20px;
    }

    .background-slider .slider-item:nth-child(3n) {
        transform: rotate(-3deg);
        margin-top: -10px;
    }

    .background-slider .slider-item:nth-child(4n) {
        transform: rotate(7deg);
        margin-top: 15px;
    }

    .background-slider .slider-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 1;
        border-radius: 15px;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.25), 0 5px 15px rgba(0, 0, 0, 0.15);
        border: 5px solid #ffffff;
        transition: transform 0.3s ease;
    }

    .background-slider .slider-item:hover img {
        transform: scale(1.05);
    }

    /* Slider Overlay - Responsive */
    .slider-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 220px;
        background: linear-gradient(180deg, transparent 0%, rgba(255, 255, 255, 0.4) 70%, white 100%);
        z-index: 1;
    }

    @media (max-width: 992px) {
        .slider-overlay {
            height: 180px;
        }
    }

    @media (max-width: 768px) {
        .slider-overlay {
            height: 150px;
        }
    }

    @media (max-width: 480px) {
        .slider-overlay {
            height: 120px;
        }
    }

    @media (max-width: 360px) {
        .slider-overlay {
            height: 100px;
        }
    }

    /* Main Hero Section */
    .contact-hero {
        background: white;
        color: #1a1a2e;
        padding: 4rem 2rem;
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
    }

    /* BNP Logo Background */
    .contact-hero::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 600px;
        height: 600px;
        background-image: url('{{ asset("images/bnp_logo.png") }}');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        opacity: 0.15;
        z-index: 0;
        pointer-events: none;
    }

    @media (max-width: 768px) {
        .contact-hero::after {
            width: 450px;
            height: 450px;
            opacity: 0.2;
        }
    }

    @media (max-width: 480px) {
        .contact-hero::after {
            width: 350px;
            height: 350px;
            opacity: 0.25;
        }
    }

    @media (max-width: 360px) {
        .contact-hero::after {
            width: 280px;
            height: 280px;
            opacity: 0.25;
        }
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

    /* Hero Content Layout - Two Column */
    .hero-main-content {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 10;
        width: 100%;
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 4rem;
        align-items: start;
        padding: 2rem;
    }

    /* Leader Wrapper */
    .leader-wrapper {
        display: flex;
        justify-content: center;
        position: relative;
        z-index: 10;
        padding: 2rem;
        width: 100%;
    }

    @media (max-width: 768px) {
        .leader-wrapper {
            padding: 1.5rem 1rem;
            margin-top: 100px;
        }
    }

    @media (max-width: 480px) {
        .leader-wrapper {
            padding: 1rem 0.5rem;
            margin-top: 80px;
        }
    }

    /* Leader Section */
    .leader-section {
        animation: fadeInLeft 1s ease-out;
        display: flex;
        flex-direction: column;
        gap: 2rem;
        align-items: center;
    }

    .leader-top {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 2rem;
        justify-content: center;
    }

    @keyframes fadeInLeft {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .leader-image-container {
        position: relative;
        width: 180px;
        height: 220px;
        flex-shrink: 0;
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
        text-align: left;
        width: 100%;
    }

    .leader-info h2 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .leader-info p {
        color: #4a5568;
        font-size: 1rem;
        font-weight: 500;
        margin-bottom: 1rem;
    }

    .leader-badge {
        display: inline-block;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 30px;
        font-size: 0.9rem;
        margin-top: 0.5rem;
    }

    /* Contact Details under Leader */
    .quick-contact-info {
        margin-top: 0;
        display: flex;
        flex-direction: column;
        gap: 0.8rem;
        width: 100%;
    }

    .quick-info-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: rgba(255, 255, 255, 0.55);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        padding: 0.8rem 1.2rem;
        border-radius: 12px;
        border: 2px solid rgba(226, 232, 240, 0.4);
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .quick-info-item:hover {
        background: rgba(255, 255, 255, 0.75);
        transform: translateX(10px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.15);
    }

    .quick-info-item i {
        width: 35px;
        height: 35px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        color: white;
    }

    .quick-info-item span {
        font-size: 0.95rem;
        color: #2d3748;
        font-weight: 500;
    }

    .quick-info-item a {
        color: #2d3748;
        text-decoration: none;
        font-weight: 500;
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
        background: rgba(255, 255, 255, 0.65);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 2px solid rgba(226, 232, 240, 0.5);
        border-radius: 25px;
        padding: 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
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
        margin-bottom: 1.5rem;
    }

    .form-header h2 {
        font-size: 1.6rem;
        margin-bottom: 0.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .form-header p {
        color: #4a5568;
        font-size: 0.9rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.2rem;
    }

    .form-group label {
        display: block;
        color: #2d3748;
        font-weight: 600;
        margin-bottom: 0.4rem;
        font-size: 0.9rem;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-family: 'Noto Sans Bengali', sans-serif;
        font-size: 0.95rem;
        transition: all 0.3s;
        background: #f7fafc;
        color: #2d3748;
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #a0aec0;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 20px rgba(102, 126, 234, 0.15);
    }

    .form-group select option {
        background: white;
        color: #2d3748;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    /* File Upload Styling */
    .file-input {
        display: none;
    }

    .file-input-label {
        width: 100%;
        padding: 1.2rem;
        border: 2px dashed #cbd5e0;
        border-radius: 12px;
        background: #f7fafc;
        color: #4a5568;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.4rem;
    }

    .file-input-label:hover {
        border-color: #667eea;
        background: #edf2f7;
        color: #2d3748;
    }

    .file-input-label i {
        font-size: 2rem;
        color: #667eea;
    }

    .file-input-label.has-file {
        border-color: #667eea;
        background: #edf2f7;
        color: #2d3748;
    }

    .submit-btn {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 1rem;
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
        background: #d1fae5;
        border: 2px solid #10b981;
        color: #047857;
    }

    .alert-error {
        background: #fee2e2;
        border: 2px solid #ef4444;
        color: #991b1b;
    }

    /* Social Links */
    .social-links-hero {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 1rem;
    }

    .social-links-hero a {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #667eea;
        font-size: 1.2rem;
        transition: all 0.3s;
        border: 2px solid #e2e8f0;
    }

    .social-links-hero a:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        transform: translateY(-5px) scale(1.1);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
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
            gap: 2rem;
            padding: 1rem;
            display: flex;
            flex-direction: column;
        }

        .hero-main-content .leader-section {
            order: 2 !important;
            width: 100%;
        }

        .hero-main-content .form-section {
            order: 1 !important;
            width: 100%;
        }

        /* Contact info styling for mobile */
        .hero-main-content .quick-contact-info {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0.75rem;
            width: 100%;
            max-width: 100%;
        }

        .hero-main-content .quick-info-item {
            width: 100%;
            justify-content: flex-start;
        }

        .leader-image-container {
            width: 150px;
            height: 180px;
        }

        .leader-top {
            flex-direction: column;
            text-align: center;
        }

        .leader-info {
            text-align: center;
        }

        .leader-info h2 {
            font-size: 1.6rem;
        }

        .quick-contact-info {
            display: flex;
        }

        .contact-hero {
            padding: 2rem 1rem;
        }

        .background-slider {
            height: 180px;
        }

        .background-slider .slider-item {
            min-width: 220px;
            max-width: 220px;
            height: 140px;
        }
    }

    @media (max-width: 768px) {
        .contact-hero {
            padding: 1.5rem 0.75rem;
            min-height: auto;
        }

        .background-slider {
            height: 150px;
        }

        .background-slider .slider-track {
            gap: 1.5rem;
        }

        .background-slider .slider-item {
            min-width: 160px;
            max-width: 160px;
            height: 110px;
            transform: rotate(-3deg);
        }

        .background-slider .slider-item:nth-child(even) {
            transform: rotate(3deg);
            margin-top: 10px;
        }

        .background-slider .slider-item:nth-child(3n) {
            transform: rotate(-2deg);
            margin-top: -5px;
        }

        .background-slider .slider-item:nth-child(4n) {
            transform: rotate(4deg);
            margin-top: 8px;
        }

        .background-slider .slider-item img {
            border-radius: 10px;
            border-width: 3px;
        }

        .hero-main-content {
            gap: 1.5rem;
            padding: 0.5rem;
        }

        .leader-image-container {
            width: 130px;
            height: 160px;
        }

        .image-ring {
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border-width: 2px;
        }

        .leader-info h2 {
            font-size: 1.4rem;
        }

        .leader-info p {
            font-size: 0.9rem;
        }

        .leader-badge {
            padding: 0.4rem 1rem;
            font-size: 0.8rem;
        }

        .social-links-hero {
            gap: 0.75rem;
        }

        .social-links-hero a {
            width: 42px;
            height: 42px;
            font-size: 1rem;
            border-radius: 12px;
        }

        .quick-contact-info {
            gap: 0.6rem;
            padding: 0 0.5rem;
        }

        .quick-info-item {
            padding: 0.8rem 1rem;
            gap: 0.75rem;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .quick-info-item i {
            width: 36px;
            height: 36px;
            font-size: 0.85rem;
            border-radius: 10px;
            flex-shrink: 0;
        }

        .quick-info-item span,
        .quick-info-item a {
            font-size: 0.9rem;
            word-break: break-word;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 1.5rem 1rem;
            border-radius: 20px;
        }

        .form-header {
            margin-bottom: 1rem;
        }

        .form-header h2 {
            font-size: 1.3rem;
        }

        .form-header p {
            font-size: 0.85rem;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            font-size: 0.85rem;
            margin-bottom: 0.3rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            padding: 0.7rem 0.9rem;
            font-size: 0.9rem;
            border-radius: 10px;
        }

        .form-group textarea {
            min-height: 80px;
        }

        .file-input-label {
            padding: 1rem;
            border-radius: 10px;
        }

        .file-input-label i {
            font-size: 1.5rem;
        }

        .file-input-label span {
            font-size: 0.85rem;
        }

        .submit-btn {
            padding: 0.9rem;
            font-size: 0.95rem;
            border-radius: 10px;
        }

        .alert {
            padding: 0.8rem 1rem;
            border-radius: 10px;
            font-size: 0.9rem;
        }

        /* Hide some animations on mobile for performance */
        .gradient-orbs .orb {
            filter: blur(60px);
            opacity: 0.25;
        }

        .glow-lines {
            display: none;
        }

        .floating-icons {
            display: none;
        }

        /* CTA Section Mobile */
        .cta-section {
            padding: 3rem 1rem;
        }

        .cta-content h2 {
            font-size: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .cta-content p {
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .cta-buttons {
            flex-direction: column;
            gap: 0.75rem;
        }

        .cta-btn {
            padding: 0.9rem 1.5rem;
            font-size: 1rem;
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .contact-hero {
            padding: 1rem 0.5rem;
        }

        .background-slider {
            height: 120px;
        }

        .background-slider .slider-track {
            gap: 0.8rem;
        }

        .background-slider .slider-item {
            min-width: 120px;
            max-width: 120px;
            height: 85px;
        }

        .background-slider .slider-item img {
            border-radius: 8px;
            border-width: 2px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        /* Overlay adjustment */
        .contact-hero > div[style*="height: 220px"] {
            height: 120px !important;
        }

        .leader-image-container {
            width: 110px;
            height: 135px;
        }

        .leader-image-container img {
            border-radius: 18px;
        }

        .image-ring {
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            border-radius: 22px;
        }

        .leader-info h2 {
            font-size: 1.25rem;
        }

        .leader-info p {
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }

        .leader-badge {
            padding: 0.35rem 0.9rem;
            font-size: 0.75rem;
        }

        .social-links-hero {
            gap: 0.6rem;
            margin-top: 0.75rem;
        }

        .social-links-hero a {
            width: 38px;
            height: 38px;
            font-size: 0.9rem;
            border-radius: 10px;
        }

        .quick-info-item {
            padding: 0.7rem 0.9rem;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
        }

        .quick-info-item i {
            width: 32px;
            height: 32px;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .quick-info-item span,
        .quick-info-item a {
            font-size: 0.85rem;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            padding: 1.25rem 0.9rem;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .form-header h2 {
            font-size: 1.2rem;
        }

        .form-group label {
            font-size: 0.8rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            padding: 0.65rem 0.8rem;
            font-size: 0.85rem;
            border-radius: 8px;
        }

        .submit-btn {
            padding: 0.8rem;
            font-size: 0.9rem;
        }

        .cta-section {
            padding: 2.5rem 1rem;
        }

        .cta-content h2 {
            font-size: 1.3rem;
        }

        .cta-content p {
            font-size: 0.9rem;
        }

        .cta-btn {
            padding: 0.8rem 1.25rem;
            font-size: 0.9rem;
            border-radius: 25px;
        }

        /* Gradient orbs smaller on mobile */
        .orb-1 {
            width: 200px;
            height: 200px;
        }

        .orb-2 {
            width: 150px;
            height: 150px;
        }

        .orb-3 {
            width: 180px;
            height: 180px;
        }

        .orb-4 {
            width: 120px;
            height: 120px;
        }
    }

    /* Extra small devices */
    @media (max-width: 360px) {
        .background-slider {
            height: 100px;
        }

        .background-slider .slider-track {
            gap: 0.6rem;
        }

        .background-slider .slider-item {
            min-width: 100px;
            max-width: 100px;
            height: 70px;
        }

        .leader-wrapper {
            margin-top: 60px;
        }

        .leader-image-container {
            width: 95px;
            height: 115px;
        }

        .leader-info h2 {
            font-size: 1.1rem;
        }

        .form-container {
            padding: 1rem 0.75rem;
        }

        .form-header h2 {
            font-size: 1.1rem;
        }

        .quick-info-item {
            padding: 0.5rem 0.7rem;
        }
    }

    /* Landscape mode on mobile */
    @media (max-height: 500px) and (orientation: landscape) {
        .contact-hero {
            min-height: auto;
            padding: 1rem;
        }

        .background-slider {
            height: 100px;
        }

        .leader-top {
            flex-direction: row;
        }

        .leader-image-container {
            width: 100px;
            height: 120px;
        }

        .hero-main-content {
            grid-template-columns: 1fr 1fr;
        }
    }

    /* Touch device optimizations */
    @media (hover: none) and (pointer: coarse) {
        .quick-info-item:hover {
            transform: none;
        }

        .social-links-hero a:hover {
            transform: translateY(-3px);
        }

        .submit-btn:hover {
            transform: none;
        }

        .submit-btn:active {
            transform: scale(0.98);
        }

        .cta-btn:hover {
            transform: none;
        }

        .cta-btn:active {
            transform: scale(0.98);
        }

        .background-slider .slider-item:hover img {
            transform: none;
        }
    }

    /* Dark mode support */
    @media (prefers-color-scheme: dark) {
        /* Optional: uncomment to enable dark mode */
        /*
        .contact-hero {
            background: #1a1a2e;
        }
        .form-container {
            background: #2d2d44;
            border-color: #3d3d5c;
        }
        */
    }

    /* Reduced motion preference */
    @media (prefers-reduced-motion: reduce) {
        .background-slider .slider-track {
            animation: none;
        }

        .orb {
            animation: none;
        }

        .glow-line {
            animation: none;
        }

        .image-ring {
            animation: none;
        }

        .float-icon {
            animation: none;
        }

        .form-container::before {
            animation: none;
        }
    }
</style>
@endsection

@section('content')
@php
    $leaderImage = \App\Models\SiteContent::getValue('leader_image');
    $leaderName = \App\Models\SiteContent::getValue('leader_name', 'মির্জা আব্বাস');
    $leaderTitle = \App\Models\SiteContent::getValue('leader_title', 'রাজনৈতিক নেতা');
    $footerPhone = \App\Models\SiteContent::getValue('footer_phone', '+৮৮০ ১XXX-XXXXXX');
    $footerEmail = \App\Models\SiteContent::getValue('footer_email', 'info@example.com');
    $footerAddress = \App\Models\SiteContent::getValue('footer_address', 'ঢাকা, বাংলাদেশ');
    $facebookUrl = \App\Models\SiteContent::getUrl('footer_facebook_url', '#');
    $youtubeUrl = \App\Models\SiteContent::getUrl('footer_youtube_url', '#');
    $twitterUrl = \App\Models\SiteContent::getUrl('footer_twitter_url', '#');
    
    // Get contact slides for image slider (uses ContactSlide model)
    $contactSlides = \App\Models\ContactSlide::active()->ordered()->get();
@endphp

<!-- Main Hero Section with Spider Web Animation -->
<section class="contact-hero">
    <!-- Background Image Slider -->
    <div class="background-slider">
        <div class="slider-track" id="contactSliderTrack">
            @forelse($contactSlides as $slide)
                <div class="slider-item original-item">
                    <img src="{{ asset('storage/app/public/' . $slide->image) }}" alt="{{ $slide->title }}">
                </div>
            @empty
                <div class="slider-item original-item">
                    <img src="{{ asset('images/Dhaner-Shish-_2 (1).webp') }}" alt="Image 1">
                </div>
                <div class="slider-item original-item">
                    <img src="{{ asset('images/bnp_logo.png') }}" alt="Image 2">
                </div>
                <div class="slider-item original-item">
                    <img src="{{ asset('images/Dhaner-Shish-_2 (1).webp') }}" alt="Image 3">
                </div>
                <div class="slider-item original-item">
                    <img src="{{ asset('images/bnp_logo.png') }}" alt="Image 4">
                </div>
            @endforelse
        </div>
    </div>

    <!-- Transparent Overlay for smooth transition -->
    <div class="slider-overlay"></div>

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

    <!-- Leader Section (Centered at Top) -->
    <div class="leader-wrapper">
        <div class="leader-section">
            <!-- Image and Name/Title together -->
            <div class="leader-top">
                <div class="leader-image-container">
                    <div class="image-ring"></div>
                    @if($leaderImage)
                        <img src="{{ asset('storage/app/public/' . $leaderImage) }}" alt="{{ $leaderName }}">
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
            </div>

            <!-- Social Links -->
            <div class="social-links-hero">
                <a href="{{ $facebookUrl }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ $youtubeUrl }}" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                <!-- <a href="{{ $twitterUrl }}" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a> -->
                <a href="#" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <!-- Contact Info (Left) + Form (Right) -->
    <div class="hero-main-content">
        <!-- Contact Info Section (Left) -->
        <div class="leader-section">
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

                <form action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name"><i class="fas fa-user"></i> আপনার নাম *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="পূর্ণ নাম লিখুন">
                        </div>

                        <div class="form-group">
                            <label for="phone"><i class="fas fa-phone"></i> ফোন নম্বর *</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="০১XXXXXXXXX">
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

                    <div class="form-group">
                        <label for="attachment"><i class="fas fa-paperclip"></i> ছবি বা ভিডিও সংযুক্ত করুন (ঐচ্ছিক)</label>
                        <input type="file" id="attachment" name="attachment" accept="image/*,video/*,.pdf" class="file-input">
                        <div class="file-input-label" id="file-label" style="cursor: pointer;">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span id="file-name">ফাইল নির্বাচন করুন (সর্বোচ্চ ২০ MB)</span>
                        </div>
                        <div id="file-preview" style="margin-top: 1rem; display: none;">
                            <div style="position: relative; max-width: 300px; margin: 0 auto;">
                                <img id="image-preview" style="max-width: 100%; border-radius: 10px; display: none;">
                                <video id="video-preview" controls style="max-width: 100%; border-radius: 10px; display: none;"></video>
                                <div id="pdf-preview" style="padding: 1rem; background: rgba(255,255,255,0.1); border-radius: 10px; text-align: center; display: none;">
                                    <i class="fas fa-file-pdf" style="font-size: 3rem; color: #ef4444;"></i>
                                    <p id="pdf-name" style="margin-top: 0.5rem; color: white;"></p>
                                </div>
                                <button type="button" onclick="clearFile()" style="position: absolute; top: -10px; right: -10px; width: 30px; height: 30px; border-radius: 50%; background: #ef4444; color: white; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
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
    // Contact Page Scripts - Image Slider runs with CSS animation

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

    // File upload handling
    const fileInput = document.getElementById('attachment');
    const fileLabel = document.getElementById('file-label');
    const fileName = document.getElementById('file-name');
    const filePreview = document.getElementById('file-preview');
    const imagePreview = document.getElementById('image-preview');
    const videoPreview = document.getElementById('video-preview');
    const pdfPreview = document.getElementById('pdf-preview');
    const pdfName = document.getElementById('pdf-name');

    fileLabel.addEventListener('click', function() {
        fileInput.click();
    });

    fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            const fileSize = (file.size / 1024 / 1024).toFixed(2);
            fileName.textContent = file.name + ' (' + fileSize + ' MB)';
            fileLabel.classList.add('has-file');
            
            // Show preview
            imagePreview.style.display = 'none';
            videoPreview.style.display = 'none';
            pdfPreview.style.display = 'none';
            
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    filePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else if (file.type.startsWith('video/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    videoPreview.src = e.target.result;
                    videoPreview.style.display = 'block';
                    filePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else if (file.type === 'application/pdf') {
                pdfName.textContent = file.name;
                pdfPreview.style.display = 'block';
                filePreview.style.display = 'block';
            }
        } else {
            fileName.textContent = 'ফাইল নির্বাচন করুন (সর্বোচ্চ ২০ MB)';
            fileLabel.classList.remove('has-file');
            filePreview.style.display = 'none';
        }
    });
    
    function clearFile() {
        fileInput.value = '';
        fileName.textContent = 'ফাইল নির্বাচন করুন (সর্বোচ্চ ২০ MB)';
        fileLabel.classList.remove('has-file');
        filePreview.style.display = 'none';
        imagePreview.src = '';
        videoPreview.src = '';
    }

    // Dynamic infinite slider - works with ANY number of images (unlimited)
    function setupInfiniteSlider() {
        const sliderTrack = document.getElementById('contactSliderTrack');
        if (!sliderTrack) return;
        
        // Get original items only
        const originalItems = sliderTrack.querySelectorAll('.original-item');
        const totalImages = originalItems.length;
        
        if (totalImages === 0) return;
        
        // Remove any previously cloned items
        const clonedItems = sliderTrack.querySelectorAll('.cloned-item');
        clonedItems.forEach(item => item.remove());
        
        // Clone all original items once for seamless infinite loop
        originalItems.forEach(item => {
            const clone = item.cloneNode(true);
            clone.classList.remove('original-item');
            clone.classList.add('cloned-item');
            sliderTrack.appendChild(clone);
        });
        
        // Calculate animation duration based on number of images
        // Speed: approximately 1.5 seconds per image on mobile, 2 seconds on desktop
        const isMobile = window.innerWidth <= 768;
        const speedPerImage = isMobile ? 1.5 : 2;
        const minDuration = isMobile ? 15 : 30;
        const animationDuration = Math.max(minDuration, totalImages * speedPerImage);
        
        // Remove existing animation
        sliderTrack.style.animation = 'none';
        sliderTrack.offsetHeight; // Force reflow
        
        // Apply new animation with calculated duration
        sliderTrack.style.animation = `scrollSlider ${animationDuration}s linear infinite`;
        
        console.log('Infinite Slider: ' + totalImages + ' images, ' + animationDuration + 's duration');
    }
    
    // Run on load and resize
    setupInfiniteSlider();
    
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(setupInfiniteSlider, 250);
    });
</script>
@endsection