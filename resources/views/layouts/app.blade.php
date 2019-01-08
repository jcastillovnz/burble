<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
  

    <!-- Fonts -->
           <!-- Fonts -->
        <!-- Fonts -->

          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

          <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    
          <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" >
           <link href="css/app.css" rel="stylesheet" type="text/css">
           <link href="{{ asset('css/alertify.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('css/loader.css') }}" rel="stylesheet" type="text/css">
 
             



<script src="{{ asset('js/axios.min.js') }} " defer></script>


<script    type="text/javascript" src="{{ asset('js/jQuery.js') }}"   ></script>

<script  type="text/javascript" src="{{ asset('js/alertify.min.js') }}" ></script>

<script src=" {{ asset('js/popper.min.js') }}"></script>


<script src="{{ asset('js/bootstrap.min.js') }}"  ></script>
  <!-- Sortable.js -->
<!-- CDNJS :: Sortable (https://cdnjs.com/) -->

<script src="{{ asset('js/sortable.js') }}"></script>



<script src="{{ asset('js/app.js') }}" defer></script>


<nav class="navbar navbar-expand-lg navbar-light border-bottom ">
    <a class="navbar-brand text-primary" href="{{ url('/') }}">
<strong>              {{ config('app.name', 'Laravel') }}
</strong>
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
<ul class="navbar-nav mr-auto mt-2 my-lg-0">
</ul>
<form class="form-inline my-2 my-lg-0">
<input class="form-control mr-sm-2" type="search" placeholder="Proyecto / Tarea">
<button class="btn btn-light my-2 my-sm-0" type="submit">Buscar</button>
</form>
   <ul class="navbar-nav  my-lg-0">
 @guest


      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-user"></i> Iniciar session <span class="sr-only">(current)</span></a>
      </li>
 @else

      <li class="nav-item">
     <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                   <i class="fas fa-sign-out-alt"></i> Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
</li>


@endguest
   
</ul>
</nav>
<script src="{{ asset('js/vue.js') }}" defer></script>
<script src="{{ asset('js/appVuej.js') }}" defer></script>



</head>



<div  id="loader" class="loader loader-lg" ></div>

<body   class="col-sm-12  ">






<!-- MODAL NUEVO CLIENTE -->
<div    class="modal fade nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm-8">
 <div  id="AppClientes" class="modal-content">
<form  v-on:submit.prevent="enviar(this)"    method="GET" class="hidden" role="form"     >
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
<div class="input-group  col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-cube"></i></span>
</div>
<input required="" type="text" class="form-control" v-model="empresa" placeholder="Nombre de empresa">
</div>

<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-dollar-sign"></i>  </span>
</div>
<input v-model="sitio_web"   type="text" class="form-control" placeholder="Sitio web">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-map-marker-alt"></i></i> </span>
</div>
<input  v-model="ciudad"  class="form-control" type="" name="" placeholder="Ciudad">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text">
<i class="fas fa-globe-americas"></i>
</span>
</div>
<select  class="form-control"  v-model="pais">
<option value="" selected="">Pais</option>
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
<input   type="" class="form-control" v-model="telefono" placeholder="Telefono">
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
<input required=""  type="" class="form-control" v-model="nombre_contacto" placeholder="Nombre">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text">
<i class="fas fa-user"></i>
</span>
</div>
<input type="" class="form-control" v-model="apellido_contacto" placeholder="Apellido">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text">
<i class="fas fa-phone-square"></i></span>
</div>
<input required="" type="" class="form-control" v-model="telefono_contacto" placeholder="Telefono">
</div>
<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text">
<i class="fas fa-mail-bulk"></i>
</span>
</div>
<input  required=""  type="email" class="form-control" v-model="email_contacto" placeholder="Email">
</div>
</div>
<div class="modal-footer">
<div class="btn btn-group  ">
<div id="loader-sm" class="loader loader-sm "></div>


<button class="btn btn-light btn-sm " title="Cancelar" type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>
<button type="submit"  id="btn-clientes" class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL NUEVO CLIENTE -->

















<nav class="navbar navbar-expand-lg navbar-light ">

 @guest
  @else
<span class="navbar-brand text-primary" href="{{ url('/') }}">
<img src="img/user.png" width="40">
<strong>
{{ Auth::user()->name }} 
</strong>
</span>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">



    <ul class="navbar-nav mr-auto mt-2 my-lg-0">

    </ul>






<ul class="navbar-nav  my-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
</li>

<li class="nav-item">
        <a class="nav-link" href="#"  data-toggle="modal" data-target=".nuevoCliente"><i class="fas fa-suitcase"></i> Registrar cliente</a>
</li>

<li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-chart-area"></i> Estadisticas</a>
</li>
  



<div class="dropdown nav-item">
  <a class="nav-link dropdown-toggle"  data-toggle="dropdown"><i class="fas fa-cogs nav-item"></i> Configuracion
  <span class="caret"></span></a>
  <ul class="dropdown-menu ">
    <li class="dropdown-item"><a class="dropdown-item nav-link" href="{{ url('/mi-cuenta') }}"><i class="fas fa-user-alt "></i>  Mi cuenta</a></li>
    <li class="dropdown-item"><a class="dropdown-item nav-link" href="{{ url('/gestiones') }}"><i class="fas fa-users-cog "></i>  Gestiones</a></li>
    <li class="dropdown-item"><a  class="dropdown-item nav-link" href="#"><i class="fas fa-lock "></i>  Salir</a></li>
  </ul>
</div>



</ul>






@endguest

</div>
</nav>
    








<!--  

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
                    <ul class="navbar-nav mr-auto">

                    </ul>

                  
                    <ul class="navbar-nav ml-auto">
       
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    -->
 @yield('content')




</div>
</body>

<footer class="col-sm-12 margin-bottom-none" >
<center>
  <br>
<p>
  
© 2018  Burble para Achelier Studio - <i class="fas fa-code"></i> Desarrollado por Jose Castillo 

</p>
</center>




</footer>
</html>
