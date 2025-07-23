<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificationGuide;

class NotificationGuideSeeder extends Seeder
{
    public function run(): void
    {
        NotificationGuide::create([
            'title' => 'Pengingat Aktivitas Offline',
            'content' => 'Aktifkan pengingat harian untuk melakukan aktivitas offline seperti membaca atau berjalan kaki.',
        ]);

        NotificationGuide::create([
            'title' => 'Tips Mengurangi Notifikasi',
            'content' => 'Nonaktifkan notifikasi dari aplikasi yang tidak penting selama masa detox.',
        ]);

        NotificationGuide::create([
            'title' => 'Panduan Fokus Digital',
            'content' => 'Gunakan mode fokus di perangkat untuk menghindari gangguan selama bekerja.',
        ]);
    }
}
