@extends('layouts.admin')

@section('title', isset($statistic->id) ? 'تعديل الإحصائية' : 'إضافة إحصائية')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-bar-chart me-2" style="color:var(--primary);"></i>
        {{ isset($statistic->id) ? 'تعديل الإحصائية' : 'إضافة إحصائية جديدة' }}
    </h1>
    <a href="{{ route('admin.statistics.index') }}" class="btn btn-outline-secondary rounded-3">
        <i class="bi bi-arrow-right me-1"></i> العودة
    </a>
</div>

<div class="admin-card card" style="max-width:600px;">
    <div class="card-body">
        <form action="{{ isset($statistic->id) ? route('admin.statistics.update', $statistic->id) : route('admin.statistics.store') }}"
            method="POST">
            @csrf
            @if(isset($statistic->id)) @method('PUT') @endif

            @if($errors->any())
            <div class="alert alert-danger rounded-3 mb-4">
                <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">التسمية (عربي) <span class="text-danger">*</span></label>
                    <input type="text" name="label_ar" class="form-control" value="{{ old('label_ar', $statistic->label_ar) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">التسمية (إنجليزي)</label>
                    <input type="text" name="label_en" class="form-control" value="{{ old('label_en', $statistic->label_en) }}" dir="ltr">
                </div>
                <div class="col-md-4">
                    <label class="form-label">القيمة <span class="text-danger">*</span></label>
                    <input type="text" name="value" class="form-control" value="{{ old('value', $statistic->value) }}" required placeholder="25">
                </div>
                <div class="col-md-4">
                    <label class="form-label">اللاحقة</label>
                    <input type="text" name="suffix" class="form-control" value="{{ old('suffix', $statistic->suffix) }}" placeholder="+، %, عاماً">
                </div>
                <div class="col-md-4">
                    <label class="form-label">الترتيب</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $statistic->order ?? 0) }}" min="0">
                </div>
                <div class="col-md-8">
                    <label class="form-label">الأيقونة (Bootstrap Icons)</label>
                    <input type="text" name="icon" class="form-control" dir="ltr"
                        value="{{ old('icon', $statistic->icon) }}" placeholder="bi-globe, bi-people-fill...">
                </div>
                <div class="col-md-4">
                    <label class="form-label">الحالة</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                            {{ old('is_active', $statistic->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">مفعّل</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5 rounded-3">
                        <i class="bi bi-check-lg me-1"></i> {{ isset($statistic->id) ? 'تحديث' : 'حفظ' }}
                    </button>
                    <a href="{{ route('admin.statistics.index') }}" class="btn btn-light px-4 rounded-3 ms-2">إلغاء</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
