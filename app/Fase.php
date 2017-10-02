<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    protected $table = "fases";
    protected $fillable = ['fase'];
    protected $primaryKey = "idFase";
    
    public function mantemientos(){

    	return $this->hasMany('App\Mantenimiento');
    }
}
