@extends('layouts.app')

@section('content')


<script type="text/javascript">
  
var mediaquery = window.matchMedia("(max-width: 1150px)");
if (mediaquery.matches) {
  ///PANTALLA MOVIL
$(document).ready(function(){
  
$("#login").removeClass("well")

});

} 


</script>




<style type="text/css">

@media screen and (min-width: 1150px) {

.pwd-container{

padding-top: 10%;

padding-bottom: 18%;



}
}

  
@media screen and (max-width: 1150px) {
 

.pwd-container{

padding-top: 30%;
}


}

</style>

<div style="" class="container " style=""  >
  
   
  <div class="row pwd-container "  id="pwd-container"  >
    <div class="col-md-4 "  ></div>
 
    <div class="col-md-3 well" id="login" >

<section style="" class="login-form">

<div  align="center"    >


<h1 class="text-primary">
<strong>
Burble
</strong>
</h1>


</div>

      <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

   

 <div class="input-group container-fluid">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text"> <i class="fas fa-user-circle"></i>  </span>
    </div>
   <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
   @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
  </div>



 <div class="input-group  container-fluid">
    <div class="input-group-prepend">
      <span style="width: 35px"  class="input-group-text">   <i class="fas fa-lock"></i>    </span>
    </div>
 <input id="password" placeholder="Contraseña" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>


                        @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
  </div>






<!-- 

    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
   @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

        <br> 

           <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>


                        @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

          
          <div class="pwstrength_viewport_progress"></div>
          <br>  
         

 -->


<div class="col-sm-12">

<div class="float-right"><button type="submit" name="go" class="btn btn-info btn-sm rounded">
<i class="fas fa-angle-right"></i>  Ingresar
</button>
</div>


     </div>








          <div>
         
          </div>
          
        </form>
        
        <div class="form-links">


      </div>
        </div>
      </section>  
      </div>
      
 











  </div><!-- /.container contenedor-->
@endsection
