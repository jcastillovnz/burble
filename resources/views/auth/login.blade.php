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
        



<center>HOLA</center>








 


@endsection
