
@extends('layouts.app')

@section('content')

<div id="AppClientes"    class="content col-sm-12 " >
@include('layouts.clientes.create')

</div>



<div id="AppProyectos"    class="content col-sm-12 " >
<template id="listas">

<div  class="col-sm-12">




<strong  style="font-size: 16px;" class="float-left text-info"> 
<i class="fas fa-globe-americas"></i>

  Proyectos en proceso   

</strong> </h3>


<div  id="loader-lista-principal" class="loader loader-sm float-right"></div>

<button title="Nuevo proyecto" class="btn btn-light  rounded-circle float-right " data-toggle="modal" data-target=".nuevoProyecto"> <i class="fas fa-plus"></i>   </button>
</p>
</div>





<div   id="lista_proceso"  class="col-sm-12 row ">


<template v-if="lista_principal.length <=  0">

<div  class="col-sm-6">
<div class="card borde-burble alert-warning" >
<div class="container alert ">

<p align="center">
<h6> <strong> <i class="fas fa-exclamation-circle"></i> No hay proyectos en proceso</strong>  </h6>
</p>
</div>
</div>
<div class="btn-group float-right button-absolute " >
<div    data-toggle="modal" data-target=".nuevoProyecto" class=" btn btn-light border border-dark btn-sm rounded-circle"  >
<i style="font-size: 13px;" class="fas fa-plus-circle"></i>
</div>
</div>
</div>
<!-- TARJETA -->

</template>




<template   v-sortable="{ onUpdate: onUpdate }">

<div   :id="item.proyectos_id"  v-for="(item, A) in lista_principal"  class="col-sm-6 item_proceso">
<div   class="container-fluid      borde-burble border bg-light">
<p>
<h4 class="proyecto-min" align="left"> 
<a :href="'{{url('detalle/')}}'+'/'+ item.proyectos.id " >
<strong  >  
     @{{item.proyectos.nombre}}
</strong>   
</a>

<small class="comentarios-proyecto float-right" aling="right">     
  @{{item.proyectos.comentario}} ...
</small> 
</h4>


</p>
<h6 class="empresa-min" align="left"><strong>  @{{item.proyectos.clientes.nombre}}  </strong> <small class="float-right text-info" aling="right"> <strong>  @{{item.proyectos.fecha_entrega}}  </strong></small></h6>





<template v-if="item.proyectos.tareas ==false" >
<p    class="border  tarea container-fluid"  align="left">

<p align="center" class="">
<i class="fas fa-exclamation-circle text-warning"></i>
No existen tareas registradas
</p>


</p>

</template>






<template   v-for="(tarea, B) in item.proyectos.tareas" >


<div    :class="tarea.prioridad"> 

<div class="row">
<div class="col">

 @{{tarea.nombre}} 


</div>
<div class="col ">

<div  class="btn-group">

<i style="margin-left: 4%; margin-right: 4%;" :class="' fas fa-circle  iconos '+tarea.estado"  title="Estado"></i>  





<img  style="margin-top: 0px;  margin-left: 4%; margin-right: 4%;" v-if="users[A][B].foto"   width="15" height="15" class=" rounded-circle "  :src="'/img/users/fotos/'+ users[A][B].foto "   alt="Card image cap">


<img style="margin-top: 0px;  margin-left: 4%; margin-right: 4%;"  v-else   width="15" height="15" class="border rounded-circle "  src="img/user.png" alt="Card image cap">




</div>



</div>
<div class="col">

@{{tarea.comentario }} ...



<i  @click="show_tarea(tarea ,users[A][B])" style="margin-top: 2%;  margin-left: 4%; margin-right: 4%;"  class="fas fa-pen-square float-right"></i>
</div>
</div>
</div>

</template>




<hr>
<div class="btn-group float-right" >
<div title="Imagenes" class="button-collapse btn-sm"   id="button-collapse" data-toggle="collapse" v-bind:href="'#collapseExample'+ item.id"  aria-expanded="false" aria-controls="collapseExample" role="button">
<i style="font-size: 12px" class="fas fa-chevron-down" ></i>
</div>






<div title="Nueva tarea" class="button-collapse btn-sm " aria-expanded="false"  id="button-collapse"  data-toggle="modal"

:data-target="'#modal_'+item.proyectos_id"  role="button">
<i style="font-size: 12px" class="fas fa-plus-circle"></i>
</div>


<div title="Eliminar" v-on:click="confirmar_delete_principal(item)"   class=" btn-sm " aria-expanded="false" id="button-collapse">
<i  style="font-size: 12px" class="fas fa-trash"></i>
</div>

</div>


<hr class="invisible">

<div class="collapse " v-bind:id="'collapseExample'+ item.id">
<div class="col-sm-12 img-group">




<div class="text-center">
<template   v-for="(tarea, i) in item.proyectos.tareas" >



<img width="120" v-if="tarea.imagen"   :src="'{{url ('/img/tareas/fotos/')}}'+'/' +tarea.imagen"  class="img-fluid zoom-panel">

