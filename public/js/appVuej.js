


var Proyectos = new Vue({ 
    el: '#AppProyectos',
     mounted(){

this.getProyects();

    },
    data: {

        lists: [],
        lista_principal:[],
        lista_espera: [],
        cliente: '',
        proyecto: '',
        fecha_entrega: '',
        presupuesto: '',
        comentario: '',

        options: {
      dropzoneSelector: '.lista',
      draggableSelector: '.item',
      // excludeOlderBrowsers: true,
   //showDropzoneAreas: true,
      // onDrop(event) {
      //   console.log(event);
      // },
      // onDragstart(event) {
      //   event.stop();
      // },
      // onDragend(event) {
      //   event.stop();
      // }
    }
    },

methods: {

getProyects: function(dato)  {

var urlProyectos = '/api/proyectos/';
axios.get(urlProyectos).then(response => {
this.lists = response.data
});

var urlPrincipal = '/api/proyectos/principal';
axios.get(urlPrincipal).then(response => {
this.lista_principal = response.data
});

var urlEspera = '/api/proyectos/espera';
axios.get(urlEspera).then(response => {
this.lista_espera = response.data
});


 }
,

delete_espera: function(dato) {

axios({
  url: '/api/lista_espera/delete/',
  method: 'get',
  params: {
 id: dato.id
  }
}).then(function (response) {

Proyectos.getProyects();

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

document.getElementById('loader-sm').style.display="none"
$('.nuevoProyecto').modal('hide')
document.getElementById('btn-proyecto').disabled = false;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.getProyects();


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
submit : function(e) {

document.getElementById('btn-proyecto').disabled = true;
document.getElementById('loader-proyecto').style.display="block"
this.sendData()


}

,

  }
});









var list = document.getElementById("lista_espera");
Sortable.create(list, { 
  /* options */ 
 animation: 200, // ms, animation speed 
  ghostClass: "ghost",
  scroll: true,
  
    onUpdate: function (evt/**Event*/){

    var item = evt.item; 
      // the current dragged HTMLElement
  },
  
}); // That's all.























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



