<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'অ্যাডমিন প্যানেল')</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Noto Sans Bengali', sans-serif;
            background: #f8fafc;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s;
            z-index: 1000;
        }
        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .sidebar-header h2 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .sidebar-header p {
            color: #94a3b8;
            font-size: 0.9rem;
        }
        .sidebar-menu {
            padding: 1rem 0;
        }
        .menu-section {
            margin-bottom: 1.5rem;
        }
        .menu-label {
            color: #64748b;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
        }
        .menu-item {
            display: flex;
            align-items: center;
            padding: 0.875rem 1.5rem;
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
        }
        .menu-item:hover {
            background: rgba(102, 126, 234, 0.1);
            color: white;
        }
        .menu-item.active {
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.2) 0%, transparent 100%);
            color: white;
            border-left: 3px solid #667eea;
        }
        .menu-item i {
            width: 24px;
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }
        .main-content {
            margin-left: 280px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .top-bar {
            background: white;
            padding: 1rem 2rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        .top-bar h1 {
            color: #1e293b;
            font-size: 1.5rem;
        }
        .top-bar-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }
        .btn-secondary {
            background: #e2e8f0;
            color: #475569;
        }
        .btn-secondary:hover {
            background: #cbd5e1;
        }
        .btn-danger {
            background: #ef4444;
            color: white;
        }
        .btn-danger:hover {
            background: #dc2626;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }
        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
        .content-area {
            padding: 2rem;
            flex: 1;
        }
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border-left: 4px solid #10b981;
        }
        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }
        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        .card-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-header h3 {
            color: #1e293b;
            font-size: 1.25rem;
        }
        .card-body {
            padding: 1.5rem;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(102, 126, 234, 0.2);
        }
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        .stat-info h4 {
            color: #64748b;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }
        .stat-info p {
            color: #1e293b;
            font-size: 1.75rem;
            font-weight: 700;
        }
        .toggle-sidebar {
            display: none;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 0.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.2rem;
            width: 40px;
            height: 40px;
        }
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -280px;
            }
            .sidebar.active {
                margin-left: 0;
            }
            .main-content {
                margin-left: 0;
            }
            .toggle-sidebar {
                display: block;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-shield-alt"></i> অ্যাডমিন</h2>
            <p>ড্যাশবোর্ড ম্যানেজমেন্ট</p>
        </div>
        <nav class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-label">ড্যাশবোর্ড</div>
                <a href="{{ route('admin.hero-slides.index') }}" class="menu-item {{ request()->routeIs('admin.hero-slides.*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i>
                    <span>স্লাইডার ইমেজ</span>
                </a>
                <a href="{{ route('admin.activities.index') }}" class="menu-item {{ request()->routeIs('admin.activities.*') ? 'active' : '' }}">
                    <i class="fas fa-camera"></i>
                    <span>কার্যক্রম ছবি</span>
                </a>
                <a href="{{ route('admin.content.index') }}" class="menu-item {{ request()->routeIs('admin.content.*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i>
                    <span>কন্টেন্ট ম্যানেজমেন্ট</span>
                </a>
            </div>
            <div class="menu-section">
                <div class="menu-label">পেজ সেকশন</div>
                <a href="{{ route('admin.goals.index') }}" class="menu-item {{ request()->routeIs('admin.goals.*') ? 'active' : '' }}">
                    <i class="fas fa-bullseye"></i>
                    <span>লক্ষ্য সেকশন</span>
                </a>
                <a href="{{ route('admin.leader.index') }}" class="menu-item {{ request()->routeIs('admin.leader.*') ? 'active' : '' }}">
                    <i class="fas fa-user-tie"></i>
                    <span>নেতা সেকশন</span>
                </a>
                <a href="{{ route('admin.about.index') }}" class="menu-item {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                    <i class="fas fa-address-card"></i>
                    <span>আমার সম্পর্কে</span>
                </a>
            </div>
            <div class="menu-section">
                <div class="menu-label">সাধারণ</div>
                <a href="{{ route('admin.messages.index') }}" class="menu-item {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i>
                    <span>বার্তা সমূহ</span>
                    @php $unreadCount = \App\Models\ContactMessage::unread()->count(); @endphp
                    @if($unreadCount > 0)
                        <span style="background: #ef4444; color: white; padding: 0.15rem 0.5rem; border-radius: 10px; font-size: 0.75rem; margin-left: auto;">{{ $unreadCount }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.admins.index') }}" class="menu-item {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}">
                    <i class="fas fa-users-cog"></i>
                    <span>অ্যাডমিন ব্যবস্থাপনা</span>
                </a>
                <a href="{{ route('home') }}" class="menu-item">
                    <i class="fas fa-home"></i>
                    <span>হোম পেজ</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="menu-item" style="width: 100%; text-align: left; background: none; border: none; cursor: pointer; font-family: inherit; font-size: inherit; color: inherit;">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>লগআউট</span>
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <main class="main-content">
        <div class="top-bar">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <button class="toggle-sidebar" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>@yield('page-title', 'ড্যাশবোর্ড')</h1>
            </div>
            <div class="top-bar-actions">
                @yield('top-actions')
            </div>
        </div>

        <div class="content-area">
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

            @yield('content')
        </div>
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
    @yield('scripts')
</body>
</html>
