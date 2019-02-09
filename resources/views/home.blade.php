
@extends('layouts.app')

@section('content')
<div id="AppClientes"    class="content container col-sm-12 " >
@include('layouts.clientes.create')
</div>

 
<div id="AppProyectos"     class="content col-sm-12 " >
@include('layouts.tareas.create')

</div>




<div id="AppProyectos"   class="content col-sm-12 " >






<template id="listas">





<div  style="margin-bottom: 4%;" class="col-sm-12">




<strong  style="font-size: 16px;" class="float-left text-info"> 
<i class="fas fa-globe-americas"></i>

  Proyectos en proceso   

</strong> </h3>


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

<i style="margin-left: 4%; margin-right: 4%;" :class="' fas fa-circle  iconos '+tarea.estado"  title="Estado"></i>  







<img  style="margin-top: 0px;  margin-left: 4%; margin-right: 4%;" v-if="users[A][B].foto!=null"   width="15" height="15" class=" rounded-circle "  :src="'/img/users/fotos/'+ users[A][B].foto "   alt="Card image cap">


<img style="margin-top: 0px;  margin-left: 4%; margin-right: 4%;"  v-else   width="15" height="15" class="border rounded-circle "  src="img/user.png" alt="Card image cap">






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







<div  class="col-sm-12">
<hr>

<div  style="margin-left: 10px;" id="loader-lista-espera" class="loader loader-sm float-right"></div>
<p class="text-info"  style="font-size: 16px; " align="left" ><strong>

<i class="fas fa-globe-americas"></i>
 Proyectos en espera    </strong>      





<a id="archivo" href=" {{ asset('/proyectos-archivados/')  }}  ">
<span    style="margin:0px; font-size: 15px; " class="float-right">
  <i class="fas fa-database"></i> Archivados 


<span   >  @{{countProyectos}}  </span>


</span>
</a>

       

<hr>   

    
</p>   
</div>


<!-- SUBPROYECTOS -->
<div  style=" margin-left: 2px;" id="lista_espera"   class="row  col-sm-12 ">

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
<div    data-toggle="modal" data-target=".nuevoProyecto" class=" btn btn-light border border-dark  rounded-circle"  >
<i style="font-size: 13px;" class="fas fa-plus-circle"></i>
</div>
</div>
</div>
<!-- TARJETA -->
</template>




<template   v-for="item in lista_espera"  v-sortable="{ onUpdate: onUpdate }">




<div   :id="item.proyectos_id" v-bind:value="item.proyectos_id"    class="col-sm item_espera ">
<div  class="card borde-burble bg-light box-sm" >
<div class="container titulo-espera" >
<p align="left">
<strong class="proyecto-min ">
<a :href="'{{url('detalle/')}}'+'/'+ item.proyectos_id " >
<strong style="font-size: 11px;"  >  
<i class="fas fa-angle-double-right"></i>
@{{item.proyectos.nombre }}
</strong>   
</a>
</strong>
<p style="font-size: 10px;"  class="empresa-min" align="left">
 <strong>   @{{item.proyectos.clientes.nombre }} </strong> 
</p>
</p>
</div>
<div class="container" >
<strong class="float-left" style="font-size:10px; margin: 0px;">  @{{item.proyectos.fecha_entrega }} </strong> 
<div  style=" margin-left: 90%;" v-on:click="confirmar_delete_espera(item)"  class=" btn-sm  "  >
<i class="fas fa-trash "></i>
</div>
</div>
</div>
</div>




 </template><!--LISTADO TERMINA-->


<!-- TARJETA -->


</template>





@include('layouts.projects.create')


<div id="AppProyectos">
@include('layouts.tareas.edit')
</div>



</div>

















@endsection
