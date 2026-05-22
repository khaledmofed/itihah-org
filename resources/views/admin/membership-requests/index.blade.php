@extends('layouts.admin')

@section('title', 'طلبات العضوية')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-person-plus me-2" style="color:var(--primary);"></i> طلبات العضوية</h1>
</div>

@if(session('success'))
<div class="alert alert-success rounded-3 mb-4">{{ session('success') }}</div>
@endif

<div class="admin-card card">
    <div class="card-body p-0">
        @if($requests->count())
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد / الهاتف</th>
                        <th>الدولة</th>
                        <th>التخصص</th>
                        <th>الخبرة</th>
                        <th>الحالة</th>
                        <th>تاريخ الإرسال</th>
                        <th width="100">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $r)
                    <tr style="{{ $r->status === 'new' ? 'font-weight:600;' : '' }}">
                        <td>{{ $r->name }}</td>
                        <td>
                            <div dir="ltr">{{ $r->email }}</div>
                            @if($r->phone)<div class="text-muted small" dir="ltr">{{ $r->phone }}</div>@endif
                        </td>
                        <td>{{ $r->country ?? '—' }}</td>
                        <td style="max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $r->specialty }}</td>
                        <td>
                            @php $exp = ['0-2'=>'أقل من سنتين','2-5'=>'2-5 سنوات','5-10'=>'5-10 سنوات','10+'=>'أكثر من 10']; @endphp
                            {{ $exp[$r->experience] ?? ($r->experience ?? '—') }}
                        </td>
                        <td>
                            @php
                                $badge = match($r->status) {
                                    'new'      => 'bg-primary',
                                    'read'     => 'bg-secondary',
                                    'approved' => 'bg-success',
                                    'rejected' => 'bg-danger',
                                    default    => 'bg-secondary',
                                };
                                $label = match($r->status) {
                                    'new'      => 'جديد',
                                    'read'     => 'مقروء',
                                    'approved' => 'مقبول',
                                    'rejected' => 'مرفوض',
                                    default    => $r->status,
                                };
                            @endphp
                            <span class="badge rounded-pill {{ $badge }}">{{ $label }}</span>
                        </td>
                        <td class="text-muted small">{{ $r->created_at->format('Y/m/d H:i') }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.membership-requests.show', $r->id) }}"
                                   class="btn btn-sm btn-outline-primary rounded-2" title="عرض التفاصيل">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin.membership-requests.destroy', $r->id) }}" method="POST"
                                      onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-2" title="حذف">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-3">{{ $requests->links() }}</div>
        @else
        <div class="text-center py-5 text-muted">
            <i class="bi bi-person-x display-3 d-block mb-3 opacity-25"></i>
            <p>لا توجد طلبات عضوية بعد</p>
        </div>
        @endif
    </div>
</div>

@endsection
