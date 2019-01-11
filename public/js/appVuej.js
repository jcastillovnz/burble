


var Proyectos = new Vue({ 
    el: '#AppProyectos',
     mounted(){

this.getListaPrincipal();

this.getListaTareas();

this.getListaEspera();

this.getUsers();

    },
    data: {
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




getListaEspera: function(dato)  {


var urlEspera = '/api/proyectos/espera';
axios.get(urlEspera).then(response => {
this.lista_espera = response.data
});



 }
,





delete_principal: function(item) {
console.log(item);

axios({
  url: '/api/lista_principal/delete/',
  method: 'get',
  params: {
 id:item
  }}
  ).then(function (response) {

Proyectos.getListaPrincipal();


})

}
,



delete_espera: function(item) {
console.log(item);
axios({
  url: '/api/lista_espera/delete/',
  method: 'get',
  params: {
 id: item
  }}
  ).then(function (response) {

Proyectos.getListaEspera();
})

}
,

sendData: function(e) {



var url = '/api/proyecto/create/' ;
axios.get( url, {
  params: {
cliente: this.cliente,
proyecto: this.proyecto,
fecha_entrega: this.fecha_entrega,
presupuesto: this.presupuesto,
comentario: this.comentario,

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


var url = '/api/proyecto/tarea/create/' ;
axios.get( url, {
  params: {
nombre_tarea: this.nombre_tarea,
tipo_tarea: this.tipo_tarea,
estado_tarea: this.tipo_tarea,
prioridad_tarea: this.prioridad_tarea,
empleado_id: this.empleado_id,
proyectos_id: e,
comentario_tarea: this.comentario_tarea,

}
,
validateStatus: (status) => {
        return true; // I'm always returning true, you may want to do it depending on the status received
      },
    }).catch(error => {
    }).then(response => {

if (response.data == "true") {
document.getElementById('carga-proyecto').style.display="none";
$('.nuevaTarea').modal('hide')
document.getElementById('btn-proyecto').disabled = false;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
Proyectos.getListaEspera();
Proyectos.getListaPrincipal();
Proyectos.getListaTareas();
Proyectos.getUsers();
    
}
else
{

document.getElementById('loader-sm').style.display="none"
$('.nuevaTarea').modal('hide')
document.getElementById('btn-proyecto').disabled = false;
 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');


}

});






},


submit_tarea: function(e) {


alert(this.nombre_tarea);
document.getElementById('btn-tarea').disabled = true;
document.getElementById('carga-tarea').style.display="block";
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


Proyectos.getListaEspera();
Proyectos.delete_espera(evt.item.id);
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
Proyectos.delete_principal(evt.item.id);
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
data: {
empresa: null,
sitio_web: null,
ciudad: null,
pais: '',
telefono: null,
nombre_contacto: null,
apellido_contacto: null,
telefono_contacto: null,
email_contacto: null,

  },
  methods: {
    enviar: function (event) {
     document.getElementById('btn-clientes').disabled = true;
document.getElementById('loader-sm').style.display="block"
this.read()





    },


read: function(e) {

var url = '/api/clientes/create/' ;

axios.get( url, {
  params: {
 empresa: this.empresa,
sitio_web: this.sitio_web,
ciudad: this.ciudad,
pais: this.pais,
telefono: this.telefono,
nombre_contacto: this.nombre_contacto,
apellido_contacto: this.apellido_contacto,
telefono_contacto: this.telefono_contacto,
email_contacto: this.email_contacto,
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
     preview: 'img/user.png' ,
     nombre: '',
     apellido: '',
     email: '',
     password: '',
     alias: '',
     fecha_nacimiento: '',
     rango: '',
     cuit: '',
     direccion: '',
     obra_social: '',
     servicio_ambulancia: '',
     contacto_ambulancia: '',
     id: '',


    },

methods: {

getUsers: function(dato)  {
 var urlUsers = '/api/usuarios/consulta/';
  axios.get(urlUsers).then(response => {
  this.lists = response.data
});
 }
,

editar: function(dato)  {


alert("EDITAR")



 }
,

eliminar: function(dato)  {


axios({
  url: '/api/usuarios/delete/',
  method: 'get',
  params: {
 id: dato.id
  }
}).then(function (response) {

Gestionusuarios.getUsers();

  })
 }
,
read: function(e) {

var url = '/api/usuario/create/' ;

axios.get( url, {
  params: {
     nombre: this.nombre,
     apellido: this.apellido,
     email: this.email,
     password: this.password,
     alias:this.alias,
     fecha_nacimiento:this.fecha_nacimiento,
     rango: this.rango,
     cuit: this.cuit,
     direccion: this.direccion,
     obra_social: this.obra_social,
     servicio_ambulancia: this.servicio_ambulancia,
     contacto_ambulancia: this.contacto_ambulancia,
  },
validateStatus: (status) => {
        return true; // I'm always returning true, you may want to do it depending on the status received
      },
    }).catch(error => {

    }).then(response => {

if (response.data == "true") {

document.getElementById('loader-sm').style.display="none"
$('.nuevoUsuario').modal('hide')
document.getElementById('btn-proyecto').disabled = false;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.getUsers();
//document.getElementById("formulario_proyecto").reset();      




}
else
{

document.getElementById('loader-sm').style.display="none"
$('.nuevoUsuario').modal('hide')
document.getElementById('btn-proyecto').disabled = false;

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

   


}
   // this is now called!
    });

  },



monitor: function(e) {


axios({
  url: '/api/usuario/consulta_mail/',
  method: 'get',
  params: {
  mail: this.email
  }
}).then(function (response) {


if (response.data =="true") {
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Email ya existe </strong> </center>');

document.getElementById("email").value = "";
// To prevent the form from submitting

}


  })

 }
,

enviar: function(e) {


document.getElementById('btn-proyecto').disabled = true;
document.getElementById('loader-sm').style.display="block"
this.read()

}
,
cargar_foto: function(e) {

const file = event.target.files[0];
this.preview = URL.createObjectURL(file);
//Convertir en archivo antes de enviar
this.foto = file.name;
}

}


});



