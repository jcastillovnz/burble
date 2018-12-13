@extends('layouts.app')

@section('content')


      <div class="content col-sm-12 " >




<div class="col-sm-3">
  
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












</div>













@endsection
