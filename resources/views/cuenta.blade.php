@extends('layouts.app')

@section('content')

<script src="{{ asset('js/mi_cuenta.js') }}" defer></script>


  


<div  id="Mi_cuenta"  class="content">

<div class="col-sm-12">
<div style="padding-left: 1%; " align="left" class="text-info">
<h5>
Mi cuenta
</h5>

<button type="button"  title="Guardar" class="btn btn-light  btn-sm float-right" ><i class="fas fa-pen-square"></i>
</button>


</div>
</div>





<div    class="col-sm-12">

<div class="row">





<div class="col-sm-4 ">
<div style="margin-top: 5%; " class="">

<center>
<img width="180" class="" src="img/user.png" alt="Card image cap">
</center>

<button class="btn btn-info btn-sm"><i class="fas fa-upload"></i> Subir fotografia</button>

<p class="text-primary">Sube una nueva foto de perfil</p>
</div>
</div>





<div class="col-sm-4">

 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" class="form-control input-sm" v-model="usuario.name" placeholder="Nombre">
  </div>




 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" class="form-control input-sm" v-model="usuario.apellido"  placeholder="Apellido">
  </div>



 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" class="form-control input-sm" v-model="usuario.alias"  placeholder="Alias">
  </div>


 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input title="Fecha nacimiento" type="text"  v-model="usuario.fecha_nacimiento"  class="form-control input-sm" placeholder="Fecha de nacimiento">
  </div>




 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
   
<select class="form-control">
  <option>
    Seleccione rango
  </option>
  <option>
Empleado
  </option>

  <option>
Freelance
  </option>


  <option>
Administrador
  </option>




</select>


  </div>



  
</div>





<div class="col-sm-4 ">





 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" class="form-control input-sm" placeholder="Cuit">
  </div>



 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" class="form-control input-sm" placeholder="Direccion">
  </div>


 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input title="Obra social" type="text" class="form-control input-sm" v-model="usuario.obrasocial" placeholder="Obra social">
  </div>



 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input title="Fecha nacimiento" type="text" v-model="usuario.servicio_ambulancia"  class="form-control input-sm" placeholder="Servicio de ambulancia">
  </div>


 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>


  <input type="text" class="form-control input-sm" v-model="usuario.contacto_ambulancia"   placeholder="Telefono servicio ambulancia">
  </div>


  
</div>











</div>



</div>

</div>

<div class="col-sm-12">
<div class="btn-group float-right">



<button type="button" id="guardar_usuario" title="Guardar" class="btn btn-success  btn-sm" ><i class="fas fa-save"></i></button>



</div>
</div>



@endsection
