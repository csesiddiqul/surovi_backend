@extends('layouts.app')

@section('content')

    <div class="container">

    <div class="row justify-content-center ad-from">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body log-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <h2 class="mylog">Login Surovi<span class="scol"></span>  </h2>

                            <div class="col-md-6">

                                <input id="email" type="email" class="form-control fild-cont @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your Email" autofocus>
                                <i class="fa-solid fa-user"></i>

                                @error('email')
                                <br>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">


                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control fild-cont @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your Password">
                                <i class="fa-solid fa-lock"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                                               @if (Route::has('password.request'))
                                                   <a class="btn btn-link" href="{{ route('password.request') }}">
                                                       {{ __('Forgot Your Password?') }}
                                                   </a>
                                               @endif


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary mybtn">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>



                    </form>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection
