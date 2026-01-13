@extends('layouts.admin')

@section('title', 'স্লাইড এডিট করুন')
@section('page-title', 'স্লাইড এডিট করুন')

@section('top-actions')
    <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> ফিরে যান
    </a>
@endsection

@section('styles')
<style>
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
    input[type="number"],
    input[type="file"] {
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
        min-height: 100px;
        resize: vertical;
    }
    .checkbox-wrapper {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    input[type="checkbox"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    .error {
        color: #ef4444;
        font-size: 0.9rem;
        margin-top: 0.25rem;
    }
    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }
    .current-image {
        margin-top: 1rem;
    }
    .current-image img {
        max-width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
    }
    .image-preview {
        margin-top: 1rem;
        display: none;
    }
    .image-preview img {
        max-width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
    }
    .note {
        color: #64748b;
        font-size: 0.9rem;
        margin-top: 0.5rem;
    }
</style>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.hero-slides.update', $slide) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="image">ছবি</label>
                    <div class="current-image">
                        <p style="color: #64748b; margin-bottom: 0.5rem;">বর্তমান ছবি:</p>
                        <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->image }}">
                    </div>
                    <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)" style="margin-top: 1rem;">
                    <p class="note">নতুন ছবি আপলোড করতে চাইলে নির্বাচন করুন, না হলে খালি রাখুন</p>
                    @error('image')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <div class="image-preview" id="imagePreview">
                        <p style="color: #64748b; margin-bottom: 0.5rem;">নতুন ছবি:</p>
                        <img id="preview" src="" alt="Preview">
                    </div>
                </div>

                <div class="form-group">
                    <label for="order">ক্রম</label>
                    <input type="number" id="order" name="order" value="{{ old('order', $slide->order) }}" min="0">
                    @error('order')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="active" name="active" value="1" {{ old('active', $slide->active) ? 'checked' : '' }}>
                        <label for="active" style="margin-bottom: 0;">সক্রিয়</label>
                    </div>
                    @error('active')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> আপডেট করুন
                    </button>
                    <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> বাতিল
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function previewImage(event) {
        const preview = document.getElementById('imagePreview');
        const img = document.getElementById('preview');
        const file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    }
</script>
@endsection
