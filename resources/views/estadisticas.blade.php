@extends('layouts.app')

@section('content')


 <script type="text/javascript" src="js/vue.js" defer=""></script>


<script src="https://unpkg.com/chart.js@2.7.2/dist/Chart.bundle.js"></script>
<script src="https://unpkg.com/vue-chartkick@0.5.0"></script>

 <script type="text/javascript" src="js/estadisticas.js" defer=""></script>



 <script type="text/javascript" src="https://momentjs.com/downloads/moment.js" > </script>




<div  id="estadisticas"   style="margin-top: 0px; margin: 0px;"  class="col-sm-12">
<div  style="margin-bottom: 4%;" class="col-sm-12">
<strong  style="font-size: 18px;" class="float-left text-info"> 
<i class="fas fa-chart-area"></i>
Estadisticas
</strong> 
</div>

<div  style="margin-top: 0px; margin: 0px;"  class=" col-sm-12 ">

<div  class="col-sm-12">


<div  class="input-group">

<div class="input-group-prepend">
<div style="width: 34px" class="input-group-text content"><i class="far fa-calendar-alt"></i> 
</div>
</div>



<select  v-on:change="GetEmpleados" style="max-width: 100px" title="Año"   v-model="ano" class="form-control form-control-sm">Seleccione año
<option  value="2018">2018</option> 


<option  value="2019" >2019</option>


</select>



<select v-on:change="GetEmpleados"  style="max-width: 110px" title="Mes" v-model="mes"  class="form-control form-control-sm">Seleccione mes
            <option value="1">Enero</option>

            <option value="2">Febrero</option>

            <option value="3">Marzo</option>

            <option value="4">Abril</option>

            <option value="5">Mayo</option>

            <option value="6">Junio</option>

            <option value="7">Julio</option>

            <option value="8">Agosto</option>

            <option value="9">Septiembre</option>

            <option value="10">Octubre</option>

            <option value="11">Noviembre</option>

            <option value="12">Diciembre</option>
</select>


<div  style="margin-left:10px; "  id="loader-estadistica-empleados" class="loader loader-sm float-right"></div>




</div>




</div>




  <div><column-chart :data="empleados"></column-chart> </div>








<div  class="col-sm-12">


<div  class="input-group">

<div class="input-group-prepend">
<div style="width: 34px" class="input-group-text content"><i class="far fa-calendar-alt"></i> 
</div>
</div>



<select  v-on:change="GetProyectos" style="max-width: 100px" title="Año"   v-model="consultaProyecto.ano" class="form-control form-control-sm">Seleccione año
<option  value="2018">2018</option> 


<option  value="2019" >2019</option>


</select>




<div  style="margin-left:10px; "  id="loader-estadistica-empleados" class="loader loader-sm float-right"></div>




</div>




</div>

  <div> <column-chart :data="proyectos"></column-chart> </div>
  
  
 </div>


</div>







<div  class="col-sm-12">



</div>








</div>




</div>

















@endsection
