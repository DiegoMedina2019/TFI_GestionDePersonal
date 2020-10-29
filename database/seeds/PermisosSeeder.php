<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos_admin = [];
        $permisos_supervisor= [];

        $mod_empleados =  Permission::create(['name' => 'mod-empleados']);
        $mod_usuarios =  Permission::create(['name' => 'mod-usuarios']);

        $permisoEmpleado1 =  Permission::create(['name' => 'listado-empleados']);
        $permisoEmpleado2 =  Permission::create(['name' => 'ver-empleado']);
        $permisoEmpleado3 =  Permission::create(['name' => 'modificar-empleado']);
        $permisoEmpleado4 =  Permission::create(['name' => 'generar-reporte-empleado']);

        array_push($permisos_admin, $mod_empleados);
        array_push($permisos_admin, $mod_usuarios);

        array_push($permisos_admin, $permisoEmpleado1);
        array_push($permisos_admin, $permisoEmpleado2);
        array_push($permisos_admin, Permission::create(['name' => 'alta-empleado']));
        array_push($permisos_admin, $permisoEmpleado3);
        array_push($permisos_admin, Permission::create(['name' => 'eliminar-empleado']));
        array_push($permisos_admin, Permission::create(['name' => 'asignar-supervisor-a-empleado']));
        array_push($permisos_admin, $permisoEmpleado4);
        array_push($permisos_admin, Permission::create(['name' => 'mod-roles-permisos']));
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleAdmin->syncPermissions($permisos_admin);


        array_push($permisos_supervisor, $mod_empleados);
        array_push($permisos_supervisor, $permisoEmpleado1);
        array_push($permisos_supervisor, $permisoEmpleado2);
        array_push($permisos_supervisor, $permisoEmpleado3);
        array_push($permisos_supervisor, $permisoEmpleado4);
        $roleSupervisor = Role::create(['name' => 'Supervisor']);
        $roleSupervisor->syncPermissions($permisos_supervisor);
    }
}
