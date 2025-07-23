<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OfflineActivity;

class OfflineActivitySeeder extends Seeder
{
    public function run(): void
    {
        OfflineActivity::create([
            'detox_plan_id' => 1,
            'activity_name' => 'Meditasi Pagi',
            'description' => 'Melakukan meditasi selama 15 menit setiap pagi.',
            'is_completed' => true,
        ]);

        OfflineActivity::create([
            'detox_plan_id' => 1,
            'activity_name' => 'Berjalan di taman',
            'description' => 'Berjalan kaki selama 30 menit di taman tanpa membawa gadget.',
            'is_completed' => false,
        ]);

        OfflineActivity::create([
            'detox_plan_id' => 2,
            'activity_name' => 'Membaca Buku',
            'description' => 'Membaca buku fisik selama 1 jam setiap malam.',
            'is_completed' => true,
        ]);
    }
}
