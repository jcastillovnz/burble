@extends('layouts.app')

@section('content')


      <div class="content  " >

<div class="  col-sm-12">
         

   <button class="btn btn-light rounded-circle float-right " data-toggle="modal" data-target=".nuevoProyecto"> <i class="fas fa-plus"></i>   </button>


</div>



<div class="col col-sm-6">


  <div class="container-fluid borde-burble border  ">




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
<!-- BOTONES-->
<div class="float-right button-collapse btn btn-light " id="button-collapse"  data-toggle="collapse" href="#collapseExample" role="button">

<i style="font-size: 12px" class="fas fa-chevron-down"></i>

</div>


<div class="float-right button-collapse btn btn-light " id="button-collapse">
<i  style="font-size: 12px" class="fas fa-pen-square"></i>
</div>

<div class="float-right button-collapse btn btn-light " id="button-collapse"  data-toggle="modal" data-target=".nuevaTarea"  role="button">
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

<!-- 

<div class="card-body">

</div>
 -->

<div class="btn-group">
<button class="btn btn-danger float-right btn-sm" ><i class="far fa-trash-alt"></i></button>
<button class="btn btn-light float-right btn-sm" ><i class="fas fa-snowflake"></i></button>
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

<!-- 

<div class="card-body">

</div>
 -->

<div class="btn-group">
<button class="btn btn-light float-right" >x</button>
<button class="btn btn-light float-right" >x</button>
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

<!-- 

<div class="card-body">

</div>
 -->

<div class="btn-group">
<button class="btn btn-light float-right" >x</button>
<button class="btn btn-light float-right" >x</button>
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

<!-- 

<div class="card-body">

</div>
 -->

<div class="btn-group">
<button class="btn btn-light float-right" >x</button>
<button class="btn btn-light float-right" >x</button>
</div>

</div>
</div>
<!-- TARJETA -->



<!-- MODAL NUEVO PROYECTO  -->



<div  id="AppProyecto"   class="modal fade nuevoProyecto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">



  <div class="modal-dialog modal-sm-8">
 
    <div   class="modal-content">

   <div class="modal-header ">

<div class="col-sm-12 text-primary">
<i class="fas fa-cube"></i>
<strong>
Registrar un nuevo proyecto
</strong>
<button type="button" class="close float-right" data-dismiss="modal">&times;</button>
</div>

</div>
  <div  class="modal-body">
    
<form  id="formulario_proyecto" autocomplete="off"   class="navbar-form hidden" role="form" action="" 
 method="GET" >
 {{ csrf_field() }}


 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i  class="fas fa-briefcase"></i> </span>
    </div>
 
<select required="" autocomplete="off"  v-model="cliente" class="form-control">

<option value="" selected="">Cliente / Empresa</option>

@if ( isset($clientes)==true   )

@foreach( $clientes as $cliente)
<option value="{{$cliente->id}}"  > {{$cliente->nombre}}</option>
@endforeach


@else
<option value="">Registre un cliente</option>



@endif
</select>

  </div>




 <div class="input-group  col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-cube"></i></span>
    </div>
    <input  autocomplete="off" required="" v-model="proyecto" type="text" class="form-control" placeholder="Nombre de proyecto">
  
  </div>





 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-clock"></i>  </span>
    </div>
    <input  autocomplete="off" required="" v-model="fecha_entrega" type="date" class="form-control" placeholder="Fecha de entrega">

  </div>







 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-dollar-sign"></i>   </span>
    </div>
    <input  autocomplete="off" required="" v-model="presupuesto" type="number" min="100" max="5000"   class="form-control" placeholder="Presupuesto">

  </div>













<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text"><i class="fas fa-comments"></i> </span>
    </div>
   
<textarea autocomplete="off" required="" v-model="comentario" class="form-control" placeholder="Comentarios..."></textarea>


  </div>





        </div>








<div    class="modal-footer">





<div  class="btn btn-group  ">

<div id="loader-sm" class="loader loader-sm "></div>



<button class="btn btn-light btn-sm " type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>






<button  id="btn-proyecto" type="sumbit"  class="btn btn-success btn-sm"     v-on:click.prevent="enviar(this)"   >
<i class="fas fa-save"></i> 
</button>


</form>

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



<div class="col-sm-12 text-primary">
<i class="fas fa-suitcase"></i>
<strong>
Registrar un nuevo Cliente

