<!-- MODAL NUEVO USUARIO -->
<div  class="modal fade nuevoUsuario" tabindex="3" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div  class="modal-dialog modal-sm-8">
 <div class="modal-content">

<form  autocomplete="off"    method="GET" class="hidden"  @submit.prevent="create(this)" >
 <div class="modal-header ">
    
<div class="col-sm-12 text-primary">
<i class="fas fa-suitcase"></i>
<strong>
Registrar un nuevo usuario

</strong>
<button type="button" class="close float-right"  data-dismiss="modal"  v-on:click="close_modal(rellenar)" >&times;</button>
</div>
</div>
<div class="modal-body">
    
<div class="input-group  col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i></span>
</div>
<input required="" type="text" class="form-control"  v-model="rellenar.nombre"   placeholder="Nombre">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user-plus"></i>
</span>
</div>
<input required="" type="text" class="form-control" v-model="rellenar.apellido" placeholder="Apellido">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-envelope"></i>
</span>
</div>
<input required="" autocomplete="off" value="" class="form-control"  v-on:keyup="monitor(this)"   type="email" v-model="rellenar.email"   placeholder="Email">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-lock"></i>
</span>
</div>
<input required=""  autocomplete="new-password"  class="form-control" type="password"  v-model="rellenar.password" placeholder="Contraseña">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-cog"></i> 
</span>
</div>
<input type="text" class="form-control" v-model="rellenar.alias" placeholder="Alias">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
</span>
</div>
<input type="date" class="form-control" v-model="rellenar.fecha_nacimiento" value=""  placeholder="Fecha nacimiento">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user-shield"></i>
</span>
</div>
<select   required="" v-model="rellenar.rango"    class="form-control">
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
<input required="" value="" class="form-control" type="text"  v-model="rellenar.cuit" placeholder="CUIT">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i> </span>
</div>
<input class="form-control" type="text" value=""  v-model="rellenar.direccion"   name="" placeholder="Direccion">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i>  </span>
</div>
<input value="" class="form-control" type="text" v-model="rellenar.obra_social"   placeholder="Obra social">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-ambulance"></i> </span>
</div>
<input class="form-control" type="text" v-model="rellenar.servicio_ambulancia"   placeholder="servicio de ambulancia">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-ambulance"></i> </span>
</div>
<input class="form-control" type="text"   v-model="rellenar.contacto_ambulancia" placeholder="Contacto de ambulancia">
</div>
</div>
<div class="modal-footer">
<div class="btn btn-group  ">
<div id="loader-create" class="loader loader-sm "></div>
<button class="btn btn-light btn-sm " type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>
<button  id="btn-create" type="submit"  class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>
</form>
</div>
</div>
</div>
</div>
</div>
