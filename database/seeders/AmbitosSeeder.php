<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmbitosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ambitos')->insert([
            'nombre' => 'Programar',
            'descripcion' => 'Alguna descripción',
            'slug'=> Str::slug('Programar'),
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ambitos')->insert([
            'nombre' => 'leer',
            'descripcion' => 'Alguna descripción',
            'slug'=> Str::slug('leer'),
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ambitos')->insert([
            'nombre' => 'Salud',
            'descripcion' => 'Alguna descripción',
            'slug'=> Str::slug('Salud'),
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ambitos')->insert([
            'nombre' => 'Correr',
            'descripcion' => 'Alguna descripción',
            'slug'=> Str::slug('Correr'),
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ambitos')->insert([
            'nombre' => 'Series',
            'descripcion' => 'Alguna descripción',
            'slug'=> Str::slug('Series'),
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
