<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = "paises";
    protected $fillable = ['pais'];
    protected $primaryKey = "idPais";

    public function departamentos(){

    	return $this->hasMany('App\Departamento', 'idPais');
    }
}
