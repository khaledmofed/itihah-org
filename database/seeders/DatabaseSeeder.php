<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use App\Models\AdminUser;
use App\Models\Award;
use App\Models\EducationalPath;
use App\Models\ProfessionDaySection;
use App\Models\Setting;
use App\Models\Statistic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        AdminUser::firstOrCreate(
            ['email' => 'admin@cmac.ae'],
            [
                'name' => 'مدير النظام',
                'password' => Hash::make('Cmac@2025!'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        // Default settings
        $defaultSettings = [
            'site_name_ar' => 'الاتحاد العالمي الأكاديمي للتزيين',
            'site_name_en' => 'World Union Academy of Cosmetology',
            'site_description_ar' => 'منظمة دولية متخصصة في تعليم وتطوير مهنة التزيين والتجميل منذ 25 عاماً',
            'contact_email' => 'manalcmac@hotmail.com',
            'contact_phone' => '+971 50 1 592 592',
            'address' => 'دبي، الإمارات العربية المتحدة',
            'website' => 'www.cmacint.com',
        ];
        foreach ($defaultSettings as $key => $value) {
            Setting::firstOrCreate(['key' => $key], ['value' => $value, 'type' => 'text', 'group' => 'general']);
        }

        // Statistics
        $stats = [
            ['label_ar' => 'عاماً من الخبرة', 'label_en' => 'عاماً من الخبرة', 'value' => '25', 'suffix' => '', 'icon' => 'bi-clock-history', 'order' => 1],
            ['label_ar' => 'دولة عضو', 'label_en' => 'دولة عضو', 'value' => '50', 'suffix' => '+', 'icon' => 'bi-globe', 'order' => 2],
            ['label_ar' => 'خبير معتمد', 'label_en' => 'خبير معتمد', 'value' => '1000', 'suffix' => '+', 'icon' => 'bi-person-badge', 'order' => 3],
            ['label_ar' => 'طالب وطالبة', 'label_en' => 'طالب وطالبة', 'value' => '5000', 'suffix' => '+', 'icon' => 'bi-mortarboard', 'order' => 4],
        ];
        foreach ($stats as $s) {
            Statistic::firstOrCreate(
                ['label_ar' => $s['label_ar']],
                array_merge($s, ['is_active' => true])
            );
        }

        // About sections
        $aboutSections = [
            [
                'section_key' => 'intro',
                'title_ar' => 'الاتحاد العالمي الأكاديمي للتزيين',
                'title_en' => 'الاتحاد العالمي الأكاديمي للتزيين',
                'content_ar' => 'الاتحاد العالمي الأكاديمي للتزيين (C.M.A.C) منظمة دولية متخصصة في تعليم وتطوير مهنة التزيين والتجميل، تأسست قبل 25 عاماً وتضم في عضويتها خبراء ومتخصصين من أكثر من 50 دولة حول العالم. تسعى المنظمة إلى رفع مستوى المهنة وتحقيق الاعتراف الدولي بها من خلال برامج تعليمية معتمدة ومعايير مهنية عالية.',
                'icon' => 'bi-building',
                'order' => 1,
            ],
            [
                'section_key' => 'vision',
                'title_ar' => 'الرؤية',
                'title_en' => 'الرؤية',
                'content_ar' => 'أن نكون المرجع الدولي الأول في تطوير وتعليم مهنة التزيين والتجميل، ونموذجاً يُحتذى به في الريادة والتميز المهني على المستوى العالمي.',
                'icon' => 'bi-eye',
                'order' => 2,
            ],
            [
                'section_key' => 'mission',
                'title_ar' => 'الرسالة',
                'title_en' => 'الرسالة',
                'content_ar' => 'تطوير وتأهيل الكوادر المتخصصة في مجال التزيين والتجميل وفق أعلى المعايير المهنية الدولية، وتعزيز الاعتراف العالمي بهذه المهنة من خلال برامج تعليمية معتمدة وفعاليات دولية مميزة.',
                'icon' => 'bi-bullseye',
                'order' => 3,
            ],
            [
                'section_key' => 'values',
                'title_ar' => 'القيم',
                'title_en' => 'القيم',
                'content_ar' => 'التميز والجودة، الاحترافية والأخلاقيات، التعاون والشراكة الدولية، الابتكار والإبداع، احترام التنوع الثقافي، والالتزام بمعايير المهنة.',
                'icon' => 'bi-gem',
                'order' => 4,
            ],
            [
                'section_key' => 'history',
                'title_ar' => 'تاريخنا',
                'title_en' => 'تاريخنا',
                'content_ar' => "منذ تأسيس الاتحاد العالمي الأكاديمي للتزيين قبل 25 عاماً في دبي، شهدت المنظمة نمواً متسارعاً وتوسعاً ملحوظاً في عضويتها لتضم اليوم أكثر من 50 دولة من مختلف أنحاء العالم.\n\nبدأت المسيرة بخطوات رائدة نحو رفع مستوى مهنة التزيين والتجميل وإعطائها المكانة اللائقة بها، من خلال وضع معايير مهنية واضحة وبرامج تعليمية معتمدة تحاكي أفضل الممارسات الدولية.\n\nاليوم، يفخر الاتحاد بشبكة واسعة من الخبراء والمتخصصين في مجال التزيين والتجميل، ويواصل مسيرته نحو تحقيق رؤيته في أن يكون المرجع الدولي الأول في هذا المجال.",
                'icon' => 'bi-clock-history',
                'order' => 5,
            ],
            [
                'section_key' => 'structure',
                'title_ar' => 'الهيكل التنظيمي',
                'title_en' => 'الهيكل التنظيمي',
                'content_ar' => 'يتكون الاتحاد من مجلس إدارة دولي يضم ممثلين من الدول الأعضاء، وأمانة عامة تدير الشؤون اليومية للمنظمة، ولجان متخصصة في مجالات التعليم والجوائز والفعاليات والعلاقات الدولية.',
                'icon' => 'bi-diagram-3',
                'order' => 6,
            ],
        ];
        foreach ($aboutSections as $s) {
            AboutSection::firstOrCreate(
                ['section_key' => $s['section_key']],
                array_merge($s, ['is_active' => true])
            );
        }
        $this->call(AboutMissingSectionsSeeder::class);

        // Awards
        $awards = [
            [
                'slug' => 'wisam-altamayoz',
                'title_ar' => 'وسام التميز',
                'title_en' => 'تكريم الإنجازات الاستثنائية في مجال التزيين والتجميل',
                'description_ar' => 'يُمنح وسام التميز للمحترفين الذين حققوا إنجازات استثنائية في مجال التزيين والتجميل على المستوى الدولي، وأسهموا في الارتقاء بمستوى المهنة.',
                'criteria_ar' => "سنوات خبرة لا تقل عن 10 سنوات في المجال\nإنجازات موثقة ومعترف بها دولياً\nإسهامات ملموسة في تطوير المجتمع المهني\nالالتزام بأخلاقيات المهنة ومعايير الاتحاد",
                'icon' => 'bi-award-fill',
                'badge_color' => '#ffd700',
                'order' => 1,
            ],
            [
                'slug' => 'wisam-alreada',
                'title_ar' => 'وسام الريادة',
                'title_en' => 'تقدير الإبداع والابتكار في قيادة المهنة على الصعيد الدولي',
                'description_ar' => 'يُمنح وسام الريادة للمبدعين والمبتكرين الذين أسهموا في قيادة التطور المهني في مجال التزيين والتجميل.',
                'criteria_ar' => "ريادة واضحة في الابتكار والإبداع المهني\nأثر ملموس على المجتمع التجميلي المحلي أو الدولي\nسنوات خبرة لا تقل عن 7 سنوات",
                'icon' => 'bi-trophy-fill',
                'badge_color' => '#c0c0c0',
                'order' => 2,
            ],
            [
                'slug' => 'jaizat-alfares',
                'title_ar' => 'جائزة الفارس',
                'title_en' => 'وسام الشخصيات البارزة ذات الإسهامات الاستثنائية',
                'description_ar' => 'جائزة خاصة تُمنح للشخصيات البارزة التي قدمت إسهامات استثنائية في خدمة مهنة التزيين والتجميل.',
                'criteria_ar' => "إسهامات استثنائية في خدمة مهنة التزيين والتجميل\nتأثير واسع على المستوى المحلي والدولي\nترشيح من لجنة متخصصة",
                'icon' => 'bi-gem',
                'badge_color' => '#cd7f32',
                'order' => 3,
            ],
            [
                'slug' => 'jaizat-altabees',
                'title_ar' => 'جائزة التأبيس',
                'title_en' => 'تميّز في فنون التصفيف والتزيين التقليدي والمعاصر',
                'description_ar' => 'تُمنح جائزة التأبيس تقديراً للمتميزين في فن التصفيف والتزيين التقليدي والحديث.',
                'criteria_ar' => "مهارة عالية في فنون التزيين والتصفيف\nتميز في المسابقات المحلية أو الدولية\nسنوات خبرة لا تقل عن 5 سنوات",
                'icon' => 'bi-stars',
                'badge_color' => '#2166A9',
                'order' => 4,
            ],
        ];
        foreach ($awards as $a) {
            Award::firstOrCreate(
                ['slug' => $a['slug']],
                array_merge($a, ['is_active' => true])
            );
        }

        // Profession Day sections
        $profDaySections = [
            [
                'section_key' => 'about_day',
                'title_ar' => 'ما هو يوم المهنة العالمي؟',
                'content_ar' => 'يوم المهنة العالمي للتزيين والتجميل هو احتفال سنوي دولي أطلقه الاتحاد العالمي الأكاديمي للتزيين (C.M.A.C) ليكون يوماً خاصاً يُحتفل فيه بمهنة التزيين والتجميل حول العالم، تكريماً لأصحاب هذه المهنة ومكانتها في المجتمع.',
                'order' => 1,
            ],
            [
                'section_key' => 'why_day',
                'title_ar' => 'لماذا يوم المهنة العالمي؟',
                'content_ar' => "جاءت فكرة يوم المهنة العالمي للتزيين والتجميل لتسليط الضوء على أهمية هذه المهنة وإسهاماتها في المجتمع، وتعزيز الاعتزاز المهني لدى أصحابها في مختلف دول العالم.\n\nيهدف هذا اليوم إلى:\n- تكريم المحترفين في مجال التزيين والتجميل\n- رفع مستوى الوعي بأهمية المهنة\n- تعزيز الروابط بين المتخصصين عالمياً\n- تشجيع الجيل القادم على الالتحاق بهذه المهنة المرموقة",
                'order' => 2,
            ],
            [
                'section_key' => 'celebrations',
                'title_ar' => 'كيف نحتفل؟',
                'content_ar' => 'تُقام في يوم المهنة العالمي فعاليات وأنشطة متنوعة في مختلف دول العالم، تشمل المؤتمرات والندوات المتخصصة، وعروض التزيين والأزياء، ومسابقات الإبداع والتميز المهني، وتسليم الجوائز والأوسمة للمتميزين.',
                'order' => 3,
            ],
        ];
        foreach ($profDaySections as $s) {
            ProfessionDaySection::firstOrCreate(
                ['section_key' => $s['section_key']],
                array_merge($s, ['is_active' => true])
            );
        }

        // Educational paths
        $paths = [
            [
                'category' => 'taheel',
                'title_ar' => 'برنامج التأهيل الأساسي في التزيين',
                'title_en' => 'برنامج التأهيل الأساسي في التزيين',
                'description_ar' => 'برنامج شامل يؤهل المبتدئين لدخول عالم التزيين والتجميل، يغطي المهارات الأساسية في تصفيف الشعر والعناية بالبشرة والأظافر.',
                'level' => 'مبتدئ',
                'duration' => '6 أشهر',
                'objectives' => ['اكتساب المهارات الأساسية في التزيين', 'التعرف على أدوات ومستحضرات التجميل', 'تطبيق معايير السلامة والنظافة', 'بناء أساس مهني متين'],
                'order' => 1,
            ],
            [
                'category' => 'tatweer',
                'title_ar' => 'برنامج تطوير المهارات المتقدمة',
                'title_en' => 'برنامج تطوير المهارات المتقدمة',
                'description_ar' => 'برنامج متقدم للمحترفين الذين يسعون لرفع مستواهم المهني واكتساب تقنيات ومهارات متقدمة في مجال التزيين والتجميل.',
                'level' => 'متقدم',
                'duration' => '3 أشهر',
                'requirements' => ['خبرة لا تقل عن سنتين في المجال', 'إتمام برنامج التأهيل الأساسي أو ما يعادله'],
                'order' => 1,
            ],
            [
                'category' => 'certificates',
                'title_ar' => 'شهادة محترف التزيين الدولي',
                'title_en' => 'شهادة محترف التزيين الدولي',
                'description_ar' => 'شهادة احترافية معتمدة دولياً تُصدر من الاتحاد العالمي الأكاديمي للتزيين، تفتح أبواباً واسعة أمام حاملها في سوق العمل الدولي.',
                'level' => 'احترافي',
                'duration' => 'حسب البرنامج',
                'order' => 1,
            ],
        ];
        foreach ($paths as $p) {
            EducationalPath::firstOrCreate(
                ['title_ar' => $p['title_ar']],
                array_merge($p, ['is_active' => true])
            );
        }

        $this->command->info('✓ تم زرع البيانات الأولية بنجاح!');
        $this->command->info('بيانات دخول المدير:');
        $this->command->info('  البريد: admin@cmac.ae');
        $this->command->info('  كلمة المرور: Cmac@2025!');
    }
}
