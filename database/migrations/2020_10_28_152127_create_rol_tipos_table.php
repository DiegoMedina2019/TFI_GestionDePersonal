<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_tipos', function (Blueprint $table) {
            $table->id('idRolTipo');
            $table->string('tipo');
            $table->string('descripcion');
            $table->decimal('sueldo',9,2)->nullable();
            $table->unsignedInteger('estado');
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
        Schema::dropIfExists('rol_tipos');
    }
}
