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
    <body>
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
                <div class="title m-b-md">
                    Burble



                </div>

                <div class="row col-sm-12 " id="list" >


           
   





<div class="col col-sm-6">


  <div class="container-fluid rounded border border-secondary ">
   <h3 align="left"><strong> NOMBRE PROYECTO</strong> <small class="comentarios-proyecto" aling="right">Comentarios basicos de cada proyecto</small> </h3>

   <h6 align="left"><strong>EMPRESA</strong> <small class="float-right text-info" aling="right">  12/02/2018   </small> </h6>


<div class="container-fluid   ">
    <p class="border  container-fluid"  align="left">
<i class="fas fa-briefcase"></i>
Nombre de tarea  <i class="fas fa-circle"></i>  <i class="far fa-user-circle"></i> <i class="far fa-image"></i>

comentarios sobre esta tarea

</p>
</div>

<!-- IMAGENES -->
<div class="float-right button-collapse btn btn-light " id="button-collapse"  data-toggle="collapse" href="#collapseExample" role="button">

<i class="fas fa-sort-down "></i>

</div>

<div class="container-fluid collapse" id="collapseExample">

​<img src="img/img.png" class="img-fluid img-thumbnail" alt="...">
<img src="img/img.png" class="img-fluid img-thumbnail" alt="...">
<img src="img/img.png" class="img-fluid img-thumbnail" alt="...">
<img src="img/img.png" class="img-fluid img-thumbnail" alt="...">

</div>

<!-- IMAGENES -->
</div> <!-- CIERRE PROYECTO -->



</div>


<br>
<hr>

<!-- SUBPROYECTO -->
<div  class="row col-sm-10 " id="list" >

<div class="col-sm-2">
<div class="container-fluid border rounded border-secondary">
<p class="margin-bottom-none" align="left">
   <strong>  PROYECTO </strong> 
    
</p>

<p class="margin-bottom-none" align="left" class="name-empresa-espera">
 <small class="">EMPRESA</small>   
</p>


<p>Tarea</p>


<p><small>  1/02/2018</small></p>

</div>

</div>









</div>

<!-- FREEZE-->
<div  class="col-sm-2  ">


<div class="container-fluid border  rounded border-secondary">


<p>
FREEZE
</p>


<p>
UNFREEZE
</p>



</div>
</div>

<!-- FREEZE-->







  </div>









    </body>
</html>
