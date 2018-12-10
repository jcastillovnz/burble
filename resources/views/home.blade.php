@extends('layouts.app')

@section('content')


      <div class="content  row" >

<div class="  col-sm-12">
         
<button data-toggle="modal"  data-target=".nuevoProyecto"  class="btn btn-light rounded-circle float-right" title="Nuevo proyecto"> <i class="fas fa-plus"></i>   </button>
  
</div>

<div class="col col-sm-6 " >
 <div class="container-fluid borde-burble border ">

<h3 align="left" class="titulo-principal" > <a href="">  <strong > NOMBRE PROYECTO</strong> </a>    <small class="comentarios-proyecto float-right" aling="right">Comentarios basicos de cada proyecto general</small> </h3>

<h6 align="left"><strong>EMPRESA</strong> <small class="float-right text-info" aling="right"> <strong>  12/02/2018</strong>   </small> </h6>


<div class="container-fluid   ">


<p class="border  tarea container-fluid"  align="left">


<i class="fas fa-stop"></i>


<a href="">
Nombre de tarea  
</a>

<i class="fas fa-circle text-danger"  title="Estado"></i>  <i class="far fa-user-circle text-info"></i> <i class="far fa-image"></i>
comentarios sobre esta tarea
</p>
  
<p class="border tarea container-fluid"  align="left">
<i class="fas fa-stop"></i>
<a href="">
Nombre de tarea  
</a> <i class="fas fa-circle text-danger" title="Estado"></i>  <i class="far fa-user-circle text-info"></i> <i class="far fa-image"></i>
comentarios sobre esta tarea
</p>
  
<p class="border  tarea container-fluid text-secondary"  align="left">
<i class="fas fa-stop"></i>
<a href="">
Nombre de tarea  
</a> <i class="fas fa-circle text-danger" title="Estado"></i>  <i class="far fa-user-circle text-info"></i> <i class="far fa-image"></i>
comentarios sobre esta tarea
</p>


</div>

<!-- IMAGENES -->
<div class="float-right button-collapse btn btn-light " id="button-collapse"  title="Mostrar imagenes" data-toggle="collapse" href="#collapseExample" role="button">

<i style="font-size: 12px" class="fas fa-chevron-down"></i>

</div>
<div class="float-right button-collapse btn btn-light " title="Anadir tarea" id="button-collapse"  role="button">

<i style="font-size: 12px" class="fas fa-plus-circle"></i>

</div>


<div class="container-fluid collapse" id="collapseExample">

​<img width="120" src="img/pieza.png" class="img-fluid  " alt="...">
<img width="120" src="img/pieza.png" class="img-fluid  " alt="...">
<img width="120" src="img/pieza.png" class="img-fluid  " alt="...">
<img width="120" src="img/pieza.png" class="img-fluid  " alt="...">
</div>
<!-- IMAGENES -->
</div> <!-- CIERRE PROYECTO -->
</div>










<div class="col col-sm-6 " >
 <div class="container-fluid borde-burble border ">

<h3 align="left" class="titulo-principal" > <a href="">  <strong > NOMBRE PROYECTO</strong> </a>    <small class="comentarios-proyecto float-right" aling="right">Comentarios basicos de cada proyecto general</small> </h3>

<h6 align="left"><strong>EMPRESA</strong> <small class="float-right text-info" aling="right"> <strong>  12/02/2018</strong>   </small> </h6>


<div class="container-fluid   ">


<p class="border  tarea container-fluid"  align="left">


<i class="fas fa-stop"></i>


<a href="">
Nombre de tarea  
</a>

<i class="fas fa-circle text-danger"  title="Estado"></i>  <i class="far fa-user-circle text-info"></i> <i class="far fa-image"></i>
comentarios sobre esta tarea
</p>
  
<p class="border tarea container-fluid"  align="left">
<i class="fas fa-stop"></i>
<a href="">
Nombre de tarea  
</a> <i class="fas fa-circle text-danger" title="Estado"></i>  <i class="far fa-user-circle text-info"></i> <i class="far fa-image"></i>
comentarios sobre esta tarea
</p>
  
<p class="border  tarea container-fluid text-secondary"  align="left">
<i class="fas fa-stop"></i>
<a href="">
Nombre de tarea  
</a> <i class="fas fa-circle text-danger" title="Estado"></i>  <i class="far fa-user-circle text-info"></i> <i class="far fa-image"></i>
comentarios sobre esta tarea
</p>


</div>

<!-- IMAGENES -->
<div class="float-right button-collapse btn btn-light " id="button-collapse"  title="Mostrar imagenes" data-toggle="collapse" href="#collapseExample" role="button">

<i style="font-size: 12px" class="fas fa-chevron-down"></i>

</div>
<div    data-toggle="modal"  data-target=".nuevaTarea"    class="float-right button-collapse btn btn-light " title="Anadir tarea" id="button-collapse"  role="button">

<i style="font-size: 12px" class="fas fa-plus-circle"></i>

</div>


<div class="container-fluid collapse" id="collapseExample">

