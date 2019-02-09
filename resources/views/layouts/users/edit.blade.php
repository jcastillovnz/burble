
<!-- MODAL EDITAR -->
<div  class="modal fade "  id="editar"  tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div  class="modal-dialog modal-sm-12">
<div class="modal-content">
<form   autocomplete="off"    method="GET" class="hidden"  @submit.prevent="update_user(rellenar.id)" >
<div class="modal-header ">
<div class="col-sm-12 text-primary">
<center>
<span style="margin-left:80px;">
<i class="fas fa-info-circle"></i>
<strong>
Informacion de usuario
</strong>
</span>
<button   type="button" class="close float-right"   v-on:click="close_modal(rellenar)">
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
<input required="" type="text" class="form-control" :disabled="state == 0"  v-model="rellenar.nombre"   placeholder="Nombre">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user-plus"></i>
</span>
</div>
<input  type="text" class="form-control" :disabled="state == 0" v-model="rellenar.apellido" placeholder="Apellido">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-envelope"></i>
</span>
</div>
<input required="" autocomplete="off" value="" class="form-control" :disabled="state == 0"  v-on:keyup="monitor(this)"   type="email" name="email" v-model="rellenar.email"   placeholder="Email">
</div>

<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-key"></i>
</span>
</div>
<input type="password" class="form-control" :disabled="state == 0" v-model="rellenar.password" placeholder="Contraseña">
</div>





<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-cog"></i> 
</span>
</div>
<input type="text" class="form-control" :disabled="state == 0" v-model="rellenar.alias" placeholder="Alias">
</div>




<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
</span>
</div>
<input type="text" class="form-control" :disabled="state == 0" v-model="rellenar.fecha_nacimiento" value=""  placeholder="Fecha nacimiento">
</div>

<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-user-shield"></i>
</span>
</div>



<select required=""  :disabled="state == 0" required="" name="rango" v-model="rellenar.rango"    class="form-control">

<option  value="" selected="">Rango</option>


<option v-if="rellenar.rango=='Empleado'" selected="" value="Empleado">Empleado</option>
<option v-else  value="Empleado">Empleado</option>


<option v-if="rellenar.rango=='Freelance'" selected="" value="Freelance">Freelance</option>
<option v-else value="Freelance">Freelance</option>


<option v-if="rellenar.rango=='Administrador'" value="Administrador">Administrador</option>
<option v-else value="Administrador">Administrador</option>


</select>



</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i> </span>
</div>
<input  :disabled="state == 0" class="form-control" type="text" value="" name="cuit" v-model="rellenar.cuit" placeholder="CUIT">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i> </span>
</div>
<input class="form-control" type="text" :disabled="state == 0" v-model="rellenar.direccion"   placeholder="Direccion">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i>  </span>
</div>
<input :disabled="state == 0"class="form-control" type="text"  v-model="rellenar.obra_social"   placeholder="Obra social">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-ambulance"></i> </span>
</div>
<input class="form-control" type="text" :disabled="state == 0"  v-model="rellenar.servicio_ambulancia"   placeholder="servicio de ambulancia">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-ambulance"></i> </span>
</div>
<input class="form-control" type="text" :disabled="state == 0"   v-model="rellenar.contacto_ambulancia" placeholder="Contacto de ambulancia">
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