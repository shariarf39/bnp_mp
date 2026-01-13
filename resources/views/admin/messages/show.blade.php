@extends('layouts.admin')

@section('title', 'বার্তা বিস্তারিত')

@section('content')
<div class="content-header">
    <a href="{{ route('admin.messages.index') }}" class="back-link">
        <i class="fas fa-arrow-left"></i> বার্তা তালিকায় ফিরে যান
    </a>
    <h1><i class="fas fa-envelope-open-text"></i> বার্তা বিস্তারিত</h1>
</div>

<div class="message-detail-card">
    <div class="message-detail-header">
        <div class="sender-info-detail">
            <div class="sender-avatar-large">
                {{ strtoupper(substr($message->name, 0, 1)) }}
            </div>
            <div class="sender-details-main">
                <h2>{{ $message->name }}</h2>
                <div class="sender-contact-info">
                    @if($message->email)
                        <a href="mailto:{{ $message->email }}" class="contact-item">
                            <i class="fas fa-envelope"></i> {{ $message->email }}
                        </a>
                    @endif
                    @if($message->phone)
                        <a href="tel:{{ $message->phone }}" class="contact-item">
                            <i class="fas fa-phone"></i> {{ $message->phone }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="message-timestamp">
            <i class="fas fa-calendar-alt"></i>
            {{ $message->created_at->format('d M, Y') }}
            <br>
            <i class="fas fa-clock"></i>
            {{ $message->created_at->format('h:i A') }}
        </div>
    </div>

    @if($message->subject)
    <div class="message-subject-detail">
        <strong><i class="fas fa-tag"></i> বিষয়:</strong> 
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

    <div class="message-content">
        <h3><i class="fas fa-comment-dots"></i> বার্তা</h3>
        <div class="message-text">
            {!! nl2br(e($message->message)) !!}
        </div>
    </div>

    <div class="message-detail-actions">
        @if($message->email)
        <a href="mailto:{{ $message->email }}" class="btn-reply">
            <i class="fas fa-reply"></i> উত্তর দিন
        </a>
        @endif
        @if($message->phone)
        <a href="tel:{{ $message->phone }}" class="btn-call">
            <i class="fas fa-phone"></i> কল করুন
        </a>
        @endif
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" style="display: inline;"
              onsubmit="return confirm('আপনি কি এই বার্তাটি মুছে ফেলতে চান?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete-large">
                <i class="fas fa-trash"></i> মুছে ফেলুন
            </button>
        </form>
    </div>
</div>

<style>
.content-header {
    margin-bottom: 2rem;
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #667eea;
    text-decoration: none;
    margin-bottom: 1rem;
    font-size: 0.95rem;
    transition: all 0.3s;
}

.back-link:hover {
    color: #764ba2;
    transform: translateX(-5px);
}

.content-header h1 {
    font-size: 1.8rem;
    color: #1e293b;
}

.content-header h1 i {
    color: #667eea;
    margin-right: 0.5rem;
}

.message-detail-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(102, 126, 234, 0.1);
}

.message-detail-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #e2e8f0;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
    gap: 1.5rem;
}

.sender-info-detail {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.sender-avatar-large {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
    font-weight: 600;
}

.sender-details-main h2 {
    font-size: 1.5rem;
    color: #1e293b;
    margin-bottom: 0.5rem;
}

.sender-contact-info {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.contact-item {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #667eea;
    text-decoration: none;
    font-size: 0.95rem;
    transition: all 0.3s;
}

.contact-item:hover {
    color: #764ba2;
}

.contact-item i {
    width: 20px;
}

.message-timestamp {
    text-align: right;
    color: #64748b;
    font-size: 0.9rem;
    line-height: 1.8;
}

.message-timestamp i {
    margin-right: 0.25rem;
    color: #667eea;
}

.message-subject-detail {
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
    padding: 1rem 1.5rem;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    font-size: 1rem;
    color: #0369a1;
}

.message-subject-detail i {
    margin-right: 0.5rem;
}

.message-content {
    margin-bottom: 2rem;
}

.message-content h3 {
    font-size: 1.1rem;
    color: #475569;
    margin-bottom: 1rem;
}

.message-content h3 i {
    color: #667eea;
    margin-right: 0.5rem;
}

.message-text {
    background: #f8fafc;
    padding: 1.5rem;
    border-radius: 15px;
    color: #334155;
    line-height: 1.9;
    font-size: 1.05rem;
    border-left: 4px solid #667eea;
}

.message-detail-actions {
    display: flex;
    gap: 1rem;
    padding-top: 1.5rem;
    border-top: 1px solid #e2e8f0;
    flex-wrap: wrap;
}

.btn-reply, .btn-call, .btn-delete-large {
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s;
    text-decoration: none;
    font-family: 'Noto Sans Bengali', sans-serif;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    border: none;
}

.btn-reply {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.btn-reply:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
}

.btn-call {
    background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
    color: white;
}

.btn-call:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
}

.btn-delete-large {
    background: #fef2f2;
    color: #dc2626;
}

.btn-delete-large:hover {
    background: #fee2e2;
}

@media (max-width: 768px) {
    .message-detail-header {
        flex-direction: column;
    }

    .sender-info-detail {
        flex-direction: column;
        text-align: center;
    }

    .sender-contact-info {
        align-items: center;
    }

    .message-timestamp {
        text-align: center;
        width: 100%;
    }

    .message-detail-actions {
        flex-direction: column;
    }

    .message-detail-actions a,
    .message-detail-actions button {
        width: 100%;
        justify-content: center;
    }
}
</style>
@endsection
