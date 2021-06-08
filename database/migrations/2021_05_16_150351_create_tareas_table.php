<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->comment("Nombre del objetivo");
            $table->text('subtitulo')->comment("Nombre del sub objetivo");
            $table->integer('unidades_hechas')->comment("unidades a realizar sub objetivo");; // Numero de unidades máximas
            $table->integer('unidades_realizar')->comment("unidades máximas a realizar sub objetivo");; // Numero de unidades máximas
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->date('fecha_tarea');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->foreignId('sub_objetivo_id')->constrained()->cascadeOnDelete(); // Llave foranea
            $table->foreignId('objetivo_id')->constrained()->cascadeOnDelete(); // Llave foranea
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Llave foranea
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
        Schema::dropIfExists('tareas');
    }
}
