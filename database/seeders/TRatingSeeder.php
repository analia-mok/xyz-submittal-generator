<?php

namespace Database\Seeders;

use App\Models\TRating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ratings = [
            '0 Hour',
            '1 Hour',
            '2 Hour',
            '3 Hour',
            '4 Hour',
            'Equal F&T',
        ];

        foreach ($ratings as $rating) {
            TRating::create([
                'rating' => $rating,
            ]);
        }
    }
}
