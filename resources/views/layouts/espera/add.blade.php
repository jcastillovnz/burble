  <!-- The Modal -->
  <div class="modal  addPestana" id="myModal" >
    <div class="modal-dialog">
      <div class="modal-content">
      <form method="GET" class="hidden" role="form"  v-on:submit.prevent="create_espera(this)"  >
       <div class="modal-header" >


<div class="col-sm-12 text-primary">

<i class="fas fa-suitcase"></i>
<strong>
  Agregar una nueva pestaña
</strong><button type="button" class="close float-right" data-dismiss="modal" >&times;</button>

</div>      

      </div>
        
<!-- Modal body -->
<div class="modal-body">
<select class="form-control"  v-model="Rproyecto.cliente_id">
@if ( isset($clientes)==true   )
<option selected="" value="">Seleccione cliente</option>
@foreach( $clientes as $cliente)
<option value="{{$cliente->id}}"  > {{$cliente->nombre}}</option>
@endforeach
@else
<option value="">Seleccione cliente</option>
@endif
</select>
</div>
        
<!-- Modal footer -->
<div class="modal-footer">

<div  class="btn btn-group  ">
<div id="loader-create-espera" class="loader loader-sm"></div>
<button class="btn btn-light btn-sm " type="button" class="close" data-dismiss="modal" aria-label="Close">
<i class="fas fa-times-circle"></i>
</button>

<button id="btn-create-espera"  class="btn btn-success btn-sm"     >
<i class="fas fa-save"></i> 
</button>

</form>


</div>




        </div>
        
      </div>
    </div>
  </div>