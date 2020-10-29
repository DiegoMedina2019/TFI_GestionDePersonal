<?php

use Illuminate\Database\Seeder;
use App\RolTipo;

class RolTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolTipo::create([
            'tipo'=>'supervisor RRHH',
            'descripcion'=>'encargado del Area RRHH',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'supervisor sistemas',
            'descripcion'=>'encargado del Area Sitemas',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'supervisor marketing',
            'descripcion'=>'encargado del Area Marketig',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'supervisor finanzas',
            'descripcion'=>'encargado del Area Finanzas',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'supervisor programacion',
            'descripcion'=>'encargado del dpto progamacion',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'supervisor diseño',
            'descripcion'=>'encargado del dpto diseño',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'supervisor testing',
            'descripcion'=>'encargado del dpto testing',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'tecnico',
            'descripcion'=>'',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'administrativo',
            'descripcion'=>'',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'tester',
            'descripcion'=>'',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'desarrollador web',
            'descripcion'=>'',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'desarrollador mobile',
            'descripcion'=>'',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'relaciones publicas',
            'descripcion'=>'',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'diseñador',
            'descripcion'=>'',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'recruiter',
            'descripcion'=>'',
            'estado'=>1
        ]);
    }
}
