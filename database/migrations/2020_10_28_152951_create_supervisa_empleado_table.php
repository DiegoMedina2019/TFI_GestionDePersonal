<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisaEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisa_empleado', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_empleado_supervisor')->unsigned();
            $table->bigInteger('fk_empleado_empleado')->unsigned();
            $table->timestamps();

            $table->foreign('fk_empleado_supervisor')
                  ->references('idempleado')
                  ->on('empleados')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('fk_empleado_empleado')
                  ->references('idempleado')
                  ->on('empleados')
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
        Schema::table('supervisa_empleado', function (Blueprint $table) {
            //
        });
    }
}
