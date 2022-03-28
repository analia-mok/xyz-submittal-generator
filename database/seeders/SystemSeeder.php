<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class SystemSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->file = '/database/data/systems.csv';
        $this->foreignKeyCheck = true;
        $this->delimiter = ',';
        $this->mapping = [
            'name',
            'system_type_id',
            'testing_authority',
            'f_rating_id',
            'l_rating',
            't_rating_id',
            'w_rating',
            'barrier_type_id',
            'penetrant_id',
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
