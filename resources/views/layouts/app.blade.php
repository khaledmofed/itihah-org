<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $siteSettings->get('site_name_ar', 'الاتحاد العالمي الأكاديمي للتزيين')) - C.M.A.C</title>
    <meta name="description" content="@yield('description', $siteSettings->get('meta_description', 'الاتحاد العالمي الأكاديمي للتزيين - منظمة دولية متخصصة في دعم مهنيي التجميل والتزيين'))">
    @if($siteSettings->get('favicon'))
    <link rel="icon" type="image/x-icon" href="{{ Storage::url($siteSettings->get('favicon')) }}">
    @endif

    <!-- Cutisure Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/frontend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post-6.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/header-footer.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/v4-shims.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/main.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/widget-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/jkiticon.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/fadeInLeft.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/fadeIn.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/fadeInUp.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/widget-heading.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/widget-image.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/widget-icon-box.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/widget-counter.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/widget-divider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/cutisure/widget-icon-list.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post-25.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post-345.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cmac-responsive.css') }}">

    <!-- Google Fonts: Cormorant + DM Sans + Tajawal (Arabic) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600;700&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* ===== CMAC CSS Variables (adapted from Cutisure) ===== */
        :root {
            --e-global-typography-primary-font-family: 'Tajawal';
            --e-global-typography-secondary-font-family: 'Tajawal';
            --e-global-typography-text-font-family: 'Tajawal';
            --e-global-typography-accent-font-family: 'Tajawal';
            --primary: #2166A9;
            --primary-dark: #1a4f80;
            --primary-light: #8ac2e0;
            --primary-lighter: #DEEFF8;
            --secondary: #2166A9;
            --accent: #2166A9;
            --text-dark: #131515;
            --text-muted: #737373;
            --white: #ffffff;
            --bg-light: #DEEFF8;
            --border-color: #8ac2e0;
            --dark-bg: #0d2137;
        }

        /* Override Cutisure kit colors with CMAC colors */
        .elementor-kit-6 {
            --e-global-color-primary: #131515;
            --e-global-color-secondary: #2166A9;
            --e-global-color-text: #737373;
            --e-global-color-accent: #2166A9;
            --e-global-color-308e809: #FFFFFF;
            --e-global-color-9eaa092: #FFFFFF00;
            --e-global-color-a954db2: #8ac2e0;
            --e-global-color-651faef: #DEEFF8;
            --e-global-color-2db06a9: #0d2137;
            --e-global-color-2d69694: #1a4f80;
        }

        /* ===== Force Tajawal everywhere (override Cutisure) ===== */

        body, h1, h2, h3, h4, h5, h6,
        p, span, a, li, div, button, input, textarea, select, label,
        .elementor-widget-container,
        .elementor-heading-title,
        .elementor-icon-list-text,
        .elementor-icon-box-title,
        .elementor-icon-box-description,
        .ekit-heading--title,
        .ekit-heading__description,
        .elementskit-navbar-nav .ekit-menu-nav-link,
        .elementskit-dropdown .dropdown-item {
            font-family: 'Tajawal', sans-serif !important;
        }

        /* ===== Base Reset ===== */
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Tajawal', sans-serif;
            direction: rtl;
            text-align: right;
            color: var(--text-dark);
            background: #fff;
            margin: 0;
            padding: 0;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Cormorant', 'Tajawal', serif;
            font-weight: 700;
            color: var(--text-dark);
        }

        p, span, a, li, label, input, textarea, select, button {
            font-family: 'Tajawal', 'DM Sans', sans-serif;
        }

        a { color: var(--primary); text-decoration: none; }
        a:hover { color: var(--primary-dark); }

        img { max-width: 100%; height: auto; }

        /* ===== Container ===== */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ===== Header / Navigation ===== */
        .site-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: #fff;
            box-shadow: 0 2px 30px rgba(33,102,169,0.1);
        }

        /* Top bar */
        .header-topbar {
            background: var(--primary);
            padding: 7px 0;
            font-size: 13px;
            color: rgba(255,255,255,0.9);
        }

        .header-topbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-topbar a {
            color: rgba(255,255,255,0.85);
            margin: 0 12px;
            font-size: 13px;
        }
        .header-topbar a:hover { color: #fff; }

        .header-topbar .topbar-left, .header-topbar .topbar-right {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Main header row */
        .header-main {
            padding: 10px 0;
        }

        .header-main .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .site-logo img {
            max-width: 180px;
            height: auto;
            object-fit: contain;
        }

        /* Navigation */
        .main-nav {
            display: flex;
            align-items: center;
            gap: 0;
            list-style: none;
            margin: 0;
            padding: 0;
            flex: 1;
            justify-content: center;
        }

        .main-nav > li {
            position: relative;
        }

        .main-nav > li > a {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 10px 16px;
            font-family: 'Tajawal', 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
            transition: color 0.25s;
            white-space: nowrap;
        }

        .main-nav > li > a:hover,
        .main-nav > li.active > a {
            color: var(--primary);
        }

        .main-nav > li > a svg {
            width: 10px;
            height: 10px;
            fill: currentColor;
            transition: transform 0.2s;
        }
        .main-nav > li:hover > a svg { transform: rotate(180deg); }

        /* Dropdown */
        .main-nav .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            min-width: 210px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 15px 50px rgba(33,102,169,0.15);
            padding: 8px;
            list-style: none;
            margin: 0;
            z-index: 999;
        }
        .main-nav > li:hover .dropdown-menu { display: block; }

        /* قائمة «عن المنظمة»: عمود واحد — desktop only (mobile handled by post-25.css) */
        @media (min-width: 1025px) {
            .elementor-25 .elementor-element.elementor-element-94295b9 .elementskit-submenu-panel.about-dropdown-wide {
                min-width: 260px !important;
                max-width: min(340px, 94vw) !important;
                width: max-content;
                column-count: unset !important;
                display: flex !important;
                flex-direction: column !important;
                flex-wrap: nowrap !important;
                align-items: stretch !important;
                gap: 2px !important;
                padding: 8px 6px !important;
            }
            .elementor-25 .elementor-element.elementor-element-94295b9 .elementskit-submenu-panel.about-dropdown-wide > li {
                width: 100% !important;
                float: none !important;
                display: block !important;
                break-inside: auto !important;
                -webkit-column-break-inside: auto !important;
            }
            .elementor-25 .elementor-element.elementor-element-94295b9 .elementskit-submenu-panel.about-dropdown-wide > li > a.dropdown-item {
                display: block !important;
                white-space: normal !important;
                word-break: break-word;
                line-height: 1.45;
            }
        }

        .main-nav .dropdown-menu li a {
            display: block;
            padding: 9px 16px;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-dark);
            border-radius: 6px;
            transition: all 0.2s;
            white-space: nowrap;
        }
        .main-nav .dropdown-menu li a:hover {
            background: var(--bg-light);
            color: var(--primary);
        }

        /* Header CTA */
        .header-cta {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-shrink: 0;
        }

        /* ===== Buttons ===== */
        .btn {
            display: inline-block;
            padding: 11px 28px;
            border-radius: 70px;
            font-family: 'Tajawal', 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border: 2px solid transparent;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff !important;
            border-color: var(--primary);
        }
        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
            color: #fff;
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border-color: var(--primary);
        }
        .btn-outline:hover {
            background: var(--primary);
            color: #fff;
        }

        .btn-white {
            background: #fff;
            color: var(--primary);
            border-color: #fff;
        }
        .btn-white:hover {
            background: var(--bg-light);
            border-color: var(--bg-light);
        }

        .btn-outline-white {
            background: transparent;
            color: #fff;
            border-color: rgba(255,255,255,0.6);
        }
        .btn-outline-white:hover {
            background: rgba(255,255,255,0.15);
            border-color: #fff;
            color: #fff;
        }

        .btn-sm {
            padding: 8px 20px;
            font-size: 13px;
        }

        /* ===== Mobile Hamburger ===== */
        .nav-toggler {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
        }
        .nav-toggler span {
            display: block;
            width: 25px;
            height: 2px;
            background: var(--text-dark);
            margin: 5px 0;
            border-radius: 2px;
            transition: all 0.3s;
        }

        /* ===== Page Header (breadcrumb) ===== */
        .page-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 55px 0;
            color: #fff;
            text-align: center;
        }
        .page-header-title {
            font-family: 'Cormorant', 'Tajawal', serif;
            font-size: clamp(1.8rem, 3vw, 2.8rem);
            font-weight: 700;
            color: #fff;
            margin-bottom: 12px;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 4px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .breadcrumb-item a { color: rgba(255,255,255,0.75); font-size: 14px; }
        .breadcrumb-item a:hover { color: #fff; }
        .breadcrumb-item.active { color: rgba(255,255,255,0.9); font-size: 14px; }
        .breadcrumb-item + .breadcrumb-item::before { content: '/'; color: rgba(255,255,255,0.5); margin: 0 6px; }

        /* ===== Section Utilities ===== */
        .section { padding: 80px 0; }
        .section-sm { padding: 50px 0; }
        .section-lg { padding: 100px 0; }

        .section-label {
            display: inline-block;
            font-family: 'DM Sans', 'Tajawal', sans-serif;
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--primary);
            background: var(--bg-light);
            padding: 5px 16px;
            border-radius: 30px;
            margin-bottom: 12px;
        }

        .section-title {
            font-family: 'Cormorant', 'Tajawal', serif;
            font-size: clamp(1.8rem, 3vw, 2.8rem);
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.15;
            margin-bottom: 16px;
        }

        .section-title span { color: var(--primary); }

        .section-desc {
            font-size: 18px;
            color: var(--text-muted);
            line-height: 1.7;
            max-width: 600px;
            margin: 0 auto;
        }
.elementor-2087 .elementor-element.elementor-element-8eabebf .elementor-element.elementor-element-183c112.elementor-widget.elementor-widget-text-editor p {
    font-size: 18px;
    color: #131515;
}
        .text-center { text-align: center; }
        .text-center .section-desc { margin: 0 auto; }

        .section-divider {
            width: 50px;
            height: 3px;
            background: linear-gradient(to left, var(--primary), var(--primary-light));
            border-radius: 3px;
            margin: 10px auto 20px;
        }
        .text-center .section-divider { margin: 10px auto 20px; }

        /* ===== Grid ===== */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }
        [class*="col-"] {
            padding: 0 15px;
            width: 100%;
        }
        .col-12 { width: 100%; }
        .col-6 { width: 50%; }
        .col-4 { width: 33.333%; }
        .col-3 { width: 25%; }

        @media (min-width: 576px) {
            .col-sm-6 { width: 50%; }
        }

        @media (min-width: 768px) {
            .col-md-6 { width: 50%; }
            .col-md-4 { width: 33.333%; }
            .col-md-3 { width: 25%; }
        }

        @media (min-width: 992px) {
            .col-lg-8 { width: 66.667%; }
            .col-lg-6 { width: 50%; }
            .col-lg-5 { width: 41.667%; }
            .col-lg-4 { width: 33.333%; }
            .col-lg-3 { width: 25%; }
            .col-lg-2 { width: 16.667%; }
        }

        /* Gap utility */
        .g-4 > * { padding: 15px; }
        .g-5 > * { padding: 20px; }
        .mb-4 { margin-bottom: 20px; }
        .mb-5 { margin-bottom: 30px; }
        .mt-4 { margin-bottom: 20px; }
        .mt-5 { margin-top: 30px; }
        .me-2 { margin-left: 8px; }
        .me-1 { margin-left: 4px; }

        /* ===== Cards ===== */
        .card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(33,102,169,0.08);
            overflow: hidden;
            transition: all 0.3s;
        }
        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 45px rgba(33,102,169,0.15);
        }
        .card-body { padding: 28px; }
        .card-img-top {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        /* Icon Box Card */
        .icon-box {
            text-align: center;
            padding: 35px 25px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(33,102,169,0.07);
            transition: all 0.3s;
            height: 100%;
        }
        .icon-box:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 45px rgba(33,102,169,0.14);
        }
        .icon-box-icon {
            width: 75px;
            height: 75px;
            background: var(--bg-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 30px;
            color: var(--primary);
            transition: all 0.3s;
        }
        .icon-box:hover .icon-box-icon {
            background: var(--primary);
            color: #fff;
        }
        .icon-box h4 {
            font-family: 'Cormorant', 'Tajawal', serif;
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 10px;
        }
        .icon-box p {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.7;
            margin: 0;
        }

        /* ===== Stats ===== */
        .stats-section {
            background: var(--primary);
            padding: 65px 0;
        }
        .stat-item { text-align: center; color: #fff; }
        .stat-number {
            display: block;
            font-family: 'Cormorant', 'Tajawal', serif;
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            line-height: 1;
            margin-bottom: 8px;
        }
        .stat-label {
            font-size: 14px;
            font-weight: 500;
            opacity: 0.85;
        }

        /* ===== Badge / Tag ===== */
        .badge {
            display: inline-block;
            font-size: 12px;
            font-weight: 600;
            padding: 4px 14px;
            border-radius: 30px;
            background: var(--bg-light);
            color: var(--primary);
        }

        /* ===== Form ===== */
        input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]),
        textarea, select {
            width: 100%;
            background: var(--bg-light);
            border: 1.5px solid var(--border-color);
            border-radius: 30px;
            padding: 12px 20px;
            font-family: 'Tajawal', sans-serif;
            font-size: 14px;
            color: var(--text-dark);
            outline: none;
            transition: border-color 0.25s, background 0.25s;
            direction: rtl;
        }
        textarea { border-radius: 16px; min-height: 130px; resize: vertical; }
        input:focus, textarea:focus, select:focus {
            border-color: var(--primary);
            background: #fff;
        }
        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }
        .form-group { margin-bottom: 20px; }
        .form-text { font-size: 12px; color: var(--text-muted); margin-top: 5px; }

        /* ===== Alert ===== */
        .alert {
            padding: 14px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #6ee7b7; }
        .alert-danger  { background: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; }

        /* ===== Pagination ===== */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            list-style: none;
            padding: 0;
            margin: 40px 0 0;
        }
        .pagination a, .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
            border: 1.5px solid #e5e7eb;
            transition: all 0.2s;
        }
        .pagination a:hover, .pagination .active span {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
        }

        /* ===== Footer ===== */
        .site-footer {
            background: var(--dark-bg);
            color: rgba(255,255,255,0.75);
            padding: 70px 0 0;
        }
        .footer-logo img { max-height: 65px; height: auto; max-width: 200px; margin-bottom: 18px; }
        .footer-desc {
            font-size: 14px;
            color: rgba(255,255,255,0.6);
            line-height: 1.8;
            max-width: 300px;
        }
        .footer-heading {
            font-family: 'Tajawal', sans-serif;
            font-size: 16px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary);
            display: inline-block;
        }
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-links li { margin-bottom: 10px; }
        .footer-links a {
            font-size: 14px;
            color: rgba(255,255,255,0.65);
            transition: color 0.2s;
        }
        .footer-links a:hover { color: var(--primary-light); }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 14px;
            font-size: 14px;
            color: rgba(255,255,255,0.7);
        }
        .footer-contact-item i {
            color: var(--primary-light);
            margin-top: 2px;
            flex-shrink: 0;
        }

        .footer-social { display: flex; gap: 10px; margin-top: 18px; }
        .social-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.8);
            font-size: 15px;
            transition: all 0.3s;
        }
        .social-icon:hover {
            background: var(--primary);
            color: #fff;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.08);
            margin-top: 50px;
            padding: 20px 0;
            text-align: center;
            font-size: 13px;
            color: rgba(255,255,255,0.4);
        }
        .footer-bottom a { color: rgba(255,255,255,0.3); }
        .footer-bottom a:hover { color: rgba(255,255,255,0.6); }

        /* ===== Utilities ===== */
        .d-flex { display: flex; }
        .align-items-center { align-items: center; }
        .justify-content-between { justify-content: space-between; }
        .justify-content-center { justify-content: center; }
        .flex-wrap { flex-wrap: wrap; }
        .gap-2 { gap: 10px; }
        .gap-3 { gap: 16px; }
        .gap-4 { gap: 22px; }
        .w-100 { width: 100%; }
        .h-100 { height: 100%; }
        .object-fit-cover { object-fit: cover; }
        .rounded-4 { border-radius: 16px; }
        .overflow-hidden { overflow: hidden; }
        .shadow-sm { box-shadow: 0 4px 20px rgba(0,0,0,0.06); }
        .fw-bold { font-weight: 700; }
        .text-muted { color: var(--text-muted); }
        .text-primary { color: var(--primary); }
        .bg-light { background: var(--bg-light); }
        .bg-white { background: #fff; }
        .p-4 { padding: 20px; }
        .p-5 { padding: 30px; }
        .py-3 { padding-top: 16px; padding-bottom: 16px; }
        .py-4 { padding-top: 22px; padding-bottom: 22px; }
        .py-5 { padding-top: 30px; padding-bottom: 30px; }
        .px-3 { padding-left: 16px; padding-right: 16px; }
        .fs-6 { font-size: 14px; }
        .small { font-size: 12px; }
        .lh-lg { line-height: 1.8; }
        .sticky-top { position: sticky; top: 100px; }

        /* ===== Responsive ===== */
        @media (max-width: 991px) {
            .main-nav, .header-cta { display: none; }
            .nav-toggler { display: block; }
            .mobile-nav-open .main-nav {
                display: flex;
                flex-direction: column;
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                width: 300px;
                background: #fff;
                padding: 20px;
                box-shadow: -5px 0 30px rgba(0,0,0,0.15);
                overflow-y: auto;
                z-index: 2000;
            }
            .mobile-nav-open .main-nav > li { width: 100%; }
            .mobile-nav-open .main-nav > li > a { border-bottom: 1px solid #f3f4f6; }
            .mobile-nav-open .main-nav .dropdown-menu {
                display: block;
                position: static;
                box-shadow: none;
                border-radius: 0;
                padding-right: 15px;
                background: var(--bg-light);
            }
            .col-lg-8, .col-lg-6, .col-lg-5, .col-lg-4, .col-lg-3, .col-lg-2 { width: 100%; }
        }

        @media (max-width: 767px) {
            .col-md-6, .col-md-4, .col-md-3 { width: 100%; }
            .section { padding: 55px 0; }
            .section-title { font-size: 1.7rem; }
            .header-topbar .topbar-right { display: none; }
        }

        @media (max-width: 575px) {
            .col-sm-6 { width: 100%; }
        }

        /* Header icon tooltips */
        .header-icon-link {
            text-decoration: none;
            position: relative;
            display: block;
        }
        .header-icon-link::after {
            content: attr(data-tooltip);
            position: absolute;
            top: calc(100% + 10px);
            right: auto;
            left: 0;
            transform: none;
            background: #1a5490;
            color: #fff;
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-family: 'Tajawal', sans-serif;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease;
            z-index: 9999;
        }
        .header-icon-link::before {
            content: '';
            position: absolute;
            top: calc(100% + 2px);
            right: 50%;
            left: auto;
            transform: translateX(50%);
            border: 5px solid transparent;
            border-bottom-color: #1a5490;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease;
            z-index: 9999;
        }
        .header-icon-link:hover::after,
        .header-icon-link:hover::before {
            opacity: 1;
        }

        /* Footer Social Icons */
        .cmac-social-icons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        .cmac-social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            font-size: 16px;
color: #fff !important;
    transition: transform 0.2s ease, opacity 0.2s ease;
    text-decoration: none;
    background: #ffffff2b;
        }
        .cmac-social-link:hover {
            transform: translateY(-3px);
            opacity: 0.9;
            color: #fff;
        }
        /* .cmac-social-facebook  { background: #1877f2; }
        .cmac-social-instagram { background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); }
        .cmac-social-twitter   { background: #000; }
        .cmac-social-youtube   { background: #ff0000; }
        .cmac-social-whatsapp  { background: #25d366; } */

        /* ═══════════════════════════════════════
           Mobile hamburger & offcanvas menu
           ═══════════════════════════════════════ */

        /* Hamburger button */
        #cmacHamburger {
            display: none;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: 1.5px solid #d0e6f5 !important;
            border-radius: 8px;
            background: #fff !important;
            cursor: pointer;
            padding: 0;
        }
        @media (max-width: 1024px) {
            #cmacHamburger { display: flex !important; }
        }

        /* RTL: slide from RIGHT instead of left */
        @media (max-width: 1024px) {
            #ekit-megamenu-header-menu {
                right: -100vw !important;
                left: auto !important;
                transition: right 0.35s cubic-bezier(0.4, 0, 0.2, 1) !important;
                max-width: 300px !important;
                width: 85vw !important;
                z-index: 9999 !important;
                background: #fff !important;
                box-shadow: -6px 0 30px rgba(33,102,169,0.15) !important;
                overflow-y: auto !important;
                overflow-x: hidden !important;
                flex-direction: column !important;
                justify-content: flex-start !important;
                padding-bottom: 30px !important;
            }
            #ekit-megamenu-header-menu.active {
                right: 0 !important;
                left: auto !important;
            }
        }

        /* Identity panel (logo + close) inside menu */
        @media (max-width: 1024px) {
            .elementskit-nav-identity-panel {
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                padding: 16px 20px !important;
                border-bottom: 2px solid #e8f2f9 !important;
                background: #f8fbfe !important;
                position: sticky !important;
                top: 0 !important;
                z-index: 10 !important;
            }
            .elementskit-nav-identity-panel .elementskit-nav-logo img {
                height: 45px !important;
                width: auto !important;
            }
        }

        /* Close button */
        #cmacMenuClose {
            background: #f0f7ff !important;
            border: 1.5px solid #d0e6f5 !important;
            border-radius: 8px !important;
            width: 36px !important;
            height: 36px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            cursor: pointer !important;
            color: #2166a9 !important;
            font-size: 15px !important;
            padding: 0 !important;
        }
        #cmacMenuClose:hover { background: #2166a9 !important; color: #fff !important; }

        /* Submenu arrow transition */
        .elementskit-submenu-indicator {
            transition: transform 0.25s ease;
            width: 16px !important;
            height: 16px !important;
            fill: currentColor !important;
        }
    </style>

    @stack('styles')
