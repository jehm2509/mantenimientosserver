<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table = "localidades";
    protected $fillable = ['nombre', 'direccion', 'idMunicipio'];
    protected $primaryKey = "idLocalidad";

    public function municipio(){

    	return $this->belongsTo('App\Municipio', 'idMunicipio');
    }

    public function areas(){

    	return $this->hasMany('App\Area', 'idLocalidad');
    }

    public static function localidades($id){

    	return Localidad::where('idMunicipio', '=', $id)
    		->orderBy('nombre', 'asc')
    		->get();
    }
}
