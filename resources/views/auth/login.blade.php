@extends('layouts.base')

@section('seoTitle')
    | Login
@endsection

@section('content')
    <div class="container login-container">
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="mt-3 mb-1">Benvingut de nou!</h2>
                        <p class="text-secondary mb-5">Escriu les teves dedes avall</p>
                        <form method="POST" action="{{ LaravelLocalization::localizeUrl('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Correu Electrònic') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Contrasenya') }}</label>

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

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recorda\'m') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-login mb-2">
                                        {{ __('Iniciar sessió') }}
                                    </button>
                                    <br>
                                    @if (Route::has('password.request'))
                                        <a class="btn link"
                                            href="{{ LaravelLocalization::localizeUrl('password.request') }}">
                                            {{ __('Has oblidat la teva contrasenya?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        setTimeout(function() {
            $("#header").addClass("header-fixed");
        }, 1);

    </script>
@endsection
