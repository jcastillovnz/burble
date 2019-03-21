

<div   class="list-item" >
<div  :key="'navs'+item.clientes.id"  class="owl-carousel owl-theme" v-carousel  >


<template v-if="item.clientes.proyectos.length == 0" >	
<div :key="item.id "   style="margin-right: 0px; margin-left: 0px;" class="item carrusel" >
<br>
<div  class="card alert-warning" style="width:180px; height:200px;"   >
<div class="card-body">
<h4 style="font-size: 16px; margin-top: 45%" class="card-title "><i class="fas fa-exclamation-circle"></i> SIN PROYECTOS</h4>  
 </div>
</div> 
</div>
</template>




<div v-for="item in item.clientes.proyectos"  :key="item.id "   class="item carrusel" >

@{{ item.id }}
@include('layouts.carrusel.cards')



</div>












</div>
</div>
