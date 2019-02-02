<div  id="AppClientes" >


<!-- MODAL NUEVO CLIENTE -->
<div    class="modal fade edit_Contacto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm-8">
 <div   class="modal-content">
<form  v-on:submit.prevent="update_contacto(this)"    method="GET" class="hidden" role="form"     >
<div class="modal-header ">
<div class="col-sm-12 text-primary">
<center>
<span style="margin-left:80px;">
<i class="fas fa-info-circle"></i>
<strong>
Informacion de contacto
</strong>
</span>

<button   type="button" class="close float-right"   v-on:click="close_contacto()"  >
<i class="fas fa-times"></i>
</button>
<button    v-on:click="edicion_contacto()"  type="button"   class="close float-right" >
<i class="fas fa-pen-square"></i>
</button>
</center>
</div>
</div>
<div   class="modal-body">

<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text">
<i class="fas fa-user"></i>
</span>
</div>
<input required=""  type="" class="form-control"  :disabled="state_contacto == 0"  v-model="contacto.nombre_contacto" placeholder="Nombre">
</div>


<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text">
<i class="fas fa-user"></i>
</span>
</div>
<input type="" class="form-control" :disabled="state_contacto == 0"  v-model="contacto.apellido_contacto" placeholder="Apellido">
</div>



<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text">
<i class="fas fa-phone-square"></i></span>
</div>
<input required="" type="" class="form-control" :disabled="state_contacto == 0"   v-model="contacto.telefono_contacto" placeholder="Telefono">
</div>




<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text">
<i class="fas fa-mail-bulk"></i>
</span>
</div>
<input   type="email" class="form-control" :disabled="state_contacto == 0"  v-model="contacto.email_contacto" placeholder="Email">
</div>







<!--  -->
</div>

<div class="modal-footer">
<div class="btn btn-group  ">
<div  id="loader-edicion-contacto" class="loader loader-sm "></div>





<button class="btn btn-light btn-sm    " title="Cancelar" type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>
<button type="submit"  id="btn-edicion-contacto"          class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL NUEVO CLIENTE -->

</div>