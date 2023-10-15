<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealerEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dealers = \App\Models\Dealer::all();

        $dealers->each(function ($dealer) {
            \App\Models\DealerEmployee::class::factory(3)->create(['dealer_id' => $dealer->id]);
        });
    }
}
