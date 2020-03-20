<?php

namespace App\Http\Controllers;
use App\Proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator,File;
class DetalleController extends Controller
{
    public $archivo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*  $datos = array();
        $id = 1;
        $proyecto = Proyectos::find($id);
        print $proyecto->folder;*/
     //   $url = $proyecto->folder.'/js/latest.json';
     //   print $url;
       /* $json = File::get($url);
        $data = json_decode($json);
        foreach($data as $obj){
            print_r($data);
        }*/
        return view('proyectos.infor');
    }


    public function create()
    {
      
    }

    public function store(Request $request)
    {
       
       
    
    }

    public function show(Proyecto $proyecto)
    {
        //
    }

    public function edit(Proyecto $proyecto)
    {
        //
    }


    public function update(Request $request, Proyecto $proyecto)
    {
        //
    }


    public function destroy($id, Request $request)
    {
        
    }
   
}
