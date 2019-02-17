@extends('layouts.app')

@section('content')


 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
          ["King's pawn (e4)", 44],
          ["Queen's pawn (d4)", 31],
          ["Knight to King 3 (Nf3)", 12],
          ["Queen's bishop pawn (c4)", 10],
          ['Other', 3]
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Chess opening moves',
            subtitle: 'popularity by percentage' },
          axes: {
            x: {
              0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>


<script type="text/javascript">








google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMaterial);
function drawMaterial() {
       var data = google.visualization.arrayToDataTable([
         ['Empleados', 'Tareas', { role: 'style' }],
              @foreach ($empleados as $empleado)   
         ['{{$empleado->name}} {{$empleado->apellido}}', {{count($empleado['tareas']) }}, '#b87333'],            // RGB value
               @endforeach
      ]);

      var materialOptions = {
        chart: {
          title: 'Produccion de tareas  {{ now()->format('M-y')  }} '
        },
        hAxis: {
          title: 'Total productividad al mes',
          minValue: 0,
        },
        vAxis: {
          title: 'Tareas '
        },
        bars: 'vertical'
      };
      var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
      materialChart.draw(data, materialOptions);
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

<div id="chart_div"  ></div>


 </div>


</div>







<div class="col-sm-12">


<div id="top_x_div"  ></div>



</div>








</div>




</div>

















@endsection
