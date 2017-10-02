<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuarios";
    protected $fillable = ['nombres', 'apellidos', 'cedula', 'cargo', 'telefono', 'celular', 'idArea', 'email'];
    protected $primaryKey = "idUsuario";

    public function area(){

    	return $this->belongsTo('App\Area', 'idArea');
    }

    public function computadores(){

    	return $this->hasMany('App\Computador');
    }
}
