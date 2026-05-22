@extends('layouts.admin')

@section('title', 'المستخدمون')

@section('content')

<div class="page-title-bar">
    <h1><i class="bi bi-people me-2" style="color:var(--primary);"></i> المستخدمون</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary rounded-3">
        <i class="bi bi-plus-lg me-1"></i> إضافة مستخدم
    </a>
</div>

<div class="admin-card card">
    <div class="card-body p-0">
        @if($users->count())
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>الدور</th>
                        <th>آخر دخول</th>
                        <th>الحالة</th>
                        <th width="140">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                                    style="width:36px;height:36px;background:var(--primary);font-size:0.9rem;flex-shrink:0;">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <span class="fw-bold">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td dir="ltr">{{ $user->email }}</td>
                        <td>
                            <span class="badge rounded-pill bg-primary">{{ $user->role ?? 'مدير' }}</span>
                        </td>
                        <td>{{ $user->last_login?->diffForHumans() ?? 'لم يدخل بعد' }}</td>
                        <td>
                            <span class="badge rounded-pill {{ $user->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $user->is_active ? 'نشط' : 'معطّل' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                @if($user->id !== auth('admin')->id())
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('هل أنت متأكد؟')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-2"><i class="bi bi-trash"></i></button>
                                </form>
                                @else
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary rounded-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <span class="badge bg-light text-muted">أنت</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-5 text-muted">
            <i class="bi bi-people display-3 d-block mb-3 opacity-25"></i>
            <p>لا يوجد مستخدمون بعد</p>
        </div>
        @endif
    </div>
</div>

@endsection
