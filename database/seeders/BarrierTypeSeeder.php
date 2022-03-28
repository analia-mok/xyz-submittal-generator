<?php

namespace Database\Seeders;

use App\Models\BarrierType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarrierTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barrierTypes = [
            'Concrete Floors Flat Deck',
            'Concrete or Masonry Block Wall',
            'Gypsum Framed Walls',
            'Wood Floor Ceiling Assembly',
            'Corrugated Metal Form Deck',
            'Minimum 2-1/2 inch concrete floor',
            'Hambro Style Deck',
            'Minimum 6 inch Concrete Floors Flat Deck',
        ];

        foreach ($barrierTypes as $type) {
            BarrierType::create([
                'name' => $type,
            ]);
        }
    }
}
