




<!-- MODAL NUEVO CLIENTE -->
<div     class="modal fade nuevoContacto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm-8">
<div   class="modal-content">
<form  v-on:submit.prevent="create_contacto(this)"    method="GET" class="hidden" role="form"     >
<div class="modal-header ">



<div class="col-sm-12 text-primary">



<i class="fas fa-phone-square"></i>


<strong>
Registrar un nuevo Contacto  
<button type="button" class="close float-right"  v-on:click="close_contacto()"   >&times;</button>
</strong>







</div>
</div>


<div   class="modal-body">
<!--  -->




<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text">
<i class="fas fa-user"></i>
</span>
</div>
<input required=""  type="" class="form-control" v-model="nuevo.nombre_contacto" placeholder="Nombre">
</div>



<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text">
<i class="fas fa-user"></i>
</span>
</div>
<input type="" class="form-control" v-model="nuevo.apellido_contacto" placeholder="Apellido">
</div>



<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text">
<i class="fas fa-phone-square"></i></span>
</div>
<input required="" type="" class="form-control" v-model="nuevo.telefono_contacto" placeholder="Telefono">
</div>




<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text">
<i class="fas fa-mail-bulk"></i>
</span>
</div>
<input   type="email" class="form-control" v-model="nuevo.email_contacto" placeholder="Email">
</div>



<!--  -->
</div>


<div class="modal-footer">
<div class="btn btn-group  ">


<div id="loader-create-contacto" class="loader loader-sm "></div>


<button  class="btn btn-light btn-sm " title="Cancelar" type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>


<button type="submit"  id="btn-create-contacto" class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>




</form>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL NUEVO CLIENTE -->
