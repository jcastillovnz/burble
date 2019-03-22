

<div  id="tabs_proyectos"  :key="item.clientes.id"  class="list-item" >


<br>

<div :key="item.clientes.id"    class="owl-carousel owl-theme" v-carousel  >


<template v-if="item.clientes.proyectos.length == 0" >
<div   :key="item.clientes.id"  style="margin-right: 0px; margin-left: 0px;" class="item" >

<br>
<div  class="card alert-warning" style="width:180px; height:200px;"   >
<div class="card-body">
<h4 style="font-size: 16px; margin-top: 45%" class="card-title "><i class="fas fa-exclamation-circle"></i> SIN PROYECTOS</h4>  
 </div>
</div> 


</div>

</template>





<template v-for="item in item.clientes.proyectos" >
<div :class="'carrusel_'+index"      style="margin-right: 0px; margin-left: 0px;" class="item" >



@include('layouts.carrusel.cards')




</div>
</template>



</div>
</div>
