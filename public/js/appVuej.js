window.onload = function () {



 var urlUsers = '/api/usuarios_consulta';

new Vue({
    el: '#AppProyecto',


    created: function() {
   
    },


    data: {
        lists: []
    },
    methods: {
   
 nuevo_proyecto(){ 
          this.$http.post('/guardar_nota', { 
             descripcion: this.nota_temp.descripcion 
          }).then(response => { 
             this.nota_temp.descripcion = ''; 
             this.notas = response.body; 
          }, response => { 
             alert('Error'); 
          }); 
       }, 



 enviar(){ 
      

      alert("hola");
       }, 







// CIERRA DE COMPONENTE
}
})



}













