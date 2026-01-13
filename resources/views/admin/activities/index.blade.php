@extends('layouts.admin')

@section('title', 'কার্যক্রম ছবি ম্যানেজমেন্ট')
@section('page-title', 'কার্যক্রম ছবি ম্যানেজমেন্ট')

@section('styles')
<style>
    .activities-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-top: 1.5rem;
    }
    .activity-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
    }
    .activity-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }
    .activity-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
    }
    .activity-content {
        padding: 1.5rem;
    }
    .activity-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #1e293b;
    }
    .activity-description {
        color: #64748b;
        margin-bottom: 1rem;
        font-size: 0.9rem;
    }
    .activity-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    .category-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    .category-social { background: #e3f2fd; color: #1976d2; }
    .category-health { background: #e8f5e8; color: #2e7d32; }
    .category-education { background: #fff3e0; color: #f57c00; }
    .category-events { background: #fce4ec; color: #c2185b; }
    .order-badge {
        background: #f1f5f9;
        color: #64748b;
        padding: 0.25rem 0.5rem;
        border-radius: 10px;
        font-size: 0.8rem;
    }
    .activity-actions {
        display: flex;
        gap: 0.5rem;
    }
    .btn-sm {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        border-radius: 8px;
    }
    .btn-edit {
        background: #667eea;
        color: white;
        border: none;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }
    .btn-delete {
        background: #ef4444;
        color: white;
        border: none;
    }
    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    .status-active { background: #dcfce7; color: #166534; }
    .status-inactive { background: #fee2e2; color: #dc2626; }
    .add-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1rem 2rem;
        border-radius: 12px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        transition: all 0.3s;
    }
    .add-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }
</style>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3>কার্যক্রম ছবি তালিকা</h3>
            <p class="text-muted">সব কার্যক্রম ছবি দেখুন এবং পরিচালনা করুন</p>
        </div>
        <a href="{{ route('admin.activities.create') }}" class="add-btn">
            <i class="fas fa-plus"></i>
            নতুন ছবি যুক্ত করুন
        </a>
    </div>

    @if($activities->count() > 0)
        <div class="activities-grid">
            @foreach($activities as $activity)
                <div class="activity-card">
                    @if($activity->image)
                        <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}" class="activity-image">
                    @else
                        <div class="activity-image">
                            <i class="fas fa-image"></i>
                        </div>
                    @endif
                    
                    <div class="activity-content">
                        <h4 class="activity-title">{{ $activity->title }}</h4>
                        @if($activity->description)
                            <p class="activity-description">{{ Str::limit($activity->description, 100) }}</p>
                        @endif
                        
                        <div class="activity-meta">
                            <span class="category-badge category-{{ $activity->category }}">
                                @switch($activity->category)
                                    @case('social')
                                        <i class="fas fa-heart"></i> সামাজিক কাজ
                                        @break
                                    @case('health')
                                        <i class="fas fa-medkit"></i> স্বাস্থ্যসেবা
                                        @break
                                    @case('education')
                                        <i class="fas fa-graduation-cap"></i> শিক্ষা
                                        @break
                                    @case('events')
                                        <i class="fas fa-calendar"></i> অনুষ্ঠান
                                        @break
                                @endswitch
                            </span>
                            <span class="order-badge">ক্রম: {{ $activity->order }}</span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="status-badge {{ $activity->active ? 'status-active' : 'status-inactive' }}">
                                {{ $activity->active ? 'সক্রিয়' : 'নিষ্ক্রিয়' }}
                            </span>
                            
                            <div class="activity-actions">
                                <a href="{{ route('admin.activities.edit', $activity) }}" class="btn btn-edit btn-sm">
                                    <i class="fas fa-edit"></i> সম্পাদনা
                                </a>
                                <form action="{{ route('admin.activities.destroy', $activity) }}" method="POST" 
                                      style="display: inline;" onsubmit="return confirm('আপনি কি নিশ্চিত?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm">
                                        <i class="fas fa-trash"></i> মুছুন
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <div class="mb-3">
                <i class="fas fa-images" style="font-size: 4rem; color: #e2e8f0;"></i>
            </div>
            <h4 class="text-muted">কোনো কার্যক্রম ছবি নেই</h4>
            <p class="text-muted mb-4">প্রথম কার্যক্রম ছবি যুক্ত করুন</p>
            <a href="{{ route('admin.activities.create') }}" class="add-btn">
                <i class="fas fa-plus"></i>
                নতুন ছবি যুক্ত করুন
            </a>
        </div>
    @endif
@endsection