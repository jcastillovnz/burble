
@extends('layouts.app')

@section('content')


<script src="{{ asset('js/cliente.js') }}" defer></script>
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

<div    class="col-sm-6" >
<div  class="card borde-burble alert-warning" >
<div style="margin-top: 20px; margin-bottom: 20px;"  class="container alert ">

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

<div   :id="item.proyectos_id"     class="col-sm-6 box-lg item_proceso">
<div   class="container-fluid borde-burble border bg-light">
<p style="margin-top: 3px;  margin-bottom: 1px;"  >
<h4  style="font-size: 13px;  " class="" align="left"> 
<a style="margin-bottom: 1px;" :href="'{{url('proyecto/')}}'+'/'+ item.proyectos.id " >
<strong  >  
     @{{item.proyectos.nombre}}

     @{{item.proyectos.id}} 
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

<div     :class="tarea.prioridad"> 

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
<div title="Imagenes" class="button-collapse btn btn-light btn-sm"   id="button-collapse" data-toggle="collapse" v-bind:href="'#collapseExample'+ item.id"  aria-expanded="false" aria-controls="collapseExample" role="button">
<i style="font-size: 12px" class="fas fa-chevron-down" ></i>
</div>






<div title="Nueva tarea" class="button-collapse btn btn-light btn-sm" v-on:click="nueva_tarea(item)"   id="button-collapse"  role="button">
<i style="font-size: 12px" class="fas fa-plus-circle"></i>
</div>


<div title="enviar a lista de espera" class="button-collapse btn btn-light btn-sm" v-on:click="principal_espera(item.proyectos)"   id="button-collapse"  role="button">
<i style="font-size: 12px" class="fas fa-sort-amount-down"></i>

</div>




<div title="Eliminar" v-on:click="confirmar_delete_principal(item)"   class=" btn btn-light btn-sm " aria-expanded="false" id="button-collapse">
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




@include('layouts.tareas.edit')
</div>









<!-- TABS -->
<div   style=" " style="" class="col-sm-12 ">  



<div      id="seccion_espera"  >
 <!-- Nav tabs -->

<a id="archivo" href=" {{ asset('/proyectos-archivados/')  }}  ">
<span style="margin:0px; font-size: 15px; " class="float-right">
<i class="fas fa-database"></i> Archivados 
<span>  @{{countProyectos}}  </span>
</span>
</a>




<ul class="nav nav-tabs"  id="navs_espera" role="tablist">

<template v-if="lista_espera.length==0" >
<li  class="nav-item ">
<a style="border-radius:4px;"  class="nav-link active"   data-toggle="tab" >Agregar un cliente</a> 
</li>
</template>






<li class="nav-item  handle" v-for="(item, index ) in lista_espera"  :id="item.clientes.id" v-bind:value="item.proyectos_id"  :key="item.clientes.id">




<a  style="border-radius:4px;"  :id="'nav_'+index"    :key="item.clientes.id" class="nav-link item-nav" 
  data-toggle="tab"   v-bind:href="'#nav'+item.clientes.id"> @{{item.clientes.nombre}}      <span  v-on:click="confirmar_delete_espera(item.clientes)" class="">x</span></a> 



 
</li>




<li class="nav-item">
<button @click.prevent="create_pestana()"   class="btn btn-light   rounded-circle float-right "> 
<i class="fas fa-plus"></i>
</button>
</li>



</ul>




 <!-- Tab CONTENT-->
<div     class="tab-content "  >

<template v-if="lista_espera.length==0" >
<div  style="margin-right: 0px; margin-left: 0px; margin-bottom: 0px;"  class="tab-pane fade active show">
<br>
<div  class="card alert-warning" style="width:180px; height:200px;"   >
<div class="card-body">
<h4 style="font-size: 16px; margin-top: 45%" class="card-title "><i class="fas fa-exclamation-circle"></i> Sin clientes</h4>  
 </div>
</div> 
</div>
</template>




<div v-for="(item, index ) in lista_espera" :key="item.clientes.id"  :id="'nav'+item.clientes.id" style="margin-right: 0px; margin-left: 0px;margin-bottom: 0px;" class="tab-pane fade item-tab"  >


@include('layouts.carrusel.index')





</div>







</div>
</div>
</div>
<!-- TABS -->




@include('layouts.projects.create')

@include('layouts.espera.add')	

@include('layouts.projects.edit')










</div>





@endsection
