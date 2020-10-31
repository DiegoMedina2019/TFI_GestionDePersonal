<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('idempleado');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo');
            $table->unsignedBigInteger('dni');
            $table->unsignedBigInteger('telefono')->nullable();
            $table->string('direccion');
            $table->string('sector')->nullable();
            $table->unsignedBigInteger('productividad')->nullable();
            $table->decimal('insentivo',3,1)->nullable();
            $table->unsignedBigInteger('antiguedad')->nullable();
            $table->unsignedBigInteger('fk_idRolTipo');
            $table->timestamps();

            $table->foreign('fk_idRolTipo')
                        ->references('idRolTipo')
                        ->on('rol_tipos')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            //
        });
    }
}
