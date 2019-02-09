@extends('layouts.app')

@section('content')




<div class="row content ">


 <div  id="AppClientes"  class="col-sm-4">

<div class="container">
<p align="center">


 <strong  style="font-size: 18px;"> Clientes</strong>   


 <button  title="Nuevo usuario"  class="btn btn-light  btn-sm rounded-circle float-right" data-toggle="modal"data-target=".nuevoCliente"><i class="fas fa-plus"></i> </button>

</p>


</div>


@include('layouts.clientes.edit')
@include('layouts.clientes.create')











<div    class="table  table-responsive" >
<table   class="table table-lg table-borderless table-hover">
<thead>
<tr >
<th scope="col"># </th>
<th scope="col" >Cliente</th>
<th scope="col">Pais</th>
<th scope="col">Accion</th>

</tr>
</thead>
<tbody >
<tr   v-for="(item, key) in lists"  >
<th scope="row"  >

@{{item.id}}
</th> 
<td> 
@{{item.nombre}}
</td>

<td>
@{{item.pais}}
</td>

<td>
<div class="dropdown">
<button class="btn btn-light btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown"  >
<i class="fas fa-cogs"></i>
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" v-on:click.prevent="mostrar(item)"    >Detalles</a>
<a class="dropdown-item"   v-on:click.prevent="borrar(item)"  > Eliminar</a>
</div>
</div>
</td>
</tr>
</tbody>
</table>




<hr>


<nav aria-label="Page navigation example ">
<ul class="pagination pagination-sm justify-content-center">
<li v-if="pagination.current_page >1"  class="page-item ">  
<a  @click.prevent="changePage(pagination.current_page - 1)"  class="page-link"  href=""><i class="fas fa-chevron-left"></i></a>
</li>
<li v-for="page in  pagesNumber"  v-bind:class="'page-item '+[page== isActived ?  'active': '' ]  ">  
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










  <div  id="AppUsuarios"  class="col-sm-8">

<p align="center">
 <strong style="font-size: 18px;">    Usuarios</strong>   


 <button  title="Nuevo usuario"  class="btn btn-light  btn-sm rounded-circle float-right" data-toggle="modal"data-target=".nuevoUsuario"><i class="fas fa-plus"></i> </button>

</p>





<div    class="table  table-responsive" >





<table   class="table table-lg table-borderless table-hover">
<thead>
<tr>
<th scope="col">#  </th>
<th scope="col" >  Foto    </th>
<th scope="col">Nombre</th>
<th scope="col">Apellido</th>
<th scope="col">Rango</th>
<th scope="col">Accion</th>


</tr>
</thead>
<tbody >
<tr v-for="(item, key) in lists"   >
<th scope="row"   > @{{item.id}} </th> 
<td> 
<img   v-if="item.foto"  width="35" height="35" class=" rounded-circle "  :src="'/img/users/fotos/'+item.foto" alt="Card image cap">
<img   v-else  width="35" height="35" class="border rounded-circle "  src="img/user.png" alt="Card image cap">
</td>
<td>@{{item.name}}</td>
<td>@{{item.apellido}}</td>
<td>@{{item.rango}}</td>
<td>
<div class="dropdown">
<button class="btn btn-light btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown"  >
<i class="fas fa-cogs"></i>
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item"  v-on:click.prevent="mostrar(item)"   >Detalles</a>
<a class="dropdown-item"   v-on:click.prevent="eliminar(item)" > Eliminar</a>
</div>
</div>
</td>
</tr>
</tbody>
</table>



<hr>
 





<nav aria-label="Page navigation example ">
<ul class="pagination pagination-sm justify-content-center">
<li v-if="pagination.current_page >1"  class="page-item ">  
<a  @click.prevent="changePage(pagination.current_page - 1)"  class="page-link"  href=""><i class="fas fa-chevron-left"></i></a>
</li>
<li v-for="page in  pagesNumber"  v-bind:class="'page-item '+[page== isActived ?  'active': '' ]  ">  
<a @click.prevent="changePage(page)"    class="page-link"  href="">
@{{page}}
</a>
</li>
<li v-if="pagination.current_page <pagination.last_page"   class="page-item">  
<a @click.prevent="changePage(pagination.current_page + 1)"   class="page-link"  href=""><i class="fas fa-chevron-right"></i></a>
</li>
</ul>
</nav>
























@include('layouts.users.create')
@include('layouts.users.edit')




</div>














@endsection