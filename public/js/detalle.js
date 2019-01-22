
var Detalle_proyecto = new Vue({ 
    el: '#DetalleProyecto',
     mounted(){
this.getProyecto();
},
    data: {

 preview: '' ,
  cliente: '',
  state: 0 ,
  state_edit: 0,
proyecto: [],
rellenar: { 
    'id':'',
    'imagen_tarea':'', 
    'nombre_tarea':'',
    'tipo':'',
    'prioridad':'',
    'estado':'',
    'fecha_inicio':'',
    'fecha_termino':'',
    'presupuesto':'',
    'comentario':'',
    ////////////////
    'empleado_nombre':'',
    'empleado_apellido':'',
    'empleado_foto':'',
   },
tareas: [],

pagination:{
'total': 0,
'current_page': 0,
'per_page': 0,
'last_page': 0,
'from': 0,
'to': 0
}
}
,
computed:{
isActived: function () {

 return  this.pagination.current_page;
},

pagesNumber: function () {

if (!this.pagination.to) {
return [];
}

var from = this.pagination.current_page - 2;

if (from <1) {
  from=1;
}

var to = from + (2*2 );
if (to >=this.pagination.last_page) {

to =this.pagination.last_page

}

var pagesArray = [];

while ( from <= to){
pagesArray.push(from);
from++;
}
return pagesArray;

}

}
,
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

},
show: function(tarea) {
$('#edit_item').modal('show');
this.rellenar.id = tarea.id;
this.rellenar.nombre = tarea.nombre;
this.rellenar.imagen_tarea = tarea.imagen;
this.rellenar.tipo = tarea.tipo;
this.rellenar.prioridad = tarea.prioridad;
this.rellenar.estado = tarea.estado;
this.rellenar.fecha_inicio = tarea.fecha_inicio;
this.rellenar.fecha_termino = tarea.fecha_termino;
this.rellenar.presupuesto = tarea.presupuesto;
this.rellenar.comentario = tarea.comentario;
this.rellenar.empleado_nombre = tarea.users.name;
this.rellenar.empleado_apellido = tarea.users.apellido;
this.rellenar.empleado_foto = tarea.users.foto;
},
edit_tarea: function(proyecto) {

if (this.state_edit == 0) {
this.state_edit = 1;
console.log(this.state_edit);
  } else{
this.state_edit = 0;
}
}
,
paginar: function (page) {

axios({
  url: '/proyecto/paginar/tareas?page='+page,
  method: 'get',
  params: {
id: this.proyecto.id
  }
}).then(response => {
  this.tareas = response.data.tareas.data
  this.pagination=  response.data.pagination

});
},
edicion: function(item) {

if (this.state == 0) {
this.state = 1;
console.log(this.state);
  } else{
this.state = 0;
}

},
eliminar: function(tarea)  {
//document.getElementById('loader-detalle').style.display="block";
alertify.confirm(' <strong>Alerta - Burble</strong>', '¿Estas seguro de eliminar la tarea ' +tarea.nombre+ ' del sistema?' 

,() => {
axios({
  url: '/api/tareas/delete/',
  method: 'get',
  params: {
 id: tarea.id
}
}).then(function (response) {
//document.getElementById('loader-busqueda').style.display="none";
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Eliminado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
Detalle_proyecto.getTareas_proyecto();

})}, function(){ });

},



changePage: function (page) {
this.pagination.current_page=page;
this.paginar(page);
}
,
close: function() {


$('#edit_item').modal('hide');
this.clear(this.rellenar);
if (this.state_edit == 1) {
this.state_edit = 0;
} 
}
,
clear: function() {

this.rellenar.nombre = '';
this.rellenar.imagen_tarea = '';
this.rellenar.tipo = '';
this.rellenar.prioridad = '';
this.rellenar.estado = '';
this.rellenar.fecha_inicio = '';
this.rellenar.fecha_termino = '';
this.rellenar.presupuesto = '';
this.rellenar.comentario = '';
this.rellenar.empleado_nombre = '';
this.rellenar.empleado_apellido = '';
this.rellenar.empleado_foto = '';
this.preview = '';

},
cargar_imagen: function(e) {

const file = event.target.files[0];
this.preview = URL.createObjectURL(file);
//Convertir en archivo antes de enviar
this.foto = file;
this.enviar_foto(file);



},



enviar_foto: function(file)  {

const formData = new FormData()
formData.append('imagen', file, file.name)

axios.post('/detalle/tarea/send_imagen/'+this.rellenar.id, formData).then(function(response){


Detalle_proyecto.rellenar.imagen_tarea=response.data   ;


    var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
  console.log('SUCCESS!!');
Detalle_proyecto.getTareas_proyecto();

})
.catch(function(error){
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
  console.log('FAILURE LA CARGA!!');
});



 }
,





update: function(status) {
document.getElementById('btn-details-tarea').disabled = true;
document.getElementById('loader-details-tarea').style.display="block";


var url = '/api/tareas/update' ;
axios.post( url, {

id:this.rellenar.id,
nombre: this.rellenar.nombre,
imagen_tarea: this.rellenar.imagen_tarea,
tipo: this.rellenar.tipo,
prioridad: this.rellenar.prioridad,
estado: this.rellenar.estado,
fecha_inicio: this.rellenar.fecha_inicio,
fecha_termino: this.rellenar.fecha_termino,
comentario: this.rellenar.comentario,
empleado_nombre: this.rellenar.empleado_nombre,
empleado_apellido: this.rellenar.empleado_apellido,
empleado_foto: this.rellenar.empleado_foto,



validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).catch(error => {
}).then(response => {
if (response.data == "true") {

document.getElementById('btn-details-tarea').disabled = false;
document.getElementById('loader-details-tarea').style.display="none";
this.state= 0;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.buscar();

}
else
{
document.getElementById('btn-details-tarea').disabled = false;
document.getElementById('loader-details-tarea').style.display="none";

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});


},









}
})


