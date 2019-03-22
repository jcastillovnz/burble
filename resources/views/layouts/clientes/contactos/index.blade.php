

<div class="table-responsive">
<template  v-if="contactos.length == 0"   >





<center>
<i class="fas fa-exclamation-circle text-warning"></i>
<strong>
No existen contactos en este cliente!





</strong>
</center>

</template>


<template   v-else >



  <table  class="table table-borderless">
    <thead>
      <tr  >
 
      
        <th> Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Email</th>
      
        

      </tr>
    </thead>




    <tbody>




      <tr v-for="(item, key) in contactos"   >

        <td>  @{{item.nombre}}   </td>
        <td>  @{{item.apellido}}    </td>
        <td> @{{item.telefono}}</td>
         <td>  @{{item.email}}    </td>


        
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



