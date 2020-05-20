
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/iofrm-style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/iofrm-theme4.css')}}">
    </head>

<body>

<div class="form-body">

    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                {{--<img src="{{asset('images/graphic1.svg')}}" alt="">--}}
                <img src="{{asset('images/airplan.webp')}}" alt="" style="transform: rotate(90deg)">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Get more things done with Loggin platform.</h3>

                    <p>Access flight planning and planning to do better.</p>

                    @if(Session::has('MsgDeAct'))
                   <div class="alert alert-danger alert-block" style="background-color:#ff704d">
	                <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ Session::get('MsgDeAct') }}</strong>
                    </div>
                    @endif
                    <div class="page-links">
                        <a class="active" href="{{ route('login') }}">{{ __('Login') }}</a>
                        <a class="active" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>




                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail Address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                         </form>

                </div>
            </div>
        </div>
    </div>
    </div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>

