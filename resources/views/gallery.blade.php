@extends('layouts.master')

@section('title', 'গ্যালারি - মির্জা আব্বাস')

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
            radial-gradient(circle at 30% 50%, rgba(76, 175, 80, 0.2) 0%, transparent 50%),
            radial-gradient(circle at 70% 80%, rgba(33, 150, 243, 0.2) 0%, transparent 50%);
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

    .gallery-content {
        max-width: 1200px;
        margin: 4rem auto;
        padding: 0 2rem;
    }

    .gallery-filters {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-bottom: 3rem;
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: 0.7rem 1.4rem;
        border: 2px solid transparent;
        background: rgba(76, 175, 80, 0.1);
        color: #0f2027;
        border-radius: 25px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s;
        font-family: 'Noto Sans Bengali', sans-serif;
        font-size: 0.9rem;
    }

    .filter-btn:hover, .filter-btn.active {
        background: linear-gradient(135deg, #4CAF50, #2196F3);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(76, 175, 80, 0.3);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        background: linear-gradient(135deg, #4CAF50, #2196F3);
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        aspect-ratio: 4/3;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .gallery-item:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.5s;
    }

    .gallery-item:hover img {
        transform: scale(1.1);
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
        transition: all 0.3s;
    }

    .gallery-item:hover .gallery-overlay {
        transform: translateY(0);
    }

    .gallery-overlay h3 {
        font-size: 1.3rem;
        margin-bottom: 0.5rem;
    }

    .gallery-overlay p {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    .gallery-overlay .meta {
        display: flex;
        gap: 1rem;
        margin-top: 0.5rem;
        font-size: 0.85rem;
    }

    .gallery-overlay .meta span {
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    /* Lightbox */
    .lightbox {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.95);
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .lightbox.active {
        display: flex;
    }

    .lightbox-content {
        max-width: 90%;
        max-height: 90%;
        position: relative;
    }

    .lightbox-content img {
        max-width: 100%;
        max-height: 80vh;
        border-radius: 10px;
    }

    .lightbox-close {
        position: absolute;
        top: -3rem;
        right: 0;
        background: white;
        color: #333;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.5rem;
    }

    .lightbox-caption {
        color: white;
        text-align: center;
        margin-top: 1rem;
        font-size: 1.1rem;
    }

    .category-sections {
        margin-top: 4rem;
    }

    .category-section {
        margin-bottom: 4rem;
    }

    .category-title {
        background: linear-gradient(135deg, #0f2027, #2c5364);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 1.8rem;
        margin-bottom: 1.8rem;
        padding-bottom: 0.8rem;
        border-bottom: 3px solid transparent;
        border-image: linear-gradient(90deg, #4CAF50, #2196F3) 1;
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1rem;
        }

        .gallery-filters {
            gap: 0.5rem;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<section class="page-header">
    <h1>গ্যালারি</h1>
    <p>মানবিক সহায়তা, স্বাস্থ্যসেবা, সামাজিক উন্নয়ন এবং মাঠপর্যায়ের উদ্যোগের কিছু ঝলক</p>
</section>

<!-- Gallery Content -->
<section class="gallery-content">
    <!-- Filters -->
    <div class="gallery-filters">
        <button class="filter-btn active" data-filter="all">সব দেখুন</button>
        <button class="filter-btn" data-filter="social">সামাজিক কাজ</button>
        <button class="filter-btn" data-filter="health">স্বাস্থ্যসেবা</button>
        <button class="filter-btn" data-filter="education">শিক্ষা</button>
        <button class="filter-btn" data-filter="events">অনুষ্ঠান</button>
    </div>

    <!-- Gallery Grid -->
    <div class="category-sections">
        @php
            $categories = [
                'social' => 'সামাজিক কাজ ও মানবিক সহায়তা',
                'health' => 'স্বাস্থ্যসেবা কার্যক্রম',
                'education' => 'শিক্ষা কার্যক্রম',
                'events' => 'রাজনৈতিক অনুষ্ঠান ও জনসভা',
            ];
        @endphp

        @foreach($categories as $categoryKey => $categoryTitle)
            @php
                $categoryActivities = $activities->where('category', $categoryKey);
            @endphp
            @if($categoryActivities->count() > 0)
            <div class="category-section">
                <h2 class="category-title">{{ $categoryTitle }}</h2>
                <div class="gallery-grid">
                    @foreach($categoryActivities as $activity)
                    <div class="gallery-item" data-category="{{ $activity->category }}">
                        <img src="{{ asset('storage/app/public/' . $activity->image) }}" alt="{{ $activity->title }}">
                        <div class="gallery-overlay">
                            <h3>{{ $activity->title }}</h3>
                            <p>{{ $activity->description }}</p>
                            <div class="meta">
                                <span><i class="fas fa-calendar"></i> {{ $activity->created_at->format('F Y') }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach

        @if($activities->count() == 0)
        <div class="category-section">
            <div style="text-align: center; padding: 3rem; color: #6b7280;">
                <i class="fas fa-images" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                <p>কোনো ছবি পাওয়া যায়নি। অ্যাডমিন প্যানেল থেকে ছবি যোগ করুন।</p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Lightbox -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-content">
        <div class="lightbox-close" onclick="closeLightbox()">
            <i class="fas fa-times"></i>
        </div>
        <img id="lightboxImage" src="" alt="">
        <div class="lightbox-caption" id="lightboxCaption"></div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            btn.classList.add('active');

            const filter = btn.getAttribute('data-filter');

            galleryItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Lightbox functionality
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxCaption = document.getElementById('lightboxCaption');

    galleryItems.forEach(item => {
        item.addEventListener('click', () => {
            const img = item.querySelector('img');
            const title = item.querySelector('.gallery-overlay h3').textContent;
            
            lightboxImage.src = img.src;
            lightboxCaption.textContent = title;
            lightbox.classList.add('active');
        });
    });

    function closeLightbox() {
        lightbox.classList.remove('active');
    }

    // Close lightbox on click outside
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });

    // Close lightbox on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });
</script>
@endsection
