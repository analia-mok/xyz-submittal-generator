<?php

namespace Database\Seeders;

use App\Models\FRating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ratings = [
            '1 Hour',
            '2 Hour',
            '3 Hour',
        ];

        foreach ($ratings as $rating) {
            FRating::create([
                'rating' => $rating,
            ]);
        }
    }
}
