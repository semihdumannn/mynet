<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::dropIfExists('cities');
        $path = 'database/sql/sehirler.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Cities table seeded!');

    }
}
