@extends('layouts.base')

@section('content')
    <div class="container-fluid dashboard-menu">
        <div class="row min-vh-100 flex-column flex-md-row">
            <aside class="col-12 col-md-2 p-0 bg-light flex-shrink-1">
                <nav class="navbar navbar-expand bg-light flex-md-column flex-row align-items-center py-2">
                    <div class="collapse navbar-collapse ">
                        <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-around" data-aos="fade-up">
                            <li class="nav-item">
                                <a class="nav-link p-0 text-center" href="#"><img src="{{ asset('img/icons/profile.svg') }}">
                                    <span class="d-none d-md-inline">{{ __('Perfil') }}</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-0 text-center" href="#"><img src="{{ asset('img/icons/like.svg') }}">
                                    <span class="d-none d-md-inline">En seguiment</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-0 text-center" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                            document.getElementById('logout-form').submit();"><img
                                        src="{{ asset('img/icons/close.svg') }}">
                                    <span class="d-none d-md-inline">{{ __('Logout') }}</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>
        </div>
    </div>
    <div class="container dashboard">
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
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
