<?php

namespace App\Http\Controllers;

use App\Proyectos;
use App\Indice;
use App\Aplicacion;
use App\Mantenibilidad;
    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator, File,DB;
class ProyectoController extends Controller
{
    public $archivo;
    public $url;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos =  Proyectos::
        join('aplicacion', 'aplicacion.id', '=', 'proyectos.aplicacion_id')
        ->select('*')
        ->orderBy('nombre_app')
        ->orderBy('version')
        ->get();
        return view('proyectos.index',compact('proyectos'));
    }


    public function verAplicaciones($id){
        if($id){
            $aplicacion = DB::table('aplicacion')->where('id', '=', $id)->first();
            $proyectos =   DB::table('proyectos')->where('aplicacion_id', '=', $id)->get();
            return view('version.proyectos')->with('proyectos',$proyectos)->with('id',$id)->with('aplicacion',$aplicacion);
        }
        else{
           return view('version.form-version');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $aplicacion = DB::table('aplicacion')->find($id);
        $version =  Proyectos::
        join('aplicacion', 'aplicacion.id', '=', 'proyectos.aplicacion_id')
        ->select('proyectos.version')
        ->orderBy('version')
        ->where('aplicacion.id', '=', $id)
        ->get();
        if($aplicacion){
            return view('proyectos.formProyectos')->with('aplicacion',$aplicacion)->with('version',$version);
        }else{
            return view('version.index-version');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['nombre'=>'required','archivo'=>'required','version'=>'required']);
        
        $rules = array(
            'archivo'=>'max:99999999999999',
            'archivo'=>'mimes:zip',
        );
        $validator = Validator::make(Input::all(),$rules);
        if($validator->fails()){
            $request->session()->flash('alert-danger', 'Proyecto ('.$request['nombre'].')  no está en formato ZIP ');
            return redirect()->route('version.index-version');
        }else {
            $file = $request->file('archivo');
            $this->archivo = $file;
            $request->validate([
                'archivo' => 'required|file|max:50000000000',
            ]);
            $name=$request['nombre'];
            $version =intval($request['version']);
            $apli_id = intval($request['app_id']);
            if(isset($file) && isset($name) && isset($version)){  
                $nombre= $name.'_'.$file->getClientOriginalName();
                $destinationPath = 'uploads';
                $file->move($destinationPath,$nombre);
                $public_path = public_path();
                $url = $public_path.'\uploads\\'.$nombre;
               // $url =str_replace('/', '\\', $url);
                $proyecto = new Proyectos();
                $proyecto->nombre = $nombre;
                $proyecto->version = $version;
                $proyecto->aplicacion_id =$apli_id;
                $proyecto->path = $url;
                $proyecto->extension = $file->getClientOriginalExtension();
                $analisis=$this->extract($url,$name);
                $proyecto->analisis = $analisis;
                $proyecto->folder = $public_path.'\analizados\\'.$name;
                $proyecto->estado =0;
                $proyecto->save();
                $request->session()->flash('alert-success', 'Proyecto ('.$proyecto->nombre.') se agregó correctamente');
                return redirect()->route('indexApps');
            }else{
                return view('version.index-version');
            }
        }
       
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $app =  DB::table('aplicacion')->where('id', '=', $id)->get();
        $grafica =  Indice::
        join('proyectos', 'proyectos.id', '=', 'indice.proyectos_id')
        ->join('mantenibilidad', 'mantenibilidad.id', '=', 'proyectos.id')
        ->select('*')
        ->where('proyectos.aplicacion_id', '=', $id)
        ->get();
        return view('version.grafica')->with('grafica',$grafica)->with('app',$app);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $proyecto = Proyectos::find($id);
        unlink($proyecto->path);
        Proyectos::find($id)->delete();
        $request->session()->flash('alert-danger', 'Proyecto ('.$proyecto->nombre.') se eliminó correctamente  ');
        return redirect()->route('archivos.index');
    }
    public function extract($url,$name){
        $zip = new \ZipArchive();
        if ($zip->open($url) === TRUE) {
            $path = public_path().'\extraer\\'.$name;
            $zip->extractTo($path);
            $zip->close();
            $key='phpmetrics --report-html='.public_path().'/analizados/'.$name.' '.$path;
            //set_time_limit(7500);
            $salida = shell_exec($key);
            $regresar = public_path().'\analizados\\'.$name.'\index.html';
           // $regresar =str_replace('/', '\\', $regresar);

            return $regresar;
        }
    }
    public function detalle($id){
        //obtener datos cuantitativos de para calcular im
        $mi = array();
        $varIndice[] = array();
        $varEsfuerzo[] = array();
        $varChart[] = array();
        $id = intval($id);
        $datos = Proyectos::find($id);
        $datos->folder = $datos->folder.'\js\latest.json';
        $datos->foler = str_replace('/', '\\', $datos->foler);
        //obtener el json
       $json = File::get($datos->folder);
       $obj = json_decode($json,true);
       unset($obj[29]);
       //$indice = new Indice();
        foreach($obj as $object=>$detalles){
            foreach($detalles as $indice=>$valor){
                $arrIndice[]=array($indice=>$valor);
                $mi[] = $valor;
            }
        }   

        unset($mi[29]);
        unset($arrIndice[29]);
        $dataIndice = DB::table('indice')->where('proyectos_id', $id);
        if($dataIndice->count()){
            $im = Indice::find($id);
            $tablaMantenibilidad = new Mantenibilidad();
            $indiceOriginal = $this->calcularIndiceOriginal($id);
            $indiceSei = $this->calcularIndiceSei($id);
            $indiceMicrosoft = $this->calcularIndiceMicrosoft($id);
            $tablaMantenibilidad->imOriginal = $indiceOriginal;
            $tablaMantenibilidad->imSei = $indiceSei;
            $tablaMantenibilidad->imMicrosoft = $indiceMicrosoft;
            $tablaMantenibilidad->proyectos_id = $id;
            $tablaMantenibilidad->save();
           
            $varIndice[0] = $indiceOriginal;
            $varIndice[1] = $indiceSei;
            $varIndice[2] = $indiceMicrosoft;
            $varEsfuerzo[0] = $im->volume * $im->difficulty;
            $varEsfuerzo[0]= number_format( $varEsfuerzo[0], 2, '.', '');
            $varEsfuerzo[1] = $varEsfuerzo[0]/18;
            $varEsfuerzo[1]= number_format( $varEsfuerzo[1], 2, '.', '');
            $varChart[0] = $im->lcom / $im->nbClasses;
            $varChart[0] = number_format(   $varChart[0], 2, '.', '');
            $varChart[1] = $im->instability;
            $estadoProyecto = Proyectos::find($id);
            if($estadoProyecto->estado ==0){
               $estadoProyecto->where("id",$id)
               ->update(["estado" => 1]);
            }
           
            //return view('proyectos.infor')->with('datos',$datos)->with('valor',$valor);
           
            return view('proyectos.infor')->with('mi',$mi)->with('datos',$datos)->with('varIndice',$varIndice)->with('varEsfuerzo',$varEsfuerzo)->with('varChart',$varChart);
            //return $estadoProyecto->estado;
        }else{
            $indiceM = new Indice();
            $indiceM->wmc = $mi[0];
            $indiceM->ccn = $mi[1];
            $indiceM->bugs = $mi[2];
            $indiceM->volume = $mi[7];
            $indiceM->commentWeight = $mi[8];
            $indiceM->lcom = $mi[10];
            $indiceM->instability = $mi[11];
            $indiceM->afferentCoupling = $mi[12];
            $indiceM->efferentCoupling = $mi[13];
            $indiceM->difficulty = $mi[14];
            $indiceM->mi = $mi[15];
            $indiceM->classesPerPackage = $mi[21];
            $indiceM->loc = $mi[22];
            $indiceM->cloc = $mi[23];
            $indiceM->lloc = $mi[24];
            $indiceM->nbMethods = $mi[25];
            $indiceM->nbClasses = $mi[26];
            $indiceM->nbPackages = $mi[28];
            $indiceM->proyectos_id = $id;
            $indiceM->save();
            $im = Indice::find($id);
            $tablaMantenibilidad = new Mantenibilidad();
            $indiceOriginal = $this->calcularIndiceOriginal($id);
            $indiceSei = $this->calcularIndiceSei($id);
            $indiceMicrosoft = $this->calcularIndiceMicrosoft($id);
            $tablaMantenibilidad->imOriginal = $indiceOriginal;
            $tablaMantenibilidad->imSei = $indiceSei;
            $tablaMantenibilidad->imMicrosoft = $indiceMicrosoft;
            $tablaMantenibilidad->proyectos_id = $id;
            $tablaMantenibilidad->save();
            //
           
            //

            $varIndice[0] = $indiceOriginal;
            $varIndice[1] = $indiceSei;
            $varIndice[2] = $indiceMicrosoft;
            $varEsfuerzo[0] = $im->volume * $im->difficulty;
            $varEsfuerzo[0]= number_format( $varEsfuerzo[0], 2, '.', '');
            $varEsfuerzo[1] = $varEsfuerzo[0]/18;
            $varEsfuerzo[1]= number_format( $varEsfuerzo[1], 2, '.', '');
            $varChart[0] = $im->lcom / $im->nbClasses;
            $varChart[0] = number_format(   $varChart[0], 2, '.', '');
            $varChart[1] = $im->instability;
            $estadoProyecto = Proyectos::find($id);
            if($estadoProyecto->estado ==0){
               $estadoProyecto->where("id",$id)
               ->update(["estado" => 1]);
            }
           
           
            return view('proyectos.infor')->with('mi',$mi)->with('datos',$datos)->with('varIndice',$varIndice)->with('varEsfuerzo',$varEsfuerzo)->with('varChart',$varChart);
           // return $estadoProyecto;
        }
    }
    public function calcularIndiceOriginal($id){
        $resultado =0;
       $im = Indice::find($id);
        $resultado = 171-(5.2*log($im->volume/$im->nbClasses))-(0.23*$im->ccn)-(16.2*log($im->loc/$im->nbClasses));
        $resultado = number_format($resultado, 2, '.', '');
        return $resultado;
    }
    public function calcularIndiceSei($id){
        $resultado =0;
       // $im = Indice::find($id);
       
       $im = Indice::find($id);
       $clocPor = ($im->cloc*100)/$im->loc;
       $clocPor = number_format($clocPor, 2, '.', '');
        $resultado = 171-(5.2*log($im->volume/$im->nbClasses))-(0.23*$im->ccn)-(16.2*log($im->loc/$im->nbClasses))+(50*(sin(sqrt(2.46*$clocPor))));
        $resultado = number_format($resultado, 2, '.', '');
        return $resultado;
    }
    public function calcularIndiceMicrosoft($id){
        $resultado =0;
       // $im = Indice::find($id);
       
        $im = Indice::find($id);
        $clocPor = ($im->cloc*100)/$im->loc;
        $clocPor = number_format($clocPor, 2, '.', '');
        $resultado = (171-(5.2*log($im->volume/$im->nbClasses))-(0.23*$im->ccn)-(16.2*log($im->loc/$im->nbClasses)))*100/171;
        $resultado = number_format($resultado, 2, '.', '');
        return $resultado;
    }
}
