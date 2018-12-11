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

</head>
<body   class="col-sm-12">
    <div id="app">



<nav class="navbar navbar-expand-lg navbar-light bg-light ">
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
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-chart-area"></i> Estadisticas</a>
      </li>
   
    </ul>





</head>
<body   class="col-sm-12">





<center>
<div class="loader" id="loader"></div>
</center>

    <div id="app">






  </div>




</nav>


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




    <ul class="navbar-nav mr-auto mt-2 my-lg-0">

    </ul>




   <ul class="navbar-nav  my-lg-0">

    </ul>



                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>



                            <i class="fas fa-user"></i> 
Perfil

                                </a>

   <a class="nav-link" href="#"><i class="fas fa-users-cog"></i> Configuracion</a>

        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Salir<span class="sr-only">(current)</span></a>
                



  </div>

</nav>
    
@endguest


















        <main class="py-4">
            @yield('content')
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
