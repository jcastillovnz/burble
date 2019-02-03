@extends('layouts.app')

@section('content')






<style type="text/css">

@media screen and (min-width: 1150px) {

.login{
margin: auto;
max-width: 65%;
}





.pwd-container{

padding-top: 12%;

padding-bottom: 15%;

}
}

  
@media screen and (max-width: 1150px) {
 

.pwd-container{

padding-top: 30%;
}


}

</style>






<div class="row  pwd-container">
<div  class="col-md-4"></div>




<div   class="col-md-4"> 




<div class="login">
<p align="center" class="text-info" style="font-size: 25px;">
  <strong>
BURBLE
</strong>
</p>

<form class="hidden" method="POST" action="{{ route('login') }}">
@csrf




<div class="input-group  container-fluid">

<input id="email" type="email" placeholder="Email " class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

@if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
 </div>


<div class="input-group  container-fluid">

 <input id="password" placeholder="Contraseña" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
@if ($errors->has('password'))
<span class="invalid-feedback" role="alert">
<strong>{{ $errors->first('password') }}</strong>
</span>
@endif

 </div>


   
<div class="col-sm-12">

<button type="submit"  class="btn btn-info btn-sm  rounded-right float-right">
<i class="fas fa-fingerprint"></i> Ingresar
</button>


</div>





</form>
</div> <!-- cierre login -->



 </div>




<div  class="col-md-4"></div>









  </div><!-- /.container contenedor-->
@endsection