​<img width="120" src="img/pieza.png" class="img-fluid  " alt="...">
<img width="120" src="img/pieza.png" class="img-fluid  " alt="...">
<img width="120" src="img/pieza.png" class="img-fluid  " alt="...">
<img width="120" src="img/pieza.png" class="img-fluid  " alt="...">
</div>
<!-- IMAGENES -->
</div> <!-- CIERRE PROYECTO -->











</div>






<div class="col-sm-12">
  <hr>
</div>


<!-- SUBPROYECTOS -->
<div  class="row col-sm-12 " id="list" >


<!-- TARJETA -->

<div class="col-sm-3">
<div class="card borde-burble" >



   <div class="card-header">
<h6   class="proyecto-min">NOMBRE PROYECTO</h6>
  </div>


<div id="demo" class="carousel slide card-img-top " data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/pieza.png"  width="150" >
  <div class="carousel-caption d-none d-md-block">
 
    tarea


  </div>
    </div>
    <div class="carousel-item">
  <img src="img/pieza.png"  width="150" >

  <div class="carousel-caption d-none d-md-block">
  
    tarea


  </div>


    </div>

   <div class="carousel-item">
     <img src="img/pieza.png"   width="150" >


  <div class="carousel-caption d-none d-md-block">
   

    tarea

  </div>

    </div>



  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev " href="#demo" data-slide="prev">
 <i class="fas fa-chevron-left text-dark" ></i>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
<i class="fas fa-chevron-right text-dark"></i>
  </a>
</div>



<div class="card-body">
<p align="Left" class="text-sm-left">Aqui se introduciran comentarios sobre este proyecto.</p>

</div>





</div>

</div>
<!-- TARJETA -->



<!-- TARJETA -->

<div class="col-sm-3">
<div class="card borde-burble" >

   <div class="card-header">
<h6   class="proyecto-min">NOMBRE PROYECTO</h6>
  </div>


<div id="demo" class="carousel slide card-img-top " data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/pieza.png" alt="Los Angeles" width="150" >
  <div class="carousel-caption d-none d-md-block">
 
    tarea


  </div>
    </div>
    <div class="carousel-item">
  <img src="img/pieza.png" alt="Los Angeles" width="150" >

  <div class="carousel-caption d-none d-md-block">
  
    tarea


  </div>


    </div>

   <div class="carousel-item">
     <img src="img/pieza.png" alt="Los Angeles" width="150" >


  <div class="carousel-caption d-none d-md-block">
   

    tarea

  </div>

    </div>



  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev " href="#demo" data-slide="prev">
 <i class="fas fa-chevron-left text-dark" ></i>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
<i class="fas fa-chevron-right text-dark"></i>
  </a>
</div>



<div class="card-body">
<p align="Left" class="text-sm-left">Aqui se introduciran comentarios sobre este proyecto.</p>

</div>

<button class="btn btn-light float-right" >x</button>


</div>
</div>
<!-- TARJETA -->


<!-- TARJETA -->

<div class="col-sm-3">
<div class="card borde-burble" >

   <div class="card-header">
<h6   class="proyecto-min">NOMBRE PROYECTO</h6>
  </div>


<div id="demo" class="carousel slide card-img-top " data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/pieza.png" alt="Los Angeles" width="150" >
  <div class="carousel-caption d-none d-md-block">
 
    tarea


  </div>
    </div>
    <div class="carousel-item">
  <img src="img/pieza.png" alt="Los Angeles" width="150" >

  <div class="carousel-caption d-none d-md-block">
  
    tarea


  </div>


    </div>

   <div class="carousel-item">
     <img src="img/pieza.png" alt="Los Angeles" width="150" >


  <div class="carousel-caption d-none d-md-block">
   

    tarea

  </div>

    </div>



  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev " href="#demo" data-slide="prev">
 <i class="fas fa-chevron-left text-dark" ></i>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
<i class="fas fa-chevron-right text-dark"></i>
  </a>
</div>



<div class="card-body">
<p align="Left" class="text-sm-left">Aqui se introduciran comentarios sobre este proyecto.</p>

</div>
</div>
</div>
<!-- TARJETA -->




<!-- TARJETA -->

<div class="col-sm-3">
<div class="card borde-burble" >

   <div class="card-header">
<h6   class="proyecto-min">NOMBRE PROYECTO</h6>
  </div>


<div id="demo" class="carousel slide card-img-top " data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/pieza.png" alt="Los Angeles" width="150" >
  <div class="carousel-caption d-none d-md-block">
 
    tarea


  </div>
    </div>
    <div class="carousel-item">
  <img src="img/pieza.png" alt="Los Angeles" width="150" >

  <div class="carousel-caption d-none d-md-block">
  
    tarea


  </div>


    </div>

   <div class="carousel-item">
     <img src="img/pieza.png" alt="Los Angeles" width="150" >


  <div class="carousel-caption d-none d-md-block">
   

    tarea

  </div>

    </div>



  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev " href="#demo" data-slide="prev">
 <i class="fas fa-chevron-left text-dark" ></i>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
