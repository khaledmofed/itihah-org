@extends('layouts.admin')

@section('title', isset($event->id) ? 'تعديل الفعالية' : 'إضافة فعالية')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-calendar-event me-2" style="color:var(--primary);"></i>
        {{ isset($event->id) ? 'تعديل: ' . Str::limit($event->title_ar, 40) : 'إضافة فعالية جديدة' }}
    </h1>
    <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary rounded-3">
        <i class="bi bi-arrow-right me-1"></i> العودة
    </a>
</div>

<div class="admin-card card">
    <div class="card-body">
        <form action="{{ isset($event->id) ? route('admin.events.update', $event->id) : route('admin.events.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($event->id)) @method('PUT') @endif

            @if($errors->any())
            <div class="alert alert-danger rounded-3 mb-4">
                <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label">العنوان (عربي) <span class="text-danger">*</span></label>
                    <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $event->title_ar) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">العنوان (إنجليزي)</label>
                    <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $event->title_en) }}" dir="ltr">
                </div>
                <div class="col-md-4">
                    <label class="form-label">التصنيف <span class="text-danger">*</span></label>
                    <select name="category" class="form-select" required>
                        <option value="">اختر التصنيف</option>
                        @foreach(['forum' => 'الملتقى المهني التجميلي', 'top_beauty' => 'التوب بيوتي', 'profession_day_celebration' => 'احتفال يوم المهنة العالمي'] as $val => $label)
                        <option value="{{ $val }}" {{ old('category', $event->category) == $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">تاريخ الفعالية</label>
                    <input type="date" name="event_date" class="form-control"
                        value="{{ old('event_date', $event->event_date?->format('Y-m-d')) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">الترتيب</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $event->order ?? 0) }}" min="0">
                </div>
                <div class="col-md-6">
                    <label class="form-label">المكان (عربي)</label>
                    <input type="text" name="location_ar" class="form-control" value="{{ old('location_ar', $event->location_ar) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">المكان (إنجليزي)</label>
                    <input type="text" name="location_en" class="form-control" value="{{ old('location_en', $event->location_en) }}" dir="ltr">
                </div>
                <div class="col-md-6">
                    <label class="form-label">الوصف (عربي)</label>
                    <textarea name="description_ar" rows="5" class="form-control">{{ old('description_ar', $event->description_ar) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">الوصف (إنجليزي)</label>
                    <textarea name="description_en" rows="5" class="form-control" dir="ltr">{{ old('description_en', $event->description_en) }}</textarea>
                </div>
                <div class="col-md-2">
                    <label class="form-label">الحالة</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                            {{ old('is_active', $event->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">مفعّل</label>
                    </div>
                </div>
                <div class="col-md-10">
                    <label class="form-label">الصورة الرئيسية</label>
                    @if(isset($event->image) && $event->image)
                    <div class="mb-2"><img src="{{ Storage::url($event->image) }}" class="img-preview d-block mb-1"></div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5 rounded-3">
                        <i class="bi bi-check-lg me-1"></i> {{ isset($event->id) ? 'تحديث' : 'حفظ' }}
                    </button>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-light px-4 rounded-3 ms-2">إلغاء</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
