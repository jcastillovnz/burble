
<div  class="modal fade nuevaTarea"    data-dismiss="modal"  tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div  class="modal-dialog ">
<div class="modal-content ">
<form   autocomplete="off" method="GET" class="hidden"   @submit.prevent="create_tarea()"  >
<div class="modal-header ">
<div class="col-sm-12 text-primary">
<center>
<span style="margin-left:80px;">
<i class="fas fa-suitcase"></i>
<strong>
Registrar un nueva tarea
</strong>
</span>
<button   type="button" class="close float-right"   v-on:click="close()"  >
<i class="fas fa-times"></i>
</button>

</center>

</div>
</div>
<div class="modal-body">

<div class="input-group  col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-cube"></i></span>
</div>
<input required="" type="text" v-model="Rtarea.nombre_tarea"   class="form-control" placeholder="Nombre de tarea">
</div>



<div class="input-group  col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-vector-square"></i></span>
</div>
<input  title="ObJETIVO"   type="text" v-model="Rtarea.objetivo_tarea"   class="form-control" placeholder="Objetivo">
</div>



<div class="input-group  col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-clock"></i></span>
</div>
<input required=""  title="Fecha inicio"   type="date" v-model="Rtarea.fecha_inicio"   class="form-control" placeholder="Fecha inicio">
</div>


<div class="input-group  col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-flag-checkered"></i></span>
</div>
<input required="" title="Fecha termino"   type="date" v-model="Rtarea.fecha_termino"   class="form-control" placeholder="Fecha termino">
</div>




<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text">
<i class="fas fa-project-diagram"></i>
</span>
</div>
<select required="" v-model="Rtarea.tipo_tarea" class="form-control">
<option selected="" value="">Tipo de tarea</option>
<option value="Imagen">Imagen</option>
<option value="Proceso">Proceso</option>
<option value="Cambio">Cambio</option>
</select>
</div>


<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="far fa-chart-bar"></i>  </span>
</div>
<select required="" v-model="Rtarea.prioridad_tarea"  class="form-control">
  <option selected="" value="" > Seleccione prioridad  </option>
<option value="ALTA">Alta / Rojo</option>
<option value="MEDIA">Media / Amarillo</option>
<option value="BAJA">Baja / Verde</option>
</select>
</div>

 <div class="input-group col-sm-12"  >
<div class="input-group-prepend"   >
<span style="width: 35px"  class="input-group-text"><i class="fas fa-user-shield"></i>  </span>
</div>

@{{lista_users}}

<select required=""   v-model="Rtarea.empleado_id" class="form-control">

<option selected="" value="" > Seleccione empleado  </option>
<option v-for="item in lista_users"  :value="item.id"  > @{{item.name }}    @{{item.apellido}} 


</select>


</div>
<div class="input-group col-sm-12">
<div  class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-comment"></i>   </span>
</div>
<textarea  v-model="Rtarea.comentario" class="form-control"  placeholder="comentarios"></textarea>
</div>
<!--  
<div class="col-sm-12">
<center>
<img width="500" height="500"  class="img-thumbnail" src="img/img.png">
</center>
<p class="text-info">Sube una imagen sobre esta tarea</p>
</div>
-->



<div class="modal-footer">
<div class="btn btn-group  ">
<div  id="loader-create-tarea"  class="loader loader-sm"></div>
<button  id="btn-create-tarea"  type="submit"  class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>
</form>
</div>
</div>
</div>
</div>
</div>
