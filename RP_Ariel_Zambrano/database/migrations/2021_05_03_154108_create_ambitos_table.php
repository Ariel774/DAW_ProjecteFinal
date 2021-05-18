<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambitos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->comment("Nombre del objetivo");
            $table->text('descripcion')->comment("descripción del objetivo");
            $table->string('slug')->comment("URL del ambito");
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate(); // Llave foranea
            $table->timestamps();
            $table->unique('slug', 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ambitos');
    }
}
