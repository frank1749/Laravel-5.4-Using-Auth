<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    //
    protected $table = 'empresas';
    
    protected $fillable = [
        'nombre', 'nit', 'created_at'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