</head>
<body class="elementor-kit-6">

<!-- Site Header (elementor-25) -->
<div class="ekit-template-content-markup ekit-template-content-header ekit-template-content-theme-support">
<div data-elementor-type="wp-post" data-elementor-id="25" class="elementor elementor-25" dir="rtl">
<div class="elementor-element elementor-element-c58007b e-con-full e-flex e-con e-parent e-lazyloaded" data-id="c58007b" data-element_type="container">
    <div class="elementor-element elementor-element-3ee60b9 e-con-full e-flex e-con e-child" data-id="3ee60b9" data-element_type="container">
        {{-- Logo --}}
        <div class="elementor-element elementor-element-813d0c9 elementor-widget__width-auto elementor-widget elementor-widget-image" data-id="813d0c9" data-element_type="widget" data-widget_type="image.default">
            <a href="{{ route('home') }}">
                @if($siteSettings->get('logo'))
                    <img src="{{ Storage::url($siteSettings->get('logo')) }}" alt="C.M.A.C" height="83">
                @else
                    <img src="{{ asset('uploads/images/b.png') }}" alt="C.M.A.C" height="83" onerror="this.src='{{ asset('images/Logo_3.png') }}'">
                @endif
            </a>
        </div>
        {{-- Navigation --}}
        <div class="elementor-element elementor-element-94295b9 elementor-widget elementor-widget-ekit-nav-menu" data-id="94295b9" data-element_type="widget" data-widget_type="ekit-nav-menu.default">
            <div class="elementor-widget-container">
                <nav class="ekit-wid-con ekit_menu_responsive_tablet" data-hamburger-icon="jki jki-menu-11-light" data-hamburger-icon-type="icon" data-responsive-breakpoint="1024">
                    <button class="elementskit-menu-hamburger elementskit-menu-toggler" type="button" aria-label="hamburger-icon" id="cmacHamburger">
                        <i class="fas fa-bars" style="font-size:20px;color:#2166a9;display:block;line-height:1;"></i>
                    </button>
                    <div id="ekit-megamenu-header-menu" class="elementskit-menu-container elementskit-menu-offcanvas-elements elementskit-navbar-nav-default ekit-nav-menu-one-page-no ekit-nav-dropdown-hover" ekit-dom-added="yes">
                        <ul id="menu-header-menu" class="elementskit-navbar-nav elementskit-menu-po-left submenu-click-on-icon">
                            <li class="menu-item nav-item elementskit-mobile-builder-content {{ request()->routeIs('home') ? 'current-menu-item active' : '' }}" data-vertical-menu="750px">
                                <a href="{{ route('home') }}" class="ekit-menu-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">الرئيسية</a>
                            </li>
                            <li class="menu-item nav-item menu-item-has-children elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content {{ request()->routeIs('about*') ? 'current-menu-ancestor active' : '' }}" data-vertical-menu="750px">
                                <a href="{{ route('about') }}" class="ekit-menu-nav-link ekit-menu-dropdown-toggle">عن المنظمة<svg class="elementskit-submenu-indicator ekit-svg-icon icon-down-arrow1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M31.582 8.495c-0.578-0.613-1.544-0.635-2.153-0.059l-13.43 12.723-13.428-12.723c-0.61-0.578-1.574-0.553-2.153 0.059-0.579 0.611-0.553 1.576 0.058 2.155l14.477 13.715c0.293 0.277 0.67 0.418 1.047 0.418s0.756-0.14 1.048-0.418l14.477-13.715c0.611-0.579 0.637-1.544 0.058-2.155z"></path></svg></a>
                                <ul class="elementskit-dropdown elementskit-submenu-panel about-dropdown-wide">
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('about.section', 'intro') }}" class="dropdown-item">تعريف المنظمة</a></li>
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('about.section', 'history') }}" class="dropdown-item">النبذة التاريخية</a></li>
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('about.section', 'vision') }}" class="dropdown-item">الرؤية</a></li>
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('about.section', 'mission') }}" class="dropdown-item">الرسالة</a></li>
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('about.section', 'values') }}" class="dropdown-item">القيم</a></li>
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('about.section', 'objectives') }}" class="dropdown-item">الأهداف الاستراتيجية</a></li>
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('about.section', 'role') }}" class="dropdown-item">دور المنظمة</a></li>
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('about.section', 'social_responsibility') }}" class="dropdown-item">المسؤولية المجتمعية</a></li>
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('about.section', 'quality') }}" class="dropdown-item">سياسة الجودة</a></li>
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('about.section', 'work_system') }}" class="dropdown-item">منظومة العمل</a></li>
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('about.section', 'structure') }}" class="dropdown-item">الهيكل التنظيمي</a></li>
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('about.section', 'president_message') }}" class="dropdown-item">كلمة رئيس المنظمة</a></li>
                                </ul>
                            </li>
                            <li class="menu-item nav-item menu-item-has-children elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content {{ request()->routeIs('education*') ? 'current-menu-ancestor active' : '' }}" data-vertical-menu="750px">
                                <a href="{{ route('education') }}" class="ekit-menu-nav-link ekit-menu-dropdown-toggle">المسارات التعليمية<svg class="elementskit-submenu-indicator ekit-svg-icon icon-down-arrow1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M31.582 8.495c-0.578-0.613-1.544-0.635-2.153-0.059l-13.43 12.723-13.428-12.723c-0.61-0.578-1.574-0.553-2.153 0.059-0.579 0.611-0.553 1.576 0.058 2.155l14.477 13.715c0.293 0.277 0.67 0.418 1.047 0.418s0.756-0.14 1.048-0.418l14.477-13.715c0.611-0.579 0.637-1.544 0.058-2.155z"></path></svg></a>
                                <ul class="elementskit-dropdown elementskit-submenu-panel">
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('education.category', 'taheel') }}" class="dropdown-item">مسار التأهيل</a></li>
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('education.category', 'tatweer') }}" class="dropdown-item">مسار التطوير</a></li>
                                    <li class="nav-item elementskit-mobile-builder-content" data-vertical-menu="750px"><a href="{{ route('education.category', 'certificates') }}" class="dropdown-item">فئة الشهادات</a></li>
                                </ul>
                            </li>
                            <li class="menu-item nav-item elementskit-mobile-builder-content {{ request()->routeIs('profession-day') ? 'current-menu-item active' : '' }}" data-vertical-menu="750px">
                                <a href="{{ route('profession-day') }}" class="ekit-menu-nav-link">يوم المهنة</a>
                            </li>
                            <li class="menu-item nav-item elementskit-mobile-builder-content {{ request()->routeIs('awards*') ? 'current-menu-item active' : '' }}" data-vertical-menu="750px">
                                <a href="{{ route('awards') }}" class="ekit-menu-nav-link">الجوائز والأوسمة</a>
                            </li>
                            <li class="menu-item nav-item elementskit-mobile-builder-content {{ request()->routeIs('supporter') ? 'current-menu-item active' : '' }}" data-vertical-menu="750px">
                                <a href="{{ route('supporter') }}" class="ekit-menu-nav-link">داعم</a>
                            </li>
                            <li class="menu-item nav-item elementskit-mobile-builder-content {{ request()->routeIs('events*') ? 'current-menu-item active' : '' }}" data-vertical-menu="750px">
                                <a href="{{ route('events') }}" class="ekit-menu-nav-link">الفعاليات</a>
                            </li>
                            <li class="menu-item nav-item elementskit-mobile-builder-content {{ request()->routeIs('news*') ? 'current-menu-item active' : '' }}" data-vertical-menu="750px">
                                <a href="{{ route('news') }}" class="ekit-menu-nav-link">الأخبار</a>
                            </li>
                            <li class="menu-item nav-item elementskit-mobile-builder-content {{ request()->routeIs('join') ? 'current-menu-item active' : '' }}" data-vertical-menu="750px">
                                <a href="{{ route('join') }}" class="ekit-menu-nav-link">العضوية</a>
                            </li>
                            <li class="menu-item nav-item elementskit-mobile-builder-content {{ request()->routeIs('contact') ? 'current-menu-item active' : '' }}" data-vertical-menu="750px">
                                <a href="{{ route('contact') }}" class="ekit-menu-nav-link">تواصل معنا</a>
                            </li>
                        </ul>
                        <div class="elementskit-nav-identity-panel">
                            <a class="elementskit-nav-logo" href="{{ route('home') }}">
                                @if($siteSettings->get('logo'))
                                    <img src="{{ Storage::url($siteSettings->get('logo')) }}" alt="C.M.A.C">
                                @else
                                    <img src="{{ asset('uploads/images/b.png') }}" alt="C.M.A.C" onerror="this.src='{{ asset('images/Logo_3.png') }}'">
                                @endif
                            </a>
                            <button class="elementskit-menu-close elementskit-menu-toggler" type="button" id="cmacMenuClose"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="elementskit-menu-overlay elementskit-menu-offcanvas-elements elementskit-menu-toggler ekit-nav-menu--overlay"></div>
                </nav>
            </div>
        </div>
    </div>
    {{-- Header Right: Phone + Email (hidden mobile) --}}
    <div class="elementor-element elementor-element-e7f8e24 e-con-full elementor-hidden-mobile e-flex e-con e-child" data-id="e7f8e24" data-element_type="container">
        <a href="tel:{{ preg_replace('/\s+/', '', $siteSettings->get('contact_phone', '+97150159 2592')) }}"
           class="header-icon-link"
           data-tooltip="{{ $siteSettings->get('contact_phone', '+971 50 1 592 592') }}">
            <div class="elementor-element elementor-element-41ff0e8 elementor-hidden-mobile elementor-view-stacked elementor-shape-circle elementor-widget elementor-widget-icon-box" data-id="41ff0e8" data-element_type="widget" data-widget_type="icon-box.default">
                <div class="elementor-icon-box-wrapper">
                    <div class="elementor-icon-box-icon">
                        <span class="elementor-icon">
                            <svg class="ekit-svg-icon icon-phone" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M28.631 14.235c-1.665 0-4.684-0.6-5.625-1.541-0.577-0.577-0.714-1.301-0.824-1.883-0.136-0.717-0.217-0.93-0.532-1.065-1.444-0.62-3.514-0.976-5.681-0.976-2.144 0-4.193 0.35-5.619 0.959-0.311 0.133-0.391 0.345-0.523 1.061-0.108 0.584-0.243 1.31-0.82 1.887-0.525 0.525-1.624 0.886-2.454 1.096-1.069 0.271-2.214 0.426-3.141 0.426-1.062 0-1.78-0.202-2.196-0.617-0.626-0.626-1.025-1.481-1.095-2.348-0.059-0.73 0.081-1.812 1.088-2.819 1.635-1.635 3.834-2.91 6.537-3.789 2.486-0.809 5.315-1.236 8.183-1.236 2.887 0 5.74 0.433 8.25 1.251 2.728 0.89 4.948 2.178 6.599 3.828 1.68 1.68 1.264 3.909 0.020 5.154-0.412 0.412-1.12 0.612-2.167 0.612zM16 14.4c-4.987 0-8.621 1.74-10.799 5.173-1.648 2.596-1.823 5.251-1.825 5.278-0.035 0.627 0.177 1.217 0.597 1.661s0.998 0.688 1.627 0.688h20.8c0.629 0 1.207-0.244 1.627-0.688s0.632-1.034 0.597-1.662c-0.001-0.025-0.177-2.68-1.825-5.276-2.179-3.433-5.812-5.173-10.799-5.173z"></path></svg>
                        </span>
                    </div>
                </div>
            </div>
        </a>
        <div class="elementor-element elementor-element-21466f4 elementor-widget__width-initial elementor-hidden-mobile elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="21466f4" data-element_type="widget" data-widget_type="divider.default">
            <div class="elementor-divider"><span class="elementor-divider-separator"></span></div>
        </div>
        <a href="mailto:{{ $siteSettings->get('contact_email', 'manalcmac@hotmail.com') }}"
           class="header-icon-link"
           data-tooltip="{{ $siteSettings->get('contact_email', 'manalcmac@hotmail.com') }}">
            <div class="elementor-element elementor-element-ac532c7 elementor-hidden-mobile elementor-view-stacked elementor-shape-circle elementor-widget elementor-widget-icon-box" data-id="ac532c7" data-element_type="widget" data-widget_type="icon-box.default">
                <div class="elementor-icon-box-wrapper">
                    <div class="elementor-icon-box-icon">
                        <span class="elementor-icon">
                            <svg class="ekit-svg-icon icon-email1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M30.887 30.9c0 0 0-14.113 0-18.813 0-0.194-0.244-0.438-0.481-0.619l-4.919-3.569v-3.944c0-0.388-0.325-0.65-0.65-0.65h-5.606l-2.856-2.081c-0.194-0.131-0.519-0.131-0.719 0l-2.856 2.081h-5.606c-0.388 0-0.65 0.325-0.65 0.65v3.9l-4.981 3.619c-0.294 0.181-0.481 0.419-0.481 0.619 0 4.731 0 18.938 0 18.938 0 0.369 0.294 0.625 0.6 0.65 0.019 0 0.031 0 0.050 0h28.5c0.419-0.006 0.656-0.331 0.656-0.781zM15.988 2.456l1.144 0.844h-2.294l1.15-0.844zM24.188 4.606v11.137l-8.2 5.975-8.2-5.975v-11.137h16.4z"></path></svg>
                        </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
