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







<div class="">
   <h5 > <strong ><i class="fas fa-cogs"></i> Gestiones </strong>   </h5>


<div class="col-sm-12">

   <button class="btn btn-light rounded-circle float-right " data-toggle="modal" data-target=".nuevoProyecto"> <i class="fas fa-plus"></i>   </button>
</div>   
</div>


<p align="letf">
  <h5>
  <strong>
Gestion de usuarios
</strong>
</h5>


</p>


<table class="table table-striped">
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





@endsection
