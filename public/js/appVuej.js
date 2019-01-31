


var Proyectos = new Vue({ 
    el: '#AppProyectos',
     mounted(){

this.getListaPrincipal();

this.getListaTareas();

this.getListaEspera();

this.getUsers();

    },
    data: {

        state: 0 ,
        state_tarea : 0,
        lista_principal:[],
        lista_espera: [],
        lista_tareas: [],
        lista_users: [],
        cliente: '',
        proyecto: '',
        fecha_entrega: '',
        presupuesto: '',
        comentario: '',

        nombre_tarea: '',
        tipo_tarea: '',
        prioridad_tarea: '',
        estado_tarea: '',
        empleado_id: '',
        proyectos_id: '',
        comentario_tarea: '',
 Rproyecto: { 
    'id':'',
    'nombre_proyecto':'',
    'fecha_recepcion':'',
    'fecha_entrega':'',
    'presupuesto':'',
    'Ntareas':'',
    'comentario':'',
    ////////////////
    'nombre_cliente':'',
    'cliente_id':''
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

getUsers: function(dato)  {
 var urlUsers = '/api/usuarios/consulta/';
  axios.get(urlUsers).then(response => {
  this.lista_users = response.data
});
 }
,


getListaPrincipal: function(dato)  {
  document.getElementById("loader").style.display = "none";;


var urlPrincipal = '/api/proyectos/principal';
axios.get(urlPrincipal).then(response => {
this.lista_principal = response.data
});
 }
,

getListaTareas: function(dato)  {

document.getElementById("loader").style.display = "none";;


var urlTareas = '/api/proyectos/tareas';
axios.get(urlTareas).then(response => {
this.lista_tareas = response.data
});
 }
,


show_tarea: function(tarea) {
this.getListaTareas();


$('#edit_tarea').modal('show');
this.Rtarea.id = tarea.id;
this.Rtarea.nombre = tarea.nombre;
this.Rtarea.imagen_tarea = tarea.imagen;
this.Rtarea.tipo = tarea.tipo;
this.Rtarea.prioridad = tarea.prioridad;
this.Rtarea.estado = tarea.estado;
this.Rtarea.fecha_inicio = tarea.fecha_inicio;
this.Rtarea.fecha_termino = tarea.fecha_termino;
this.Rtarea.presupuesto = tarea.presupuesto;
this.Rtarea.comentario = tarea.comentario;
this.Rtarea.empleado_nombre = tarea.users.name;
this.Rtarea.empleado_apellido = tarea.users.apellido;
this.Rtarea.empleado_foto = tarea.users.foto;


}
,

close: function() {

$('#edit_tarea').modal('hide');
this.clear_tarea(this.Rtarea);
if (this.state_tarea == 1) {
this.state_tarea = 0;
} 
}
,
clear_tarea: function(tarea) {

this.Rtarea.id = '';
this.Rtarea.nombre = '';
this.Rtarea.imagen_tarea = '';
this.Rtarea.tipo = '';
this.Rtarea.objetivo_tareas = '';
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

}
,



updateTarea: function(status) {
document.getElementById('btn-details-tarea').disabled = true;
document.getElementById('loader-details-tarea').style.display="block";
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

document.getElementById('btn-details-tarea').disabled = false;
document.getElementById('loader-details-tarea').style.display="none";
this.state_tarea= 0;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.mounted();

}
else
{
document.getElementById('btn-details-tarea').disabled = false;
document.getElementById('loader-details-tarea').style.display="none";

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});


},

enviar_foto_tarea: function(file)  {
const formData = new FormData()
formData.append('imagen', file, file.name)
axios.post('/detalle/tarea/send_imagen/'+this.Rtarea.id, formData).then(function(response){
Proyectos.Rtarea.imagen_tarea=response.data  ;
//Rtarea.imagen_tarea
console.log(Proyectos.Rtarea.imagen_tarea);
Proyectos.getListaTareas();
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });


})
.catch(function(error){
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

});
}
,
cargar_imagen_tarea: function(e) {
const file = event.target.files[0];
//this.preview = URL.createObjectURL(file);
//Convertir en archivo antes de enviar
this.foto = file;
this.enviar_foto_tarea(file);
},

edicion: function(item) {
if (this.state == 0) {
this.state = 1;
console.log(this.state);
  } else{
this.state = 0;
}

}
,

edit_tarea: function(item) {
if (this.state_tarea  == 0) {
this.state_tarea  = 1;
console.log(this.state_tarea );
  } else{
this.state_tarea  = 0;
}

}
,