</strong>
<button type="button" class="close float-right" data-dismiss="modal">&times;</button>
</div>






      </div>








  <div   class="modal-body">
    



<form   class="navbar-form hidden" role="form" action="{{ url('/nuevo_cliente') }}"
 method="GET" >
 {{ csrf_field() }}



 <div class="input-group  col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-cube"></i></span>
    </div>
    <input required="" type="text" class="form-control" name="nombre_empresa" placeholder="Nombre de empresa">
  
  </div>


 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-dollar-sign"></i>   </span>
    </div>
    <input  name="sitio_web"   type="text" class="form-control" placeholder="Sitio web">

  </div>




 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-map-marker-alt"></i></i> </span>
    </div>
 
<input  name="ciudad"  class="form-control" type="" name="" placeholder="Ciudad">

  </div>









<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">

 <i class="fas fa-globe-americas"></i>


      </span>
    </div>

<select  class="form-control" name="pais">
<option value="Elegir" id="AF">Pais</option>
<option value="Afganistán" id="AF">Afganistán</option>
<option value="Albania" id="AL">Albania</option>
<option value="Alemania" id="DE">Alemania</option>
<option value="Andorra" id="AD">Andorra</option>
<option value="Angola" id="AO">Angola</option>
<option value="Anguila" id="AI">Anguila</option>
<option value="Antártida" id="AQ">Antártida</option>
<option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
<option value="Antillas holandesas" id="AN">Antillas holandesas</option>
<option value="Arabia Saudí" id="SA">Arabia Saudí</option>
<option value="Argelia" id="DZ">Argelia</option>
<option value="Argentina" id="AR">Argentina</option>
<option value="Armenia" id="AM">Armenia</option>
<option value="Aruba" id="AW">Aruba</option>
<option value="Australia" id="AU">Australia</option>
<option value="Austria" id="AT">Austria</option>
<option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
<option value="Bahamas" id="BS">Bahamas</option>
<option value="Bahrein" id="BH">Bahrein</option>
<option value="Bangladesh" id="BD">Bangladesh</option>
<option value="Barbados" id="BB">Barbados</option>
<option value="Bélgica" id="BE">Bélgica</option>
<option value="Belice" id="BZ">Belice</option>
<option value="Benín" id="BJ">Benín</option>
<option value="Bermudas" id="BM">Bermudas</option>
<option value="Bhután" id="BT">Bhután</option>
<option value="Bielorrusia" id="BY">Bielorrusia</option>
<option value="Birmania" id="MM">Birmania</option>
<option value="Bolivia" id="BO">Bolivia</option>
<option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
<option value="Botsuana" id="BW">Botsuana</option>
<option value="Brasil" id="BR">Brasil</option>
<option value="Brunei" id="BN">Brunei</option>
<option value="Bulgaria" id="BG">Bulgaria</option>
<option value="Burkina Faso" id="BF">Burkina Faso</option>
<option value="Burundi" id="BI">Burundi</option>
<option value="Cabo Verde" id="CV">Cabo Verde</option>
<option value="Camboya" id="KH">Camboya</option>
<option value="Camerún" id="CM">Camerún</option>
<option value="Canadá" id="CA">Canadá</option>
<option value="Chad" id="TD">Chad</option>
<option value="Chile" id="CL">Chile</option>
<option value="China" id="CN">China</option>
<option value="Chipre" id="CY">Chipre</option>
<option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
<option value="Colombia" id="CO">Colombia</option>
<option value="Comores" id="KM">Comores</option>
<option value="Congo" id="CG">Congo</option>
<option value="Corea" id="KR">Corea</option>
<option value="Corea del Norte" id="KP">Corea del Norte</option>
<option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
<option value="Costa Rica" id="CR">Costa Rica</option>
<option value="Croacia" id="HR">Croacia</option>
<option value="Cuba" id="CU">Cuba</option>
<option value="Dinamarca" id="DK">Dinamarca</option>
<option value="Djibouri" id="DJ">Djibouri</option>
<option value="Dominica" id="DM">Dominica</option>
<option value="Ecuador" id="EC">Ecuador</option>
<option value="Egipto" id="EG">Egipto</option>
<option value="El Salvador" id="SV">El Salvador</option>
<option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
<option value="Eritrea" id="ER">Eritrea</option>
<option value="Eslovaquia" id="SK">Eslovaquia</option>
<option value="Eslovenia" id="SI">Eslovenia</option>
<option value="España" id="ES">España</option>
<option value="Estados Unidos" id="US">Estados Unidos</option>
<option value="Estonia" id="EE">Estonia</option>
<option value="c" id="ET">Etiopía</option>
<option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
<option value="Filipinas" id="PH">Filipinas</option>
<option value="Finlandia" id="FI">Finlandia</option>
<option value="Francia" id="FR">Francia</option>
<option value="Gabón" id="GA">Gabón</option>
<option value="Gambia" id="GM">Gambia</option>
<option value="Georgia" id="GE">Georgia</option>
<option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
<option value="Ghana" id="GH">Ghana</option>
<option value="Gibraltar" id="GI">Gibraltar</option>
<option value="Granada" id="GD">Granada</option>
<option value="Grecia" id="GR">Grecia</option>
<option value="Groenlandia" id="GL">Groenlandia</option>
<option value="Guadalupe" id="GP">Guadalupe</option>
<option value="Guam" id="GU">Guam</option>
<option value="Guatemala" id="GT">Guatemala</option>
<option value="Guayana" id="GY">Guayana</option>
<option value="Guayana francesa" id="GF">Guayana francesa</option>
<option value="Guinea" id="GN">Guinea</option>
<option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
<option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
<option value="Haití" id="HT">Haití</option>
<option value="Holanda" id="NL">Holanda</option>
<option value="Honduras" id="HN">Honduras</option>
<option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
<option value="Hungría" id="HU">Hungría</option>
<option value="India" id="IN">India</option>
<option value="Indonesia" id="ID">Indonesia</option>
<option value="Irak" id="IQ">Irak</option>
<option value="Irán" id="IR">Irán</option>
<option value="Irlanda" id="IE">Irlanda</option>
<option value="Isla Bouvet" id="BV">Isla Bouvet</option>
<option value="Isla Christmas" id="CX">Isla Christmas</option>
<option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
<option value="Islandia" id="IS">Islandia</option>
<option value="Islas Caimán" id="KY">Islas Caimán</option>
<option value="Islas Cook" id="CK">Islas Cook</option>
<option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
<option value="Islas Faroe" id="FO">Islas Faroe</option>
<option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
<option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
<option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
<option value="Islas Marshall" id="MH">Islas Marshall</option>
<option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
<option value="Islas Palau" id="PW">Islas Palau</option>
<option value="Islas Salomón" d="SB">Islas Salomón</option>
<option value="Islas Tokelau" id="TK">Islas Tokelau</option>
<option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
<option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
<option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
<option value="Israel" id="IL">Israel</option>
<option value="Italia" id="IT">Italia</option>
<option value="Jamaica" id="JM">Jamaica</option>
<option value="Japón" id="JP">Japón</option>
<option value="Jordania" id="JO">Jordania</option>
<option value="Kazajistán" id="KZ">Kazajistán</option>
<option value="Kenia" id="KE">Kenia</option>
<option value="Kirguizistán" id="KG">Kirguizistán</option>
<option value="Kiribati" id="KI">Kiribati</option>
<option value="Kuwait" id="KW">Kuwait</option>
<option value="Laos" id="LA">Laos</option>
<option value="Lesoto" id="LS">Lesoto</option>
<option value="Letonia" id="LV">Letonia</option>
<option value="Líbano" id="LB">Líbano</option>
<option value="Liberia" id="LR">Liberia</option>
<option value="Libia" id="LY">Libia</option>
<option value="Liechtenstein" id="LI">Liechtenstein</option>
<option value="Lituania" id="LT">Lituania</option>
<option value="Luxemburgo" id="LU">Luxemburgo</option>
<option value="Macao R. A. E" id="MO">Macao R. A. E</option>
<option value="Madagascar" id="MG">Madagascar</option>
<option value="Malasia" id="MY">Malasia</option>
<option value="Malawi" id="MW">Malawi</option>
<option value="Maldivas" id="MV">Maldivas</option>
<option value="Malí" id="ML">Malí</option>
<option value="Malta" id="MT">Malta</option>
<option value="Marruecos" id="MA">Marruecos</option>
<option value="Martinica" id="MQ">Martinica</option>
<option value="Mauricio" id="MU">Mauricio</option>
<option value="Mauritania" id="MR">Mauritania</option>
<option value="Mayotte" id="YT">Mayotte</option>
<option value="México" id="MX">México</option>
<option value="Micronesia" id="FM">Micronesia</option>
<option value="Moldavia" id="MD">Moldavia</option>
<option value="Mónaco" id="MC">Mónaco</option>
<option value="Mongolia" id="MN">Mongolia</option>
<option value="Montserrat" id="MS">Montserrat</option>
<option value="Mozambique" id="MZ">Mozambique</option>
<option value="Namibia" id="NA">Namibia</option>
<option value="Nauru" id="NR">Nauru</option>
<option value="Nepal" id="NP">Nepal</option>
<option value="Nicaragua" id="NI">Nicaragua</option>
<option value="Níger" id="NE">Níger</option>
<option value="Nigeria" id="NG">Nigeria</option>
<option value="Niue" id="NU">Niue</option>
<option value="Norfolk" id="NF">Norfolk</option>
<option value="Noruega" id="NO">Noruega</option>
<option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
<option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
<option value="Omán" id="OM">Omán</option>
<option value="Panamá" id="PA">Panamá</option>
<option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
<option value="Paquistán" id="PK">Paquistán</option>
<option value="Paraguay" id="PY">Paraguay</option>
<option value="Perú" id="PE">Perú</option>
<option value="Pitcairn" id="PN">Pitcairn</option>
<option value="Polinesia francesa" id="PF">Polinesia francesa</option>
<option value="Polonia" id="PL">Polonia</option>
<option value="Portugal" id="PT">Portugal</option>
<option value="Puerto Rico" id="PR">Puerto Rico</option>
<option value="Qatar" id="QA">Qatar</option>
<option value="Reino Unido" id="UK">Reino Unido</option>
<option value="República Centroafricana" id="CF">República Centroafricana</option>
<option value="República Checa" id="CZ">República Checa</option>
<option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
<option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
<option value="República Dominicana" id="DO">República Dominicana</option>
<option value="Reunión" id="RE">Reunión</option>
<option value="Ruanda" id="RW">Ruanda</option>
<option value="Rumania" id="RO">Rumania</option>
<option value="Rusia" id="RU">Rusia</option>
<option value="Samoa" id="WS">Samoa</option>
<option value="Samoa occidental" id="AS">Samoa occidental</option>
<option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
<option value="San Marino" id="SM">San Marino</option>
<option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
<option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
<option value="Santa Helena" id="SH">Santa Helena</option>
<option value="Santa Lucía" id="LC">Santa Lucía</option>
<option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
<option value="Senegal" id="SN">Senegal</option>
<option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
<option value="Sychelles" id="SC">Seychelles</option>
<option value="Sierra Leona" id="SL">Sierra Leona</option>
<option value="Singapur" id="SG">Singapur</option>
<option value="Siria" id="SY">Siria</option>
<option value="Somalia" id="SO">Somalia</option>
<option value="Sri Lanka" id="LK">Sri Lanka</option>
<option value="Suazilandia" id="SZ">Suazilandia</option>
<option value="Sudán" id="SD">Sudán</option>
<option value="Suecia" id="SE">Suecia</option>
<option value="Suiza" id="CH">Suiza</option>
<option value="Surinam" id="SR">Surinam</option>
<option value="Svalbard" id="SJ">Svalbard</option>
<option value="Tailandia" id="TH">Tailandia</option>
<option value="Taiwán" id="TW">Taiwán</option>
<option value="Tanzania" id="TZ">Tanzania</option>
<option value="Tayikistán" id="TJ">Tayikistán</option>
<option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
<option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
<option value="Timor Oriental" id="TP">Timor Oriental</option>
<option value="Togo" id="TG">Togo</option>
<option value="Tonga" id="TO">Tonga</option>
<option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
<option value="Túnez" id="TN">Túnez</option>
<option value="Turkmenistán" id="TM">Turkmenistán</option>
<option value="Turquía" id="TR">Turquía</option>
<option value="Tuvalu" id="TV">Tuvalu</option>
<option value="Ucrania" id="UA">Ucrania</option>
<option value="Uganda" id="UG">Uganda</option>
<option value="Uruguay" id="UY">Uruguay</option>
<option value="Uzbekistán" id="UZ">Uzbekistán</option>
<option value="Vanuatu" id="VU">Vanuatu</option>
<option value="Venezuela" id="VE">Venezuela</option>
<option value="Vietnam" id="VN">Vietnam</option>
<option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
<option value="Yemen" id="YE">Yemen</option>
<option value="Zambia" id="ZM">Zambia</option>
<option value="Zimbabue" id="ZW">Zimbabue</option>
</select>
  </div>




