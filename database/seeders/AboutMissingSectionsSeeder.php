<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

/**
 * يضيف أقسام «عن المنظمة» المرتبطة بروابط القائمة (objectives, role, …)
 * إن لم تكن موجودة — يُشغَّل مرة بعد التحديث: php artisan db:seed --class=AboutMissingSectionsSeeder
 */
class AboutMissingSectionsSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'section_key' => 'objectives',
                'title_ar' => 'الأهداف الاستراتيجية',
                'title_en' => 'Strategic Objectives',
                'content_ar' => "ترسيخ مكانة مهنة التزيين والتجميل عالمياً.\nتطوير برامج تعليمية ومعايير مهنية موحدة.\nتعزيز الشراكات والتعاون بين الدول الأعضاء.\nدعم البحث والابتكار في مجالات التزيين والتجميل.",
                'icon' => 'bi-list-check',
                'order' => 7,
            ],
            [
                'section_key' => 'role',
                'title_ar' => 'دور المنظمة',
                'title_en' => 'Organization Role',
                'content_ar' => 'يلعب الاتحاد العالمي الأكاديمي للتزيين دوراً محورياً في تمثيل المحترفين دولياً، ووضع المعايير المهنية، وتقديم الاعتمادات والشهادات، وتنظيم الفعاليات التي ترفع من شأن المهنة.',
                'icon' => 'bi-person-badge',
                'order' => 8,
            ],
            [
                'section_key' => 'social_responsibility',
                'title_ar' => 'المسؤولية المجتمعية',
                'title_en' => 'Social Responsibility',
                'content_ar' => 'يلتزم الاتحاد بمسؤولياته تجاه المجتمع من خلال دعم مبادرات التوعية المهنية، والمساهمة في تطوير الكوادر المحلية، والالتزام بأعلى معايير الأخلاقيات المهنية.',
                'icon' => 'bi-heart',
                'order' => 9,
            ],
            [
                'section_key' => 'quality',
                'title_ar' => 'سياسة الجودة',
                'title_en' => 'Quality Policy',
                'content_ar' => 'تستند سياسة الجودة في الاتحاد إلى التحسين المستمر للبرامج التعليمية، ومراجعة المعايير بشكل دوري، وضمان الشفافية والعدالة في جميع الإجراءات المعتمدة.',
                'icon' => 'bi-patch-check',
                'order' => 10,
            ],
            [
                'section_key' => 'work_system',
                'title_ar' => 'منظومة العمل',
                'title_en' => 'Work System',
                'content_ar' => 'تتكامل منظومة عمل الاتحاد بين الأمانة العامة، المجالس واللجان المتخصصة، والمكاتب الإقليمية، لضمان سلاسة الإجراءات وخدمة الأعضاء والمهنيين بكفاءة.',
                'icon' => 'bi-gear-wide-connected',
                'order' => 11,
            ],
            [
                'section_key' => 'president_message',
                'title_ar' => 'كلمة رئيس المنظمة',
                'title_en' => 'President Message',
                'content_ar' => "نرحب بكم في موقع الاتحاد العالمي الأكاديمي للتزيين.\nنسعى معاً لرفعة هذه المهنة العريقة وبناء جيل من المحترفين يحملون شعار الجودة والاعتراف الدولي.\nنتطلع إلى مشاركتكم في رحلتنا نحو التميز.",
                'icon' => 'bi-chat-quote',
                'order' => 12,
            ],
        ];

        foreach ($rows as $s) {
            AboutSection::firstOrCreate(
                ['section_key' => $s['section_key']],
                array_merge($s, ['is_active' => true])
            );
        }
    }
}
