@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-8 mb-12"><center>
            <img src="{{ asset('assets/web/sis.jpg') }}" alt="logo sekolah" width="85px"></center>
            <h5 style="text-align: center; color:blue">SISEKOLAH</h5>
            <div class="card card-primary">

              {{--  <div class="card-header"><h4>Login Sistem Informasi Sekolah</h4></div>  --}}

              <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan mailmu" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>

                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan kata sandimu" name="password" tabindex="2" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="custom-control-label" for="remember-me">Ingatkan saya</label>
                      <div class="float-right">
                        @if (Route::has('password.request'))
                            <a class="text-small"href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
