<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolTipo extends Model
{
    protected $table = 'rol_tipos';
    protected $primaryKey = 'idRolTipo';

    protected $fillable = [
        'tipo','descripcion','estado'
    ];
}
