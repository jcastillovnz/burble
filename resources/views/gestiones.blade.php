@extends('layouts.app')

@section('content')


  


<div class="row content">


  <div class="col-sm-3 ">
 <h5 >

  <strong ><i class="fas fa-chart-line"></i> Productividad</strong>   

   </h5>

<div  class="card table-responsive">


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Tareas</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


</div>



  </div>










  <div  id="AppUsuarios"  class=" col-sm-9 ">

<h5 ><strong ><i class="fas fa-cogs"></i> Gestion de usuarios</strong>   
<small>
<button  title="Nuevo usuario"  class="btn btn-light  btn-sm rounded-circle float-right" data-toggle="modal"data-target=".nuevoUsuario"><i class="fas fa-plus"></i> </button>
</small>
   </h5>



<div    class="table table-responsive" >

<table   class="table table-borderless table-hover">
  <thead>
    <tr>
      <th scope="col">#   </th>
    <th scope="col" >  Foto    </th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Rango</th>
       <th scope="col">Accion</th>

    </tr>
  </thead>
  <tbody >
    <tr v-for="item in lists"   >
      <th scope="row"   > @{{item.id}} </th> 
      <td>

   
<img   v-if="item.foto"  width="35" height="35" class=" rounded-circle "  :src="'/img/users/fotos/'+item.foto" alt="Card image cap">


<img   v-else  width="35" height="35" class="border rounded-circle "  src="img/user.png" alt="Card image cap">



        </td>
      <td>@{{item.name}}</td>
      <td>@{{item.apellido}}</td>
      <td>@{{item.rango}}</td>
         <td>

       <div class="dropdown">
  <button class="btn btn-light btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown"  >
  <i class="fas fa-cogs"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
     <a class="dropdown-item" aria-expanded="false"   data-toggle="modal"

:data-target="'#modal_'+item.id"  role="button"  >Detalles</a>
    <a class="dropdown-item"   v-on:click="eliminar(item)" > Eliminar</a>
  </div>
</div>


<!-- MODAL EDITAR -->
<div  class="modal fade "  :id="'modal_'+item.id"  tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div  class="modal-dialog modal-sm-12">
<div class="modal-content">
<form   autocomplete="off"    method="GET" class="hidden"  @submit.prevent="sumbit__edicion(item)" >
<div class="modal-header ">

<div class="col-sm-12 text-primary">
<center>
<span style="margin-left:80px;">
<i class="fas fa-info-circle"></i>
<strong>
Informacion de usuario
</strong>
</span>
<button   type="button" class="close float-right"   v-on:click="close_modal(item)"  >
<i class="fas fa-times"></i>
</button>
<button   v-on:click="edicion(item)" type="button"   class="close float-right" >
<i class="fas fa-pen-square"></i>
</button>
</center>

</div>
</div>
<div class="modal-body">



<div class="col-sm-12">

<div  class="">



<center>
<img  v-if="item.foto"   width="150" height="150"  class="border rounded-circle "  :src="'/img/users/fotos/'+item.foto" alt="Card image cap">

<img  v-else  width="150" height="150" class="border rounded-circle " :src="preview"  alt="Card image cap">

</center>
<input  :ref="'foto_'+item.id" :id="'foto_'+item.id"   type="file"   @change="cargar_foto(this)" class="invisible"  name="">


<div  class="card-img-overlay ">

<button style="margin-top: 25% ;margin-left:20%;"  @click="carga_input(item)"   type="button" class="btn btn-info btn-sm rounded-circle button-overlay2"><i class="fas fa-sync"></i>
</button>


</div>
</div>



</div>




<div class="input-group  col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i></span>
</div>
<input required="" type="text" class="form-control" :disabled="state == 0"  v-model="nombre = item.name"    placeholder="Nombre">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user-plus"></i>
</span>
</div>

@{{apellido[] }}
<input required=""  class="form-control" :disabled="state == 0"  v-model="apellido =item.apellido"    placeholder="Apellido">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-envelope"></i>
</span>
</div>
<input required="" autocomplete="off" :disabled="state == 0" class="form-control" v-model="email = item.email"  v-on:keyup="monitor(this)"   type="email"    placeholder="Email">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-lock"></i>
</span>
</div>
<input   autocomplete="new-password" :disabled="state == 0"  v-model="password" class="form-control" type="password" name="password" value=""  placeholder="Contraseña">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-cog"></i> 
</span>
</div>
<input type="text" class="form-control" :disabled="state == 0"  placeholder="Alias" v-model="alias = item.alias" >
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
</span>
</div>

<input  :disabled="state == 0" v-if="item.fecha_nacimiento==null"  type="date" class="form-control"  v-model="fecha_nacimiento = item.fecha_nacimiento" placeholder="Fecha nacimiento">