<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">

<i class="fas fa-phone-square"></i>


      </span>
    </div>

<input   type="" class="form-control" name="telefono" placeholder="Telefono">

  </div>










<br>
<p align="center"  class="text-primary">

  <i class="fas fa-phone-square"></i>
<strong>
Datos de contacto
</strong>
</p>









<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">
<i class="fas fa-user"></i>
</span>
</div>
<input required=""  type="" class="form-control" name="nombre_contacto" placeholder="Nombre">

  </div>




<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">
<i class="fas fa-user"></i>
</span>
</div>
<input type="" class="form-control" name="Apellido_contacto" placeholder="Apellido">

  </div>













<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">

<i class="fas fa-phone-square"></i>


      </span>
    </div>

<input required="" type="" class="form-control" name="telefono_contacto" placeholder="Telefono">

</div>





<div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"   class="input-group-text">
<i class="fas fa-mail-bulk"></i>
</span>
</div>
<input  required=""  type="email" class="form-control" name="email_contacto" placeholder="Email">

  </div>



</div>





<div class="modal-footer">


<div class="btn btn-group  ">

<div id="loader-sm" class="loader loader-sm "></div>




<button class="btn btn-light btn-sm " title="Cancelar" type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>




<button class="btn btn-success btn-sm" type="sumbit" title="Guardar" >
<i class="fas fa-save"></i>
</button>