getListaEspera: function(dato)  {


var urlEspera = '/api/proyectos/espera';
axios.get(urlEspera).then(response => {
this.lista_espera = response.data
});


 }
,





delete_principal: function(item) {


axios({
  url: '/api/lista_principal/delete/',
  method: 'get',
  params: {
 id:item.proyectos_id
  }}
  ).then(function (response) {
Proyectos.getListaPrincipal();
})

}
,
confirmar_delete_principal: function(item) {


alertify.confirm(' <strong>Alerta - Burble</strong>', '¿Estas seguro de eliminar el proyecto '+item.nombre_proyecto +' de la lista de proyectos en proceso?' 
  ,() => {
    

Proyectos.delete_principal(item);


    }, 
function()
{ 

 ///CODIGO AL CANCELAR


});




}
,




delete_espera: function(item) {


axios({
  url: '/api/lista_espera/delete/',
  method: 'get',
  params: {
 id: item.proyectos_id
  }}
  ).then(function (response) {

Proyectos.getListaEspera();
})




}
,


confirmar_delete_espera: function(item) {


alertify.confirm(' <strong>Alerta - Burble</strong>', '¿Estas seguro de eliminar el proyecto '+item.nombre_proyecto +' de la lista de proyectos en espera?' 
  ,() => {
    

Proyectos.delete_espera(item);


    }, 
function()
{ 

 ///CODIGO AL CANCELAR


});




}
,

sendData: function(e) {

var url = '/api/proyecto/create/' ;
axios.get( url, {
  params: {
cliente: this.Rproyecto.cliente_id,
proyecto: this.Rproyecto.nombre_proyecto,
fecha_recepcion: this.Rproyecto.fecha_recepcion,
fecha_entrega: this.Rproyecto.fecha_entrega,
presupuesto: this.Rproyecto.presupuesto,
comentario: this.Rproyecto.comentario,

}
 ,
validateStatus: (status) => {
        return true; // I'm always returning true, you may want to do it depending on the status received
      },
    }).catch(error => {
    }).then(response => {

if (response.data == "true") {
document.getElementById('carga-proyecto').style.display="none";
$('.nuevoProyecto').modal('hide')
document.getElementById('btn-proyecto').disabled = false;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
Proyectos.getListaEspera();
// document.getElementById("formulario_proyecto").reset();       
}
else
{
document.getElementById('loader-sm').style.display="none"
$('.nuevoProyecto').modal('hide')
document.getElementById('btn-proyecto').disabled = false;
 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
 document.getElementById("formulario_proyecto").reset();    

}

});
},


enviar_tarea: function(e) {

document.getElementById('loader_'+e).style.display="block";
document.getElementById('btn-tarea_'+e).disabled = true;



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
proyectos_id: e,
comentario_tarea: this.Rtarea.comentario,



}
,
validateStatus: (status) => {




        return true; // I'm always returning true, you may want to do it depending on the status received
      },
    }).catch(error => {
    }).then(response => {

if (response.data == "true") {

document.getElementById('loader_'+e).style.display="none"
document.getElementById('btn-tarea_'+e).disabled = false;

$('.nuevaTarea').modal('hide')


var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
Proyectos.getListaEspera();
Proyectos.getListaPrincipal();
Proyectos.getListaTareas();
Proyectos.getUsers();
    
}
else
{

document.getElementById('loader_'+e).style.display="none"
$('.nuevaTarea').modal('hide')
document.getElementById('btn-tarea').disabled = false;
 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');


}

});






},


submit_tarea: function(e) {
var x = document.getElementsByClassName("loader-sm")[0];
console.log(x);
alert(x);

document.getElementsByClassName("loader-sm")[0].style.display="block";
document.getElementsByClassName("btn-tarea")[0].disabled = true;

//document.getElementById('carga-tarea').style.display="block";
this.enviar_tarea()

},





submit : function(e) {

document.getElementById('btn-proyecto').disabled = true;
document.getElementById('carga-proyecto').style.display="block";
this.sendData()


}

,

  }
});


/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/

