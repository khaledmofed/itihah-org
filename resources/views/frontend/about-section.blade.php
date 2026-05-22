@extends('layouts.app')

@section('title', $section->title_ar)

@section('content')

<div class="elementor elementor-1671" dir="rtl">

@include('partials.hero', [
    'heroTitle'      => $section->title_ar,
    'heroDesc'       => null,
    'heroBreadcrumb' => 'عن المنظمة',
])

<section class="section" style="background:#fff;">
    <div class="container">
        <div class="row">
            {{-- Main Content --}}
            <div class="col-lg-8">
                @if($section->image)
                <div style="border-radius:20px;overflow:hidden;margin-bottom:35px;height:380px;">
                    <img src="{{ Storage::url($section->image) }}" style="width:100%;height:100%;object-fit:cover;" alt="{{ $section->title_ar }}">
                </div>
                @endif

                <h2 style="font-family:'Cormorant','Tajawal',serif;font-size:clamp(1.5rem,2.5vw,2.2rem);font-weight:700;color:var(--text-dark);margin-bottom:20px;">{{ $section->title_ar }}</h2>
                <div style="font-size:18px;color:var(--text-muted);line-height:1.9;">
                    {!! nl2br(e($section->content_ar)) !!}
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">
                <div style="background:#fff;border-radius:18px;box-shadow:0 4px 30px rgba(33,102,169,0.08);padding:28px;position:sticky;top:100px;">
                    <h6 style="font-size:14px;font-weight:700;color:var(--primary);margin-bottom:16px;text-transform:uppercase;letter-spacing:1px;">أقسام عن المنظمة</h6>
                    <nav style="display:flex;flex-direction:column;gap:4px;">
                        @foreach($sections as $key => $s)
                        @if($s->is_active)
                        <a href="{{ route('about.section', $key) }}"
                            style="display:flex;align-items:center;gap:10px;text-decoration:none;padding:10px 14px;border-radius:10px;font-size:16px;font-weight:500;transition:all 0.2s;
                                {{ $s->section_key === $section->section_key ? 'background:var(--bg-light);color:var(--primary);font-weight:700;' : 'color:var(--text-muted);' }}">
                            @if($s->icon)
                            <i class="bi {{ $s->icon }}" style="font-size:13px;"></i>
                            @endif
                            {{ $s->title_ar }}
                        </a>
                        @endif
                        @endforeach
                    </nav>
                    <div style="margin-top:20px;padding-top:20px;border-top:1px solid var(--bg-light);">
                        <a href="{{ route('about') }}" class="elementor-button elementor-button-link elementor-size-sm w-100">
                            <i class="fas fa-th-large" style="margin-left:6px;"></i> جميع الأقسام
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>{{-- end .elementor-1671 --}}

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-1671.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
.w-100 { width: 100%; }
.btn.w-100 { text-align: center; display: block; }
</style>
@endpush
