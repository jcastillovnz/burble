
<div   class="">
<!-- SUBPROYECTOS -->
<div    style=" margin: 0px; " id="lista_espera"   class="row  col-sm-12 ">



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




<template    v-for="item in lista_espera"  v-sortable="{ onUpdate: onUpdate }">

<div  style="margin-left: 0px; margin-right: 0px;  padding-left: none; padding-right: 0px; width: auto;"   :id="item.proyectos_id" v-bind:value="item.proyectos_id"    class="box  item_espera ">


<div  style=" margin-left: 5px; margin-right: 0px;  padding-left: none; padding-right: 0px; float: left;"  align="left"  class="card borde-burble bg-light box-sm" >
<div class="container titulo-espera" >
<p align="left">
<strong class="proyecto-min ">
<a :href="'{{url('detalle/')}}'+'/'+ item.proyectos_id " >
<strong style="font-size: 11px;"  >  
<i class="fas fa-thumbtack"></i>
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
<div  style=" margin-left: 90%; font-size: 10px;" v-on:click="confirmar_delete_espera(item)"  class=" btn-sm  "  >
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