<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjetivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objetivos')->insert([
            'nombre' => 'Programar Java',
            'descripcion' => 'Alguna descripción xD',
            'slug'=> Str::slug('Programar Java'),
            'imagen' => '/upload-objetivos/runnin.jpg',
            'unidades_actuales' => 10,
            'unidades_fin' => 400,
            'unidad' => 'km',
            'fecha_inicio' => '2021-06-13',
            'fecha_fin' => '2021-11-13',
            'porcentaje' => 13.05,
            'finalizado' => false,
            'ambito_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('objetivos')->insert([
            'nombre' => 'Programar Laravel',
            'descripcion' => 'Alguna descripción xD',
            'slug'=> Str::slug('Programar Laravel'),
            'imagen' => '/upload-objetivos/runnin.jpg',
            'unidades_actuales' => 10,
            'unidades_fin' => 20,
            'unidad' => 'hores',
            'fecha_inicio' => '2021-04-21',
            'fecha_fin' => '2021-10-01',
            'porcentaje' => 100.00,
            'finalizado' => true,
            'ambito_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('objetivos')->insert([
            'nombre' => 'Leer Quijote',
            'descripcion' => 'Alguna descripción xD',
            'slug'=> Str::slug('Leer Quijote'),
            'imagen' => '/upload-objetivos/runnin.jpg',
            'unidades_actuales' => 10,
            'unidades_fin' => 700,
            'unidad' => 'pàgines',
            'fecha_inicio' => '2021-02-11',
            'fecha_fin' => '2022-02-06',
            'porcentaje' => 40.55,
            'finalizado' => false,
            'ambito_id' => 2,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('objetivos')->insert([
            'nombre' => 'Correr cada mañana',
            'descripcion' => 'Correr cada mañana en la playa de Blanes 6km',
            'slug'=> Str::slug('Correr cada mañana'),
            'imagen' => '/upload-objetivos/runnin.jpg',
            'unidades_actuales' => 10,
            'unidades_fin' => 6,
            'unidad' => 'km',
            'fecha_inicio' => '2021-01-01',
            'fecha_fin' => '2022-12-30',
            'porcentaje' => 45.05,
            'finalizado' => false,
            'ambito_id' => 4,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('objetivos')->insert([
            'nombre' => 'Caminar',
            'descripcion' => 'Caminar cada dia 5km',
            'slug'=> Str::slug('Caminar'),
            'imagen' => '/upload-objetivos/runnin.jpg',
            'unidades_actuales' => 1,
            'unidades_fin' => 5,
            'unidad' => 'km',
            'fecha_inicio' => '2021-01-01',
            'fecha_fin' => '2022-12-30',
            'porcentaje' => 76.35,
            'finalizado' => false,
            'ambito_id' => 4,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('objetivos')->insert([
            'nombre' => 'Mirar Dark',
            'descripcion' => 'Mirar Dark por la noche',
            'slug'=> Str::slug('Mirar Dark'),
            'imagen' => '/upload-objetivos/runnin.jpg',
            'unidades_actuales' => 10,
            'unidades_fin' => 40,
            'unidad' => 'hores',
            'fecha_inicio' => '2021-09-01',
            'fecha_fin' => '2021-12-01',
            'porcentaje' => 34.05,
            'finalizado' => false,
            'ambito_id' => 5,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