<input  v-else=""  type="" class="form-control"  :disabled="state == 0" v-model="fecha_nacimiento = item.fecha_nacimiento" placeholder="Fecha nacimiento">



</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user-shield"></i>
</span>
</div>
<select :disabled="state == 0"  required="" name="rango"     class="form-control">


<option value="" selected="">Rango</option>
<option value="Empleado">Empleado</option>
<option value="Freelance">Freelance</option>
<option value="Administrador">Administrador</option>


</select>
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i> </span>
</div>
<input  value="" class="form-control" :disabled="state == 0" type="text" v-model="cuit = item.cuit"  name="cuit" placeholder="CUIT">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i> </span>
</div>
<input class="form-control" type="text" value="" :disabled="state == 0"  v-model="direccion = item.direccion" placeholder="Direccion">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i>  </span>
</div>
<input value="" class="form-control" type="text"  :disabled="state == 0" v-model="obra_social = item.obra_social"  placeholder="Obra social">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-ambulance"></i> </span>
</div>
<input class="form-control" type="text"  :disabled="state == 0" v-model="servicio_ambulancia = item.servicio_ambulancia"   placeholder="servicio de ambulancia">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-ambulance"></i> </span>
</div>
<input class="form-control" type="text" :disabled="state == 0"  v-model="contacto_ambulancia = item.contacto_ambulancia"    placeholder="Contacto de ambulancia">
</div>
 </div>
<div class="modal-footer">
<div class="btn btn-group  ">
<div  :id="'loader-user_'+item.id"  class="loader loader-sm"></div>

<button  :id="'btn-user_'+item.id" type="submit"  class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL EDITAR USUARIO -->




</td>






    </tr>
  </tbody>
</table>





<!-- MODAL NUEVO USUARIO -->
<div  class="modal fade nuevoUsuario" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div  class="modal-dialog modal-sm-8">
 <div class="modal-content">

<form id="formulario_usuario"  autocomplete="off"    method="GET" class="hidden"  @submit.prevent="enviar(this)" >
 <div class="modal-header ">
    
<div class="col-sm-12 text-primary">
<i class="fas fa-suitcase"></i>
<strong>
Registrar un nuevo usuario

</strong>
<button type="button" class="close float-right" data-dismiss="modal">&times;</button>
</div>
</div>
<div class="modal-body">
    
<div class="input-group  col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i></span>
</div>
<input required="" type="text" class="form-control"  v-model="n_nombre"   placeholder="Nombre">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user-plus"></i>
</span>
</div>
<input required="" type="text" class="form-control" v-model="n_apellido" placeholder="Apellido">
</div>

<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-envelope"></i>
</span>
</div>
<input required="" autocomplete="off" value="" class="form-control"  v-on:keyup="monitor(this)"   type="email" name="email" v-model="n_email"   placeholder="Email">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-lock"></i>
</span>
</div>
<input required=""  autocomplete="new-password"  class="form-control" type="password" name="password" value="" v-model="password" placeholder="Contraseña">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-cog"></i> 
</span>
</div>
<input type="text" class="form-control" v-model="n_alias" placeholder="Alias">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
</span>
</div>
<input type="date" class="form-control" v-model="n_fecha_nacimiento" value=""  placeholder="Fecha nacimiento">
</div>




<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user-shield"></i>
</span>
</div>
<select   required="" name="rango" v-model="rango"    class="form-control">
<option value="" selected="">Rango</option>
<option value="Empleado">Empleado</option>
<option value="Freelance">Freelance</option>
<option value="Administrador">Administrador</option>
</select>
</div>

<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i> </span>
</div>

<input required="" value="" class="form-control" type="text" value="" name="cuit" v-model="n_cuit" placeholder="CUIT">
  </div>

 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i> </span>
    </div>

<input class="form-control" type="text" value=""  v-model="n_direccion"   name="" placeholder="Direccion">


  </div>

<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i>  </span>
    </div>

<input value="" class="form-control" type="text" name="obra_social" v-model="n_obra_social"   placeholder="Obra social">


  </div>




  <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-ambulance"></i> </span>
    </div>

<input class="form-control" type="text" value="" name="servicio_ambulancia" v-model="n_servicio_ambulancia"   placeholder="servicio de ambulancia">


  </div>



  <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-ambulance"></i> </span>
    </div>

<input class="form-control" type="text" value=""  name="contacto_ambulancia"  v-model="n_contacto_ambulancia" placeholder="Contacto de ambulancia">


  </div>





 </div>


<div class="modal-footer">


<div class="btn btn-group  ">
<div id="loader-sm" class="loader loader-sm "></div>

<button class="btn btn-light btn-sm " type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>



<button  id="btn-proyecto" type="submit"  class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>


</form>
</div>

</div>

    </div>


  </div>


</div>
<!-- MODAL NUEVO USUARIO -->







</div>














@endsection
