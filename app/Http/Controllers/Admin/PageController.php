<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Page definitions: label, icon, sections
    public static function pages(): array
    {
        return [
            'home' => ['label' => 'الرئيسية',           'icon' => 'bi-house',          'color' => '#2166A9'],
            'about' => ['label' => 'عن المنظمة',         'icon' => 'bi-info-circle',    'color' => '#198754'],
            'education' => ['label' => 'المسارات التعليمية', 'icon' => 'bi-mortarboard',    'color' => '#dc3545'],
            'awards' => ['label' => 'الجوائز والأوسمة',   'icon' => 'bi-award',          'color' => '#fd7e14'],
            'profession_day' => ['label' => 'يوم المهنة العالمي', 'icon' => 'bi-calendar-star',  'color' => '#6f42c1'],
            'events' => ['label' => 'الفعاليات',          'icon' => 'bi-calendar-event', 'color' => '#0dcaf0'],
            'supporter' => ['label' => 'الداعمون',           'icon' => 'bi-building',       'color' => '#20c997'],
            'news' => ['label' => 'الأخبار',            'icon' => 'bi-newspaper',      'color' => '#6c757d'],
            'contact' => ['label' => 'تواصل معنا',         'icon' => 'bi-envelope',       'color' => '#0d6efd'],
            'join' => ['label' => 'انضم إلينا',         'icon' => 'bi-person-plus',    'color' => '#e83e8c'],
        ];
    }

    // Section definitions per page
    public static function pageSections(): array
    {
        return [
            'home' => [
                'hero' => ['label' => 'قسم الهيرو (Hero)', 'fields' => [
                    ['key' => 'badge',    'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title',    'label' => 'العنوان الرئيسي', 'type' => 'text'],
                    ['key' => 'subtitle', 'label' => 'النص التوضيحي',   'type' => 'textarea'],
                ]],
                'about' => ['label' => 'قسم عن الاتحاد', 'fields' => [
                    ['key' => 'badge',           'label' => 'الشارة (h2)',           'type' => 'text'],
                    ['key' => 'title',           'label' => 'العنوان (h3)',           'type' => 'text'],
                    ['key' => 'description',     'label' => 'النص الأول (فقرة)',      'type' => 'textarea'],
                    ['key' => 'extra_text_1',    'label' => 'النص الإضافي - فقرة 1',  'type' => 'textarea'],
                    ['key' => 'extra_text_2',    'label' => 'النص الإضافي - فقرة 2',  'type' => 'textarea'],
                    ['key' => 'button_text',     'label' => 'نص الزر',                'type' => 'text'],
                    ['key' => 'image_main',      'label' => 'الصورة الرئيسية',        'type' => 'image'],
                    ['key' => 'image_overlay',   'label' => 'الصورة المتداخلة',       'type' => 'image'],
                    ['key' => 'counter_value',   'label' => 'رقم العداد',             'type' => 'text'],
                    ['key' => 'counter_suffix',  'label' => 'لاحقة العداد (+)',        'type' => 'text'],
                    ['key' => 'counter_label',   'label' => 'نص تحت العداد',          'type' => 'text'],
                ]],
                'stats' => ['label' => 'قسم الإحصاءات', 'fields' => [
                    ['key' => 'badge', 'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title', 'label' => 'العنوان',         'type' => 'text'],
                ], 'resource_link' => ['route' => 'admin.statistics.index', 'label' => 'تعديل أرقام الإحصاءات']],
                'services' => ['label' => 'قسم الخدمات / المسارات', 'fields' => [
                    ['key' => 'badge',        'label' => 'الشارة الصغيرة',  'type' => 'text'],
                    ['key' => 'title',        'label' => 'العنوان',          'type' => 'text'],
                    ['key' => 'description',  'label' => 'النص التوضيحي',   'type' => 'textarea'],
                    ['key' => 'center_image', 'label' => 'الصورة المركزية', 'type' => 'image'],
                    ['key' => 'card1_title',  'label' => 'بطاقة 1: العنوان', 'type' => 'text'],
                    ['key' => 'card1_desc',   'label' => 'بطاقة 1: الوصف',  'type' => 'textarea'],
                    ['key' => 'card2_title',  'label' => 'بطاقة 2: العنوان', 'type' => 'text'],
                    ['key' => 'card2_desc',   'label' => 'بطاقة 2: الوصف',  'type' => 'textarea'],
                    ['key' => 'card3_title',  'label' => 'بطاقة 3: العنوان', 'type' => 'text'],
                    ['key' => 'card3_desc',   'label' => 'بطاقة 3: الوصف',  'type' => 'textarea'],
                    ['key' => 'card4_title',  'label' => 'بطاقة 4: العنوان', 'type' => 'text'],
                    ['key' => 'card4_desc',   'label' => 'بطاقة 4: الوصف',  'type' => 'textarea'],
                    ['key' => 'card5_title',  'label' => 'بطاقة 5: العنوان', 'type' => 'text'],
                    ['key' => 'card5_desc',   'label' => 'بطاقة 5: الوصف',  'type' => 'textarea'],
                ], 'resource_link' => ['route' => 'admin.education.index', 'label' => 'تعديل المسارات التعليمية']],
                'awards' => ['label' => 'قسم الجوائز', 'fields' => [
                    ['key' => 'badge',       'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title',       'label' => 'العنوان',         'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي',  'type' => 'textarea'],
                ], 'resource_link' => ['route' => 'admin.awards.index', 'label' => 'تعديل الجوائز']],
                'events' => ['label' => 'قسم الفعاليات', 'fields' => [
                    ['key' => 'badge', 'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title', 'label' => 'العنوان',         'type' => 'text'],
                ], 'resource_link' => ['route' => 'admin.events.index', 'label' => 'تعديل الفعاليات']],
                'supporters' => ['label' => 'قسم الداعمين', 'fields' => [
                    ['key' => 'badge', 'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title', 'label' => 'العنوان',         'type' => 'text'],
                ], 'resource_link' => ['route' => 'admin.supporters.index', 'label' => 'تعديل الداعمين']],
                'news' => ['label' => 'قسم الأخبار', 'fields' => [
                    ['key' => 'badge', 'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title', 'label' => 'العنوان',         'type' => 'text'],
                ], 'resource_link' => ['route' => 'admin.news.index', 'label' => 'تعديل الأخبار']],
                'testimonials' => ['label' => 'قسم الشهادات', 'fields' => [
                    ['key' => 'badge', 'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title', 'label' => 'العنوان',         'type' => 'text'],
                ], 'resource_link' => ['route' => 'admin.testimonials.index', 'label' => 'تعديل الشهادات']],
                'expert_section' => ['label' => 'قسم الخبراء (Section 3 - الخلفية + النص)', 'fields' => [
                    ['key' => 'icon',           'label' => 'أيقونة (كلاس FontAwesome مثل fas fa-award)', 'type' => 'text'],
                    ['key' => 'title',          'label' => 'العنوان الرئيسي (h2)',                       'type' => 'text'],
                    ['key' => 'description',    'label' => 'النص التوضيحي',                              'type' => 'textarea'],
                    ['key' => 'bg_image', 'label' => 'صورة الخلفية', 'type' => 'image', 'hint' => 'الأبعاد المستحسنة: 1920 × 800 بكسل — صيغة JPG أو WebP — لا تتجاوز 500 كيلوبايت للحصول على أفضل أداء.'],
                    ['key' => 'bg_size',  'label' => 'مقاس الخلفية (cover / contain / auto / 50%)', 'type' => 'text'],
                ]],
                'why_us' => ['label' => 'لماذا تختار الاتحاد؟ (نص + صورة)', 'fields' => [
                    ['key' => 'title',        'label' => 'العنوان الرئيسي (h2)',     'type' => 'text'],
                    ['key' => 'subtitle',     'label' => 'العنوان الفرعي (h3)',       'type' => 'text'],
                    ['key' => 'intro',        'label' => 'المقدمة (فقرة)',            'type' => 'textarea'],
                    ['key' => 'item1_title',  'label' => 'نقطة 1: العنوان',           'type' => 'text'],
                    ['key' => 'item1_desc',   'label' => 'نقطة 1: الوصف',             'type' => 'textarea'],
                    ['key' => 'item2_title',  'label' => 'نقطة 2: العنوان',           'type' => 'text'],
                    ['key' => 'item2_desc',   'label' => 'نقطة 2: الوصف',             'type' => 'textarea'],
                    ['key' => 'item3_title',  'label' => 'نقطة 3: العنوان',           'type' => 'text'],
                    ['key' => 'item3_desc',   'label' => 'نقطة 3: الوصف',             'type' => 'textarea'],
                    ['key' => 'side_image',   'label' => 'الصورة بجانب النص',         'type' => 'image'],
                ]],
                'cta' => ['label' => 'قسم الدعوة للانضمام (CTA)', 'fields' => [
                    ['key' => 'badge',       'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title',       'label' => 'العنوان',         'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي',  'type' => 'textarea'],
                    ['key' => 'button_text', 'label' => 'نص الزر',         'type' => 'text'],
                    ['key' => 'button_url',  'label' => 'رابط الزر',       'type' => 'url'],
                ]],
            ],
            'about' => [
                'hero' => ['label' => 'رأس الصفحة', 'fields' => [
                    ['key' => 'title',       'label' => 'العنوان',        'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي', 'type' => 'textarea'],
                ], 'resource_link' => ['route' => 'admin.about.index', 'label' => 'تعديل أقسام عن المنظمة']],
            ],
            'education' => [
                'hero' => ['label' => 'رأس الصفحة', 'fields' => [
                    ['key' => 'title',       'label' => 'العنوان',        'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي', 'type' => 'textarea'],
                ]],
                'intro' => ['label' => 'المقدمة', 'fields' => [
                    ['key' => 'badge',       'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title',       'label' => 'العنوان',         'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي',  'type' => 'textarea'],
                ], 'resource_link' => ['route' => 'admin.education.index', 'label' => 'تعديل المسارات التعليمية']],
            ],
            'awards' => [
                'hero' => ['label' => 'رأس الصفحة', 'fields' => [
                    ['key' => 'title',       'label' => 'العنوان',        'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي', 'type' => 'textarea'],
                ]],
                'intro' => ['label' => 'المقدمة', 'fields' => [
                    ['key' => 'badge',       'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title',       'label' => 'العنوان',         'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي',  'type' => 'textarea'],
                ], 'resource_link' => ['route' => 'admin.awards.index', 'label' => 'تعديل الجوائز']],
            ],
            'profession_day' => [
                'hero' => ['label' => 'رأس الصفحة', 'fields' => [
                    ['key' => 'title',       'label' => 'العنوان',        'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي', 'type' => 'textarea'],
                ]],
                'intro' => ['label' => 'المقدمة', 'fields' => [
                    ['key' => 'badge',       'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title',       'label' => 'العنوان',         'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي',  'type' => 'textarea'],
                ], 'resource_link' => ['route' => 'admin.profession-day.index', 'label' => 'تعديل محتوى يوم المهنة']],
            ],
            'events' => [
                'hero' => ['label' => 'رأس الصفحة', 'fields' => [
                    ['key' => 'title',       'label' => 'العنوان',        'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي', 'type' => 'textarea'],
                ]],
                'intro' => ['label' => 'المقدمة', 'fields' => [
                    ['key' => 'badge', 'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title', 'label' => 'العنوان',         'type' => 'text'],
                ], 'resource_link' => ['route' => 'admin.events.index', 'label' => 'تعديل الفعاليات']],
            ],
            'supporter' => [
                'hero' => ['label' => 'رأس الصفحة', 'fields' => [
                    ['key' => 'title',       'label' => 'العنوان',        'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي', 'type' => 'textarea'],
                ]],
                'intro' => ['label' => 'المقدمة', 'fields' => [
                    ['key' => 'badge',       'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title',       'label' => 'العنوان',         'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي',  'type' => 'textarea'],
                ]],
                'vision' => ['label' => 'رؤيتنا في الشراكات', 'fields' => [
                    ['key' => 'title',       'label' => 'العنوان',        'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي', 'type' => 'textarea'],
                ]],
                'proud' => ['label' => 'نفخر بشراكاتنا', 'fields' => [
                    ['key' => 'title',       'label' => 'العنوان',        'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي', 'type' => 'textarea'],
                ]],
                'cta' => ['label' => 'دعوة للشراكة (CTA)', 'fields' => [
                    ['key' => 'title',       'label' => 'العنوان',        'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي', 'type' => 'textarea'],
                    ['key' => 'button_text', 'label' => 'نص الزر',        'type' => 'text'],
                ], 'resource_link' => ['route' => 'admin.supporters.index', 'label' => 'تعديل قائمة الداعمين']],
            ],
            'news' => [
                'hero' => ['label' => 'رأس الصفحة', 'fields' => [
                    ['key' => 'title',       'label' => 'العنوان',        'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي', 'type' => 'textarea'],
                ], 'resource_link' => ['route' => 'admin.news.index', 'label' => 'تعديل الأخبار']],
            ],
            'contact' => [
                'hero' => ['label' => 'رأس الصفحة', 'fields' => [
                    ['key' => 'title',       'label' => 'العنوان',        'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي', 'type' => 'textarea'],
                ]],
                'intro' => ['label' => 'مقدمة', 'fields' => [
                    ['key' => 'title',       'label' => 'العنوان',        'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي', 'type' => 'textarea'],
                ]],
            ],
            'join' => [
                'hero' => ['label' => 'رأس الصفحة', 'fields' => [
                    ['key' => 'title',       'label' => 'العنوان',        'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي', 'type' => 'textarea'],
                ]],
                'intro' => ['label' => 'مقدمة', 'fields' => [
                    ['key' => 'badge',       'label' => 'الشارة الصغيرة', 'type' => 'text'],
                    ['key' => 'title',       'label' => 'العنوان',         'type' => 'text'],
                    ['key' => 'description', 'label' => 'النص التوضيحي',  'type' => 'textarea'],
                ]],
            ],
        ];
    }

    public function index()
    {
        $pages = self::pages();
        // Count sections per page
        $sectionCounts = [];
        foreach (self::pageSections() as $page => $sections) {
            $sectionCounts[$page] = count($sections);
        }

        return view('admin.pages.index', compact('pages', 'sectionCounts'));
    }

    public function edit(string $page)
    {
        $pages = self::pages();
        if (! isset($pages[$page])) {
            abort(404);
        }
        $pageSections = self::pageSections()[$page] ?? [];
        $pageInfo = $pages[$page];

        // Load current values from DB
        $currentValues = PageSection::where('page', $page)
            ->get()
            ->groupBy('section')
            ->map(fn ($items) => $items->pluck('value', 'key')->toArray())
            ->toArray();

        return view('admin.pages.edit', compact('page', 'pageInfo', 'pageSections', 'currentValues'));
    }

    public function update(Request $request, string $page)
    {
        $pages = self::pages();
        if (! isset($pages[$page])) {
            abort(404);
        }

        $pageSections = self::pageSections()[$page] ?? [];

        foreach ($pageSections as $sectionKey => $sectionDef) {
            foreach ($sectionDef['fields'] as $field) {
                $key = $field['key'];
                $type = $field['type'];
                $inputName = "sections.{$sectionKey}.{$key}";

                if ($type === 'image') {
                    if ($request->hasFile("sections.{$sectionKey}.{$key}")) {
                        $path = $request->file("sections.{$sectionKey}.{$key}")
                            ->store('uploads/page-sections', 'public');
                        PageSection::set($page, $sectionKey, $key, $path, 'image');
                    }
                } else {
                    $value = $request->input("sections.{$sectionKey}.{$key}");
                    if ($value !== null) {
                        PageSection::set($page, $sectionKey, $key, $value, $type);
                    }
                }
            }
        }

        return back()->with('success', 'تم حفظ محتوى الصفحة بنجاح.');
    }
}
