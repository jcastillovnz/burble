


<!-- MODAL EDITAR -->
<div  class="modal fade "  id="edit_item"  tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div  class="modal-dialog ">
<div class="modal-content ">
<form   autocomplete="off" method="GET" class="hidden"   @submit.prevent="update(rellenar.id)"  >
<div class="modal-header ">
<div class="col-sm-12 text-primary">
<center>
<span style="margin-left:80px;">
<i class="fas fa-info-circle"></i>
<strong>
Informacion de tarea
</strong>
</span>
<button   type="button" class="close float-right"   v-on:click="close()"  >
<i class="fas fa-times"></i>
</button>
<button    v-on:click="edit_tarea()"  type="button"   class="close float-right" >
<i class="fas fa-pen-square"></i>
</button>
</center>

</div>
</div>
<div class="modal-body">

<div class="row">





<div class="col-sm-12 ">
<div style="margin-top: 5%; " class="">

<center>



<img  v-if="rellenar.empleado_foto" class="border rounded-circle "  width="120" height="120" class=""  :src="'/img/users/fotos/' +rellenar.empleado_foto" alt="Card image cap">




<img v-else  src="{{ url('img/user.png') }} "    width="120" height="120" class="border rounded-circle "   alt="Card image cap">



</center>

<div  class="text-center">
	<p>


Empleado encargado:
@{{rellenar.empleado_nombre}}  @{{rellenar.empleado_apellido}}
 

<!--  
<select :disabled="state_edit == 0" v-model="rellenar"   class="form-control">
<option>Seleccione empleado   </option>
</select>
-->
</p>
</div>
</div>
</div>



  <div class="col-sm-6   form-group">
  <strong>Nombre</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">
          <i class="fas fa-briefcase"></i>
      </span>
        </div>
        <input :disabled="state_edit == 0" v-model="rellenar.nombre" type="text" class="form-control" id="validationDefaultUsername" placeholder="Nombre proyecto" aria-describedby="inputGroupPrepend2" required>
      </div>
  </div>


  <div class="col-sm-6   form-group">
 <strong>Tipo</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">
<i class="fas fa-sort-numeric-up"></i>
      </span>
        </div>
        <input :disabled="state_edit == 0" v-model="rellenar.tipo" type="text" class="form-control" id="validationDefaultUsername" placeholder="Tipo" aria-describedby="inputGroupPrepend2" required>
      </div>
  </div>


  <div class="col-sm-6   form-group">
   <strong>Fecha inicio</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">
  <i class="fas fa-clock"></i>
      </span>
        </div>

    <input v-if="rellenar.fecha_inicio"  :disabled="state_edit == 0" v-model="rellenar.fecha_inicio" type="text" class="form-control" id="validationDefaultUsername" placeholder="Fecha entrega" aria-describedby="inputGroupPrepend2" required>

    

    <input v-else  :disabled="state_edit == 0" v-model="rellenar.fecha_inicio" type="date" class="form-control" id="validationDefaultUsername" placeholder="Fecha entrega" aria-describedby="inputGroupPrepend2" >



      </div>
  </div>


  <div class="col-sm-6   form-group">
 <strong>Fecha termino</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">
  <i class="fas fa-clock"></i>
      </span>
        </div>


       <input v-if="rellenar.fecha_termino"  :disabled="state_edit == 0" v-model="rellenar.fecha_inicio" type="text" class="form-control" id="validationDefaultUsername" placeholder="Fecha entrega" aria-describedby="inputGroupPrepend2" >

    

    <input v-else  :disabled="state_edit == 0" v-model="rellenar.fecha_termino" type="date" class="form-control" id="validationDefaultUsername" placeholder="Fecha entrega" aria-describedby="inputGroupPrepend2" required>





      </div>
  </div>


  <div class="col-sm-6   form-group">
 <strong>Prioridad</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">
  <i class="fas fa-clock"></i>
      </span>
        </div>
        <input :disabled="state_edit == 0" v-model="rellenar.prioridad" type="text" class="form-control" id="validationDefaultUsername" placeholder="Prioridad" aria-describedby="inputGroupPrepend2" required>
      </div>
  </div>


  <div class="col-sm-6   form-group">
 <strong>Estado</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">
  <i class="fas fa-clock"></i>
      </span>
        </div>
        <input :disabled="state_edit == 0" v-model="rellenar.estado" type="text" class="form-control" id="validationDefaultUsername" placeholder="Estado" aria-describedby="inputGroupPrepend2" required>
      </div>
  </div>


  <div class="col-sm-12   form-group">
 <strong>Comentario</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">
<i class="fas fa-comment"></i>
      </span>
        </div>

<textarea :disabled="state_edit == 0" v-model="rellenar.comentario"  class="form-control" rows="2" id="comment"></textarea>

      </div>
  </div>


<div class="col-sm-12 ">
<div with="300" class="">

<center>





<img  v-if="rellenar.imagen_tarea"  class="col-sm"  :src="'{{url ('/img/tareas/fotos/')}}'+'/' +rellenar.imagen_tarea" >



<img v-else class="col-sm"  src="{{url ('img/pieza.png')}} " >





<input ref="imagen" type="file"  value="" class="invisible" @change="cargar_imagen(this)"   name="">
</center>

<div  class="card-img-overlay float-right">

<button  @click="$refs.imagen.click()"    title="Actualizar imagen" style="margin-top: 75%; margin-left: 90%;"  type="button"    class="btn btn-info btn-sm rounded-circle boton-overlay"><i class="fas fa-sync"></i>
</button>


</div>
</div>
</div>


</div>










<div class="modal-footer">
<div class="btn btn-group  ">
<div  id="loader-details-tarea"  class="loader loader-sm"></div>
<button  id="btn-details-tarea" :disabled="state_edit == 0" type="submit"  class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL EDITAR USUARIO -->