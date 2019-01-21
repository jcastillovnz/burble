
var Detalle_proyecto = new Vue({ 
    el: '#DetalleProyecto',
     mounted(){

this.getProyecto();




    },
    data: {


  cliente: '',
  state: 0 ,
proyecto: [],
rellenar: { 
    'id':'',
    'nombre_proyecto':'',
    'fecha_recepcion':'',
    'fecha_entrega':'',
    'presupuesto':'',
    'Ntareas':'',
    'comentario':'',
    ////////////////
    'nombre_cliente':''
   },

tareas: { 
    'id':'',
    'foto':'', 
    'nombre_tarea':'',
    'tipo_tarea':'',
    'fecha_inicio':'',
    'fecha_termino':'',
    'tipo_tarea':'',
    'presupuesto':'',
    'Ntareas':'',
    'comentario':'',
    ////////////////
    'nombre_cliente':''
   },

pagination:{
'total': 0,
'current_page': 0,
'per_page': 0,
'last_page': 0,
'from': 0,
'to': 0
}
},

methods: {

getProyecto: function(dato)  {
id = document.getElementById('proyecto_id').value;

axios({

  url: '/proyecto/',
  method: 'get',
  params: {
id: id
  }
}).then(response => {

  this.proyecto = response.data;
 this.cliente =  this.proyecto.clientes.nombre;

this.getTareas_proyecto(this.proyecto);


});


 },


getTareas_proyecto: function(dato)  {



axios({

  url: '/proyecto/paginar/tareas/',
  method: 'get',
  params: {
id: this.proyecto.id
  }
}).then(response => {

  this.tareas= response.data.tareas.data;

  this.pagination=  response.data.pagination;

});



 }
,

paginarTareas: function(dato)  {






 }
,
edicion: function(item) {

if (this.state == 0) {
this.state = 1;
console.log(this.state);
  } else{
this.state = 0;
}

}
,







  }
});
