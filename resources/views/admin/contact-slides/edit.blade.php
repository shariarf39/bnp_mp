@extends('layouts.admin')

@section('title', 'এডিট যোগাযোগ স্লাইড')
@section('page-title', 'যোগাযোগ স্লাইড এডিট করুন')

@section('top-actions')
    <a href="{{ route('admin.contact-slides.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> ফিরে যান
    </a>
@endsection

@section('styles')
<style>
    .form-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 2rem;
        max-width: 700px;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-group label {
        display: block;
        color: #1e293b;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .form-group input[type="text"],
    .form-group input[type="number"] {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s;
        font-family: 'Noto Sans Bengali', sans-serif;
    }
    .form-group input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    .current-image {
        max-width: 300px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 1rem;
    }
    .image-upload-area {
        border: 2px dashed #cbd5e0;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        background: #f8fafc;
    }
    .image-upload-area:hover {
        border-color: #667eea;
        background: #f0f4ff;
    }
    .image-upload-area i {
        font-size: 3rem;
        color: #667eea;
        margin-bottom: 1rem;
    }
    .image-upload-area p {
        color: #64748b;
        margin: 0;
    }
    .image-upload-area input[type="file"] {
        display: none;
    }
    .image-preview {
        max-width: 100%;
        max-height: 300px;
        border-radius: 10px;
        margin-top: 1rem;
        display: none;
    }
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .checkbox-group input[type="checkbox"] {
        width: 20px;
        height: 20px;
        accent-color: #667eea;
    }
    .form-hint {
        font-size: 0.85rem;
        color: #64748b;
        margin-top: 0.25rem;
    }
</style>
@endsection

@section('content')
    <div class="form-card">
        @if($errors->any())
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <div>
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </div>
        @endif

        <form action="{{ route('admin.contact-slides.update', $slide) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label><i class="fas fa-image"></i> বর্তমান ছবি</label>
                <img src="{{ asset('storage/app/public/' . $slide->image) }}" alt="{{ $slide->title }}" class="current-image">
            </div>

            <div class="form-group">
                <label><i class="fas fa-upload"></i> নতুন ছবি (ঐচ্ছিক)</label>
                <div class="image-upload-area" onclick="document.getElementById('image').click()">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>নতুন ছবি আপলোড করতে ক্লিক করুন</p>
                    <p class="form-hint">সর্বোচ্চ ২০ MB (JPG, PNG, GIF, WEBP)</p>
                    <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this)">
                    <img id="imagePreview" class="image-preview">
                </div>
            </div>

            <div class="form-group">
                <label for="title"><i class="fas fa-heading"></i> শিরোনাম (ঐচ্ছিক)</label>
                <input type="text" id="title" name="title" value="{{ old('title', $slide->title) }}" placeholder="ছবির শিরোনাম">
                <p class="form-hint">এটি শুধুমাত্র অ্যাডমিনের জন্য রেফারেন্স হিসেবে ব্যবহৃত হবে</p>
            </div>

            <div class="form-group">
                <label for="order"><i class="fas fa-sort-numeric-up"></i> ক্রম</label>
                <input type="number" id="order" name="order" value="{{ old('order', $slide->order) }}" min="0">
                <p class="form-hint">ছোট সংখ্যা আগে দেখানো হবে</p>
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="active" name="active" value="1" {{ old('active', $slide->active) ? 'checked' : '' }}>
                    <label for="active" style="margin-bottom: 0;">সক্রিয় করুন</label>
                </div>
                <p class="form-hint">নিষ্ক্রিয় স্লাইড পেজে দেখানো হবে না</p>
            </div>

            <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> আপডেট করুন
                </button>
                <a href="{{ route('admin.contact-slides.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> বাতিল
                </a>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('imagePreview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
