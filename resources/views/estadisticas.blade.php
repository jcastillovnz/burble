@extends('layouts.app')

@section('content')


  






<div class="row content">

  <div class="col-sm-3 ">
    

  <div class="card">
    <img class="card-img-top" src="img/user.png" alt="Card image cap">
    <p>
<button class="btn btn-info btn-sm"><i class="fas fa-upload"></i> Cambiar fotografia</button>
</p>
    <div class="card-body">
      <h5 class="card-title">{{ Auth::user()->name }} </h5>
      <p class="card-text">Desarrollador web.</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>




  </div>










  <div    class=" col-sm-9 ">

<div class="card">


<div class="card-header">
   <h5 > <strong ><i class="fas fa-user-cog"></i> Mi cuenta </strong>   </h5>
</div>




<div class="col-4 ">
  <h5>
  <strong>
Datos personales
</strong>
</h5>
 <div class="input-group ">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" class="form-control input-sm" placeholder="Nombre">
  </div>




 <div class="input-group ">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" class="form-control input-sm" placeholder="Apellido">
  </div>



 <div class="input-group ">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
 <i class="fas fa-user"></i>
         </span>
    </div>
    <input type="text" class="form-control input-sm" placeholder="Alias">
  </div>


 <div class="input-group ">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">
<i class="fas fa-clock"></i>
         </span>
    </div>
    <input title="Fecha nacimiento" type="date" class="form-control input-sm" placeholder="Fecha de nacimiento">
  </div>



</div>











</div>



</div>













</div>





@endsection
