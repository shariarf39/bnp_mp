@extends('layouts.master')

@section('title', 'আমার সম্পর্কে - মির্জা আব্বাস')

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

    .page-logo {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid rgba(255, 255, 255, 0.2);
        position: relative;
        z-index: 2;
    }

    .page-logo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
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
    @if(\App\Models\SiteContent::getValue('about_logo'))
    <div class="page-logo">
        <img src="{{ asset('storage/app/public/' . \App\Models\SiteContent::getValue('about_logo')) }}" alt="Logo">
    </div>
    @endif
    <h1>{{ $about->page_title }}</h1>
    <p>{{ $about->page_subtitle }}</p>
</section>

<!-- Bio Section -->
<section class="about-content">
    <div class="bio-section">
        <div class="bio-image">
            @if($about->bio_image)
                <img src="{{ asset('storage/app/public/' . $about->bio_image) }}" alt="Political Leader">
            @else
                <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 500'><rect fill='%232d8659' width='400' height='500'/><circle cx='200' cy='150' r='80' fill='white' opacity='0.3'/><rect x='120' y='250' width='160' height='200' rx='10' fill='white' opacity='0.3'/><text x='50%25' y='95%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='30' font-family='Arial'>BNP নেতা</text></svg>" alt="Political Leader">
            @endif
        </div>
        <div class="bio-details">
            <h2>{{ $about->bio_title }}</h2>
            <p>{{ $about->bio_description_1 }}</p>
            <p>{{ $about->bio_description_2 }}</p>

            <div class="info-grid">
                <div class="info-item">
                    <i class="fas fa-user"></i>
                    <div>
                        <div class="info-label">পূর্ণ নাম:</div>
                        <div class="info-value">{{ $about->full_name }}</div>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-flag"></i>
                    <div>
                        <div class="info-label">দল:</div>
                        <div class="info-value">{{ $about->party_name }}</div>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <div class="info-label">নির্বাচনী এলাকা:</div>
                        <div class="info-value">{{ $about->constituency }}</div>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-briefcase"></i>
                    <div>
                        <div class="info-label">অভিজ্ঞতা:</div>
                        <div class="info-value">{{ $about->experience }}</div>
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
            @if($about->timeline_events)
                @foreach($about->timeline_events as $event)
                <div class="timeline-item">
                    <div class="timeline-year">{{ $event['year'] }}</div>
                    <div class="timeline-title">{{ $event['title'] }}</div>
                    <div class="timeline-desc">{{ $event['description'] }}</div>
                </div>
                @endforeach
            @endif
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
            "{{ $about->quote_text }}"
        </div>
        <div class="quote-author">— {{ $about->quote_author }}</div>
    </div>
</section>

<!-- Vision Section -->
<section class="vision-section">
    <h2>আমার দৃষ্টিভঙ্গি</h2>
    <div class="vision-grid">
        @if($about->vision_cards)
            @foreach($about->vision_cards as $card)
            <div class="vision-card">
                <h3>{{ $card['title'] }}</h3>
                <p>{{ $card['description'] }}</p>
            </div>
            @endforeach
        @endif
    </div>
</section>
@endsection
