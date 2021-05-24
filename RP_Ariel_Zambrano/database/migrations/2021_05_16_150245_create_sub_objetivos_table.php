<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubObjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_objetivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->comment("Nombre del sub objetivo");
            $table->text('descripcion')->comment("descripción del sub objetivo");
            $table->integer('unidades_realizar')->comment("unidades a realizar sub objetivo");; // Numero de unidades máximas
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->foreignId('dia_id')->constrained(); // Llave foranea
            $table->foreignId('objetivo_id')->constrained(); // Llave foranea
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_objetivos');
    }
}
