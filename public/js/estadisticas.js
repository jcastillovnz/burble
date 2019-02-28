
Vue.prototype.moment = moment;

Vue.use(VueChartkick, {adapter: Chart})

var appEstadisticas = new Vue({
  el: '#estadisticas',

    mounted(){


this.GetEmpleados();
this.GetProyectos();

    },
  data: {

  empleados: [ ],
  proyectos:[ ],
  consultaProyecto: {
 mes: moment().format("M"),
 ano: moment().format("Y")
  },
  mes: moment().format("M"),
  ano: moment().format("Y")


  }
,
methods:{
GetEmpleados: function () {


axios({
url: '/api/empleados-estadistica/',
method: 'get',
params: {
mes:this.mes,
ano:this.ano,
 }
}).then(response => {
  

response.data.forEach(function(empleado, index) {

appEstadisticas.empleados.push( [empleado.name+' '+empleado.apellido  , empleado.tareas.length]   )

});
});

},

GetProyectos: function () {


axios({
url: '/api/proyectos-estadistica/',
method: 'get',
params: {
mes:this.consultaProyecto.mes,
ano:this.consultaProyecto.ano,
 }
}).then(response => {
  


appEstadisticas.proyectos.push(
 ['Enero' , response.data.enero],
 ['Febrero' , response.data.febrero],
 ['Marzo' , response.data.marzo], 
 ['Abril' , response.data.abril], 
 ['Junio' , response.data.junio], 
 ['Julio' , response.data.julio], 
 ['Agosto' , response.data.agosto], 
 ['Septiembre' , response.data.septiembre],
 ['Octubre' , response.data.octubre],
 ['Noviembre' , response.data.noviembre],
 ['Diciembre' , response.data.diciembre],

    )


console.log(this.proyectos)

});





}

}
,







})