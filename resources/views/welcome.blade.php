<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
         <link href="css/app.css" rel="stylesheet" type="text/css">

         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


         <script src="js/vuej.js" ></script>
<script src="js/sortable.js" ></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">





    </head>
    <body class="col-sm-12">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registro</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content col-sm-12">
      
<div class="btn-group">
         

   <button class="btn btn-light rounded-circle float-right"> <i class="fas fa-plus"></i>   </button>
   <button class="btn btn-light rounded-circle float-right"> <i class="fas fa-plus"></i>   </button>
   <button class="btn btn-light rounded-circle float-right"> <i class="fas fa-plus"></i>   </button>


</div>

      
      <div class="row col-sm-12 " id="list" >




<div class="col col-sm-6">


  <div class="container-fluid borde-burble border  ">




   <h3 align="left"> <a href="">  <strong> NOMBRE PROYECTO</strong> </a>    <small class="comentarios-proyecto float-right" aling="right">Comentarios basicos de cada proyecto general</small> </h3>






   <h6 align="left"><strong>EMPRESA</strong> <small class="float-right text-info" aling="right"> <strong>  12/02/2018</strong>   </small> </h6>


<div class="container-fluid   ">


<p class="border  tarea container-fluid"  align="left">


<i class="fas fa-stop"></i>


<a href="">
Nombre de tarea  
</a>

<i class="fas fa-circle text-danger"  title="Estado"></i>  <i class="far fa-user-circle text-info"></i> <i class="far fa-image"></i>
comentarios sobre esta tarea
</p>
  
<p class="border tarea container-fluid"  align="left">
<i class="fas fa-stop"></i>
<a href="">
Nombre de tarea  
</a> <i class="fas fa-circle text-danger" title="Estado"></i>  <i class="far fa-user-circle text-info"></i> <i class="far fa-image"></i>
comentarios sobre esta tarea
</p>
  
<p class="border  tarea container-fluid text-secondary"  align="left">
<i class="fas fa-stop"></i>
<a href="">
Nombre de tarea  
</a> <i class="fas fa-circle text-danger" title="Estado"></i>  <i class="far fa-user-circle text-info"></i> <i class="far fa-image"></i>
comentarios sobre esta tarea
</p>




</div>

<!-- IMAGENES -->


<!-- BOTONES-->
<div class="float-right button-collapse btn btn-light " id="button-collapse"  data-toggle="collapse" href="#collapseExample" role="button">

<i style="font-size: 12px" class="fas fa-chevron-down"></i>

</div>



<div class="float-right button-collapse btn btn-light " id="button-collapse"     data-toggle="collapse" href="#collapseExample" role="button">



<i style="font-size: 12px" class="fas fa-plus-circle"></i>



</div>






<div class="container-fluid collapse" id="collapseExample">

​<img width="120" src="img/pieza.png" class="img-fluid  " alt="...">
<img width="120" src="img/pieza.png" class="img-fluid  " alt="...">
<img width="120" src="img/pieza.png" class="img-fluid  " alt="...">
<img width="120" src="img/pieza.png" class="img-fluid  " alt="...">

</div>

<!-- IMAGENES -->
</div> <!-- CIERRE PROYECTO -->
</div>






<div class="col-sm-12">
  <hr>
</div>


<!-- SUBPROYECTOS -->
<div  class="row col-sm-12 " id="list" >


<!-- TARJETA -->

<div class="col-sm-3">
<div class="card borde-burble" >

   <div class="card-header">
<h6   class="proyecto-min">NOMBRE PROYECTO</h6>
  </div>


<div id="demo" class="carousel slide card-img-top " data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/pieza.png"  width="150" >
  <div class="carousel-caption d-none d-md-block">
 
    tarea


  </div>
    </div>
    <div class="carousel-item">
  <img src="img/pieza.png"  width="150" >

  <div class="carousel-caption d-none d-md-block">
  
    tarea


  </div>


    </div>

   <div class="carousel-item">
     <img src="img/pieza.png"   width="150" >


  <div class="carousel-caption d-none d-md-block">
   

    tarea

  </div>

    </div>



  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev " href="#demo" data-slide="prev">
 <i class="fas fa-chevron-left text-dark" ></i>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
