

<div  :key="item.clientes.id"  class="list-item" >


<<<<<<< HEAD
<template v-if="item.clientes.proyectos.length == 0" >	
<div :key="item.id "   style="margin-right: 0px; margin-left: 0px;" class="item carrusel" >
=======
CARRUSEL  @{{item.clientes.nombre}} 



<div :key="item.clientes.id"  class="owl-carousel owl-theme" v-carousel  >


<template v-if="item.clientes.proyectos.length == 0" >
<div   :key="item.clientes.id"  style="margin-right: 0px; margin-left: 0px;" class="item" >
>>>>>>> parent of 49a1a5f... funcional NAVS OK

<br>
<div  class="card alert-warning" style="width:180px; height:200px;"   >
<div class="card-body">
<h4 style="font-size: 16px; margin-top: 45%" class="card-title "><i class="fas fa-exclamation-circle"></i> SIN PROYECTOS</h4>  
 </div>
</div> 


</div>

</template>




<<<<<<< HEAD
<div v-for="item in item.clientes.proyectos"  :key="item.id "   class="item carrusel" >
trytr
 @{{ item.nombre }}
=======

<template v-for="item in item.clientes.proyectos" >
<div :class="'carrusel_'+index"  :key="item.clientes.id"     style="margin-right: 0px; margin-left: 0px;" class="item" >

>>>>>>> parent of 49a1a5f... funcional NAVS OK





@include('layouts.carrusel.cards')







</div>
</template>



</div>
</div>
