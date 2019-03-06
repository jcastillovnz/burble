@extends('layouts.app')

@section('content')

<script src="{{ asset('js/mi_cuenta.js') }}" defer></script>

<div id="AppClientes"    class="content container col-sm-12 " >
@include('layouts.clientes.create')
</div>

  


<div  id="Mi_cuenta"  class="content">

<div class="col-sm-12">
<div style="padding-left: 1%; font-size: 18px; " align="left" class="">

<strong>
Mi cuenta
</strong>


<input v-model="id=usuario.id" value="" class="invisible"  name="">


</div>
</div>





<div    class="col-sm-12">



<form method="GET" class="container-fluid" role="form"  v-on:submit.prevent="update_user()"  >

<div class="row">
<div class="col-sm-4 ">
<div style="margin-top: 5%; " class="">

<center>


<img  v-if="usuario.foto"   width="180" height="180" class="border rounded-circle "  :src="'/img/users/fotos/'+usuario.foto" alt="Card image cap">


<img  v-else   width="180" height="180" class="border rounded-circle "  :src="preview" alt="Card image cap">


<input ref="foto_perfil" type="file"  @change="cargar_foto(this)" value="" class="invisible"  name="">
</center>

<div  class="card-img-overlay float-right">

<button  type="button"  @click="$refs.foto_perfil.click()"  class="btn btn-info btn-sm rounded-circle boton-overlay"><i class="fas fa-sync"></i>
</button>


</div>
</div>
</div>



<div class="col-sm-4">
<div class="input-group mb-3">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user"></i>
</span>
</div>
<input type="text" :disabled="state == 0"  class="form-control input-sm"   v-model="nombre=usuario.name" placeholder="Nombre">
</div>




 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text"  :disabled="state == 0"  class="form-control input-sm input" v-model="apellido=usuario.apellido"  placeholder="Apellido">
  </div>



 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text"  :disabled="state == 0"  class="form-control input-sm" v-model="alias=usuario.alias"  placeholder="Alias">
  </div>


 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input title="Fecha nacimiento" type="text" :disabled="state == 0"   v-model="fecha_nacimiento=usuario.fecha_nacimiento"  class="form-control input-sm input" placeholder="Fecha de nacimiento">
  </div>



 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text ">
 <i class="fas fa-user"></i>
         </span>
    </div>
   


<input readonly=""  type="" :disabled="state == 0"  v-model="rango=usuario.rango"  class="form-control input-sm" placeholder="Rango" name="">



  </div>



<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-envelope"></i>
         </span>
    </div>
    <input required="" title="Email" type="text" v-model="email=usuario.email"  class="form-control input-sm" :disabled="state == 0" placeholder="Email">
  </div>






  
</div>




<div class="col-sm-4 ">





 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" class="form-control input-sm" :disabled="state == 0"   v-model="cuit=usuario.cuit"  placeholder="Cuit">
  </div>



 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" :disabled="state == 0" v-model="direccion=usuario.direccion"  class="form-control input-sm" placeholder="Direccion">
  </div>


 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input title="Obra social" type="text" :disabled="state == 0" class="form-control input-sm" v-model="obra_social=usuario.obra_social" placeholder="Obra social">
  </div>



 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input title="Fecha nacimiento" type="text" v-model="servicio_ambulancia=usuario.servicio_ambulancia"  class="form-control input-sm" :disabled="state == 0" placeholder="Servicio de ambulancia">
  </div>


 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>


  <input type="text" class="form-control input-sm " :disabled="state == 0"  v-model="contacto_ambulancia=usuario.contacto_ambulancia"   placeholder="Telefono servicio ambulancia">
  </div>


  

<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-key"></i>
         </span>
    </div>
    <input  title="Contraseña" type="password" v-model="password"  class="form-control input-sm" :disabled="state == 0" placeholder="Contraseña">
  </div>






</div>








<div class="col-sm-12">
<div class="btn-group float-right">
<div  id="loader-user"   class="loader loader-sm loader-tarea"></div>
<button type="button" v-on:click="state=1"  title="Editar" class="btn btn-light  btn-sm float-right" >
  <i class="fas fa-pen-square"></i>
</button>

<button type="submit" id="btn-user" :disabled="state == 0"  title="Guardar" class="btn btn-success  btn-sm" >
<i class="fas fa-save"></i>
</button>
</div>
</div>


</div>




</div>

</form>


</div>







@endsection