</form>


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
    
<div class="col-sm-12 text-primary">
<i class="fas fa-suitcase"></i>
<strong>
Registrar un nueva tarea

</strong>
<button type="button" class="close float-right" data-dismiss="modal">&times;</button>
</div>

      </div>

  <div class="modal-body">
    


 <div class="input-group  col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-cube"></i></span>
    </div>
    <input type="text" class="form-control" placeholder="Nombre de tarea">
  
  </div>

 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">

<i class="fas fa-project-diagram"></i>
         </span>
    </div>
<select class="form-control">
    <option selected="" value="">Tipo de tarea</option>
<option value="Imagen">Imagen</option>
<option value="Proceso">Proceso</option>
<option value="Cambio">Cambio</option>




</select>
  </div>





 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="far fa-chart-bar"></i>  </span>
    </div>


    

<select class="form-control">
    
<option>Prioridad</option>
<option>Alta / Rojo</option>
<option>Media / Amarillo</option>
<option>Baja / Verde</option>

</select>


  </div>










 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">

        <i class="fas fa-cog"></i> 
         </span>
    </div>
    <input type="text" class="form-control" placeholder="Estado">
  </div>






 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-user-shield"></i>  </span>
    </div>

<select class="form-control">
<option>Asignar a empleado</option>

</select>


  </div>







 <div class="input-group col-sm-12">
  <div class="input-group-prepend">
  <span style="width: 35px"  class="input-group-text"><i class="fas fa-dollar-sign"></i>   </span>
  </div>
 
<textarea class="form-control"  placeholder="comentarios"></textarea>


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

<!-- MODAL NUEVA TAREA -->









<!-- MODAL NUEVO USUARIO -->


<div class="modal fade nuevoUsuario" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


  <div class="modal-dialog modal-sm-8">
 
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
    


 <div class="input-group  col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-cube"></i></span>
    </div>
    <input type="text" class="form-control" placeholder="Nombre de tarea">
  
  </div>


 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="far fa-chart-bar"></i>  </span>
    </div>
    <input type="text" class="form-control" placeholder="Prioridad">
  </div>



 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">

        <i class="fas fa-cog"></i> 
         </span>
    </div>
    <input type="text" class="form-control" placeholder="Estado">
  </div>






 <div class="input-group col-sm-12">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i class="fas fa-user-shield"></i>  </span>
    </div>

<select class="form-control">
<option>Asignar a empleado</option>

</select>


  </div>







 <div class="input-group col-sm-12">
  <div class="input-group-prepend">
  <span style="width: 35px"  class="input-group-text"><i class="fas fa-dollar-sign"></i>   </span>
  </div>
 
<textarea class="form-control"  placeholder="comentarios"></textarea>


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
