<?php

namespace Database\Seeders;

use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;
use Illuminate\Database\Seeder;

class CustomSpreadsheetSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = "/database/seeders/*.xlsx";
        parent::run();
    }
}
