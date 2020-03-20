@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-lg-6">
    @if(isset($aplicacion))
    <div class="card">
        <div class="card-header">
        Aplicación <strong>{{$aplicacion->nombre_app}}</strong> subir zip
        </div>
        <div class="card-body card-block">
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">Versiones previas:</label>
            </div>
            <div class="col-12 col-md-9">
            @if($version->count())
                @foreach($version as $v)
                    <span class="role user" title="Versión">{{$v->version}}</span>    
                @endforeach 
            @else
                No hay versiones !
            @endif
            </div>
        </div>
            <form action="{{route('archivos.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nombre:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="nombre" placeholder="" class="form-control">
                       
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Version:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="text-input" name="version" placeholder="" class="form-control">
                       
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                  
                    </div>
                    <div class="col-12 col-md-12">
                        <input type="file" id="file-input" name="archivo" class="form-control-file">
                    </div>
                </div>
                <input name="app_id" type="hidden" value="{{$aplicacion->id}}">
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Cargar
                    </button>
                </div>
            </form>
        </div>
     
    </div>
    @endif                     
    </div>
    <div class="col-lg-6">
       
    </div>
</div>
@endsection