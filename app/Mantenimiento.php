<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $table = "mantenimientos";
    protected $fillable = ['fecha', 'estado', 'observacion', 'idFase'];
    protected $primaryKey = "idMantenimiento";

    public function fase(){

    	return $this->belongsTo('App\Fase', 'idFase');
    }

    public function computador(){

    	return $this->belongsTo('App\Computador');
    }

    public function verificaciones(){

    	return $this->belongsToMany('App\Verificacion', 'mantenimiento_verificacion', 'idMantenimiento', 'idVerificacion');
    }

    public function limpiezas(){

    	return $this->belongsToMany('App\Limpieza', 'mantenimiento_verificacion', 'idMantenimiento', 'idLimpieza');
    }
}
