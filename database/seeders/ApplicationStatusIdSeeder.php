<?php

namespace Database\Seeders;

use App\Models\ApplicationStatus;
use Illuminate\Database\Seeder;

class ApplicationStatusIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApplicationStatus::create(['name' => 'in_progress']);
        ApplicationStatus::create(['name' => 'new']);
        ApplicationStatus::create(['name' => 'approved']);
        ApplicationStatus::create(['name' => 'declined']);
    }
}
