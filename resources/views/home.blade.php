@extends('layouts.app')

@section('content')





<div id="AppProyectos"    class="content " >


<div      class="col-sm-12">




<button class="btn btn-light rounded-circle float-right " data-toggle="modal" data-target=".nuevoProyecto"> <i class="fas fa-plus"></i>   </button>
</div>



<div     class="col-sm-12 row">



<div v-for="item in lists"   class="col-sm-6">
<div class="container-fluid borde-burble border  ">
<h3 align="left" class="titulo-principal" > <a href="">  <strong >   @{{item.nombre}}  </strong> </a>    <small class="comentarios-proyecto float-right" aling="right">@{{item.comentario}}</small> </h3>

<h6 align="left"><strong>EMPRESA</strong> <small class="float-right text-info" aling="right"> <strong>  12/02/2018</strong></small></h6>
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
<div class="float-right btn-group " >
<div class="float-right button-collapse btn btn-light "   id="button-collapse" data-toggle="collapse" href="#collapseExample" role="button">
<i style="font-size: 12px" class="fas fa-chevron-down"></i>
</div>
<div class="float-right  btn btn-light "  id="button-collapse">
<i  style="font-size: 12px" class="fas fa-pen-square"></i>
</div>
<div class="float-right button-collapse btn btn-light " id="button-collapse"  data-toggle="modal" data-target=".nuevaTarea"  role="button">
<i style="font-size: 12px" class="fas fa-plus-circle"></i>
</div>
</div>
<!-- BOTONES-->

<div  class="collapse " id="collapseExample">
<div class="center">
​<img width="120" src="img/pieza.png" class="img-fluid" alt="...">
<img width="120" src="img/pieza.png" class="img-fluid" alt="...">
<img width="120" src="img/pieza.png" class="img-fluid" alt="...">
<img width="120" src="img/pieza.png" class="img-fluid" alt="...">

</div>
</div>
<!-- IMAGENES -->
</div> 
</div>
<!-- CIERRE PROYECTO -->




<!-- PROYECTO -->









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

<!-- 

<div class="card-body">

</div>
 -->

<div class="btn-group">
<button class="btn btn-danger float-right btn-sm" ><i class="far fa-trash-alt"></i></button>
<button class="btn btn-light float-right btn-sm" ><i class="fas fa-snowflake"></i></button>
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

<!-- 

<div class="card-body">

</div>
 -->

<div class="btn-group">
<button class="btn btn-light float-right" >x</button>
<button class="btn btn-light float-right" >x</button>
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

<!-- 

<div class="card-body">

</div>
 -->

<div class="btn-group">
<button class="btn btn-light float-right" >x</button>
<button class="btn btn-light float-right" >x</button>
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

<!-- 

<div class="card-body">

</div>
 -->

<div class="btn-group">
<button class="btn btn-light float-right" >x</button>
<button class="btn btn-light float-right" >x</button>
</div>

</div>
</div>
<!-- TARJETA -->




<!-- MODAL NUEVO PROYECTO  -->
<div     class="modal fade nuevoProyecto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-sm-8">
 
    <div    class="modal-content">
<form method="GET" class="hidden" role="form"  v-on:submit.prevent="submit(this)"  >
   <div class="modal-header ">

<div class="col-sm-12 text-primary">
<i class="fas fa-cube"></i>
<strong>
Registrar un nuevo proyecto
</strong>
<button type="button" class="close float-right" data-dismiss="modal">&times;</button>
</div>
</div>



<div  class="modal-body">

 <div class="input-group col-sm-12">
<div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i  class="fas fa-briefcase"></i> </span>
    </div>
 
<select required="" autocomplete="off"  v-model="cliente" class="form-control">

<option value="" selected="">Cliente / Empresa</option>

@if ( isset($clientes)==true   )

@foreach( $clientes as $cliente)
<option value="{{$cliente->id}}"  > {{$cliente->nombre}}</option>
@endforeach


@else
<option value="">Registre un cliente</option>



@endif
</select>

</div>
 <div class="input-group  col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-cube"></i></span>
</div>
<input  autocomplete="off" required="" v-model="proyecto" type="text" class="form-control" placeholder="Nombre de proyecto">
</div>



<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-clock"></i>  </span>
</div>
<input  autocomplete="off" required="" v-model="fecha_entrega" type="date" class="form-control" placeholder="Fecha de entrega">
</div>


<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-dollar-sign"></i>   </span>
</div>
<input  autocomplete="off" required="" v-model="presupuesto" type="number" min="100" max="5000000"   class="form-control" placeholder="Presupuesto">
</div>


<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text"><i class="fas fa-comments"></i> </span>
</div>
<textarea autocomplete="off" required="" v-model="comentario" class="form-control" placeholder="Comentarios..."></textarea>
</div>
 </div>


<div  class="modal-footer">
<div  class="btn btn-group  ">
<div id="loader-sm" class="loader loader-sm "></div>
<button class="btn btn-light btn-sm " type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>

<button type="submit"  id="btn-proyecto" class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>


</form>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL NUEVO PROYECTO  -->





<!-- MODAL NUEVA TAREA -->
<div class="modal fade nuevaTarea" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-sm-8">
 
    <div class="modal-content">
   <div class="modal-header ">
    
<div class="col-sm-12 text-primary">
<i class="fas fa-suitcase"></i>
<strong>
Registrar un nueva tarea

</strong>
<button type="button" class="close float-right" data-dismiss="modal">&times;</button>
</div>

      </div>

<div class="modal-body">
<div class="input-group  col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-cube"></i></span>
</div>
<input type="text" class="form-control" placeholder="Nombre de tarea">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-project-diagram"></i>
</span>
</div>
<select class="form-control">
<option selected="" value="">Tipo de tarea</option>
<option value="Imagen">Imagen</option>
<option value="Proceso">Proceso</option>
<option value="Cambio">Cambio</option>
</select>
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="far fa-chart-bar"></i>  </span>
</div>
<select class="form-control">
<option>Prioridad</option>
<option>Alta / Rojo</option>
<option>Media / Amarillo</option>
<option>Baja / Verde</option>
</select>
</div>
 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">

        <i class="fas fa-cog"></i> 
         </span>
    </div>
    <input type="text" class="form-control" placeholder="Estado">
  </div>

 <div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-shield"></i>  </span>
</div>
<select class="form-control">
<option>Asignar a empleado</option>
</select>
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-dollar-sign"></i>   </span>
</div>
<textarea class="form-control"  placeholder="comentarios"></textarea>
</div>
<div class="modal-footer">
<div class="btn btn-group  ">
<div id="loader-sm" class="loader loader-sm "></div>
<button class="btn btn-light btn-sm " type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>
<button class="btn btn-success btn-sm" type="button"  >
<i class="fas fa-save"></i>
</button>
</div>
</div>
</div>
</div>
</div>

<!-- MODAL NUEVA TAREA -->

</div>


































@endsection
