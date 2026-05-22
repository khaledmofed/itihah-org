@extends('layouts.admin')

@section('title', isset($user->id) ? 'تعديل المستخدم' : 'إضافة مستخدم')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-person me-2" style="color:var(--primary);"></i>
        {{ isset($user->id) ? 'تعديل: ' . $user->name : 'إضافة مستخدم جديد' }}
    </h1>
    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary rounded-3">
        <i class="bi bi-arrow-right me-1"></i> العودة
    </a>
</div>

<div class="admin-card card" style="max-width:600px;">
    <div class="card-body">
        <form action="{{ isset($user->id) ? route('admin.users.update', $user->id) : route('admin.users.store') }}"
            method="POST">
            @csrf
            @if(isset($user->id)) @method('PUT') @endif

            @if($errors->any())
            <div class="alert alert-danger rounded-3 mb-4">
                <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif

            <div class="row g-4">
                <div class="col-12">
                    <label class="form-label">الاسم <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label">البريد الإلكتروني <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required dir="ltr">
                </div>
                <div class="col-12">
                    <label class="form-label">
                        كلمة المرور {{ isset($user->id) ? '(اتركها فارغة إن لم تريد التغيير)' : '' }}
                        {{ !isset($user->id) ? '<span class="text-danger">*</span>' : '' }}
                    </label>
                    <input type="password" name="password" class="form-control" {{ !isset($user->id) ? 'required' : '' }}>
                </div>
                @if(!isset($user->id) || true)
                <div class="col-12">
                    <label class="form-label">تأكيد كلمة المرور {{ !isset($user->id) ? '<span class="text-danger">*</span>' : '' }}</label>
                    <input type="password" name="password_confirmation" class="form-control" {{ !isset($user->id) ? 'required' : '' }}>
                </div>
                @endif
                <div class="col-md-6">
                    <label class="form-label">الدور</label>
                    <select name="role" class="form-select">
                        <option value="admin" {{ old('role', $user->role ?? 'admin') === 'admin' ? 'selected' : '' }}>مدير</option>
                        <option value="editor" {{ old('role', $user->role) === 'editor' ? 'selected' : '' }}>محرر</option>
                        <option value="viewer" {{ old('role', $user->role) === 'viewer' ? 'selected' : '' }}>مشاهد</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">الحالة</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                            {{ old('is_active', $user->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">نشط</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5 rounded-3">
                        <i class="bi bi-check-lg me-1"></i> {{ isset($user->id) ? 'تحديث' : 'إنشاء الحساب' }}
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-light px-4 rounded-3 ms-2">إلغاء</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
