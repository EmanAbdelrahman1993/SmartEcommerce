@extends('frontend.master')
@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="loginForm" aria-label="{{ __('Login') }}">
                        @csrf

						
                        <div class="row">
							<div class="col-md-6">
                            <label for="email">{{ __('E-Mail Address') }}</label>
							</div>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>


                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                                </div>
                            </div>
                        </div>
                

                        {{--<div class="input-group">--}}
                            {{--<span class="input-group-addon"><i class="fa fa-envelope fa-lg"></i></span>--}}
                        {{--</div>--}}



                             
                                <a href="{{ url('auth/facebook') }}" class="btn btn-primary">Login With Facebook</a>

                                <a href="{{ url('auth/github') }}" class="btn btn-info">Login With Github</a>
                                

                                <a href="{{ url('auth/google') }}" class="btn btn-info">Login With Google Account</a>
                               

								<a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
