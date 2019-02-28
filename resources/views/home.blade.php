
@extends('layouts.app')

@section('content')
<div id="AppClientes"  >
@include('layouts.clientes.create')
</div>

 
<div id="AppProyectos"   >
@include('layouts.tareas.create')

</div>




<div id="AppProyectos"   class="content col-sm-12 " >

<template id="listas">
<div  style="margin-bottom: 4%;" class="col-sm-12">
<strong  style="font-size: 18px;" class="float-left text-info"> 
<i class="fas fa-globe-americas"></i>
  Proyectos en proceso   
</strong> 


<div  id="loader-lista-principal" class="loader loader-sm float-right"></div>
<button  id="btn-create-proyecto"   title="Nuevo proyecto" class="btn btn-light  rounded-circle float-right " data-toggle="modal" data-target=".nuevoProyecto"> <i class="fas fa-plus"></i>   </button>
</p>
</div>

</div>




<div  style=" margin-left: 2px;   max-width: 2000px;" id="lista_proceso"  class="row  col-sm-12 ">


<template v-if="lista_principal.length <=  0">

<div    class="col-sm-6">
<div class="card borde-burble alert-warning" >
<div class="container alert ">

<p align="center">
<h6> <strong> <i class="fas fa-exclamation-circle"></i> No hay proyectos en proceso</strong>  </h6>
</p>
</div>
</div>
<div class="btn-group float-right button-absolute  " >
<div    data-toggle="modal" data-target=".nuevoProyecto" class=" btn btn-light btn-sm border border-dark btn-sm rounded-circle"  >
<i style="font-size: 13px;" class="fas fa-plus-circle"></i>
</div>
</div>
</div>
<!-- TARJETA -->

</template>




<template v-for="(item, A) in lista_principal"  v-sortable="{ onUpdate: onUpdate }">

<div   :id="item.proyectos_id"    class="col-sm-6 box-lg item_proceso">
<div   class="container-fluid borde-burble border bg-light">
<p style="margin-top: 3px;  margin-bottom: 1px;"  >
<h4  style="font-size: 13px;  " class="" align="left"> 
<a style="margin-bottom: 1px;" :href="'{{url('detalle/')}}'+'/'+ item.proyectos.id " >
<strong  >  
     @{{item.proyectos.nombre}}
</strong>   
</a>

<small style="font-size: 11px;  margin-bottom: 1px;  " class=" float-right" aling="right">     
  @{{item.proyectos.comentario}} ...
</small> 
</h4>


</p>
<h6 style="font-size: 12px; margin-top: 3px;  margin-bottom: 1px;" class="" align="left"><strong>  @{{item.proyectos.clientes.nombre}}  </strong> <small class="float-right text-info" aling="right"> <strong>  @{{item.proyectos.fecha_entrega}}  </strong></small></h6>





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
<p style="padding: none; margin-bottom: 0px; margin-left: 3px;  font-size: 11px;" align="left">
 @{{tarea.nombre}} 

</p>
</div>
<div class="col ">

<div  class="btn-group">

<i style="margin-left: 4%; margin-right: 4%;" :class="' fas fa-circle  iconos '+tarea.estado"  title="Estado" ></i>  







<img  data-toggle="tooltip"  v-bind:title="users[A][B].name+' '+ users[A][B].apellido" style="margin-top: 0px;      margin-left: 4%; margin-right: 4%;" v-if="users[A][B].foto!=null"   width="15" height="15" class=" rounded-circle "  :src="'/img/users/fotos/'+ users[A][B].foto "   alt="Card image cap">


<img data-toggle="tooltip" v-bind:title="users[A][B].name+' '+ users[A][B].apellido"  style="margin-top: 0px;  margin-left: 4%; margin-right: 4%;"  v-else   width="15" height="15" class="border rounded-circle "  src="img/user.png" alt="Card image cap">






</div>



</div>
<div class="col">

<span style="margin-bottom:0px; margin-left: 0px; margin-top: 0px;" align="left">
@{{tarea.comentario }} ...
</span>


<i  title="Editar" @click="show_tarea(tarea ,users[A][B])" style="margin-top: 2%;  margin-left: 4%; margin-right: 4%;"  class="fas fa-pen-square float-right"></i>
</div>
</div>
</div>

</template>




<hr>
<div class="btn-group float-right" >
<div title="Imagenes" class="button-collapse btn-sm"   id="button-collapse" data-toggle="collapse" v-bind:href="'#collapseExample'+ item.id"  aria-expanded="false" aria-controls="collapseExample" role="button">
<i style="font-size: 12px" class="fas fa-chevron-down" ></i>
</div>






<div title="Nueva tarea" class="button-collapse btn-sm " v-on:click="nueva_tarea(item)"   id="button-collapse"  role="button">
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










<!-- TABS -->
<div  id="lista_espera" style=" " style="" class="col-sm-12 container ">  

<div   style="margin.right: 90px;  padding-left:62px;  padding-right:62px;"   id="seccion_espera"  class="col-sm-12">
 <!-- Nav tabs -->


<a id="archivo" href=" {{ asset('/proyectos-archivados/')  }}  ">
<span style="margin:0px; font-size: 15px; " class="float-right">
<i class="fas fa-database"></i> Archivados 
<span>  @{{countProyectos}}  </span>
</span>
</a>

<ul class="nav nav-tabs" role="tablist">



<template v-for="(item, index ) in lista_espera" >


<li class="nav-item ">
<a class="nav-link " data-toggle="tab" v-bind:href="'#menu'+index"> @{{item.proyectos.clientes.nombre}} x </a> 
</li>



</template>




<li class="nav-item">

<button  class="btn btn-light   rounded-circle float-right "> 
<i class="fas fa-plus"></i>
</button>

</li>

</ul>

 <!-- Tab panes -->
 <div    class="tab-content ">


 	<template v-for="(item, index ) in lista_espera" >

   <div v-bind:id="'menu'+index" class="container tab-pane fade"><br>
      <h3>HOME @{{index}} </h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
 </template>

</div>
</div>

 </div>

<!-- TABS -->










</div>





@endsection
