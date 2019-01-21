@extends('layouts.app')

@section('content')


<script src="{{ asset('js/detalle.js') }}" defer></script>


<div  id="DetalleProyecto"  class="content">

<div class="col-sm-12">
<div style="padding-left: 1%; " align="left" class="text-info">
<h5><i class="fas fa-user-cog"></i>
Detalle de proyecto
</h5>

<input value="{{$proyecto->id}}"  id="proyecto_id" class="invisible" >

</div>
</div>





<div    class="col-sm-12">



<form method="GET" class="container-fluid" role="form"  v-on:submit.prevent="sumbit_datos()"  >

<div class="row">




<div class="col-sm-5">
<div class="input-group mb-3">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user"></i>
</span>
</div>
<input type="text" disabled=""  class="form-control input-sm"  
v-model="cliente"   placeholder="Cliente">
</div>






<div class="input-group mb-3">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user"></i>
</span>
</div>


<input type="text" :disabled="state == 0"  v-model="proyecto.nombre"  class="form-control input-sm"   placeholder="Nombre">
</div>


 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" :disabled="state == 0"   v-model="proyecto.fecha_recepcion"  class="form-control input-sm input"   placeholder="fecha recepcion" >
  </div>



 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" :disabled="state == 0"  v-model="proyecto.fecha_entrega"  class="form-control input-sm"   placeholder="fecha entrega">
  </div>


 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input  :disabled="state == 0"   v-model="proyecto.presupuesto"   title="Presupuesto" type="text"     class="form-control input-sm input" placeholder="Presupuesto">


  </div>



<div class="input-group mb-3">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text ">
<i class="fas fa-user"></i>
</span>
</div>
   


<textarea   :disabled="state == 0" v-model="proyecto.comentario"   placeholder="Comentario" class="form-control" rows="5"></textarea>


  </div>



  
</div>






<div class="col-sm-6 ">
<p align="left"  class="text-center">
Tareas 
</p>



  <table class="table table-borderless">
    <thead>
      <tr  >
  
        <th>Tareas</th>
        <th>Tipo</th>
        <th>Prioridad</th>
        <th>Estado</th>
        <th>Empleado</th>
      </tr>
    </thead>
    <tbody>


      <tr v-for="tarea  in tareas" >
        <td> @{{tarea.nombre}} </td>
        <td>  @{{tarea.tipo}}    </td>
         <td> @{{tarea.prioridad}}     </td>
        <td>     </td>
        <td>
<div class="dropdown">
<button class="btn btn-light btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown">
<i class="fas fa-cogs"></i></button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" v-on:click="add_espera(proyecto)"  >Enviar a espera</a>
<a class="dropdown-item" v-on:click="show(proyecto)"  >Detalles</a>
<a class="dropdown-item"  v-on:click="eliminar(proyecto)"  > Eliminar</a>
</div>
</div>  
</td>
</tr>



</tbody>
</table>








</div>




<div class="col-sm-12">
<div class="btn-group float-right">

<div  id="loader-user"   class="loader loader-sm loader-tarea"></div>


<button type="button" v-on:click="edicion()"  title="Editar" class="btn btn-light  btn-sm float-right" >
<i class="fas fa-pen-square"></i>
</button>



<button type="submit" id="btn-user" :disabled="state == 0"    title="Guardar" class="btn btn-success  btn-sm" >
<i class="fas fa-save"></i>
</button>



</div>
</div>


</div>




</div>




</form>


</div>







@endsection