window.onload = function() {


var proceso = document.getElementById("lista_proceso");
Sortable.create(proceso, { 
/* options */ 

group: "listados",
animation: 150, // ms, animation speed 
ghostClass: "gho",
disabled:false,
swapThreshold: 1,
preventOnFilter: true,

// Element is dropped into the list from another list
onAdd: function (/**Event*/evt) {
console.log(evt.item.id);
var id = evt.item.id;
var item =  evt.item;
axios({ 
  url: '/api/proyectos/principal/add/',
  method: 'get',
  params: {
 id: evt.item.id ,
 }}
  ).then(function (response) {


var item = {proyectos_id:evt.item.id};


Proyectos.getListaEspera();
Proyectos.delete_espera(item);
 location ="/home";



})
},
// Called by any change to the list (add / update / remove)
onSort: function (/**Event*/evt) {
    // same properties as onEnd


  },


// Element is removed from the list into another list
  onRemove: function (/**Event*/evt) {
    // same properties as onEnd
console.log("remove desde proceso");

console.log(evt);
  },
onClone: function (/**Event*/evt) {
    var origEl = evt.item;
    var cloneEl = evt.clone;
       
  },


onUpdate: function (evt/**Event*/){
const Neworden = [...document.querySelectorAll('.item_proceso')].map(el => el.id);
console.log(Neworden)
axios({
  url: '/api/proyectos/principal/update/',
  method: 'get',
  params: {
 nuevoOrden: Neworden,

  }}
  ).then(function (response) {



   
//var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Reordenado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });

})
},
}); // That's all.




var espera = document.getElementById("lista_espera");
Sortable.create(espera, { 
/* options */ 
  group: "listados",
  ghostClass: "ghostr",
  sort: true,
  preventOnFilter: true,
  fallbackClass: "sortable-fallback", 
  swapThreshold: 1,
animation: 150, // ms, animation speed 
 // Element is chosen
  onChoose: function (/**Event*/evt) {
    evt.oldIndex;  // element index within parent


  },
  onSort: function (/**Event*/evt) {
    // same properties as onEnd


  },
  onAdd: function (/**Event*/evt) {

axios({ 
  url: '/api/proyectos/espera/add/',
  method: 'get',
  params: {
 id: evt.item.id ,
  }}
  ).then(function (response) {


var item = {proyectos_id:evt.item.id};


Proyectos.delete_principal(item);
Proyectos.getListaPrincipal();
 location ="/home";

//Proyectos.getProyects();
//var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Reordenado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); })
})
},
// Element is removed from the list into another list
 onRemove: function (/**Event*/evt) {
    // same properties as onEnd
console.log("remove desde espera");
console.log(evt);

  },
// Element dragging started
  onStart: function (/**Event*/evt) {
    evt.oldIndex;  // element index within parent
  },

onClone: function (/**Event*/evt) {
    var origEl = evt.item;
    var cloneEl = evt.clone;
 
  },
  
onUpdate: function (evt/**Event*/){

const Neworden = [...document.querySelectorAll('.item_espera')].map(el => el.id);
console.log(Neworden);
axios({
url: '/api/lista_espera/update/',
method: 'get',
params: {
nuevoOrden: Neworden,
}}).then(function (response) { 
console.log(Neworden);

var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Reordenado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
})

// the current dragged HTMLElement
  },


  
}); // That's all.



  

/*PROCESO*/

}
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/
/*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*//*PROCESO*/












/*COMPONENTE CLIENTES*/