</div>
</div>

<!-- Page Content -->
@yield('content')

<!-- Site Footer (elementor-345) -->
<div class="ekit-template-content-markup ekit-template-content-footer ekit-template-content-theme-support">
<div data-elementor-type="wp-post" data-elementor-id="345" class="elementor elementor-345" dir="rtl">
<div class="elementor-element elementor-element-bd513d7 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="bd513d7" data-element_type="container">
    <div class="e-con-inner">
        <div class="elementor-element elementor-element-77bd511 e-con-full e-flex e-con e-child" data-id="77bd511" data-element_type="container">

            {{-- Column 1: Logo + Desc + Social --}}
            <div class="elementor-element elementor-element-69880e8 e-con-full e-flex e-con e-child" data-id="69880e8" data-element_type="container">
                <div class="elementor-element elementor-element-53e75f1 elementor-widget__width-auto elementor-widget elementor-widget-image" data-id="53e75f1" data-element_type="widget" data-widget_type="image.default">
                    <a href="{{ route('home') }}">
                        @if($siteSettings->get('footer_logo'))
                            <img src="{{ Storage::url($siteSettings->get('footer_logo')) }}" alt="C.M.A.C">
                        @elseif($siteSettings->get('logo'))
                            <img src="{{ Storage::url($siteSettings->get('logo')) }}" alt="C.M.A.C">
                        @else
                            <img src="{{ asset('uploads/images/b.png') }}" alt="C.M.A.C" onerror="this.src='{{ asset('images/Logo_4.png') }}'">
                        @endif
                    </a>
                </div>
                <div class="elementor-element elementor-element-213f1f7 elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="213f1f7" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>{{ $siteSettings->get('site_description_ar', 'الاتحاد العالمي الأكاديمي للتزيين (C.M.A.C) — منظمة دولية متخصصة في تعليم وتطوير مهنة التزيين والتجميل منذ 25 عاماً.') }}</p>
                </div>
                <div class="cmac-social-icons">
                    @if($siteSettings->get('social_facebook'))
                    <a href="{{ $siteSettings->get('social_facebook') }}" class="cmac-social-link cmac-social-facebook" target="_blank" rel="noopener" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    @endif
                    @if($siteSettings->get('social_instagram'))
                    <a href="{{ $siteSettings->get('social_instagram') }}" class="cmac-social-link cmac-social-instagram" target="_blank" rel="noopener" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    @endif
                    @if($siteSettings->get('social_twitter'))
                    <a href="{{ $siteSettings->get('social_twitter') }}" class="cmac-social-link cmac-social-twitter" target="_blank" rel="noopener" aria-label="Twitter / X">
                        <i class="fab fa-twitter"></i>
                    </a>
                    @endif
                    @if($siteSettings->get('social_youtube'))
                    <a href="{{ $siteSettings->get('social_youtube') }}" class="cmac-social-link cmac-social-youtube" target="_blank" rel="noopener" aria-label="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                    @endif
                    @if($siteSettings->get('social_whatsapp'))
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteSettings->get('social_whatsapp')) }}" class="cmac-social-link cmac-social-whatsapp" target="_blank" rel="noopener" aria-label="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    @endif
                </div>
            </div>

            {{-- Column 2: Contact Info --}}
            <div class="elementor-element elementor-element-19feb07 e-con-full e-flex e-con e-child" data-id="19feb07" data-element_type="container">
                <div class="elementor-element elementor-element-1938a1b elementor-widget elementor-widget-heading" data-id="1938a1b" data-element_type="widget" data-widget_type="heading.default">
                    <h2 class="elementor-heading-title elementor-size-default">معلومات التواصل</h2>
                </div>
                <div class="elementor-element elementor-element-c28cb86 elementor-widget__width-initial elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="c28cb86" data-element_type="widget" data-widget_type="divider.default">
                    <div class="elementor-divider"><span class="elementor-divider-separator"></span></div>
                </div>
                <div class="footer-contact-row">
                    <div class="footer-contact-cell">
                        <h3>العنوان</h3>
                        <p>{{ $siteSettings->get('address', 'دبي، الإمارات العربية المتحدة') }}</p>
                    </div>
                    <div class="footer-contact-cell">
                        <h3>البريد الإلكتروني</h3>
                        <p>{{ $siteSettings->get('contact_email', 'manalcmac@hotmail.com') }}</p>
                    </div>
                    <div class="footer-contact-cell">
                        <h3>الهاتف</h3>
                        <p>{{ $siteSettings->get('contact_phone', '+971 50 1 592 592') }}</p>
                    </div>
                </div>
            </div>


        </div>

        {{-- Copyright row --}}
        <div class="elementor-element elementor-element-8c6c068 e-con-full e-flex e-con e-child" data-id="8c6c068" data-element_type="container">
            <div class="elementor-element elementor-element-d4f1e3b elementor-widget__width-inherit elementor-widget elementor-widget-elementskit-heading" data-id="d4f1e3b" data-element_type="widget" data-widget_type="elementskit-heading.default">
                <div class="ekit-wid-con">
                    <div class="ekit-heading elementskit-section-title-wraper text_center">
                        <p class="ekit-heading--title elementskit-section-title">© {{ date('Y') }} <span><span>الاتحاد العالمي الأكاديمي للتزيين C.M.A.C</span></span> — جميع الحقوق محفوظة &nbsp;|&nbsp; <a href="{{ route('admin.login') }}" style="color:inherit;opacity:0.5;">لوحة التحكم</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Scripts -->
