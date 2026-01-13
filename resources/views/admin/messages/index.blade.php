@extends('layouts.admin')

@section('title', 'বার্তা সমূহ')

@section('content')
<div class="content-header">
    <div class="header-top">
        <div>
            <h1><i class="fas fa-envelope"></i> বার্তা সমূহ</h1>
            <p>ভিজিটরদের থেকে প্রাপ্ত সকল বার্তা</p>
        </div>
        <div class="export-buttons">
            <a href="{{ route('admin.messages.export-csv') }}" class="btn-export btn-csv">
                <i class="fas fa-file-csv"></i> CSV
            </a>
            <a href="{{ route('admin.messages.export-pdf') }}" target="_blank" class="btn-export btn-pdf">
                <i class="fas fa-file-pdf"></i> PDF
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@endif

<div class="messages-stats">
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-envelope"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ $messages->total() }}</span>
            <span class="stat-label">মোট বার্তা</span>
        </div>
    </div>
    <div class="stat-card unread">
        <div class="stat-icon"><i class="fas fa-envelope-open"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ $unreadCount }}</span>
            <span class="stat-label">অপঠিত</span>
        </div>
    </div>
    @if($unreadCount > 0)
    <form action="{{ route('admin.messages.mark-all-read') }}" method="POST" style="margin-left: auto;">
        @csrf
        <button type="submit" class="btn-mark-all">
            <i class="fas fa-check-double"></i> সব পঠিত করুন
        </button>
    </form>
    @endif
</div>

<div class="messages-list">
    @forelse($messages as $message)
    <div class="message-card {{ !$message->is_read ? 'unread' : '' }}">
        <div class="message-header">
            <div class="sender-info">
                <div class="sender-avatar">
                    {{ strtoupper(substr($message->name, 0, 1)) }}
                </div>
                <div class="sender-details">
                    <h3>{{ $message->name }}</h3>
                    <div class="sender-contact">
                        @if($message->email)
                            <span><i class="fas fa-envelope"></i> {{ $message->email }}</span>
                        @endif
                        @if($message->phone)
                            <span><i class="fas fa-phone"></i> {{ $message->phone }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="message-meta">
                @if(!$message->is_read)
                    <span class="badge-unread">অপঠিত</span>
                @endif
                <span class="message-date">
                    <i class="fas fa-clock"></i> 
                    {{ $message->created_at->diffForHumans() }}
                </span>
            </div>
        </div>
        
        @if($message->subject)
        <div class="message-subject">
            <strong>বিষয়:</strong> 
            @switch($message->subject)
                @case('general') সাধারণ অনুসন্ধান @break
                @case('support') সহায়তা অনুরোধ @break
                @case('feedback') মতামত ও পরামর্শ @break
                @case('volunteer') স্বেচ্ছাসেবক হতে চাই @break
                @case('other') অন্যান্য @break
                @default {{ $message->subject }}
            @endswitch
        </div>
        @endif
        
        <div class="message-body">
            {{ Str::limit($message->message, 200) }}
        </div>
        
        <div class="message-actions">
            <a href="{{ route('admin.messages.show', $message) }}" class="btn-view">
                <i class="fas fa-eye"></i> বিস্তারিত দেখুন
            </a>
            @if(!$message->is_read)
            <form action="{{ route('admin.messages.mark-read', $message) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-mark-read">
                    <i class="fas fa-check"></i> পঠিত করুন
                </button>
            </form>
            @endif
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" style="display: inline;" 
                  onsubmit="return confirm('আপনি কি এই বার্তাটি মুছে ফেলতে চান?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">
                    <i class="fas fa-trash"></i> মুছুন
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="no-messages">
        <i class="fas fa-inbox"></i>
        <h3>কোনো বার্তা নেই</h3>
        <p>এখনও কোনো বার্তা পাওয়া যায়নি।</p>
    </div>
    @endforelse
</div>

@if($messages->hasPages())
<div class="pagination-wrapper">
    {{ $messages->links() }}
</div>
@endif

<style>
.content-header {
    margin-bottom: 2rem;
}

.header-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 1rem;
}

.export-buttons {
    display: flex;
    gap: 0.75rem;
}

