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
            'legajo',
            'sector',
            'fk_idRolTipo'
    ];
    public function scopeBuscarEmpleado($query,$id){
        if (trim($id)!= "") {
            $query->where('apellido', 'LIKE', $id.'%')
            ->orWhere('nombre', 'LIKE', $id.'%');
        }
    }
}
