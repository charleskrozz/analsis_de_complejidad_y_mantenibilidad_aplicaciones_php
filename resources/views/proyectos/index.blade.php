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
                        <a href="{{ route('indexApps')}}" class="au-btn au-btn-icon au-btn--blue">
                        <i class="fa fa-chevron-circle-left"></i> Salir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>Aplicación</th>
                        <th>Archivo</th>
                        <th>Versión</th>
                         <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                @if($proyectos->count())
                    @foreach($proyectos as $proyecto)
                    <tr class="tr-shadow">
                        <td class="desc">{{$proyecto->nombre_app}}</td>
                        <td >{{$proyecto->nombre}}</td>
                        <td>{{$proyecto->version}}</td>
                        <td class="desc">
                        @if($proyecto->estado == 0)
                            <span class="role admin" title="Inactivo"><i class="fa fa-minus-circle"></i></span>
                        @else
                            <span class="role user" title="Activo"><i class="fa fa-check"></i></span>
                        @endif
                         </td>
                        <td>
                            <div class="table-data-feature">
                               <a class="item" data-toggle="tooltip" data-placement="top" title="Ver" href="{{ route('detalle',['id'=>$proyecto->id])}}"  >
                                    <i class="zmdi zmdi-mail-send"></i>
                                </a>
                                
                                <form class="item" action="{{action('ProyectoController@destroy', $proyecto->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Eliminar" type="submit">
                                    <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">No hay proyectos !!</td>
                        </tr>
                     @endif
                   
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

@endsection