<i class="fas fa-chevron-right text-dark"></i>
  </a>
</div>



<div class="card-body">
<p align="Left" class="text-sm-left">Aqui se introduciran comentarios sobre este proyecto.</p>

</div>





</div>

</div>
<!-- TARJETA -->



<!-- TARJETA -->

<div class="col-sm-3">
<div class="card borde-burble" >

   <div class="card-header">
<h6   class="proyecto-min">NOMBRE PROYECTO</h6>
  </div>


<div id="demo" class="carousel slide card-img-top " data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/pieza.png" alt="Los Angeles" width="150" >
  <div class="carousel-caption d-none d-md-block">
 
    tarea


  </div>
    </div>
    <div class="carousel-item">
  <img src="img/pieza.png" alt="Los Angeles" width="150" >

  <div class="carousel-caption d-none d-md-block">
  
    tarea


  </div>


    </div>

   <div class="carousel-item">
     <img src="img/pieza.png" alt="Los Angeles" width="150" >


  <div class="carousel-caption d-none d-md-block">
   

    tarea

  </div>

    </div>



  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev " href="#demo" data-slide="prev">
 <i class="fas fa-chevron-left text-dark" ></i>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
<i class="fas fa-chevron-right text-dark"></i>
  </a>
</div>



<div class="card-body">
<p align="Left" class="text-sm-left">Aqui se introduciran comentarios sobre este proyecto.</p>

</div>
</div>
</div>
<!-- TARJETA -->


<!-- TARJETA -->

<div class="col-sm-3">
<div class="card borde-burble" >

   <div class="card-header">
<h6   class="proyecto-min">NOMBRE PROYECTO</h6>
  </div>


<div id="demo" class="carousel slide card-img-top " data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/pieza.png" alt="Los Angeles" width="150" >
  <div class="carousel-caption d-none d-md-block">
 
    tarea


  </div>
    </div>
    <div class="carousel-item">
  <img src="img/pieza.png" alt="Los Angeles" width="150" >

  <div class="carousel-caption d-none d-md-block">
  
    tarea


  </div>


    </div>

   <div class="carousel-item">
     <img src="img/pieza.png" alt="Los Angeles" width="150" >


  <div class="carousel-caption d-none d-md-block">
   

    tarea

  </div>

    </div>



  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev " href="#demo" data-slide="prev">
 <i class="fas fa-chevron-left text-dark" ></i>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
<i class="fas fa-chevron-right text-dark"></i>
  </a>
</div>



<div class="card-body">
<p align="Left" class="text-sm-left">Aqui se introduciran comentarios sobre este proyecto.</p>

</div>
</div>
</div>
<!-- TARJETA -->




<!-- TARJETA -->

<div class="col-sm-3">
<div class="card borde-burble" >

   <div class="card-header">
<h6   class="proyecto-min">NOMBRE PROYECTO</h6>
  </div>


<div id="demo" class="carousel slide card-img-top " data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/pieza.png" alt="Los Angeles" width="150" >
  <div class="carousel-caption d-none d-md-block">
 
    tarea


  </div>
    </div>
    <div class="carousel-item">
  <img src="img/pieza.png" alt="Los Angeles" width="150" >

  <div class="carousel-caption d-none d-md-block">
  
    tarea


  </div>


    </div>

   <div class="carousel-item">
     <img src="img/pieza.png" alt="Los Angeles" width="150" >


  <div class="carousel-caption d-none d-md-block">
   

    tarea

  </div>

    </div>



  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev " href="#demo" data-slide="prev">
 <i class="fas fa-chevron-left text-dark" ></i>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
<i class="fas fa-chevron-right text-dark"></i>
  </a>
</div>



<div class="card-body">
<p align="Left" class="text-sm-left">Aqui se introduciran comentarios sobre este proyecto.</p>

</div>
</div>
</div>
<!-- TARJETA -->




  </div>





 </div> </div>



    </body>
</html>
