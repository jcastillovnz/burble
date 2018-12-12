<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
  

    <!-- Fonts -->
           <!-- Fonts -->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
         <link href="css/app.css" rel="stylesheet" type="text/css">

         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


    

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<script src="js/sortable.js" ></script>
  <script src="{{ asset('js/app.js') }}" defer></script>





<nav class="navbar navbar-expand-lg navbar-light border-bottom ">
    <a class="navbar-brand text-primary" href="{{ url('/') }}">
<strong>
                    {{ config('app.name', 'Laravel') }}

</strong>
                </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">




    <ul class="navbar-nav mr-auto mt-2 my-lg-0">

    </ul>





    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Proyecto / Tarea">
      <button class="btn btn-light my-2 my-sm-0" type="submit">Buscar</button>
    </form>



   <ul class="navbar-nav  my-lg-0">
 @guest


      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-user"></i> Iniciar session <span class="sr-only">(current)</span></a>
      </li>
 @else

      <li class="nav-item">
     <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                   <i class="fas fa-sign-out-alt"></i> Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
</li>


@endguest
   
</ul>
</nav>


</head>






<body   class="col-sm-12">


<center>
<div class="loader"></div>
</center>
<div id="app">


  </div>







<nav class="navbar navbar-expand-lg navbar-light ">

 @guest
  @else
<a class="navbar-brand text-primary" href="{{ url('/') }}">
<img src="img/user.png" width="40">
<strong>
{{ Auth::user()->name }} 
</strong>
</a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">







<ul class="navbar-nav  my-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
</li>

<li class="nav-item">
        <a class="nav-link" href="#"  data-toggle="modal" data-target=".nuevoCliente"><i class="fas fa-suitcase"></i> Registrar cliente</a>
</li>

<li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-chart-area"></i> Estadisticas</a>
</li>
  
<li class="nav-item">
   <a class="nav-link" href="#"><i class="fas fa-users-cog"></i> Configuracion</a>
</li>

</ul>

@endguest

</div>
</nav>
    








<!--  

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
                    <ul class="navbar-nav mr-auto">

                    </ul>

                  
                    <ul class="navbar-nav ml-auto">
       
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    -->












    
            @yield('content')
         <main class="py-4">
        </main>
    </div>
</body>

<footer class="col-sm-12 margin-bottom-none" >
    <center>
<p>
  
© 2018  Burble para Achelier Studio - <i class="fas fa-code"></i> Desarrollado por Jose Castillo 


</p>
</center>
</footer>
</html>