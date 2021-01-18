@extends('layouts.dashboard')

@section('seoTitle')
    | {{ __('lang.dash_events_edit') }}
@endsection

@section('content')

    @include('partials.profile_menu')
    <div class="container dashboard">
        <div class="row justify-content-center profile-content" data-aos="fade-up">
            <div class="col-md-12 mb-3">
                <a class="btn btn-coolture" href="{{ route('events.index') }}"><i class="fa fa-chevron-left"></i>
                    {{ __('lang.back') }}</a>
            </div>
            <div class="card w-100">
                <div class="card-body mt-4">
                    <!-- Amb l'id que hem agafat del "Auth::user" enviem el formulari per modificar l'usuari en concret -->
                    <form method="POST" action="{{ route('events.update', ['event' => $event->id]) }}" class="mt-3">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('lang.form_title') }}</label>
                            <div class="col-md-6 mb-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name', $event->Title) }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('lang.form_user') }}</label>

                            <div class="col-md-6">
                                <select name="User_id" id="User_id" class="form-control mb-2">
                                    <option value="0" disabled selected>Choose a user</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @if ($user->id == $event->User_id)
                                            selected
                                    @endif
                                    >{{ $user->name }}</option>
                                    @endforeach
                                </select>
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
