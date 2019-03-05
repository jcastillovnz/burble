



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
  
     usuario: null,
     state: 0,
     preview: 'img/user.png' ,
     foto:null,
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
     id: user_id,


    },

methods: {

getUser: function(event)  {
var user_id = document.getElementById('user_id').value;
axios({
  url: '/api/usuario/',
  method: 'get',
  params: {
 id:user_id
  }
}).then(response => {
  this.usuario = response.data

});



 }
,

update_user: function(e) {

document.getElementById('btn-user').disabled = true;
document.getElementById('loader-user').style.display="block"

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
document.getElementById('btn-user').disabled = false;
document.getElementById('loader-user').style.display="none"
this.state= 0;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.getUser();
}
else
{
document.getElementById('btn-user').disabled = false;
document.getElementById('loader-user').style.display="none"
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


cargar_foto: function(e) {

const file = event.target.files[0];
this.preview = URL.createObjectURL(file);
//Convertir en archivo antes de enviar
this.foto = file;
this.enviar_foto(file);



}

}


});



