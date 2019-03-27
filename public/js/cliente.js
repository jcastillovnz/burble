

var AppClientes = new Vue({
el: '#AppClientes',
  mounted(){
this.getClientes();
var n = window.location.pathname.indexOf("cliente");
if (n == '1') {
this.getCliente();
}
},
data: {

 state: 0,
state_contacto:0,

nuevo: { 
    'id':'',
    'nombre':'', 
    'sitio_web':'',
    'ciudad':'',
    'pais':'',
    'telefono':'',
    'nombre_contacto':'', 
    'apellido_contacto':'',
    'telefono_contacto':'',
    'email_contacto':''
   },
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
    'nombre_contacto':'', 
    'apellido_contacto':'',
    'telefono_contacto':'',
    'email_contacto':''
   },
mensaje: '34344334',
mensaje2:[],
proyectos:[],
clientes: [],
contactos: [],
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
  params: {
id: this.cliente.id
  }


}).then(response => {

this.lists= response.data.clientes.data;
this.pagination=  response.data.pagination;
});
},












getCliente: function(dato)  {

const cliente_id = document.getElementById('cliente_id').value;


axios({
  url: '/consulta/cliente/',
  method: 'get',
  params: {
id: cliente_id
  }
}).then(response => {
this.cliente = response.data.cliente;
this.contactos = response.data.contactos;
this.proyectos = response.data.proyectos;




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

clear: function(item) {


this.cliente.id = '';
this.cliente.nombre = '';
this.cliente.sitio_web = '';
this.cliente.ciudad = '';
this.cliente.pais = '';
this.cliente.telefono = '';



this.contacto.id = '';
this.contacto.nombre = '';
this.contacto.apellido = '';
this.contacto.telefono = '';
this.contacto.email = '';
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



});
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
AppClientes.clear();

var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Eliminado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });



})}, function(){ });

},



update_contacto: function(e) {
document.getElementById('btn-edicion-contacto').disabled = true;
document.getElementById('loader-edicion-contacto').style.display="block"

var url = '/api/contacto/update/' ;
axios.get( url, {
params: {
id: this.contacto.id,
nombre: this.contacto.nombre_contacto,
apellido: this.contacto.apellido_contacto,
email: this.contacto.email_contacto,
telefono: this.contacto.telefono_contacto,



},
validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).catch(error => {

document.getElementById('btn-edicion-contacto').disabled = false;
document.getElementById('loader-edicion-contacto').style.display="none";
 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');


}).then(response => {
if (response.data == "true") {

AppClientes.getCliente();


document.getElementById('btn-edicion-contacto').disabled = false;
document.getElementById('loader-edicion-contacto').style.display="none"
this.state_contacto= 0;


var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });



}
else
{
document.getElementById('btn-edicion-contacto').disabled = false;
document.getElementById('loader-edicion-contacto').style.display="none";
 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});
},





nuevoContacto: function(cliente) {


$('.nuevoContacto').modal('show');
this.nuevo.id = cliente.id



} 
,

edicion_contacto: function() {


if (this.state_contacto == 0) {
this.state_contacto = 1;

  } else{
this.state_contacto = 0;
}


},




eliminar_contacto: function(contacto) {
alertify.confirm(' <strong>Alerta - Burble</strong>', '¿Estas seguro de eliminar al usuario ' +contacto.nombre+ '  del sistema?' 
,() => {
axios({



  url: '/api/contactos/borrar/',
  method: 'get',
  params: {
 id: contacto.id
}
}).then(function (response) {

AppClientes.getCliente();


var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Eliminado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });



})}, function(){ });

},


mostrar_Contacto: function(item) {

$('.edit_Contacto').modal('show');


this.contacto.id = item.id;
this.contacto.nombre_contacto = item.nombre;
this.contacto.apellido_contacto = item.apellido;
this.contacto.telefono_contacto = item.telefono;
this.contacto.email_contacto = item.email;






} 
,


close_contacto: function(item) {
$('.nuevoContacto').modal('hide');
$('.edit_Contacto').modal('hide');


this.nuevo.id = '';
this.nuevo.nombre_contacto = '';
this.nuevo.apellido_contacto = '';
this.nuevo.telefono_contacto = '';
this.nuevo.email_contacto = '';




this.contacto.id = '';
this.contacto.nombre_contacto = '';
this.contacto.apellido_contacto = '';
this.contacto.telefono_contacto = '';
this.contacto.email_contacto = '';





} 
,








close: function(item) {
$('.clienteEdit').modal('hide');

this.clear();
if (this.state == 1) {
this.state = 0;
} 


} 
,


 enviar: function (event) {
document.getElementById('btn-clientes').disabled = true;
document.getElementById('loader-sm').style.display="block"
this.create()
},


create_contacto: function(e) {

document.getElementById('loader-create-contacto').style.display="block";
document.getElementById('btn-create-contacto').disabled = true;


var url = '/api/contactos/create/' ;

axios.get( url, {
params: {
id: this.nuevo.id,
nombre_contacto: this.nuevo.nombre_contacto,
apellido_contacto: this.nuevo.apellido_contacto,
telefono_contacto: this.nuevo.telefono_contacto,
email_contacto: this.nuevo.email_contacto,

  },
validateStatus: (status) => {
        return true; // I'm always returning true, you may want to do it depending on the status received
      },
    }).then(response => {



document.getElementById('loader-create-contacto').style.display="none"
$('.nuevoCliente').modal('hide')
document.getElementById('btn-create-contacto').disabled = false;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
 //location ="/home";

AppClientes.getCliente();
AppClientes.close_contacto();
    

 }).catch(error => {


document.getElementById('loader-create-contacto').style.display="none"
$('.nuevoCliente').modal('hide')
document.getElementById('btn-create-contacto').disabled = false;
 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');


AppClientes.getCliente();
AppClientes.close_contacto();



   });



  }
,


create: function(e) {

var url = '/api/clientes/create/' ;

axios.get( url, {
params: {
nombre: this.nuevo.nombre,
sitio_web: this.nuevo.sitio_web,
ciudad: this.nuevo.ciudad,
pais: this.nuevo.pais,
telefono: this.nuevo.telefono,


nombre_contacto: this.nuevo.nombre_contacto,
apellido_contacto: this.nuevo.apellido_contacto,
telefono_contacto: this.nuevo.telefono_contacto,
email_contacto: this.nuevo.email_contacto,

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
 //location ="/home";

AppClientes.getClientes();

    
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




