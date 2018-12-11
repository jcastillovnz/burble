@extends('layouts.app')

@section('content')



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





<!--  

<div class="col-md-4" >



<div  align="center"    >
<h1 class="text-primary">
<strong>
Burble
</strong>
</h1>
</div>




<form class="hidden"  method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
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
<span style="width: 35px"  class="input-group-text">   <i class="fas fa-lock"></i>   
 </span>
</div>
 <input id="password" placeholder="Contraseña" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
 @if ($errors->has('password'))
<span class="invalid-feedback" role="alert">
<strong>{{ $errors->first('password') }}</strong>
</span>
@endif




<div class="float-right"><button type="submit" name="go" class="btn btn-info btn-sm rounded">
<i class="fas fa-angle-right"></i>  Ingresar
</button>
</div>





</div>




</form>
<div>
</div>
          
      -->
        



<div style="" class="container " style=""  >
  
   
  <div class="pwd-container "   >
    <div class="col-md-4 "  ></div>
 
    <div class="col-md-3 " id="login" >

      <section style="" class="login-form">

<div  align="center"   >
<span style="font-size: 30px; "  class="text-info"  > 
<i class="fa fa-university" aria-hidden="true"></i>
<strong>
Estudio Mirolo  
</strong>
</span>
</div>

                        @csrf

<!--  
          <img src="imagenes/logo.png" class="img-responsive" alt="" /> 
-->


    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
   @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

        <br> 

           <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required  placeholder="Contraseña" >


                        @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

          
          <div class="pwstrength_viewport_progress"></div>
          <br>  
         
          
          <button type="submit" name="go" class="btn  btn-primary btn-block btn-sm">
<i class="fas fa-sign-in-alt"></i>
          Entrar al sistema</button>
     
          <div>
         
          </div>
          
        </form>
        
        <div class="form-links">


      </div>
        </div>
      </section>  
      </div>
      
 










 


@endsection
