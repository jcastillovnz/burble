@extends('layouts.app')

@section('content')


  






<div class="row content">

      





  <div class="col-sm-3 ">
    

<div class="card">

   <h5 > <strong ><i class="fas fa-chart-line"></i> Productividad </strong>   </h5>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


</div>



  </div>










  <div    class=" col-sm-9 ">




<div class="card">







<div class="">
   <h5 > <strong ><i class="fas fa-cogs"></i> Gestion de usuarios</strong>   </h5>


<div class="col-sm-12">

   <button class="btn btn-light rounded-circle float-right " data-toggle="modal" data-target=".nuevoUsuario"> <i class="fas fa-plus"></i>   </button>
</div>   
</div>




<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
    <th scope="col" >  Foto    </th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Rango</th>
       <th scope="col">Accion</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
        <td> <img width="30" src="img/user.png">    </td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
         <td>

       <div class="dropdown">
  <button class="btn btn-light btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown"  >
  <i class="fas fa-cogs"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
     <a class="dropdown-item" href="#">Ver</a>
    <a class="dropdown-item" href="#">Editar</a>
    <a class="dropdown-item" href="#">Eliminar</a>

  </div>
</div>

       </td>
    </tr>
  </tbody>
</table>











</div>













<!-- MODAL NUEVO USUARIO -->


<div  class="modal fade nuevoUsuario" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


  <div id="Appusuarios"  class="modal-dialog modal-sm-8">
 
    <div class="modal-content">



   <div class="modal-header ">
    
<div class="col-sm-12 text-primary">
<i class="fas fa-suitcase"></i>
<strong>
Registrar un nuevo usuario

</strong>
<button type="button" class="close float-right" data-dismiss="modal">&times;</button>
</div>

      </div>




  <div class="modal-body">
    

<div class="col-sm-12">
    <div v-on:click="$refs.file.click()" >

<img   class="preview  img-fluid img-thumbnail rounded-circle" width="120" height="120" v-bind:src="foto"  >

<input  v-on:change="cargar_foto" class="invisible"  ref="file" type="file"  value=""  name="cargar_foto"  >



<p class="text-info">
<strong> 
Subir foto
</strong>
</p>
    </div>
 
  </div>





 <div class="input-group  col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i></span>
    </div>
    <input type="text" class="form-control" placeholder="Nombre">
  
  </div>



 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">

        <i class="fas fa-user-plus"></i>


         </span>
    </div>
    <input type="text" class="form-control" placeholder="Apellido">
  </div>






 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">

     <i class="fas fa-envelope"></i>

      </span>
    </div>

<input class="form-control" type="text" name="" placeholder="Email">


  </div>


 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
  <i class="fas fa-lock"></i>

      </span>
    </div>

<input class="form-control" type="text" name="" placeholder="Contraseña">


  </div>















 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">

        <i class="fas fa-cog"></i> 
         </span>
    </div>
    <input type="text" class="form-control" placeholder="Alias">
  </div>



 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input type="date" class="form-control" placeholder="Fecha nacimiento">
  </div>





 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">

 <i class="fas fa-user-shield"></i>


      </span>
    </div>

<select class="form-control">
<option value="" selected="">Rango</option>


<option value="">Empleado</option>
<option value="">Freelance</option>
<option value="">Administrador</option>

</select>


  </div>





 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i> </span>
    </div>

<input class="form-control" type="text" name="" placeholder="CUIT">


  </div>






 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i> </span>
    </div>

<input class="form-control" type="text" name="" placeholder="Direccion">


  </div>









<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i>  </span>
    </div>

<input class="form-control" type="text" name="" placeholder="Obra social">


  </div>




  <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i> </span>
    </div>

<input class="form-control" type="text" name="" placeholder="servicio de ambulancia">


  </div>



  <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-user-plus"></i> </span>
    </div>

<input class="form-control" type="text" name="" placeholder="Contacto de ambulancia">


  </div>














      </div>












<div class="modal-footer">


<div class="btn btn-group  ">
<div id="loader-sm" class="loader loader-sm "></div>

<button class="btn btn-light btn-sm " type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>




<button class="btn btn-success btn-sm" type="button"  >
<i class="fas fa-save"></i>
</button>




</div>

</div>

    </div>


  </div>


</div>

























<!-- MODAL NUEVO USUARIO -->


@endsection
