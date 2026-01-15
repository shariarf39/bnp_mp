@extends('layouts.admin')

@section('title', 'যোগাযোগ পেজ স্লাইডার')
@section('page-title', 'যোগাযোগ পেজ স্লাইডার')

@section('top-actions')
    <a href="{{ route('admin.contact-slides.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> নতুন ছবি
    </a>
@endsection

@section('styles')
<style>
    .slide-img {
        width: 120px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        white-space: nowrap;
    }
    .badge-success {
        background: #d1fae5;
        color: #065f46;
    }
    .badge-danger {
        background: #fee2e2;
        color: #991b1b;
    }
    .actions {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    form {
        display: inline;
    }
    .table-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 700px;
    }
    th, td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }
    th {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        font-weight: 600;
        white-space: nowrap;
    }
    tr:hover {
        background: #f8fafc;
    }
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #64748b;
    }
    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    .empty-state h3 {
        margin-bottom: 0.5rem;
        color: #1e293b;
    }
    .info-box {
        background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
        border-left: 4px solid #667eea;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }
    .info-box p {
        color: #3730a3;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
</style>
@endsection

@section('content')
    <div class="info-box">
        <p><i class="fas fa-info-circle"></i> এই স্লাইডারের ছবিগুলো যোগাযোগ পেজের উপরের ব্যাকগ্রাউন্ডে স্ক্রল করে দেখানো হবে।</p>
    </div>

    <div class="card">
        @if($slides->count() > 0)
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ছবি</th>
                        <th>শিরোনাম</th>
                        <th>ক্রম</th>
                        <th>স্ট্যাটাস</th>
                        <th>অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slides as $slide)
                    <tr>
                        <td>{{ $slide->id }}</td>
                        <td>
                            <img src="{{ asset('storage/app/public/' . $slide->image) }}" alt="{{ $slide->title ?? 'Slide' }}" class="slide-img">
                        </td>
                        <td>{{ $slide->title ?? '—' }}</td>
                        <td>{{ $slide->order }}</td>
                        <td>
                            @if($slide->active)
                                <span class="badge badge-success"><i class="fas fa-check"></i> সক্রিয়</span>
                            @else
                                <span class="badge badge-danger"><i class="fas fa-times"></i> নিষ্ক্রিয়</span>
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('admin.contact-slides.edit', $slide) }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-edit"></i> এডিট
                            </a>
                            <form action="{{ route('admin.contact-slides.destroy', $slide) }}" method="POST" onsubmit="return confirm('আপনি কি নিশ্চিত?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> মুছুন
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-images"></i>
            <h3>কোনো স্লাইড নেই</h3>
            <p>যোগাযোগ পেজ স্লাইডারে কোনো ছবি যুক্ত করা হয়নি।</p>
            <a href="{{ route('admin.contact-slides.create') }}" class="btn btn-primary" style="margin-top: 1rem;">
                <i class="fas fa-plus"></i> প্রথম ছবি যুক্ত করুন
            </a>
        </div>
        @endif
    </div>
@endsection
