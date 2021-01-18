<div class="container-fluid dashboard-menu">
    <div class="row min-vh-100 flex-column flex-md-row">
        <aside class="col-12 col-md-2 p-0 bg-light flex-shrink-1">
            <nav class="navbar navbar-expand bg-light flex-md-column flex-row align-items-center py-2">
                <div class="collapse navbar-collapse ">
                    <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-around" data-aos="fade-up">
                        <!-- Enllaç per editar el perfil mitjançant id tret del "Auth::user" -->
                        <li class="nav-item">
                            <a class="nav-link p-0 text-center"
                                href="{{ route('profile.edit', [Auth::user()->id]) }}"><img
                                    src="{{ asset('img/icons/profile.svg') }}">
                                <span class="d-none d-md-inline">{{ __('lang.dash_profile') }}</span></a>
                        </li>
                        <!-- Enllaç per veure els posts que ha fet l'usuari -->
                        <li class="nav-item">
                            <a class="nav-link p-0 text-center" href="{{ route('home') }}"><img
                                    src="{{ asset('img/icons/posts.svg') }}">
                                <span class="d-none d-md-inline">{{ __('lang.dash_posts') }}</span></a>
                        </li>
                        <!-- Enllaç per veure els posts en seguiment -->
                        <li class="nav-item">
                            <a class="nav-link p-0 text-center"
                                href="{{ route('following', ['id' => Auth::user()->id]) }}"><img
                                    src="{{ asset('img/icons/like.svg') }}">
                                <span class="d-none d-md-inline">{{ __('lang.dash_following') }}</span></a>
                        </li>

                        <!-- Comprovació si l'usuari te permisos i, si en te, quin rol té -->
                        @if (Auth::user()->IsAdmin())
                            <!-- Enllaç per administrar els gèneres -->
                            <li class="nav-item">
                                <a class="nav-link p-0 text-center" href="{{ route('categories.index') }}"><img
                                        src="{{ asset('img/icons/genders.svg') }}">
                                    <span class="d-none d-md-inline">{{ __('lang.dash_genders') }}</span></a>
                            </li>
                            <!-- Enllaç per administrar els Esdeveniments -->
                            <li class="nav-item">
                                <a class="nav-link p-0 text-center" href="{{ route('events.index') }}"><img
                                        src="{{ asset('img/icons/icon.svg') }}">
                                    <span class="d-none d-md-inline">{{ __('lang.dash_events') }}</span></a>
                            </li>
                            <!-- Enllaç per administrar els Usuaris -->
                            <li class="nav-item">
                                <a class="nav-link p-0 text-center" href="{{ route('users.index') }}"><img
                                        src="{{ asset('img/icons/users.svg') }}">
                                    <span class="d-none d-md-inline">{{ __('lang.dash_users') }}</span></a>
                            </li>
                        @endif

                        <!-- Enllaç per tancar la sessió -->
                        <li class="nav-item">
                            <a class="nav-link p-0 text-center" href="{{ LaravelLocalization::localizeUrl('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <img src="{{ asset('img/icons/close.svg') }}">
                                <span class="d-none d-md-inline">{{ __('lang.logout') }}</span></a>
                            <form id="logout-form" action="{{ LaravelLocalization::localizeUrl('logout') }}"
                                method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
    </div>
</div>
@if (Auth::user()->IsAdmin())
    <script type="text/javascript">
        setTimeout(function() {
            $(".nav-item").css("padding-top", "0px");
            $(window).resize(function() {
                if (window.matchMedia('(max-width: 767px)').matches) {
                    $(".nav-item").css("padding-bottom", "40px");
                } else {
                    $(".nav-item").css("padding-bottom", "90px");
                }
            });
        }, 1);

    </script>
@endif
