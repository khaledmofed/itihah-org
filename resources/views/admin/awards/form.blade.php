@extends('layouts.admin')

@section('title', isset($award->id) ? 'تعديل الجائزة' : 'إضافة جائزة')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-award me-2" style="color:var(--primary);"></i>
        {{ isset($award->id) ? 'تعديل: ' . $award->title_ar : 'إضافة جائزة جديدة' }}
    </h1>
    <a href="{{ route('admin.awards.index') }}" class="btn btn-outline-secondary rounded-3">
        <i class="bi bi-arrow-right me-1"></i> العودة
    </a>
</div>

<div class="admin-card card">
    <div class="card-body">
        <form action="{{ isset($award->id) ? route('admin.awards.update', $award->id) : route('admin.awards.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($award->id)) @method('PUT') @endif

            @if($errors->any())
            <div class="alert alert-danger rounded-3 mb-4">
                <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">الاسم (عربي) <span class="text-danger">*</span></label>
                    <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $award->title_ar) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">الاسم (إنجليزي)</label>
                    <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $award->title_en) }}" dir="ltr">
                </div>
                <div class="col-md-6">
                    <label class="form-label">الوصف (عربي)</label>
                    <textarea name="description_ar" rows="4" class="form-control">{{ old('description_ar', $award->description_ar) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">معايير الترشيح (عربي)</label>
                    <textarea name="criteria_ar" rows="4" class="form-control">{{ old('criteria_ar', $award->criteria_ar) }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">أيقونة (Bootstrap Icons)</label>
                    <input type="text" name="icon" class="form-control" dir="ltr"
                        value="{{ old('icon', $award->icon) }}" placeholder="bi-trophy-fill">
                    @if(old('icon', $award->icon))
                    <div class="mt-2"><i class="bi {{ old('icon', $award->icon) }} fs-3" style="color:var(--primary);"></i></div>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="form-label">لون الوسام</label>
                    <input type="color" name="badge_color" class="form-control form-control-color"
                        value="{{ old('badge_color', $award->badge_color ?? '#2166A9') }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">الترتيب</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $award->order ?? 0) }}" min="0">
                </div>
                <div class="col-md-2">
                    <label class="form-label">الحالة</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                            {{ old('is_active', $award->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">مفعّل</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <label class="form-label">الصورة</label>
                    @if(isset($award->image) && $award->image)
                    <div class="mb-2"><img src="{{ Storage::url($award->image) }}" class="img-preview d-block mb-1"></div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5 rounded-3">
                        <i class="bi bi-check-lg me-1"></i> {{ isset($award->id) ? 'تحديث' : 'حفظ' }}
                    </button>
                    <a href="{{ route('admin.awards.index') }}" class="btn btn-light px-4 rounded-3 ms-2">إلغاء</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
