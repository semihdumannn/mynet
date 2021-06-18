<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::dropIfExists('countries');
        $path = 'database/sql/ulkeler.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Countries table seeded!');
    }
}
