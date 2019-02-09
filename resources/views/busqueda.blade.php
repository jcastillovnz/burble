@extends('layouts.app')

@section('content')

<div id="AppClientes"    class="content container col-sm-12 " >
@include('layouts.clientes.create')
</div>





<script src="{{ asset('js/busqueda.js') }}" defer></script>


<div    >

<div class="col-sm-12">
<div style="padding-left: 1%; " align="left" class="">
<h5><i class="fas fa-search text-info"></i> 
Busqueda
</h5>


</div>
</div>




<div    class="content">
  <!--  
<div class="col-sm-3">
  <p align="center">
<i class="fas fa-filter text-info"></i> Filtros
</p>



</div>

<hr>
-->





<div id="buscar"  class="col-sm-12 ">



<div  id="loader-busqueda"   class="loader loader-sm float-left"></div>


<p class="font-weight-normal" align="center">

@if( $state=="archivo"   )

<i class="fas fa-database text-info"></i>  Proyectos archivados @{{pagination.total}}  </p>

@else
<i class="fas fa-poll-h text-info"></i> Resultados de la busqueda</p>


@endif
<div >    

<div class="table table-responsive">


<template v-if="resultados.length == 0">  
<div  class="col-sm-12">
<div class="card borde-burble alert-warning" >
<div class=" alert content">
<p align="center" style=" margin-top: 2%;   margin-bottom: 5%;">

  
<h6> <strong> <i class="fas fa-exclamation-circle"></i> No existen resultados</strong>  </h6>


</p>
</div>
</div>
</div>
</template>

<template v-else>

  <table class="table table-borderless">





    <thead>
      <tr  >
  
        <th>Proyecto</th>
        <th>Empresa</th>
        <th>Nº tareas</th>
        <th>Fecha entrega</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody>



      <tr v-for="proyecto  in resultados" >
   
        <td>@{{proyecto.nombre}} </td>
        <td> @{{proyecto.clientes.nombre}}  </td>
        <td>@{{proyecto.tareas.length}}</td>
        <td>@{{proyecto.fecha_entrega}}</td>
        <td>
<div class="dropdown">
<button class="btn btn-light btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown">
<i class="fas fa-cogs"></i></button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

<a class="dropdown-item" v-on:click="show_proyecto(proyecto)"  >Detalles</a>  
<a class="dropdown-item" v-on:click="add_espera(proyecto)"  >Enviar a espera</a>
<a class="dropdown-item"  v-on:click="eliminar(proyecto)"  > Eliminar</a>
</div>
</div>  
</td>
</tr>



</tbody>
</table>

</div>


</div> 

<hr>


<nav aria-label="Page navigation example ">
  
<ul class="pagination pagination-sm justify-content-center">
<li v-if="pagination.current_page >1"  class="page-item ">  
<a  @click.prevent="changePage(pagination.current_page - 1)"  class="page-link"  href=""><i class="fas fa-chevron-left"></i></a>
</li>


<li v-for="page in  pagesNumber"  v-bind:class="'page-item '+[page== isActived ?  'active': '' ]  "    >  
<a @click.prevent="changePage(page)"    class="page-link"  href="">
@{{page}}
</a>
</li>



<li v-if="pagination.current_page <pagination.last_page"   class="page-item">  
<a @click.prevent="changePage(pagination.current_page + 1)"   class="page-link"  href=""><i class="fas fa-chevron-right"></i></a>
</li>


</ul>


</nav>


</template>

<!--  

-->



</div>


</div>

@include('layouts.projects.edit')

</div>




@endsection
