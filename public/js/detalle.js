
var Detalle_proyecto = new Vue({ 
    el: '#DetalleProyecto',
     mounted(){
this.getProyecto();
this.getUsers();

},
    data: {

 preview: '' ,
  cliente: '',
  state: 0 ,
  state_tarea:0,
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
Rtarea: { 
    'id':'',
    'foto':'', 
    'nombre_tarea':'',
    'objetivo_tarea':'',
    'prioridad_tarea':'',
    'tipo_tarea':'',
    'fecha_inicio':'',
    'fecha_termino':'',
    'tipo_tarea':'',
    'presupuesto':'',
    'Ntareas':'',
    'comentario':'',
    ////////////////
    'nombre_cliente':'',
    'empleado_id':''
   },


Rproyecto: { 
    'id':'',
    'foto':'', 
    'nombre_proyecto':'',
    'fecha_recepcion':'',
    'fecha_entrega':'',
    'presupuesto':'',
    'Ntareas':'',
    'comentario':'',
    ////////////////
    'nombre_cliente':''
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

getUsers: function(dato)  {
 var urlUsers = '/api/usuarios/consulta/';
  axios.get(urlUsers).then(response => {
  this.lista_users = response.data
});
 }
,
updateTarea: function(status) {
document.getElementById('btn-tarea').disabled = true;
document.getElementById('loader-tarea').style.display="block";
var url = '/api/tareas/update' ;
axios.post( url, {
id:this.Rtarea.id,
nombre: this.Rtarea.nombre,
imagen_tarea: this.Rtarea.imagen_tarea,
tipo: this.Rtarea.tipo,
prioridad: this.Rtarea.prioridad,
estado: this.Rtarea.estado,
fecha_inicio: this.Rtarea.fecha_inicio,
fecha_termino: this.Rtarea.fecha_termino,
comentario: this.Rtarea.comentario,
empleado_nombre: this.Rtarea.empleado_nombre,
empleado_apellido: this.Rtarea.empleado_apellido,
empleado_foto: this.Rtarea.empleado_foto,

validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).catch(error => {
}).then(response => {
if (response.data == "true") {

document.getElementById('btn-tarea').disabled = false;
document.getElementById('loader-tarea').style.display="none";
this.state_tarea= 0;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.getListaPrincipal();
this.getListaTareas();
}
else
{
document.getElementById('btn-details-tarea').disabled = false;
document.getElementById('loader-details-tarea').style.display="none";

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});


},





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

this.Rproyecto.id = this.proyecto.id;
this.Rproyecto.nombre_proyecto = this.proyecto.nombre;
this.Rproyecto.fecha_recepcion = this.proyecto.fecha_recepcion;
this.Rproyecto.fecha_entrega = this.proyecto.fecha_entrega;
this.Rproyecto.presupuesto = this.proyecto.presupuesto;
this.Rproyecto.comentario = this.proyecto.comentario;


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


create_tarea: function(tarea) {


document.getElementById('loader-create-tarea').style.display="block";
document.getElementById('btn-create-tarea').disabled = true;


var url = '/api/proyecto/tarea/create/' ;
axios.get( url, {
  params: {

nombre_tarea: this.Rtarea.nombre_tarea,
objetivo_tarea: this.Rtarea.objetivo_tarea,
tipo_tarea: this.Rtarea.tipo_tarea,
fecha_inicio: this.Rtarea.fecha_inicio,
fecha_termino: this.Rtarea.fecha_termino,
estado_tarea: 'amarilo',
prioridad_tarea: this.Rtarea.prioridad_tarea,
empleado_id: this.Rtarea.empleado_id,
proyectos_id: this.Rproyecto.id,
comentario_tarea: this.Rtarea.comentario,



}
,
validateStatus: (status) => {




        return true; // I'm always returning true, you may want to do it depending on the status received
      },
    }).then(response => {



document.getElementById('loader-create-tarea').style.display="none"
document.getElementById('btn-create-tarea').disabled = false;

$('.nuevaTarea').modal('hide')


var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
Detalle_proyecto.getTareas_proyecto();
Detalle_proyecto.clear();



}).catch(error => {

document.getElementById('loader-create-tarea').style.display="none"
$('.nuevaTarea').modal('hide')
document.getElementById('btn-create-tarea').disabled = false;
 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

      
    })

    ;




}
,



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
$('.nuevaTarea').modal('hide');

$('#edit_item').modal('hide');
this.clear(this.rellenar);
if (this.state_edit == 1) {
this.state_edit = 0;
} 
}
,
clear: function() {

this.Rtarea.id = '';
this.Rtarea.nombre_tarea = '';
this.Rtarea.imagen_tarea = '';
this.Rtarea.tipo = '';
this.Rtarea.objetivo_tarea = '';
this.Rtarea.prioridad = '';
this.Rtarea.estado = '';
this.Rtarea.fecha_inicio = '';
this.Rtarea.fecha_termino = '';
this.Rtarea.presupuesto = '';
this.Rtarea.comentario = '';
this.Rtarea.empleado_nombre = '';
this.Rtarea.empleado_apellido = '';
this.Rtarea.empleado_foto = '';
this.Rtarea.empleado_id = '';

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
Detalle_proyecto.getTareas_proyecto();

})
.catch(function(error){
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

});



 }
,

update_proyecto: function(status) {
document.getElementById('btn-details-proyecto').disabled = true;
document.getElementById('loader-details-proyecto').style.display="block";

var url = '/api/proyectos/update' ;
axios.post( url, {

id:this.Rproyecto.id,
nombre: this.Rproyecto.nombre_proyecto,
fecha_entrega: this.Rproyecto.fecha_entrega,
fecha_recepcion: this.Rproyecto.fecha_recepcion,
presupuesto:this.Rproyecto.presupuesto,
comentario:this.Rproyecto.comentario,



validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).then(response => {


document.getElementById('btn-details-proyecto').disabled = false;
document.getElementById('loader-details-proyecto').style.display="none";
this.state= 0;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });

this.getProyecto();


}).catch(error => {

  
document.getElementById('btn-details-proyecto').disabled = false;
document.getElementById('loader-details-proyecto').style.display="none";
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
});


},








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