var AppClientes = new Vue({
el: '#AppClientes',
  mounted(){

this.getClientes();

    },
data: {

 state: 0,
     cliente: { 
    'id':'',
    'nombre':'', 
    'sitio_web':'',
    'ciudad':'',
    'pais':'',
    'telefono':''
   },
  contacto: { 
    'id':'',
    'nombre':'', 
    'apellido':'',
    'telefono':'',
    'email':''
   },



empresa: null,
sitio_web: null,
ciudad: null,
pais: '',
telefono: null,


nombre_contacto: null,
apellido_contacto: null,
telefono_contacto: null,
email_contacto: null,

clientes: [],
 lists: [],

pagination:{
'total': 0,
'current_page': 0,
'per_page': 0,
'last_page': 0,
'from': 0,
'to': 0
}



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

getClientes: function(dato)  {
var urlClientes = '/api/clientes/';
axios.get(urlClientes).then(response => {
this.lists= response.data.clientes.data;

this.pagination=  response.data.pagination;

});
},

paginar: function (page) {
axios({
  url: '/api/clientes?page='+page,
  method: 'get',
}).then(response => {
this.lists= response.data.clientes.data;
this.pagination=  response.data.pagination;

});
},
changePage: function (page) {
this.pagination.current_page=page;
this.paginar(page);
}
,

mostrar: function (item) {

$('.clienteEdit').modal('show');

this.cliente.id = item.id;
this.cliente.nombre = item.nombre;
this.cliente.sitio_web = item.sitio_web;
this.cliente.ciudad = item.ciudad;
this.cliente.pais = item.pais;
this.cliente.telefono = item.telefono;
},

update: function(e) {





document.getElementById('btn-edicion-cliente').disabled = true;
document.getElementById('loader-edicion-cliente').style.display="block"

var url = '/api/clientes/update/' ;
axios.get( url, {
params: {
id: this.cliente.id,
nombre: this.cliente.nombre,
sitio_web: this.cliente.sitio_web,
ciudad: this.cliente.ciudad,
pais: this.cliente.pais,
telefono: this.cliente.telefono,

},
validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).then(response => {


document.getElementById('btn-edicion-cliente').disabled = false;
document.getElementById('loader-edicion-cliente').style.display="none"
this.state= 0;


var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.getClientes();



})



;






},


edicion: function(cliente) {
if (this.state == 0) {
this.state = 1;
console.log(this.state);
  } else{
this.state = 0;
}
},

borrar: function(cliente) {


alertify.confirm(' <strong>Alerta - Burble</strong>', '¿Estas seguro de eliminar al usuario ' +cliente.nombre+ '  del sistema?' 
,() => {
axios({
  url: '/api/clientes/borrar/',
  method: 'get',
  params: {
 id: cliente.id
}
}).then(function (response) {

AppClientes.getClientes();

var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Eliminado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });



})}, function(){ });







},


close: function(item) {
$('.clienteEdit').modal('hide');
this.clear(item);
if (this.state == 1) {
this.state = 0;
} 
} 
,


 enviar: function (event) {
document.getElementById('btn-clientes').disabled = true;
document.getElementById('loader-sm').style.display="block"
this.read()
},


read: function(e) {

var url = '/api/clientes/create/' ;

axios.get( url, {
params: {
nombre: this.cliente.nombre,
sitio_web: this.cliente.sitio_web,
ciudad: this.cliente.ciudad,
pais: this.cliente.pais,
telefono: this.cliente.telefono,


nombre_contacto: this.contacto.nombre,
apellido_contacto: this.contacto.apellido,
telefono_contacto: this.contacto.telefono,
email_contacto: this.contacto.email,

  },
validateStatus: (status) => {
        return true; // I'm always returning true, you may want to do it depending on the status received
      },
    }).catch(error => {

    }).then(response => {

if (response.data == "true") {

document.getElementById('loader-sm').style.display="none"
$('.nuevoCliente').modal('hide')
document.getElementById('btn-clientes').disabled = false;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
 location ="/home";


    
}
else
{



document.getElementById('loader-sm').style.display="none"
$('.nuevoCliente').modal('hide')
document.getElementById('btn-clientes').disabled = false;
 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

}
 });
  }







  }
})


/*GESTIONAR CLIENTES*/








