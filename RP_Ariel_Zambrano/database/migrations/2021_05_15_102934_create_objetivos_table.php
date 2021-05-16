<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->comment("Nombre del objetivo");
            $table->text('descripcion')->comment("descripción del objetivo");
            $table->string('imagen')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->double('porcentaje', 5, 2);
            $table->boolean('finalizado');
            $table->foreignId('ambito_id')->constrained()->cascadeOnDelete(); // Llave foranea
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('objetivos');
    }
}
