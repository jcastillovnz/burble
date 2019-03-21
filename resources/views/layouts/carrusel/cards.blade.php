











<div  style="max-width: 175px;"  class="card "  :key="item.clientes.id"  v-bind:class="{ 'card-p-baja': item.prioridad == 'baja','card-p-media': item.prioridad  == 'media', 'card-p-alta': item.prioridad  == 'alta'   }"    >
 
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



<<<<<<< HEAD


<button @click="additem_principal(item.id)" class="btn btn-light btn-sm">
<i class="fas fa-sort-amount-up"></i>
</button>

<button @click="show_proyecto(item)" class="btn btn-light btn-sm">
<i  class="fas fa-pen-square"></i> 

</button>



<button   @click="espera_principal(item)"  class="btn btn-light btn-sm">
<i class="fas fa-trash"></i>
</button>


=======
<i @click="show_proyecto(item)" class="fas fa-pen-square"></i> 
<i class="fas fa-hand-pointer"></i>
>>>>>>> parent of 5a5343c... update card

    </div>
    <div class="card-footer" >




      <small style="font-size: 10px;" class="text-muted">@{{ item.fecha_recepcion }} / @{{ item.fecha_entrega }}</small>


    </div>







<!-- CARDS -->  

