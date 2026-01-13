@extends('layouts.master')

@section('title', 'আমার সম্পর্কে - BNP রাজনৈতিক নেতা')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
        color: white;
        padding: 4rem 2rem 3rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 50%, rgba(76, 175, 80, 0.2) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(33, 150, 243, 0.2) 0%, transparent 50%);
    }

    .page-header h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .page-header p {
        font-size: 1.1rem;
        max-width: 700px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
        color: rgba(255, 255, 255, 0.9);
    }

    .about-content {
        max-width: 1100px;
        margin: 3rem auto;
        padding: 0 2rem;
    }

    .bio-section {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 3rem;
        margin-bottom: 4rem;
    }

    .bio-image {
        position: relative;
    }

    .bio-image img {
        width: 100%;
        border-radius: 25px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        border: 3px solid rgba(76, 175, 80, 0.2);
    }

    .bio-details h2 {
        background: linear-gradient(135deg, #0f2027, #2c5364);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 2.2rem;
        margin-bottom: 1.2rem;
    }

    .bio-details p {
        color: #555;
        font-size: 1rem;
        line-height: 1.7;
        margin-bottom: 1.2rem;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin: 2rem 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 1.8rem;
        border-radius: 20px;
        border: 1px solid rgba(76, 175, 80, 0.1);
    }

    .info-item {
        display: flex;
        gap: 1rem;
    }

    .info-item i {
        background: linear-gradient(135deg, #4CAF50, #2196F3);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 1.2rem;
        margin-top: 0.2rem;
    }

    .info-label {
        font-weight: 600;
        color: #333;
    }

    .info-value {
        color: #666;
    }

    .journey-section {
        background: #f8f9fa;
        padding: 4rem 2rem;
        margin: 4rem 0;
    }

    .journey-content {
        max-width: 1200px;
        margin: 0 auto;
    }

    .journey-content h2 {
        color: #1a5f3a;
        font-size: 2.5rem;
        text-align: center;
        margin-bottom: 3rem;
    }

    .timeline {
        position: relative;
        padding-left: 3rem;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(to bottom, #4CAF50, #2196F3, #9C27B0);
        border-radius: 10px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 3rem;
        padding-left: 2rem;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -3.5rem;
        top: 0;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: linear-gradient(135deg, #4CAF50, #2196F3);
        border: 3px solid white;
        box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
    }

    .timeline-year {
        font-size: 1.3rem;
        font-weight: 700;
        background: linear-gradient(135deg, #4CAF50, #2196F3);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
    }

    .timeline-title {
        font-size: 1.2rem;
        color: #222;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .timeline-desc {
        color: #555;
        line-height: 1.7;
        font-size: 0.95rem;
    }

    .vision-section {
        max-width: 1200px;
        margin: 4rem auto;
        padding: 0 2rem;
    }

    .vision-section h2 {
        background: linear-gradient(135deg, #0f2027, #2c5364);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 2.2rem;
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .vision-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .vision-card {
        background: white;
        padding: 1.8rem;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        border-left: 4px solid transparent;
        border-image: linear-gradient(to bottom, #4CAF50, #2196F3) 1;
        transition: all 0.3s;
    }

    .vision-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0,0,0,0.12);
    }

    .vision-card h3 {
        background: linear-gradient(135deg, #0f2027, #2c5364);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.8rem;
        font-size: 1.3rem;
    }

    .vision-card p {
        color: #555;
        line-height: 1.7;
        font-size: 0.95rem;
    }

    .quote-section {
        background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
        color: white;
        padding: 3.5rem 2rem;
        text-align: center;
        margin: 3rem 0;
        border-radius: 30px;
        position: relative;
        overflow: hidden;
    }

    .quote-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 30% 50%, rgba(76, 175, 80, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 70% 50%, rgba(33, 150, 243, 0.15) 0%, transparent 50%);
    }

    .quote-content {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .quote-icon {
        font-size: 2.5rem;
        opacity: 0.3;
        margin-bottom: 1rem;
    }

    .quote-text {
        font-size: 1.5rem;
        font-style: italic;
        line-height: 1.7;
        margin-bottom: 1rem;
    }

    .quote-author {
        font-size: 1.1rem;
        opacity: 0.8;
    }

    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .bio-section {
            grid-template-columns: 1fr;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .timeline {
            padding-left: 2rem;
        }

        .quote-text {
            font-size: 1.3rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<section class="page-header">
    <h1>আমার সম্পর্কে</h1>
    <p>জনগণের সেবায় নিবেদিত একজন আদর্শিক রাজনৈতিক নেতা</p>
</section>

<!-- Bio Section -->
<section class="about-content">
    <div class="bio-section">
        <div class="bio-image">
            <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 500'><rect fill='%232d8659' width='400' height='500'/><circle cx='200' cy='150' r='80' fill='white' opacity='0.3'/><rect x='120' y='250' width='160' height='200' rx='10' fill='white' opacity='0.3'/><text x='50%25' y='95%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='30' font-family='Arial'>BNP নেতা</text></svg>" alt="Political Leader">
        </div>
        <div class="bio-details">
            <h2>রাজনৈতিক নেতা ও সমাজসেবক</h2>
            <p>বাংলাদেশ জাতীয়তাবাদী দল (BNP) এর একজন নিবেদিতপ্রাণ রাজনীতিবিদ এবং জনসেবক। দীর্ঘ বছরের রাজনৈতিক অভিজ্ঞতা এবং জনগণের প্রতি অকৃত্রিম ভালোবাসা নিয়ে কাজ করে যাচ্ছেন।</p>
            <p>ছাত্র রাজনীতির মাধ্যমে রাজনৈতিক জীবন শুরু। তরুণদের অধিকার আদায়ে সর্বদা সোচ্চার থেকেছেন এবং শিক্ষা, স্বাস্থ্য ও সামাজিক উন্নয়নে অগ্রণী ভূমিকা পালন করছেন।</p>

            <div class="info-grid">
                <div class="info-item">
                    <i class="fas fa-user"></i>
                    <div>
                        <div class="info-label">পূর্ণ নাম:</div>
                        <div class="info-value">BNP রাজনৈতিক নেতা</div>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-flag"></i>
                    <div>
                        <div class="info-label">দল:</div>
                        <div class="info-value">বাংলাদেশ জাতীয়তাবাদী দল (BNP)</div>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <div class="info-label">নির্বাচনী এলাকা:</div>
                        <div class="info-value">ঢাকা, বাংলাদেশ</div>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-briefcase"></i>
                    <div>
                        <div class="info-label">অভিজ্ঞতা:</div>
                        <div class="info-value">১০+ বছর জনসেবা</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Journey Section -->
<section class="journey-section">
    <div class="journey-content">
        <h2>রাজনৈতিক যাত্রা</h2>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-year">২০১০</div>
                <div class="timeline-title">ছাত্র রাজনীতিতে যুক্ত</div>
                <div class="timeline-desc">ছাত্র আন্দোলনের মাধ্যমে রাজনৈতিক জীবনের সূচনা। তরুণদের অধিকার আদায়ে নেতৃত্ব প্রদান।</div>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">২০১৩</div>
                <div class="timeline-title">BNP তে যোগদান</div>
                <div class="timeline-desc">বাংলাদেশ জাতীয়তাবাদী দলে আনুষ্ঠানিকভাবে যুক্ত হন এবং স্থানীয় পর্যায়ে সাংগঠনিক দায়িত্ব পালন শুরু।</div>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">২০১৬</div>
                <div class="timeline-title">সামাজিক উন্নয়ন কর্মসূচি</div>
                <div class="timeline-desc">শিক্ষা, স্বাস্থ্য ও দারিদ্র্য বিমোচনে বিভিন্ন উদ্যোগ গ্রহণ। স্থানীয় জনগণের সেবায় নিয়োজিত।</div>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">২০১৯</div>
                <div class="timeline-title">জেলা পর্যায়ের নেতৃত্ব</div>
                <div class="timeline-desc">দলের জেলা কমিটিতে গুরুত্বপূর্ণ দায়িত্ব লাভ। আঞ্চলিক উন্নয়নে বলিষ্ঠ ভূমিকা।</div>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">২০২৩ - বর্তমান</div>
                <div class="timeline-title">জনপ্রতিনিধি প্রার্থী</div>
                <div class="timeline-desc">আসন্ন নির্বাচনে জনগণের বিশ্বাস অর্জন এবং উন্নয়নের নতুন দিগন্ত খুলে দিতে প্রতিশ্রুতিবদ্ধ।</div>
            </div>
        </div>
    </div>
</section>

<!-- Quote Section -->
<section class="quote-section">
    <div class="quote-content">
        <div class="quote-icon">
            <i class="fas fa-quote-left"></i>
        </div>
        <div class="quote-text">
            "গণতন্ত্র, ন্যায়বিচার এবং সমান সুযোগ—এই তিনটি স্তম্ভের উপর দাঁড়িয়ে আমরা গড়ব একটি সুন্দর বাংলাদেশ।"
        </div>
        <div class="quote-author">— রাজনৈতিক নেতা</div>
    </div>
</section>

<!-- Vision Section -->
<section class="vision-section">
    <h2>আমার দৃষ্টিভঙ্গি</h2>
    <div class="vision-grid">
        <div class="vision-card">
            <h3>গণতন্ত্র সুরক্ষা</h3>
            <p>প্রকৃত গণতান্ত্রিক মূল্যবোধ প্রতিষ্ঠা করা এবং জনগণের মতামতকে সর্বোচ্চ গুরুত্ব প্রদান করা।</p>
        </div>

        <div class="vision-card">
            <h3>অর্থনৈতিক উন্নয়ন</h3>
            <p>কর্মসংস্থান সৃষ্টি, শিল্পায়ন এবং ব্যবসা-বাণিজ্যের সুযোগ বৃদ্ধির মাধ্যমে দেশের অর্থনীতি শক্তিশালী করা।</p>
        </div>

        <div class="vision-card">
            <h3>সামাজিক ন্যায়বিচার</h3>
            <p>সমাজের প্রতিটি মানুষের জন্য সমান অধিকার, সুযোগ এবং মর্যাদা নিশ্চিত করা।</p>
        </div>

        <div class="vision-card">
            <h3>শিক্ষা ও স্বাস্থ্য</h3>
            <p>মানসম্মত শিক্ষা ও সুলভ স্বাস্থ্যসেবা প্রদানের মাধ্যমে একটি সুস্থ ও শিক্ষিত সমাজ গঠন।</p>
        </div>

        <div class="vision-card">
            <h3>দুর্নীতি মুক্ত সমাজ</h3>
            <p>স্বচ্ছতা, জবাবদিহিতা এবং সুশাসন প্রতিষ্ঠার মাধ্যমে দুর্নীতিমুক্ত বাংলাদেশ গড়া।</p>
        </div>

        <div class="vision-card">
            <h3>যুব উন্নয়ন</h3>
            <p>তরুণ প্রজন্মকে দক্ষ ও আত্মনির্ভরশীল করে তোলা এবং তাদের নেতৃত্ব বিকাশে সহায়তা করা।</p>
        </div>
    </div>
</section>
@endsection
