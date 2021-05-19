<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubObjetivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_objetivos')->insert([
            'nombre' => 'Programar Java 3 horas diarias',
            'descripcion' => 'Se progamará esta tarea 3 horas dirias lunes - martes',
            'imagen' => '/upload-objetivos/runnin.jpg',
            'unidades_actuales' => 10,
            'unidades_fin' => 400,
            'objetivo_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);    
    }
}
