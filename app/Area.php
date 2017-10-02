<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "areas";
    protected $fillable = ['area', 'piso', 'idLocalidad'];
    protected $primaryKey = "idArea";

    public function localidad(){

    	return $this->belongsTo('App\Localidad', 'idLocalidad');
    }

    public function usuarios(){

    	return $this->hasMany('App\Usuario');
    }

    public static function areas($id){

    	return Area::where('idLocalidad', '=', $id)
    		->orderBy('area', 'asc')
    		->get();
    }
}
