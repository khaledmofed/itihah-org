@extends('layouts.admin')

@section('title', 'تعديل صفحة: ' . $pageInfo['label'])

@section('content')

<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-right me-1"></i> الصفحات
    </a>
    <div>
        <h4 class="fw-bold mb-0">
            <i class="bi {{ $pageInfo['icon'] }}" style="color: {{ $pageInfo['color'] }};"></i>
            {{ $pageInfo['label'] }}
        </h4>
        <p class="text-muted small mb-0">تعديل محتوى أقسام الصفحة</p>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show rounded-3 mb-4">
    <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @foreach($pageSections as $sectionKey => $sectionDef)
    <div class="admin-card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <div class="section-dot" style="background: {{ $pageInfo['color'] }};"></div>
                <span>{{ $sectionDef['label'] }}</span>
            </div>
            @if(isset($sectionDef['resource_link']))
            <a href="{{ route($sectionDef['resource_link']['route']) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                <i class="bi bi-box-arrow-up-left me-1"></i>
                {{ $sectionDef['resource_link']['label'] }}
            </a>
            @endif
        </div>
        <div class="card-body">
            <div class="row g-3">
                @foreach($sectionDef['fields'] as $field)
                @php
                    $currentVal = $currentValues[$sectionKey][$field['key']] ?? '';
                    $inputName  = "sections[{$sectionKey}][{$field['key']}]";
                @endphp

                <div class="{{ $field['type'] === 'textarea' ? 'col-12' : 'col-md-6' }}">
                    <label class="form-label fw-semibold small">{{ $field['label'] }}</label>

                    @if($field['type'] === 'textarea')
                        <textarea name="{{ $inputName }}" class="form-control" rows="3" dir="rtl">{{ $currentVal }}</textarea>

                    @elseif($field['type'] === 'image')
                        <div class="d-flex align-items-start gap-3">
                            @if($currentVal)
                            <div class="current-image-preview">
                                @if(str_starts_with($currentVal, 'uploads/'))
                                    <img src="{{ Storage::url($currentVal) }}" alt="">
                                @else
                                    <img src="{{ asset('images/' . $currentVal) }}" alt="">
                                @endif
                                <span class="current-label">الصورة الحالية</span>
                            </div>
                            @endif
                            <div class="flex-1 w-100">
                                <input type="file" name="{{ $inputName }}" class="form-control" accept="image/*">
                                @if($currentVal)
                                <small class="text-muted">اترك فارغاً للإبقاء على الصورة الحالية</small>
                                @endif
                                @if(!empty($field['hint']))
                                <small class="text-info d-block mt-1"><i class="bi bi-info-circle me-1"></i>{{ $field['hint'] }}</small>
                                @endif
                            </div>
                        </div>

                    @elseif($field['type'] === 'url')
                        <input type="url" name="{{ $inputName }}" class="form-control" dir="ltr" value="{{ $currentVal }}" placeholder="https://...">

                    @else
                        <input type="text" name="{{ $inputName }}" class="form-control" dir="rtl" value="{{ $currentVal }}">
                    @endif
                </div>
                @endforeach
            </div>

            @if(isset($sectionDef['resource_link']))
            <div class="alert alert-light border mt-3 mb-0 small text-muted">
                <i class="bi bi-info-circle me-1"></i>
                محتوى هذا القسم (العناصر المتعددة) يُدار من:
                <a href="{{ route($sectionDef['resource_link']['route']) }}" class="fw-semibold">{{ $sectionDef['resource_link']['label'] }}</a>
            </div>
            @endif
        </div>
    </div>
    @endforeach

    <div class="d-flex gap-3 mt-2">
        <button type="submit" class="btn btn-primary px-5">
            <i class="bi bi-floppy me-2"></i> حفظ التغييرات
        </button>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary px-4">إلغاء</a>
    </div>

</form>

@push('styles')
<style>
.section-dot {
    width: 10px; height: 10px;
    border-radius: 50%;
    flex-shrink: 0;
}
.current-image-preview {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
    flex-shrink: 0;
}
.current-image-preview img {
    width: 80px; height: 60px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #dee2e6;
}
.current-label {
    font-size: 10px;
    color: #6c757d;
}
.flex-1 { flex: 1; }
</style>
@endpush

@endsection
