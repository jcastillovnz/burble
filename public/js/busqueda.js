

var search = new Vue({
el: '#buscar',

  mounted(){
function getUrl()
{
// capturamos la url
 var loc = window.location.href;
    // si existe el interrogante
  if(loc.indexOf('?')>0)
    {// cogemos la parte de la url que hay despues del interrogante
  var getString = loc.split('?')[1];
        // obtenemos un array con cada clave=valor
    var GET = getString.split('&');
    var get = {};
        // recorremos todo el array de valores
    for(var i = 0, l = GET.length; i < l; i++){
      var tmp = GET[i].split('=');
    get[tmp[0]] = unescape(decodeURI(tmp[1]));
      }
        return get;
    }
}

var values= getUrl();
//recogemos los valores que nos envia la URL en variables para trabajar con ellas
buscar = values['busqueda'];
this.busqueda =buscar;
this.buscar();
}
,
data: {
busqueda:'',
state: 0,
resultados: [],

 rellenar: { 
    'id':'',
    'foto':'', 
    'nombre_proyecto':'',
    'fecha_entrega':'',
    'presupuesto':'',
    'Ntareas':'',
    'comentario':'',
    ////////////////
    'nombre_cliente':''
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
show: function(proyecto) {
$('#edit_item').modal('show');
this.rellenar.id = proyecto.id;
this.rellenar.nombre_proyecto = proyecto.nombre;
this.rellenar.fecha_entrega = proyecto.fecha_entrega;
this.rellenar.presupuesto = proyecto.presupuesto;
this.rellenar.comentario = proyecto.comentario;
this.rellenar.nombre_cliente = proyecto.clientes.nombre;
this.rellenar.Ntareas = proyecto.tareas.length;
}
,
close: function(proyecto) {


$('#edit_item').modal('hide');
this.clear(this.rellenar);
if (this.state == 1) {
this.state = 0;
} 
}
,
edicion: function(status) {
if (this.state == 0) {
this.state = 1;
console.log(this.state);
  } else{
this.state = 0;
}

}
,
update: function(status) {
document.getElementById('btn-details-proyecto').disabled = true;
document.getElementById('loader-details-proyecto').style.display="block";


var url = '/api/proyectos/update' ;
axios.post( url, {

id:this.rellenar.id,
nombre: this.rellenar.nombre_proyecto,
fecha_entrega: this.rellenar.fecha_entrega,
presupuesto: this.rellenar.presupuesto,
comentario:this.rellenar.comentario,

validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).catch(error => {
}).then(response => {
if (response.data == "true") {

document.getElementById('btn-details-proyecto').disabled = false;
document.getElementById('loader-details-proyecto').style.display="none";
this.state= 0;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.buscar();

}
else
{
document.getElementById('btn-details-proyecto').disabled = false;
document.getElementById('loader-details-proyecto').style.display="none";

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});


},
add_espera: function(proyecto)  {
document.getElementById('loader-busqueda').style.display="block";

axios({ 
  url: '/api/proyectos/espera/add/',
  method: 'get',
  params: {
 id: proyecto.id ,
  }}
  ).then(function (response) {

var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Añadido a la lista de espera </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
document.getElementById('loader-busqueda').style.display="none";


})
},
eliminar: function(proyecto)  {
document.getElementById('loader-busqueda').style.display="block";
alertify.confirm(' <strong>Alerta - Burble</strong>', '¿Estas seguro de eliminar el proyecto ' +proyecto.nombre+ ' del sistema?' 

,() => {
axios({
  url: '/api/proyectos/delete/',
  method: 'get',
  params: {
 id: proyecto.id
}
}).then(function (response) {
document.getElementById('loader-busqueda').style.display="none";
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Eliminado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
search.buscar();

})}, function(){ });

},
clear: function() {
this.rellenar.nombre_proyecto = '';
this.rellenar.fecha_entrega = '';
this.rellenar.presupuesto = '';
this.rellenar.comentario = '';
this.rellenar.nombre_cliente = '';
this.rellenar.Ntareas = '';
},
buscar: function () {
axios({

  url: '/consulta/busqueda/',
  method: 'get',
  params: {
busqueda:this.busqueda
  }
}).then(response => {
  this.resultados = response.data.proyectos.data
  this.pagination=  response.data.pagination
});
},



paginar: function (page) {
axios({
  url: '/consulta/busqueda?page='+page,
  method: 'get',
  params: {
busqueda:this.busqueda
  }
}).then(response => {
  this.resultados = response.data.proyectos.data
  this.pagination=  response.data.pagination

});
},
changePage: function (page) {
this.pagination.current_page=page;
this.paginar(page);
}







}
})
