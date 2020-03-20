@extends('admin.master')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
1 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
2 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
3 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
4 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
@section('content')
@if($app->count())
@foreach($app as $apps)
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
             <h2 class="title-1">Versiones de <b>{{$apps->nombre_app}}</b></h2>
            <a href="{{route('indexApps')}}" class="au-btn au-btn-icon au-btn--blue">
            <i class="fa fa-chevron-circle-left"></i> Salir
             </a>
        </div>
    </div>
</div>
@endforeach
@endif
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
           @if($app)
            @foreach($app as $apps)
                Indicadores de aplicación <b>{{$apps->nombre_app}}</b>
            @endforeach
           @endif
            </div>
            <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                  <div class="au-card m-b-30">
                      <div class="au-card-inner">
                          <h3 class="title-2 m-b-40">Índice de mantenibilidad</h3>
                          <div id="line-chart"></div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="au-card m-b-30">
                  <div class="au-card-inner">
                      <h3 class="title-2 m-b-40">Complejidad ciclomática</h3>
                      <div id="line-complejidad"></div>
                  </div>
                </div>
              </div>   
              <div class="col-md-6">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">
                        <h3 class="title-2 m-b-40">Líneas de código</h3>
                        <div id="area-chart-loc" ></div>
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">
                        <h3 class="title-2 m-b-40">Composición lógica del código</h3>
                        <div id="area-chart-cloc" ></div>
                    </div>  
                </div>
              </div>
              <div class="col-md-6">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">
                        <h3 class="title-2 m-b-40">Volumen</h3>
                        <div id="chart-volumen" ></div>
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">
                        <h3 class="title-2 m-b-40">Mantenibilidad Vs Complejidad</h3>
                        <div id="chart-valorM" ></div>
                    </div>
                </div>
              </div>
              <div class="col-lg-12">
                  <div class="au-card m-b-30">
                      <div class="au-card-inner">
                          <h3 class="title-2 m-b-40">Índicadores general</h3>
                          <div id="line-chart-general"></div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
    </div>
   
</div>

  


<script type="text/javascript">
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'locChart',
  parseTime: false,
  hideHover: true,
  barColors: ["#1531B2"],
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    @if(isset($grafica))
    @foreach($grafica as $gra)
    { version: '{{$gra->version}}', im: {{$gra->ccn}} },
    @endforeach
    @endif
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'version',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['im'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['CC'],
  
});
</script>

<script type="text/javascript">
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'tamanio',
  parseTime: false,
  hideHover: true,
  barColors: ["#1531B2"],
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    @if(isset($grafica))
    @foreach($grafica as $gra)
    { version: '{{$gra->version}}', im: {{$gra->loc}} },
    @endforeach
    @endif
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'version',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['im'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['LOC'],
  
});
</script>
<script type="text/javascript">
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'comentarios',
  parseTime: false,
  hideHover: true,
  barColors: ["#1531B2"],
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    @if(isset($grafica))
    @foreach($grafica as $gra)
    { version: '{{$gra->version}}', im: {{$gra->cloc}} },
    @endforeach
    @endif
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'version',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['im'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['CLOC'],
  
});
</script>
<script type="text/javascript">
var data = [
  @if(isset($grafica))
    @foreach($grafica as $gra)
    { y: '{{$gra->version}}', a:{{$gra->imOriginal}} , b: {{$gra->imSei}}, c: {{$gra->imMicrosoft}}},
    @endforeach
    @endif
     
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a', 'b', 'c'],
      labels: ['IM Original', 'IM SEI', 'IM Microsoft'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      parseTime: false,
      resize: true,
      pointFillColors:['#fff'],
      pointStrokeColors: ['black'],
      lineColors:['blue','green','red']
  };

config.element = 'line-chart';
Morris.Line(config);
</script>
<script type="text/javascript">
var data = [
  @if(isset($grafica))
    @foreach($grafica as $gra)
    { y: '{{$gra->version}}', a:{{$gra->ccn}} },
    @endforeach
    @endif
     
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a'],
      labels: ['CC'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      parseTime: false,
      resize: true,
      pointFillColors:['#fff'],
      pointStrokeColors: ['black'],
      lineColors:['red']
  };

config.element = 'line-complejidad';
Morris.Line(config);
</script>

<script >
var data = [
  @if(isset($grafica))
    @foreach($grafica as $gra)
    { y: '{{$gra->version}}', a:{{$gra->loc}}, b:{{$gra->cloc}} },
    @endforeach
  @endif
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a','b'],
      labels: ['LOC','CLOC'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      parseTime: false,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['blue','grey']
  };
config.element = 'area-chart-loc';
Morris.Area(config);
</script>

<script >
var data = [
  @if(isset($grafica))
    @foreach($grafica as $gra)
    { y: '{{$gra->version}}', a:{{$gra->lloc}}, b:{{$gra->loc}} },
    @endforeach
  @endif
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a','b'],
      labels: ['LLOC','LOC'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      parseTime: false,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['blue','yellow']
  };
config.element = 'area-chart-cloc';
Morris.Bar(config);
</script>

<script >
var data = [
      { y: '2014', a: 50, b: 90},
      { y: '2015', a: 65,  b: 75},
      { y: '2016', a: 50,  b: 50},
      { y: '2017', a: 75,  b: 60},
      { y: '2018', a: 80,  b: 65},
      { y: '2019', a: 90,  b: 70},
      { y: '2020', a: 100, b: 75},
      { y: '2021', a: 115, b: 75},
      { y: '2022', a: 120, b: 85},
      { y: '2023', a: 145, b: 85},
      { y: '2024', a: 160, b: 95}
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Total Income', 'Total Outcome'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['gray','red']
  };

config.element = 'line-chart-code';
Morris.Bar(config);
</script>

<script >
var data = [
  @if(isset($grafica))
    @foreach($grafica as $gra)
    { y: '{{$gra->version}}', a:{{$gra->volume}} },
    @endforeach
  @endif
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a'],
      labels: ['V'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      parseTime: false,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['grey']
  };
config.element = 'chart-volumen';
Morris.Area(config);
</script>
<script >
var data = [
  @if(isset($grafica))
    @foreach($grafica as $gra)
    { y: '{{$gra->version}}', a:{{$gra->mi}},b:{{$gra->ccn}} },
    @endforeach
  @endif
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a','b'],
      labels: ['IM','CC'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      parseTime: false,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['green','red']
  };
config.element = 'chart-valorM';
Morris.Area(config);
</script>

<script type="text/javascript">
var data = [
  @if(isset($grafica))
    @foreach($grafica as $gra)
    { y: '{{$gra->version}}', a:{{$gra->loc}} , b: {{$gra->cloc}}, c: {{$gra->mi}}, d: {{$gra->ccn}}, e: {{$gra->volume}}},
    @endforeach
    @endif
     
    ],
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a', 'b', 'c', 'd','e'],
      labels: ['LOC', 'CLOC', 'IM','CC','V'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      parseTime: false,
      resize: true,
      pointFillColors:['#fff'],
      pointStrokeColors: ['black'],
      lineColors:['blue','green','red','grey','purple']
  };

config.element = 'line-chart-general';
Morris.Line(config);
</script>
@endsection
