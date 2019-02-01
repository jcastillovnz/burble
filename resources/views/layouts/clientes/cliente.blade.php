@extends('layouts.app')

@section('content')





<div  id="AppClientes"  class="content">
@include('layouts.clientes.create')



<div class="col-sm-12">
<div style="padding-left: 1%;  font-size: 17px;" align="left" class="">





<input value="{{$cliente->id}}"  id="cliente_id" class="invisible" >

</div>






</div>


<div    class="col-sm-12">



<form method="GET" class="container-fluid" role="form"  v-on:submit.prevent="update()"  >

<div class="row">

<div class="col-sm-4">



<center>
<i class="fas fa-user-cog text-info"></i>
Datos de cliente
</center>




<div class="input-group mb-3">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user"></i>
</span>
</div>

 
<input type="text" :disabled="state == 0"  v-model="cliente.nombre"  class="form-control input-sm"   placeholder="Nombre empresa">
</div>


 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" :disabled="state == 0"  v-model="cliente.sitio_web"   class="form-control input-sm input"   placeholder="Sitio web" >
  </div>



 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" :disabled="state == 0"   v-model="cliente.ciudad"     class="form-control input-sm"   placeholder="Ciudad">
  </div>


 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input  :disabled="state == 0"      title="Presupuesto" type="text"   v-model="cliente.pais"      class="form-control input-sm input" placeholder="Pais">


  </div>



<div class="input-group mb-3">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text ">
<i class="fas fa-user"></i>
</span>
</div>
   
  <input  :disabled="state == 0"      title="Presupuesto" type="text"   v-model="cliente.telefono"   class="form-control input-sm input" placeholder="Telefono">
  </div>





<div class="col-sm-12">
<div class="btn-group float-right">

<div  id="loader-edicion-cliente"   class="loader loader-sm "></div>




<button type="button" v-on:click="edicion()"  title="Editar" class="btn btn-light  btn-sm float-right" >
<i class="fas fa-pen-square"></i>
</button>




<button type="submit" id="btn-edicion-cliente" :disabled="state == 0"    title="Guardar" class="btn btn-success  btn-sm" >
<i class="fas fa-save"></i>
</button>



</div>
</div>




</div>






<div class="col-sm-8 ">







<div class="table-responsive">
<template  v-if="contactos.length == 0"   >

<center>
<i class="fas fa-exclamation-circle text-warning"></i>
<strong>
No existen contactos en este cliente!

</strong>
</center>

</template>


<template   v-else >

<p> <i class="fas fa-phone-square text-info"></i> Datos de Contactos  



<button title="Nuevo contacto" type="button" @click="nuevoContacto(cliente)"   class="btn btn-light  rounded-circle float-right " > <i class="fas fa-plus"></i></button>



</p>

  <table  class="table table-borderless">
    <thead>
      <tr  >
        <th>#</th>
      
        <th> Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Email</th>
        

      </tr>
    </thead>




    <tbody>




      <tr v-for="(item, key) in contactos"   >
        <td>  @{{item.id}}     </td>
        <td>  @{{item.nombre}}   </td>
        <td>  @{{item.apellido}}    </td>
        <td> @{{item.telefono}}</td>
         <td> @{{item.email}}</td>


        
        <td>
<div class="dropdown">
<button class="btn btn-light btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown">
<i class="fas fa-cogs"></i></button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


<a class="dropdown-item"   v-on:click="show_Contacto(item)"  >Detalle</a>

<a class="dropdown-item"  v-on:click="eliminar_contacto(item)"  > Eliminar</a>

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
@include('layouts.clientes.contactos.create')
@include('layouts.clientes.contactos.edit')



</div>






@endsection