



<p align="left">
 <strong style="font-size: 18px;">  Clientes</strong>   
 <button  title="Nuevo Cliente"  class="btn btn-light  btn-sm rounded-circle float-right" data-toggle="modal"data-target=".nuevoCliente"><i class="fas fa-plus"></i> </button>
</p>







<div    class="table  table-responsive" >
<table   class="table table-lg table-borderless table-hover">
<thead>
<tr >

<th scope="col" >Nombre</th>
<th scope="col">Telefono</th>
<th scope="col">Sitio web</th>
<th scope="col">Pais</th>
<th scope="col">Accion</th>

</tr>
</thead>
<tbody >
<tr   v-for="(item, key) in lists"  >

<td> 
@{{item.nombre}}
</td>

<td> 
@{{item.telefono}}
</td>

<td> 
@{{item.sitio_web}}
</td>
<td>
@{{item.pais}}
</td>

<td>
<div align="right" class="dropdown">
<button class="btn btn-light btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown"  >
<i class="fas fa-cogs"></i>Opciones
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







@include('layouts.clientes.create')
@include('layouts.clientes.edit')









