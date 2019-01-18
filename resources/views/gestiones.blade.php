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
<th scope="col">#  </th>
<th scope="col" >  Foto    </th>
<th scope="col">Nombre</th>
<th scope="col">Apellido</th>
<th scope="col">Rango</th>
<th scope="col">Accion</th>
</tr>
</thead>
<tbody >
<tr v-for="(item, key) in lists"   >
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
<a class="dropdown-item"  v-on:click.prevent="mostrar(item)"   >Detalles</a>
<a class="dropdown-item"   v-on:click.prevent="eliminar(item)" > Eliminar</a>
</div>
</div>
</td>
</tr>
</tbody>
</table>







<!-- MODAL EDITAR -->
<div  class="modal fade "  id="editar"  tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div  class="modal-dialog modal-sm-12">
<div class="modal-content">
<form   autocomplete="off"    method="GET" class="hidden"  @submit.prevent="update(rellenar.id)" >
<div class="modal-header ">
<div class="col-sm-12 text-primary">
<center>
<span style="margin-left:80px;">
<i class="fas fa-info-circle"></i>
<strong>
Informacion de usuario
</strong>
</span>
<button   type="button" class="close float-right"   v-on:click="close_modal()"  >
<i class="fas fa-times"></i>
</button>
<button   v-on:click="edicion(rellenar)" type="button"   class="close float-right" >
<i class="fas fa-pen-square"></i>
</button>
</center>

</div>
</div>
<div class="modal-body">
<div class="col-sm-12">
<div  class="">
<center>
<img  v-if="rellenar.foto"   width="150" height="150" id="img_edit"  class="border rounded-circle"  :src="'/img/users/fotos/'+rellenar.foto" alt="Card image cap">
<img  v-else  width="150" height="150" class="border rounded-circle " :src="preview"  alt="Card image cap">
</center>
<input :ref="'foto_update'" type="file"  @change="enviar_foto(this, rellenar)" class="invisible" >

<div  class="card-img-overlay ">

<button style="margin-top: 25% ;margin-left:20%;"  @click="$refs.foto_update.click()"   type="button" class="btn btn-info btn-sm rounded-circle button-overlay2"><i class="fas fa-sync"></i>
</button>


</div>
</div>
</div>

<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i></span>
</div>
<input required="" type="text" class="form-control"  v-model="nombre"   placeholder="Nombre">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user-plus"></i>
</span>
</div>
<input required="" type="text" class="form-control" v-model="apellido" placeholder="Apellido">
</div>


<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-envelope"></i>
</span>
</div>
<input required="" autocomplete="off" value="" class="form-control"  v-on:keyup="monitor(this)"   type="email" name="email" v-model="email"   placeholder="Email">
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
<input type="text" class="form-control" v-model="alias" placeholder="Alias">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
</span>
</div>
<input type="date" class="form-control" v-model="fecha_nacimiento" value=""  placeholder="Fecha nacimiento">
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
<input required="" value="" class="form-control" type="text" value="" name="cuit" v-model="cuit" placeholder="CUIT">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i> </span>
</div>
<input class="form-control" type="text" value=""  v-model="direccion"   name="" placeholder="Direccion">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i>  </span>
</div>

<input value="" class="form-control" type="text" name="obra_social" v-model="obra_social"   placeholder="Obra social">
</div>


<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-ambulance"></i> </span>
</div>
<input class="form-control" type="text" value="" name="servicio_ambulancia" v-model="servicio_ambulancia"   placeholder="servicio de ambulancia">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-ambulance"></i> </span>
</div>
<input class="form-control" type="text" value=""  name="contacto_ambulancia"  v-model="contacto_ambulancia" placeholder="Contacto de ambulancia">

</div>
</div>



<div class="modal-footer">
<div class="btn btn-group  ">
<div  id="loader-edicion"  class="loader loader-sm"></div>

<button  id="btn-edicion" type="submit"  class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL EDITAR USUARIO -->








<!-- MODAL NUEVO USUARIO -->
<div  class="modal fade nuevoUsuario" tabindex="3" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div  class="modal-dialog modal-sm-8">
 <div class="modal-content">

<form  autocomplete="off"    method="GET" class="hidden"  @submit.prevent="enviar(this)" >
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
<input required="" type="text" class="form-control"  v-model="nombre"   placeholder="Nombre">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user-plus"></i>
</span>
</div>
<input required="" type="text" class="form-control" v-model="apellido" placeholder="Apellido">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-envelope"></i>
</span>
</div>
<input required="" autocomplete="off" value="" class="form-control"  v-on:keyup="monitor(this)"   type="email" name="email" v-model="email"   placeholder="Email">
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
<input type="text" class="form-control" v-model="alias" placeholder="Alias">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
</span>
</div>
<input type="date" class="form-control" v-model="fecha_nacimiento" value=""  placeholder="Fecha nacimiento">
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
<input required="" value="" class="form-control" type="text" value="" name="cuit" v-model="cuit" placeholder="CUIT">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i> </span>
</div>
<input class="form-control" type="text" value=""  v-model="direccion"   name="" placeholder="Direccion">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i>  </span>
</div>

<input value="" class="form-control" type="text" name="obra_social" v-model="obra_social"   placeholder="Obra social">
</div>


<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-ambulance"></i> </span>
</div>
<input class="form-control" type="text" value="" name="servicio_ambulancia" v-model="servicio_ambulancia"   placeholder="servicio de ambulancia">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-ambulance"></i> </span>
</div>
<input class="form-control" type="text" value=""  name="contacto_ambulancia"  v-model="contacto_ambulancia" placeholder="Contacto de ambulancia">


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
