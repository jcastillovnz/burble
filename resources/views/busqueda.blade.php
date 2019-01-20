@extends('layouts.app')

@section('content')

<script src="{{ asset('js/busqueda.js') }}" defer></script>

  


<div    >

<div class="col-sm-12">
<div style="padding-left: 1%; " align="left" class="">
<h5><i class="fas fa-search text-info"></i> 
Busqueda
</h5>


</div>
</div>




<div    class="row">
<div class="col-sm-3">
<i class="fas fa-filter text-info"></i> Filtros
<!--  
<div style="height: 50px;" class="card">
Proyectos terminados
</div>
<div style="height: 50px;" class="card">
Proyectos en espera
</div>
<div style="height: 50px;" class="card">
Proyectos en espera
</div>
-->
</div>


<div id="buscar"  class="col-sm-9">
  <p class="font-weight-normal"><i class="fas fa-poll-h text-info"></i> Resultados de la busqueda</p>
<div >    




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
<a class="dropdown-item"   >Detalles</a>
<a class="dropdown-item"   > Eliminar</a>
</div>
</div>  
</td>
</tr>



</tbody>
</table>




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




</div>


</div>
@include('layouts.projects.edit')


</div>




@endsection
