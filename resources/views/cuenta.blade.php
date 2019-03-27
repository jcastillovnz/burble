@extends('layouts.app')

@section('content')

<script src="{{ asset('js/mi_cuenta.js') }}" defer></script>

<div id="AppClientes"    class="container col-sm-12 " >
@include('layouts.clientes.create')
</div>

  


<div  id="Mi_cuenta"  class="">

<div class="col-sm-12">
<div style="padding-left: 1%; font-size: 18px; " align="left" class="container">
<strong>
Mi cuenta
</strong>
</div>
</div>





<div    class="col-sm-12">
<form method="GET" class="container-fluid" role="form"  v-on:submit.prevent="update_user()"  >

<div class="row">
<div class="col-sm-4 ">
<div style="margin-top: 5%; " class="">
<center>
<img  v-if="foto_user"   width="180" height="180" class="border rounded-circle "  :src="'/img/users/fotos/'+foto_user" alt="">


<img  v-else   width="180" height="180" class="border rounded-circle "  :src="preview" >


<input ref="foto_perfil" type="file"  @change="cargar_foto(this)" value="" class="invisible"  name="">
</center>

<div  class="card-img-overlay float-right">

<button  type="button"  @click="$refs.foto_perfil.click()"  class="btn btn-info btn-sm rounded-circle boton-overlay"><i class="fas fa-sync"></i>
</button>


</div>


<div class="input-group mb-2">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user"></i>
</span>
</div>
<input type="text" :disabled="state_user == 0"  class="form-control input-sm"   v-model="nombre" placeholder="Nombre">
</div>




 <div class="input-group mb-2">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text"  :disabled="state_user == 0"  class="form-control input-sm input" v-model="apellido"  placeholder="Apellido">
  </div>



 <div class="input-group mb-2">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text"  :disabled="state_user == 0"  class="form-control input-sm" v-model="alias"  placeholder="Alias">
  </div>


 <div class="input-group mb-2">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input title="Fecha nacimiento" type="text" :disabled="state_user == 0"   v-model="fecha_nacimiento"  class="form-control input-sm input" placeholder="Fecha de nacimiento">
  </div>



 <div class="input-group mb-2">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text ">
 <i class="fas fa-user"></i>
         </span>
    </div>
   


<input readonly=""  type="" :disabled="state_user == 0"  v-model="rango"  class="form-control input-sm" placeholder="Rango" name="">



  </div>



<div class="input-group mb-2">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-envelope"></i>
         </span>
    </div>
    <input required="" title="Email" type="text" v-model="email"  class="form-control input-sm" :disabled="state_user == 0" placeholder="Email">
  </div>



 <div class="input-group mb-2">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" class="form-control input-sm" :disabled="state_user == 0"   v-model="cuit"  placeholder="Cuit">
  </div>



 <div class="input-group mb-2">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" :disabled="state_user == 0" v-model="direccion"  class="form-control input-sm" placeholder="Direccion">
  </div>


 <div class="input-group mb-2">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input title="Obra social" type="text" :disabled="state_user == 0" class="form-control input-sm" v-model="obra_social" placeholder="Obra social">
  </div>



 <div class="input-group mb-2">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input title="Fecha nacimiento" type="text" v-model="servicio_ambulancia"  class="form-control input-sm" :disabled="state_user == 0" placeholder="Servicio de ambulancia">
  </div>


 <div class="input-group mb-2">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>


  <input type="text" class="form-control input-sm " :disabled="state_user == 0"  v-model="contacto_ambulancia"   placeholder="Telefono servicio ambulancia">
  </div>


  

<div class="input-group mb-2">
<div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-key"></i>
         </span>
    </div>
    <input  title="Contraseña" type="password" v-model="password"  class="form-control input-sm" :disabled="state_user == 0" placeholder="Contraseña">
  </div>

<div class="btn-group float-right">
<div  id="loader-user"   class="loader loader-sm loader-tarea"></div>
<button type="button" v-on:click="edicion_user()"  title="Editar" class="btn btn-light  btn-sm float-right" >
<i class="fas fa-pen-square"></i>
</button>
<button type="submit" id="btn-user" :disabled="state_user == 0"  title="Guardar" class="btn btn-success  btn-sm" >
<i class="fas fa-save"></i>
</button>
</div>




</div>
</div>






<div  id="Mi_cuenta"     class="col-sm-8 ">
<p align="left">
<strong>
 Mis proyectos
</strong>
</p>






<div    class="table  table-responsive" >
<table   class="table table-lg table-borderless table-hover">
<thead>
<tr >

<th scope="col" >Nombre</th>
<th scope="col">Cliente</th>
<th scope="col">Fecha recepcion</th>
<th scope="col">Fecha entrega</th>
<th scope="col">Accion</th>

</tr>
</thead>
<tbody >
<tr   v-for="(proyecto, key) in proyectos"  >

<td> 
@{{ proyecto.nombre}}
</td>

<td> 
@{{ proyecto.clientes.nombre}}
</td>

<td> 
@{{ proyecto.fecha_recepcion}}
</td>
<td>
@{{ proyecto.entrega}}
</td>

<td>
<div align="right" class="dropdown">
<button class="btn btn-light btn-sm " type="button"  data-toggle="dropdown"  >
<i class="fas fa-cogs"></i>
</button>
<div class="dropdown-menu" >


<a class="dropdown-item" v-on:click.prevent="mostrar_proyecto(proyecto)">Detalles</a>  

</div>
</div>
</td>
</tr>
</tbody>
</table>




<hr>


<!-- NAVS -->

<nav aria-label="Page navigation example ">
  
<ul class="pagination pagination-sm justify-content-center">
<li v-if="pagination.current_page >1"  class="page-item ">  
<a  @click.prevent="changePage(pagination.current_page - 1)"  class="page-link"  href=""><i class="fas fa-chevron-left"></i></a>
</li>


<li v-for="page in  pagesNumber"  v-bind:class="'page-item '+[page== isActived ?  'active': '' ]  "    >  
<a @click.prevent="changePage(page)"    class="page-link"  href="">
@{{page}}
</a>
</li>


<li v-if="pagination.current_page <pagination.last_page"   class="page-item">  
<a @click.prevent="changePage(pagination.current_page + 1)"   class="page-link"  href=""><i class="fas fa-chevron-right"></i></a>
</li>


</ul>


</nav>

<!-- NAVS -->




</div>







</div>





</div>





</div>

</form>
@include('layouts.projects.edit')



</div>







@endsection
