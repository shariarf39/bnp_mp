@extends('layouts.admin')

@section('title', 'হিরো স্লাইড ম্যানেজমেন্ট')
@section('page-title', 'হিরো স্লাইড ম্যানেজমেন্ট')

@section('top-actions')
    <a href="{{ route('admin.hero-slides.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> নতুন স্লাইড
    </a>
@endsection

@section('styles')
<style>
    .slide-img {
        width: 100px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
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
        min-width: 800px;
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
    .slide-title {
        max-width: 250px;
    }
    .slide-title strong {
        display: block;
        margin-bottom: 0.25rem;
    }
    .slide-title small {
        color: #64748b;
        display: block;
        line-height: 1.4;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .card {
            margin: 0;
            border-radius: 8px;
        }
        table {
            min-width: 700px;
        }
        th, td {
            padding: 0.75rem 0.5rem;
            font-size: 0.875rem;
        }
        .slide-img {
            width: 80px;
            height: 50px;
        }
        .slide-title {
            max-width: 200px;
        }
        .actions {
            flex-direction: column;
            gap: 0.25rem;
        }
        .actions .btn {
            width: 100%;
            justify-content: center;
        }
        .badge {
            font-size: 0.75rem;
            padding: 0.2rem 0.5rem;
        }
    }

    @media (max-width: 480px) {
        table {
            min-width: 650px;
        }
        th, td {
            padding: 0.5rem 0.4rem;
            font-size: 0.8rem;
        }
        .slide-img {
            width: 60px;
            height: 40px;
        }
        .slide-title {
            max-width: 150px;
            font-size: 0.8rem;
        }
    }
</style>
@endsection

@section('content')
    <div class="card">
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
                    @forelse($slides as $slide)
                    <tr>
                        <td>{{ $slide->id }}</td>
                        <td>
                            <img src="{{ asset('storage/app/public/' . $slide->image) }}" alt="{{ $slide->title }}" class="slide-img">
                        </td>
                        <td>
                            <div class="slide-title">
                                <strong>{{ $slide->title }}</strong>
                                @if($slide->subtitle)
                                <small>{{ Str::limit($slide->subtitle, 50) }}</small>
                                @endif
                            </div>
                        </td>
                        <td>{{ $slide->order }}</td>
                        <td>
                            @if($slide->active)
                                <span class="badge badge-success">সক্রিয়</span>
                            @else
                                <span class="badge badge-danger">নিষ্ক্রিয়</span>
                            @endif
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('admin.hero-slides.edit', $slide) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-edit"></i> এডিট
                                </a>
                                <form action="{{ route('admin.hero-slides.destroy', $slide) }}" method="POST" onsubmit="return confirm('আপনি কি নিশ্চিত?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> মুছুন
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 3rem; color: #64748b;">
                            <i class="fas fa-image" style="font-size: 3rem; opacity: 0.3;"></i>
                            <p style="margin-top: 1rem;">কোন স্লাইড পাওয়া যায়নি</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
