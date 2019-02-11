@extends('layouts.app')

@section('content')


 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Empleado', 'Tareas realizadas'],
       @foreach ($empleados as $empleado)    
          ['{{$empleado->name}} {{$empleado->apellido}}', {{count($empleado['tareas']) }} ],
           @endforeach
        ]);
        var options = {
          title: 'Tareas por empleado'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>


<script type="text/javascript">
 google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Empleado', 'Tareas', 'Profit'],
          
          ['2014', 1000, 400, 200],
       
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
  </script>


<div style="margin-top: 0px; margin: 0px;" class="col-sm-12">
<div  style="margin-bottom: 4%;" class="col-sm-12">
<strong  style="font-size: 18px;" class="float-left text-info"> 
<i class="fas fa-chart-area"></i>
Estadisticas
</strong> 
</div>



<div  style="margin-top: 0px; margin: 0px;"  class=" col-sm-12 ">

<div class="col-sm-12">
 <div class="container-fluid"  id="piechart" style="margin-top: 0px; margin: 0px;  width: 100%; height: 80%;">
 </div>


</div>


<div class="col-sm-12">

<div id="barchart_material" style="width: 1200px; height: 500px;"></div>
</div>

</div>




</div>

















@endsection
