<?php

namespace App\Http\Controllers;

use App\Aplicacion;
use App\Proyectos;
use Illuminate\Http\Request;

class AplicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $apps = Aplicacion::all();
        if ($apps){
            $proyectos =  Proyectos::
            join('aplicacion', 'aplicacion.id', '=', 'proyectos.aplicacion_id')
           // ->select('proyectos.id as id_pro, proyectos.nombre as nombre_proyecto, proyectos.version as version_proyecto, proyectos.estado as estado_proyecto, proyectos.aplicacion_id as aplicacion_id_proyecto, proyectos.created_at as fecha_proyecto')
           ->select('proyectos.id as id_pro','proyectos.nombre as nombre_pro','proyectos.version as version_pro', 'proyectos.estado as estado_pro','proyectos.aplicacion_id as aplicacion_id_pro','proyectos.created_at as fecha_pro')
            ->orderBy('proyectos.version')
            ->get();
            return view('version.index-version')->with('apps',$apps)->with('proyectos',$proyectos);
           // return $proyectos;
        }
        return view('version.index-version');
       //return $proyectos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('version.form-version');
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['nombre'=>'required']);
        $nombre = $request['nombre'];
        $descripcion = $request['descripcion'];
        $lenguaje = $request['lenguaje'];
        if(isset($nombre) && isset($descripcion) && isset($lenguaje)){
            $objApps = new Aplicacion();
            $objApps->nombre_app = $nombre;
            $objApps->descripcion_app = $descripcion;
            $objApps->lenguaje_app = $lenguaje;
            $objApps->save();
            return redirect()->route('indexApps');
        }else{
           // print "no se guardo";
            return view('version.index-version');
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Aplicacion $aplicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aplicacion $aplicacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aplicacion  $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $app = Aplicacion::find($id);
       // print $app->nombre;
        Aplicacion::find($id)->delete();
    }
}
