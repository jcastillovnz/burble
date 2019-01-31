<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
 

<script src="{{ asset('js/vue.js') }}" defer="" ></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" >
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/alertify.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/loader.css') }}" rel="stylesheet" type="text/css">
 
             





<script src="{{ asset('js/axios.min.js') }} " defer></script>
<script  type="text/javascript" src="{{ asset('js/jQuery.js') }}"   ></script>
<script  type="text/javascript" src="{{ asset('js/alertify.min.js') }}" ></script>
<script src=" {{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"  ></script>

<script src="{{ asset('js/sortable.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>


<script src="{{ asset('js/appVuej.js') }}" defer></script>


<nav  class="navbar navbar-expand-lg navbar-light border-bottom ">
    <a class="navbar-brand text-primary" href="{{ url('/home') }}">
<strong>              {{ config('app.name', 'Laravel') }}
</strong>
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
<ul class="navbar-nav mr-auto mt-2 my-lg-0">
</ul>

<form  class="form-inline my-2 my-lg-0"  action="{{ url('/busqueda') }}"  method="GET" >
{{ csrf_field() }}
<input required="" class="form-control  mr-sm-2" name="busqueda" type="search" placeholder="Proyecto / Tarea">

<button class="btn btn-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i>  Buscar</button>
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







<div  id="loader" class="loader loader-lg" ></div>

<body   class="col-sm-12  ">





<nav class="navbar navbar-expand-lg navbar-light ">

 @guest
  @else
<span class="navbar-brand text-info" href="{{ url('/') }}">




@if(   Auth::user()->foto!=null )
<img    width="40" height="40" class="border rounded-circle "  src="/img/users/fotos/{{ Auth::user()->foto }}" alt="Foto de perfil">
@else

<img    width="40" height="40" class="border rounded-circle "  src="/img/user.png" alt="Foto de perfil">
@endif


<strong style="font-size: 17px;"> 
{{ Auth::user()->name }}  {{ Auth::user()->apellido }}  

<input type="hidden"  class="hidden" id="user_id"  value="{{ Auth::user()->id}} " name="">


</strong>
</span>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">



    <ul class="navbar-nav mr-auto mt-2 my-lg-0">

    </ul>






<ul class="navbar-nav  my-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
</li>

<li class="nav-item">
        <a class="nav-link" href="#"  data-toggle="modal" data-target=".nuevoCliente"><i class="fas fa-suitcase"></i> Registrar cliente</a>
</li>

<li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-chart-area"></i> Estadisticas</a>
</li>
  



<div class="dropdown nav-item">
  <a class="nav-link dropdown-toggle"  data-toggle="dropdown"><i class="fas fa-cogs nav-item"></i> Configuracion
  <span class="caret"></span></a>
  <ul class="dropdown-menu ">
    <li class="dropdown-item"><a class="dropdown-item nav-link" href="{{ url('/mi-cuenta') }}"><i class="fas fa-user-alt "></i>  Mi cuenta</a></li>
    <li class="dropdown-item"><a class="dropdown-item nav-link" href="{{ url('/gestiones') }}"><i class="fas fa-users-cog "></i>  Gestiones</a></li>
    <li class="dropdown-item"><a  class="dropdown-item nav-link" href="#"><i class="fas fa-lock "></i>  Salir</a></li>
  </ul>
</div>



</ul>
@endguest
</div>
</nav>
    
 @yield('content')
</div>
</body>








@include('layouts.clientes.create')



<footer class="col-sm-12 margin-bottom-none" >
<center>
  <br>
<p>

© 2018  Burble para Achelier Studio - <i class="fas fa-code"></i> Desarrollado por Jose Castillo 

</p>
</center>




</footer>
</html>
