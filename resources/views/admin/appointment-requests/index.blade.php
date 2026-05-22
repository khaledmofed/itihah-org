@extends('layouts.admin')

@section('title', 'طلبات المواعيد')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-calendar-check me-2" style="color:var(--primary);"></i> طلبات المواعيد</h1>
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
                        <th>التاريخ والوقت</th>
                        <th>الرسالة</th>
                        <th>الحالة</th>
                        <th>تاريخ الإرسال</th>
                        <th width="80">حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $r)
                    <tr style="{{ $r->status === 'new' ? 'font-weight:600;' : '' }}">
                        <td>{{ $r->name }}</td>
                        <td>
                            <div dir="ltr">{{ $r->email }}</div>
                            @if($r->phone) <div class="text-muted small" dir="ltr">{{ $r->phone }}</div> @endif
                        </td>
                        <td>
                            @if($r->appointment_date)
                            <div>{{ \Carbon\Carbon::parse($r->appointment_date)->format('Y/m/d') }}</div>
                            @endif
                            @if($r->appointment_time)
                            <div class="text-muted small">{{ $r->appointment_time }}</div>
                            @endif
                        </td>
                        <td><div style="max-width:260px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-size:13px;">{{ $r->message ?? '—' }}</div></td>
                        <td>
                            @php $badge = match($r->status) { 'new' => 'bg-primary', 'read' => 'bg-secondary', default => 'bg-success' }; @endphp
                            <span class="badge rounded-pill {{ $badge }}">
                                {{ match($r->status) { 'new' => 'جديد', 'read' => 'مقروء', default => 'مجاب' } }}
                            </span>
                        </td>
                        <td class="text-muted small">{{ $r->created_at->format('Y/m/d H:i') }}</td>
                        <td>
                            <form action="{{ route('admin.appointment-requests.destroy', $r->id) }}" method="POST"
                                onsubmit="return confirm('هل أنت متأكد؟')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-2"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-3">{{ $requests->links() }}</div>
        @else
        <div class="text-center py-5 text-muted">
            <i class="bi bi-calendar-x display-3 d-block mb-3 opacity-25"></i>
            <p>لا توجد طلبات مواعيد بعد</p>
        </div>
        @endif
    </div>
</div>

@endsection
