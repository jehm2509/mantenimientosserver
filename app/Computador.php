<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computador extends Model
{
    protected $table = "computadores";
    protected $fillable = ['tipoequipo', 'marca', 'modelo', 'serial', 'placa', 'idUsuario', 'idMantenimiento'];
    protected $primaryKey = "idComputador";

    public function usuario(){

    	return $this->belongsTo('App\Usuario', 'idUsuario');
    }

    public function mantenimientos(){

    	return $this->hasMany('App\Mantenimiento', 'idMantenimiento');
    }
}