<img width="120" v-else  src="img/pieza.png"  class="img-fluid zoom-panel" alt="...">




</template>
</div>


</div>
</div>


</template>




</div>

<!-- CIERRE PROYECTO -->
<!-- PROYECTO -->







</div>








<div  class="col-sm-12">
<hr>

<div  id="loader-lista-espera" class="loader loader-sm float-right"></div>
<p class="text-info"  style="font-size: 16px;" align="left" ><strong>

<i class="fas fa-globe-americas"></i>
 Proyectos en espera    </strong>         
<hr>   


</p>   
</div>


<!-- SUBPROYECTOS -->

<div   id="lista_espera"  class="row col-sm-12 "   >
<!-- TARJETA -->
<template v-if="lista_espera.length <=  0">
<div  class="col-sm-2">
<div class="card borde-burble alert-warning" >
<div class="container alert ">
<p align="center">
<h6> <strong> <i class="fas fa-exclamation-circle"></i> No hay proyectos en espera </strong>  </h6>
</p>
</div>
</div>
<div class="btn-group float-right button-absolute " >
<div    data-toggle="modal" data-target=".nuevoProyecto" class=" btn btn-light border border-dark btn-sm rounded-circle"  >
<i style="font-size: 13px;" class="fas fa-plus-circle"></i>
</div>
</div>
</div>
<!-- TARJETA -->
</template>




<template   v-sortable="{ onUpdate: onUpdate }">
<div   :id="item.proyectos_id" v-bind:value="item.proyectos_id"    v-for="item in lista_espera"   class="col-sm item_espera">

 
<div style="max-width: 150px; margin-right: none;" class="card borde-burble bg-light item " >
<div class="container titulo-espera" >
<p align="left">

<strong class="proyecto-min ">

<a :href="'{{url('detalle/')}}'+'/'+ item.proyectos_id " >
<strong style="font-size: 11px;"  >  
<i class="fas fa-angle-double-right"></i>
     @{{item.nombre_proyecto}}
</strong>   
</a>




</strong>


<p style="font-size: 10px;"  class="empresa-min" align="left">
 <strong>   @{{item.nombre_empresa}} </strong> 
</p>
</p>
</div>

<div class="container" >

</div>

<div class="container" >

 <strong class="float-left" style="font-size:10px; margin: 0px;"> @{{item.fecha_entrega}} </strong> 

<div  style=" margin-left: 90%;" v-on:click="confirmar_delete_espera(item)"  class=" btn-sm  "  >


<i class="fas fa-trash "></i>


</div>

</div>

</div>


</div>
 </template><!--LISTADO TERMINA-->


<!-- TARJETA -->


</template>














<!-- MODAL NUEVO PROYECTO  -->
<div   class="modal fade nuevoProyecto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

<div class="modal-dialog modal-sm-8">
<div id="AppProyectos"   class="modal-content">
<form method="GET" class="hidden" role="form"  v-on:submit.prevent="submit(this)"  >
<div class="modal-header ">
<div class="col-sm-12 text-primary">
<i class="fas fa-cube"></i>
<strong>
Registrar un nuevo proyecto
</strong>
<button type="button" class="close float-right" data-dismiss="modal">&times;</button>
</div>
</div>
<div  class="modal-body">
 <div class="input-group col-sm-12">
<div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i  class="fas fa-briefcase"></i> </span>
    </div>
 
<select required="" autocomplete="off"  v-model="Rproyecto.cliente_id" class="form-control">

<option value="" selected="">Cliente / Empresa</option>

@if ( isset($clientes)==true   )
@foreach( $clientes as $cliente)
<option value="{{$cliente->id}}"  > {{$cliente->nombre}}</option>
@endforeach


@else
<option value="">Seleccione un cliente</option>



@endif
</select>

</div>



 <div class="input-group  col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-cube"></i></span>
</div>
<input  autocomplete="off" required="" v-model="Rproyecto.nombre_proyecto" type="text" class="form-control" placeholder="Nombre de proyecto">
</div>


<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-clock"></i>  </span>
</div>
<input  autocomplete="off" title="Fecha recepcion" required="" v-model="Rproyecto.fecha_recepcion" type="date" class="form-control" placeholder="Fecha de entrega">
</div>



<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fab fa-font-awesome-flag"></i>  </span>
</div>
<input  autocomplete="off"  title="Fecha entrega"   required="" v-model="Rproyecto.fecha_entrega" type="date" class="form-control" placeholder="Fecha de entrega">
</div>




<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-dollar-sign"></i>   </span>
</div>
<input  autocomplete="off" required="" v-model="Rproyecto.presupuesto" type="number" min="100" max="5000000"   class="form-control" placeholder="Presupuesto">
</div>


<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text"><i class="fas fa-comments"></i> </span>
</div>


<textarea autocomplete="off" required="" v-model="Rproyecto.comentario" class="form-control" placeholder="Comentarios..."></textarea>
</div>
 </div>


