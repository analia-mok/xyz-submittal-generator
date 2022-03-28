<?php

namespace Database\Seeders;

use App\Models\SystemType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Joint',
            'Penetrant',
        ];

        foreach ($types as $type) {
            SystemType::create([
                'name' => $type,
            ]);
        }
    }
}