.btn-export {
    padding: 0.6rem 1.2rem;
    border-radius: 10px;
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s;
    font-family: 'Noto Sans Bengali', sans-serif;
}

.btn-csv {
    background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
    color: white;
}

.btn-csv:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
}

.btn-pdf {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
}

.btn-pdf:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(239, 68, 68, 0.4);
}

.content-header h1 {
    font-size: 1.8rem;
    color: #1e293b;
    margin-bottom: 0.5rem;
}

.content-header h1 i {
    color: #667eea;
    margin-right: 0.5rem;
}

.content-header p {
    color: #64748b;
}

.alert {
    padding: 1rem 1.5rem;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.alert-success {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    border: 1px solid #6ee7b7;
    color: #065f46;
}

.messages-stats {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    align-items: center;
}

.stat-card {
    background: white;
    padding: 1.5rem;
    border-radius: 15px;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(102, 126, 234, 0.1);
}

.stat-card.unread {
    border-color: #f59e0b;
}

.stat-card.unread .stat-icon {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
}

.stat-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.3rem;
}

.stat-info {
    display: flex;
    flex-direction: column;
}

.stat-number {
    font-size: 1.8rem;
    font-weight: 700;
    color: #1e293b;
}

.stat-label {
    font-size: 0.9rem;
    color: #64748b;
}

.btn-mark-all {
    padding: 0.75rem 1.5rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.3s;
    font-family: 'Noto Sans Bengali', sans-serif;
}

.btn-mark-all:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
}

.messages-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.message-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(102, 126, 234, 0.1);
    transition: all 0.3s;
}

.message-card:hover {
    transform: translateX(5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.message-card.unread {
    border-left: 4px solid #667eea;
    background: linear-gradient(90deg, rgba(102, 126, 234, 0.05) 0%, white 100%);
}

.message-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.sender-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.sender-avatar {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.3rem;
    font-weight: 600;
}

.sender-details h3 {
    font-size: 1.1rem;
    color: #1e293b;
    margin-bottom: 0.25rem;
}

.sender-contact {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.sender-contact span {
    font-size: 0.85rem;
    color: #64748b;
}

.sender-contact i {
    margin-right: 0.25rem;
    color: #667eea;
}

.message-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.badge-unread {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

.message-date {
    font-size: 0.85rem;
    color: #64748b;
}

.message-subject {
    background: #f8fafc;
    padding: 0.75rem 1rem;
    border-radius: 8px;
    margin-bottom: 1rem;
    font-size: 0.95rem;
    color: #475569;
}

.message-body {
    color: #475569;
    line-height: 1.7;
    margin-bottom: 1rem;
}

.message-actions {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
    padding-top: 1rem;
    border-top: 1px solid #e2e8f0;
}

.btn-view, .btn-mark-read, .btn-delete {
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-size: 0.85rem;
    cursor: pointer;
    transition: all 0.3s;
    text-decoration: none;
    font-family: 'Noto Sans Bengali', sans-serif;
    border: none;
}

.btn-view {
    background: #f0f9ff;
    color: #0369a1;
}

.btn-view:hover {
    background: #e0f2fe;
}

.btn-mark-read {
    background: #f0fdf4;
    color: #16a34a;
}

.btn-mark-read:hover {
    background: #dcfce7;
}

.btn-delete {
    background: #fef2f2;
    color: #dc2626;
}

.btn-delete:hover {
    background: #fee2e2;
}

.no-messages {
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.no-messages i {
    font-size: 4rem;
    color: #cbd5e1;
    margin-bottom: 1rem;
}

.no-messages h3 {
    color: #475569;
    margin-bottom: 0.5rem;
}

.no-messages p {
    color: #94a3b8;
}

.pagination-wrapper {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
}

@media (max-width: 768px) {
    .messages-stats {
        flex-direction: column;
        align-items: stretch;
    }

    .btn-mark-all {
        margin-left: 0;
        width: 100%;
    }

    .message-header {
        flex-direction: column;
    }

    .message-actions {
        flex-direction: column;
    }

    .message-actions button,
    .message-actions a {
        width: 100%;
        text-align: center;
    }
}
</style>
@endsection
