@extends('layouts.dashboard')

@section('seoTitle')
    | {{ __('lang.user_admin_edit') }}
@endsection

@section('content')

    @include('partials.profile_menu')
    <div class="container dashboard">
        <div class="row justify-content-center profile-content" data-aos="fade-up">
            <div class="col-md-12 mb-3">
                <a class="btn btn-coolture" href="{{ route('users.index') }}"><i class="fa fa-chevron-left"></i>
                    {{ __('lang.back') }}</a>
            </div>
            <div class="card w-100">
                <div class="card-body mt-4">
                    <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}" class="mt-3">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">

                            {{-- Camp "Nom" --}}
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('lang.form_name') }}</label>
                            <div class="col-md-6 mb-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name', $user->name) }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Camp "Correu electrònic" --}}
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('lang.email') }}</label>
                            <div class="col-md-6 mb-3">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

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
            </div>
        </div>
    </div>
    <script type="text/javascript">
        setTimeout(function() {
            $("#header").addClass("header-fixed");
        }, 1);

    </script>
@endsection