/*GESTIONAR USUARIOS*/
var Gestionusuarios = new Vue({ 
    el: '#AppUsuarios',
  mounted(){

this.getUsers();

    },

    data: {

     lists: [],
     list: [],
     state: 0,
     preview: 'img/user.png' ,
     foto:null,

     rellenar: { 
    'id':'',
    'foto':'', 
    'nombre':'',
    'apellido':'',
    'password':'',
    'email':'',
    'password':'',
    'alias':'',
    'fecha_nacimiento':'',
    'rango':'',
    'cuit':'',
    'direccion':'',
    'obra_social':'',
    'servicio_ambulancia':'',
    'contacto_ambulancia':''
   },

     id:'',

pagination:{
'total': 0,
'current_page': 0,
'per_page': 0,
'last_page': 0,
'from': 0,
'to': 0
}

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
getUsers: function(dato)  {
var urlUsers = '/api/usuarios/consulta/';
axios.get(urlUsers).then(response => {

this.lists= response.data.usuarios.data;
this.pagination=  response.data.pagination;

});
},


paginar: function (page) {
axios({
  url: '/api/usuarios/consulta?page='+page,
  method: 'get',
}).then(response => {
this.lists= response.data.usuarios.data;
this.pagination=  response.data.pagination;

});
},
changePage: function (page) {
this.pagination.current_page=page;
this.paginar(page);
}
,

eliminar: function(dato)  {
alertify.confirm(' <strong>Alerta - Burble</strong>', '¿Estas seguro de eliminar al usuario ' +dato.name+ ' '+dato.apellido+' del sistema?' 
,() => {
axios({
  url: '/api/usuarios/delete/',
  method: 'get',
  params: {
 id: dato.id
}
}).then(function (response) {
Gestionusuarios.getUsers();
})}, function(){ });


},
create: function(e) {
document.getElementById('btn-create').disabled = true;
document.getElementById('loader-create').style.display="block";
var url = '/api/usuario/create/' ;
axios.get( url, {
params: {
nombre: this.rellenar.nombre,
apellido: this.rellenar.apellido,
email: this.rellenar.email,
password: this.rellenar.password,
alias:this.rellenar.alias,
fecha_nacimiento:this.rellenar.fecha_nacimiento,
rango: this.rellenar.rango,
cuit: this.rellenar.cuit,
direccion: this.rellenar.direccion,
obra_social: this.rellenar.obra_social,
servicio_ambulancia: this.rellenar.servicio_ambulancia,
contacto_ambulancia: this.rellenar.contacto_ambulancia,
  },
validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).catch(error => {
}).then(response => {
if (response.data == "true") {
document.getElementById('loader-create').style.display="none";
document.getElementById('btn-create').disabled = false;
$('.nuevoUsuario').modal('hide')

var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.getUsers();
this.clear(); 
}
else{
document.getElementById('loader-sm').style.display="none"
$('.nuevoUsuario').modal('hide')
document.getElementById('btn-proyecto').disabled = false;
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});
},


update: function(e) {
document.getElementById('btn-edicion').disabled = true;
document.getElementById('loader-edicion').style.display="block"

var url = '/api/usuario/update/' ;
axios.get( url, {
params: {
id: this.rellenar.id,
nombre: this.rellenar.nombre,
apellido: this.rellenar.apellido,
email: this.rellenar.email,
alias:this.rellenar.alias,
fecha_nacimiento:this.rellenar.fecha_nacimiento,
rango: this.rellenar.rango,
cuit: this.rellenar.cuit,
direccion: this.rellenar.direccion,
obra_social: this.rellenar.obra_social,
servicio_ambulancia: this.rellenar.servicio_ambulancia,
contacto_ambulancia: this.rellenar.contacto_ambulancia,
},
validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).catch(error => {
}).then(response => {
if (response.data == "true") {
document.getElementById('btn-edicion').disabled = false;
document.getElementById('loader-edicion').style.display="none"
this.state= 0;


var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.getUsers();
}
else
{
document.getElementById('btn-edicion').disabled = false;
document.getElementById('loader-edicion').style.display="none";
 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});
},



mostrar: function(item) {
$('#editar').modal('show');

this.rellenar.id = item.id;
this.rellenar.foto = item.foto;
this.rellenar.nombre = item.name;
this.rellenar.apellido = item.apellido;
this.rellenar.email = item.email;
this.rellenar.alias = item.alias;
this.rellenar.fecha_nacimiento = item.fecha_nacimiento;
this.rellenar.rango = item.rango;
this.rellenar.cuit = item.cuit;
this.rellenar.direccion = item.direccion;
this.rellenar.obra_social = item.obra_social;
this.rellenar.servicio_ambulancia = item.servicio_ambulancia;
this.rellenar.contacto_ambulancia = item.contacto_ambulancia;

},

clear: function(item) {
this.rellenar.id = '';
this.rellenar.foto = '';
this.rellenar.nombre = '';
this.rellenar.apellido = '';
this.rellenar.password = '';
this.rellenar.email = '';
this.rellenar.alias = '';
this.rellenar.fecha_nacimiento = '';
this.rellenar.rango = '';
this.rellenar.cuit ='';
this.rellenar.direccion ='';
this.rellenar.obra_social = '';
this.rellenar.servicio_ambulancia ='';
this.rellenar.contacto_ambulancia ='';
},


monitor: function(e) {
axios({
url: '/api/usuario/consulta_mail/',
method: 'get',
params: {
mail: this.n_email
}
}).then(function (response) {
if (response.data =="true") {
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Email ya existe </strong> </center>');
document.getElementById("email").value = "";
}
})
}
,


carga_input: function(e) {
var input =this.$refs['foto_update']  ;
document.getElementById("foto_update").click();
}
,
enviar_foto: function(e)  {

const file = event.target.files[0];
this.preview = URL.createObjectURL(file);
//Convertir en archivo antes de enviar
const formData = new FormData()
formData.append('foto', file, file.name)
axios.post('/send_foto/'+this.rellenar.id, formData).then(function(response){
img = response.data;
document.getElementById('img_edit').src = '/img/users/fotos/'+img;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
Gestionusuarios.getUsers();

})
.catch(function(error){
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
console.log('FAILURE LA CARGA!!');
});
 },

edicion: function(e) {
if (this.state == 0) {
this.state = 1;
console.log(this.state);
  } else{
this.state = 0;
}
},


close_modal: function(item) {


$('#editar').modal('hide');
this.clear(item);
if (this.state == 1) {
this.state = 0;
} 



}
}
});



