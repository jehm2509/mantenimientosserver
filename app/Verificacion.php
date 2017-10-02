<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verificacion extends Model
{
    protected $table = "verificaciones";
    protected $fillable = ['sistema', 'discos', 'dvdrom', 'monitor', 'mouse', 'teclado', 'tarjetaRed', 'temporales'];
    protected $primaryKey = "idVerificacion";

    public function mantenimientos(){

    	return $this->belongsToMany('App\Mantenimiento', 'mantenimiento_verificacion', 'idVerificacion', 'idMantenimiento');
    }
}
