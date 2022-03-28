<?php

namespace Database\Seeders;

use App\Models\Penetrant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenetrantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penetrants = [
            'Metallic',
            'Non-Metallic',
            'Insulated Pipes',
            'Misc Mechanical',
            'Cables',
            'Multiple Penetrations',
            'Blank Openings',
        ];

        foreach ($penetrants as $penetrant) {
            Penetrant::create([
                'name' => $penetrant,
            ]);
        }
    }
}
