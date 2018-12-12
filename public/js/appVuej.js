




var Proyectos = new Vue({ 
    el: '#AppProyecto',
    data: {
        message: 'HOLA!'
    },

methods: {


read: function(e) {






var url = '/api/proyecto/create/' ;


axios({
      method: 'get',
      url: url, 


      ,
      validateStatus: (status) => {
        return true; // I'm always returning true, you may want to do it depending on the status received
      },
    }).catch(error => {



    }).then(response => {



console.log(response.data)



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















