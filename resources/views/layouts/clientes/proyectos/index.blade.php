


<div   class="table-responsive">

<template  v-if="proyectos .length == 0"   >


<center>
<i class="fas fa-exclamation-circle text-warning"></i>
<strong>
No existen proyectos en este cliente!





</strong>
</center>

</template>


<template   v-else >



  <table  class="table table-borderless">
    <thead>
      <tr  >
 
      
        <th> Nombre</th>

        <th>Nº tareas</th>
        <th>Fecha recepcion</th>
        <th>Fecha entrega</th>
        <th>Accion</th>
        

      </tr>
    </thead>




    <tbody>




      <tr v-for="(item, key) in proyectos"   >

        <td>  @{{item.nombre}}   </td>
        <td>   @{{item.tareas}}        </td>
        <td>  @{{item.fecha_recepcion}}   </td>
         <td> @{{item.fecha_entrega}}    </td>


        
        <td>
<div class="dropdown">
<button class="btn btn-light btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown">
<i class="fas fa-cogs"></i></button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


<a class="dropdown-item"   v-on:click="mostrar_Contacto(item)"  >Detalle</a>

<a class="dropdown-item"  v-on:click="eliminar_contacto(item)"  > Eliminar</a>

</div>
</div>  
</td>



</tr>



</tbody>
</table>



</div>

<hr>
 
</template>



</div>



