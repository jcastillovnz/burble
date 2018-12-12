




var Proyectos = new Vue({ 
    el: '#AppProyecto',
    data: {
        message: 'HOLA!'
    },

methods: {


read: function(e) {


var cliente;
var proyecto;
var fecha_entrega;
var fecha_entrega;
var presupuesto;
var comentarios;



var formData = new FormData();
formData.append('tarjetaverdefrontal', $('#input_tarjeta_verde_frontal')[0].files[0]);
$.ajax({
        url: $avatarForm.attr('action') + '?' + $avatarForm.serialize(),
         beforeSend: function(){
$(".loader").show();

 },
        method: $avatarForm.attr('method'),
        data: formData,
        processData: false,
        contentType: false
    }).done(function (data) {



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


 }








    }





});















