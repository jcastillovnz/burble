





var Proyectos = new Vue({ 
    el: '#AppProyectos',
     mounted(){
this.getListaPrincipal();
this.getListaEspera();

fecha = new Date();
dia = fecha.getDate();
mes = fecha.getMonth()+1;// +1 porque los meses empiezan en 0
anio = fecha.getFullYear();
this.Rproyecto.fecha_recepcion = +anio+'/'+mes+'/'+dia;
this.Rtarea.fecha_inicio = +anio+'/'+mes+'/'+dia;



b = setInterval(nav, 1500);

function nav(argument) {

$('.nav-tabs a:first').tab('show') 

 clearInterval(b);

}




},

created: function()  {

this.archivo();


}
,



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


 data: {
    navs: 0,
    count: 0,
    options: {
      format: 'YYYY/MM/DD',
      useCurrent: false,
      showClear: true,
      showClose: true,
    }
,
users_espera:'',
state: 0 ,
state_edit: 0 ,
state_tarea : 0,
countProyectos : '',
lista_principal:[],
lista_espera: [],
lista_tareas: [],
lista_users: [],
todos_users : [],
resultados: [],
users: [],
cliente: '',
proyectos:[],
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
 Rproyecto: { 
    'id':'',
     'img':'',
    'nombre_proyecto':'',
    'descripcion':'',
    'prioridad':'',
    'fecha_recepcion':'',
    'fecha_entrega':'',
    'presupuesto':'',
    'Ntareas':'',
    'comentario':'',
    ////////////////
    'nombre_cliente':'',
    'cliente_id':''
   },
Rtarea: { 
    'id':'',
    'foto':'', 
    'nombre_tarea':'',
    'objetivo_tarea':'',
    'prioridad_tarea':'',
    'tipo_tarea':'',
    'fecha_inicio':'',
    'fecha_termino':'',
    'tipo_tarea':'',
    'presupuesto':'',
    'Ntareas':'',
    'comentario':'',
    ////////////////
    'nombre_cliente':'',
    'empleado_id':'',
    'nombre_empleado':'',
    'apellido_empleado':'',
    'foto_empleado':''
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
 
directives: {
            carousel: {
                inserted: function (el) {
                    $(el).owlCarousel({
                        loop: false,
                        margin: 15,
                        nav:false,
                        rewind:false,
                        dots:false ,
                        responsive: {
                          0: {
                            items: 1
                          },
                          600: {
                            items: 6
                          }
                        }
                    }).trigger('to.owl.carousel')
                  
                },
            }
        }
,


methods: {
getUsers: function(e)  {

 var urlUsers = '/api/usuarios/';
  axios.get(urlUsers).then(response => {
  this.todos_users  = response.data;


});



 }
,


archivo: function(dato)  {


 var url= '/api/archivo/';
  axios.get(url).then(response => {
  this.resultados = response.data.proyectos.data
  this.pagination=  response.data.pagination



});
}
,
reordenarNavs: function(dato)  {

/*REORDENAR NAVS*/
itemNav =  document.getElementsByClassName('item-nav')
for (var i = 0; i < itemNav.length; i++) {
nav=  document.getElementsByClassName('item-nav')[i] ;
tab=  document.getElementsByClassName('item-tab')[i] ;


if (i >0 ) {

  
nav.classList.remove("active");
nav.classList.remove("show");

tab.classList.remove("active");
tab.classList.remove("show");



}
if (i ==0) {
console.log("RENDER");
nav.classList.add("active");
nav.classList.add("show");


tab.classList.add("active");
tab.classList.add("show");
}


console.log(tab);
}
/*REORDENAR NAVS*/



},
create_pestana: function(dato)  {
$('.addPestana').modal('show');



},

create_espera: function(item) {

document.getElementById('loader-create-espera').style.display="block";
document.getElementById('btn-create-espera').disabled = true;
axios({ 
  url: '/api/proyectos/espera/add/',
  method: 'get',
  params: {
 id: Proyectos.Rproyecto.cliente_id,
  }}
  ).then(function (response) {


document.getElementById('loader-create-espera').style.display="none";
document.getElementById('btn-create-espera').disabled = false;
$('.addPestana').modal('hide');



if (response.data.estado== true) {
  Proyectos.getListaEspera();
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });



  Proyectos.reordenarNavs();




}
if (response.data.estado== false) {
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}

if (response.data.estado=="existe") {

var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Cliente ya esta en la lista </strong> </center>');

}




})

}
,
todosProyectos: function(dato)  {
 var urlUsers = '/api/count-proyectos/';
  axios.get(urlUsers).then(response => {
  this.countProyectos   = response.data;
});
},



getListaPrincipal: function(dato)  {
document.getElementById("loader").style.display = "none";;
this.getUsers();
var urlPrincipal = '/api/proyectos/principal';
axios.get(urlPrincipal).then(response => {
this.lista_principal = response.data.lista_principal;
this.users = response.data.users;
});
},



nueva_tarea: function(item) {
fecha = new Date();
dia = fecha.getDate();
mes = fecha.getMonth()+1;// +1 porque los meses empiezan en 0
anio = fecha.getFullYear();
this.Rproyecto.fecha_recepcion = +anio+'/'+mes+'/'+dia;
this.Rtarea.fecha_inicio = +anio+'/'+mes+'/'+dia;
this.Rproyecto.id = item.proyectos_id
$('.nuevaTarea').modal('show');
}
,

create_tarea: function(tarea) {
document.getElementById('loader-create-tarea').style.display="block";
document.getElementById('btn-create-tarea').disabled = true;
var url = '/api/proyecto/tarea/create/' ;
axios.get( url, {
  params: {

nombre_tarea: this.Rtarea.nombre_tarea,
objetivo_tarea: this.Rtarea.objetivo_tarea,
tipo_tarea: this.Rtarea.tipo_tarea,
fecha_inicio: this.Rtarea.fecha_inicio,
fecha_termino: this.Rtarea.fecha_termino,
estado_tarea: 'amarillo',
prioridad_tarea: this.Rtarea.prioridad_tarea,
empleado_id: this.Rtarea.empleado_id,
proyectos_id: this.Rproyecto.id,
comentario_tarea: this.Rtarea.comentario,
}
,
validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
      },
    }).then(response => {
document.getElementById('loader-create-tarea').style.display="none"
document.getElementById('btn-create-tarea').disabled = false;

$('.nuevaTarea').modal('hide')
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
Proyectos.getListaPrincipal();

Proyectos.clear_tarea();
}).catch(error => {

document.getElementById('loader-create-tarea').style.display="none"
$('.nuevaTarea').modal('hide')
document.getElementById('btn-create-tarea').disabled = false;
 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
});
},
show_tarea: function(tarea, user) {


this.Rtarea.id = tarea.id;
this.Rtarea.nombre_tarea = tarea.nombre;
this.Rtarea.objetivo_tarea = tarea.objetivo;

this.Rtarea.imagen_tarea = tarea.imagen;
this.Rtarea.tipo = tarea.tipo;
this.Rtarea.prioridad = tarea.prioridad;
this.Rtarea.estado = tarea.estado;
this.Rtarea.fecha_inicio = tarea.fecha_inicio;
this.Rtarea.fecha_termino = tarea.fecha_termino;
this.Rtarea.presupuesto = tarea.presupuesto;
this.Rtarea.comentario = tarea.comentario;


this.Rtarea.empleado_nombre = user.name;
this.Rtarea.empleado_apellido = user.apellido;
this.Rtarea.empleado_foto = user.foto;
this.Rtarea.empleado_id = user.id;


$('#edit_tarea').modal('show');


},


show_proyecto: function(proyecto) {


//$('.edit_proyecto').modal('show');

this.Rproyecto.id              = proyecto.id;
this.Rproyecto.img             = proyecto.img;
this.Rproyecto.nombre_proyecto = proyecto.nombre;
this.Rproyecto.prioridad       = proyecto.prioridad ;
this.Rproyecto.descripcion     = proyecto.descripcion;
this.Rproyecto.fecha_recepcion = proyecto.fecha_recepcion;
this.Rproyecto.fecha_entrega   = proyecto.fecha_entrega;
this.Rproyecto.presupuesto     = proyecto.presupuesto;
this.Rproyecto.comentario      = proyecto.comentario;
this.Rproyecto.nombre_cliente  = proyecto.clientes.nombre;
this.Rproyecto.Ntareas         = proyecto.tareas.length;


},


update_proyecto: function(status) {
document.getElementById('btn-details-proyecto').disabled = true;
document.getElementById('loader-details-proyecto').style.display="block";


var url = '/api/proyectos/update' ;
axios.post( url, {

id:this.Rproyecto.id,
nombre: this.Rproyecto.nombre_proyecto,
prioridad: this.Rproyecto.prioridad,
descripcion: this.Rproyecto.descripcion,
fecha_recepcion: this.Rproyecto.fecha_recepcion,
fecha_entrega: this.Rproyecto.fecha_entrega,
presupuesto: this.Rproyecto.presupuesto,
comentario:this.Rproyecto.comentario,




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

//$('#nav_0').click();


Proyectos.getListaEspera();




}
else
{
document.getElementById('btn-details-proyecto').disabled = false;
document.getElementById('loader-details-proyecto').style.display="none";

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});


},



close_tarea: function() {
$('#edit_tarea').modal('hide');
this.clear_tarea();


if (this.state_edit == 1) {
this.state_edit = 0;
} 
$('.nuevaTarea').modal('hide');
}
,


close: function() {
$('#edit_proyecto').modal('hide');
$('#edit_item').modal('hide');
this.clear();

if (this.state_edit == 1) {
this.state_edit = 0;
} 
$('.nuevoProyecto').modal('hide');
}
,

clear: function(tarea) {
this.Rproyecto.id = '';
this.Rproyecto.nombre_proyecto = '';
this.Rproyecto.fecha_recepcion = '';
this.Rproyecto.fecha_entrega = '';
this.Rproyecto.prioridad = '';
this.Rproyecto.descripcion = '';
this.Rproyecto.presupuesto = '';
this.Rproyecto.Ntareas = '';
this.Rproyecto.nombre_cliente = '';
this.Rproyecto.cliente_id = '';
this.Rproyecto.comentario = '';


this.Rtarea.id = '';
this.Rtarea.nombre_tarea = '';
this.Rtarea.objetivo_tarea = '';
this.Rtarea.imagen_tarea = '';
this.Rtarea.tipo = '';
this.Rtarea.objetivo_tareas = '';
this.Rtarea.prioridad = '';
this.Rtarea.estado = '';

this.Rtarea.fecha_termino = '';
this.Rtarea.presupuesto = '';
this.Rtarea.comentario = '';
this.Rtarea.empleado_nombre = '';
this.Rtarea.empleado_apellido = '';
this.Rtarea.empleado_foto = '';
this.Rtarea.empleado_id = '';



},





clear_tarea: function(tarea) {

this.Rtarea.id = '';
this.Rtarea.nombre_tarea = '';
this.Rtarea.objetivo_tarea = '';
this.Rtarea.imagen_tarea = '';
this.Rtarea.tipo = '';
this.Rtarea.objetivo_tareas = '';
this.Rtarea.prioridad = '';
this.Rtarea.estado = '';

this.Rtarea.fecha_termino = '';
this.Rtarea.presupuesto = '';
this.Rtarea.comentario = '';
this.Rtarea.empleado_nombre = '';
this.Rtarea.empleado_apellido = '';
this.Rtarea.empleado_foto = '';
this.Rtarea.empleado_id = '';

},
update_tarea: function(status) {
document.getElementById('btn-edit-tarea').disabled = true;
document.getElementById('loader-edit-tarea').style.display="block";
var url = '/api/tareas/update' ;
axios.post( url, {
id:this.Rtarea.id,
nombre: this.Rtarea.nombre_tarea,
imagen_tarea: this.Rtarea.imagen_tarea,
tipo: this.Rtarea.tipo,
prioridad: this.Rtarea.prioridad,
estado: this.Rtarea.estado,
fecha_inicio: this.Rtarea.fecha_inicio,
fecha_termino: this.Rtarea.fecha_termino,
comentario: this.Rtarea.comentario,
empleado_id: this.Rtarea.empleado_id,



validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).catch(error => {
}).then(response => {
if (response.data.estado === true) {

document.getElementById('btn-edit-tarea').disabled = false;
document.getElementById('loader-edit-tarea').style.display="none";
this.state_edit= 0;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
Proyectos.getListaPrincipal();


Proyectos.show_tarea(response.data.tarea,  response.data.tarea.users )


}
else
{
document.getElementById('btn-edit-tarea').disabled = false;
document.getElementById('loader-edit-tarea').style.display="none";

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});
},

enviar_foto_tarea: function(file)  {
const formData = new FormData()
formData.append('imagen', file, file.name)
axios.post('/detalle/tarea/send_imagen/'+this.Rtarea.id, formData).then(function(response){
Proyectos.Rtarea.imagen_tarea=response.data  ;
Proyectos.getListaPrincipal();
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
})
.catch(function(error){
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

});
}
,
cargar_imagen_tarea: function(e) {
const file = event.target.files[0];
//this.preview = URL.createObjectURL(file);
//Convertir en archivo antes de enviar
this.foto = file;
this.enviar_foto_tarea(file);
},

enviar_foto_proyecto: function(file)  {
const formData = new FormData()
formData.append('imagen', file, file.name)
axios.post('/proyecto/send_imagen/'+this.Rproyecto.id, formData).then(function(response){
Proyectos.Rproyecto.img=response.data;

console.log(response.data);
Proyectos.getListaPrincipal();
Proyectos.getListaEspera();
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
})
.catch(function(error){
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');

});
},

cargar_imagen_proyecto: function(e) {
const file = event.target.files[0];

this.foto = file;
this.enviar_foto_proyecto(file);
},



edicion: function(item) {
if (this.state == 0) {
this.state = 1;
console.log(this.state);
  } else{
this.state = 0;
}

},


edit_tarea: function(item) {
if (this.state_edit  == 0) {
this.state_edit  = 1;
console.log(this.state_tarea );
  } else{
this.state_edit  = 0;
}
},
getListaEspera: function(dato)  {
var urlEspera = '/api/proyectos/espera';
axios.get(urlEspera).then(response => {

 //var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> REORDENADO</strong> </center>');
this.lista_espera = response.data.lista_espera



//this.reordenarNavs();





});



this.todosProyectos()
 },
delete_principal: function(item) {

axios({
  url: '/api/lista_principal/delete/',
  method: 'get',
  params: {
 id:item.proyectos_id
  }}
  ).then(function (response) {


Proyectos.getListaPrincipal();



})

},
confirmar_delete_principal: function(item) {


alertify.confirm(' <strong>Burble</strong>', '¿Estas seguro de eliminar el proyecto '+item.nombre_proyecto +' de la lista de proyectos en proceso?' 
  ,() => {

//Proyectos.lista_espera.splice(index, 1)    
Proyectos.delete_principal(item);



}, 
function()
{ 
});
},

delete_espera: function(item) {
axios({
  url: '/api/lista_espera/delete/',
  method: 'get',
  params: {
 id: item.id
  }}
  ).then(function (response) {
Proyectos.getListaEspera();
//this.reordenarNavs();

$('.nav-tabs a:first').tab('show') 

//location ="/home";
})
}
,


espera_principal: function(item, index) {
alertify.confirm(' <strong>Burble</strong>', '¿Estas seguro de quitar el proyecto '+item.nombre +' de la lista de espera?' 
  ,() => {

Proyectos.add_filtro_espera(item);


    }, 
function()
{ 

});
},

delete_proyecto_espera: function(id) {
var url = '/api/espera_principal' ;
axios.post( url, {

id:id,
filtro: 0,


validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).catch(error => {
}).then(response => {


if (response.data === "true") {

Proyectos.getListaEspera();

}
else
{

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});

},



principal_espera: function(item) {
var url = '/api/principal_espera' ;
axios.post( url, {

id:item.id,
filtro: 1,


validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).catch(error => {
}).then(response => {


if (response.data == "true") {


Proyectos.getListaEspera();
Proyectos.getListaPrincipal();



}
else
{

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});

},




add_filtro_espera: function(item, index) {

var url = 'api/add_filtro' ;

axios.get(url , {
    params: {
      id: item.id,
      filtro: 0,

    }
  })
  .then(function (response) {
    // handle success
 console.log(response.data );
if (response.data=== 'true') {

var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-database"></i> Enviado al archivo </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });

Proyectos.getListaEspera();
Proyectos.getListaPrincipal();


}
else
{


 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
  });
},

confirmar_delete_espera: function(item, index) {
alertify.confirm(' <strong>Burble</strong>', '¿Estas seguro de eliminar el cliente  '+item.nombre +' de la lista de espera?' 
  ,() => {



Proyectos.delete_espera(item);
    }, 
function()
{ 


});
},


crear_proyecto: function(e) {

document.getElementById('btn-proyecto').disabled = true;
document.getElementById('carga-proyecto').style.display="block";

var url = '/api/proyecto/create/' ;
axios.get( url, {
  params: {
cliente: this.Rproyecto.cliente_id,
proyecto: this.Rproyecto.nombre_proyecto,
fecha_recepcion: this.Rproyecto.fecha_recepcion,
fecha_entrega: this.Rproyecto.fecha_entrega,
presupuesto: this.Rproyecto.presupuesto,
comentario: this.Rproyecto.comentario,

},
validateStatus: (status) => {
        return true; // I'm always returning true, you may want to do it depending on the status received
      },
    }).catch(error => {
    }).then(response => {

if (response.data == "true") {
document.getElementById('carga-proyecto').style.display="none";
this.close();
document.getElementById('btn-proyecto').disabled = false;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
Proyectos.getListaEspera();
location ="/home";    
}
else
{
document.getElementById('loader-sm').style.display="none"
this.close();
document.getElementById('btn-proyecto').disabled = false;
 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');


}

});
},
additem_principal:function(id){

axios({ 
  url: '/api/proyectos/principal/add/',
  method: 'get',
  params: {
 id: id ,
 }}).then(function (response) {
console.log(response.data.estado);
         
if (response.data.estado==1) {

 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Ya existe en la lista</strong> </center>');



}



Proyectos.delete_proyecto_espera(id);

Proyectos.delete_espera(id);

Proyectos.getListaPrincipal();

//location ="/home";
})



},
additem_espera:function(id){

axios({ 
  url: '/api/proyectos/espera/add/',
  method: 'get',
  params: {
 id: id ,
  }}
  ).then(function (response) {
var item = {proyectos_id:id};
Proyectos.delete_principal(item);
Proyectos.getListaEspera();
 //location ="/home";
})


},

  

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

 group: {
 name: 'LISTAPRINCIPAL',
put: ['LISTAESPERA']
},

animation: 200, // ms, animation speed 
ghostClass: "gho",
chosenClass: "chosen",


swapThreshold: 1,
removeCloneOnHide:true,
bubbleScroll: true,
removeCloneOnHide: true,
disabled:false,
swapThreshold: 1,
preventOnFilter: true,
touchStartThreshold: 200,

// Element is dropped into the list from another list
onAdd: function (/**Event*/evt) {


var id = evt.item.id;
var item =  evt.item;
Proyectos.additem_principal(evt.item.id);
 //location ="/home";
 location ="/home";

//evt.item.remove();
//x = document.getElementsByClassName("item_espera")[0];
  
//x.remove()


},



onEnd: function (/**Event*/evt) {
    var itemEl = evt.item;  // dragged HTMLElement
    evt.to;    // target list
    evt.from;  // previous list
    evt.oldIndex;  // element's old index within old parent
    evt.newIndex;  // element's new index within new parent

document.getElementById('btn-create-proyecto').style.display="block";
document.getElementById('loader-lista-principal').style.display="none";





  },

// Called by any change to the list (add / update / remove)
onSort: function (/**Event*/evt) {
    // same properties as onEnd
  },
// Element dragging started
onStart: function (/**Event*/evt) {
evt.oldIndex;  // element index within parent
document.getElementById('loader-lista-principal').style.display="block"
document.getElementById('btn-create-proyecto').style.display="none"
  },
// Element is removed from the list into another list
  onRemove: function (/**Event*/evt) {
    // same properties as onEnd
  },
onClone: function (/**Event*/evt) {
    var origEl = evt.item;
    var cloneEl = evt.clone;  
  },
onUpdate: function (evt/**Event*/){
const Neworden = [...document.querySelectorAll('.item_proceso')].map(el => el.id);
axios({
  url: '/api/proyectos/principal/update/',
  method: 'get',
  params: {
 nuevoOrden: Neworden,
  }}
  ).then(function (response) {


 console.log(Neworden);
   
})
},
}); // That's all.




var espera = document.getElementById("navs_espera");
Sortable.create(espera, { 
/* options */ 

 group: {
 name: 'NAVS',
  
},



  sort: true,
  handle: '.handle',
  filter: '.disabled',
animation: 150, // ms, animation speed 
removeCloneOnHide: true,
disabled: false,
direction: 'horizontal',
bubbleScroll: true,
removeCloneOnHide: true,

 // Element is chosen
  onChoose: function (/**Event*/evt) {
    evt.oldIndex;  // element index within parent


  },
  onSort: function (/**Event*/evt) {
    // same properties as onEnd


  },

onEnd: function (/**Event*/evt) {
    var itemEl = evt.item;  // dragged HTMLElement
    evt.to;    // target list
    evt.from;  // previous list
    evt.oldIndex;  // element's old index within old parent
    evt.newIndex;  // element's new index within new parent


   // document.getElementById('loader-lista-espera').style.display="none";
  },





  onAdd: function (/**Event*/evt) {

Proyectos.additem_espera(evt.item.id);
Proyectos.lista_espera.splice(index, 1)  ;


//x = document.getElementsByClassName("item_proceso")[0];
  
//x.remove()


 //location ="/home";
//evt.item.remove();

},

// Element dragging started
  onStart: function (/**Event*/evt) {
    evt.oldIndex;  // element index within parent


//document.getElementById('loader-lista-espera').style.display="block"


  },

onClone: function (/**Event*/evt) {
    var origEl = evt.item;
    var cloneEl = evt.clone;
 
  },
  
onUpdate: function (evt/**Event*/){




const Neworden = [...document.querySelectorAll('.handle')].map(el => el.id);

axios({
url: '/api/lista_espera/update/',
method: 'get',
params: {
nuevoOrden: Neworden,
}}).then(function (response) { 



//Proyectos.delete_principal(item);

Proyectos.getListaEspera();
//location ="/home";



//document.getElementById('loader-lista-espera').style.display="none";

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





/*GESTIONAR USUARIOS*/
var Gestionusuarios = new Vue({ 
    el: '#AppUsuarios',
  mounted(){

this.getUsers();

    },

    data: {

     lists: [],
     list: [],
     state: 0,
     preview: 'img/user.png' ,
     foto:null,

     rellenar: { 
    'id':'',
    'foto':'', 
    'nombre':'',
    'apellido':'',
    'password':'',
    'email':'',
    'password':'',
    'alias':'',
    'fecha_nacimiento':'',
    'rango':'',
    'cuit':'',
    'direccion':'',
    'obra_social':'',
    'servicio_ambulancia':'',
    'contacto_ambulancia':''
   },

     id:'',

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
getUsers: function(dato)  {
var urlUsers = '/api/usuarios/consulta/';
axios.get(urlUsers).then(response => {

this.lists= response.data.usuarios.data;
this.pagination=  response.data.pagination;

});
},


paginar: function (page) {
axios({
  url: '/api/usuarios/consulta?page='+page,
  method: 'get',
}).then(response => {
this.lists= response.data.usuarios.data;
this.pagination=  response.data.pagination;

});
},
changePage: function (page) {
this.pagination.current_page=page;
this.paginar(page);
}
,

eliminar: function(dato)  {
alertify.confirm(' <strong>Alerta - Burble</strong>', '¿Estas seguro de eliminar al usuario ' +dato.name+ ' '+dato.apellido+' del sistema?' 
,() => {
axios({
  url: '/api/usuarios/delete/',
  method: 'get',
  params: {
 id: dato.id
}
}).then(function (response) {
Gestionusuarios.getUsers();
})}, function(){ });


},
create: function(e) {
document.getElementById('btn-create').disabled = true;
document.getElementById('loader-create').style.display="block";
var url = '/api/usuario/create/' ;
axios.get( url, {
params: {
nombre: this.rellenar.nombre,
apellido: this.rellenar.apellido,
email: this.rellenar.email,
password: this.rellenar.password,
alias:this.rellenar.alias,
fecha_nacimiento:this.rellenar.fecha_nacimiento,
rango: this.rellenar.rango,
cuit: this.rellenar.cuit,
direccion: this.rellenar.direccion,
obra_social: this.rellenar.obra_social,
servicio_ambulancia: this.rellenar.servicio_ambulancia,
contacto_ambulancia: this.rellenar.contacto_ambulancia,
  },
validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).catch(error => {
}).then(response => {
if (response.data == "true") {
document.getElementById('loader-create').style.display="none";
document.getElementById('btn-create').disabled = false;
$('.nuevoUsuario').modal('hide')

var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.getUsers();
this.clear(); 
}
else{
document.getElementById('loader-sm').style.display="none"
$('.nuevoUsuario').modal('hide')
document.getElementById('btn-proyecto').disabled = false;
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
}
});
},


update_user: function(e) {
document.getElementById('btn-edicion').disabled = true;
document.getElementById('loader-edicion').style.display="block"

var url = '/api/usuario/update/' ;
axios.get( url, {
params: {
id: this.rellenar.id,
nombre: this.rellenar.nombre,
apellido: this.rellenar.apellido,
email: this.rellenar.email,
password: this.rellenar.password,
alias:this.rellenar.alias,
fecha_nacimiento:this.rellenar.fecha_nacimiento,
rango: this.rellenar.rango,
cuit: this.rellenar.cuit,
direccion: this.rellenar.direccion,
obra_social: this.rellenar.obra_social,
servicio_ambulancia: this.rellenar.servicio_ambulancia,
contacto_ambulancia: this.rellenar.contacto_ambulancia,
},
validateStatus: (status) => {
return true; // I'm always returning true, you may want to do it depending on the status received
},
}).catch(error => {
}).then(response => {


if (response.data.estado == "true") {
document.getElementById('btn-edicion').disabled = false;
document.getElementById('loader-edicion').style.display="none"
this.state= 0;

var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
this.getUsers();

}
else
{
document.getElementById('btn-edicion').disabled = false;
document.getElementById('loader-edicion').style.display="none";
 var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
this.state= 0;

}
});
},



mostrar: function(item) {
$('#editar').modal('show');

this.rellenar.id = item.id;
this.rellenar.foto = item.foto;
this.rellenar.nombre = item.name;
this.rellenar.apellido = item.apellido;
this.rellenar.email = item.email;
this.rellenar.alias = item.alias;
this.rellenar.fecha_nacimiento = item.fecha_nacimiento;
this.rellenar.rango = item.rango;
this.rellenar.cuit = item.cuit;
this.rellenar.direccion = item.direccion;
this.rellenar.obra_social = item.obra_social;
this.rellenar.servicio_ambulancia = item.servicio_ambulancia;
this.rellenar.contacto_ambulancia = item.contacto_ambulancia;

},

clear: function(item) {
this.rellenar.id = '';
this.rellenar.foto = '';
this.rellenar.nombre = '';
this.rellenar.apellido = '';
this.rellenar.password = '';
this.rellenar.email = '';
this.rellenar.alias = '';
this.rellenar.fecha_nacimiento = '';
this.rellenar.rango = '';
this.rellenar.cuit ='';
this.rellenar.direccion ='';
this.rellenar.obra_social = '';
this.rellenar.servicio_ambulancia ='';
this.rellenar.contacto_ambulancia ='';
},


monitor: function(e) {
axios({
url: '/api/usuario/consulta_mail/',
method: 'get',
params: {
mail: this.n_email
}
}).then(function (response) {
if (response.data =="true") {
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Email ya existe </strong> </center>');
document.getElementById("email").value = "";
}
})
}
,


carga_input: function(e) {
var input =this.$refs['foto_update']  ;
document.getElementById("foto_update").click();
}
,
enviar_foto: function(e)  {

const file = event.target.files[0];
this.preview = URL.createObjectURL(file);
//Convertir en archivo antes de enviar
const formData = new FormData()
formData.append('foto', file, file.name)
axios.post('/send_foto/'+this.rellenar.id, formData).then(function(response){
img = response.data;
document.getElementById('img_edit').src = '/img/users/fotos/'+img;
var notification = alertify.notify(' <center> <strong style="color:white;"> <i class="fas fa-check-circle"></i> Guardado  </strong> </center> ', 'success', 5, function(){  console.log('dismissed'); });
Gestionusuarios.getUsers();

})
.catch(function(error){
var notification =  alertify.warning(' <center> <strong style="color:black;"> <i class="fas fa-exclamation-circle"></i> Hubo un problema </strong> </center>');
console.log('FAILURE LA CARGA!!');
});
 },

edicion: function(e) {
if (this.state == 0) {
this.state = 1;
console.log(this.state);
  } else{
this.state = 0;
}
},


close_modal: function(item) {


$('#editar').modal('hide');
this.clear(item);
if (this.state == 1) {
this.state = 0;
} 



}
}
});