<div  class="modal-footer">
<div  class="btn btn-group  ">
<div id="carga-proyecto" class="loader loader-sm "></div>
<button class="btn btn-light btn-sm " type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>

<button id="btn-proyecto"  class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>


</form>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL NUEVO PROYECTO  -->








<template v-for="(item, index) in lista_principal">
<!-- MODAL NUEVA TAREA -->

<div   class="modal fade nuevaTarea"  v-bind:id="'modal_'+ item.proyectos_id"    tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm-8">
<div  id="AppProyectos"   class="modal-content">
<form method="GET" class="hidden" role="form"  v-on:submit.prevent="enviar_tarea(item.proyectos_id)"  >
<div class="modal-header ">
<div class="col-sm-12 text-primary">
<i class="fas fa-suitcase"></i>
<strong>
Registrar un nueva tarea
</strong>
<button type="button" class="close float-right" data-dismiss="modal">&times;</button>
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


<select required=""   v-model="Rtarea.empleado_id" class="form-control">

<option selected="" value="" > Seleccione empleado  </option>
<option v-for="item in lista_users"  :value="item.id"  > @{{item.name }}  @{{item.apellido}} 


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
<div  :id="'loader_'+item.proyectos_id"   class="loader loader-sm loader-tarea"></div>
<button class="btn btn-light btn-sm " type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>
<button type="submit"  :id="'btn-tarea_'+item.proyectos_id"   class="btn btn-success btn-sm btn-tarea" type="button"  >
<i class="fas fa-save "></i>
</button>
</form>
</div>
</div>
</div>
</div>
</div>

<!-- MODAL NUEVA TAREA -->

</template>












<!-- MODAL EDITAR TAREA-->
<div  class="modal fade "  id="edit_tarea"  tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div  class="modal-dialog ">
<div class="modal-content ">
<form   autocomplete="off" method="GET" class="hidden"   @submit.prevent="updateTarea(Rtarea.id)"  >
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



<img  v-if="Rtarea.empleado_foto" class="border rounded-circle "  width="120" height="120" class=""  :src="'/img/users/fotos/' +Rtarea.empleado_foto" alt="Card image cap">




<img v-else  src="{{ url('img/user.png') }} "    width="120" height="120" class="border rounded-circle " >



</center>

<div  class="text-center">
<p>

Empleado encargado:
@{{Rtarea.empleado_nombre}}  @{{Rtarea.empleado_apellido}}
 


</p>
</div>
</div>
</div>






  <div class="col-sm-6   form-group">
  <strong>Nombre</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" >
          <i class="fas fa-briefcase"></i>
      </span>
        </div>
        <input :disabled="state_tarea == 0" v-model="Rtarea.nombre" type="text" class="form-control" id="validationDefaultUsername" placeholder="Nombre proyecto"  required>
      </div>
  </div>


  <div class="col-sm-6   form-group">
 <strong>Tipo</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" >
<i class="fas fa-sort-numeric-up"></i>
      </span>
        </div>
        <input :disabled="state_tarea  == 0" v-model="Rtarea.tipo" type="text" class="form-control"  placeholder="Tipo" required>
      </div>
  </div>


  <div class="col-sm-6   form-group">
   <strong>Fecha inicio</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" >
  <i class="fas fa-clock"></i>
      </span>
        </div>

    <input v-if="Rtarea.fecha_inicio"  :disabled="state_tarea  == 0" v-model="Rtarea.fecha_inicio" type="text" class="form-control" id="validationDefaultUsername" placeholder="Fecha entrega"  required>

    

    <input v-else  :disabled="state_tarea  == 0" v-model="Rtarea.fecha_inicio" type="date" class="form-control" placeholder="Fecha entrega" aria-describedby="inputGroupPrepend2" >



      </div>
  </div>


  <div class="col-sm-6   form-group">
 <strong>Fecha termino</strong> 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
  <i class="fas fa-clock"></i>
      </span>
        </div>


       <input v-if="Rtarea.fecha_termino"  :disabled="state_tarea  == 0" v-model="Rtarea.fecha_inicio" type="text" class="form-control" id="validationDefaultUsername" placeholder="Fecha entrega">

    

    <input v-else  :disabled="state_tarea  == 0" v-model="Rtarea.fecha_termino" type="date" class="form-control" id="validationDefaultUsername" placeholder="Fecha entrega" required>





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
        <input :disabled="state_tarea  == 0" v-model="Rtarea.prioridad" type="text" class="form-control" id="validationDefaultUsername" placeholder="Prioridad" required>
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
        <input :disabled="state_tarea  == 0" v-model="Rtarea.estado" type="text" class="form-control"  placeholder="Estado"required>
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

<textarea :disabled="state_tarea  == 0" v-model="Rtarea.comentario"  class="form-control" rows="2" id="comment"></textarea>
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
<div  id="loader-details-tarea"  class="loader loader-sm"></div>
<button  id="btn-details-tarea" :disabled="state_tarea  == 0"  type="submit"  class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL EDITAR TAREA-->













</div>






























@endsection