<script src="{{ asset('vendor/cutisure/jquery.min.js.download') }}"></script>
<script src="{{ asset('vendor/cutisure/frontend.min.js.download') }}"></script>

<script>
// Mobile offcanvas menu
(function() {
    var hamburger    = document.getElementById('cmacHamburger');
    var menuPanel    = document.getElementById('ekit-megamenu-header-menu');
    var overlay      = document.querySelector('.elementskit-menu-overlay');
    var closeBtn     = document.getElementById('cmacMenuClose');

    function openMenu() {
        if (menuPanel) menuPanel.classList.add('active');
        if (overlay)   overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        if (menuPanel) menuPanel.classList.remove('active');
        if (overlay)   overlay.classList.remove('active');
        document.body.style.overflow = '';
        // close any open submenus
        document.querySelectorAll('.elementskit-dropdown-has.submenu-open')
            .forEach(function(li) { li.classList.remove('submenu-open'); });
    }

    if (hamburger) hamburger.addEventListener('click', openMenu);
    if (closeBtn)  closeBtn.addEventListener('click', closeMenu);
    if (overlay)   overlay.addEventListener('click', closeMenu);

    // Submenu toggle — capture phase to intercept EKit handlers
    document.querySelectorAll('.elementskit-dropdown-has > a').forEach(function(link) {
        link.addEventListener('click', function(e) {
            if (window.innerWidth <= 1024) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                var li       = this.closest('li');
                var isOpen   = li.classList.contains('submenu-open');
                var parentUl = li.parentElement;
                // close siblings
                if (parentUl) {
                    parentUl.querySelectorAll(':scope > .elementskit-dropdown-has.submenu-open')
                        .forEach(function(sib) { if (sib !== li) sib.classList.remove('submenu-open'); });
                }
                li.classList.toggle('submenu-open', !isOpen);
            }
        }, true); // capture phase: fires before EKit bubble handlers
    });
})();

// Counter animation on scroll
function animateCounter(el) {
    const target = parseInt(el.dataset.count);
    const suffix = el.dataset.suffix || '';
    let current = 0;
    const increment = target / 70;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        el.textContent = Math.floor(current).toLocaleString('ar') + suffix;
    }, 20);
}

const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.dataset.animated) {
            entry.target.dataset.animated = 'true';
            animateCounter(entry.target);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('[data-count]').forEach(el => counterObserver.observe(el));
</script>

@stack('scripts')
</body>
</html>
