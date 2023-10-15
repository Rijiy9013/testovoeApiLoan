<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ApplicationStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ApplicationStatusIdSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(DealerSeeder::class);
        $this->call(DealerEmployeeSeeder::class);
        $this->call(ApplicationSeeder::class);
    }
}
