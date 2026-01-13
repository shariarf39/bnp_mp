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

        <!-- Footer Contact Section -->
        <div class="content-section">
            <h3><i class="fas fa-address-card"></i> ফুটার যোগাযোগ</h3>
            
            @php
                $footerContents = isset($contents['footer']) ? $contents['footer'] : collect([]);
            @endphp
            
            <div class="form-group">
                <label for="footer_about_title">ফুটার সম্পর্কে শিরোনাম</label>
                <input type="text" id="footer_about_title" name="contents[footer_about_title]" 
                    value="{{ $footerContents->where('key', 'footer_about_title')->first()->value ?? 'আমাদের সম্পর্কে' }}"
                    placeholder="আমাদের সম্পর্কে">
                <input type="hidden" name="sections[footer_about_title]" value="footer">
            </div>

            <div class="form-group">
                <label for="footer_about_text">ফুটার সম্পর্কে বিবরণ</label>
                <textarea id="footer_about_text" name="contents[footer_about_text]" 
                    placeholder="গণতন্ত্রের পথেই মুক্তি...">{{ $footerContents->where('key', 'footer_about_text')->first()->value ?? 'গণতন্ত্রের পথেই মুক্তি, যেখানে আপনার প্রতিটি কথাই মূল্যবান এবং প্রতিটি ভোটই গড়বে আমাদের জাতির ভাগ্য।' }}</textarea>
                <input type="hidden" name="sections[footer_about_text]" value="footer">
            </div>

            <div class="form-group">
                <label for="footer_facebook_url">ফেইসবুক লিংক</label>
                <input type="text" id="footer_facebook_url" name="contents[footer_facebook_url]" 
                    value="{{ $footerContents->where('key', 'footer_facebook_url')->first()->value ?? '#' }}"
                    placeholder="https://facebook.com/...">
                <input type="hidden" name="sections[footer_facebook_url]" value="footer">
            </div>

            <div class="form-group">
                <label for="footer_youtube_url">ইউটিউব লিংক</label>
                <input type="text" id="footer_youtube_url" name="contents[footer_youtube_url]" 
                    value="{{ $footerContents->where('key', 'footer_youtube_url')->first()->value ?? '#' }}"
                    placeholder="https://youtube.com/...">
                <input type="hidden" name="sections[footer_youtube_url]" value="footer">
            </div>

            <div class="form-group">
                <label for="footer_twitter_url">টুইটার লিংক</label>
                <input type="text" id="footer_twitter_url" name="contents[footer_twitter_url]" 
                    value="{{ $footerContents->where('key', 'footer_twitter_url')->first()->value ?? '#' }}"
                    placeholder="https://twitter.com/...">
                <input type="hidden" name="sections[footer_twitter_url]" value="footer">
            </div>

            <div class="form-group">
                <label for="footer_phone">ফোন নম্বর</label>
                <input type="text" id="footer_phone" name="contents[footer_phone]" 
                    value="{{ $footerContents->where('key', 'footer_phone')->first()->value ?? '+৮৮০ ১XXX-XXXXXX' }}"
                    placeholder="+৮৮০ ১XXX-XXXXXX">
                <input type="hidden" name="sections[footer_phone]" value="footer">
            </div>

            <div class="form-group">
                <label for="footer_email">ইমেইল ঠিকানা</label>
                <input type="email" id="footer_email" name="contents[footer_email]" 
                    value="{{ $footerContents->where('key', 'footer_email')->first()->value ?? 'info@example.com' }}"
                    placeholder="info@example.com">
                <input type="hidden" name="sections[footer_email]" value="footer">
            </div>

            <div class="form-group">
                <label for="footer_address">ঠিকানা</label>
                <input type="text" id="footer_address" name="contents[footer_address]" 
                    value="{{ $footerContents->where('key', 'footer_address')->first()->value ?? 'ঢাকা, বাংলাদেশ' }}"
                    placeholder="ঢাকা, বাংলাদেশ">
                <input type="hidden" name="sections[footer_address]" value="footer">
            </div>

            <div class="form-group">
                <label for="footer_copyright">কপিরাইট টেক্সট</label>
                <input type="text" id="footer_copyright" name="contents[footer_copyright]" 
                    value="{{ $footerContents->where('key', 'footer_copyright')->first()->value ?? 'BNP রাজনৈতিক নেতা। সর্বস্বত্ব সংরক্ষিত।' }}"
                    placeholder="BNP রাজনৈতিক নেতা। সর্বস্বত্ব সংরক্ষিত।">
                <input type="hidden" name="sections[footer_copyright]" value="footer">
            </div>
        </div>

        <!-- About Page Section -->
        <div class="content-section">
            <h3><i class="fas fa-image"></i> আমাদের সম্পর্কে</h3>
            
            <div class="form-group">
                <label for="about_logo">লোগো</label>
                <div id="upload-area" style="border: 2px dashed #e2e8f0; border-radius: 10px; padding: 2rem; text-align: center; margin-bottom: 1rem;">
                    <div id="logo-preview" style="margin-bottom: 1rem;">
                        @php
                            $aboutLogo = isset($contents['about']) ? $contents['about']->where('key', 'about_logo')->first() : null;
                        @endphp
                        @if($aboutLogo && $aboutLogo->value)
                            <img src="{{ asset('storage/' . $aboutLogo->value) }}" 
                                 alt="About Logo" style="max-width: 150px; max-height: 150px; border-radius: 10px;">
                        @endif
                    </div>
                    <input type="file" id="logo_upload" accept="image/*" style="display: none;">
                    <button type="button" id="upload-btn" onclick="document.getElementById('logo_upload').click()" 
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 8px; cursor: pointer;">
                        <i class="fas fa-upload"></i> লোগো আপলোড করুন
                    </button>
                    <p style="margin-top: 0.5rem; color: #6b7280; font-size: 0.875rem;">JPEG, PNG, JPG, GIF (সর্বোচ্চ ২MB)</p>
                    <div id="upload-status" style="margin-top: 0.5rem; font-size: 0.875rem;"></div>
                </div>
                <input type="text" id="about_logo" name="contents[about_logo]" 
                    value="{{ $aboutLogo->value ?? '' }}"
                    readonly style="background-color: #f9fafb;">
                <input type="hidden" name="sections[about_logo]" value="about">
            </div>
        </div>

        <div class="save-btn-container">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> সংরক্ষণ করুন
            </button>
        </div>
    </form>

    <script>
    document.getElementById('logo_upload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append('logo', file);
        formData.append('_token', '{{ csrf_token() }}');

        const uploadBtn = document.getElementById('upload-btn');
        const statusDiv = document.getElementById('upload-status');
        uploadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> আপলোড হচ্ছে...';
        uploadBtn.disabled = true;
        statusDiv.innerHTML = '<span style="color: #6b7280;">আপলোড হচ্ছে...</span>';

        fetch('{{ route("admin.upload.about.logo") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.text().then(text => {
                    throw new Error(text);
                });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Update the image preview
                const previewDiv = document.getElementById('logo-preview');
                previewDiv.innerHTML = `<img src="${data.url}" alt="About Logo" style="max-width: 150px; max-height: 150px; border-radius: 10px;">`;

                // Update the hidden input
                document.getElementById('about_logo').value = data.path;

                statusDiv.innerHTML = '<span style="color: #10b981;">✓ লোগো সফলভাবে আপলোড হয়েছে!</span>';
            } else {
                statusDiv.innerHTML = '<span style="color: #ef4444;">✗ আপলোড ব্যর্থ: ' + data.message + '</span>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            statusDiv.innerHTML = '<span style="color: #ef4444;">✗ আপলোড করতে সমস্যা হয়েছে। কনসোল চেক করুন।</span>';
        })
        .finally(() => {
            uploadBtn.innerHTML = '<i class="fas fa-upload"></i> লোগো আপলোড করুন';
            uploadBtn.disabled = false;
        });
    });
    </script>
@endsection
