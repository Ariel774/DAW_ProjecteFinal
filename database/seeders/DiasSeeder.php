<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dias')->insert([
            'nombre' => 'Dilluns',
        ]);
        DB::table('dias')->insert([
            'nombre' => 'Dimarts',
        ]);
        DB::table('dias')->insert([
            'nombre' => 'Dimecres',
        ]);
        DB::table('dias')->insert([
            'nombre' => 'Dijous',
        ]);
        DB::table('dias')->insert([
            'nombre' => 'Divendres',
        ]);
        DB::table('dias')->insert([
            'nombre' => 'Dissapte',
        ]);
        DB::table('dias')->insert([
            'nombre' => 'Diumenge',
        ]);
    }
}
