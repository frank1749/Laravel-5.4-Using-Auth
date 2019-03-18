<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    //
    protected $table = 'empleados';
    
    protected $fillable = [
        'fullname', 'id_cargo', 'id_empresa', 'created_at'
    ];

}
