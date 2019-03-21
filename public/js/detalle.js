




var Detalle_proyecto = new Vue({ 
    el: '#DetalleProyecto',
     mounted(){
this.getProyecto();
this.getUsers();


fecha = new Date();
dia = fecha.getDate();
mes = fecha.getMonth()+1;// +1 porque los meses empiezan en 0
anio = fecha.getFullYear();
this.Rproyecto.fecha_recepcion = +anio+'/'+mes+'/'+dia;
this.Rtarea.fecha_inicio = +anio+'/'+mes+'/'+dia;

},
    data: {

    options: {
      // https://momentjs.com/docs/#/displaying/
      format: 'YYYY/MM/DD ',
      useCurrent: false,
      showClear: true,
      showClose: true,
    }
,



 preview: '' ,
  cliente: '',
  todos_users : [],

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
    'empleado_id':'',
    'empleado_nombre':'',
    'empleado_apellido':'',
    'empleado_foto':''
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



 var urlUsers = '/api/usuarios/';
  axios.get(urlUsers).then(response => {

 
  this.todos_users   = response.data;


});
 }
,
enviar_foto_proyecto: function(file)  {
const formData = new FormData()
formData.append('imagen', file, file.name)
axios.post('/proyecto/send_imagen/'+this.Rproyecto.id, formData).then(function(response){
Detalle_proyecto.getProyecto();


var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
})
.catch(function(error){
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

});
},

cargar_imagen_proyecto: function(e) {
const file = event.target.files[0];

this.foto = file;
this.enviar_foto_proyecto(file);
},





update_proyecto: function(status) {
document.getElementById('btn-details-proyecto').disabled = true;
document.getElementById('loader-details-proyecto').style.display="block";


var url = '/api/proyectos/update' ;
axios.post( url, {
id:this.Rproyecto.id,
nombre: this.Rproyecto.nombre_proyecto,
prioridad: this.Rproyecto.prioridad,
fecha_recepcion: this.Rproyecto.fecha_recepcion,
fecha_entrega: this.Rproyecto.fecha_entrega,
presupuesto: this.Rproyecto.presupuesto,
descripcion:this.Rproyecto.descripcion,
comentario:this.Rproyecto.comentario,
validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).catch(error => {
}).then(response => {
if (response.data == "true") {

document.getElementById('btn-details-proyecto').disabled = false;
document.getElementById('loader-details-proyecto').style.display="none";
this.state= 0;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.getProyecto();

}
else
{
document.getElementById('btn-details-proyecto').disabled = false;
document.getElementById('loader-details-proyecto').style.display="none";

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});


},




fecha_actual: function( ){

fecha = new Date();
dia = fecha.getDate();
mes = fecha.getMonth()+1;// +1 porque los meses empiezan en 0
anio = fecha.getFullYear();
this.Rproyecto.fecha_recepcion = +anio+'/'+mes+'/'+dia;
this.Rtarea.fecha_inicio = +anio+'/'+mes+'/'+dia;




}

,
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
this.Rproyecto.img = this.proyecto.img;
this.Rproyecto.nombre_proyecto = this.proyecto.nombre;
this.Rproyecto.prioridad= this.proyecto.prioridad;
this.Rproyecto.fecha_recepcion = this.proyecto.fecha_recepcion;
this.Rproyecto.fecha_entrega = this.proyecto.fecha_entrega;
this.Rproyecto.presupuesto = this.proyecto.presupuesto;
this.Rproyecto.comentario = this.proyecto.comentario;
this.Rproyecto.descripcion = this.proyecto.descripcion;

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


show_tarea: function(tarea, user) {

console.log( tarea);
console.log( user);

$('#edit_tarea').modal('show');
this.Rtarea.id = tarea.id;
this.Rtarea.nombre_tarea = tarea.nombre;
this.Rtarea.objetivo_tarea = tarea.objetivo;

this.Rtarea.imagen_tarea = tarea.imagen;
this.Rtarea.tipo = tarea.tipo;
this.Rtarea.prioridad = tarea.prioridad;
this.Rtarea.estado = tarea.estado;
this.Rtarea.fecha_inicio = tarea.fecha_inicio;
this.Rtarea.fecha_termino = tarea.fecha_termino;
this.Rtarea.presupuesto = tarea.presupuesto;
this.Rtarea.comentario = tarea.comentario;


this.Rtarea.empleado_nombre = user.name;
this.Rtarea.empleado_apellido = user.apellido;
this.Rtarea.empleado_foto = user.foto;
this.Rtarea.empleado_id = user.id;

},



nueva_tarea: function(item) {

fecha = new Date();
dia = fecha.getDate();
mes = fecha.getMonth()+1;// +1 porque los meses empiezan en 0
anio = fecha.getFullYear();
this.Rproyecto.fecha_recepcion = +anio+'/'+mes+'/'+dia;
this.Rtarea.fecha_inicio = +anio+'/'+mes+'/'+dia;



this.Rproyecto.id = this.proyecto.id 





$('.nuevaTarea').modal('show');




}
,

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
estado_tarea: 'amarillo',
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
});
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

close_tarea: function() {
$('.nuevaTarea').modal('hide');

$('#edit_tarea').modal('hide');
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
cargar_imagen_tarea: function(e) {

const file = event.target.files[0];
this.preview = URL.createObjectURL(file);
//Convertir en archivo antes de enviar
this.foto = file;
this.enviar_foto(file);
},

enviar_foto: function(file)  {
const formData = new FormData()
formData.append('imagen', file, file.name)
axios.post('/detalle/tarea/send_imagen/'+this.Rtarea.id, formData).then(function(response){
Detalle_proyecto.Rtarea.imagen_tarea=response.data   ;

var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
Detalle_proyecto.getTareas_proyecto();

})
.catch(function(error){
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

});



 }
,



update_tarea: function(status) {



document.getElementById('btn-edit-tarea').disabled = true;
document.getElementById('loader-edit-tarea').style.display="block";
var url = '/api/tareas/update' ;
axios.post( url, {



id:this.Rtarea.id,
nombre: this.Rtarea.nombre_tarea,
imagen_tarea: this.Rtarea.imagen_tarea,
tipo: this.Rtarea.tipo,
prioridad: this.Rtarea.prioridad,
estado: this.Rtarea.estado,
fecha_inicio: this.Rtarea.fecha_inicio,
fecha_termino: this.Rtarea.fecha_termino,
comentario: this.Rtarea.comentario,
empleado_id: this.Rtarea.empleado_id,



validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).catch(error => {
}).then(response => {



console.log(response.data.tarea);

if (response.data.estado === true) {


document.getElementById('btn-edit-tarea').disabled = false;
document.getElementById('loader-edit-tarea').style.display="none";

this.state_edit= 0;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
Detalle_proyecto.getProyecto();

Detalle_proyecto.show_tarea(response.data.tarea, response.data.tarea.users)


}

else
{


console.log(response.data.estado);
document.getElementById('btn-edit-tarea').disabled = false;
document.getElementById('loader-edit-tarea').style.display="none";
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

}
});


},









}
})


