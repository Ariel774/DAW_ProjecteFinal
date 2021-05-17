<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'imagen' => '/upload-objetivos/runnin.jpg',
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
            'imagen' => '/upload-objetivos/runnin.jpg',
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
            'imagen' => '/upload-objetivos/runnin.jpg',
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
            'nombre' => 'Correr cada mañana 6km',
            'descripcion' => 'Correr cada mañana en la playa de Blanes',
            'imagen' => '/upload-objetivos/runnin.jpg',
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
            'imagen' => '/upload-objetivos/runnin.jpg',
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
            'imagen' => '/upload-objetivos/runnin.jpg',
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
        DB::table('objetivos')->insert([
            'nombre' => 'Aprender CSS',
            'descripcion' => 'Alguna descripción de CSS',
            'imagen' => '/upload-objetivos/runnin.jpg',
            'unidades_fin' => 30,
            'unidad' => 'hores',
            'fecha_inicio' => '2021-07-01',
            'fecha_fin' => '2021-10-01',
            'porcentaje' => 10.75,
            'finalizado' => false,
            'ambito_id' => 1,
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('objetivos')->insert([
            'nombre' => 'Programar Java',
            'descripcion' => 'Alguna descripción xD',
            'imagen' => '/upload-objetivos/runnin.jpg',
            'unidades_fin' => 120,
            'unidad' => 'hores',
            'fecha_inicio' => '1995-11-13',
            'fecha_fin' => '2021-11-13',
            'porcentaje' => 13.05,
            'finalizado' => false,
            'ambito_id' => 1,
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('objetivos')->insert([
            'nombre' => 'Programar Java',
            'descripcion' => 'Alguna descripción xD',
            'imagen' => '/upload-objetivos/runnin.jpg',
            'unidades_fin' => 20,
            'unidad' => 'hores',
            'fecha_inicio' => '1995-11-13',
            'fecha_fin' => '2021-11-13',
            'porcentaje' => 13.05,
            'finalizado' => false,
            'ambito_id' => 1,
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('objetivos')->insert([
            'nombre' => 'Programar Java',
            'descripcion' => 'Alguna descripción xD',
            'imagen' => '/upload-objetivos/runnin.jpg',
            'unidades_fin' => 20,
            'unidad' => 'hores',
            'fecha_inicio' => '1995-11-13',
            'fecha_fin' => '2021-11-13',
            'porcentaje' => 13.05,
            'finalizado' => false,
            'ambito_id' => 1,
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('objetivos')->insert([
            'nombre' => 'Programar Java',
            'descripcion' => 'Alguna descripción xD',
            'imagen' => '/upload-objetivos/runnin.jpg',
            'unidades_fin' => 20,
            'unidad' => 'hores',
            'fecha_inicio' => '1995-11-13',
            'fecha_fin' => '2021-11-13',
            'porcentaje' => 13.05,
            'finalizado' => false,
            'ambito_id' => 1,
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
