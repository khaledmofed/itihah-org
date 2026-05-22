@extends('layouts.admin')

@section('title', 'إدارة الصفحات')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1">إدارة الصفحات</h4>
        <p class="text-muted small mb-0">تحكم في محتوى كل صفحة من صفحات الموقع</p>
    </div>
</div>

<div class="row g-4">
    @foreach($pages as $pageKey => $pageInfo)
    <div class="col-sm-6 col-md-4 col-lg-3">
        <a href="{{ route('admin.pages.edit', $pageKey) }}" class="text-decoration-none">
            <div class="admin-card p-4 h-100 page-card">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="page-card-icon" style="background: {{ $pageInfo['color'] }}20; color: {{ $pageInfo['color'] }};">
                        <i class="bi {{ $pageInfo['icon'] }}"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">{{ $pageInfo['label'] }}</h6>
                        <small class="text-muted">{{ $sectionCounts[$pageKey] ?? 0 }} قسم</small>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3 pt-3 border-top">
                    <span class="text-muted small">تعديل المحتوى</span>
                    <i class="bi bi-arrow-left text-muted"></i>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

@push('styles')
<style>
.page-card {
    transition: transform 0.2s, box-shadow 0.2s;
    cursor: pointer;
}
.page-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.1) !important;
}
.page-card-icon {
    width: 48px; height: 48px;
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.3rem;
    flex-shrink: 0;
}
</style>
@endpush

@endsection
