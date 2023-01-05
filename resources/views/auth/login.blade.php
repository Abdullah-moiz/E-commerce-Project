@extends('layouts.app')

@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
</style>
<section class="vh-100">
  <div class="container-fluid h-custom">
     <div class="row d-flex justify-content-center align-items-center h-100">
        {{-- <div class="col-md-9 col-lg-6 col-xl-5">
           <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
              class="img-fluid" alt="Sample image">
        </div> --}}
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
           <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="d-flex flex-row align-items-center justify-content-center">
                <h1 >{{ __('Login') }}</h1>
              </div>
              <br>
              <!-- Email input -->
              <div class="form-outline mb-4">
                 <label class="form-label" for="form3Example3">{{ __('Email Address') }}</label>
                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                 @error('email')
                 <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                 </span>
                 @enderror
              </div>
              <!-- Password input -->
              <div class="form-outline mb-3">
                 <label class="form-label" for="form3Example4">{{ __('Password') }}</label>
                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                 @error('password')
                 <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                 </span>
                 @enderror
              </div>
              <div class="d-flex justify-content-between align-items-center">
                 <!-- Checkbox -->
                 <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                      {{ __('Remember Me') }}
                    </label>
                 </div>
                 @if (Route::has('password.request'))
                 <a href="{{ route('password.request') }}" class="text-body">Forgot password?</a>
                  @endif
              </div>
              <div class="d-flex my-4 justify-content-center flex-column mx-4 mb-3 mb-lg-4">
               <button type="submit" class="btn btn-outline-primary btn-lg">{{ __('login') }}</button>
               <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{url('/register')}}"
                 class="link-danger">Register</a></p>
               </div>
           </form>
        </div>
     </div>
  </div>
  <div>
</section>
@endsection
