@extends('layouts.admin')

@section('title', 'কন্টেন্ট ম্যানেজমেন্ট')
@section('page-title', 'কন্টেন্ট ম্যানেজমেন্ট')

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
    .save-btn-container {
        position: sticky;
        bottom: 2rem;
        text-align: center;
        margin-top: 2rem;
    }
</style>
@endsection

@section('content')
    <form action="{{ route('admin.content.update') }}" method="POST">
        @csrf
        
        <!-- Hero Section -->
        <div class="content-section">
            <h3><i class="fas fa-home"></i> হিরো সেকশন</h3>
            
            <div class="form-group">
                <label for="hero_badge_text">ব্যাজ টেক্সট</label>
                <input type="text" id="hero_badge_text" name="contents[hero_badge_text]" 
                    value="{{ $contents['hero']->where('key', 'hero_badge_text')->first()->value ?? 'বাংলাদেশ জাতীয়তাবাদী দল (BNP)' }}"
                    placeholder="বাংলাদেশ জাতীয়তাবাদী দল (BNP)">
                <input type="hidden" name="sections[hero_badge_text]" value="hero">
            </div>

            <div class="form-group">
                <label for="hero_title">প্রধান শিরোনাম</label>
                <input type="text" id="hero_title" name="contents[hero_title]" 
                    value="{{ $contents['hero']->where('key', 'hero_title')->first()->value ?? 'একটি সুন্দর ও ঐক্যবদ্ধ আগামী গড়ার প্রত্যয়ে' }}"
                    placeholder="একটি সুন্দর ও ঐক্যবদ্ধ আগামী গড়ার প্রত্যয়ে">
                <input type="hidden" name="sections[hero_title]" value="hero">
            </div>

            <div class="form-group">
                <label for="hero_subtitle">সাবটাইটেল</label>
                <textarea id="hero_subtitle" name="contents[hero_subtitle]" 
                    placeholder="গণতন্ত্রের পথেই মুক্তি...">{{ $contents['hero']->where('key', 'hero_subtitle')->first()->value ?? 'গণতন্ত্রের পথেই মুক্তি, যেখানে আপনার প্রতিটি কথাই মূল্যবান এবং প্রতিটি ভোটই গড়বে আমাদের জাতির ভাগ্য।' }}</textarea>
                <input type="hidden" name="sections[hero_subtitle]" value="hero">
            </div>

            <div class="form-group">
                <label for="hero_button_primary">প্রাথমিক বাটন টেক্সট</label>
                <input type="text" id="hero_button_primary" name="contents[hero_button_primary]" 
                    value="{{ $contents['hero']->where('key', 'hero_button_primary')->first()->value ?? 'আজই যোগ দিন' }}"
                    placeholder="আজই যোগ দিন">
                <input type="hidden" name="sections[hero_button_primary]" value="hero">
            </div>

            <div class="form-group">
                <label for="hero_button_secondary">সেকেন্ডারি বাটন টেক্সট</label>
                <input type="text" id="hero_button_secondary" name="contents[hero_button_secondary]" 
                    value="{{ $contents['hero']->where('key', 'hero_button_secondary')->first()->value ?? 'আরও জানুন' }}"
                    placeholder="আরও জানুন">
                <input type="hidden" name="sections[hero_button_secondary]" value="hero">
            </div>
        </div>

        <!-- Stats Section -->
        <div class="content-section">
            <h3><i class="fas fa-chart-bar"></i> পরিসংখ্যান সেকশন</h3>
            
            <div class="form-group">
                <label for="stat1_number">পরিসংখ্যান ১ - সংখ্যা</label>
                <input type="text" id="stat1_number" name="contents[stat1_number]" 
                    value="{{ $contents['stats']->where('key', 'stat1_number')->first()->value ?? '১০+ ' }}"
                    placeholder="১০+ ">
                <input type="hidden" name="sections[stat1_number]" value="stats">
            </div>

            <div class="form-group">
                <label for="stat1_label">পরিসংখ্যান ১ - লেবেল</label>
                <input type="text" id="stat1_label" name="contents[stat1_label]" 
                    value="{{ $contents['stats']->where('key', 'stat1_label')->first()->value ?? 'বছর সমাজ সেবা' }}"
                    placeholder="বছর সমাজ সেবা">
                <input type="hidden" name="sections[stat1_label]" value="stats">
            </div>

            <div class="form-group">
                <label for="stat2_number">পরিসংখ্যান ২ - সংখ্যা</label>
                <input type="text" id="stat2_number" name="contents[stat2_number]" 
                    value="{{ $contents['stats']->where('key', 'stat2_number')->first()->value ?? '৫০+ ' }}"
                    placeholder="৫০+ ">
                <input type="hidden" name="sections[stat2_number]" value="stats">
            </div>

            <div class="form-group">
                <label for="stat2_label">পরিসংখ্যান ২ - লেবেল</label>
                <input type="text" id="stat2_label" name="contents[stat2_label]" 
                    value="{{ $contents['stats']->where('key', 'stat2_label')->first()->value ?? 'উদ্যোগ/প্রকল্প' }}"
                    placeholder="উদ্যোগ/প্রকল্প">
                <input type="hidden" name="sections[stat2_label]" value="stats">
            </div>

            <div class="form-group">
                <label for="stat3_number">পরিসংখ্যান ৩ - সংখ্যা</label>
                <input type="text" id="stat3_number" name="contents[stat3_number]" 
                    value="{{ $contents['stats']->where('key', 'stat3_number')->first()->value ?? '২৪/৭ ' }}"
                    placeholder="২৪/৭ ">
                <input type="hidden" name="sections[stat3_number]" value="stats">
            </div>

            <div class="form-group">
                <label for="stat3_label">পরিসংখ্যান ৩ - লেবেল</label>
                <input type="text" id="stat3_label" name="contents[stat3_label]" 
                    value="{{ $contents['stats']->where('key', 'stat3_label')->first()->value ?? 'জনগণের পাশে' }}"
                    placeholder="জনগণের পাশে">
                <input type="hidden" name="sections[stat3_label]" value="stats">
            </div>
        </div>

        <div class="save-btn-container">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> সংরক্ষণ করুন
            </button>
        </div>
    </form>
@endsection
