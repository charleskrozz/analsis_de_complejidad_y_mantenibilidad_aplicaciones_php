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
            @if(isset($id))
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <button class="au-btn-plus">
                          <a href="{{ route('crear',$id)}}">  <i class="zmdi zmdi-plus"></i></a>
                        </button>
                           
                    </div>
                </div>
            </div>
            @else
                
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        
                        <th>Aplicación</th>  
                        <th>Nombre</th>
                         <th>Versión</th>
                        <th>Fecha creación</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                @if(isset($proyectos) && isset($aplicacion))
                    @foreach($proyectos as $proyecto)
                    <tr class="tr-shadow">
                    
                        <td class="desc">{{$aplicacion->nombre_app}} </td>  
                        <td>{{$proyecto->nombre}}</td>
                        <td>{{$proyecto->version}}</td>
                        <td class="desc">{{$proyecto->created_at}} </td>
                        <td class="desc">
                        @if($proyecto->estado == 0)
                            <span class="role admin" title="Inactivo"><i class="fa fa-minus-circle"></i></span>
                        @else
                            <span class="role user" title="Activo"><i class="fa fa-check"></i></span>
                        @endif
                         </td>
                        <td>
                            <div class="table-data-feature">
                               <a class="item colorItem" data-toggle="tooltip" data-placement="top" title="Ver" href="{{ route('detalle',['id'=>$proyecto->id])}}"  >
                                    <i class="zmdi zmdi-mail-send" class="colorItem"></i>
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