<i class="fas fa-chevron-right text-dark"></i>
  </a>
</div>



<div class="card-body">
<p align="Left" class="text-sm-left">Aqui se introduciran comentarios sobre este proyecto.</p>

</div>
</div>
</div>
<!-- TARJETA -->










<!-- MODAL NUEVO PROYECTO  -->



<div class="modal fade nuevoProyecto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-sm-8">
 
    <div class="modal-content">



   <div class="modal-header ">
    
<center>
<h5 class="text-primary ">
  <i class="fas fa-cube"></i>
<strong>
Registrar un nuevo proyecto
</strong>
</h5>
</center>


   <button type="button" class="close" data-dismiss="modal">&times;</button>
   
      </div>








  <div class="modal-body">
    


 <div class="input-group  col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-cube"></i></span>
    </div>
    <input type="text" class="form-control" placeholder="Nombre de proyecto">
  
  </div>


 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-dollar-sign"></i>   </span>
    </div>
    <input type="number" class="form-control" placeholder="Presupuesto">

  </div>




 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i  class="fas fa-briefcase"></i> </span>
    </div>
 
<select class="form-control">

<option> Empresa</option>
<option> Empresa 1</option>
<option> Empresa 2</option>

</select>

  </div>









<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text"><i class="fas fa-comments"></i> </span>
    </div>
   
<textarea class="form-control" placeholder="Comentarios..."></textarea>


  </div>





        </div>








<div class="modal-footer">


<div class="btn btn-group  ">
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

<!-- MODAL NUEVO PROYECTO  -->



<!-- MODAL NUEVO CLIENTE -->



<div class="modal fade nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-sm-8">
 
    <div class="modal-content">



   <div class="modal-header ">
    



<h5 class="text-primary ">
<i class="fas fa-briefcase"></i>
<strong>
Registrar un nuevo Cliente
</strong>
</h5>




   <button type="button" class="close" data-dismiss="modal">&times;</button>
   
      </div>








  <div class="modal-body">
    


 <div class="input-group  col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-cube"></i></span>
    </div>
    <input type="text" class="form-control" placeholder="Nombre de empresa">
  
  </div>


 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-dollar-sign"></i>   </span>
    </div>
    <input type="text" class="form-control" placeholder="Sitio web">

  </div>




 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-map-marker-alt"></i></i> </span>
    </div>
 
<input class="form-control" type="" name="" placeholder="Ciudad">

  </div>









<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">

 <i class="fas fa-globe-americas"></i>


      </span>
    </div>

<input type="" class="form-control" name="" placeholder="Pais">

  </div>




<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">

<i class="fas fa-phone-square"></i>


      </span>
    </div>

<input type="" class="form-control" name="" placeholder="Telefono">

  </div>











<p align="Left"  class="text-info">

<h5>Contacto</h5>

</p>









<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">
<i class="fas fa-user-friends"></i>
</span>
</div>
<input type="" class="form-control" name="" placeholder="Nombre">

  </div>




<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">
<i class="fas fa-user-friends"></i>
</span>
</div>
<input type="" class="form-control" name="" placeholder="Apellido">

  </div>













<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">

<i class="fas fa-phone-square"></i>


      </span>
    </div>

<input type="" class="form-control" name="" placeholder="Telefono">

</div>





<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">
<i class="fas fa-user-friends"></i>
</span>
</div>
<input type="" class="form-control" name="" placeholder="Email">

  </div>








</div>






















<div class="modal-footer">


<div class="btn btn-group  ">
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

<!-- MODAL NUEVO CLIENTE -->








<!-- MODAL NUEVA TAREA -->



<div class="modal fade nuevaTarea" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-sm-8">
 
    <div class="modal-content">



   <div class="modal-header ">
    
<center>
<h5 class="text-primary ">
<i class="fab fa-stack-overflow"></i>
<strong>
Registrar una nueva tarea
</strong>
</h5>
</center>


   <button type="button" class="close" data-dismiss="modal">&times;</button>
   
      </div>








  <div class="modal-body">
    


 <div class="input-group  col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-cube"></i></span>
    </div>
    <input type="text" class="form-control" placeholder="Nombre de empresa">
  
  </div>


 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-dollar-sign"></i>   </span>
    </div>
    <input type="text" class="form-control" placeholder="Sitio web">

  </div>




 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-map-marker-alt"></i></i> </span>
    </div>
 
<input class="form-control" type="" name="" placeholder="Ciudad">

  </div>









<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">

 <i class="fas fa-globe-americas"></i>


      </span>
    </div>

<input type="" class="form-control" name="" placeholder="Pais">

  </div>




<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">

<i class="fas fa-phone-square"></i>


      </span>
    </div>

<input type="" class="form-control" name="" placeholder="Telefono">

  </div>


        </div>

<div class="modal-footer">


<div class="btn btn-group  ">
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

<!-- MODAL NUEVA TAREA -->













@endsection
