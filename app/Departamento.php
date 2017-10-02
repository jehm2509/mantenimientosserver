<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = "departamentos";
    protected $fillable = ['departamento'];
    protected $primaryKey = "idDepartamento";

    public function pais(){

    	return $this->belongsTo('App\Pais', 'idPais');
    }

    public function municipios(){

    	return $this->hasMany('App\Municipio', 'idDepartamento');
    }

    public static function departamentos($id){

    	return Departamento::where('idPais', '=', $id)
    		->orderBy('departamento', 'ASC')
    		->get();
    }
}
