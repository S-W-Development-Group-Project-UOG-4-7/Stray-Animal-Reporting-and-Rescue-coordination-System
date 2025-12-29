<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportStatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('report_statuses')->insert([
            ['name' => 'Reported', 'color' => '#0ea5e9', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Under Review', 'color' => '#f59e0b', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rescue Dispatched', 'color' => '#8b5cf6', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Animal Rescued', 'color' => '#10b981', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Medical Care', 'color' => '#ef4444', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sheltered', 'color' => '#3b82f6', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Adopted', 'color' => '#8b5cf6', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Closed', 'color' => '#6b7280', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}