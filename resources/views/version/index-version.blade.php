@extends('admin.master')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="content">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}"> <b>{{ Session::get('alert-' . $msg) }}</b></p>
                @endif
            @endforeach
            
        </div>                
    </div>
    <div class="col-md-6">
        <div class="table-data__tool">
            <div class="table-data__tool-left">
            
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <a href="{{ route('formApps')}}" class="au-btn au-btn-icon au-btn--blue" title="Aplicación">
                            <i class="zmdi zmdi-plus"></i>Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
@if(isset($apps))    
    @foreach($apps as $app)
        @if(isset($proyectos))
            <div class="col-lg-6">
                <!-- USER DATA-->
                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                <div class="au-card-title" style="background-image:url('asset/images/bg-title-01.jpg');">
                    <div class="bg-overlay bg-overlay--blue"></div>
                    <h3>
                    
                        <a class="colorTextoIni" href="{{ route('verApps',['id'=>$app->id])}}" ><i class="zmdi zmdi-apps"></i>{{$app->nombre_app}}</a> </h3>
                    <button class="au-btn-plus">
                        <a href="{{ route('crear',['id'=>$app->id])}}" title="Agregar">  <i class="zmdi zmdi-plus"></i></a>
                    </button>
                </div>
                <div class="filters m-b-45">
                    <div class="au-message__noti">
                        <p>
                            <span>Descripción:</span>
                            {{$app->descripcion_app}}
                        
                        </p>
                    </div>    
                </div>
                <div class="table-responsive table-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Versión</td>
                                <td>Proyecto</td>
                                <td>Estado</td>
                                <td>Análisis</td>
                            </tr>
                        </thead>
                        <tbody>
                        @if($proyectos->count())

                        @else
                        <tr>
                            <td colspan="8">No hay versiones !!</td>
                        </tr>
                        @endif
                        @foreach($proyectos as $proyecto)
                            @if($app->id == $proyecto->aplicacion_id_pro)
                                <tr>
                                    <td>
                                        <label class="au-checkbox" title="Versión">
                                            {{$proyecto->version_pro}}
                                        </label>
                                    </td>
                                    <td>
                                        <div class="table-data__info">
                                            <h6 title = "Nombre">{{$proyecto->nombre_pro}}</h6>
                                            <span>
                                                <a title="Fecha de creación" >{{$proyecto->fecha_pro}}</a>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                    @if($proyecto->estado_pro == 0)
                                        <span class="role admin" title="Inactivo"><i class="fa fa-minus-circle"></i></span>
                                    @else
                                        <span class="role user" title="Activo"><i class="fa fa-check"></i></span>
                                    @endif
                                    </td>
                                    <td>
                                        <span class="more">
                                            <a href="{{ route('detalle',['id'=>$proyecto->id_pro])}}"><i class="fa fa-eye"></i></a>
                                        </span>
                                    </td>
                                </tr>       
                            @endif
                        @endforeach  
                        </tbody>
                    </table>
                    </div>
                    <div class="user-data__footer">
                         <div class="container">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                <a class="btn btn-primary btn-lg btn-block" data-toggle="tooltip" data-placement="top" title="Gráfica" href="{{ route('verGrafica',['id'=>$app->id])}}"  >
                                        <i class="fa fa-bar-chart-o"></i> Ver</a>
                                </div>
                                <div class="col-md-4"></div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
        </div>
@endif
@if($apps->count())

@else
<tr>
    <td colspan="8">No hay aplicaciones !!</td>
</tr>
@endif
@endsection
