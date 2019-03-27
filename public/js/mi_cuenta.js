



/*GESTIONAR USUARIOS*/

var cuenta = new Vue({ 
    el: '#Mi_cuenta',
  mounted(){
this.getUser();
    },


data: {
 options: {
      // https://momentjs.com/docs/#/displaying/
      format: 'YYYY/MM/DD ',
      useCurrent: false,
      showClear: true,
      showClose: true,
    },

pagination:{
'total': 0,
'current_page': 0,
'per_page': 0,
'last_page': 0,
'from': 0,
'to': 0
},
     Rproyecto: { 
    'id':'',
     'img':'',
    'nombre_proyecto':'',
    'descripcion':'',
    'prioridad':'',
    'fecha_recepcion':'',
    'fecha_entrega':'',
    'presupuesto':'',
    'Ntareas':'',
    'comentario':'',
    ////////////////
    'nombre_cliente':'',
    'cliente_id':''
   },
     usuario: null,
     proyectos:[],
     state: 0,
     state_user: 0, 
     preview: 'img/user.png' ,
     id: '',
     foto:null,
     foto_user: null ,
     nombre:'',
     apellido: '',
     email: '',
     alias: '',
     fecha_nacimiento: '',
     rango: '',
     password: '',
     cuit: '',
     direccion: '',
     obra_social: '',
     servicio_ambulancia: '',
     contacto_ambulancia: '',
 




    },


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

getUser: function(event)  {
const user_id = document.getElementById('user_id').value;
axios({
  url: '/api/usuario/',
  method: 'get',
  params: {
 id:user_id
  }
}).then(response => {

   this.id = response.data.id
     this.usuario = response.data
     this.foto_user  =  this.usuario.foto;

     this.nombre = this.usuario.name;
     this.apellido =  this.usuario.apellido;
     this.email =  this.usuario.email;
     this.alias =  this.usuario.alias;
     this.fecha_nacimiento =  this.usuario.fecha_nacimiento;
     this.rango = this.usuario.rango;
     this.cuit =  this.usuario.cuit;
     this.direccion =  this.usuario.direccion;
     this.obra_social =  this.usuario.obra_social;
     this.servicio_ambulancia =  this.usuario.servicio_ambulancia;
     this.contacto_ambulancia =  this.usuario.contacto_ambulancia;
     this.GetProyectosXuser(this.id);
    
});
}
,
close: function() {
$('#edit_proyecto').modal('hide');
$('#edit_item').modal('hide');
this.clear();

if (this.state_edit == 1) {
this.state_edit = 0;
} 
$('.nuevoProyecto').modal('hide');
}
,

clear: function(tarea) {
this.Rproyecto.id = '';
this.Rproyecto.nombre_proyecto = '';
this.Rproyecto.fecha_recepcion = '';
this.Rproyecto.fecha_entrega = '';
this.Rproyecto.prioridad = '';
this.Rproyecto.descripcion = '';
this.Rproyecto.presupuesto = '';
this.Rproyecto.Ntareas = '';
this.Rproyecto.nombre_cliente = '';
this.Rproyecto.cliente_id = '';
this.Rproyecto.comentario = '';



},



GetProyectosXuser: function(user_id)  {

axios({
  url: '/proyectosxuser/',
  method: 'get',
  params: {
 id:user_id
  }
}).then(response => {

this.proyectos  = response.data.proyectos.data
this.pagination =  response.data.pagination;


});
}
,
mostrar_proyecto: function(proyecto) {


$('.edit_proyecto').modal('show');

this.Rproyecto.id              = proyecto.id;
this.Rproyecto.img             = proyecto.img;
this.Rproyecto.nombre_proyecto = proyecto.nombre;
this.Rproyecto.prioridad       = proyecto.prioridad ;
this.Rproyecto.descripcion     = proyecto.descripcion;
this.Rproyecto.fecha_recepcion = proyecto.fecha_recepcion;
this.Rproyecto.fecha_entrega   = proyecto.fecha_entrega;
this.Rproyecto.presupuesto     = proyecto.presupuesto;
this.Rproyecto.comentario      = proyecto.comentario;
this.Rproyecto.nombre_cliente  = proyecto.clientes.nombre;
this.Rproyecto.Ntareas         = proyecto.tareas.length;


},
update_proyecto: function(status) {
document.getElementById('btn-details-proyecto').disabled = true;
document.getElementById('loader-details-proyecto').style.display="block";


var url = '/api/proyectos/update' ;
axios.post( url, {

id:this.Rproyecto.id,
nombre: this.Rproyecto.nombre_proyecto,
prioridad: this.Rproyecto.prioridad,
descripcion: this.Rproyecto.descripcion,
fecha_recepcion: this.Rproyecto.fecha_recepcion,
fecha_entrega: this.Rproyecto.fecha_entrega,
presupuesto: this.Rproyecto.presupuesto,
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



}
else
{
document.getElementById('btn-details-proyecto').disabled = false;
document.getElementById('loader-details-proyecto').style.display="none";

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});


},

enviar_foto_proyecto: function(file)  {
const formData = new FormData()
formData.append('imagen', file, file.name)
axios.post('/proyecto/send_imagen/'+this.Rproyecto.id, formData).then(function(response){


var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });

cuenta.Rproyecto.img = response.data;


})
.catch(function(error){
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

});
},

