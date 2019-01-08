@extends('layouts.app')

@section('content')





<div id="AppProyectos"    class="content " >
<template id="listas">

<div  class="col-sm-12">
<strong class="float-left"></i>Proyectos en proceso   <p> 

</p></strong> 

<button title="Nuevo proyecto" class="btn btn-light  rounded-circle float-right " data-toggle="modal" data-target=".nuevoProyecto"> <i class="fas fa-plus"></i>   </button>
</p>
</div>


<div   id="lista_proceso"  class="col-sm-12 row ">



<template   v-sortable="{ onUpdate: onUpdate }">

<div   :id="item.proyectos_id"  v-for="item in lista_principal"  class="col-sm-6 item_proceso">
<div   class="container-fluid      borde-burble border bg-light">
<p>
<h4 class="proyecto-min" align="left"> 
<a href="">  
<strong >  

     @{{item.nombre_proyecto}}
</strong></a>    
<small class="comentarios-proyecto float-right" aling="right">     
 @{{item.comentario}} 
</small> 
</h4>
</p>
<h6 class="empresa-min" align="left"><strong>  @{{item.nombre_empresa}}  </strong> <small class="float-right text-info" aling="right"> <strong>  @{{item.fecha_entrega}}  </strong></small></h6>
<div class="container-fluid   ">
<p class="border  tarea container-fluid"  align="left">
<i class="fas bar float-left"></i>
<a href="">
Nombre de tarea  
</a>
<i class="fas fa-circle text-danger"  title="Estado"></i>  <i class="far fa-user-circle text-info"></i> <i class="far fa-image"></i>
comentarios sobre esta tarea
</p>
<p class="border tarea container-fluid"  align="left">



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


<div class="btn-group float-right" >

<div class="button-collapse btn btn-light border border-dark"   id="button-collapse" data-toggle="collapse" v-bind:href="'#collapseExample'+ item.id"  aria-expanded="false" aria-controls="collapseExample" role="button">
<i style="font-size: 12px" class="fas fa-chevron-down" ></i>
</div>

<div class=" btn btn-light border border-dark" aria-expanded="false" id="button-collapse">
<i  style="font-size: 12px" class="fas fa-pen-square"></i>
</div>

<div class="button-collapse btn btn-light border border-dark" aria-expanded="false"  id="button-collapse"  data-toggle="modal" data-target=".nuevaTarea"  role="button">
<i style="font-size: 12px" class="fas fa-plus-circle"></i>
</div>



<div v-on:click="delete_principal(item.proyectos_id)"   class=" btn btn-light border border-dark" aria-expanded="false" id="button-collapse">
<i  style="font-size: 12px" class="fas fa-trash"></i>
</div>




</div>


<hr class="invisible">
<div class="collapse " v-bind:id="'collapseExample'+ item.id">
<div class="col-sm-12 img-group">

<div class="text-center">
<img width="120"  src="img/pieza.png" class="img-fluid" alt="...">
<img width="120"  src="img/pieza.png" class="img-fluid" alt="...">
<img width="120"  src="img/pieza.png" class="img-fluid" alt="...">
<img width="120"  src="img/pieza.png" class="img-fluid" alt="...">
</div>


</div>



</div>
<br>
</template>

</div>

<!-- CIERRE PROYECTO -->
<!-- PROYECTO -->

</div>








<div class="col-sm-12">
<p align="left"><strong> Proyectos en espera</strong></p>



<hr>
</div>





<!-- SUBPROYECTOS -->



<div   id="lista_espera"  class="row col-sm-12 "   >
<!-- TARJETA -->
<template v-if="lista_espera.length <=  0">
<div  class="col-sm-3">
<div class="card borde-burble alert-warning" >
<div class="container alert ">
<p align="center">
<h6> <strong> <i class="fas fa-exclamation-circle"></i> No hay proyectos en espera </strong>  </h6>
</p>
</div>
</div>
<div class="btn-group float-right button-absolute " >
<div    data-toggle="modal" data-target=".nuevoProyecto" class=" btn btn-light border border-dark btn-sm rounded-circle"  >
<i style="font-size: 13px;" class="fas fa-plus-circle"></i>
</div>
</div>
</div>
<!-- TARJETA -->
</template>





<template   v-sortable="{ onUpdate: onUpdate }">
<div   :id="item.proyectos_id" v-bind:value="item.proyectos_id"    v-for="item in lista_espera"   class="col-sm-3 item_espera">

 
<div class="card borde-burble bg-light item " >
<div class="container " >
<p align="left">
<a  href="">
<strong class="proyecto-min">
@{{item.nombre_proyecto}}    ID:  @{{item.proyectos_id}}
</strong>
</a>

<p class="empresa-min" align="left">
 <strong> @{{item.nombre_empresa}} </strong> 
</p>
</p>
</div>
<div class="container" align="left ">
Tareas
</div>
<div class="container" >
<p class="" align="right">
<small>
 <strong>  @{{item.fecha_entrega}}  </strong> 
</small>
</p>
</div>
</div>
<div class="btn-group float-right button-absolute" >
<div v-on:click="delete_espera(item.proyectos_id)"  class="button-collapse btn btn-light border border-dark btn-sm rounded-circle"  >
<i class="fas fa-trash"></i>
</div>
</div>

</div>
 </template><!--LISTADO TERMINA-->


<!-- TARJETA -->



</template>







<!-- MODAL NUEVO PROYECTO  -->
<div   class="modal fade nuevoProyecto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-sm-8">
 
    <div id="AppProyectos"   class="modal-content">
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
<option value="">Seleccione un cliente</option>



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
<div id="carga-proyecto" class="loader loader-sm "></div>
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
<div  class="loader loader-sm"></div>


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
