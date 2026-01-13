@extends('layouts.master')

@section('title', 'যোগাযোগ - BNP রাজনৈতিক নেতা')

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
            radial-gradient(circle at 25% 50%, rgba(76, 175, 80, 0.2) 0%, transparent 50%),
            radial-gradient(circle at 75% 75%, rgba(33, 150, 243, 0.2) 0%, transparent 50%);
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

    .contact-content {
        max-width: 1200px;
        margin: 4rem auto;
        padding: 0 2rem;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
    }

    .contact-info {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 2.5rem;
        border-radius: 25px;
        border: 1px solid rgba(76, 175, 80, 0.1);
    }

    .contact-info h2 {
        background: linear-gradient(135deg, #0f2027, #2c5364);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 1.8rem;
        margin-bottom: 2rem;
    }

    .info-item {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 2rem;
        align-items: flex-start;
    }

    .info-icon {
        width: 55px;
        height: 55px;
        background: linear-gradient(135deg, #4CAF50, #2196F3);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.4rem;
        flex-shrink: 0;
        box-shadow: 0 6px 20px rgba(76, 175, 80, 0.3);
    }

    .info-details h3 {
        color: #333;
        margin-bottom: 0.5rem;
    }

    .info-details p {
        color: #666;
        line-height: 1.6;
    }

    .info-details a {
        color: #2d8659;
        text-decoration: none;
    }

    .info-details a:hover {
        text-decoration: underline;
    }

    .social-section {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid #ddd;
    }

    .social-section h3 {
        color: #333;
        margin-bottom: 1rem;
    }

    .social-links {
        display: flex;
        gap: 1rem;
    }

    .social-links a {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #1a5f3a, #2d8659);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.3rem;
        transition: all 0.3s;
    }

    .social-links a:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(45, 134, 89, 0.4);
    }

    .contact-form {
        background: white;
        padding: 2.5rem;
        border-radius: 25px;
        box-shadow: 0 15px 50px rgba(0,0,0,0.1);
        border: 1px solid rgba(76, 175, 80, 0.1);
    }

    .contact-form h2 {
        background: linear-gradient(135deg, #0f2027, #2c5364);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 1.8rem;
        margin-bottom: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        color: #333;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-family: 'Noto Sans Bengali', sans-serif;
        font-size: 1rem;
        transition: all 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #4CAF50;
        box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 150px;
    }

    .submit-btn {
        width: 100%;
        padding: 1.1rem;
        background: linear-gradient(135deg, #4CAF50, #2196F3);
        color: white;
        border: none;
        border-radius: 30px;
        font-size: 1.05rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        font-family: 'Noto Sans Bengali', sans-serif;
        box-shadow: 0 6px 20px rgba(76, 175, 80, 0.3);
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(76, 175, 80, 0.4);
    }

    .alert {
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
    }

    .alert-success {
        background: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
    }

    .alert-error {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
    }

    .volunteer-section {
        background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
        color: white;
        padding: 3.5rem 2rem;
        margin: 3rem 0;
        text-align: center;
        border-radius: 30px;
        position: relative;
        overflow: hidden;
    }

    .volunteer-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 50%, rgba(76, 175, 80, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 80% 50%, rgba(33, 150, 243, 0.15) 0%, transparent 50%);
    }

    .volunteer-section h2 {
        font-size: 2.2rem;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .volunteer-section p {
        font-size: 1.1rem;
        margin-bottom: 2rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        z-index: 2;
        color: rgba(255, 255, 255, 0.9);
    }

    .volunteer-features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        max-width: 1000px;
        margin: 3rem auto 0;
    }

    .volunteer-feature {
        background: rgba(255,255,255,0.1);
        padding: 2rem;
        border-radius: 15px;
        backdrop-filter: blur(10px);
    }

    .volunteer-feature i {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .volunteer-feature h3 {
        font-size: 1.3rem;
        margin-bottom: 0.5rem;
    }

    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .contact-content {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .contact-info,
        .contact-form {
            padding: 2rem;
        }

        .volunteer-section h2 {
            font-size: 2rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<section class="page-header">
    <h1>যোগাযোগ</h1>
    <p>আপনার মতামত, পরামর্শ বা যেকোনো সহায়তার জন্য আমাদের সাথে যোগাযোগ করুন</p>
</section>

<!-- Contact Content -->
<section class="contact-content">
    <!-- Contact Info -->
    <div class="contact-info">
        <h2>যোগাযোগের তথ্য</h2>
        
        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="info-details">
                <h3>অফিসের ঠিকানা</h3>
                <p>ঢাকা-৭, বাংলাদেশ<br>নির্বাচনী এলাকা অফিস</p>
            </div>
        </div>

        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-phone"></i>
            </div>
            <div class="info-details">
                <h3>ফোন নম্বর</h3>
                <p><a href="tel:+8801XXXXXXXXX">+৮৮০ ১XXX-XXXXXX</a><br>
                কল করুন: সকাল ৯টা - সন্ধ্যা ৬টা</p>
            </div>
        </div>

        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="info-details">
                <h3>ইমেইল</h3>
                <p><a href="mailto:info@example.com">info@example.com</a><br>
                ২৪ ঘণ্টার মধ্যে উত্তর পাবেন</p>
            </div>
        </div>

        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="info-details">
                <h3>অফিস সময়</h3>
                <p>রবিবার - বৃহস্পতিবার<br>
                সকাল ৯:০০ - সন্ধ্যা ৬:০০</p>
            </div>
        </div>

        <div class="social-section">
            <h3>সামাজিক মাধ্যমে আমরা</h3>
            <div class="social-links">
                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="contact-form">
        <h2>বার্তা পাঠান</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">আপনার নাম <span style="color: red;">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="পূর্ণ নাম লিখুন">
            </div>

            <div class="form-group">
                <label for="email">ইমেইল <span style="color: red;">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="example@email.com">
            </div>

            <div class="form-group">
                <label for="phone">ফোন নম্বর</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="০১XXXXXXXXX">
            </div>

            <div class="form-group">
                <label for="message">আপনার বার্তা <span style="color: red;">*</span></label>
                <textarea id="message" name="message" required placeholder="আপনার মতামত, পরামর্শ বা যেকোনো বার্তা লিখুন...">{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="submit-btn">বার্তা পাঠান</button>
        </form>
    </div>
</section>

<!-- Volunteer Section -->
<section class="volunteer-section">
    <div class="container">
        <h2>স্বেচ্ছাসেবক হিসেবে যোগ দিন</h2>
        <p>আমাদের উন্নয়ন যাত্রায় অংশীদার হোন। একসাথে আমরা পরিবর্তন আনতে পারি।</p>

        <div class="volunteer-features">
            <div class="volunteer-feature">
                <i class="fas fa-users"></i>
                <h3>কমিউনিটি সেবা</h3>
                <p>স্থানীয় সমাজসেবামূলক কাজে অংশগ্রহণ</p>
            </div>

            <div class="volunteer-feature">
                <i class="fas fa-bullhorn"></i>
                <h3>প্রচারণা</h3>
                <p>নির্বাচনী প্রচারে সহায়তা</p>
            </div>

            <div class="volunteer-feature">
                <i class="fas fa-hands-helping"></i>
                <h3>সহায়তা কার্যক্রম</h3>
                <p>সামাজিক কল্যাণ কর্মসূচিতে সহযোগিতা</p>
            </div>

            <div class="volunteer-feature">
                <i class="fas fa-laptop"></i>
                <h3>ডিজিটাল টিম</h3>
                <p>সোশ্যাল মিডিয়া ও অনলাইন কার্যক্রম</p>
            </div>
        </div>

        <div style="margin-top: 3rem;">
            <a href="{{ route('contact') }}" class="btn btn-primary" style="background: white; color: #1a5f3a;">স্বেচ্ছাসেবক হতে চাই</a>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Auto-hide success message after 5 seconds
    setTimeout(function() {
        const alert = document.querySelector('.alert-success');
        if (alert) {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }
    }, 5000);

    // Form validation enhancement
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const submitBtn = form.querySelector('.submit-btn');
        submitBtn.textContent = 'পাঠানো হচ্ছে...';
        submitBtn.disabled = true;
    });
</script>
@endsection
