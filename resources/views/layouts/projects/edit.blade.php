


<!-- MODAL EDITAR PROYECTO-->
<div  class="modal fade "  id="edit_item"  tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div  class="modal-dialog ">
<div class="modal-content ">
<form   autocomplete="off"      method="GET" class="hidden"   @submit.prevent="update(rellenar.id)"  >
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


<span class="text-primary">
<strong>
 Cliente:  @{{rellenar.nombre_cliente}} 
</strong>
</span>


<div class="row">



  
  <div class="col-sm-6   form-group">
  <strong>Nombre</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">
          <i class="fas fa-briefcase"></i>
      </span>
        </div>
        <input :disabled="state == 0" v-model="rellenar.nombre_proyecto" type="text" class="form-control" id="validationDefaultUsername" placeholder="Nombre proyecto" aria-describedby="inputGroupPrepend2" required>
      </div>
  </div>





  <div class="col-sm-6   form-group">
   <strong>Fecha entrega</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">
  <i class="fas fa-clock"></i>
      </span>
        </div>
        <input :disabled="state == 0" v-model="rellenar.fecha_entrega" type="text" class="form-control" id="validationDefaultUsername" placeholder="Fecha entrega" aria-describedby="inputGroupPrepend2" required>
      </div>
  </div>


  <div class="col-sm-6   form-group">
 <strong>Presupuesto</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">
  <i class="fas fa-clock"></i>
      </span>
        </div>
        <input :disabled="state == 0" v-model="rellenar.presupuesto" type="text" class="form-control" id="validationDefaultUsername" placeholder="Presupuesto" aria-describedby="inputGroupPrepend2" required>
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
        <input disabled="" v-model="rellenar.Ntareas" type="text" class="form-control" id="validationDefaultUsername" placeholder="Presupuesto" aria-describedby="inputGroupPrepend2" required>
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

<textarea :disabled="state == 0" v-model="rellenar.comentario"  :src="preview" class="form-control" rows="2" id="comment"></textarea>

      </div>
  </div>

<div class="col-sm-12">
<p class="text-right">
<a :href="'/detalle/'+rellenar.id"  >
<i class="fas fa-caret-right"></i>
<a href="">
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