@extends('layouts.app')

@section('content')

<script src="{{ asset('js/mi_cuenta.js') }}" defer></script>


  


<div  id="Mi_cuenta"  class="content">

<div class="col-sm-12">
<div style="padding-left: 1%; " align="left" class="text-info">
<h5><i class="fas fa-search"></i> 
Busqueda
</h5>


</div>
</div>



<div    class="row">
<div class="col-sm-3">
<i class="fas fa-filter"></i> Filtros

<div style="height: 50px;" class="card">
Proyectos terminados
</div>
<div style="height: 50px;" class="card">
Proyectos en espera
</div>
<div style="height: 50px;" class="card">
Proyectos en espera
</div>

</div>


<div class="col-sm-9">
  <p class="primary"><i class="fas fa-poll-h"></i> Resultados de la busqueda</p>            
  <table class="table table-borderless">
    <thead>
      <tr>
        <th>Empresa</th>
        <th>Proyecto</th>
        <th>Nº tareas</th>
        <th>Fecha entrega</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
           <td>john@example.com</td>
        <td>
<div class="dropdown">
<button class="btn btn-light btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown">
<i class="fas fa-cogs"></i></button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item"    >Detalles</a>
<a class="dropdown-item"    > Eliminar</a>
</div>
</div>  
</td>
</tr>

</tbody>
</table>
<hr>

</div>


</div>
@include('layouts.projects.edit')


</div>




@endsection
