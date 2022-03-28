<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BarrierTypeSeeder::class,
            PenetrantSeeder::class,
            SystemTypeSeeder::class,
            FRatingSeeder::class,
            TRatingSeeder::class,
            SystemSeeder::class,
        ]);
    }
}
