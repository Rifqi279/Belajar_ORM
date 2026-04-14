<?php

namespace Database\Seeders;

use App\Models\Proyek;
use Illuminate\Database\Seeder;

class ProyekSeeder extends Seeder
{
    public function run(): void
    {
        $proyeks = [
            ['nama_proyek' => 'Pengembangan Website',   'deadline' => '2026-06-30', 'status' => 'Belum'],
            ['nama_proyek' => 'Aplikasi Mobile',        'deadline' => '2026-05-15', 'status' => 'Belum'],
            ['nama_proyek' => 'Sistem Inventaris',      'deadline' => '2026-04-14', 'status' => 'Selesai'],
            ['nama_proyek' => 'Migrasi Database',       'deadline' => '2026-07-01', 'status' => 'Belum'],
        ];

        foreach ($proyeks as $data) {
            Proyek::create($data);
        }
    }
}