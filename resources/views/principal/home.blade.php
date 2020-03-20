<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Proyecto</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('asset/index_template/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('asset/index_template/css/resume.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none">Carlos Sanmartín</span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{asset('asset/index_template/img/profile.jpg')}}" alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">A cerca de</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#experience">Experiencia</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#education">Educación</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#skills">Habilidades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#interests">Intereses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{route('indexApps')}}">Aplicaciones</a>
        </li>
        @if (Route::has('login'))
            @auth
            <li class="nav-item">
                 <a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">Home</a>
            </li>
               
            @else
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Ingresar</a>
            </li>
                @if (Route::has('register'))
                 <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Registrarse</a>
                  </li>
                @endif
            @endauth
        @endif
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">
        <h1 class="mb-0">Carlos
          <span class="text-primary">Sanmartín</span>
        </h1>
        <div class="subheading mb-5">Angel felicísimo Rojas · 8 de diciembre · (+593) 986666763 ·
          <a href="">cdsanmartin@utpl.edu.ec</a>
        </div>
        <p class="lead mb-5"> <b>Tema:</b> Anáisis e implementacion de técnicas y métodos para evaluar arquitecturas software</p>
        <div class="social-icons">
          <a href="#">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#">
            <i class="fab fa-github"></i>
          </a>
          <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
      <div class="w-100">
        <h2 class="mb-5">Experiencia</h2>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">Desarrollador Junior</h3>
            <div class="subheading mb-3">Desarrollo web</div>
            <p>Uso de herramientas imnovadoras para dar soluciones simples y concretas.</p>
          </div>
        </div>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">Desarrollo web</h3>
            <div class="subheading mb-3">Soluciones intelectuales</div>
            <p>Desarrollo de páginas adaptadas al modelo de negocio</p>
          </div>
        </div>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between">
          <div class="resume-content">
            <h3 class="mb-0">Programación móbil</h3>
            <div class="subheading mb-3">Aplicaciones</div>
            <p>Colaboración para el desarrollo de aplicaciones móbiles.</p>
          </div>
        </div>

      </div>

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="education">
      <div class="w-100">
        <h2 class="mb-5">Education</h2>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">Universidad Técnica Particular de Loja</h3>
            <div class="subheading mb-3">Sistemas informáticos y computación</div>
            <div>Programación - Cálculo - IA</div>
            <p>Egresado</p>
          </div>
        </div>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="skills">
      <div class="w-100">
        <h2 class="mb-5">Habilidades</h2>

        <div class="subheading mb-3">Lenguajes de programación &amp; Herramientas</div>
        <ul class="list-inline dev-icons">
          <li class="list-inline-item">
            <i class="fab fa-html5"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-css3-alt"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-js-square"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-angular"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-react"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-node-js"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-sass"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-less"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-wordpress"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-gulp"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-grunt"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-npm"></i>
          </li>
        </ul>

        <div class="subheading mb-3">PHP - Java - Python - C#</div>
        <ul class="fa-ul mb-0">
          <li>
            <i class="fa-li fa fa-check"></i>
            Framework YII2 </li>
          <li>
            <i class="fa-li fa fa-check"></i>
            Framework Django</li>
          <li>
            <i class="fa-li fa fa-check"></i>
            Framework laravel</li>
          <li>
            <i class="fa-li fa fa-check"></i>
            Desarrollo ágil &amp; Scrum</li>
        </ul>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="interests">
      <div class="w-100">
        <h2 class="mb-5">Intereses</h2>
        <p>A parte de la programación, tengo un interes por la arquitectura software, en el desarrollo de sistemas a partir de procesos.</p>
      </div>
    </section>

    <hr class="m-0">
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('asset/index_template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('asset/index_template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('asset/index_template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('asset/index_template/js/resume.min.js')}}"></script>

</body>

</html>
