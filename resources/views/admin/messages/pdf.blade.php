<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>বার্তা তালিকা - {{ date('d/m/Y') }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Noto Sans Bengali', sans-serif;
            background: #f8fafc;
            padding: 2rem;
            color: #1e293b;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid #667eea;
        }

        .header h1 {
            font-size: 1.8rem;
            color: #667eea;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: #64748b;
            font-size: 0.95rem;
        }

        .stats {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            justify-content: center;
        }

        .stat-box {
            background: white;
            padding: 1rem 2rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .stat-box .number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #667eea;
        }

        .stat-box .label {
            font-size: 0.85rem;
            color: #64748b;
        }

        .messages-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .messages-table th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem;
            text-align: right;
            font-weight: 600;
        }

        .messages-table th:first-child {
            text-align: center;
        }

        .messages-table td {
            padding: 1rem;
            border-bottom: 1px solid #e2e8f0;
            text-align: right;
            vertical-align: top;
        }

        .messages-table td:first-child {
            text-align: center;
        }

        .messages-table tr:nth-child(even) {
            background: #f8fafc;
        }

        .messages-table tr:hover {
            background: #f0f9ff;
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-read {
            background: #d1fae5;
            color: #065f46;
        }

        .status-unread {
            background: #fee2e2;
            color: #991b1b;
        }

        .message-text {
            max-width: 300px;
            word-wrap: break-word;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 0.85rem;
        }

        .print-btn {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 30px;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            font-family: 'Noto Sans Bengali', sans-serif;
        }

        .print-btn:hover {
            transform: translateY(-2px);
        }

        @media print {
            .print-btn {
                display: none;
            }
            
            body {
                padding: 1rem;
            }
            
            .messages-table th {
                background: #667eea !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📧 বার্তা তালিকা</h1>
        <p>রপ্তানির তারিখ: {{ date('d M, Y - h:i A') }}</p>
    </div>

    <div class="stats">
        <div class="stat-box">
            <div class="number">{{ $messages->count() }}</div>
            <div class="label">মোট বার্তা</div>
        </div>
        <div class="stat-box">
            <div class="number">{{ $messages->where('is_read', false)->count() }}</div>
            <div class="label">অপঠিত</div>
        </div>
        <div class="stat-box">
            <div class="number">{{ $messages->where('is_read', true)->count() }}</div>
            <div class="label">পঠিত</div>
        </div>
    </div>

    <table class="messages-table">
        <thead>
            <tr>
                <th>#</th>
                <th>নাম</th>
                <th>যোগাযোগ</th>
                <th>বিষয়</th>
                <th>বার্তা</th>
                <th>স্ট্যাটাস</th>
                <th>তারিখ</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $index => $message)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><strong>{{ $message->name }}</strong></td>
                <td>
                    @if($message->email)
                        📧 {{ $message->email }}<br>
                    @endif
                    @if($message->phone)
                        📞 {{ $message->phone }}
                    @endif
                    @if(!$message->email && !$message->phone)
                        -
                    @endif
                </td>
                <td>
                    @switch($message->subject)
                        @case('general') সাধারণ অনুসন্ধান @break
                        @case('support') সহায়তা অনুরোধ @break
                        @case('feedback') মতামত ও পরামর্শ @break
                        @case('volunteer') স্বেচ্ছাসেবক হতে চাই @break
                        @case('other') অন্যান্য @break
                        @default {{ $message->subject ?? '-' }}
                    @endswitch
                </td>
                <td class="message-text">{{ Str::limit($message->message, 100) }}</td>
                <td>
                    <span class="status-badge {{ $message->is_read ? 'status-read' : 'status-unread' }}">
                        {{ $message->is_read ? 'পঠিত' : 'অপঠিত' }}
                    </span>
                </td>
                <td>{{ $message->created_at->format('d/m/Y') }}<br>{{ $message->created_at->format('h:i A') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 2rem;">কোনো বার্তা নেই</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>© {{ date('Y') }} - এই রিপোর্টটি সিস্টেম থেকে স্বয়ংক্রিয়ভাবে তৈরি করা হয়েছে</p>
    </div>

    <button class="print-btn" onclick="window.print()">
        🖨️ প্রিন্ট / PDF সংরক্ষণ
    </button>
</body>
</html>
