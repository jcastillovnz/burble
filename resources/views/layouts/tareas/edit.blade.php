
<div  class="modal fade "  id="edit_tarea"  tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div  class="modal-dialog ">
<div class="modal-content ">

<form   autocomplete="off" method="GET" class="hidden"   @submit.prevent="update_tarea()"  >

<div class="modal-header ">
<div class="col-sm-12 text-primary">
<center>
<span style="margin-left:80px;">
<i class="fas fa-info-circle"></i>
<strong>
Informacion de tarea
</strong>
</span>
<button   type="button" class="close float-right"   v-on:click="close_tarea()"  >
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



<img  v-if="Rtarea.empleado_foto" class="border rounded-circle "  width="120" height="120" class=""  :src="'/img/users/fotos/' +Rtarea.empleado_foto" alt="Card image cap">




<img v-else  src="{{ url('img/user.png') }} "    width="120" height="120" class="border rounded-circle "   alt="Card image cap">



</center>

<div  class="text-center">
<p>

Empleado encargado:

@{{Rtarea.empleado_nombre}}  @{{Rtarea.empleado_apellido}}





<select :disabled="state_edit == 0" v-model="Rtarea.empleado_id"   class="form-control">
<option value="">   Seleccione empleado   </option>


<template v-for="user in todos_users">


<option  v-if="user.id==Rtarea.empleado_id"  selected=""  :value="user.id" >@{{user.name}}   @{{user.apellido}} </option>



<option  v-else  :value="user.id" >  @{{user.name}}   @{{user.apellido}} </option>


</template>


</select>




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
        <input :disabled="state_edit == 0" v-model="Rtarea.nombre_tarea" type="text" class="form-control" id="validationDefaultUsername" placeholder="Nombre tareas" aria-describedby="inputGroupPrepend2" required>
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
        <input :disabled="state_edit == 0" v-model="Rtarea.tipo" type="text" class="form-control" id="validationDefaultUsername" placeholder="Tipo" aria-describedby="inputGroupPrepend2" required>
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


    

     <fecha-inicio-tarea  title="Fecha de inicio" :disabled="state_edit == 0" v-model="Rtarea.fecha_inicio" class="form-control"  :config="options"></fecha-inicio-tarea>




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


      



    <date-picker-edit-tarea :disabled="state_edit == 0" title="Fecha de entrega"  placeholder="Fecha de entrega"  v-model="Rtarea.fecha_termino" class="form-control"  :config="options"></date-picker-edit-tarea>

    






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
        <input :disabled="state_edit == 0" v-model="Rtarea.prioridad" type="text" class="form-control"  placeholder="Prioridad" required>
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


   



<select class="form-control" :disabled="state_edit == 0" v-model="Rtarea.estado" >
  
<option v-if="Rtarea.estado=='amarillo' " selected=""  value="amarillo"> En proceso - Amarillo </option>

<option v-else  value="amarillo"> En proceso - Amarillo </option>

<option v-if="Rtarea.estado=='rojo' "  selected="" value="rojo"> Detenido - Rojo </option>

<option v-else   value="rojo"> Detenido - Rojo </option>

<option v-if="Rtarea.estado=='azul' " selected=""  value="azul"> Azul - Finalizado </option>

<option v-else   value="azul"> Azul - Finalizado </option>

<option v-if="Rtarea.estado=='verde' " selected=""  value="verde"> Verde - Esperando </option>

<option v-else  value="verde"> Verde - Esperando </option>

</select>



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
<textarea :disabled="state_edit == 0" v-model="Rtarea.comentario"  class="form-control" rows="2" id="comment"></textarea>
</div>
</div>


<div class="col-sm-12 ">



<div with="300" class="">

<center>
<img  v-if="Rtarea.imagen_tarea"  class="col-sm"  :src="'{{url ('/img/tareas/fotos/')}}'+'/' +Rtarea.imagen_tarea" >
<img v-else class="col-sm"  src="{{url ('img/pieza.png')}} " >
<input ref="imagen" type="file"  value="" class="invisible" @change="cargar_imagen_tarea(this)"   name="">
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
<div  id="loader-edit-tarea"  class="loader loader-sm"></div>
<button  id="btn-edit-tarea" :disabled="state_edit == 0" type="submit"  class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>
</form>
</div>
</div>
</div>
</div>
</div>
