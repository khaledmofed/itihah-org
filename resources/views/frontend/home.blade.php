@extends('layouts.app')

@section('title', 'الاتحاد العالمي الأكاديمي للتزيين - C.M.A.C')

@php
use App\Models\PageSection;
$ps = fn(string $section, string $key, string $default = '') =>
    PageSection::getValue('home', $section, $key, $default);
@endphp

@push('styles')
<link rel="stylesheet" href="{{ asset('css/post-265.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/cutisure/metform-ui.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/cutisure/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/cutisure/widget-icon-list.min.css') }}">
<style>
/* RTL overrides for Elementor sections */
.elementor-265 { direction: rtl; text-align: right; }
.elementor-265 .elementor-heading-title { font-family: 'Cormorant', 'Tajawal', serif !important; }
.elementor-265 .elementor-widget-text-editor p { font-family: 'Tajawal', 'DM Sans', sans-serif;       font-size: 20px; }
.elementor-265 .elementor-element.elementor-element-6efb2fa.e-con-full.e-flex.e-con.e-parent.e-lazyloaded .elementor-widget-text-editor p {
    color: #000000;
    font-weight: 500;
}
.elementor-1671 .elementor-element.elementor-element-446b914.elementor-view-framed .elementor-icon, .elementor-1671 .elementor-element.elementor-element-446b914.elementor-view-default .elementor-icon svg {
    fill: #ffffff;
}
.elementor-1671 .elementor-element.elementor-element-9df9bd0.elementor-element {
    --align-self: center;
    color: #ffffff;
}
.elementor-265 h6.elementor-heading-title { font-family: 'Tajawal', 'DM Sans', sans-serif !important; font-weight: 600; }
/* Hero mini-stat cards RTL */
.elementor-element-c6d4fa0 { direction: rtl; }
/* RTL: بطاقات الخدمات — في post-265.css العمود الأول كان text-align:end وهو في RTL يصبح يساراً */
.elementor-265 .elementor-widget-image-box .elementor-image-box-wrapper,
.elementor-265 .elementor-widget-image-box .elementor-image-box-content {
    text-align: start !important;
}
/* Service cards: icon instead of stock PNG */
.elementor-265 figure.elementor-image-box-img { margin: 0 0 12px 0; display: flex; justify-content: flex-start; align-items: center; }
.elementor-265 .cmac-service-icon {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: var(--e-global-color-651faef, #DEEFF8);
    color: var(--e-global-color-secondary, #2166A9);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.45rem;
    line-height: 1;
    flex-shrink: 0;
}
.elementor-265 .cmac-service-icon i { line-height: 1; }
/* Icon box RTL */
.elementor-icon-box-content { text-align: right !important; }
/* SVG icons in icon-box */
.ekit-svg-icon { display:inline-block; vertical-align:middle; }
/* Floating hero icons — force white fill */
.elementor-265 .elementor-element.elementor-element-5ef4cde.elementor-view-stacked .elementor-icon svg,
.elementor-265 .elementor-element.elementor-element-4da2c12.elementor-view-stacked .elementor-icon svg { fill: #2166a9; }
/* Testimonials */
.cmac-testimonial-card { display:flex; flex-direction:column; }
/* Appointment form */
.elementor-element-6c23bbc .form-group label { display:block; font-size:14px; font-weight:600; color:#555; margin-bottom:6px; }
.elementor-element-6c23bbc input[type="text"],
.elementor-element-6c23bbc input[type="email"],
.elementor-element-6c23bbc input[type="tel"],
.elementor-element-6c23bbc input[type="date"],
.elementor-element-6c23bbc select,
.elementor-element-6c23bbc textarea { width:100%; padding:11px 14px; border:1.5px solid #e9ecef; border-radius:8px; font-size:14px; font-family:'Tajawal',sans-serif; color:#333; background:#fff; transition:border-color 0.2s; }
.elementor-element-6c23bbc input:focus,
.elementor-element-6c23bbc select:focus,
.elementor-element-6c23bbc textarea:focus { outline:none; border-color:var(--e-global-color-secondary,#2166A9); }
.elementor-element-6c23bbc textarea { min-height:110px; resize:vertical; }
.elementor-element-6c23bbc .form-group { margin-bottom:16px; }
/* صف الموعد: التاريخ والوقت جنب بعض (RTL) */
.elementor-265 .elementor-element.elementor-element-bb3961e.e-con-full.e-flex {
    --flex-direction: row !important;
    --flex-wrap: nowrap;
    gap: 12px;
}
.elementor-265 .elementor-element.elementor-element-bb3961e > .elementor-widget.elementor-element-f302977,
.elementor-265 .elementor-element.elementor-element-bb3961e > .elementor-widget.elementor-element-b5f506f {
    flex: 1 1 0;
    min-width: 0;
    width: auto !important;
    max-width: none !important;
}
@media (max-width: 640px) {
    .elementor-265 .elementor-element.elementor-element-bb3961e.e-con-full.e-flex {
        --flex-direction: column !important;
        gap: 0;
    }
    .elementor-265 .elementor-element.elementor-element-bb3961e > .elementor-widget.elementor-element-f302977,
    .elementor-265 .elementor-element.elementor-element-bb3961e > .elementor-widget.elementor-element-b5f506f {
        flex: 1 1 auto;
        width: 100% !important;
        max-width: 100% !important;
    }
}
@media (max-width:900px) {
    .elementor-element-6c23bbc .e-con-inner > div[style*="grid-template-columns:1fr 1fr"] { grid-template-columns:1fr !important; }
    .elementor-element-6c23bbc div[style*="grid-template-columns:1fr 1fr"] { grid-template-columns:1fr !important; }
}
@media (max-width:600px) {
    .elementor-element-c31b507 div[style*="grid-template-columns:repeat(auto-fill"] { grid-template-columns:1fr !important; }
}
</style>
@endpush

@section('content')
<div class="elementor elementor-265" dir="rtl">

{{-- ===== SECTION 1: HERO ===== --}}
<div class="elementor-element elementor-element-6efb2fa e-con-full e-flex e-con e-parent e-lazyloaded" data-id="6efb2fa" data-element_type="container">
    <div class="elementor-element elementor-element-3b313cc e-con-full e-flex e-con e-child" data-id="3b313cc" data-element_type="container">
        <div class="elementor-element elementor-element-819f0d6 e-con-full e-flex e-con e-child" data-id="819f0d6" data-element_type="container">
            <div class="elementor-element elementor-element-1d2f1b5 e-con-full e-flex e-con e-child" data-id="1d2f1b5" data-element_type="container">
                <div class="elementor-element elementor-element-268d2bd elementor-widget elementor-widget-heading" data-id="268d2bd" data-element_type="widget" data-widget_type="heading.default">
                    <h1 class="elementor-heading-title elementor-size-default">{{ $siteSettings->get('hero_heading', 'ارتقِ بمهنتك إلى المستوى العالمي') }}</h1>
                </div>
                <div class="elementor-element elementor-element-2a59347 elementor-widget elementor-widget-text-editor" data-id="2a59347" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>{{ $siteSettings->get('hero_subtext', 'منظمة دولية متخصصة في تعليم وتطوير مهنة التزيين والتجميل، تأسست قبل 25 عاماً وتضم خبراء من أكثر من 50 دولة حول العالم.') }}</p>
                </div>
                <div class="elementor-element elementor-element-f3865cb elementor-widget elementor-widget-button" data-id="f3865cb" data-element_type="widget" data-widget_type="button.default">
                    <a class="elementor-button elementor-button-link elementor-size-sm hero-btn" href="{{ route('join') }}">
                        <span class="elementor-button-content-wrapper">
                            <span class="elementor-button-text">{{ $siteSettings->get('hero_btn_text', 'انضم إلينا الآن') }}</span>
                        </span>
                    </a>
                </div>

                {{-- Hero Statistics --}}
                <div class="hero-stats-bar">
                    @forelse($statistics as $stat)
                    <div class="stat-item">
                        <div class="stat-num">{{ $stat->value }}{{ $stat->suffix }}</div>
                        <div class="stat-label">{{ $stat->label_ar }}</div>
                    </div>
                    @empty
                    <div class="stat-item"><div class="stat-num">25+</div><div class="stat-label">عاماً من الخبرة</div></div>
                    <div class="stat-item"><div class="stat-num">50+</div><div class="stat-label">دولة عضو</div></div>
                    <div class="stat-item"><div class="stat-num">1000+</div><div class="stat-label">خبير معتمد</div></div>
                    <div class="stat-item"><div class="stat-num">5000+</div><div class="stat-label">طالب وطالبة</div></div>
                    @endforelse
                </div>
            </div>
            <div class="elementor-element elementor-element-4cbae86 elementor-widget__width-initial elementor-widget-tablet__width-auto elementor-absolute elementor-widget elementor-widget-image" data-id="4cbae86" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}">
                @if($siteSettings->get('hero_badge_image'))
                <img fetchpriority="high" src="{{ Storage::url($siteSettings->get('hero_badge_image')) }}" class="attachment-full size-full" alt="C.M.A.C" style="max-width:40%;">
                @else
                <img fetchpriority="high" src="{{ asset('images/w.png') }}" class="attachment-full size-full" alt="C.M.A.C" style="max-width:100%;">
                @endif
            </div>
        </div>
<div class="elementor-element elementor-element-de4dc8b e-con-full e-flex e-con e-child" data-id="de4dc8b" data-element_type="container">

<style>

.hero-wrap{    display: flex;
    gap: 24px;
    padding: 0px;}
.hero-left{flex: 1 1 64%;
    background: #8ac2e0;
    border-radius: 20px;
    position: relative;
    overflow: hidden;
    min-height: 470px;
    display: flex;
    align-items: center;
    padding: 44px 40px;}
.hero-text{position:relative;z-index:2;max-width:340px}
.hero-text h1{font-family:'Playfair Display',serif;font-size:clamp(28px,3.5vw,44px);font-weight:700;color:#1a3330;line-height:1.2;margin-bottom:14px}
.hero-text p{font-size:16px;color:#2d5550;line-height:1.7;margin-bottom:28px;}
.hero-btn{display:inline-block;background:#fff;color:#1a3330;font-size:16px;font-weight:600;padding:11px 26px;border-radius:50px;text-decoration:none;border:none;cursor:pointer}
.hero-img{    position: absolute;
    left: -72px;
    top: 0;
    height: 105%;
    width: 70%;
    z-index: 1;
    pointer-events: none;}
.hero-right{    flex: 1 1 34%;
    display: flex;
    flex-direction: column;
    gap: 5px;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    padding: 0px;}
.video-card{background:#fff;overflow:hidden;flex:1}
.video-thumb{position:relative;background:#c8e8e4;    height: 280px;
    border-radius: 14px;overflow:hidden}
.video-thumb img{width:100%;height:100%;object-fit:cover}
.play-btn{position:absolute;top:38%;left:50%;transform:translate(-50%,-50%);width:52px;height:52px;background:rgba(255,255,255,0.92);border-radius:50%;display:flex;align-items:center;justify-content:center}
.play-btn svg{width:18px;height:18px;fill:#1a3330;margin-left:0px}
.video-info{padding:14px 16px 16px}
.video-border{    border-right: 3px solid #2166a9;
    padding-right: 12px;}
.hero-left:before {
    background-image: url(https://fahad.net.sa/wp-content/uploads/2026/05/b.png);
    --background-overlay: '';
    /*background-position: 495px 80px;*/
    background-repeat: no-repeat;
    background-size: 480px auto;
    content: " ";
    display: block;
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
}
.video-border h3{font-family:'DM Sans',sans-serif;font-size:14px;font-weight:500;color:#1a3330;line-height:1.4}
.stats-row{    background: #2166a9;
    border-radius: 14px;
    padding: 10px 18px;
    display: flex;
    align-items: center;
    gap: 10px;}
.avatars{display:flex}
.avatars img{width:40px;height:40px;border-radius:50%;border:2.5px solid #2db5a8;margin-right:-10px;object-fit:cover}
.plus-circle{width:40px;height:40px;border-radius:50%;background:#fff;border:2.5px solid #2db5a8;display:flex;align-items:center;justify-content:center;margin-right:4px;flex-shrink:0}
.plus-circle svg{width:14px;height:14px;fill:#1a3330}
.stats-text{margin-right:6px;line-height: 20px;}
.stats-text strong{display:block;font-size:14px;font-weight:600;color:#fff}
.stats-text span{font-size:14px;color:rgba(255,255,255,0.8)}


.slider-wrap{width:100%;}
.slide{position:relative;border-radius:15px;overflow:hidden;background:#8ac2e000;cursor:pointer;transition:opacity 0.4s,transform 0.4s}
.hero-main-view{position:relative;width:100%;height:160px;overflow:hidden;border-radius:15px 15px 0 0;background:#0f1715}
.hero-main-media{position:relative;width:100%;height:100%;background:#0f1715}
.hero-main-media video,.hero-main-media iframe,.hero-main-media .hero-main-preview-img{width:100%;height:100%;display:block;border:0;vertical-align:top;object-fit:cover}
.hero-main-media video{object-fit:cover}
.hero-main-media iframe{background:#000}
.hero-main-preview-fb{width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:#1a1a1a;color:#5a6a66;font-size:32px;font-weight:600}
.slide-info{background:#fff;padding:5px 14px 10px;border-radius:0 0 20px 20px}
.slide-border{  }
.slide-border h3{font-size:13px;font-weight:500;color:#1a3330;line-height:1.4;    margin-bottom: 8px !important;}
.play-overlay{position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;display:flex;align-items:center;justify-content:center;background:rgb(33 102 169 / 19%);cursor:pointer}
@keyframes play-pulse {
    0%   { box-shadow: 0 0 0 0 rgba(255,255,255,0.55); }
    70%  { box-shadow: 0 0 0 14px rgba(255,255,255,0); }
    100% { box-shadow: 0 0 0 0 rgba(255,255,255,0); }
}
.play-btn{
    width: 48px;
    height: 48px;
    background: rgb(255 255 255 / 23%);
    border: 2px solid #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: play-pulse 2s ease-out infinite;
}
.play-btn svg{width:16px;height:16px;fill:#fff;margin-left:0px}
.slides-list{display:flex;flex-direction:column;gap:5px;margin-top:10px}
.thumb-item{display:flex;gap:10px;align-items:center;cursor:pointer; transition:opacity 0.3s;border-radius:10px;padding:6px;background:#fff;border:1px solid #e0f0ee}
.thumb-item.active{    opacity: 1;
    border-color: #d5e2ef63;
    background: #d5e2ef63;}
.thumb-item video,.thumb-item .thumb-media,.thumb-item .thumb-media img,.thumb-item .thumb-media .thumb-media-fallback{width:95px;height:55px;object-fit:cover;border-radius:8px;flex-shrink:0;background:#000;pointer-events:none}
.thumb-item .thumb-media .thumb-media-fallback{display:flex;align-items:center;justify-content:center;object-fit:initial;font-size:12px;font-weight:600;color:#fff}
.thumb-item .thumb-media{display:flex;align-items:center;justify-content:center;background:#1a1a1a;color:#fff;font-size:11px;font-weight:600;overflow:hidden}
.thumb-item .thumb-media img{display:block}
.thumb-label{flex:1;min-width:0;display:flex;flex-direction:column;gap:2px;justify-content:center;font-size:12px;color:#1a3330;font-weight:400;line-height:1.25}
.thumb-title{display:block;font-size:14px;font-weight:500;color:#2166a9;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.thumb-desc{display:block;font-size:12px;font-weight:400;color:#1a3330;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}

/* popup */
.popup-ov{position:fixed;inset:0;background:rgba(0,0,0,0.85);z-index:9999;display:none;align-items:center;justify-content:center}
.popup-ov.on{display:flex}
.popup-inner{position:relative;width:90%;max-width:900px;border-radius:12px;overflow:hidden;background:#000}
.hero-pop-media{width:100%;min-height:200px;max-height:80vh;display:flex;align-items:center;justify-content:center;background:#000}
.hero-pop-media video,.hero-pop-media iframe{width:100%;display:block;max-height:80vh;border:0}
.hero-pop-media iframe{min-height:50vh}
.pop-close{padding: 10px;
    position: absolute;
    top: 10px;
    right: 12px;
    background: rgba(255, 255, 255, 0.15);
    border: none;
    color: #fff;
    font-size: 20px;
    width: 34px;
    height: 34px;
    max-width: 34px;
    max-height: 34px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;}
.pop-close:hover{background:rgba(255,255,255,0.3)}
</style>

<div class="hero-wrap">

  <div class="hero-right">

    <div class="video-card">
      <div class="slider-wrap">

  <div class="slide" id="main-slide">
    <div class="hero-main-view">
      <div id="main-media" class="hero-main-media" aria-live="polite"></div>
      <div class="play-overlay" onclick="openPopup()" role="button" tabindex="0" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openPopup();}">
        <div class="play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></div>
      </div>
    </div>
    <div class="slide-info">
      <div class="slide-border">
        <h3 id="main-title"></h3>
      </div>
    </div>
  </div>

  <div class="slides-list" id="thumbs"></div>

</div>

    </div>

    <div class="stats-row">
      <div class="avatars">
        @if($siteSettings->get('hero_avatar_1'))
        <img src="{{ Storage::url($siteSettings->get('hero_avatar_1')) }}" alt="">
        @else
        <img src="https://tebewebe.online/cutisure/wp-content/uploads/sites/378/2026/04/Team-6-150x150.jpg" alt="">
        @endif
        @if($siteSettings->get('hero_avatar_2'))
        <img src="{{ Storage::url($siteSettings->get('hero_avatar_2')) }}" alt="">
        @else
        <img src="https://tebewebe.online/cutisure/wp-content/uploads/sites/378/2026/04/Team-15-150x150.jpg" alt="">
        @endif
        @if($siteSettings->get('hero_avatar_3'))
        <img src="{{ Storage::url($siteSettings->get('hero_avatar_3')) }}" alt="">
        @else
        <img src="https://tebewebe.online/cutisure/wp-content/uploads/sites/378/2026/04/Team-1-150x150.jpg" alt="">
        @endif
      </div>
      <div class="plus-circle">
        <svg viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
      </div>
      <div class="stats-text">
        <strong>{{ $siteSettings->get('hero_graduates_count', '+5000') }}</strong>
        <span>{{ $siteSettings->get('hero_graduates_text', 'خريج من حول العالم') }}</span>
      </div>
    </div>

  </div>
</div>

<div class="popup-ov" id="popup" onclick="handleOv(event)">
  <div class="popup-inner">
    <button type="button" class="pop-close" onclick="closePop()" aria-label="إغلاق">×</button>
    <div id="pop-media" class="hero-pop-media"></div>
  </div>
</div>

@php
$heroVideos = $sliders->filter(fn ($s) => $s->hasPlayableVideo())->values();
$videosData = $heroVideos->map(function ($s) {
    $p = $s->resolvedVideoPlayback();
    if (! $p) {
        return null;
    }

    return [
        'kind' => $p['kind'],
        'src' => $p['src'],
        'embed' => $p['embed'],
        'thumb' => $p['thumb'],
        'poster' => $s->image ? Storage::url($s->image) : null,
        'title' => $s->title_en ?? $s->title_ar,
        'label' => $s->title_ar,
        'subtitle' => $s->subtitle_ar ?? '',
    ];
})->filter()->values()->all();
if (empty($videosData)) {
    $videosData = [
        ['kind' => 'direct', 'src' => 'https://fahad.net.sa/wp-content/uploads/2026/05/1s.mp4', 'embed' => null, 'thumb' => null, 'poster' => null, 'title' => 'Dermatologist Talks: Skincare Myths vs Facts', 'label' => 'فيديو 1', 'subtitle' => ''],
        ['kind' => 'direct', 'src' => 'https://fahad.net.sa/wp-content/uploads/2026/05/2s.mp4', 'embed' => null, 'thumb' => null, 'poster' => null, 'title' => 'Top 5 Morning Skincare Routines', 'label' => 'فيديو 2', 'subtitle' => ''],
        ['kind' => 'direct', 'src' => 'https://fahad.net.sa/wp-content/uploads/2026/05/3s.mp4', 'embed' => null, 'thumb' => null, 'poster' => null, 'title' => 'How to Choose Your Skin Type Treatment', 'label' => 'فيديو 3', 'subtitle' => ''],
    ];
}
@endphp
<script>
var videos=@json($videosData);

var cur=0;
var mainVid=null;
var mainTitle=document.getElementById('main-title');
var thumbsEl=document.getElementById('thumbs');

function clearEl(id){
  var el=document.getElementById(id);
  if(!el)return;
  while(el.firstChild)el.removeChild(el.firstChild);
}

function mountIframe(container,src,opts){
  opts=opts||{};
  var ifr=document.createElement('iframe');
  ifr.src=src;
  ifr.setAttribute('title',opts.title||'فيديو');
  ifr.setAttribute('loading','lazy');
  ifr.setAttribute('referrerpolicy','strict-origin-when-cross-origin');
  ifr.setAttribute('allow','accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share; fullscreen');
  ifr.allowFullscreen=true;
  ifr.style.width='100%';
  ifr.style.border='0';
  ifr.style.display='block';
  ifr.style.height=opts.height||'160px';
  if(opts.minHeight)ifr.style.minHeight=opts.minHeight;
  container.appendChild(ifr);
  return ifr;
}

function loadMain(i){
  cur=i;
  clearEl('main-media');
  mainVid=null;
  var box=document.getElementById('main-media');
  var v=videos[i];
  if(!box||!v)return;

  function appendPausedDirectPreview(){
    if(!v.src)return;
    var vid=document.createElement('video');
    vid.muted=true;
    vid.playsInline=true;
    vid.setAttribute('playsinline','');
    vid.preload='metadata';
    vid.src=v.src;
    if(v.poster)vid.poster=v.poster;
    vid.className='hero-main-preview-vid';
    box.appendChild(vid);
    mainVid=vid;
    vid.pause();
  }

  var previewUrl=v.poster||v.thumb||null;
  if(previewUrl){
    var im=document.createElement('img');
    im.src=previewUrl;
    im.alt='';
    im.className='hero-main-preview-img';
    im.decoding='async';
    im.loading='eager';
    im.onerror=function(){
      this.onerror=null;
      if(v.kind==='direct'&&v.src){
        if(this.parentNode)this.parentNode.removeChild(this);
        appendPausedDirectPreview();
      }else{
        this.style.display='none';
        var fb=document.createElement('div');
        fb.className='hero-main-preview-fb';
        fb.textContent='▶';
        box.appendChild(fb);
      }
    };
    box.appendChild(im);
  }else if(v.kind==='direct'&&v.src){
    appendPausedDirectPreview();
  }else{
    var fb=document.createElement('div');
    fb.className='hero-main-preview-fb';
    fb.textContent='▶';
    box.appendChild(fb);
  }

  if(mainTitle){
    mainTitle.textContent=v.label||v.title||'';
    mainTitle.setAttribute('dir','auto');
  }
  document.querySelectorAll('.thumb-item').forEach(function(el,idx){
    el.classList.toggle('active',idx===i);
  });
}

function buildThumbs(){
  thumbsEl.innerHTML='';
  videos.forEach(function(v,i){
    var item=document.createElement('div');
    item.className='thumb-item'+(i===0?' active':'');
    var left=document.createElement('div');
    left.className='thumb-media';
    if(v.poster){
      var pim=document.createElement('img');
      pim.src=v.poster;
      pim.alt='';
      pim.loading='lazy';
      pim.decoding='async';
      left.appendChild(pim);
    }else if(v.kind==='direct'&&v.src){
      var tv=document.createElement('video');
      tv.src=v.src;
      tv.muted=true;
      tv.preload='metadata';
      tv.playsInline=true;
      left.appendChild(tv);
    } else if(v.thumb){
      var im=document.createElement('img');
      im.src=v.thumb;
      im.alt='';
      im.loading='lazy';
      im.decoding='async';
      im.setAttribute('referrerpolicy','no-referrer-when-downgrade');
      im.onerror=function(){
        this.onerror=null;
        var fb=document.createElement('span');
        fb.className='thumb-media-fallback';
        fb.textContent=v.kind==='instagram'?'IG':(v.kind==='youtube'?'YT':(v.kind==='vimeo'?'VM':'▶'));
        this.parentNode.replaceChild(fb,this);
      };
      left.appendChild(im);
    } else {
      var ph=document.createElement('span');
      ph.className='thumb-media-fallback';
      ph.textContent=v.kind==='instagram'?'IG':(v.kind==='youtube'?'YT':(v.kind==='vimeo'?'VM':'▶'));
      left.appendChild(ph);
    }
    var lab=document.createElement('div');
    lab.className='thumb-label';
    var spanTitle=document.createElement('span');
    spanTitle.className='thumb-title';
    spanTitle.textContent=v.label||'';
    lab.appendChild(spanTitle);
    var desc='';
    if(v.title&&v.title!==v.label)desc=v.title;
    else if(v.subtitle)desc=v.subtitle;
    if(desc){
      var spanDesc=document.createElement('span');
      spanDesc.className='thumb-desc';
      spanDesc.textContent=desc;
      lab.appendChild(spanDesc);
    }
    item.appendChild(left);
    item.appendChild(lab);
    item.addEventListener('click',function(){loadMain(i);});
    thumbsEl.appendChild(item);
  });
}

buildThumbs();
loadMain(0);

function openPopup(){
  clearEl('pop-media');
  var wrap=document.getElementById('pop-media');
  var v=videos[cur];
  if(!wrap||!v)return;
  if(v.kind==='direct'&&v.src){
    var pv=document.createElement('video');
    pv.controls=true;
    pv.playsInline=true;
    pv.setAttribute('playsinline','');
    pv.style.width='100%';
    pv.style.maxHeight='80vh';
    if(v.poster)pv.poster=v.poster;
    pv.src=v.src;
    if(mainVid&&mainVid.tagName==='VIDEO')pv.currentTime=mainVid.currentTime||0;
    wrap.appendChild(pv);
    pv.play().catch(function(){});
  } else if(v.embed){
    mountIframe(wrap,v.embed,{title:v.title||'',height:'70vh',minHeight:'50vh'});
  }
  document.getElementById('popup').classList.add('on');
}

function closePop(){
  clearEl('pop-media');
  document.getElementById('popup').classList.remove('on');
}

function handleOv(e){if(e.target===document.getElementById('popup'))closePop();}
document.addEventListener('keydown',function(e){if(e.key==='Escape')closePop();});
</script>

        </div>
    </div>

    {{-- Hero right side: Feature cards --}}
    <div class="elementor-element elementor-element-1dfdde5 e-con-full e-flex e-con e-child" data-id="1dfdde5" data-element_type="container">
        <div class="elementor-element elementor-element-8f93ee1 e-con-full e-flex e-con e-child" data-id="8f93ee1" data-element_type="container">
            <div class="elementor-element elementor-element-6c49fe0 elementor-widget elementor-widget-heading" data-id="6c49fe0" data-element_type="widget">
                <h2 class="elementor-heading-title elementor-size-default">{{ $siteSettings->get('hero_card1_title', 'معايير دولية') }}</h2>
            </div>
            <div class="elementor-element elementor-element-46839ed elementor-widget elementor-widget-divider elementor-widget__width-initial" data-id="46839ed" data-element_type="widget">
                <div class="elementor-divider"><span class="elementor-divider-separator"></span></div>
            </div>
            <div class="elementor-element elementor-element-23b3288 elementor-widget elementor-widget-text-editor" data-id="23b3288" data-element_type="widget">
                <p>{{ $siteSettings->get('hero_card1_desc', 'برامج تدريبية معتمدة دولياً تطبّق أعلى معايير الجودة والتميز في مجال التزيين والتجميل منذ 25 عاماً.') }}</p>
            </div>
            <div class="elementor-element elementor-element-eb25d41 e-con-full e-flex e-con e-child" data-id="eb25d41" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;position&quot;:&quot;absolute&quot;}">
                <div class="elementor-element elementor-element-4da2c12 elementor-view-stacked elementor-shape-circle elementor-widget elementor-widget-icon" data-id="4da2c12" data-element_type="widget" data-widget_type="icon.default">
                    <div class="elementor-icon-wrapper">
                        <div class="elementor-icon elementor-animation-float">
                            <svg class="ekit-svg-icon icon-certificate" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="28" height="28"><path d="M12 1a7 7 0 1 0 0 14A7 7 0 0 0 12 1zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10z"/><path d="M9 15.5v6.2l3-1.5 3 1.5v-6.2a8.96 8.96 0 0 1-6 0z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-0434f5b elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-spacer" data-id="0434f5b" data-widget_type="spacer.default">
                    <div class="elementor-spacer"><div class="elementor-spacer-inner"></div></div>
                </div>
                <div class="elementor-element elementor-element-1513194 elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-spacer" data-id="1513194" data-widget_type="spacer.default">
                    <div class="elementor-spacer"><div class="elementor-spacer-inner"></div></div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-5b7e2ab e-con-full e-flex e-con e-child" data-id="5b7e2ab" data-element_type="container">
            <div class="elementor-element elementor-element-b0b106c elementor-widget elementor-widget-heading" data-id="b0b106c" data-element_type="widget">
                <h2 class="elementor-heading-title elementor-size-default">{{ $siteSettings->get('hero_card2_title', 'خبراء معتمدون') }}</h2>
            </div>
            <div class="elementor-element elementor-element-87799c5 elementor-widget elementor-widget-divider elementor-widget__width-initial" data-id="87799c5" data-element_type="widget">
                <div class="elementor-divider"><span class="elementor-divider-separator"></span></div>
            </div>
            <div class="elementor-element elementor-element-5da450c elementor-widget elementor-widget-text-editor" data-id="5da450c" data-element_type="widget">
                <p>{{ $siteSettings->get('hero_card2_desc', 'شبكة من أبرز الخبراء والمتخصصين في التزيين من أكثر من 50 دولة حول العالم.') }}</p>
            </div>
            <div class="elementor-element elementor-element-c9af339 e-con-full e-flex e-con e-child" data-id="c9af339" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;position&quot;:&quot;absolute&quot;}">
                <div class="elementor-element elementor-element-5ef4cde elementor-view-stacked elementor-shape-circle elementor-widget elementor-widget-icon" data-id="5ef4cde" data-element_type="widget" data-widget_type="icon.default">
                    <div class="elementor-icon-wrapper">
                        <div class="elementor-icon elementor-animation-float">
                            <svg class="ekit-svg-icon icon-team" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="28" height="28"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-ddfb0f6 elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-spacer" data-id="ddfb0f6" data-widget_type="spacer.default">
                    <div class="elementor-spacer"><div class="elementor-spacer-inner"></div></div>
                </div>
                <div class="elementor-element elementor-element-4947366 elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-spacer" data-id="4947366" data-widget_type="spacer.default">
                    <div class="elementor-spacer"><div class="elementor-spacer-inner"></div></div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-17a83b7 e-con-full e-flex e-con e-child" data-id="17a83b7" data-element_type="container">
            <div class="elementor-element elementor-element-d7f42be elementor-widget elementor-widget-heading" data-id="d7f42be" data-element_type="widget">
                <h2 class="elementor-heading-title elementor-size-default">{{ $siteSettings->get('hero_card3_title', 'انضم إلى الاتحاد اليوم!') }}</h2>
            </div>
            <div class="elementor-element elementor-element-55a3ad3 elementor-widget elementor-widget-text-editor" data-id="55a3ad3" data-element_type="widget">
                <p>{{ $siteSettings->get('hero_card3_desc', 'كن جزءاً من مجتمع عالمي يضم أكثر من 5000 خريج محترف، وارتقِ بمسيرتك إلى الاحتراف الدولي.') }}</p>
            </div>
            <!-- @if($siteSettings->get('social_whatsapp'))
            <div class="elementor-element elementor-element-8b76164 elementor-widget elementor-widget-icon-box" data-id="8b76164" data-element_type="widget">
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $siteSettings->get('social_whatsapp')) }}" target="_blank" style="text-decoration:none;">
                    <div class="elementor-icon-box-wrapper">
                        <div class="elementor-icon-box-icon">
                            <span class="elementor-icon">
                                <svg class="ekit-svg-icon icon-whatsapp" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="22" height="22">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                            </span>
                        </div>
                        <div class="elementor-icon-box-content">
                            <div class="elementor-icon-box-title"><span>{{ $siteSettings->get('hero_whatsapp_text', 'تواصل عبر واتساب') }}</span></div>
                        </div>
                    </div>
                </a>
            </div>
            @endif -->
        </div>
    </div>
</div>

{{-- ===== SECTION 2: ABOUT ===== --}}
<div class="elementor-element elementor-element-470f425 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="470f425" data-element_type="container">
    <div class="e-con-inner">
        <div class="elementor-element elementor-element-ac8686f e-con-full e-flex e-con e-child" data-id="ac8686f" data-element_type="container">
            <div class="elementor-element elementor-element-0177ed4 e-con-full e-flex e-con e-child" data-id="0177ed4" data-element_type="container">
                <div class="elementor-element elementor-element-0b35f88 elementor-widget elementor-widget-heading" data-id="0b35f88" data-element_type="widget">
                    <h2 class="elementor-heading-title elementor-size-default">{{ $ps('about','badge','عن الاتحاد العالمي الأكاديمي') }}</h2>
                </div>
                <div class="elementor-element elementor-element-ddff422 elementor-widget elementor-widget-heading" data-id="ddff422" data-element_type="widget">
                    <h3 class="elementor-heading-title elementor-size-default">{{ $ps('about','title','اكتشف مسيرة التميز في مهنة التزيين والتجميل') }}</h3>
                </div>
                <div class="elementor-element elementor-element-3a3e4bb elementor-widget elementor-widget-heading" data-id="3a3e4bb" data-element_type="widget">
                    <p class="elementor-heading-title elementor-size-default">
                        @php $aboutDesc = $ps('about','description',''); @endphp
                        @if($aboutDesc)
                            {{ $aboutDesc }}
                        @elseif($about && $about->content_ar)
                            {{ Str::limit($about->content_ar, 200) }}
                        @else
                            الاتحاد العالمي الأكاديمي للتزيين منظمة دولية تأسست قبل 25 عاماً لتطوير مهنة التزيين والتجميل.
                        @endif
                    </p>
                </div>
                <div class="elementor-element elementor-element-629d4ff elementor-widget elementor-widget-text-editor" data-id="629d4ff" data-element_type="widget">
                    <p>{{ $ps('about','extra_text_1','تسعى المنظمة إلى رفع مستوى المهنة وتحقيق الاعتراف الدولي بها من خلال فعاليات ومؤتمرات دولية تجمع كبار المتخصصين من أكثر من 50 دولة حول العالم.') }}</p>
                    <p>{{ $ps('about','extra_text_2','انضم إلى شبكة عالمية من المحترفين وطوّر مهاراتك للوصول إلى الاحتراف الدولي في مجال التزيين والتجميل.') }}</p>
                </div>
                <div class="elementor-element elementor-element-e135057 elementor-widget elementor-widget-button" data-id="e135057" data-element_type="widget">
                    <a class="elementor-button elementor-button-link elementor-size-sm" href="{{ route('about') }}">
                        <span class="elementor-button-content-wrapper">
                            <span class="elementor-button-text">{{ $ps('about','button_text','اعرف أكثر عنا') }}</span>
                        </span>
                    </a>
                </div>
            </div>
            <div class="elementor-element elementor-element-d591a8d e-con-full e-flex e-con e-child" data-id="d591a8d" data-element_type="container">
                @php
                    $imgMain    = $ps('about','image_main','skincare-concept-beautiful-black-woman-massaging-2026-03-24-02-24-58-utc2.webp');
                    $imgOverlay = $ps('about','image_overlay','girl-on-the-couch-at-the-beautician-2026-03-18-11-10-15-utc2.webp');
                    $ctrVal     = $ps('about','counter_value','25');
                    $ctrSuffix  = $ps('about','counter_suffix','+');
                    $ctrLabel   = $ps('about','counter_label','عاماً من التميز');
                @endphp
                <div class="elementor-element elementor-element-bd79e77 elementor-widget elementor-widget-image" data-id="bd79e77" data-element_type="widget">
                    <img src="{{ str_starts_with($imgMain,'uploads/') ? Storage::url($imgMain) : asset('images/'.$imgMain) }}" class="attachment-full size-full" alt="عن الاتحاد">
                </div>
                <div class="elementor-element elementor-element-4067d22 elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-image" data-id="4067d22" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}">
                    <img src="{{ str_starts_with($imgOverlay,'uploads/') ? Storage::url($imgOverlay) : asset('images/'.$imgOverlay) }}" class="attachment-full size-full" alt="خبراء">
                </div>
                <div class="elementor-element elementor-element-cf23766 e-con-full e-flex e-con e-child" data-id="cf23766" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;position&quot;:&quot;absolute&quot;}">
                    <div class="elementor-element elementor-element-f194014 elementor-widget elementor-widget-counter" data-id="f194014" data-element_type="widget">
                        <div class="elementor-counter">
                            <div class="elementor-counter-number-wrapper">
                                <span class="elementor-counter-number-prefix"></span>
                                <span class="elementor-counter-number" data-duration="2000" data-to-value="{{ $ctrVal }}" data-from-value="0">{{ $ctrVal }}</span>
                                <span class="elementor-counter-number-suffix">{{ $ctrSuffix }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-1f010c0 elementor-widget elementor-widget-heading" data-id="1f010c0" data-element_type="widget">
                        <div class="elementor-heading-title elementor-size-default">{{ $ctrLabel }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Supporters / Partner logos carousel (replaces brand carousel) --}}
        @if($supporters->count())
        <div class="elementor-element elementor-element-c02b239 elementor-widget elementor-widget-image-carousel" data-id="c02b239" data-element_type="widget" style="width:100%;overflow:hidden;">
            <div style="display:flex;gap:40px;align-items:center;justify-content:center;flex-wrap:wrap;padding:30px 0;">
                @foreach($supporters as $supporter)
                    @if($supporter->logo)
                    <img src="{{ Storage::url($supporter->logo) }}" alt="{{ $supporter->name }}" style="height:50px;object-fit:contain;filter:grayscale(100%);opacity:0.6;transition:all 0.3s;" onmouseover="this.style.filter='none';this.style.opacity='1';" onmouseout="this.style.filter='grayscale(100%)';this.style.opacity='0.6';">
                    @else
                    <span style="font-size:13px;color:var(--e-global-color-text);font-weight:600;">{{ $supporter->name }}</span>
                    @endif
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

{{-- ===== SECTION 3: EXPERT SECTION ===== --}}
@php
    $expertBgImage = $ps('expert_section', 'bg_image', 'uploads/page-sections/section3-bg-default.webp');
    $expertBgSize  = $ps('expert_section', 'bg_size', 'cover');
    $expertBgStyle = 'background-image:url(' . Storage::url($expertBgImage) . ');background-size:' . $expertBgSize . ';background-position:center;background-repeat:no-repeat;';
@endphp
<div class="elementor-element elementor-element-decbe22 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="decbe22" data-element_type="container" style="{{ $expertBgStyle }}">
    <div class="e-con-inner">
        <div class="elementor-element elementor-element-ed83d65 e-con-full e-flex e-con e-child" data-id="ed83d65" data-element_type="container">
            <div class="elementor-element elementor-element-af28734 elementor-widget elementor-widget-icon" data-id="af28734" data-element_type="widget">
                <div class="elementor-icon-wrapper">
                    <div class="elementor-icon">
                        <i class="{{ $ps('expert_section','icon','fas fa-award') }}" style="font-size:2rem;"></i>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-806fae7 elementor-widget elementor-widget-heading" data-id="806fae7" data-element_type="widget">
                <h2 class="elementor-heading-title elementor-size-default">{{ $ps('expert_section','title','خبراء مهنيون مكرّسون لتطوير مجال التزيين عالمياً') }}</h2>
            </div>
            <div class="elementor-element elementor-element-d8472fe elementor-widget elementor-widget-text-editor" data-id="d8472fe" data-element_type="widget">
                <p>{{ $ps('expert_section','description','نعمل بجد لتوفير أفضل المعايير المهنية وأرقى برامج التعليم والاعتراف الدولي لمحترفي التزيين.') }}</p>
            </div>
            <div class="elementor-element elementor-element-d07c45b elementor-widget elementor-widget-divider elementor-widget__width-initial" data-id="d07c45b" data-element_type="widget">
                <div class="elementor-divider"><span class="elementor-divider-separator"></span></div>
            </div>
        </div>
    </div>
</div>

{{-- ===== SECTION 4: SERVICES / EDUCATION PROGRAMS ===== --}}
<div class="elementor-element elementor-element-0eaf5cf e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="0eaf5cf" data-element_type="container">
    <div class="e-con-inner">
        <div class="elementor-element elementor-element-ae6dd8c e-flex e-con-boxed e-con e-child" data-id="ae6dd8c" data-element_type="container">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-70717e9 elementor-widget elementor-widget-heading" data-id="70717e9" data-element_type="widget">
                    <h2 class="elementor-heading-title elementor-size-default">{{ $ps('services','badge','برامجنا التعليمية') }}</h2>
                </div>
                <div class="elementor-element elementor-element-a8858be elementor-widget elementor-widget-heading" data-id="a8858be" data-element_type="widget">
                    <h3 class="elementor-heading-title elementor-size-default">{{ $ps('services','title','مساراتنا التعليمية والمهنية') }}</h3>
                </div>
                <div class="elementor-element elementor-element-808dc99 elementor-widget elementor-widget-text-editor" data-id="808dc99" data-element_type="widget">
                    <p>{{ $ps('services','description','نقدم برامج تدريبية معتمدة دولياً في مجال التزيين والتجميل.') }}</p>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-43ef753 e-con-full e-flex e-con e-child" data-id="43ef753" data-element_type="container">
            <div class="elementor-element elementor-element-8d5ca97 e-con-full e-flex e-con e-child" data-id="8d5ca97" data-element_type="container">
                {{-- Service card 1: Education --}}
                <div class="elementor-element elementor-element-49f6480 elementor-position-top elementor-widget elementor-widget-image-box" data-id="49f6480" data-element_type="widget">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <span class="cmac-service-icon" role="img" aria-label="التأهيل المهني"><i class="fas fa-user-graduate" aria-hidden="true"></i></span>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('education.category', 'taheel') }}">{{ $ps('services','card1_title','التأهيل المهني') }}</a></h4>
                            <p class="elementor-image-box-description">{{ $ps('services','card1_desc','برامج أساسية لتأهيل المبتدئين وفق أعلى المعايير المهنية الدولية.') }}</p>
                        </div>
                    </div>
                </div>
                {{-- Service card 2: Development --}}
                <div class="elementor-element elementor-element-9a914d3 elementor-position-top elementor-widget elementor-widget-image-box" data-id="9a914d3" data-element_type="widget">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <span class="cmac-service-icon" role="img" aria-label="التطوير المهني"><i class="fas fa-chart-line" aria-hidden="true"></i></span>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('education.category', 'tatweer') }}">{{ $ps('services','card2_title','التطوير المهني') }}</a></h4>
                            <p class="elementor-image-box-description">{{ $ps('services','card2_desc','برامج متقدمة للمحترفين الذين يسعون لرفع مستواهم والتميز الدولي.') }}</p>
                        </div>
                    </div>
                </div>
                {{-- Service card 3: Certificates --}}
                <div class="elementor-element elementor-element-70b12b4 elementor-position-top elementor-widget elementor-widget-image-box" data-id="70b12b4" data-element_type="widget">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <span class="cmac-service-icon" role="img" aria-label="الشهادات المعتمدة"><i class="fas fa-certificate" aria-hidden="true"></i></span>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('education.category', 'certificates') }}">{{ $ps('services','card3_title','الشهادات المعتمدة') }}</a></h4>
                            <p class="elementor-image-box-description">{{ $ps('services','card3_desc','شهادات مهنية معترف بها دولياً في مختلف تخصصات التجميل.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Center image --}}
            <div class="elementor-element elementor-element-4a83215 e-con-full e-flex e-con e-child" data-id="4a83215" data-element_type="container">
                <div class="elementor-element elementor-element-4ced531 elementor-widget elementor-widget-image" data-id="4ced531" data-element_type="widget">
                    @php $centerImg = $ps('services','center_image','5a8fc8f0-ed0d-4294-93ec-e740287c5085-2026-04-24-2.webp'); @endphp
                    <img src="{{ str_starts_with($centerImg,'uploads/') ? Storage::url($centerImg) : asset('images/'.$centerImg) }}" alt="CMAC" style="width:60%;object-fit:cover;">
                </div>
            </div>

            <div class="elementor-element elementor-element-2afac32 e-con-full e-flex e-con e-child" data-id="2afac32" data-element_type="container">
                {{-- Service card 4: Events --}}
                <div class="elementor-element elementor-element-6c18a38 elementor-position-top elementor-widget elementor-widget-image-box" data-id="6c18a38" data-element_type="widget">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <span class="cmac-service-icon" role="img" aria-label="الفعاليات الدولية"><i class="fas fa-calendar-alt" aria-hidden="true"></i></span>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('events') }}">{{ $ps('services','card4_title','الفعاليات الدولية') }}</a></h4>
                            <p class="elementor-image-box-description">{{ $ps('services','card4_desc','ملتقيات ومؤتمرات دولية تجمع أبرز المتخصصين والخبراء.') }}</p>
                        </div>
                    </div>
                </div>
                {{-- Service card 5: Awards --}}
                <div class="elementor-element elementor-element-418eb1f elementor-position-top elementor-widget elementor-widget-image-box" data-id="418eb1f" data-element_type="widget">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <span class="cmac-service-icon" role="img" aria-label="الجوائز والأوسمة"><i class="fas fa-trophy" aria-hidden="true"></i></span>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('awards') }}">{{ $ps('services','card5_title','الجوائز والأوسمة') }}</a></h4>
                            <p class="elementor-image-box-description">{{ $ps('services','card5_desc','نكرّم المتميزين والمبدعين بجوائز ووسامات دولية معترف بها.') }}</p>
                        </div>
                    </div>
                </div>
                {{-- Service card 6: Profession Day --}}
                <div class="elementor-element elementor-element-057a83a elementor-position-top elementor-widget elementor-widget-image-box" data-id="057a83a" data-element_type="widget">
                    <div class="elementor-image-box-wrapper">
                        <figure class="elementor-image-box-img">
                            <span class="cmac-service-icon" role="img" aria-label="يوم المهنة العالمي"><i class="fas fa-briefcase" aria-hidden="true"></i></span>
                        </figure>
                        <div class="elementor-image-box-content">
                            <h4 class="elementor-image-box-title"><a href="{{ route('profession-day') }}">يوم المهنة العالمي</a></h4>
                            <p class="elementor-image-box-description">احتفال سنوي دولي يكرّم مهنة التزيين في أكثر من 50 دولة.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== SECTION 6: لماذا تختار الاتحاد — يُدار من لوحة التحكم: الصفحات → الرئيسية → «لماذا تختار الاتحاد؟» ===== --}}
<div class="elementor-element elementor-element-488c671 e-flex e-con-boxed e-con e-child e-lazyloaded" data-id="488c671" data-element_type="container" style="width:100%;    background: #deeff8;">
    <div class="e-con-inner">
        <div class="elementor-element elementor-element-9f55288 e-con-full e-flex e-con e-child" data-id="9f55288" data-element_type="container">
            <div class="elementor-element elementor-element-a34775e elementor-widget elementor-widget-heading" data-id="a34775e" data-element_type="widget">
                <h2 class="elementor-heading-title elementor-size-default">{{ $ps('why_us', 'title', 'لماذا تختار الاتحاد؟') }}</h2>
            </div>
            <div class="elementor-element elementor-element-8bf83b4 elementor-widget elementor-widget-heading" data-id="8bf83b4" data-element_type="widget">
                <h3 class="elementor-heading-title elementor-size-default">{{ $ps('why_us', 'subtitle', 'حيث الاحتراف يلتقي بالاعتراف الدولي') }}</h3>
            </div>
            <div class="elementor-element elementor-element-77f9912 elementor-widget elementor-widget-text-editor" data-id="77f9912" data-element_type="widget">
                <p>{{ $ps('why_us', 'intro', 'نقدم بيئة تعليمية متميزة وشبكة علاقات دولية تفتح آفاقاً جديدة أمام المحترفين في مجال التزيين والتجميل.') }}</p>
            </div>

            <div class="elementor-element elementor-element-5df10f3 elementor-view-stacked elementor-position-inline-start elementor-shape-circle elementor-widget elementor-widget-icon-box" data-id="5df10f3" data-element_type="widget">
                <div class="elementor-icon-box-wrapper">
                    <div class="elementor-icon-box-icon"><span class="elementor-icon">
                        <svg class="ekit-svg-icon icon-certificate" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="22" height="22">
                            <path d="M12 1a7 7 0 1 0 0 14A7 7 0 0 0 12 1zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10z"/>
                            <path d="M9 15.5v6.2l3-1.5 3 1.5v-6.2a8.96 8.96 0 0 1-6 0z"/>
                        </svg>
                    </span></div>
                    <div class="elementor-icon-box-content">
                        <div class="elementor-icon-box-title"><span>{{ $ps('why_us', 'item1_title', 'اعتماد دولي معترف به') }}</span></div>
                        <p class="elementor-icon-box-description">{{ $ps('why_us', 'item1_desc', 'شهادات معتمدة وفق أعلى المعايير الدولية في مجال التزيين والتجميل.') }}</p>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-61cbff1 elementor-view-stacked elementor-position-inline-start elementor-shape-circle elementor-widget elementor-widget-icon-box" data-id="61cbff1" data-element_type="widget">
                <div class="elementor-icon-box-wrapper">
                    <div class="elementor-icon-box-icon"><span class="elementor-icon">
                        <svg class="ekit-svg-icon icon-globe" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="22" height="22">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                        </svg>
                    </span></div>
                    <div class="elementor-icon-box-content">
                        <div class="elementor-icon-box-title"><span>{{ $ps('why_us', 'item2_title', 'شبكة عالمية واسعة') }}</span></div>
                        <p class="elementor-icon-box-description">{{ $ps('why_us', 'item2_desc', 'تواصل مع خبراء ومتخصصين من أكثر من 50 دولة حول العالم.') }}</p>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-ea9371a elementor-view-stacked elementor-position-inline-start elementor-shape-circle elementor-widget elementor-widget-icon-box" data-id="ea9371a" data-element_type="widget">
                <div class="elementor-icon-box-wrapper">
                    <div class="elementor-icon-box-icon"><span class="elementor-icon">
                        <svg class="ekit-svg-icon icon-team" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="22" height="22">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </span></div>
                    <div class="elementor-icon-box-content">
                        <div class="elementor-icon-box-title"><span>{{ $ps('why_us', 'item3_title', 'دعم متواصل') }}</span></div>
                        <p class="elementor-icon-box-description">{{ $ps('why_us', 'item3_desc', 'فريق متخصص لدعمك في رحلتك نحو الاحتراف والتميز الدولي.') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="elementor-element elementor-element-c7bc637 e-con-full e-flex e-con e-child" data-id="c7bc637" data-element_type="container">
            <div class="elementor-element elementor-element-2e281a9 elementor-widget elementor-widget-image" data-id="2e281a9" data-element_type="widget">
                @php
                    $whySideImgRaw = $ps('why_us', 'side_image', '');
                    $whyImgUrl = $whySideImgRaw !== ''
                        ? (str_starts_with($whySideImgRaw, 'uploads/') ? Storage::url($whySideImgRaw) : asset('images/'.$whySideImgRaw))
                        : asset('images/shot-of-a-happy-young-woman-applying-moisturiser-a-2026-01-09-09-21-08-utc2-transformed.webp');
                @endphp
                <img src="{{ $whyImgUrl }}" alt="{{ $ps('why_us', 'title', 'C.M.A.C') }}" style="width:100%;height:100%;object-fit:cover;border-radius:20px;">
            </div>
        </div>
    </div>
</div>

{{-- ===== SECTION 7: HOW TO JOIN (STEPS) ===== --}}
<div class="elementor-element elementor-element-107463c e-flex e-con-boxed e-con e-child e-lazyloaded" data-id="107463c" data-element_type="container" style="width:100%;">
    <div class="e-con-inner">
        <div class="elementor-element elementor-element-06a8264 e-flex e-con-boxed e-con e-child" data-id="06a8264" data-element_type="container">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-0365b62 elementor-widget elementor-widget-heading" data-id="0365b62" data-element_type="widget">
                    <h2 class="elementor-heading-title elementor-size-default">كيف تنضم إلينا</h2>
                </div>
                <div class="elementor-element elementor-element-778ec8f elementor-widget elementor-widget-heading" data-id="778ec8f" data-element_type="widget">
                    <h3 class="elementor-heading-title elementor-size-default">خطوات بسيطة نحو الاحتراف الدولي</h3>
                </div>
                <div class="elementor-element elementor-element-b9092d5 elementor-widget elementor-widget-text-editor" data-id="b9092d5" data-element_type="widget">
                    <p>انضم إلى الاتحاد العالمي الأكاديمي للتزيين في 4 خطوات بسيطة واحصل على الاعتراف الدولي.</p>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-027f898 e-grid e-con-full e-con e-child" data-id="027f898" data-element_type="container">
            {{-- Step 1 --}}
            <div class="elementor-element elementor-element-a60f274 e-con-full e-flex e-con e-child" data-id="a60f274" data-element_type="container">
                <div class="elementor-element elementor-element-076c5b2 elementor-absolute elementor-widget elementor-widget-heading" data-id="076c5b2" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}">
                    <h2 class="elementor-heading-title elementor-size-default">الخطوة 01</h2>
                </div>
                <div class="elementor-element elementor-element-6e07c20 elementor-view-default elementor-widget elementor-widget-icon" data-id="6e07c20" data-element_type="widget">
                    <div class="elementor-icon-wrapper"><div class="elementor-icon">
                        <svg class="ekit-svg-icon icon-chat" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M23.268 3.572h-21.466c-0.994 0-1.802 0.808-1.802 1.802v12.879c0 0.994 0.808 1.802 1.802 1.802h1.392v4.794c0 0.305 0.184 0.581 0.466 0.697 0.093 0.039 0.192 0.058 0.289 0.058 0.196 0 0.39-0.077 0.534-0.221l5.328-5.328h1.069c0.417 0 0.755-0.338 0.755-0.755s-0.338-0.755-0.755-0.755c0 0-1.418 0.001-1.433 0.003-0.176 0.012-0.348 0.084-0.483 0.219l-4.261 4.261c0 0-0.001-3.774-0.004-3.794-0.034-0.385-0.357-0.688-0.752-0.688h-2.146c-0.161 0-0.292-0.131-0.292-0.292v-12.879c0-0.161 0.131-0.292 0.292-0.292h21.466c0.161 0 0.292 0.131 0.292 0.292v4.941c0 0.417 0.338 0.755 0.755 0.755s0.755-0.338 0.755-0.755v-4.941c0-0.994-0.808-1.802-1.802-1.802zM30.198 12.806h-15.026c-0.994 0-1.802 0.808-1.802 1.802v8.786c0 0.994 0.808 1.802 1.802 1.802h9.407l3.811 3.811c0.144 0.144 0.337 0.221 0.534 0.221 0.097 0 0.195-0.019 0.289-0.058 0.282-0.117 0.466-0.392 0.466-0.697v-3.277h0.519c0.994 0 1.802-0.808 1.802-1.802v-8.786c0-0.994-0.808-1.802-1.802-1.802zM30.49 23.393c0 0.161-0.131 0.292-0.292 0.292h-1.273c-0.397 0-0.722 0.307-0.752 0.697-0.002 0.017-0.003 2.268-0.003 2.268l-2.741-2.741c-0.003-0.003-0.006-0.006-0.009-0.008-0.011-0.011-0.021-0.020-0.031-0.028-0.133-0.116-0.306-0.188-0.497-0.188h-9.72c-0.161 0-0.292-0.131-0.292-0.292v-8.786c0-0.161 0.131-0.292 0.292-0.292h15.026c0.161 0 0.292 0.131 0.292 0.292v8.786zM22.685 18.246c-0.417 0-0.755 0.338-0.755 0.755s0.338 0.755 0.755 0.755c0.417 0 0.755-0.338 0.755-0.755s-0.338-0.755-0.755-0.755zM19.405 8.563c0 0-13.739 0-13.739 0-0.417 0-0.755 0.338-0.755 0.755s0.338 0.755 0.755 0.755h13.739c0.417 0 0.755-0.338 0.755-0.755s-0.338-0.755-0.755-0.755zM10.88 13.554h-5.214c-0.417 0-0.755 0.338-0.755 0.755s0.338 0.755 0.755 0.755h5.214c0.417 0 0.755-0.338 0.755-0.755s-0.338-0.755-0.755-0.755zM19.177 18.246c-0.417 0-0.755 0.338-0.755 0.755s0.338 0.755 0.755 0.755c0.417 0 0.755-0.338 0.755-0.755s-0.338-0.755-0.755-0.755zM26.192 18.246c-0.417 0-0.755 0.338-0.755 0.755s0.338 0.755 0.755 0.755c0.417 0 0.755-0.338 0.755-0.755s-0.338-0.755-0.755-0.755z"></path></svg>
                    </div></div>
                </div>
                <div class="elementor-element elementor-element-75214da elementor-widget elementor-widget-elementskit-heading" data-id="75214da" data-element_type="widget">
                    <div class="ekit-wid-con"><div class="ekit-heading text_left">
                        <h4 class="ekit-heading--title">التسجيل</h4>
                        <div class="ekit-heading__description"><p>قدّم طلب الانضمام عبر موقعنا الإلكتروني واملأ نموذج التسجيل.</p></div>
                    </div></div>
                </div>
            </div>
            {{-- Step 2 --}}
            <div class="elementor-element elementor-element-364ea55 e-con-full e-flex e-con e-child" data-id="364ea55" data-element_type="container">
                <div class="elementor-element elementor-element-a8cfdc3 elementor-absolute elementor-widget elementor-widget-heading" data-id="a8cfdc3" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}">
                    <h2 class="elementor-heading-title elementor-size-default">الخطوة 02</h2>
                </div>
                <div class="elementor-element elementor-element-6a941ff elementor-view-default elementor-widget elementor-widget-icon" data-id="6a941ff" data-element_type="widget">
                    <div class="elementor-icon-wrapper"><div class="elementor-icon">
                        <svg class="ekit-svg-icon icon-Document-Search" viewBox="0 0 37 32" xmlns="http://www.w3.org/2000/svg"><path d="M4.653 8.223h8.223v1.084h-8.223v-1.084z"></path><path d="M4.653 10.518h5.865v1.084h-5.865v-1.084z"></path><path d="M4.653 14.024h8.223v1.084h-8.223v-1.084z"></path><path d="M4.653 16.382h5.865v1.084h-5.865v-1.084z"></path><path d="M4.653 19.888h8.223v1.084h-8.223v-1.084z"></path><path d="M4.653 22.247h4.653v1.084h-4.653v-1.084z"></path><path d="M36.781 28.239l-6.183-6.247-1.147 1.147-2.486-2.486c1.147-1.339 1.849-3.060 1.849-4.972 0-3.825-2.869-7.012-6.629-7.522v-8.159h-17.211l-4.972 4.972v26.582h22.183v-6.438h-1.084v5.355h-20.016v-24.669h4.653v-4.717h15.299v7.076c-4.143 0.064-7.458 3.442-7.458 7.586s3.379 7.586 7.586 7.586c1.912 0 3.633-0.701 4.972-1.849l2.486 2.486-1.147 1.147 6.247 6.247c0.446 0.446 0.956 0.637 1.53 0.637s1.147-0.255 1.53-0.637c0.892-0.892 0.892-2.295 0-3.123zM4.653 4.653h-2.805l2.805-2.869v2.869zM21.227 22.183c-3.57 0-6.502-2.932-6.502-6.502s2.932-6.502 6.502-6.502 6.502 2.932 6.502 6.502-2.932 6.502-6.502 6.502zM36.016 30.534c-0.191 0.191-0.51 0.319-0.765 0.319-0.319 0-0.574-0.128-0.765-0.319l-5.482-5.482 1.594-1.594 5.482 5.482c0.382 0.51 0.382 1.211-0.064 1.594z"></path><path d="M21.355 12.813c-0.064 0-0.128 0-0.128 0-0.064 0-0.128 0-0.128 0-2.741 0.064-4.845 2.422-4.908 2.55l0.829 0.701c0 0 0.637-0.637 1.53-1.275-0.064 0.255-0.128 0.574-0.128 0.892 0 1.594 1.275 2.869 2.869 2.869s2.869-1.275 2.869-2.869c0-0.319-0.064-0.574-0.128-0.892 0.892 0.574 1.53 1.211 1.53 1.275l0.829-0.701c-0.191-0.127-2.295-2.422-5.036-2.55zM21.227 17.53c-1.020 0-1.785-0.829-1.785-1.785s0.765-1.721 1.721-1.785c0.064 0 0.064 0 0.128 0s0.064 0 0.128 0c0.956 0.064 1.721 0.829 1.721 1.785-0.128 0.956-0.956 1.785-1.912 1.785z"></path></svg>
                    </div></div>
                </div>
                <div class="elementor-element elementor-element-c23a61f elementor-widget elementor-widget-elementskit-heading" data-id="c23a61f" data-element_type="widget">
                    <div class="ekit-wid-con"><div class="ekit-heading text_left">
                        <h4 class="ekit-heading--title">مراجعة الطلب</h4>
                        <div class="ekit-heading__description"><p>تراجع لجنة الاتحاد طلبك وتتحقق من المستندات المقدمة.</p></div>
                    </div></div>
                </div>
            </div>
            {{-- Step 3 --}}
            <div class="elementor-element elementor-element-1c05b38 e-con-full e-flex e-con e-child" data-id="1c05b38" data-element_type="container">
                <div class="elementor-element elementor-element-7f310d3 elementor-absolute elementor-widget elementor-widget-heading" data-id="7f310d3" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}">
                    <h2 class="elementor-heading-title elementor-size-default">الخطوة 03</h2>
                </div>
                <div class="elementor-element elementor-element-29c19e7 elementor-view-default elementor-widget elementor-widget-icon" data-id="29c19e7" data-element_type="widget">
                    <div class="elementor-icon-wrapper"><div class="elementor-icon">
                        <svg class="ekit-svg-icon icon-medicine" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M7.856 7.875c-0.345 0-0.625 0.28-0.625 0.625s0.28 0.625 0.625 0.625c0.345 0 0.625-0.28 0.625-0.625s-0.28-0.625-0.625-0.625z"></path><path d="M13.481 19.561h-1.875v-1.875c0-0.345-0.28-0.625-0.625-0.625s-0.625 0.28-0.625 0.625v1.875h-1.875c-0.345 0-0.625 0.28-0.625 0.625s0.28 0.625 0.625 0.625h1.875v1.875c0 0.345 0.28 0.625 0.625 0.625s0.625-0.28 0.625-0.625v-1.875h1.875c0.345 0 0.625-0.28 0.625-0.625s-0.28-0.625-0.625-0.625z"></path><path d="M30.349 20.124c-1.382-2.393-4.436-3.212-6.83-1.83l-2.539 1.466v-5.427c0-0.671-0.222-1.337-0.625-1.875l-3.125-4.166v-1.774c0.727-0.258 1.25-0.953 1.25-1.767v-2.875c-0-1.034-0.841-1.875-1.875-1.875h-11.249c-1.034 0-1.875 0.841-1.875 1.875v2.875c0 0.815 0.523 1.509 1.25 1.767v1.774l-3.125 4.167c-0.403 0.538-0.625 1.204-0.625 1.875v12.104c0 1.723 1.402 3.125 3.125 3.125h10.044c1.401 2.349 4.423 3.135 6.792 1.767l7.577-4.375c2.372-1.37 3.218-4.424 1.83-6.83zM4.731 1.875c0-0.345 0.28-0.625 0.625-0.625h11.249c0.345 0 0.625 0.28 0.625 0.625v2.875c0 0.345-0.28 0.625-0.625 0.625h-11.249c-0.345 0-0.625-0.28-0.625-0.625v-2.875zM2.606 13.207l3.25-4.333c0.081-0.108 0.125-0.24 0.125-0.375v-1.875h9.999v1.25h-5.625c-0.345 0-0.625 0.28-0.625 0.625s0.28 0.625 0.625 0.625h5.937l3.062 4.083c0.2 0.267 0.324 0.587 0.362 0.917h-17.473c0.038-0.33 0.162-0.65 0.362-0.917zM4.106 28.311c-1.034 0-1.875-0.841-1.875-1.875v-0.631h11.355c-0.198 0.81-0.197 1.676 0.030 2.506h-9.51zM14.076 24.561h-11.845v-9.187h17.499v5.107l-3.789 2.188c-0.79 0.456-1.428 1.106-1.865 1.892zM20.317 30.246c-1.794 1.036-4.085 0.423-5.122-1.372-1.041-1.812-0.41-4.094 1.372-5.123l3.392-1.959 3.75 6.495-3.392 1.959zM27.894 25.871l-3.102 1.791-3.75-6.495 3.102-1.791c1.795-1.036 4.086-0.423 5.122 1.372 1.041 1.804 0.408 4.094-1.372 5.122z"></path></svg>
                    </div></div>
                </div>
                <div class="elementor-element elementor-element-6680717 elementor-widget elementor-widget-elementskit-heading" data-id="6680717" data-element_type="widget">
                    <div class="ekit-wid-con"><div class="ekit-heading text_left">
                        <h4 class="ekit-heading--title">التدريب</h4>
                        <div class="ekit-heading__description"><p>احضر الدورات والبرامج التدريبية المعتمدة من الاتحاد.</p></div>
                    </div></div>
                </div>
            </div>
            {{-- Step 4 --}}
            <div class="elementor-element elementor-element-afeceed e-con-full e-flex e-con e-child" data-id="afeceed" data-element_type="container">
                <div class="elementor-element elementor-element-c9c992f elementor-absolute elementor-widget elementor-widget-heading" data-id="c9c992f" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}">
                    <h2 class="elementor-heading-title elementor-size-default">الخطوة 04</h2>
                </div>
                <div class="elementor-element elementor-element-75fbe54 elementor-view-default elementor-widget elementor-widget-icon" data-id="75fbe54" data-element_type="widget">
                    <div class="elementor-icon-wrapper"><div class="elementor-icon">
                        <svg class="ekit-svg-icon icon-clipboard" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M25.851 2.338h-2.189c-0.243 0-0.439 0.197-0.439 0.439s0.197 0.439 0.439 0.439h0.272v24.266h-16.406v-24.266h1.829v0.998c0 0.765 0.622 1.388 1.388 1.388h2.078c0.208 1.147 1.214 2.019 2.419 2.019h0.979c1.205 0 2.211-0.872 2.419-2.019h2.078c0.765 0 1.388-0.623 1.388-1.388v-1.896c0-0.765-0.623-1.388-1.388-1.388h-9.972c-0.765 0-1.388 0.623-1.388 1.388v0.019h-3.747c-0.966 0-1.753 0.786-1.753 1.752v17.641c0 0.243 0.197 0.439 0.439 0.439s0.439-0.197 0.439-0.439v-17.641c0-0.482 0.392-0.874 0.874-0.874h1.039v24.705c0 0.243 0.197 0.439 0.439 0.439h17.285c0.243 0 0.439-0.197 0.439-0.439v-24.705h1.039c0.482 0 0.874 0.392 0.874 0.874v25.088c0 0.482-0.392 0.874-0.874 0.874h-20.241c-0.481 0-0.874-0.392-0.874-0.874v-5.375c0-0.242-0.197-0.439-0.439-0.439s-0.439 0.197-0.439 0.439v5.375c0 0.967 0.786 1.753 1.753 1.753h20.241c0.966 0 1.752-0.786 1.752-1.753v-25.088c0-0.966-0.786-1.752-1.752-1.752zM10.236 2.319c0-0.281 0.228-0.509 0.509-0.509h9.972c0.281 0 0.509 0.228 0.509 0.509v1.896c0 0.281-0.228 0.509-0.509 0.509h-2.477c-0.243 0-0.439 0.197-0.439 0.439 0 0.871-0.709 1.579-1.58 1.579h-0.979c-0.871 0-1.579-0.708-1.579-1.579 0-0.243-0.197-0.439-0.439-0.439h-2.478c-0.281 0-0.509-0.228-0.509-0.509z"></path><path d="M21.328 12.955h-2.324l-1.485-4.055c-0.147-0.403-0.732-0.376-0.838 0.043l-1.595 6.281-1.54-4.48c-0.123-0.358-0.613-0.403-0.799-0.072l-1.281 2.284h-1.333c-0.243 0-0.439 0.197-0.439 0.439s0.196 0.439 0.439 0.439h1.591c0.159 0 0.306-0.086 0.383-0.225l0.927-1.653 1.7 4.945c0.142 0.412 0.735 0.388 0.842-0.035l1.608-6.331 1.102 3.009c0.063 0.173 0.228 0.288 0.413 0.288h2.631c0.243 0 0.439-0.197 0.439-0.439s-0.197-0.439-0.439-0.439z"></path><path d="M21.328 20.202h-11.195c-0.243 0-0.439 0.197-0.439 0.439s0.197 0.439 0.439 0.439h11.195c0.243 0 0.439-0.197 0.439-0.439s-0.197-0.439-0.439-0.439z"></path><path d="M21.328 24.074h-11.195c-0.243 0-0.439 0.197-0.439 0.439s0.197 0.439 0.439 0.439h11.195c0.243 0 0.439-0.197 0.439-0.439s-0.197-0.439-0.439-0.439z"></path></svg>
                    </div></div>
                </div>
                <div class="elementor-element elementor-element-88ac5ab elementor-widget elementor-widget-elementskit-heading" data-id="88ac5ab" data-element_type="widget">
                    <div class="ekit-wid-con"><div class="ekit-heading text_left">
                        <h4 class="ekit-heading--title">الاعتماد</h4>
                        <div class="ekit-heading__description"><p>احصل على شهادة الاعتماد الدولي وانضم رسمياً إلى مجتمع المحترفين.</p></div>
                    </div></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ===== SECTION 9: EVENTS ===== --}}
@if($events->count())
<div style="background:var(--e-global-color-651faef,#DEEFF8);padding:80px 0;">
    <div style="max-width:1280px;margin:0 auto;padding:0 20px;">
        <div style="text-align:center;margin-bottom:50px;">
            <h6 style="font-size:12px;letter-spacing:2px;text-transform:uppercase;color:var(--e-global-color-secondary,#2166A9);margin-bottom:16px;font-family:'Tajawal',sans-serif;font-weight:600;">{{ $ps('events','badge','الفعاليات القادمة') }}</h6>
            <h2 class="elementor-heading-title elementor-size-default" style="margin-bottom:16px;">{{ $ps('events','title','أبرز الفعاليات والمؤتمرات') }}</h2>
        </div>
        <div class="home-events-grid">
            @foreach($events as $event)
            <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 2px 20px rgba(33,102,169,0.07);">
                @if($event->image)
                <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title_ar }}" style="width:100%;height:200px;object-fit:cover;">
                @endif
                <div style="padding:24px;">
                    @if($event->event_date)
                    <div style="font-size:12px;color:var(--e-global-color-secondary,#2166A9);font-weight:600;margin-bottom:10px;">
                        <i class="far fa-calendar-alt" style="margin-left:4px;"></i>
                        {{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }}
                    </div>
                    @endif
                    <h4 style="font-family:'Cormorant','Tajawal',serif;font-size:1.15rem;font-weight:700;color:var(--e-global-color-primary,#131515);margin:0 0 10px;">{{ $event->title_ar }}</h4>
                    @if($event->location)
                    <p style="font-size:13px;color:var(--e-global-color-text,#737373);margin:0 0 14px;"><i class="fas fa-map-marker-alt" style="color:var(--e-global-color-secondary,#2166A9);margin-left:4px;"></i>{{ $event->location }}</p>
                    @endif
                    <a href="{{ route('events.show', $event->slug) }}" style="font-size:13px;font-weight:700;color:var(--e-global-color-secondary,#2166A9);text-decoration:none;">
                        اعرف أكثر <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div style="text-align:center;margin-top:40px;">
            <a href="{{ route('events') }}" class="elementor-button elementor-button-link elementor-size-sm">
                <span class="elementor-button-content-wrapper">
                    <span class="elementor-button-text">جميع الفعاليات</span>
                </span>
            </a>
        </div>
    </div>
</div>
@endif
{{-- ===== SECTION 8: LATEST NEWS ===== --}}
@if($news->count())
<div class="" data-id="decbe22-news" data-element_type="container" style="padding:80px 0;">
    <div class="e-con-inner">
        <div style="text-align:center;margin-bottom:50px;">
            <h6 class="elementor-heading-title" style="font-size:12px;letter-spacing:2px;text-transform:uppercase;color:var(--e-global-color-secondary,#2166A9);margin-bottom:16px;font-family:'Tajawal',sans-serif;font-weight:600;">{{ $ps('news','badge','آخر الأخبار') }}</h6>
            <h2 class="elementor-heading-title elementor-size-default" style="margin-bottom:16px;">{{ $ps('news','title','الأخبار والمقالات') }}</h2>
            <p style="color:var(--e-global-color-text,#737373);max-width:500px;margin:0 auto;">تابع آخر أخبار ومقالات الاتحاد العالمي الأكاديمي للتزيين.</p>
        </div>
        <div class="home-news-grid">
            @foreach($news as $article)
            <div style="background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 4px 30px rgba(33,102,169,0.08);transition:box-shadow 0.3s,transform 0.3s;" onmouseover="this.style.boxShadow='0 14px 45px rgba(33,102,169,0.14)';this.style.transform='translateY(-3px)';" onmouseout="this.style.boxShadow='0 4px 30px rgba(33,102,169,0.08)';this.style.transform='none';">
                @if($article->image)
                <a href="{{ route('news.show', $article->slug) }}" style="display:block;height:220px;overflow:hidden;">
                    <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title_ar }}" style="width:100%;height:100%;object-fit:cover;transition:transform 0.5s;">
                </a>
                @else
                <div style="height:220px;background:var(--e-global-color-651faef,#DEEFF8);display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-newspaper" style="font-size:3rem;color:var(--e-global-color-secondary,#2166A9);opacity:0.3;"></i>
                </div>
                @endif
                <div style="padding:28px 24px;">
                    <div style="font-size:12px;color:var(--e-global-color-text,#737373);margin-bottom:12px;">
                        @if($article->published_at)
                        <span><i class="far fa-calendar-alt" style="color:var(--e-global-color-secondary,#2166A9);margin-left:4px;"></i>{{ $article->published_at->format('d/m/Y') }}</span>
                        @endif
                    </div>
                    <h4 style="font-family:'Cormorant','Tajawal',serif;font-size:1.25rem;font-weight:700;color:var(--e-global-color-primary,#131515);margin:0 0 12px;line-height:1.3;">
                        <a href="{{ route('news.show', $article->slug) }}" style="color:inherit;text-decoration:none;">{{ $article->title_ar }}</a>
                    </h4>
                    @if($article->excerpt_ar)
                    <p style="font-size:14px;color:var(--e-global-color-text,#737373);line-height:1.7;margin:0 0 18px;">{{ Str::limit($article->excerpt_ar, 100) }}</p>
                    @endif
                    <a href="{{ route('news.show', $article->slug) }}" style="font-size:13px;font-weight:700;color:var(--e-global-color-secondary,#2166A9);text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
                        اقرأ المزيد <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div style="text-align:center;margin-top:50px;">
            <a href="{{ route('news') }}" class="elementor-button elementor-button-link elementor-size-sm">
                <span class="elementor-button-content-wrapper">
                    <span class="elementor-button-text">عرض جميع الأخبار</span>
                </span>
            </a>
        </div>
    </div>
</div>
@endif



{{-- ===== SECTION 11: TESTIMONIALS ===== --}}
@if($testimonials->count())
<div class="elementor-element elementor-element-c31b507 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="c31b507" data-element_type="container" style="width:100%;padding:80px 0; margin-bottom: 70px;">
    <div class="e-con-inner" style="max-width:1280px;margin:0 auto;padding:0 20px;">
        <div style="text-align:center;margin-bottom:55px;position:relative;">
            <h6 style="font-size:12px;letter-spacing:2px;text-transform:uppercase;color:var(--e-global-color-secondary,#2166A9);margin-bottom:16px;font-family:'Tajawal',sans-serif;font-weight:600;">{{ $ps('testimonials','badge','آراء العملاء') }}</h6>
            <h2 class="elementor-heading-title elementor-size-default" style="margin-bottom:16px;">{{ $ps('testimonials','title','ما يقولونه عنا') }}</h2>
            <p style="color:var(--e-global-color-text,#737373);max-width:500px;margin:0 auto;font-size:15px;line-height:1.75;">شهادات حقيقية من محترفين انضموا إلى الاتحاد العالمي الأكاديمي للتزيين من حول العالم.</p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:28px;">
            @foreach($testimonials as $testi)
            <div class="cmac-testimonial-card" style="background:#fff;border-radius:20px;padding:32px 28px;box-shadow:0 4px 30px rgba(33,102,169,0.08);position:relative;overflow:hidden;">
                <div style="position:absolute;top:20px;left:24px;opacity:0.07;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 40" width="60" fill="var(--e-global-color-secondary,#2166A9)">
                        <path d="M0 20C0 9 9 0 20 0v8C13 8 8 13 8 20v2h12v18H0V20zm28 0C28 9 37 0 48 0v8c-7 0-12 5-12 12v2h12v18H28V20z"/>
                    </svg>
                </div>
                <div style="display:flex;gap:6px;margin-bottom:18px;">
                    @for($i=1;$i<=5;$i++)
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="{{ $i <= ($testi->rating ?? 5) ? '#f59e0b' : '#e5e7eb' }}" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    @endfor
                </div>
                <p style="font-size:15px;color:var(--e-global-color-text,#737373);line-height:1.85;margin-bottom:24px;font-style:italic;">{{ $testi->content_ar }}</p>
                <div style="display:flex;align-items:center;gap:14px;margin-top:auto;">
                    @if($testi->image)
                    <img src="{{ Storage::url($testi->image) }}" alt="{{ $testi->name_ar }}" style="width:48px;height:48px;border-radius:50%;object-fit:cover;flex-shrink:0;">
                    @else
                    <div style="width:48px;height:48px;border-radius:50%;background:var(--e-global-color-651faef,#DEEFF8);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="var(--e-global-color-secondary,#2166A9)" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                        </svg>
                    </div>
                    @endif
                    <div>
                        <div style="font-weight:700;font-size:15px;color:var(--e-global-color-primary,#131515);">{{ $testi->name_ar }}</div>
                        @if($testi->role_ar)<div style="font-size:13px;color:var(--e-global-color-secondary,#2166A9);">{{ $testi->role_ar }}</div>@endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif



</div>{{-- end .elementor-265 --}}
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('mf-date')) {
        flatpickr('#mf-date', { dateFormat: 'Y-m-d', allowInput: true });
    }
    if (document.getElementById('mf-time')) {
        flatpickr('#mf-time', { enableTime: true, noCalendar: true, dateFormat: 'H:i', time_24hr: true, allowInput: true });
    }
});
</script>
<script>
// Animate counters
document.querySelectorAll('.elementor-counter-number').forEach(function(el) {
    const target = parseInt(el.dataset.toValue) || parseInt(el.textContent);
    const duration = parseInt(el.dataset.duration) || 2000;
    let start = 0;
    const step = target / (duration / 16);
    const timer = setInterval(function() {
        start += step;
        if (start >= target) {
            el.textContent = target;
            clearInterval(timer);
        } else {
            el.textContent = Math.floor(start);
        }
    }, 16);
});
</script>
@endpush
