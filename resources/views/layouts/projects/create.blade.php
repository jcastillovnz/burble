

<!-- MODAL NUEVO PROYECTO  -->
<div   class="modal fade nuevoProyecto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

<div class="modal-dialog modal-sm-8">
<div id="AppProyectos"   class="modal-content">
<form method="GET" class="hidden" role="form"  v-on:submit.prevent="crear_proyecto(this)"  >
<div class="modal-header ">
<div class="col-sm-12 text-primary">
<i class="fas fa-cube"></i>
<strong>
Registrar un nuevo proyecto
</strong>
<button type="button" class="close float-right" v-on:click="close()"  >&times;</button>
</div>
</div>
<div  class="modal-body">
 <div class="input-group col-sm-12">
<div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"><i  class="fas fa-briefcase"></i> </span>
    </div>
 
<select required="" autocomplete="off"  v-model="Rproyecto.cliente_id" class="form-control">

<option value="" selected="">Cliente / Empresa</option>

@if ( isset($clientes)==true   )
@foreach( $clientes as $cliente)
<option value="{{$cliente->id}}"  > {{$cliente->nombre}}</option>
@endforeach
@else
<option value="">Seleccione un cliente</option>
@endif
</select>

</div>



 <div class="input-group  col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-cube"></i></span>
</div>
<input  autocomplete="off" required="" v-model="Rproyecto.nombre_proyecto" type="text" class="form-control" placeholder="Nombre de proyecto">
</div>


<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-clock"></i>  </span>
</div>




 <proyecto-fecha-recepcion required=""  placeholder="Fecha de recepcion"  autocomplete="off"   v-model="Rproyecto.fecha_recepcion"  class="form-control"  :config="{format:'YYYY/MM/DD'}"></proyecto-fecha-recepcion>





</div>



<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fab fa-font-awesome-flag"></i>  </span>
</div>



<proyecto-fecha-entrega autocomplete="off"   title="Fecha de entrega" name="date" placeholder="Fecha de entrega"  v-model="Rproyecto.fecha_entrega"  class="form-control"  :config="options"></proyecto-fecha-entrega>
</div>




<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"  class="input-group-text"><i class="fas fa-dollar-sign"></i>   </span>
</div>
<input  autocomplete="off" required="" v-model="Rproyecto.presupuesto" type="number" min="10" max="5000000"   class="form-control" placeholder="Presupuesto">
</div>


<div class="input-group col-sm-12">
<div class="input-group-prepend">
<span style="width: 35px"   class="input-group-text"><i class="fas fa-comments"></i> </span>
</div>


<textarea autocomplete="off" required="" v-model="Rproyecto.comentario" class="form-control" placeholder="Comentarios..."></textarea>
</div>
 </div>


<div  class="modal-footer">
<div  class="btn btn-group  ">
<div id="carga-proyecto" class="loader loader-sm "></div>
<button class="btn btn-light btn-sm " type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>

<button id="btn-proyecto"  class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>


</form>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL NUEVO PROYECTO  -->

