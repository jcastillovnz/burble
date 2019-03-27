@extends('layouts.app')

@section('content')



<div class="col-sm-12">



<div  style="margin: 0px;  margin-top: 0px;"  id="AppClientes"  class="content">
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



<p align="left" style="font-size: 18px;"><i class="fas fa-suitcase"></i> 
<strong>Informacion de cliente</strong>
</p>



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






<div   class="col-sm-8 ">



  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#nav_proyectos">Proyectos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#nav_contactos">Contactos</a>
    </li>
 
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="nav_proyectos" class="container tab-pane active">

<p  style="font-size: 18px; ">       <h4 align="left" style="font-size: 18px;">Proyectos</h4>

<button title="Nuevo proyectos" type="button"    class="btn btn-light  rounded-circle float-right " > <i class="fas fa-plus"></i></button>

</p>


@include('layouts.clientes.proyectos.index')




    </div>
    <div id="nav_contactos" class="container tab-pane fade">

<p  style="font-size: 18px; ">       <h4 align="left" style="font-size: 18px;">Contactos</h4>
<button title="Nuevo contacto" type="button" @click="nuevoContacto(cliente)"   class="btn btn-light  rounded-circle float-right " > <i class="fas fa-plus"></i></button>
</p>



@include('layouts.clientes.contactos.index')

    


    </div>

  </div>






</div>




</div>




</form>



@include('layouts.clientes.contactos.create')
@include('layouts.clientes.contactos.edit')



</div>






@endsection