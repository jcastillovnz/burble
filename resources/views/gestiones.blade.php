@extends('layouts.app')

@section('content')



<div class="container ">

<strong style="font-size: 18px;">
Gestiones
</strong>
<br>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#usuarios">Usuarios</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#clientes">Clientes</a>
    </li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="usuarios" class="container tab-pane active">


<div id="AppUsuarios">
 @include('layouts.gestiones.usuarios')
</div>



    </div>
    <div id="clientes" class="container tab-pane fade">


<div id="AppClientes">
 @include('layouts.gestiones.clientes')
</div>




    </div>

  </div>
</div>






@endsection