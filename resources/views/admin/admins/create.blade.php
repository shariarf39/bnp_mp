@extends('layouts.admin')

@section('content')
<div class="content-header">
    <h1>নতুন অ্যাডমিন যোগ করুন</h1>
    <a href="{{ route('admin.admins.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> ফিরে যান
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.admins.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">নাম *</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       class="form-control @error('name') is-invalid @enderror" 
                       value="{{ old('name') }}" 
                       required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">ইমেইল *</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       value="{{ old('email') }}" 
                       required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">পাসওয়ার্ড *</label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       required>
                <small class="form-text">কমপক্ষে ৬ অক্ষরের হতে হবে</small>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">পাসওয়ার্ড নিশ্চিত করুন *</label>
                <input type="password" 
                       id="password_confirmation" 
                       name="password_confirmation" 
                       class="form-control" 
                       required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> সংরক্ষণ করুন
                </button>
                <a href="{{ route('admin.admins.index') }}" class="btn btn-secondary">
                    বাতিল করুন
                </a>
            </div>
        </form>
    </div>
</div>

<style>
.content-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.card-body {
    padding: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #333;
}

.form-control {
    width: 100%;
    padding: 0.75rem;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s;
}

.form-control:focus {
    outline: none;
    border-color: #667eea;
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    display: block;
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.form-text {
    display: block;
    color: #6c757d;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}
</style>
@endsection
