<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetoxPlan;

class DetoxPlanSeeder extends Seeder
{
    public function run(): void
    {
        DetoxPlan::create([
            'user_id' => 1,
            'plan_name' => 'Detox Sosial Media',
            'start_date' => now()->subDays(10),
            'end_date' => now()->subDays(3),
            'notes' => 'Mengurangi penggunaan Instagram dan TikTok selama seminggu.',
        ]);

        DetoxPlan::create([
            'user_id' => 2,
            'plan_name' => 'Detox Gadget',
            'start_date' => now()->subDays(5),
            'end_date' => now()->addDays(2),
            'notes' => 'Tidak menggunakan smartphone setelah jam 8 malam.',
        ]);
    }
}
