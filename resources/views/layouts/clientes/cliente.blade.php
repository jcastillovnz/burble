@extends('layouts.app')

@section('content')





<div  id="AppClientes"  class="content">



<div class="col-sm-12">
<div style="padding-left: 1%;  font-size: 17px;" align="left" class="">
<i class="fas fa-user-cog text-info"></i>
Datos de cliente


<button title="Nueva tarea" class="btn btn-light  rounded-circle float-right " data-toggle="modal" data-target=".nuevaTarea"> <i class="fas fa-plus"></i> </button>


<input value="{{$cliente->id }}"  id="cliente_id" class="invisible" >

</div>





</div>


<div    class="col-sm-12">



<form method="GET" class="container-fluid" role="form"  v-on:submit.prevent="update_proyecto()"  >

<div class="row">

<div class="col-sm-4">


<div class="input-group mb-3">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user"></i>
</span>
</div>


<input type="text" :disabled="state == 0"    class="form-control input-sm"   placeholder="Nombre empresa">
</div>


 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" :disabled="state == 0"    class="form-control input-sm input"   placeholder="Sitio web" >
  </div>



 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" :disabled="state == 0"    class="form-control input-sm"   placeholder="Ciudad">
  </div>


 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input  :disabled="state == 0"      title="Presupuesto" type="text"     class="form-control input-sm input" placeholder="Pais">


  </div>



<div class="input-group mb-3">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text ">
<i class="fas fa-user"></i>
</span>
</div>
   
  <input  :disabled="state == 0"      title="Presupuesto" type="text"     class="form-control input-sm input" placeholder="Telefono">


  </div>





<div class="col-sm-12">
<div class="btn-group float-right">

<div  id="loader-details-proyecto"   class="loader loader-sm loader-tarea"></div>


<button type="button" v-on:click="edicion()"  title="Editar" class="btn btn-light  btn-sm float-right" >
<i class="fas fa-pen-square"></i>
</button>



<button type="submit" id="btn-details-proyecto" :disabled="state == 0"    title="Guardar" class="btn btn-success  btn-sm" >
<i class="fas fa-save"></i>
</button>



</div>
</div>




</div>






<div class="col-sm-8 ">









<div class="table-responsive">
<template   >

<center>
<i class="fas fa-exclamation-circle text-warning"></i>
<strong>
No existen contactos en este cliente!

</strong>
</center>

</template>


<template   v-else >



  <table  class="table table-borderless">
    <thead>
      <tr  >
        <th>#</th>
        <th>Imagen</th>
        <th>Tareas</th>
        <th>Tipo</th>
        <th>Prioridad</th>
        <th>Empleado</th>
        

      </tr>
    </thead>




    <tbody>




      <tr  >
        <td> ID       </td>
         <td>  

       

<img  v-if="tarea.imagen" class="zoom" width="50" height="50"   :src="'{{url ('/img/tareas/fotos/')}}'+'/' +tarea.imagen" alt="Card image cap">


<img width="50" height="50" v-else class="zoom" src="{{url ('img/pieza.png')}} " alt="Card image cap">
</td>

        <td>  NOMBRE   </td>
        <td>  NOMBRE     </td>
        <td> NOMBRE </td>
         <td> NOMBRE </td>
        
        <td>
<div class="dropdown">
<button class="btn btn-light btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown">
<i class="fas fa-cogs"></i></button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


<a class="dropdown-item"   v-on:click="show(tarea)"  >Detalle</a>

<a class="dropdown-item"  v-on:click="eliminar(tarea)"  > Eliminar</a>

</div>
</div>  
</td>
</tr>



</tbody>
</table>



</div>

<hr>
 












</template>



</div>






</div>




</div>




</form>


</div>





@endsection
