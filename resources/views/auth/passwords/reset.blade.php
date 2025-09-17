@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ad-from">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' ') }}</div>


                <div class="card-body log-body">

                    <h2 class="mylog">Reset <span class="scol">Password</span>  </h2>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control fild-cont @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your Email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary mybtn">
                                    {{ __('Send Password Reset Link') }}
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
