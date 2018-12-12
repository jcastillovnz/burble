




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




document.getElementById('loader-sm').style.display="none"


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















