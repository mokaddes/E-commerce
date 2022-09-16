@extends('layouts.front')
@section('title')
    Login
@endsection
@section('content')
    <style>
        .socail_login_btn {
            border: none;
            color: white;
            padding: 8px 18px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 17%;
        }

        .socail_login_btn:hover {
            border: none;
            color: white;
            padding: 8px 18px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 17%;
        }

        .facebook {
            background-color: #3b5998;
        }

        .google {
            background-color: #dd4b39;
        }

        .twitter {
            background-color: #1DA1F2;
        }

        .linkedin {
            background-color: #0077B5;
        }

        .pinterest {
            background-color: red;
        }

        .instagram {
            background-color: #E1306C;
        }

        .snapchat {
            background-color: #e3d505;
        }

        .snapchat>i {
            color: white;
        }
    </style>


    <div class="container" style="margin-top: 40px;margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 text-center mt-3 mb-5">

                                  <a class="socail_login_btn facebook mr-2" href="{{route('social.provider','facebook')}}"><i class="fa fa-facebook"></i></a>

                                  <a class="socail_login_btn google mr-2" href="{{route('social.provider','google')}}"> <i class="fa fa-google"></i></a>

                                  <a class="socail_login_btn twitter mr-2" onclick="alert('Comming soon...!')" ><i class="fa fa-twitter"></i></a>

                                  <a class="socail_login_btn linkedin mr-2" href="{{route('social.provider','linkedin')}}"><i class="fa fa-linkedin"></i> </a>

                                  <a class="socail_login_btn pinterest mr-2" href="{{route('social.provider','pinterest')}}"><i class="fa fa-pinterest"></i></a>

                                  <a class="socail_login_btn instagram mr-2" href="{{route('social.provider','instagram')}}"><i class="fa fa-instagram"></i></a>

                                  <a class="socail_login_btn snapchat mr-2" href="{{route('social.provider','snapchat')}}" ><i class="fa fa-snapchat"></i></a>
                                  {{-- <a class="socail_login_btn snapchat mr-2" href="{{route('social.provider','snapchat')}}" ><i class="fa fa-snapchat"></i></a> --}}

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
