@extends('layouts.admin')

@section('title', 'تفاصيل طلب العضوية')

@section('content')

<div class="page-title-bar d-flex align-items-center justify-content-between">
    <h1><i class="bi bi-person-lines-fill me-2" style="color:var(--primary);"></i> تفاصيل طلب العضوية</h1>
    <a href="{{ route('admin.membership-requests.index') }}" class="btn btn-outline-secondary btn-sm rounded-3">
        <i class="bi bi-arrow-right me-1"></i> العودة للقائمة
    </a>
</div>

@if(session('success'))
<div class="alert alert-success rounded-3 mb-4">{{ session('success') }}</div>
@endif

<div class="row g-4">
    <div class="col-lg-8">
        <div class="admin-card card h-100">
            <div class="card-body">
                <h5 class="fw-bold mb-4">بيانات مقدّم الطلب</h5>
                <dl class="row mb-0">
                    <dt class="col-sm-4 text-muted">الاسم الكامل</dt>
                    <dd class="col-sm-8">{{ $membershipRequest->name }}</dd>

                    <dt class="col-sm-4 text-muted">البريد الإلكتروني</dt>
                    <dd class="col-sm-8" dir="ltr">{{ $membershipRequest->email }}</dd>

                    <dt class="col-sm-4 text-muted">الهاتف</dt>
                    <dd class="col-sm-8" dir="ltr">{{ $membershipRequest->phone ?? '—' }}</dd>

                    <dt class="col-sm-4 text-muted">الدولة</dt>
                    <dd class="col-sm-8">{{ $membershipRequest->country ?? '—' }}</dd>

                    <dt class="col-sm-4 text-muted">التخصص</dt>
                    <dd class="col-sm-8">{{ $membershipRequest->specialty }}</dd>

                    <dt class="col-sm-4 text-muted">سنوات الخبرة</dt>
                    <dd class="col-sm-8">
                        @php $exp = ['0-2'=>'أقل من سنتين','2-5'=>'من 2 إلى 5 سنوات','5-10'=>'من 5 إلى 10 سنوات','10+'=>'أكثر من 10 سنوات']; @endphp
                        {{ $exp[$membershipRequest->experience] ?? ($membershipRequest->experience ?? '—') }}
                    </dd>

                    @if($membershipRequest->notes)
                    <dt class="col-sm-4 text-muted">ملاحظات إضافية</dt>
                    <dd class="col-sm-8">{{ $membershipRequest->notes }}</dd>
                    @endif

                    <dt class="col-sm-4 text-muted">تاريخ الإرسال</dt>
                    <dd class="col-sm-8">{{ $membershipRequest->created_at->format('Y/m/d H:i') }}</dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-card card">
            <div class="card-body">
                <h5 class="fw-bold mb-4">تحديث الحالة</h5>
                <form action="{{ route('admin.membership-requests.update', $membershipRequest->id) }}" method="POST">
                    @csrf @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label text-muted small">الحالة الحالية</label>
                        <select name="status" class="form-select">
                            <option value="new"      {{ $membershipRequest->status === 'new'      ? 'selected' : '' }}>جديد</option>
                            <option value="read"     {{ $membershipRequest->status === 'read'     ? 'selected' : '' }}>مقروء</option>
                            <option value="approved" {{ $membershipRequest->status === 'approved' ? 'selected' : '' }}>مقبول</option>
                            <option value="rejected" {{ $membershipRequest->status === 'rejected' ? 'selected' : '' }}>مرفوض</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-3">حفظ الحالة</button>
                </form>

                <hr class="my-4">

                <form action="{{ route('admin.membership-requests.destroy', $membershipRequest->id) }}" method="POST"
                      onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100 rounded-3">
                        <i class="bi bi-trash me-1"></i> حذف الطلب
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
