@extends('layouts.admin')

@section('content')
<div class="admin-management-page">
    <div class="content-header">
        <div>
            <h1><i class="fas fa-users-cog"></i> অ্যাডমিন ব্যবস্থাপনা</h1>
            <p class="subtitle">সিস্টেম অ্যাডমিনিস্ট্রেটর পরিচালনা করুন</p>
        </div>
        <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> নতুন অ্যাডমিন
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <div class="stats-cards">
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <h3>{{ $admins->total() }}</h3>
                <p>মোট অ্যাডমিন</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="stat-content">
                <h3>{{ auth()->user()->name }}</h3>
                <p>বর্তমান অ্যাডমিন</p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-list"></i> অ্যাডমিন তালিকা</h2>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>নাম</th>
                        <th>ইমেইল</th>
                        <th>তৈরি হয়েছে</th>
                        <th style="text-align: center;">অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admins as $admin)
                        <tr>
                            <td>
                                <div class="admin-name">
                                    <div class="avatar">
                                        {{ strtoupper(substr($admin->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <strong>{{ $admin->name }}</strong>
                                        @if($admin->id === auth()->id())
                                            <span class="badge badge-you">আপনি</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="email-cell">
                                    <i class="fas fa-envelope"></i>
                                    {{ $admin->email }}
                                </div>
                            </td>
                            <td>
                                <div class="date-cell">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $admin->created_at->format('d M Y') }}
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.admins.edit', $admin) }}" class="btn btn-edit" title="সম্পাদনা">
                                        <i class="fas fa-edit"></i> সম্পাদনা
                                    </a>
                                    @if($admin->id !== auth()->id())
                                        <form action="{{ route('admin.admins.destroy', $admin) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('আপনি কি নিশ্চিত এই অ্যাডমিন মুছে ফেলতে চান?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete" title="মুছুন">
                                                <i class="fas fa-trash-alt"></i> মুছুন
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-disabled" disabled title="নিজেকে মুছতে পারবেন না">
                                            <i class="fas fa-ban"></i> মুছুন
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty-state">
                                <i class="fas fa-inbox"></i>
                                <p>কোন অ্যাডমিন পাওয়া যায়নি</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($admins->hasPages())
            <div class="pagination-wrapper">
                {{ $admins->links() }}
            </div>
        @endif
    </div>
</div>

<style>
.admin-management-page {
    padding: 1rem;
}

.content-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #e5e7eb;
}

.content-header h1 {
    font-size: 1.875rem;
    color: #1f2937;
    margin: 0 0 0.5rem 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.content-header h1 i {
    color: #667eea;
}

.subtitle {
    color: #6b7280;
    font-size: 0.95rem;
    margin: 0;
}

.stats-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 1rem;
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    color: white;
}

.stat-content h3 {
    margin: 0;
    font-size: 1.5rem;
    color: #1f2937;
}

.stat-content p {
    margin: 0.25rem 0 0;
    color: #6b7280;
    font-size: 0.875rem;
}

.card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.card-header {
    padding: 1.25rem 1.5rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-bottom: 1px solid #e5e7eb;
}

.card-header h2 {
    margin: 0;
    font-size: 1.25rem;
    color: white;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.table-responsive {
    overflow-x: auto;
}

.admin-table {
    width: 100%;
    border-collapse: collapse;
}

.admin-table thead {
    background: #f9fafb;
}

.admin-table th {
    padding: 1rem 1.5rem;
    text-align: left;
    font-weight: 600;
    color: #374151;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-bottom: 2px solid #e5e7eb;
}

.admin-table tbody tr {
    border-bottom: 1px solid #f3f4f6;
    transition: background-color 0.2s;
}

.admin-table tbody tr:hover {
    background-color: #f9fafb;
}

.admin-table td {
    padding: 1rem 1.5rem;
    color: #374151;
}

.admin-name {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 1.125rem;
}

.badge {
    display: inline-block;
    padding: 0.25rem 0.625rem;
    font-size: 0.75rem;
    border-radius: 12px;
    font-weight: 600;
    margin-left: 0.5rem;
}

.badge-you {
    background: #dbeafe;
    color: #1e40af;
}

.email-cell, .date-cell {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #6b7280;
}

.email-cell i, .date-cell i {
    color: #9ca3af;
}

.action-buttons {
    display: flex;
    gap: 0.5rem;
    justify-content: center;
}

.btn {
    padding: 0.625rem 1.25rem;
    border-radius: 8px;
    font-weight: 500;
    font-size: 0.875rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    border: none;
    cursor: pointer;
    transition: all 0.2s;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    box-shadow: 0 4px 6px rgba(102, 126, 234, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(102, 126, 234, 0.4);
}

.btn-edit {
    background: #f59e0b;
    color: white;
}

.btn-edit:hover {
    background: #d97706;
    transform: translateY(-1px);
}

.btn-delete {
    background: #ef4444;
    color: white;
}

.btn-delete:hover {
    background: #dc2626;
    transform: translateY(-1px);
}

.btn-disabled {
    background: #e5e7eb;
    color: #9ca3af;
    cursor: not-allowed;
}

.alert {
    padding: 1rem 1.25rem;
    border-radius: 10px;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.alert-success {
    background: #d1fae5;
    color: #065f46;
    border: 1px solid #a7f3d0;
}

.alert-success i {
    color: #059669;
}

.alert-error {
    background: #fee2e2;
    color: #991b1b;
    border: 1px solid #fecaca;
}

.alert-error i {
    color: #dc2626;
}

.empty-state {
    text-align: center;
    padding: 3rem 1rem !important;
    color: #9ca3af;
}

.empty-state i {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}

.empty-state p {
    margin: 0;
    font-size: 1rem;
}

.pagination-wrapper {
    padding: 1.5rem;
    display: flex;
    justify-content: center;
    border-top: 1px solid #f3f4f6;
}

@media (max-width: 768px) {
    .content-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }

    .stats-cards {
        grid-template-columns: 1fr;
    }

    .admin-table th,
    .admin-table td {
        padding: 0.75rem 1rem;
    }

    .action-buttons {
        flex-direction: column;
        gap: 0.25rem;
    }

    .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>
@endsection
