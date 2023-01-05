@extends('layouts.app')

@section('content')
<div class="container h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-lg-6 col-xl-11">
      <div class="card border-0 text-black" style="border-radius: 25px;">
        <div class="card-body border-0 p-md-5">
          <div class="row justify-content-center">
            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

              <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

              <form class="mx-1 mx-md-4" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                  <div class="form-outline flex-fill mb-0">
                    <input type="text" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  required autocomplete="name" autofocus/>
                    <label class="form-label" for="name">{{ __('Name') }}</label>
                  </div>
                  @error('name')
                    <div class="invalid-feedback" style="height:10px !important;" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                  @enderror
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                  <div class="form-outline flex-fill mb-0">
                    <input type="email" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                    <label class="form-label" for="email">{{ __('Email Address') }}</label>
                  </div>
                  @error('email')
                    <div class="invalid-feedback " style="height:10px !important;" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                  @enderror
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                  <div class="form-outline flex-fill mb-0">
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                  </div>
                  @error('password')
                    <div class="invalid-feedback" style="height:10px !important;" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                  @enderror
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                  <div class="form-outline flex-fill mb-0">
                    <input type="password" id="confirmpassword" class="form-control" name="password_confirmation" required autocomplete="new-password"/>
                    <label class="form-label" for="confirmpassword">{{ __('Confirm Password') }}</label>
                  </div>
                </div>

                <div class="d-flex justify-content-center flex-column mx-4 mb-3 mb-lg-4">
                  <button type="submit" class="btn btn-outline-primary btn-lg">{{ __('Register') }}</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="{{url('/login')}}"
                    class="link-danger">Login</a></p>
                  </div>
              </form>

            </div>
            {{-- <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                class="img-fluid" alt="Sample image">

            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
