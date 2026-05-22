<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class PageSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [

            // ===================== HOME PAGE =====================
            ['home', 'hero', 'badge',       'text',     'الاتحاد العالمي الأكاديمي'],
            ['home', 'hero', 'title',       'text',     'الاتحاد العالمي الأكاديمي للتزيين'],
            ['home', 'hero', 'subtitle',    'textarea', 'منظمة دولية متخصصة في تعليم وتطوير مهنة التزيين والتجميل منذ 25 عاماً.'],

            ['home', 'about', 'badge',       'text',     'من نحن'],
            ['home', 'about', 'title',       'text',     'الاتحاد العالمي الأكاديمي للتزيين'],
            ['home', 'about', 'description', 'textarea', 'منظمة دولية تأسست منذ أكثر من 25 عاماً، تضم كوادر مهنية من أكثر من 50 دولة، وتسعى إلى رفع مستوى مهنة التزيين والتجميل وتطويرها عالمياً.'],
            ['home', 'about', 'button_text', 'text',     'اعرف أكثر عنا'],
            ['home', 'about', 'image',       'image',    ''],

            ['home', 'stats', 'badge', 'text', 'أرقامنا'],
            ['home', 'stats', 'title', 'text', 'الاتحاد بالأرقام'],

            ['home', 'services', 'badge',        'text',     'خدماتنا'],
            ['home', 'services', 'title',        'text',     'مساراتنا التعليمية والمهنية'],
            ['home', 'services', 'description',  'textarea', 'نقدم برامج تدريبية معتمدة دولياً في مجال التزيين والتجميل لتطوير المهنيين وتأهيلهم للمعايير العالمية.'],
            ['home', 'services', 'center_image', 'image',    '5a8fc8f0-ed0d-4294-93ec-e740287c5085-2026-04-24-2.webp'],
            ['home', 'services', 'card1_title',  'text',     'التأهيل المهني'],
            ['home', 'services', 'card1_desc',   'textarea', 'برامج أساسية لتأهيل المبتدئين وفق أعلى المعايير المهنية الدولية.'],
            ['home', 'services', 'card2_title',  'text',     'التطوير المهني'],
            ['home', 'services', 'card2_desc',   'textarea', 'برامج متقدمة للمحترفين الذين يسعون لرفع مستواهم والتميز الدولي.'],
            ['home', 'services', 'card3_title',  'text',     'الشهادات المعتمدة'],
            ['home', 'services', 'card3_desc',   'textarea', 'شهادات مهنية معترف بها دولياً في مختلف تخصصات التجميل.'],
            ['home', 'services', 'card4_title',  'text',     'الفعاليات الدولية'],
            ['home', 'services', 'card4_desc',   'textarea', 'ملتقيات ومؤتمرات دولية تجمع أبرز المتخصصين والخبراء.'],
            ['home', 'services', 'card5_title',  'text',     'الجوائز والأوسمة'],
            ['home', 'services', 'card5_desc',   'textarea', 'نكرّم المتميزين والمبدعين بجوائز ووسامات دولية معترف بها.'],

            ['home', 'awards', 'badge',       'text',     'التميز والإنجاز'],
            ['home', 'awards', 'title',       'text',     'الجوائز والأوسمة'],
            ['home', 'awards', 'description', 'textarea', 'نكرّم المتميزين والمبدعين في مجال التزيين بجوائز ووسامات دولية معترف بها عالمياً.'],

            ['home', 'events', 'badge', 'text', 'فعالياتنا'],
            ['home', 'events', 'title', 'text', 'الفعاليات الدولية'],

            ['home', 'supporters', 'badge', 'text', 'شركاؤنا'],
            ['home', 'supporters', 'title', 'text', 'الداعمون والشركاء'],

            ['home', 'news', 'badge', 'text', 'آخر الأخبار'],
            ['home', 'news', 'title', 'text', 'الأخبار والمقالات'],

            ['home', 'why_us', 'title',       'text',     'لماذا تختار الاتحاد؟'],
            ['home', 'why_us', 'subtitle',    'text',     'حيث الاحتراف يلتقي بالاعتراف الدولي'],
            ['home', 'why_us', 'intro',       'textarea', 'نقدم بيئة تعليمية متميزة وشبكة علاقات دولية تفتح آفاقاً جديدة أمام المحترفين في مجال التزيين والتجميل.'],
            ['home', 'why_us', 'item1_title', 'text',     'اعتماد دولي معترف به'],
            ['home', 'why_us', 'item1_desc',  'textarea', 'شهادات معتمدة وفق أعلى المعايير الدولية في مجال التزيين والتجميل.'],
            ['home', 'why_us', 'item2_title', 'text',     'شبكة عالمية واسعة'],
            ['home', 'why_us', 'item2_desc',  'textarea', 'تواصل مع خبراء ومتخصصين من أكثر من 50 دولة حول العالم.'],
            ['home', 'why_us', 'item3_title', 'text',     'دعم متواصل'],
            ['home', 'why_us', 'item3_desc',  'textarea', 'فريق متخصص لدعمك في رحلتك نحو الاحتراف والتميز الدولي.'],
            ['home', 'why_us', 'side_image',  'image',    ''],

            ['home', 'testimonials', 'badge', 'text', 'آراء المتميزين'],
            ['home', 'testimonials', 'title', 'text', 'ماذا يقولون عنا'],

            ['home', 'cta', 'badge',       'text',     'انضم إلينا'],
            ['home', 'cta', 'title',       'text',     'كن جزءاً من الاتحاد العالمي للتزيين'],
            ['home', 'cta', 'description', 'textarea', 'انضم إلى مجتمع من المتخصصين في مجال التزيين والتجميل في أكثر من 50 دولة حول العالم واحصل على شهادات معتمدة دولياً.'],
            ['home', 'cta', 'button_text', 'text',     'انضم الآن'],
            ['home', 'cta', 'button_url',  'url',      '/join'],

            // ===================== ABOUT PAGE =====================
            ['about', 'hero', 'title',       'text',     'عن المنظمة'],
            ['about', 'hero', 'description', 'textarea', 'تعرف على الاتحاد العالمي الأكاديمي للتزيين ورؤيته ورسالته وقيمه.'],

            // ===================== EDUCATION PAGE =====================
            ['education', 'hero',  'title',       'text',     'المسارات التعليمية'],
            ['education', 'hero',  'description', 'textarea', 'برامج تدريبية معتمدة دولياً في مجال التزيين والتجميل.'],
            ['education', 'intro', 'badge',       'text',     'التعليم المهني'],
            ['education', 'intro', 'title',       'text',     'اختر مسارك التعليمي'],
            ['education', 'intro', 'description', 'textarea', 'نقدم برامج متكاملة مصممة لتلبية احتياجات المهنيين في مختلف مراحل مسيرتهم.'],

            // ===================== AWARDS PAGE =====================
            ['awards', 'hero',  'title',       'text',     'الجوائز والأوسمة'],
            ['awards', 'hero',  'description', 'textarea', 'نكرّم التميز والإبداع في مجال التزيين والتجميل بجوائز ووسامات دولية.'],
            ['awards', 'intro', 'badge',       'text',     'التميز والإنجاز'],
            ['awards', 'intro', 'title',       'text',     'جوائز ووسامات دولية'],
            ['awards', 'intro', 'description', 'textarea', 'يمنح الاتحاد العالمي الأكاديمي للتزيين جوائز ووسامات تقديراً للمتميزين في المجال.'],

            // ===================== PROFESSION DAY PAGE =====================
            ['profession_day', 'hero',  'title',       'text',     'يوم المهنة العالمي'],
            ['profession_day', 'hero',  'description', 'textarea', 'احتفال دولي سنوي يُعلي من قيمة مهنة التزيين والتجميل على مستوى العالم.'],
            ['profession_day', 'intro', 'badge',       'text',     'احتفال دولي'],
            ['profession_day', 'intro', 'title',       'text',     'يوم المهنة العالمي للتزيين'],
            ['profession_day', 'intro', 'description', 'textarea', 'مبادرة دولية أطلقها الاتحاد العالمي الأكاديمي للتزيين للاحتفاء بمهنة التزيين والتجميل.'],

            // ===================== EVENTS PAGE =====================
            ['events', 'hero',  'title',       'text',     'الفعاليات الدولية'],
            ['events', 'hero',  'description', 'textarea', 'ملتقيات ومؤتمرات دولية تجمع أبرز المتخصصين والخبراء في مجال التزيين.'],
            ['events', 'intro', 'badge',       'text',     'فعالياتنا'],
            ['events', 'intro', 'title',       'text',     'الفعاليات والملتقيات الدولية'],

            // ===================== SUPPORTER PAGE =====================
            ['supporter', 'hero',   'title',       'text',     'الداعمون والشركاء'],
            ['supporter', 'hero',   'description', 'textarea', 'شراكات استراتيجية فاعلة مع جهات ومؤسسات وشركات تسهم في دعم وتطوير المجتمع المهني.'],
            ['supporter', 'intro',  'badge',       'text',     'شراكة استراتيجية'],
            ['supporter', 'intro',  'title',       'text',     'داعمو الاتحاد العالمي الأكاديمي للتزيين'],
            ['supporter', 'intro',  'description', 'textarea', 'يحظى الاتحاد العالمي الأكاديمي للتزيين بشراكات استراتيجية فاعلة مع جهات ومؤسسات وشركات داعمة تسهم بدور محوري في دعم وتطوير المجتمع المهني، وتعزيز جودة المبادرات والبرامج على المستوى الدولي.'],
            ['supporter', 'vision', 'title',       'text',     'رؤيتنا في الشراكات'],
            ['supporter', 'vision', 'description', 'textarea', 'نؤمن بأن التكامل بين المؤسسات المهنية والجهات الداعمة يسهم في خلق بيئة متكاملة قائمة على التطوير، والابتكار، والاستدامة.'],
            ['supporter', 'proud',  'title',       'text',     'نفخر بشراكاتنا'],
            ['supporter', 'proud',  'description', 'textarea', 'نفخر بشراكاتنا مع جهات داعمة ومؤسسات رائدة تسهم في تطوير المجتمع المهني عالميًا، وتعزز من حضور الاتحاد ودوره في دعم الكوادر المهنية والارتقاء بالمهنة.'],
            ['supporter', 'cta',    'title',       'text',     'كن داعمًا… وشاركنا في تطوير المجتمع المهني'],
            ['supporter', 'cta',    'description', 'textarea', 'تتيح الشراكة مع الاتحاد العالمي الأكاديمي للتزيين فرصة الوصول إلى شبكة واسعة من المتخصصين في مجال التزيين والتجميل في أكثر من 50 دولة حول العالم.'],
            ['supporter', 'cta',    'button_text', 'text',     'تواصل معنا للشراكة'],

            // ===================== NEWS PAGE =====================
            ['news', 'hero',  'title',       'text',     'الأخبار والمقالات'],
            ['news', 'hero',  'description', 'textarea', 'آخر الأخبار والمستجدات من الاتحاد العالمي الأكاديمي للتزيين.'],

            // ===================== CONTACT PAGE =====================
            ['contact', 'hero',  'title',       'text',     'تواصل معنا'],
            ['contact', 'hero',  'description', 'textarea', 'نسعد بتواصلكم معنا لأي استفسار أو شراكة أو انضمام.'],
            ['contact', 'intro', 'title',       'text',     'نحن هنا لمساعدتك'],
            ['contact', 'intro', 'description', 'textarea', 'فريقنا جاهز للإجابة على جميع استفساراتكم وتقديم الدعم اللازم.'],

            // ===================== JOIN PAGE =====================
            ['join', 'hero',  'title',       'text',     'انضم إلى الاتحاد'],
            ['join', 'hero',  'description', 'textarea', 'كن جزءاً من مجتمع دولي من المتخصصين في التزيين والتجميل.'],
            ['join', 'intro', 'badge',       'text',     'عضوية الاتحاد'],
            ['join', 'intro', 'title',       'text',     'انضم إلى الاتحاد العالمي الأكاديمي للتزيين'],
            ['join', 'intro', 'description', 'textarea', 'احصل على عضوية الاتحاد وتمتع بجميع المزايا والامتيازات الدولية.'],
        ];

        foreach ($sections as [$page, $section, $key, $type, $value]) {
            PageSection::updateOrCreate(
                ['page' => $page, 'section' => $section, 'key' => $key],
                ['type' => $type, 'value' => $value]
            );
        }
    }
}
