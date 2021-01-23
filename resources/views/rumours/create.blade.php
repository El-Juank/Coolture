@extends('layouts.dashboard')

@section('seoTitle')
    | {{ __('lang.dash_genders_new') }}
@endsection

@section('content')

    {{-- 1. Cal preparar is-invalid css --}}

    @include('partials.profile_menu')
    <div class="container dashboard">
        <div class="row justify-content-center profile-content" data-aos="fade-up">
            <div class="col-md-12 mb-3">
                <a class="btn btn-coolture" href="{{ route('rumours.index') }}"><i class="fa fa-chevron-left"></i>
                    {{ __('lang.back') }}</a>
            </div>
            <div class="card w-100">
                <div class="card-body">

                    {{-- Encara s'ha d'acabar de pólir --}}
                    <form action="{{ route('rumours.store') }}" method="post" class="mt-3">
                        @csrf
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('lang.event_title') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"><br>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4 justify-content-center">
                            <div class="col-md-6 text-center">
                                <input type="submit" value="{{ __('lang.create') }}" class="btn btn-coolture">
                            </div>
                        </div>
                    </form>

                    {{-- Box de errors --}}
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

    <script type="text/javascript">
        setTimeout(function() {
            $("#header").addClass("header-fixed");
        }, 1);

    </script>
@endsection
