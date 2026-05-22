<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم') — CMAC Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    @stack('styles')
    <style>
        :root {
            --primary: #2166A9;
            --primary-light: #8ac2e0;
            --sidebar-width: 260px;
            --topbar-height: 60px;
        }
        * { font-family: 'Tajawal', sans-serif; }
        body { background: #f5f7fb; min-height: 100vh; }

        /* Sidebar */
        .admin-sidebar {
            position: fixed;
            top: 0; right: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, #1a5490 0%, var(--primary) 100%);
            overflow-y: auto;
            z-index: 1000;
            transition: transform 0.3s ease;
            box-shadow: -4px 0 20px rgba(0,0,0,0.15);
        }
        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar-brand img { max-height: 45px; }
        .sidebar-brand-text { color: #fff; font-weight: 700; font-size: 0.95rem; line-height: 1.3; }
        .sidebar-brand-sub { color: rgba(255,255,255,0.6); font-size: 0.75rem; }

        .sidebar-nav { padding: 1rem 0; }
        .sidebar-section-title {
            padding: 0.5rem 1.25rem;
            font-size: 0.7rem;
            font-weight: 700;
            color: rgba(255,255,255,0.4);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-top: 0.5rem;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 1.25rem;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
            border-radius: 0;
            margin: 0.1rem 0.5rem;
            border-radius: 0.5rem;
        }
        .sidebar-link:hover { background: rgba(255,255,255,0.1); color: #fff; }
        .sidebar-link.active { background: rgba(255,255,255,0.2); color: #fff; font-weight: 600; }
        .sidebar-link i { font-size: 1.05rem; flex-shrink: 0; width: 20px; text-align: center; }
        .sidebar-link .badge { margin-right: auto; }

        /* Topbar */
        .admin-topbar {
            position: fixed;
            top: 0; left: 0;
            right: var(--sidebar-width);
            height: var(--topbar-height);
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            z-index: 999;
            gap: 1rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .topbar-title { font-weight: 700; font-size: 1rem; color: #333; flex: 1; }
        .topbar-user { display: flex; align-items: center; gap: 0.75rem; }
        .user-avatar {
            width: 36px; height: 36px;
            background: var(--primary);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-weight: 700; font-size: 0.85rem;
        }

        /* Main Content */
        .admin-main {
            margin-right: var(--sidebar-width);
            margin-top: var(--topbar-height);
            padding: 2rem;
            min-height: calc(100vh - var(--topbar-height));
        }

        /* Cards */
        .admin-card {
            background: #fff;
            border-radius: 1rem;
            border: none;
            box-shadow: 0 2px 15px rgba(0,0,0,0.06);
        }
        .admin-card .card-header {
            background: transparent;
            border-bottom: 1px solid #f0f0f0;
            padding: 1.25rem 1.5rem;
            font-weight: 700;
        }
        .admin-card .card-body { padding: 1.5rem; }

        /* Stat Cards */
        .stat-widget {
            background: #fff;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 2px 15px rgba(0,0,0,0.06);
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .stat-widget-icon {
            width: 56px; height: 56px;
            border-radius: 0.75rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }
        .stat-widget-val { font-size: 1.75rem; font-weight: 700; line-height: 1.2; }
        .stat-widget-label { font-size: 0.85rem; color: #888; }

        /* Tables */
        .admin-table { border-radius: 0.75rem; overflow: hidden; }
        .admin-table th { background: #f8f9fa; font-size: 0.85rem; font-weight: 700; color: #666; border: none; padding: 0.85rem 1rem; }
        .admin-table td { vertical-align: middle; padding: 0.85rem 1rem; border-color: #f0f0f0; font-size: 0.9rem; }
        .admin-table tr:hover td { background: #fafbff; }

        /* Forms */
        .form-control, .form-select { border-radius: 0.5rem; border: 1.5px solid #e9ecef; padding: 0.6rem 0.85rem; }
        .form-control:focus, .form-select:focus { border-color: var(--primary); box-shadow: 0 0 0 0.2rem rgba(33,102,169,0.12); }
        .form-label { font-weight: 600; font-size: 0.875rem; margin-bottom: 0.4rem; color: #555; }

        /* Buttons */
        .btn-primary { background: var(--primary); border-color: var(--primary); }
        .btn-primary:hover { background: #1a5490; border-color: #1a5490; }

        /* Alerts */
        .alert { border-radius: 0.75rem; border: none; }

        /* Breadcrumb */
        .admin-breadcrumb { font-size: 0.85rem; color: #888; }
        .admin-breadcrumb a { color: var(--primary); text-decoration: none; }

        /* Page title area */
        .page-title-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 0.75rem;
        }
        .page-title-bar h1 { font-size: 1.4rem; font-weight: 700; margin: 0; color: #222; }

        /* Image preview */
        .img-preview { max-width: 160px; max-height: 120px; object-fit: cover; border-radius: 0.5rem; }

        /* Toggle switch */
        .form-switch .form-check-input { cursor: pointer; }
        .form-check-input:checked { background-color: var(--primary); border-color: var(--primary); }

        /* Scrollbar */
        .admin-sidebar::-webkit-scrollbar { width: 4px; }
        .admin-sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 2px; }

        @media (max-width: 991px) {
            .admin-sidebar { transform: translateX(100%); }
            .admin-sidebar.show { transform: translateX(0); }
            .admin-topbar { right: 0; }
            .admin-main { margin-right: 0; }
        }
    </style>
</head>
<body>

{{-- Sidebar --}}
<aside class="admin-sidebar" id="adminSidebar">
    <div class="sidebar-brand d-flex align-items-center gap-2">
        <div style="width:40px;height:40px;border-radius:50%;background:rgba(255,255,255,0.15);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <i class="bi bi-star-fill text-white"></i>
        </div>
        <div>
            <div class="sidebar-brand-text">CMAC Admin</div>
            <div class="sidebar-brand-sub">لوحة التحكم</div>
        </div>
    </div>

    <nav class="sidebar-nav">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> لوحة التحكم
        </a>

        <div class="sidebar-section-title">الصفحات</div>

        <a href="{{ route('admin.pages.index') }}" class="sidebar-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
            <i class="bi bi-layout-text-window"></i> إدارة الصفحات
        </a>

        <div class="sidebar-section-title">المحتوى الرئيسي</div>

        <a href="{{ route('admin.sliders.index') }}" class="sidebar-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
            <i class="bi bi-play-circle"></i> مقاطع الفيديو الرئيسية
        </a>
        <a href="{{ route('admin.about.index') }}" class="sidebar-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
            <i class="bi bi-info-circle"></i> عن المنظمة
        </a>
        <a href="{{ route('admin.education.index') }}" class="sidebar-link {{ request()->routeIs('admin.education.*') ? 'active' : '' }}">
            <i class="bi bi-mortarboard"></i> المسارات التعليمية
        </a>
        <a href="{{ route('admin.awards.index') }}" class="sidebar-link {{ request()->routeIs('admin.awards.*') ? 'active' : '' }}">
            <i class="bi bi-award"></i> الجوائز والأوسمة
        </a>
        <a href="{{ route('admin.profession-day.index') }}" class="sidebar-link {{ request()->routeIs('admin.profession-day.*') ? 'active' : '' }}">
            <i class="bi bi-calendar-star"></i> يوم المهنة
        </a>

        <div class="sidebar-section-title">الفعاليات والأخبار</div>

        <a href="{{ route('admin.events.index') }}" class="sidebar-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
            <i class="bi bi-calendar-event"></i> الفعاليات
        </a>
        <a href="{{ route('admin.news.index') }}" class="sidebar-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
            <i class="bi bi-newspaper"></i> الأخبار
        </a>

        <div class="sidebar-section-title">الداعمون والإحصاءات</div>

        <a href="{{ route('admin.supporters.index') }}" class="sidebar-link {{ request()->routeIs('admin.supporters.*') ? 'active' : '' }}">
            <i class="bi bi-building"></i> الداعمون
        </a>
        <a href="{{ route('admin.statistics.index') }}" class="sidebar-link {{ request()->routeIs('admin.statistics.*') ? 'active' : '' }}">
            <i class="bi bi-bar-chart"></i> الإحصاءات
        </a>
        <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
            <i class="bi bi-chat-quote"></i> شهادات العملاء
        </a>
        <a href="{{ route('admin.appointment-requests.index') }}" class="sidebar-link {{ request()->routeIs('admin.appointment-requests.*') ? 'active' : '' }}">
            <i class="bi bi-calendar-check"></i> طلبات المواعيد
        </a>
        <a href="{{ route('admin.membership-requests.index') }}" class="sidebar-link {{ request()->routeIs('admin.membership-requests.*') ? 'active' : '' }}">
            <i class="bi bi-person-plus"></i> طلبات العضوية
        </a>
        <a href="{{ route('admin.media.index') }}" class="sidebar-link {{ request()->routeIs('admin.media.*') ? 'active' : '' }}">
            <i class="bi bi-collection-play"></i> الوسائط
        </a>

        <div class="sidebar-section-title">الإعدادات</div>

        <a href="{{ route('admin.settings') }}" class="sidebar-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
            <i class="bi bi-gear"></i> إعدادات الموقع
        </a>
        <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="bi bi-people"></i> المستخدمون
        </a>

        <div class="border-top border-white border-opacity-10 mt-3 pt-3 mx-3">
            <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
                <i class="bi bi-box-arrow-up-left"></i> عرض الموقع
            </a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="sidebar-link w-100 border-0 bg-transparent text-start" style="cursor:pointer;">
                    <i class="bi bi-box-arrow-right"></i> تسجيل الخروج
                </button>
            </form>
        </div>
    </nav>
</aside>

{{-- Topbar --}}
<header class="admin-topbar">
    <button class="btn btn-sm btn-light d-lg-none" id="sidebarToggle">
        <i class="bi bi-list fs-5"></i>
    </button>
    <div class="topbar-title">@yield('title', 'لوحة التحكم')</div>
    <div class="topbar-user">
        <div class="user-avatar">{{ substr(auth('admin')->user()->name, 0, 1) }}</div>
        <div class="d-none d-md-block">
            <div class="small fw-bold">{{ auth('admin')->user()->name }}</div>
            <div class="text-muted" style="font-size:0.75rem;">{{ auth('admin')->user()->role ?? 'مدير' }}</div>
        </div>
    </div>
</header>

{{-- Main Content --}}
<main class="admin-main">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('sidebarToggle')?.addEventListener('click', function() {
    document.getElementById('adminSidebar').classList.toggle('show');
});
</script>
@stack('scripts')
</body>
</html>
