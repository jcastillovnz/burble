

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
resultados: [],


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

