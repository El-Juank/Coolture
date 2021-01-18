@extends('layouts.dashboard')

@section('seoTitle')
    | {{ __('lang.edit_profile_seo') }}
@endsection

@section('content')

    @include('partials.profile_menu')

    <!-- Mesura de seguretat; comprova els ids del usuari actual i del usuari que es vol modificar i si no coincideixen redirigeix al home -->
    <!-- Faig això perque sinó es podría modificar qualsevol usuari canviant la url al navegador, i aixó no és pas bo  -->
    @if (Auth::user()->id !== $user->id)
        <script>
            window.location = "/Coolture/public/home";

        </script>
    @endif

    <div class="container dashboard">
        <div class="row justify-content-center profile-content" data-aos="fade-up">
            <div class="col-md-12">
                <h2 class="mb-1">{{ __('lang.your_profile') }}</h2>
                <p class="text-secondary">{{ __('lang.your_profile_tagline') }}</p>
                <div class="card">
                    <div class="card-body">
                        <!-- Amb l'id que hem agafat del "Auth::user" enviem el formulari per modificar l'usuari en concret -->
                        <form method="POST" action="{{ route('profile.update', ['profile' => $user->id]) }}" class="mt-3">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('lang.form_name') }}</label>
                                <div class="col-md-6 mb-3">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', Auth::user()->name) }}" required
                                        autocomplete="name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('lang.email') }}</label>
                                <div class="col-md-6 mb-3">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email', Auth::user()->email) }}" required
                                        autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row mt-4 justify-content-center">
                                <div class="col-md-6 text-center">
                                    <button type="submit" class="btn btn-coolture">
                                        {{ __('lang.update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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
