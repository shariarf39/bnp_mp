@extends('layouts.admin')

@section('title', 'নেতা ম্যানেজমেন্ট')
@section('page-title', 'নেতা সেকশন ম্যানেজমেন্ট')

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
    .image-upload-area {
        border: 2px dashed #e2e8f0;
        border-radius: 10px;
        padding: 2rem;
        text-align: center;
        background: #f8fafc;
        transition: all 0.3s;
    }
    .image-upload-area:hover {
        border-color: #667eea;
        background: #f1f5f9;
    }
    .image-preview {
        max-width: 300px;
        margin: 1rem auto;
        border-radius: 10px;
        overflow: hidden;
    }
    .image-preview img {
        width: 100%;
        height: auto;
        display: block;
    }
    .upload-icon {
        font-size: 3rem;
        color: #667eea;
        margin-bottom: 1rem;
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
    <form action="{{ route('admin.leader.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Image Upload Section -->
        <div class="content-section">
            <h3><i class="fas fa-image"></i> নেতার ছবি</h3>
            
            <div class="form-group">
                <label for="leader_image">ছবি আপলোড করুন</label>
                <div class="image-upload-area">
                    @if(!empty($contents['leader_image']))
                        <div class="image-preview">
                            <img src="{{ asset('storage/app/public/' . $contents['leader_image']) }}" alt="Leader Image" id="imagePreview">
                        </div>
                    @else
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="image-preview" id="imagePreviewContainer" style="display: none;">
                            <img src="" alt="Preview" id="imagePreview">
                        </div>
                    @endif
                    <input type="file" id="leader_image" name="leader_image" accept="image/*" style="display: none;">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('leader_image').click();">
                        <i class="fas fa-upload"></i> ছবি নির্বাচন করুন
                    </button>
                    <small>সর্বোচ্চ ফাইল সাইজ: 2MB | ফরম্যাট: JPG, PNG, GIF</small>
                </div>
            </div>
        </div>

        <!-- Badge and Title Section -->
        <div class="content-section">
            <h3><i class="fas fa-heading"></i> ব্যাজ এবং শিরোনাম</h3>
            
            <div class="form-group">
                <label for="leader_badge">ব্যাজ টেক্সট</label>
                <input type="text" id="leader_badge" name="contents[leader_badge]" 
                    value="{{ $contents['leader_badge'] ?? 'তরুণ প্রজন্মের আদর্শ' }}"
                    placeholder="তরুণ প্রজন্মের আদর্শ">
                <small>ছবির উপরে প্রদর্শিত ব্যাজ টেক্সট</small>
            </div>

            <div class="form-group">
                <label for="leader_title">প্রধান শিরোনাম</label>
                <input type="text" id="leader_title" name="contents[leader_title]" 
                    value="{{ $contents['leader_title'] ?? 'তরুণ প্রজন্মের আদর্শিক নেতা' }}"
                    placeholder="তরুণ প্রজন্মের আদর্শিক নেতা">
            </div>
        </div>

        <!-- Description Section -->
        <div class="content-section">
            <h3><i class="fas fa-align-left"></i> বিবরণ</h3>
            
            <div class="form-group">
                <label for="leader_description">সংক্ষিপ্ত বিবরণ</label>
                <textarea id="leader_description" name="contents[leader_description]" 
                    placeholder="সকলের অংশগ্রহণে উন্নয়ন...">{{ $contents['leader_description'] ?? 'সকলের অংশগ্রহণে উন্নয়ন—মানুষের অধিকার, ন্যায়বিচার ও সমান সুযোগ নিশ্চিত করাই লক্ষ্য।' }}</textarea>
            </div>

            <div class="form-group">
                <label for="leader_bio">জীবনী</label>
                <textarea id="leader_bio" name="contents[leader_bio]" 
                    placeholder="রাজনৈতিক জীবনের শুরু...">{{ $contents['leader_bio'] ?? 'রাজনৈতিক জীবনের শুরু হয়েছিল ছাত্র রাজনীতিতে যোগদানের মাধ্যমে। একজন মেধাবী ছাত্রনেতা হিসেবে তরুণদের অধিকার আদায়ে সর্বদা সোচ্চার থেকেছেন।' }}</textarea>
            </div>
        </div>

        <!-- Values Section -->
        <div class="content-section">
            <h3><i class="fas fa-check-circle"></i> মূল্যবোধ ও লক্ষ্য</h3>
            
            <div class="form-group">
                <label for="leader_value1">মূল্যবোধ ১</label>
                <input type="text" id="leader_value1" name="contents[leader_value1]" 
                    value="{{ $contents['leader_value1'] ?? 'জনসেবায় স্বচ্ছতা ও জবাবদিহিতা' }}"
                    placeholder="জনসেবায় স্বচ্ছতা ও জবাবদিহিতা">
            </div>

            <div class="form-group">
                <label for="leader_value2">মূল্যবোধ ২</label>
                <input type="text" id="leader_value2" name="contents[leader_value2]" 
                    value="{{ $contents['leader_value2'] ?? 'দ্রুত সাড়া ও বাস্তবসম্মত উদ্যোগ' }}"
                    placeholder="দ্রুত সাড়া ও বাস্তবসম্মত উদ্যোগ">
            </div>

            <div class="form-group">
                <label for="leader_value3">মূল্যবোধ ৩</label>
                <input type="text" id="leader_value3" name="contents[leader_value3]" 
                    value="{{ $contents['leader_value3'] ?? 'সমাজের প্রতিটি মানুষের অন্তর্ভুক্তি' }}"
                    placeholder="সমাজের প্রতিটি মানুষের অন্তর্ভুক্তি">
            </div>

            <div class="form-group">
                <label for="leader_value4">মূল্যবোধ ৪</label>
                <input type="text" id="leader_value4" name="contents[leader_value4]" 
                    value="{{ $contents['leader_value4'] ?? 'শিক্ষা-স্বাস্থ্যকে অগ্রাধিকার' }}"
                    placeholder="শিক্ষা-স্বাস্থ্যকে অগ্রাধিকার">
            </div>
        </div>

        <div class="save-btn-container">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> সংরক্ষণ করুন
            </button>
        </div>
    </form>

    <script>
        // Image preview functionality
        document.getElementById('leader_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('imagePreview');
                    const container = document.getElementById('imagePreviewContainer');
                    preview.src = e.target.result;
                    if (container) {
                        container.style.display = 'block';
                    }
                    document.querySelector('.upload-icon').style.display = 'none';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
