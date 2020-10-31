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
            'tipo'=>'supervisor',
            'descripcion'=>'encargado del Area',
            'sueldo'=>'200000',
            'estado'=>1
        ]);
/*         RolTipo::create([
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
        ]); */
        RolTipo::create([
            'tipo'=>'tecnico',
            'descripcion'=>'Mantenimiento IT',
            'sueldo'=>'45000',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'administrativo',
            'descripcion'=>'',
            'sueldo'=>'40000',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'tester',
            'descripcion'=>'preubas',
            'sueldo'=>'50000',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'desarrollador web',
            'descripcion'=>'programador frontEnd, backEnd',
            'sueldo'=>'100000',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'desarrollador mobile',
            'descripcion'=>'programador frontEnd, backEnd(mobile)',
            'sueldo'=>'100000',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'relaciones publicas',
            'descripcion'=>'',
            'sueldo'=>'47000',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'diseñador',
            'descripcion'=>'Estilos de fronEnd',
            'sueldo'=>'52000',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'recruiter',
            'descripcion'=>'reclutador/a',
            'sueldo'=>'40000',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'tesorera',
            'descripcion'=>'computos',
            'sueldo'=>'35000',
            'estado'=>1
        ]);
        RolTipo::create([
            'tipo'=>'publicista',
            'descripcion'=>'en redes sociales y otros medios',
            'sueldo'=>'30000',
            'estado'=>1
        ]);
    }
}
