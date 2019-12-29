<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Sistema INMO</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('public/iCheck/flat/blue.css')}}">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js')}}"></script>
    <script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css')}}"/>
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('scss/style.css')}}">
    <link href="{{asset('css/lib/vector-map/jqvmap.min.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='styleshee' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>

        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">INMO</a>
                <a class="navbar-brand hidden" href="./">I</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/home"> <i class="menu-icon fa fa-dashboard"></i>Panel de Control </a>
                    </li>
                    @if(Auth::user()->rol == "admin" || Auth::user()->rol == "director")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-group"></i>Personal Administrativo</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-sitemap"></i><a href="{{url('personal_administrativo/cargo/')}}">Cargo</a></li>
                            <li><i class="fa fa-user"></i><a href="{{url('personal_administrativo/personal/')}}">Personal</a></li>
                        </ul>
                    </li>
                    @endif

                      @if(Auth::user()->rol =="admin" || Auth::user()->rol == "secretaria")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Estudiantes y Encargados</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="ti ti-new-window"></i><a href="{{url('estudiantes_encargados/genero/')}}">Genero</a></li>
                            <li><i class="fa  fa-male"></i><a href="{{url('estudiantes_encargados/encargado/')}}">Encargado</a></li>
                            <li><i class="fa fa-user"></i><a href="{{url('estudiantes_encargados/estudiantes/')}}">Estudiantes</a></li>
                        </ul>
                    </li>
                        @endif

                    @if(Auth::user()->rol == "admin" || Auth::user()->rol == "docente")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i>Notas</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-cloud"></i><a href="{{url('notas/aspecto/')}}">Aspecto</a></li>
                            <li><i class="menu-icon fa fa-pencil-square-o"></i><a href="{{url('notas/nota/')}}">Nota</a></li>
                            <li><i class="menu-icon fa fa-list-alt"></i><a href="{{url('notas/tipo_evaluacion/')}}">Tipo Evaluacion</a></li>
                            <li><i class="menu-icon fa fa-file-text-o"></i><a href="{{url('notas/boleta/')}}">Boletas</a></li>
                        </ul>
                    </li>
                    @endif

                      @if(Auth::user()->rol == "admin" || Auth::user()->rol == "docente")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-child"></i>Asistencia</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-check-square-o"></i><a href="{{url('asistencia/')}}">Control</a></li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->rol == "admin" || Auth::user()->rol == "secretaria")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-credit-card"></i>Carnet</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-share-square-o"></i><a href="{{url('carnet/')}}">Generar</a></li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->rol == "admin" || Auth::user()->rol == "docente")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-comment"></i>Mensajeria</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-comments"></i><a href="{{url('telegram/')}}">Mensajes</a></li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->rol == "admin" || Auth::user()->rol == "secretaria")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Ciclo y Bimestre</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="{{url('ciclo_bimestre/ciclo/')}}">Ciclo</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="{{url('ciclo_bimestre/bimestre/')}}">Bimestre</a></li>
                        </ul>
                    </li>
                    @endif

                      @if(Auth::user()->rol == "admin" || Auth::user()->rol == "secretaria")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Asignacion de Cursos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-line-chart"></i><a href="{{url('asignacion_cursos/')}}">Asignacion</a></li>
                        </ul>
                    </li>
                    @endif

                      @if(Auth::user()->rol == "admin" || Auth::user()->rol == "secretaria" || Auth::user()->rol == "director")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Carreras</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="{{url('carrera/carrera/')}}">Carrera</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="{{url('carrera/grado/')}}">Grado</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="{{url('carrera/jornada/')}}">Jornada</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="{{url('carrera/seccion/')}}">Seccion</a></li>
                        </ul>
                    </li>
                      @endif

                        @if(Auth::user()->rol == "admin" || Auth::user()->rol == "director")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Cursos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-bookmark"></i><a href="{{url('cursos/curso/')}}">Curso</a></li>
                            <li><i class="menu-icon fa fa-calendar"></i><a href="{{url('cursos/horario/')}}">Horario</a></li>
                            <li><i class="menu-icon fa fa-calendar"></i><a href="{{url('cursos/actividad/')}}">Actividades</a></li>
                        </ul>
                    </li>
                          @endif

                      @if(Auth::user()->rol == "admin" || Auth::user()->rol == "secretaria" || Auth::user()->rol == "director")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-home"></i> Establecimientos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-home"></i><a href="{{url('establecimiento_educativo/')}}">Centro</a></li>
                            <li><i class="menu-icon fa fa-calendar"></i><a href="{{url('calendario/')}}">Calendario Escolar</a></li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->rol == "admin" || Auth::user()->rol == "secretaria")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cart-plus"></i>Pagos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-money"></i><a href="{{url('pago/')}}">Efectuar</a></li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->rol == "admin" || Auth::user()->rol == "director")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-unlock"></i>Usuarios</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-users"></i><a href="{{url('usuarios/')}}">Usuario</a></li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->rol == "admin" || Auth::user()->rol == "director")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-folder-open"></i>Anexos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-clipboard"></i><a href="{{url('laminas/')}}">Laminas</a></li>
                        </ul>
                    </li>
                    @endif


                    <li class="active">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"> <i class="menu-icon fa fa-sign-out"></i>Salir </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>


              </ul>
            </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">
                <div class="col-sm-7">
                  <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-l-12 header-right">
                  <span class="hidden-xs"><span class="badge badge-success">{{ Auth::user()->name }}</span>  <?php echo date('l jS \of F Y h:i:s A');?></span>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="content mt-3">


          @yield('contenido')








        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{asset('js/plugins.js')}}"></script>

    @stack('scripts')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    <script src="{{asset('js/lib/chart-js/Chart.bundle.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script src="{{asset('js/widgets.js')}}"></script>
    <script src="{{asset('js/lib/vector-map/jquery.vmap.js')}}"></script>
    <script src="{{asset('js/lib/vector-map/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
