<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>INMO</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('simple-line-icons/css/simple-line-icons.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/landing-page.min.css') }}">

    </head>
    <body>

        <!-- Nav -->
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="#">INMO</a>
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Principal</a>
                        @else
                            <a href="{{ route('login') }}" style="text-decoration-line: none"><i class="icon-user text-primary"></i> Iniciar Sesión</a>
                            
                        @endauth
                    </div>
                @endif
            </div>
        </nav>

        <!-- Header -->
        <header class="masthead text-white text-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <h1 class="mb-5">Instituto Normal Mixto de Occidente (INMO) “Justo Rufino Barrios”</h1>
                    </div>
                </div>
            </div>
        </header>


        <!-- Datos -->
        <section class="features-icons bg-light text-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                  <div class="features-icons-icon d-flex">
                    <i class="icon-home m-auto text-primary"></i>
                  </div>
                  <h3>Quiénes Somos?</h3>
                  <p class="lead mb-0">El Instituto Normal Mixto de Occidente tiene como finalidad contribuir a la formación integral de los guatemaltecos, en las áreas y niveles regidos y autorizados por el Ministerio de Educación.</p>
                </div>
              </div>
               <div class="col-lg-6" style="margin-bottom: 80px;">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                  <div class="features-icons-icon d-flex">
                    <i class="icon-graduation m-auto text-primary"></i>
                  </div>
                  <h3>Descripción</h3>
                  <p class="lead mb-0">El Instituto Normal Mixto de Occidente tiene como finalidad contribuir a la formación integral de los guatemaltecos, en las áreas y niveles regidos y autorizados por el Ministerio de Educación.</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                  <div class="features-icons-icon d-flex">
                    <i class="icon-map m-auto text-primary"></i>
                  </div>
                  <h3>Ubicación</h3>
                  <p class="lead mb-0">10 avenida 8-27 Zona 3 San Marcos, Guatemala.</p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Footer -->
        <footer class="footer bg-light">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                <p class="text-muted small mb-4 mb-lg-0">&copy; UMG - Ingeniería 2,018.</p>
              </div>
              <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <a href="https://www.facebook.com/umgeducacionvirtual/" target="_blank">
                      <i class="fab fa-facebook fa-2x fa-fw"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
    </body>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</html>
