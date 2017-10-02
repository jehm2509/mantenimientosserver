<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Pais;
use App\Departamento;
use App\Municipio;
use App\Localidad;
use App\Area;
use Illuminate\Support\Facades\DB;
use Lacarasts\Flash\Flash;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UsuarioUpdateRequest;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = DB::table('usuarios')->paginate(5);
        return view('tecnico.usuarios.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        $pais = Pais::orderBy('pais','ASC')->pluck('pais','idPais');
        return view('tecnico.usuarios.create', ['pais' => $pais]);
    }

    public function retornarDepartamentos(Request $request, $id){
            if($request->ajax()){

                    $departamentos = Departamento::departamentos($id);
                    return response()->json($departamentos);
            }

    }

    public function retornarMunicipios(Request $request, $id){

        if($request->ajax()){   

            $municipios = Municipio::municipios($id);
            return response()->json($municipios);
        }
    }

    public function retornarLocalidades(Request $request, $id){

        if($request->ajax()){

            $localidades = Localidad::localidades($id);
            return response()->json($localidades);
        }
    }

    public function retornarAreas(Request $request, $id){

        if($request->ajax()){

            $areas = Area::areas($id);
            return response()->json($areas);
        }
    }

    public function store(UsuarioRequest $request)
    {
        $usuario = new Usuario($request->all());
        $usuario->save();
        flash('Se ha registrado a ' . $usuario->nombres . ' correctamente')->success()->important();
        return redirect()->route('usuarios.index');

        
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);
        return view('tecnico.usuarios.show', ['usuario' => $usuario]);
    }

  
    public function edit($id)
    {  
        $usuario = Usuario::find($id);
        $area = Area::find($usuario->idArea);
        $listaArea = Localidad::find($area->idLocalidad)->areas()->orderBy('area', 'ASC')->pluck('area', 'idArea');  
        $localidad = Localidad::find($area->idLocalidad);
        $listaLocal = Municipio::find($localidad->idMunicipio)->localidades()->orderBy('nombre', 'ASC')->pluck('nombre', 'idLocalidad');
        $municipio = Municipio::find($localidad->idMunicipio);
        $listaMun = Departamento::find($municipio->idDepartamento)->municipios()->orderBy('municipio', 'ASC')->pluck('municipio', 'idMunicipio');
        $departamento = Departamento::find($municipio->idDepartamento);
        $listaDep = Pais::find($departamento->idPais)->departamentos()->orderBy('departamento', 'ASC')->pluck('departamento', 'idDepartamento');
        $pais = Pais::find($departamento->idPais); 
        $listaPais = Pais::orderBy('pais','ASC')->pluck('pais','idPais');
 
        return view('tecnico.usuarios.edit', ['listaPais'=> $listaPais,
                                              'pais' => $pais,
                                              'usuario' => $usuario, 
                                              'area' => $area, 
                                              'listaArea' => $listaArea,
                                              'localidad' => $localidad,
                                              'listaLocal' => $listaLocal,
                                              'municipio' => $municipio,
                                              'listaMun' => $listaMun,
                                              'departamento' => $departamento,
                                              'listaDep' => $listaDep]);

    }


    public function update(UsuarioUpdateRequest $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->cedula = $request->cedula;
        $usuario->idArea = $request->idArea;
        $usuario->cargo = $request->cargo;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->celular = $request->celular;
        $usuario->save();
        flash('Se ha editado el usuario ' . $usuario->nombres . ' sin problemas.')->important();
        return redirect()->route('usuarios.index');
 
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        flash('El usuario ' . $usuario->nombres . ' ha sido eliminado')->error()->important();
        return redirect()->route('usuarios.index');
    }
}