cargar_imagen_proyecto: function(e) {
const file = event.target.files[0];

//this.Rproyecto.img   = file;

//this.foto = file;
this.enviar_foto_proyecto(file);

},





eliminar: function(proyecto)  {

alertify.confirm(' <strong>Alerta - Burble</strong>', '¿Estas seguro de eliminar el proyecto ' +proyecto.nombre+ ' del sistema?' 
,() => {
axios({
  url: '/api/proyectos/delete/',
  method: 'get',
  params: {
 id: proyecto.id
}
}).then(function (response) {

var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Eliminado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });

cuenta.getUser();

})}, function(){ });

},
clear: function() {
this.Rproyecto.id = '';
this.Rproyecto.nombre_proyecto = '';
this.Rproyecto.fecha_recepcion = '';
this.rRproyecto.fecha_entrega = '';
this.rRproyecto.presupuesto = '';
this.Rproyecto.comentario = '';
this.rRproyecto.nombre_cliente = '';
this.Rproyecto.Ntareas = '';

},







paginar: function (page) {
axios({
  url: '/proyectosxuser?page='+page,
  method: 'get',
    params: {
 id:this.id
  }
}).then(response => {


  this.proyectos = response.data.proyectos.data;
  this.pagination =  response.data.pagination;




});
},
changePage: function (page) {
this.pagination.current_page=page;
this.paginar(page);
}
,



update_user: function(e) {

//document.getElementById('btn-user').disabled = true;
//document.getElementById('loader-user').style.display="block"

var url = '/api/usuario/update/' ;
axios.get( url, {
     params: {
     nombre: this.nombre,
     apellido: this.apellido,
     alias:this.alias,
     fecha_nacimiento:this.fecha_nacimiento,
     cuit: this.cuit,
     rango: this.rango,
      email: this.email,
      password: this.password,
     direccion: this.direccion,
     obra_social: this.obra_social,
     servicio_ambulancia: this.servicio_ambulancia,
     contacto_ambulancia: this.contacto_ambulancia,
     id: this.id,
       },
validateStatus: (status) => {
        return true; // I'm always returning true, you may want to do it depending on the status received
      },
    }).catch(error => {

    }).then(response => {

if (response.data.estado == "true") {
//document.getElementById('btn-user').disabled = false;
//document.getElementById('loader-user').style.display="none"
this.state_user= 0;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.getUser();
}
else
{
//document.getElementById('btn-user').disabled = false;
//document.getElementById('loader-user').style.display="none"
 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

}
   // this is now called!
    });

  },



enviar_foto: function(file)  {

const formData = new FormData()
formData.append('foto', file, file.name)

axios.post('/send_foto/'+this.id, formData).then(function(response){

    var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
  console.log('SUCCESS!!');
cuenta.getUser();

})
.catch(function(error){
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
  console.log('FAILURE LA CARGA!!');
});







 }
,
edicion_user: function(e) {

if (this.state_user == 0) {
this.state_user = 1;

  } else{
this.state_user = 0;
}


},

edicion: function(e) {
if (this.state == 0) {
this.state = 1;
console.log(this.state);
  } else{
this.state = 0;
}

},


cargar_foto: function(e) {

const file = event.target.files[0];
this.preview = URL.createObjectURL(file);
//Convertir en archivo antes de enviar
this.foto = file;
this.enviar_foto(file);



}

}


});



