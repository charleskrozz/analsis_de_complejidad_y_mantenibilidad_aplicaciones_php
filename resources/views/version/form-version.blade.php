@extends('admin.master')

@section('content')
<div class="row">

    
    <div class="col-md-3">
    </div>
    <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                INGRESE 
                <strong>Aplicación</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{route('storeApps')}}" method="post" class="form-horizontal">
                @csrf
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-normal" class=" form-control-label">Nombre</label>
                        </div>
                        <div class="col col-sm-9">
                            <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-normal" class=" form-control-label">Descripción</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea type="text" name="descripcion" id="descripcion" rows="7" placeholder="Ingrese una descripción..." class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-normal" class=" form-control-label">Lenguaje</label>
                        </div>
                        <div class="col col-sm-9">
                            <input type="text" id="lenguaje" name="lenguaje" placeholder="Lenguaje" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Guardar
                        </button>
                     </div>
                </form>
            </div>

        </div>
    </div>
    <div class="col-md-3">
    </div>
</div>
@endsection