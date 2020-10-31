<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'idempleado';

    protected $fillable = [
            'nombre',
            'apellido',
            'correo',
            'dni',
            'telefono',
            'direccion',
            'sector',
            'fk_idRolTipo'
    ];
    public function scopeBuscarEmpleado($query,$id){
        if (trim($id)!= "") {
            $query->where('apellido', 'LIKE', $id.'%')
            ->orWhere('nombre', 'LIKE', $id.'%');
        }
    }

    public function misEmpleados()
    {
    return $this->belongsToMany('App\Empleado', 'supervisa_empleado', 'fk_empleado_supervisor', 'fk_empleado_empleado');
    }

    public function miSupervisores()
    {
    return $this->belongsToMany('App\Empleado', 'supervisa_empleado', 'fk_empleado_empleado', 'fk_empleado_supervisor');
    }
}
