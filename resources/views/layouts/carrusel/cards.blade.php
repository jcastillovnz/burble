<!-- CARDS -->
<div class="card "   v-bind:class="{ 'card-p-baja': item.prioridad == 'baja','card-p-media': item.prioridad  == 'media', 'card-p-alta': item.prioridad  == 'alta'   }"   style="width:180px;"   >
 
<div  @click="show_proyecto(item)"  class="float-ritgh" style="color:white;  position: absolute; right: 0;">
<i class="fas fa-pen-square"></i>
</div>

<img  v-if="item.img!=null" height="80" src="https://i.dailymail.co.uk/i/pix/2015/01/07/2477609600000578-2899561-Multi_talented_IMG_praised_model_Gizele_Oliveira_for_her_ability-m-11_1420639554729.jpg">


<img  v-else="" height="80" src="https://i.dailymail.co.uk/i/pix/2015/01/07/2477609600000578-2899561-Multi_talented_IMG_praised_model_Gizele_Oliveira_for_her_ability-m-11_1420639554729.jpg">


<div class="card-body">
<h4 style="font-size: 15px;" class="card-title"><i class="far fa-folder"></i>  @{{ item.nombre }}</h4>  
<p style="font-size: 12px;" class="card-text">
	<template v-if="item.descripcion!= null">
		@{{ item.descripcion }}  
	</template>
<template v-else="">
Sin descripcion
	</template>

</p>

<span style="font-size: 11px;">

@{{ item.fecha_recepcion }} / @{{ item.fecha_entrega }}
</span>
 </div>
</div>
<!-- CARDS -->  

