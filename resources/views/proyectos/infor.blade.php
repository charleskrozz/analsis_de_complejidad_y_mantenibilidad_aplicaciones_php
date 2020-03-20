@extends('admin.master')


@section('content')

@if($datos->count())
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">{{$datos->nombre}}</h2>
            <a href="{{route('indexApps')}}" class="au-btn au-btn-icon au-btn--blue">
            <i class="fa fa-chevron-circle-left"></i> Salir
             </a>
        </div>
    </div>
</div>
<br>
@endif
@if($mi)
<div class="row m-t-25">
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-collection-text"></i>
                    </div>
                    <div class="text">
                        <h2>{{$mi[26]}}</h2>
                        <span>NÚMERO DE CLASES</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-file-text"></i>
                    </div>
                    <div class="text">
                        <h2>{{$mi[25]}}</h2>
                        <span>TOTAL DE MÉTODOS</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChart1"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c3">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-folder"></i>
                    </div>
                    <div class="text">
                        <h2>{{$mi[22]}}</h2>
                        <span>LÍNEAS DE CÓDIGO</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChart3"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c4">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-alert-triangle"></i>
                    </div>
                    <div class="text">
                        <h2>{{$mi[1]}}</h2>
                        <span>COMPLEJIDAD</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChart4"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="au-card recent-report">
            <div class="au-card-inner">
                <h3 class="title-2">Métricas de mantenibilidad</h3>
                <br>
                <div class="chart-info">    
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                            <th scope="col-md-3">MÉTRICAS</th>
                            <th scope="col-md-3">VALORES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr  colspan="2">
                                <td>Líneas de código</td>
                                <td colspan="2">{{$mi[22]}}</td>
                            </tr>
                            <tr>
                                <td >Líneas de comentarios</td>
                                <td colspan="2">{{$mi[23]}}</td>
                            </tr>
                            <tr  colspan="2">
                                <td >Complejidad ciclomática</td>
                                <td colspan="2">{{$mi[1]}}</td>
                            </tr>
                            <tr  colspan="2">
                                <td>Volumen</td>
                                <td colspan="2">{{$mi[7]}} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="au-card chart-percent-card">
            <div class="au-card-inner">
                <h3 class="title-2 tm-b-5">Mantenibilidad : <b>{{$mi[15]}}</b> </h3>
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="percent-chart">
                            <div id="donutchart" style="width: 100%; height: 253px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="au-card chart-percent-card">
            <div class="au-card-inner">
            <h3 class="title-2 tm-b-5"><b>IM</b> promedio por clase</h3>
            <br>
            <br>
            <div id="chart_div" style="width: 100%; height: 253px;"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Indicadores</h4>
            </div>
            <div class="card-body">
                <div class="default-tab">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                                aria-selected="true">TAMAÑO</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"
                                aria-selected="false">COD</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact"
                                aria-selected="false">MÉTRICAS DE H</a>
                            <a class="nav-item nav-link" id="nav-chart-tab" data-toggle="tab" href="#nav-chart" role="tab" aria-controls="nav-chart"
                                aria-selected="false">CHART</a>
                        </div>
                    </nav>
                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                    <th scope="col-md-3">por clase</th>
                                    <th scope="col-md-3">Valores</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr  colspan="2">
                                        <td>LOC</td>
                                        <td colspan="2">{{number_format($mi[22] / $mi[26],2) }}</td>
                                    </tr>
                                    <tr>
                                        <td >CLOC</td>
                                        <td colspan="2">{{number_format($mi[23] / $mi[26],2) }}</td>
                                    </tr>
                                    <tr  colspan="2">
                                        <td >CC</td>
                                        <td colspan="2">{{$mi[1] }}</td>
                                    </tr>
                                    <tr  colspan="2">
                                        <td>VH</td>
                                        <td colspan="2">{{number_format($mi[7]/$mi[26],2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                             <div id="coments" style="width: 285px; height: 275px;"></div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                        <th scope="col-md-3">Métrica</th>
                                        <th scope="col-md-3">Valores</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <tr  colspan="2">
                                        <td>DIFICULTAD</td>
                                        <td colspan="2">{{number_format($mi[14],2) }}</td>
                                    </tr>
                                    <tr>
                                        <td >ESFUERZO </td>
                                        <td colspan="2">{{$varEsfuerzo[0] }}</td>
                                    </tr>
                                    <tr  colspan="2">
                                        <td >TIEMPO REQUERIDO PARA PROGRAMAR</td>
                                        <td colspan="2">{{$varEsfuerzo[1] }}</td    >
                                    </tr>  
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-chart" role="tabpanel" aria-labelledby="nav-chart-tab">
                            <div id="chart_div5" style="width: 100%; height: 275px;"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-12">
    <div class="au-card chart-percent-card">
        <div class="au-card-inner">
            <h3 class="title-2 tm-b-5">Tamaño de la aplicación <b>{{$datos->nombre}} </b></h3> 
            <br>
            <br>
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th scope="col-md-4">LOC</th>
                        <th scope="col-md-4">CATEGORÍA</th>
                        <th scope="col-md-4">TIEMPO DE DESARROLLO</th>
                    </tr>
                </thead>
                <tbody>
                @if($mi[22] < 1000)
                    <tr>
                        <td class="denied"> <b> Menor a  1000</b> </td>
                        <td class="denied"><b>Trivial</b></td>
                        <td class="denied" colspan="2"><b>De 0 a 4 semanas</b> </td>
                    </tr>
                @else 
                    <tr>
                        <td> Menor a  1000 </td>
                        <td >Trivial</td>
                        <td colspan="2">De <b>0 a 4</b> semanas </td>
                    </tr>
                @endif

                @if($mi[22] >= 1000 && $mi[22] < 3000 )
                    <tr>
                        <td class="denied" > Entre 1000 y 3000 </td>
                        <td class="denied" >Pequeño</td>
                        <td class="denied" colspan="2">De <b>1 a 6</b> meses </td>
                    </tr>
                @else
                    <tr>
                        <td > Entre 1000 y 3000 </td>
                        <td >Pequeño</td>
                        <td colspan="2">De <b>1 a 6</b> meses </td>
                    </tr>
                @endif
                @if($mi[22] >= 3000 && $mi[22] < 50000 )
                    <tr  colspan="2">
                        <td class="denied">Entre  3000 y 50000</td>
                        <td class="denied">Medio</td>
                        <td class="denied" colspan="2">De <b>0.5 a 2</b> años </td>
                    </tr>
                @else
                    <tr  colspan="2">
                        <td  >Entre  3000 y 50000</td>
                        <td >Medio</td>
                        <td  colspan="2">De <b>0.5 a 2</b> años </td>
                    </tr>
                @endif
                
                @if($mi[22] >= 50000 && $mi[22] < 100000 )
                    <tr  colspan="2">
                        <td class="denied">Entre 50000 y 100000</td>
                        <td class="denied" >Grande</td>
                        <td class="denied" colspan="2">De <b>2 a 3</b> años </td>
                    </tr>
                @else
                    <tr  colspan="2">
                        <td>Entre 50000 y 100000</td>
                        <td >Grande</td>
                        <td colspan="2">De <b>2 a 3</b> años </td>
                    </tr>
                @endif
                @if($mi[22] >= 100000 && $mi[22] <= 1000000 )
                    <tr  colspan="2">
                        <td class="denied">Entre 100000 y 1000000</td>
                        <td class="denied">Muy grande</td>
                        <td class="denied" colspan="2">De <b>4 a 5</b> años </td>
                    </tr>
                @else
                    <tr  colspan="2">
                        <td>Entre 100000 y 1000000</td>
                        <td>Muy grande</td>
                        <td colspan="2">De <b>4 a 5</b> años </td>
                    </tr>
                @endif

                @if($mi[22] > 1000000)
                    <tr  colspan="2">
                        <td class="denied">Mayor a 1000000</td>
                        <td class="denied" >Gigante</td>
                        <td class="denied" colspan="2">De <b>5 a 10</b> años </td>
                    </tr>
                @else
                    <tr  colspan="2">
                        <td>Mayor a 1000000</td>
                        <td>Gigante</td>
                        <td colspan="2">De <b>5 a 10</b> años </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endif
@endsection

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Métrica', 'Valor'],
          ['IM',     {{$mi[15]}}],
          ['Falta',     {{100-$mi[15]}}]
        ]);

        var options = {
          pieHole: 0.4,
          slices: {
            0: { color: 'green' },
            1: { color: 'red' }
          }
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
</script>
@if($mi)
<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

    var data = google.visualization.arrayToDataTable([
         ['IM', 'IM', { role: 'style' }],
         ['Original', {{$varIndice[0]}}, 'yellow'],            // RGB value
         ['SEI', {{$varIndice[1]}}, 'green'],            // English color name
         ['Microsoft',{{$varIndice[2]}}, 'red'],
      ]);

      var options = {
        title: '',
        hAxis: {
          title: '',
          format: '',
         
        },
        vAxis: {
          title: 'IM'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Lineas de código', 'Valor'],
          ['LLOC',     {{$mi[24]/ $mi[26]}}],
          ['CLOC',      {{$mi[23]/ $mi[26]}}]
        ]);

        var options = {
          title: '',
          pieHole: 0.3,
        };

        var chart = new google.visualization.PieChart(document.getElementById('coments'));

        chart.draw(data, options);
      }
</script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Abstracción', 'Inestabilidad'],
          [ {{$varChart[0]}},{{$varChart[1]}}]
        ]);

        var options = {
          title: 'Abstracción vs. Inestabilidad comparación',
          hAxis: {title: 'Abstracción', minValue: 0, maxValue: 1},
          vAxis: {title: 'Inestabilidad', minValue: 0, maxValue: 1},
          legend: 'none'
        };

        var chart = new google.visualization.ScatterChart(document.getElementById('chart_div5'));

        chart.draw(data, options);
      }
    </script>
    
@endif