



var Proyectos = new Vue({ 
    el: '#AppProyecto',
    data: {
        cliente: '',
        proyecto: '',
        fecha_entrega: '',
        presupuesto: '',
        comentario: '',
    },

methods: {


read: function(e) {


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
 document.getElementById("formulario_proyecto").reset();       


}
else
{

document.getElementById('loader-sm').style.display="none"
$('.nuevoProyecto').modal('hide')
document.getElementById('btn-proyecto').disabled = false;

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

 document.getElementById("formulario_proyecto").reset();    


}




        // this is now called!
    });




/*LEER URL*/
/*
    window.axios.get('/api/proyecto/create').then(({ data }) => {

    data.forEach(crud => {
    this.cruds.push(new Crud(crud));

      });
    });
*/


 /*LEER URL*/


  },








enviar: function(e) {


document.getElementById('btn-proyecto').disabled = true;
document.getElementById('loader-sm').style.display="block"

this.read()


 }



    }





});


/*COMPONENTE USUARIOS*/



var Usuarios = new Vue({ 
    el: '#Appusuarios',
    data: {

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
    },

methods: {




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


  }

      ,
      validateStatus: (status) => {
        return true; // I'm always returning true, you may want to do it depending on the status received
      },
    }).catch(error => {



    }).then(response => {


/**/

if (response.data == "true") {

document.getElementById('loader-sm').style.display="none"
$('.nuevoUsuario').modal('hide')
document.getElementById('btn-proyecto').disabled = false;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
 document.getElementById("formulario_proyecto").reset();       


}
else
{

document.getElementById('loader-sm').style.display="none"
$('.nuevoProyecto').modal('hide')
document.getElementById('btn-proyecto').disabled = false;

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

   


}




        // this is now called!
    });




  },




monitor: function(e) {



alert(this.email )





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












