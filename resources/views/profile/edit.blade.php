@extends('layouts.dashboard')

@section('seoTitle')
    | {{ __('lang.edit_profile_seo') }}
@endsection

@section('content')

    {{-- Modal per donar-se de baixa --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="mt-4 mb-1">{{ __('lang.delete_account_confirm') }}</h2>
                    <p>{{ __('lang.delete_account_confirm_tagline') }}</p>
                    <div class="mt-5 mb-5">
                        {{-- Botó per donar-se de baixa --}}
                        <form action="{{ route('users.destroy', ['user' => Auth::user()->id]) }}" method="POST"
                            style="display:inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            {{-- Si l'usuari és administrador no es pot donar de baixa
                            --}}
                            <input @if (Auth::user()->IsAdmin()) disabled style="cursor: not-allowed;
                                                                                pointer-events: all !important; background-color:var(--colorCorp); border-color:var(--colorCorp);" @endif type="submit" value="{{ __('lang.yes') }}"
                                onclick="return confirm('{{ __('lang.delete_user_confirm') }}')" class="btn btn-coolture">
                        </form>
                        <a data-dismiss="modal" aria-label="Close" class="btn btn-coolture">{{ __('lang.no') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                <div class="card mb-3">
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

                {{-- Secció "Donar-se de baixa" --}}
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-1">{{ __('lang.delete_account') }}</h5>

                        <div class="d-flex justify-content-center mt-3">
                            {{-- Botó per activar el modal --}}
                            <button type="button" class="btn btn-coolture" data-toggle="modal" data-target="#exampleModal">
                                {{ __('lang.delete_account') }}
                            </button>
                        </div>

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
