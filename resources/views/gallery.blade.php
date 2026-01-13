@extends('layouts.master')

@section('title', 'গ্যালারি - BNP রাজনৈতিক নেতা')

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
        <!-- Social Work Section -->
        <div class="category-section">
            <h2 class="category-title">সামাজিক কাজ ও মানবিক সহায়তা</h2>
            <div class="gallery-grid">
                <div class="gallery-item" data-category="social">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'><rect fill='%231a5f3a' width='400' height='300'/><circle cx='100' cy='100' r='40' fill='white' opacity='0.3'/><circle cx='200' cy='100' r='40' fill='white' opacity='0.3'/><circle cx='300' cy='100' r='40' fill='white' opacity='0.3'/><text x='50%25' y='70%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='25' font-family='Arial'>খাদ্য সাহায্য</text></svg>" alt="Food Distribution">
                    <div class="gallery-overlay">
                        <h3>খাদ্য সাহায্য বিতরণ</h3>
                        <p>দরিদ্র পরিবারে খাদ্য সামগ্রী বিতরণ কর্মসূচি</p>
                        <div class="meta">
                            <span><i class="fas fa-calendar"></i> জানুয়ারি ২০২৬</span>
                            <span><i class="fas fa-map-marker-alt"></i> ঢাকা</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="social">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'><rect fill='%232d8659' width='400' height='300'/><rect x='150' y='80' width='100' height='140' rx='10' fill='white' opacity='0.3'/><text x='50%25' y='75%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='25' font-family='Arial'>শীতবস্ত্র বিতরণ</text></svg>" alt="Winter Clothes">
                    <div class="gallery-overlay">
                        <h3>শীতবস্ত্র বিতরণ</h3>
                        <p>শীতার্ত মানুষের মাঝে কম্বল ও শীতবস্ত্র বিতরণ</p>
                        <div class="meta">
                            <span><i class="fas fa-calendar"></i> ডিসেম্বর ২০২৫</span>
                            <span><i class="fas fa-map-marker-alt"></i> ঢাকা</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="social">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'><rect fill='%233aa066' width='400' height='300'/><rect x='50' y='100' width='300' height='120' rx='10' fill='white' opacity='0.3'/><text x='50%25' y='70%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='25' font-family='Arial'>বন্যা ত্রাণ</text></svg>" alt="Flood Relief">
                    <div class="gallery-overlay">
                        <h3>বন্যা ত্রাণ কার্যক্রম</h3>
                        <p>বন্যা দুর্গত এলাকায় ত্রাণ সামগ্রী বিতরণ</p>
                        <div class="meta">
                            <span><i class="fas fa-calendar"></i> আগস্ট ২০২৫</span>
                            <span><i class="fas fa-map-marker-alt"></i> বিভিন্ন জেলা</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Health Section -->
        <div class="category-section">
            <h2 class="category-title">স্বাস্থ্যসেবা কার্যক্রম</h2>
            <div class="gallery-grid">
                <div class="gallery-item" data-category="health">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'><rect fill='%231a5f3a' width='400' height='300'/><rect x='170' y='100' width='60' height='20' fill='white' opacity='0.4'/><rect x='190' y='80' width='20' height='60' fill='white' opacity='0.4'/><text x='50%25' y='75%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='22' font-family='Arial'>বিনামূল্যে চিকিৎসা</text></svg>" alt="Free Medical Camp">
                    <div class="gallery-overlay">
                        <h3>বিনামূল্যে চিকিৎসা শিবির</h3>
                        <p>গরীব ও অসহায় মানুষের জন্য চিকিৎসা সেবা</p>
                        <div class="meta">
                            <span><i class="fas fa-calendar"></i> নভেম্বর ২০২৫</span>
                            <span><i class="fas fa-map-marker-alt"></i> ঢাকা</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="health">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'><rect fill='%232d8659' width='400' height='300'/><circle cx='200' cy='120' r='50' fill='white' opacity='0.3'/><rect x='185' y='100' width='30' height='10' fill='white' opacity='0.4'/><text x='50%25' y='75%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='22' font-family='Arial'>ওষুধ বিতরণ</text></svg>" alt="Medicine Distribution">
                    <div class="gallery-overlay">
                        <h3>ওষুধ বিতরণ কর্মসূচি</h3>
                        <p>দরিদ্র রোগীদের মধ্যে ওষুধ বিতরণ</p>
                        <div class="meta">
                            <span><i class="fas fa-calendar"></i> অক্টোবর ২০২৫</span>
                            <span><i class="fas fa-map-marker-alt"></i> ঢাকা</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="health">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'><rect fill='%233aa066' width='400' height='300'/><rect x='150' y='80' width='100' height='100' rx='10' fill='white' opacity='0.3'/><text x='50%25' y='75%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='22' font-family='Arial'>স্বাস্থ্য সচেতনতা</text></svg>" alt="Health Awareness">
                    <div class="gallery-overlay">
                        <h3>স্বাস্থ্য সচেতনতা কর্মসূচি</h3>
                        <p>জনগণকে স্বাস্থ্য বিষয়ে সচেতন করা</p>
                        <div class="meta">
                            <span><i class="fas fa-calendar"></i> সেপ্টেম্বর ২০২৫</span>
                            <span><i class="fas fa-map-marker-alt"></i> বিভিন্ন এলাকা</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Education Section -->
        <div class="category-section">
            <h2 class="category-title">শিক্ষা কার্যক্রম</h2>
            <div class="gallery-grid">
                <div class="gallery-item" data-category="education">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'><rect fill='%231a5f3a' width='400' height='300'/><rect x='100' y='80' width='200' height='140' rx='5' fill='white' opacity='0.3'/><text x='50%25' y='75%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='22' font-family='Arial'>বই বিতরণ</text></svg>" alt="Book Distribution">
                    <div class="gallery-overlay">
                        <h3>শিক্ষার্থীদের মাঝে বই বিতরণ</h3>
                        <p>দরিদ্র শিক্ষার্থীদের বিনামূল্যে বই প্রদান</p>
                        <div class="meta">
                            <span><i class="fas fa-calendar"></i> জানুয়ারি ২০২৬</span>
                            <span><i class="fas fa-map-marker-alt"></i> ঢাকা</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="education">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'><rect fill='%232d8659' width='400' height='300'/><circle cx='200' cy='120' r='60' fill='white' opacity='0.3'/><polygon points='200,95 215,130 185,130' fill='white' opacity='0.4'/><text x='50%25' y='75%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='22' font-family='Arial'>বৃত্তি প্রদান</text></svg>" alt="Scholarship">
                    <div class="gallery-overlay">
                        <h3>মেধাবী শিক্ষার্থীদের বৃত্তি</h3>
                        <p>মেধাবী ও দরিদ্র শিক্ষার্থীদের শিক্ষা বৃত্তি</p>
                        <div class="meta">
                            <span><i class="fas fa-calendar"></i> ডিসেম্বর ২০২৫</span>
                            <span><i class="fas fa-map-marker-alt"></i> ঢাকা</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="education">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'><rect fill='%233aa066' width='400' height='300'/><rect x='120' y='90' width='160' height='100' rx='10' fill='white' opacity='0.3'/><text x='50%25' y='75%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='22' font-family='Arial'>কম্পিউটার প্রশিক্ষণ</text></svg>" alt="Computer Training">
                    <div class="gallery-overlay">
                        <h3>কম্পিউটার প্রশিক্ষণ কর্মসূচি</h3>
                        <p>তরুণদের জন্য বিনামূল্যে কম্পিউটার প্রশিক্ষণ</p>
                        <div class="meta">
                            <span><i class="fas fa-calendar"></i> নভেম্বর ২০২৫</span>
                            <span><i class="fas fa-map-marker-alt"></i> ঢাকা</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Events Section -->
        <div class="category-section">
            <h2 class="category-title">রাজনৈতিক অনুষ্ঠান ও জনসভা</h2>
            <div class="gallery-grid">
                <div class="gallery-item" data-category="events">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'><rect fill='%231a5f3a' width='400' height='300'/><circle cx='100' cy='120' r='30' fill='white' opacity='0.2'/><circle cx='200' cy='120' r='30' fill='white' opacity='0.2'/><circle cx='300' cy='120' r='30' fill='white' opacity='0.2'/><text x='50%25' y='75%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='25' font-family='Arial'>জনসভা</text></svg>" alt="Public Rally">
                    <div class="gallery-overlay">
                        <h3>জনসভা ও সমাবেশ</h3>
                        <p>জনগণের সাথে সরাসরি মতবিনিময়</p>
                        <div class="meta">
                            <span><i class="fas fa-calendar"></i> জানুয়ারি ২০২৬</span>
                            <span><i class="fas fa-map-marker-alt"></i> ঢাকা</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="events">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'><rect fill='%232d8659' width='400' height='300'/><rect x='50' y='100' width='300' height='80' rx='10' fill='white' opacity='0.3'/><text x='50%25' y='75%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='25' font-family='Arial'>দলীয় সভা</text></svg>" alt="Party Meeting">
                    <div class="gallery-overlay">
                        <h3>দলীয় সভা ও মিটিং</h3>
                        <p>দলীয় কর্মীদের সাথে পরামর্শ সভা</p>
                        <div class="meta">
                            <span><i class="fas fa-calendar"></i> ডিসেম্বর ২০২৫</span>
                            <span><i class="fas fa-map-marker-alt"></i> ঢাকা</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="events">
                    <img src="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'><rect fill='%233aa066' width='400' height='300'/><polygon points='200,80 220,140 180,140' fill='white' opacity='0.3'/><rect x='150' y='140' width='100' height='60' fill='white' opacity='0.3'/><text x='50%25' y='80%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='25' font-family='Arial'>প্রচারণা</text></svg>" alt="Campaign">
                    <div class="gallery-overlay">
                        <h3>নির্বাচনী প্রচারণা</h3>
                        <p>জনগণের দোরগোড়ায় প্রচারণা</p>
                        <div class="meta">
                            <span><i class="fas fa-calendar"></i> জানুয়ারি ২০২৬</span>
                            <span><i class="fas fa-map-marker-alt"></i> বিভিন্ন এলাকা</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
