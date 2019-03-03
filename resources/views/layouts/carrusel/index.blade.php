

<div id="carrusel">
<div class="list-item" >
<div class="owl-carousel owl-theme" v-carousel>

HOLA


 <!-- CARDS  NULL-->
<div v-if="item.clientes.proyectos.length==0 " class="card alert-warning" style="width:180px; height:200px;"   >
<div class="card-body">
<h4 style="font-size: 16px; margin-top: 45%" class="card-title "><i class="fas fa-exclamation-circle"></i> Sin proyectos</h4>  
 </div>
</div> 
<!-- CARDS  NULL-->


<div style="margin-right: 0px; margin-left: 0px; margin-bottom: 0px;" class="item" v-for="item in item.clientes.proyectos">
<!-- CARDS -->
<div class="card" style="width:180px;"   >
<img  height="80" src="https://i.dailymail.co.uk/i/pix/2015/01/07/2477609600000578-2899561-Multi_talented_IMG_praised_model_Gizele_Oliveira_for_her_ability-m-11_1420639554729.jpg">
<div class="card-body">
<h4 style="font-size: 16px;" class="card-title"><i class="far fa-folder"></i>  @{{ item.nombre }}</h4>  
<p style="font-size: 12px;" class="card-text">Descripcion.</p>
<span style="font-size: 11px;">
@{{ item.fecha_recepcion }} / @{{ item.fecha_entrega }}
</span>
 </div>
</div>
<!-- CARDS -->   
</div>


















</div>
</div>
</div>