

<!-- MODAL EDITAR PROYECTO-->
<div  class="modal fade edit_proyecto"  id="edit_item"  tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div  class="modal-dialog ">
<div class="modal-content ">
<form   autocomplete="off"      method="GET" class="hidden"   @submit.prevent="update_proyecto(Rproyecto.id)"  >
<div class="modal-header ">
<div class="col-sm-12 text-primary">
<center>
<span style="margin-left:80px;">
<i class="fas fa-info-circle"></i>
<strong>
Informacion de proyecto
</strong>
</span>
<button   type="button" class="close float-right"   v-on:click="close()"  >
<i class="fas fa-times"></i>
</button>
<button    v-on:click="edicion()"  type="button"   class="close float-right" >
<i class="fas fa-pen-square"></i>
</button>
</center>

</div>
</div>
<div class="modal-body">



<div class="row">



  
  <div class="col-sm-6   form-group">
  <strong>Nombre</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">
          <i class="fas fa-briefcase"></i>
      </span>
        </div>
        <input :disabled="state == 0" v-model="Rproyecto.nombre_proyecto" type="text" class="form-control input-sm"  placeholder="Nombre proyecto" aria-describedby="inputGroupPrepend2" required>
      </div>
  </div>



  <div class="col-sm-6   form-group">
   <strong>Fecha recepcion</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" >
  <i class="fas fa-clock"></i>
      </span>
        </div>



 <proyecto-fecha-recepcion  :disabled="state == 0" placeholder="Fecha de recepcion"  autocomplete="off"   v-model="Rproyecto.fecha_recepcion"  class="form-control"  :config="{format:'YYYY/MM/DD'}"></proyecto-fecha-recepcion>





      </div>
  </div>




  <div class="col-sm-6   form-group">
   <strong>Fecha entrega</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" >
<i class="fas fa-flag-checkered"></i>
      </span>
        </div>


<proyecto-fecha-entrega :disabled="state == 0" autocomplete="off"   title="Fecha de entrega" name="date" placeholder="Fecha de entrega"  v-model="Rproyecto.fecha_entrega"  class="form-control"  :config="options"></proyecto-fecha-entrega>




      </div>
  </div>


  <div class="col-sm-6   form-group">
 <strong>Presupuesto</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">
<i class="fas fa-dollar-sign"></i>
      </span>
        </div>
        <input :disabled="state == 0" v-model="Rproyecto.presupuesto" type="text" class="form-control input-sm"  placeholder="Presupuesto"  required>
      </div>
  </div>


  <div class="col-sm-6   form-group">
 <strong>Numero de tareas</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">
<i class="fas fa-sort-numeric-up"></i>
      </span>
        </div>
        <input disabled="" v-model="Rproyecto.Ntareas" type="text" class="form-control input-sm" placeholder="N tareas"  required>
      </div>
  </div>



  <div class="col-sm-6   form-group">
 <strong>Prioridad</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
<i class="fas fa-circle"  v-bind:class="{ 'green': Rproyecto.prioridad == 'baja','yellow': Rproyecto.prioridad == 'media', 'red': Rproyecto.prioridad == 'alta'   }"   ></i>
      </span>
        </div>
  <select :disabled="state == 0" autocomplete="off" required="" v-model="Rproyecto.prioridad" type="text" class="form-control" placeholder="Prioridad">
<option value="" :selected="Rproyecto.prioridad == null">Prioridad</option>
<option :selected="Rproyecto.prioridad=='alta'"    value="alta">Alta - Rojo</option>
<option :selected="Rproyecto.prioridad=='media'"   value="media">Media - Amarillo</option>
<option :selected="Rproyecto.prioridad=='baja'"    value="baja">Baja - Verde </option>
</select>
      </div>
  </div>


  <div class="col-sm-12   form-group">
 <strong>Descripcion</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" >
<i class="fas fa-text-height"></i>
      </span>
        </div>

<textarea :disabled="state == 0" v-model="Rproyecto.descripcion"   class="form-control input-sm" rows="2" ></textarea>

</div>
</div>



  <div class="col-sm-12   form-group">
 <strong>Comentario</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" >
<i class="fas fa-comment"></i>
      </span>
        </div>

<textarea :disabled="state == 0" v-model="Rproyecto.comentario"   class="form-control input-sm" rows="2" ></textarea>

      </div>
  </div>





<div class="col-sm-12 ">



<div with="250" class="">

<center>
<img  with="250" v-if="Rproyecto.img"  class="col-sm"  :src="'{{url ('/img/proyectos/fotos/')}}'+'/'+ Rproyecto.img" >
<img  v-else class="col-sm"  src="{{url ('img/pieza.png')}} " >



<input ref="imagen_proyecto" type="file"  value="" class="invisible" @change="cargar_imagen_proyecto(this)"   name="">
</center>


<div  class="card-img-overlay float-right">
<button  @click="$refs.imagen_proyecto.click()"    title="Actualizar imagen" style="margin-top: 20%; margin-left: 90%;"  type="button"    class="btn btn-info btn-sm rounded-circle boton-overlay"><i class="fas fa-sync"></i>
</button>
</div>


</div>
</div>





<div class="col-sm-12">
<p class="text-right">
<a :href="'/proyecto/'+Rproyecto.id"  >
<i class="fas fa-caret-right"></i>

Ver mas detalles
</a>

</a>
</p>
</div>



</div>







<div class="modal-footer">
<div class="btn btn-group  ">
<div  id="loader-details-proyecto"  class="loader loader-sm"></div>
<button  id="btn-details-proyecto" :disabled="state == 0" type="submit"  class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL EDITAR PROYECTO-->