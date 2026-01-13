@extends('layouts.admin')

@section('title', 'লক্ষ্য ম্যানেজমেন্ট')
@section('page-title', 'লক্ষ্য ম্যানেজমেন্ট')

@section('styles')
<style>
    .content-section {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }
    .content-section h3 {
        color: #1e293b;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e2e8f0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    label {
        display: block;
        margin-bottom: 0.5rem;
        color: #2c3e50;
        font-weight: 600;
    }
    input[type="text"],
    textarea {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-family: 'Noto Sans Bengali', sans-serif;
        transition: all 0.3s;
    }
    input:focus,
    textarea:focus {
        outline: none;
        border-color: #667eea;
    }
    textarea {
        min-height: 80px;
        resize: vertical;
    }
    small {
        display: block;
        color: #64748b;
        margin-top: 0.25rem;
        font-size: 0.875rem;
    }
    .save-btn-container {
        position: sticky;
        bottom: 2rem;
        text-align: center;
        margin-top: 2rem;
    }
    .goal-divider {
        border-top: 2px dashed #e2e8f0;
        margin: 2rem 0;
    }
</style>
@endsection

@section('content')
    <form action="{{ route('admin.goals.update') }}" method="POST">
        @csrf
        
        <!-- Goals Section Header -->
        <div class="content-section">
            <h3><i class="fas fa-heading"></i> লক্ষ্য সেকশন হেডার</h3>
            
            <div class="form-group">
                <label for="goals_title">লক্ষ্য সেকশন শিরোনাম</label>
                <input type="text" id="goals_title" name="contents[goals_title]" 
                    value="{{ $contents['goals_title'] ?? 'আমাদের লক্ষ্য' }}"
                    placeholder="আমাদের লক্ষ্য">
            </div>

            <div class="form-group">
                <label for="goals_subtitle">লক্ষ্য সেকশন সাবটাইটেল</label>
                <textarea id="goals_subtitle" name="contents[goals_subtitle]" 
                    placeholder="স্বাস্থ্য, শিক্ষা, কর্মসংস্থান...">{{ $contents['goals_subtitle'] ?? 'স্বাস্থ্য, শিক্ষা, কর্মসংস্থান, সামাজিক নিরাপত্তা এবং মানবিক সহায়তা—এগুলোকে অগ্রাধিকার দিয়ে টেকসই উন্নয়ন।' }}</textarea>
            </div>
        </div>

        <!-- Goal 1 -->
        <div class="content-section">
            <h3><i class="fas fa-star"></i> লক্ষ্য ১</h3>
            
            <div class="form-group">
                <label for="goal1_icon">আইকন (FontAwesome)</label>
                <select id="goal1_icon" name="contents[goal1_icon]" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 10px; font-family: 'Noto Sans Bengali', sans-serif;">
                    <option value="balance-scale" {{ ($contents['goal1_icon'] ?? 'balance-scale') == 'balance-scale' ? 'selected' : '' }}>⚖️ balance-scale (ন্যায়বিচার)</option>
                    <option value="graduation-cap" {{ ($contents['goal1_icon'] ?? '') == 'graduation-cap' ? 'selected' : '' }}>🎓 graduation-cap (শিক্ষা)</option>
                    <option value="chart-line" {{ ($contents['goal1_icon'] ?? '') == 'chart-line' ? 'selected' : '' }}>📈 chart-line (অর্থনীতি)</option>
                    <option value="venus" {{ ($contents['goal1_icon'] ?? '') == 'venus' ? 'selected' : '' }}>♀️ venus (নারী)</option>
                    <option value="globe" {{ ($contents['goal1_icon'] ?? '') == 'globe' ? 'selected' : '' }}>🌐 globe (বৈদেশিক)</option>
                    <option value="book-open" {{ ($contents['goal1_icon'] ?? '') == 'book-open' ? 'selected' : '' }}>📖 book-open (জ্ঞান)</option>
                    <option value="heart" {{ ($contents['goal1_icon'] ?? '') == 'heart' ? 'selected' : '' }}>❤️ heart (স্বাস্থ্য)</option>
                    <option value="briefcase" {{ ($contents['goal1_icon'] ?? '') == 'briefcase' ? 'selected' : '' }}>💼 briefcase (কর্মসংস্থান)</option>
                    <option value="shield-alt" {{ ($contents['goal1_icon'] ?? '') == 'shield-alt' ? 'selected' : '' }}>🛡️ shield-alt (নিরাপত্তা)</option>
                    <option value="users" {{ ($contents['goal1_icon'] ?? '') == 'users' ? 'selected' : '' }}>👥 users (সমাজ)</option>
                    <option value="hand-holding-heart" {{ ($contents['goal1_icon'] ?? '') == 'hand-holding-heart' ? 'selected' : '' }}>🤝 hand-holding-heart (সেবা)</option>
                    <option value="leaf" {{ ($contents['goal1_icon'] ?? '') == 'leaf' ? 'selected' : '' }}>🍃 leaf (পরিবেশ)</option>
                    <option value="home" {{ ($contents['goal1_icon'] ?? '') == 'home' ? 'selected' : '' }}>🏠 home (আবাসন)</option>
                    <option value="gavel" {{ ($contents['goal1_icon'] ?? '') == 'gavel' ? 'selected' : '' }}>⚖️ gavel (আইন)</option>
                    <option value="hospital" {{ ($contents['goal1_icon'] ?? '') == 'hospital' ? 'selected' : '' }}>🏥 hospital (চিকিৎসা)</option>
                    <option value="lightbulb" {{ ($contents['goal1_icon'] ?? '') == 'lightbulb' ? 'selected' : '' }}>💡 lightbulb (উদ্ভাবন)</option>
                    <option value="handshake" {{ ($contents['goal1_icon'] ?? '') == 'handshake' ? 'selected' : '' }}>🤝 handshake (সহযোগিতা)</option>
                    <option value="flag" {{ ($contents['goal1_icon'] ?? '') == 'flag' ? 'selected' : '' }}>🚩 flag (জাতীয়তা)</option>
                </select>
                <small>আইকন নির্বাচন করুন</small>
            </div>

            <div class="form-group">
                <label for="goal1_title">শিরোনাম</label>
                <input type="text" id="goal1_title" name="contents[goal1_title]" 
                    value="{{ $contents['goal1_title'] ?? 'গণতন্ত্র ও ন্যায়বিচার' }}"
                    placeholder="গণতন্ত্র ও ন্যায়বিচার">
            </div>

            <div class="form-group">
                <label for="goal1_description">বিবরণ</label>
                <textarea id="goal1_description" name="contents[goal1_description]" 
                    placeholder="সকল নাগরিকের ভোটের অধিকার...">{{ $contents['goal1_description'] ?? 'সকল নাগরিকের ভোটের অধিকার রক্ষা এবং স্বাধীন বিচার ব্যবস্থা নিশ্চিত করা আমাদের প্রধান লক্ষ্য।' }}</textarea>
            </div>
        </div>

        <!-- Goal 2 -->
        <div class="content-section">
            <h3><i class="fas fa-star"></i> লক্ষ্য ২</h3>
            
            <div class="form-group">
                <label for="goal2_icon">আইকন (FontAwesome)</label>
                <select id="goal2_icon" name="contents[goal2_icon]" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 10px; font-family: 'Noto Sans Bengali', sans-serif;">
                    <option value="balance-scale" {{ ($contents['goal2_icon'] ?? '') == 'balance-scale' ? 'selected' : '' }}>⚖️ balance-scale (ন্যায়বিচার)</option>
                    <option value="graduation-cap" {{ ($contents['goal2_icon'] ?? 'graduation-cap') == 'graduation-cap' ? 'selected' : '' }}>🎓 graduation-cap (শিক্ষা)</option>
                    <option value="chart-line" {{ ($contents['goal2_icon'] ?? '') == 'chart-line' ? 'selected' : '' }}>📈 chart-line (অর্থনীতি)</option>
                    <option value="venus" {{ ($contents['goal2_icon'] ?? '') == 'venus' ? 'selected' : '' }}>♀️ venus (নারী)</option>
                    <option value="globe" {{ ($contents['goal2_icon'] ?? '') == 'globe' ? 'selected' : '' }}>🌐 globe (বৈদেশিক)</option>
                    <option value="book-open" {{ ($contents['goal2_icon'] ?? '') == 'book-open' ? 'selected' : '' }}>📖 book-open (জ্ঞান)</option>
                    <option value="heart" {{ ($contents['goal2_icon'] ?? '') == 'heart' ? 'selected' : '' }}>❤️ heart (স্বাস্থ্য)</option>
                    <option value="briefcase" {{ ($contents['goal2_icon'] ?? '') == 'briefcase' ? 'selected' : '' }}>💼 briefcase (কর্মসংস্থান)</option>
                    <option value="shield-alt" {{ ($contents['goal2_icon'] ?? '') == 'shield-alt' ? 'selected' : '' }}>🛡️ shield-alt (নিরাপত্তা)</option>
                    <option value="users" {{ ($contents['goal2_icon'] ?? '') == 'users' ? 'selected' : '' }}>👥 users (সমাজ)</option>
                    <option value="hand-holding-heart" {{ ($contents['goal2_icon'] ?? '') == 'hand-holding-heart' ? 'selected' : '' }}>🤝 hand-holding-heart (সেবা)</option>
                    <option value="leaf" {{ ($contents['goal2_icon'] ?? '') == 'leaf' ? 'selected' : '' }}>🍃 leaf (পরিবেশ)</option>
                    <option value="home" {{ ($contents['goal2_icon'] ?? '') == 'home' ? 'selected' : '' }}>🏠 home (আবাসন)</option>
                    <option value="gavel" {{ ($contents['goal2_icon'] ?? '') == 'gavel' ? 'selected' : '' }}>⚖️ gavel (আইন)</option>
                    <option value="hospital" {{ ($contents['goal2_icon'] ?? '') == 'hospital' ? 'selected' : '' }}>🏥 hospital (চিকিৎসা)</option>
                    <option value="lightbulb" {{ ($contents['goal2_icon'] ?? '') == 'lightbulb' ? 'selected' : '' }}>💡 lightbulb (উদ্ভাবন)</option>
                    <option value="handshake" {{ ($contents['goal2_icon'] ?? '') == 'handshake' ? 'selected' : '' }}>🤝 handshake (সহযোগিতা)</option>
                    <option value="flag" {{ ($contents['goal2_icon'] ?? '') == 'flag' ? 'selected' : '' }}>🚩 flag (জাতীয়তা)</option>
                </select>
                <small>আইকন নির্বাচন করুন</small>
            </div>

            <div class="form-group">
                <label for="goal2_title">শিরোনাম</label>
                <input type="text" id="goal2_title" name="contents[goal2_title]" 
                    value="{{ $contents['goal2_title'] ?? 'শিক্ষা ও স্বাস্থ্যসেবা' }}"
                    placeholder="শিক্ষা ও স্বাস্থ্যসেবা">
            </div>

            <div class="form-group">
                <label for="goal2_description">বিবরণ</label>
                <textarea id="goal2_description" name="contents[goal2_description]" 
                    placeholder="মানসম্মত শিক্ষা এবং স্বাস্থ্যসেবা...">{{ $contents['goal2_description'] ?? 'মানসম্মত শিক্ষা এবং স্বাস্থ্যসেবা সবার জন্য সহজলভ্য করা এবং দক্ষ জনশক্তি গড়ে তোলা।' }}</textarea>
            </div>
        </div>

        <!-- Goal 3 -->
        <div class="content-section">
            <h3><i class="fas fa-star"></i> লক্ষ্য ৩</h3>
            
            <div class="form-group">
                <label for="goal3_icon">আইকন (FontAwesome)</label>
                <select id="goal3_icon" name="contents[goal3_icon]" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 10px; font-family: 'Noto Sans Bengali', sans-serif;">
                    <option value="balance-scale" {{ ($contents['goal3_icon'] ?? '') == 'balance-scale' ? 'selected' : '' }}>⚖️ balance-scale (ন্যায়বিচার)</option>
                    <option value="graduation-cap" {{ ($contents['goal3_icon'] ?? '') == 'graduation-cap' ? 'selected' : '' }}>🎓 graduation-cap (শিক্ষা)</option>
                    <option value="chart-line" {{ ($contents['goal3_icon'] ?? 'chart-line') == 'chart-line' ? 'selected' : '' }}>📈 chart-line (অর্থনীতি)</option>
                    <option value="venus" {{ ($contents['goal3_icon'] ?? '') == 'venus' ? 'selected' : '' }}>♀️ venus (নারী)</option>
                    <option value="globe" {{ ($contents['goal3_icon'] ?? '') == 'globe' ? 'selected' : '' }}>🌐 globe (বৈদেশিক)</option>
                    <option value="book-open" {{ ($contents['goal3_icon'] ?? '') == 'book-open' ? 'selected' : '' }}>📖 book-open (জ্ঞান)</option>
                    <option value="heart" {{ ($contents['goal3_icon'] ?? '') == 'heart' ? 'selected' : '' }}>❤️ heart (স্বাস্থ্য)</option>
                    <option value="briefcase" {{ ($contents['goal3_icon'] ?? '') == 'briefcase' ? 'selected' : '' }}>💼 briefcase (কর্মসংস্থান)</option>
                    <option value="shield-alt" {{ ($contents['goal3_icon'] ?? '') == 'shield-alt' ? 'selected' : '' }}>🛡️ shield-alt (নিরাপত্তা)</option>
                    <option value="users" {{ ($contents['goal3_icon'] ?? '') == 'users' ? 'selected' : '' }}>👥 users (সমাজ)</option>
                    <option value="hand-holding-heart" {{ ($contents['goal3_icon'] ?? '') == 'hand-holding-heart' ? 'selected' : '' }}>🤝 hand-holding-heart (সেবা)</option>
                    <option value="leaf" {{ ($contents['goal3_icon'] ?? '') == 'leaf' ? 'selected' : '' }}>🍃 leaf (পরিবেশ)</option>
                    <option value="home" {{ ($contents['goal3_icon'] ?? '') == 'home' ? 'selected' : '' }}>🏠 home (আবাসন)</option>
                    <option value="gavel" {{ ($contents['goal3_icon'] ?? '') == 'gavel' ? 'selected' : '' }}>⚖️ gavel (আইন)</option>
                    <option value="hospital" {{ ($contents['goal3_icon'] ?? '') == 'hospital' ? 'selected' : '' }}>🏥 hospital (চিকিৎসা)</option>
                    <option value="lightbulb" {{ ($contents['goal3_icon'] ?? '') == 'lightbulb' ? 'selected' : '' }}>💡 lightbulb (উদ্ভাবন)</option>
                    <option value="handshake" {{ ($contents['goal3_icon'] ?? '') == 'handshake' ? 'selected' : '' }}>🤝 handshake (সহযোগিতা)</option>
                    <option value="flag" {{ ($contents['goal3_icon'] ?? '') == 'flag' ? 'selected' : '' }}>🚩 flag (জাতীয়তা)</option>
                </select>
                <small>আইকন নির্বাচন করুন</small>
            </div>

            <div class="form-group">
                <label for="goal3_title">শিরোনাম</label>
                <input type="text" id="goal3_title" name="contents[goal3_title]" 
                    value="{{ $contents['goal3_title'] ?? 'দেশীয় অর্থনীতি' }}"
                    placeholder="দেশীয় অর্থনীতি">
            </div>

            <div class="form-group">
                <label for="goal3_description">বিবরণ</label>
                <textarea id="goal3_description" name="contents[goal3_description]" 
                    placeholder="আমি দেশের অর্থনৈতিক উন্নয়ন...">{{ $contents['goal3_description'] ?? 'দেশের অর্থনৈতিক উন্নয়ন ও কর্মসংস্থানের সুযোগ বৃদ্ধির জন্য কাজ করা।' }}</textarea>
            </div>
        </div>

        <!-- Goal 4 -->
        <div class="content-section">
            <h3><i class="fas fa-star"></i> লক্ষ্য ৪</h3>
            
            <div class="form-group">
                <label for="goal4_icon">আইকন (FontAwesome)</label>
                <select id="goal4_icon" name="contents[goal4_icon]" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 10px; font-family: 'Noto Sans Bengali', sans-serif;">
                    <option value="balance-scale" {{ ($contents['goal4_icon'] ?? '') == 'balance-scale' ? 'selected' : '' }}>⚖️ balance-scale (ন্যায়বিচার)</option>
                    <option value="graduation-cap" {{ ($contents['goal4_icon'] ?? '') == 'graduation-cap' ? 'selected' : '' }}>🎓 graduation-cap (শিক্ষা)</option>
                    <option value="chart-line" {{ ($contents['goal4_icon'] ?? '') == 'chart-line' ? 'selected' : '' }}>📈 chart-line (অর্থনীতি)</option>
                    <option value="venus" {{ ($contents['goal4_icon'] ?? 'venus') == 'venus' ? 'selected' : '' }}>♀️ venus (নারী)</option>
                    <option value="globe" {{ ($contents['goal4_icon'] ?? '') == 'globe' ? 'selected' : '' }}>🌐 globe (বৈদেশিক)</option>
                    <option value="book-open" {{ ($contents['goal4_icon'] ?? '') == 'book-open' ? 'selected' : '' }}>📖 book-open (জ্ঞান)</option>
                    <option value="heart" {{ ($contents['goal4_icon'] ?? '') == 'heart' ? 'selected' : '' }}>❤️ heart (স্বাস্থ্য)</option>
                    <option value="briefcase" {{ ($contents['goal4_icon'] ?? '') == 'briefcase' ? 'selected' : '' }}>💼 briefcase (কর্মসংস্থান)</option>
                    <option value="shield-alt" {{ ($contents['goal4_icon'] ?? '') == 'shield-alt' ? 'selected' : '' }}>🛡️ shield-alt (নিরাপত্তা)</option>
                    <option value="users" {{ ($contents['goal4_icon'] ?? '') == 'users' ? 'selected' : '' }}>👥 users (সমাজ)</option>
                    <option value="hand-holding-heart" {{ ($contents['goal4_icon'] ?? '') == 'hand-holding-heart' ? 'selected' : '' }}>🤝 hand-holding-heart (সেবা)</option>
                    <option value="leaf" {{ ($contents['goal4_icon'] ?? '') == 'leaf' ? 'selected' : '' }}>🍃 leaf (পরিবেশ)</option>
                    <option value="home" {{ ($contents['goal4_icon'] ?? '') == 'home' ? 'selected' : '' }}>🏠 home (আবাসন)</option>
                    <option value="gavel" {{ ($contents['goal4_icon'] ?? '') == 'gavel' ? 'selected' : '' }}>⚖️ gavel (আইন)</option>
                    <option value="hospital" {{ ($contents['goal4_icon'] ?? '') == 'hospital' ? 'selected' : '' }}>🏥 hospital (চিকিৎসা)</option>
                    <option value="lightbulb" {{ ($contents['goal4_icon'] ?? '') == 'lightbulb' ? 'selected' : '' }}>💡 lightbulb (উদ্ভাবন)</option>
                    <option value="handshake" {{ ($contents['goal4_icon'] ?? '') == 'handshake' ? 'selected' : '' }}>🤝 handshake (সহযোগিতা)</option>
                    <option value="flag" {{ ($contents['goal4_icon'] ?? '') == 'flag' ? 'selected' : '' }}>🚩 flag (জাতীয়তা)</option>
                </select>
                <small>আইকন নির্বাচন করুন</small>
            </div>

            <div class="form-group">
                <label for="goal4_title">শিরোনাম</label>
                <input type="text" id="goal4_title" name="contents[goal4_title]" 
                    value="{{ $contents['goal4_title'] ?? 'নারী অধিকার' }}"
                    placeholder="নারী অধিকার">
            </div>

            <div class="form-group">
                <label for="goal4_description">বিবরণ</label>
                <textarea id="goal4_description" name="contents[goal4_description]" 
                    placeholder="নারী অধিকারের প্রতি...">{{ $contents['goal4_description'] ?? 'নারী অধিকারের প্রতি প্রতিশ্রুতিবদ্ধ।' }}</textarea>
            </div>
        </div>

        <!-- Goal 5 -->
        <div class="content-section">
            <h3><i class="fas fa-star"></i> লক্ষ্য ৫</h3>
            
            <div class="form-group">
                <label for="goal5_icon">আইকন (FontAwesome)</label>
                <select id="goal5_icon" name="contents[goal5_icon]" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 10px; font-family: 'Noto Sans Bengali', sans-serif;">
                    <option value="balance-scale" {{ ($contents['goal5_icon'] ?? '') == 'balance-scale' ? 'selected' : '' }}>⚖️ balance-scale (ন্যায়বিচার)</option>
                    <option value="graduation-cap" {{ ($contents['goal5_icon'] ?? '') == 'graduation-cap' ? 'selected' : '' }}>🎓 graduation-cap (শিক্ষা)</option>
                    <option value="chart-line" {{ ($contents['goal5_icon'] ?? '') == 'chart-line' ? 'selected' : '' }}>📈 chart-line (অর্থনীতি)</option>
                    <option value="venus" {{ ($contents['goal5_icon'] ?? '') == 'venus' ? 'selected' : '' }}>♀️ venus (নারী)</option>
                    <option value="globe" {{ ($contents['goal5_icon'] ?? 'globe') == 'globe' ? 'selected' : '' }}>🌐 globe (বৈদেশিক)</option>
                    <option value="book-open" {{ ($contents['goal5_icon'] ?? '') == 'book-open' ? 'selected' : '' }}>📖 book-open (জ্ঞান)</option>
                    <option value="heart" {{ ($contents['goal5_icon'] ?? '') == 'heart' ? 'selected' : '' }}>❤️ heart (স্বাস্থ্য)</option>
                    <option value="briefcase" {{ ($contents['goal5_icon'] ?? '') == 'briefcase' ? 'selected' : '' }}>💼 briefcase (কর্মসংস্থান)</option>
                    <option value="shield-alt" {{ ($contents['goal5_icon'] ?? '') == 'shield-alt' ? 'selected' : '' }}>🛡️ shield-alt (নিরাপত্তা)</option>
                    <option value="users" {{ ($contents['goal5_icon'] ?? '') == 'users' ? 'selected' : '' }}>👥 users (সমাজ)</option>
                    <option value="hand-holding-heart" {{ ($contents['goal5_icon'] ?? '') == 'hand-holding-heart' ? 'selected' : '' }}>🤝 hand-holding-heart (সেবা)</option>
                    <option value="leaf" {{ ($contents['goal5_icon'] ?? '') == 'leaf' ? 'selected' : '' }}>🍃 leaf (পরিবেশ)</option>
                    <option value="home" {{ ($contents['goal5_icon'] ?? '') == 'home' ? 'selected' : '' }}>🏠 home (আবাসন)</option>
                    <option value="gavel" {{ ($contents['goal5_icon'] ?? '') == 'gavel' ? 'selected' : '' }}>⚖️ gavel (আইন)</option>
                    <option value="hospital" {{ ($contents['goal5_icon'] ?? '') == 'hospital' ? 'selected' : '' }}>🏥 hospital (চিকিৎসা)</option>
                    <option value="lightbulb" {{ ($contents['goal5_icon'] ?? '') == 'lightbulb' ? 'selected' : '' }}>💡 lightbulb (উদ্ভাবন)</option>
                    <option value="handshake" {{ ($contents['goal5_icon'] ?? '') == 'handshake' ? 'selected' : '' }}>🤝 handshake (সহযোগিতা)</option>
                    <option value="flag" {{ ($contents['goal5_icon'] ?? '') == 'flag' ? 'selected' : '' }}>🚩 flag (জাতীয়তা)</option>
                </select>
                <small>আইকন নির্বাচন করুন</small>
            </div>

            <div class="form-group">
                <label for="goal5_title">শিরোনাম</label>
                <input type="text" id="goal5_title" name="contents[goal5_title]" 
                    value="{{ $contents['goal5_title'] ?? 'বৈদেশিক নীতি' }}"
                    placeholder="বৈদেশিক নীতি">
            </div>

            <div class="form-group">
                <label for="goal5_description">বিবরণ</label>
                <textarea id="goal5_description" name="contents[goal5_description]" 
                    placeholder="শক্তিশালী বৈদেশিক নীতি...">{{ $contents['goal5_description'] ?? 'শক্তিশালী বৈদেশিক নীতি গড়ে তোলা।' }}</textarea>
            </div>
        </div>

        <!-- Goal 6 -->
        <div class="content-section">
            <h3><i class="fas fa-star"></i> লক্ষ্য ৬</h3>
            
            <div class="form-group">
                <label for="goal6_icon">আইকন (FontAwesome)</label>
                <select id="goal6_icon" name="contents[goal6_icon]" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 10px; font-family: 'Noto Sans Bengali', sans-serif;">
                    <option value="balance-scale" {{ ($contents['goal6_icon'] ?? '') == 'balance-scale' ? 'selected' : '' }}>⚖️ balance-scale (ন্যায়বিচার)</option>
                    <option value="graduation-cap" {{ ($contents['goal6_icon'] ?? '') == 'graduation-cap' ? 'selected' : '' }}>🎓 graduation-cap (শিক্ষা)</option>
                    <option value="chart-line" {{ ($contents['goal6_icon'] ?? '') == 'chart-line' ? 'selected' : '' }}>📈 chart-line (অর্থনীতি)</option>
                    <option value="venus" {{ ($contents['goal6_icon'] ?? '') == 'venus' ? 'selected' : '' }}>♀️ venus (নারী)</option>
                    <option value="globe" {{ ($contents['goal6_icon'] ?? '') == 'globe' ? 'selected' : '' }}>🌐 globe (বৈদেশিক)</option>
                    <option value="book-open" {{ ($contents['goal6_icon'] ?? 'book-open') == 'book-open' ? 'selected' : '' }}>📖 book-open (জ্ঞান)</option>
                    <option value="heart" {{ ($contents['goal6_icon'] ?? '') == 'heart' ? 'selected' : '' }}>❤️ heart (স্বাস্থ্য)</option>
                    <option value="briefcase" {{ ($contents['goal6_icon'] ?? '') == 'briefcase' ? 'selected' : '' }}>💼 briefcase (কর্মসংস্থান)</option>
                    <option value="shield-alt" {{ ($contents['goal6_icon'] ?? '') == 'shield-alt' ? 'selected' : '' }}>🛡️ shield-alt (নিরাপত্তা)</option>
                    <option value="users" {{ ($contents['goal6_icon'] ?? '') == 'users' ? 'selected' : '' }}>👥 users (সমাজ)</option>
                    <option value="hand-holding-heart" {{ ($contents['goal6_icon'] ?? '') == 'hand-holding-heart' ? 'selected' : '' }}>🤝 hand-holding-heart (সেবা)</option>
                    <option value="leaf" {{ ($contents['goal6_icon'] ?? '') == 'leaf' ? 'selected' : '' }}>🍃 leaf (পরিবেশ)</option>
                    <option value="home" {{ ($contents['goal6_icon'] ?? '') == 'home' ? 'selected' : '' }}>🏠 home (আবাসন)</option>
                    <option value="gavel" {{ ($contents['goal6_icon'] ?? '') == 'gavel' ? 'selected' : '' }}>⚖️ gavel (আইন)</option>
                    <option value="hospital" {{ ($contents['goal6_icon'] ?? '') == 'hospital' ? 'selected' : '' }}>🏥 hospital (চিকিৎসা)</option>
                    <option value="lightbulb" {{ ($contents['goal6_icon'] ?? '') == 'lightbulb' ? 'selected' : '' }}>💡 lightbulb (উদ্ভাবন)</option>
                    <option value="handshake" {{ ($contents['goal6_icon'] ?? '') == 'handshake' ? 'selected' : '' }}>🤝 handshake (সহযোগিতা)</option>
                    <option value="flag" {{ ($contents['goal6_icon'] ?? '') == 'flag' ? 'selected' : '' }}>🚩 flag (জাতীয়তা)</option>
                </select>
                <small>আইকন নির্বাচন করুন</small>
            </div>

            <div class="form-group">
                <label for="goal6_title">শিরোনাম</label>
                <input type="text" id="goal6_title" name="contents[goal6_title]" 
                    value="{{ $contents['goal6_title'] ?? 'শিক্ষার প্রতি মনোযোগ' }}"
                    placeholder="শিক্ষার প্রতি মনোযোগ">
            </div>

            <div class="form-group">
                <label for="goal6_description">বিবরণ</label>
                <textarea id="goal6_description" name="contents[goal6_description]" 
                    placeholder="শিক্ষার মান উন্নয়ন...">{{ $contents['goal6_description'] ?? 'শিক্ষার মান উন্নয়ন এবং সমান সুযোগ নিশ্চিত করা।' }}</textarea>
            </div>
        </div>

        <div class="save-btn-container">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> সংরক্ষণ করুন
            </button>
        </div>
    </form>
@endsection
