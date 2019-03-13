











<div  style="max-width: 175px;"  class="card "    v-bind:class="{ 'card-p-baja': item.prioridad == 'baja','card-p-media': item.prioridad  == 'media', 'card-p-alta': item.prioridad  == 'alta'   }"    >
 
 <img  height="120" v-if="item.img"  :src="'{{url ('/img/proyectos/fotos/')}}'+'/' +item.img" >


<img  v-else height="120"  src="{{url ('img/pieza.png')}} " >



<div class="card-body">
<h4 style="font-size: 12px;" class="card-title">




<a :href="'/detalle/'+item.id"  >
 @{{ item.nombre }}
</a>
</h4>  
      <p style="font-size: 10px;" class="card-text">

	<template v-if="item.descripcion!= null">
		@{{ item.descripcion }}  
	</template>
<template v-else="">
Sin descripcion
	</template>
  </p>




<button @click="show_proyecto(item)" class="btn btn-light btn-sm">
<i  class="fas fa-pen-square"></i> 

</button>


<button @click="additem_principal(item.id)" class="btn btn-light btn-sm">
<i   class="fas fa-level-up-alt"></i>
</button>





    </div>
    <div class="card-footer" >




      <small style="font-size: 10px;" class="text-muted">@{{ item.fecha_recepcion }} / @{{ item.fecha_entrega }}</small>


    </div>







<!-- CARDS -->  

