@extends('layouts.admin')

@section('title', 'নতুন কার্যক্রম ছবি যুক্ত করুন')
@section('page-title', 'নতুন কার্যক্রম ছবি যুক্ত করুন')

@section('styles')
<style>
    .form-section {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
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
    textarea,
    select {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-family: 'Noto Sans Bengali', sans-serif;
        transition: all 0.3s;
    }
    input:focus,
    textarea:focus,
    select:focus {
        outline: none;
        border-color: #667eea;
    }
    textarea {
        min-height: 100px;
        resize: vertical;
    }
    .image-upload-area {
        border: 2px dashed #e2e8f0;
        border-radius: 10px;
        padding: 3rem;
        text-align: center;
        background: #f8fafc;
        transition: all 0.3s;
        cursor: pointer;
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
        display: none;
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
    .checkbox-container {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }
    .checkbox-container input[type="checkbox"] {
        width: auto;
        transform: scale(1.2);
    }
    .btn-section {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        padding-top: 2rem;
        border-top: 1px solid #e2e8f0;
    }
</style>
@endsection

@section('content')
    <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Image Upload Section -->
        <div class="form-section">
            <h3 style="margin-bottom: 1.5rem; color: #1e293b;">
                <i class="fas fa-image"></i> ছবি আপলোড
            </h3>
            
            <div class="form-group">
                <label for="image">কার্যক্রম ছবি *</label>
                <div class="image-upload-area" onclick="document.getElementById('image').click();">
                    <div class="upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h4 style="margin-bottom: 0.5rem;">ছবি নির্বাচন করুন</h4>
                    <p style="color: #64748b; margin-bottom: 0;">ক্লিক করুন অথবা ড্র্যাগ করে ছবি আপলোড করুন</p>
                    <small style="display: block; margin-top: 0.5rem; color: #9ca3af;">
                        সর্বোচ্চ ফাইল সাইজ: 2MB | ফরম্যাট: JPG, PNG, GIF
                    </small>
                </div>
                <input type="file" id="image" name="image" accept="image/*" style="display: none;" required>
                <div class="image-preview" id="imagePreview">
                    <img src="" alt="Preview" id="previewImg">
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="form-section">
            <h3 style="margin-bottom: 1.5rem; color: #1e293b;">
                <i class="fas fa-edit"></i> বিবরণ
            </h3>
            
            <div class="form-group">
                <label for="title">শিরোনাম *</label>
                <input type="text" id="title" name="title" 
                    value="{{ old('title') }}"
                    placeholder="কার্যক্রমের শিরোনাম লিখুন" required>
            </div>

            <div class="form-group">
                <label for="description">বিবরণ</label>
                <textarea id="description" name="description" 
                    placeholder="কার্যক্রম সম্পর্কে বিস্তারিত লিখুন (ঐচ্ছিক)">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="category">ক্যাটাগরি *</label>
                <select id="category" name="category" required>
                    <option value="">ক্যাটাগরি নির্বাচন করুন</option>
                    <option value="social" {{ old('category') == 'social' ? 'selected' : '' }}>সামাজিক কাজ</option>
                    <option value="health" {{ old('category') == 'health' ? 'selected' : '' }}>স্বাস্থ্যসেবা</option>
                    <option value="education" {{ old('category') == 'education' ? 'selected' : '' }}>শিক্ষা</option>
                    <option value="events" {{ old('category') == 'events' ? 'selected' : '' }}>অনুষ্ঠান</option>
                </select>
            </div>

            <div class="form-group">
                <label for="order">ক্রম (অগ্রাধিকার)</label>
                <input type="number" id="order" name="order" 
                    value="{{ old('order', 0) }}"
                    placeholder="0" min="0">
                <small style="color: #64748b; display: block; margin-top: 0.25rem;">
                    কম সংখ্যা = বেশি অগ্রাধিকার (০ সবচেয়ে উপরে দেখাবে)
                </small>
            </div>

            <div class="checkbox-container">
                <input type="checkbox" id="active" name="active" value="1" 
                    {{ old('active', true) ? 'checked' : '' }}>
                <label for="active" style="margin-bottom: 0;">সক্রিয় রাখুন</label>
            </div>
        </div>

        <div class="btn-section">
            <a href="{{ route('admin.activities.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> ফিরে যান
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> সংরক্ষণ করুন
            </button>
        </div>
    </form>

    <script>
        // Image preview functionality
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('imagePreview');
                    const img = document.getElementById('previewImg');
                    img.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection