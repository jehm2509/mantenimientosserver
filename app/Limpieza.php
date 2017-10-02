<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Limpieza extends Model
{
    protected $table = "limpiezas";
    protected $fillable = ['removerPolvo', 'conexiones', 'limpiarCarcaza', 'limpiarTeclado', 'limpiarMonitor', 'limpiarMouse', 'conectarCables'];
    protected $primaryKey = "idLimpieza";

    public function mantenimientos(){

    	return $this->belongsToMany('App\Mantenimiento', 'mantenimiento_limpieza', 'idLimpieza', 'idMantenimiento');
    }
}
