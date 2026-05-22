<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportData extends Command
{
    protected $signature   = 'cmac:import';
    protected $description = 'Import exported JSON data into the production database';

    private array $tables = [
        'settings', 'sliders', 'about_sections', 'educational_paths',
        'awards', 'profession_day_sections', 'events', 'supporters',
        'statistics', 'news', 'media_items', 'admin_users', 'testimonials',
        'appointment_requests', 'page_sections', 'membership_requests',
    ];

    public function handle(): int
    {
        $path = database_path('export.json');

        if (! file_exists($path)) {
            $this->error('export.json not found in database/ folder');
            return 1;
        }

        $data = json_decode(file_get_contents($path), true);

        foreach ($this->tables as $table) {
            $rows = $data[$table] ?? [];

            if (empty($rows)) {
                $this->line("  skip  $table (empty)");
                continue;
            }

            DB::table($table)->truncate();
            $rows = array_map(fn($r) => (array) $r, $rows);

            foreach (array_chunk($rows, 50) as $chunk) {
                DB::table($table)->insert($chunk);
            }

            $this->info("  ✓  $table — " . count($rows) . ' rows');
        }

        $this->info('Import complete!');
        return 0;
    }
}
