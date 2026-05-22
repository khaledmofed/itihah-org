@extends('layouts.app')

@section('title', 'انضم إلينا')

@section('content')

<div class="elementor elementor-1671" dir="rtl">

@include('partials.hero', [
    'heroTitle'      => 'انضم إلينا',
    'heroDesc'       => 'كن جزءاً من الاتحاد العالمي الأكاديمي للتزيين وافتح آفاقاً جديدة في مسيرتك المهنية.',
    'heroBreadcrumb' => 'انضم إلينا',
])

<section class="section" style="background:var(--bg-light);">
    <div class="container">
        <div style="max-width:750px;margin:0 auto;">
            <div style="text-align:center;margin-bottom:45px;">
                <span class="section-label">كن جزءاً منا</span>
                <h2 class="section-title">انضم إلى الاتحاد العالمي الأكاديمي للتزيين</h2>
                <div class="section-divider"></div>
                <p class="section-desc">انضم إلى شبكة المهنيين الدوليين وافتح أمامك آفاقاً جديدة من النمو والتميز في مجال التزيين والتجميل. العضوية في الاتحاد تمنحك اعترافاً دولياً وفرصاً لا تُعدّ للتطوير المهني.</p>
            </div>

            {{-- Benefits --}}
            <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:16px;margin-bottom:40px;">
                @foreach([
                    ['icon'=>'fas fa-certificate','title'=>'شهادة عضوية دولية','desc'=>'شهادة معتمدة دولياً تُثبت انتماءك للاتحاد'],
                    ['icon'=>'fas fa-graduation-cap','title'=>'برامج تدريبية','desc'=>'الوصول إلى برامج تعليمية حصرية بأسعار مخفضة'],
                    ['icon'=>'fas fa-award','title'=>'الترشح للجوائز','desc'=>'إمكانية الترشح لجوائز وأوسمة الاتحاد الدولية'],
                    ['icon'=>'fas fa-globe','title'=>'شبكة دولية','desc'=>'التواصل مع محترفين من أكثر من 50 دولة'],
                ] as $benefit)
                <div style="background:#fff;border-radius:14px;padding:22px;display:flex;gap:14px;align-items:flex-start;box-shadow:0 4px 20px rgba(33,102,169,0.07);">
                    <div style="width:42px;height:42px;border-radius:10px;background:var(--bg-light);color:var(--primary);display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0;"><i class="{{ $benefit['icon'] }}"></i></div>
                    <div>
                        <div style="font-size:18px;font-weight:700;color:var(--text-dark);margin-bottom:4px;">{{ $benefit['title'] }}</div>
                        <div style="font-size:13px;color:var(--text-muted);line-height:1.5;">{{ $benefit['desc'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Form --}}
            <div style="background:#fff;border-radius:20px;box-shadow:0 8px 50px rgba(33,102,169,0.1);padding:40px;">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                </div>
                @endif

                <h4 style="font-family:'Cormorant','Tajawal',serif;font-size:1.5rem;font-weight:700;color:var(--text-dark);margin-bottom:25px;">نموذج طلب العضوية</h4>

                <form method="POST" action="{{ route('join.submit') }}">
                    @csrf
                    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:16px;margin-bottom:16px;">
                        <div class="form-group" style="margin:0;">
                            <label>الاسم الكامل</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="اسمك الكامل" required>
                        </div>
                        <div class="form-group" style="margin:0;">
                            <label>البريد الإلكتروني</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="example@email.com" required>
                        </div>
                    </div>
                    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:16px;margin-bottom:16px;">
                        <div class="form-group" style="margin:0;">
                            <label>الهاتف</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+971 50 000 0000">
                        </div>
                        <div class="form-group" style="margin:0;">
                            <label>الدولة</label>
                            <input type="text" name="country" value="{{ old('country') }}" placeholder="دولتك">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>التخصص في مجال التزيين</label>
                        <input type="text" name="specialty" value="{{ old('specialty') }}" placeholder="مثال: تصفيف الشعر، مكياج، عناية بالبشرة...">
                    </div>
                    <div class="form-group">
                        <label>سنوات الخبرة</label>
                        <select name="experience">
                            <option value="">اختر...</option>
                            <option value="0-2" {{ old('experience') === '0-2' ? 'selected' : '' }}>أقل من سنتين</option>
                            <option value="2-5" {{ old('experience') === '2-5' ? 'selected' : '' }}>من 2 إلى 5 سنوات</option>
                            <option value="5-10" {{ old('experience') === '5-10' ? 'selected' : '' }}>من 5 إلى 10 سنوات</option>
                            <option value="10+" {{ old('experience') === '10+' ? 'selected' : '' }}>أكثر من 10 سنوات</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ملاحظات إضافية (اختياري)</label>
                        <textarea name="notes" placeholder="أي معلومات إضافية تودّ مشاركتها...">{{ old('notes') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;cursor:pointer;text-align:center;">إرسال طلب العضوية</button>
                </form>
            </div>
        </div>
    </div>
</section>

</div>{{-- end .elementor-1671 --}}

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-1671.css') }}">
<style>
@media (max-width:600px) {
    div[style*="grid-template-columns:repeat(2,1fr)"] { grid-template-columns:1fr !important; }
}
</style>
@endpush
