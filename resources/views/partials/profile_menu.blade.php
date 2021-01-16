<div class="container-fluid dashboard-menu">
    <div class="row min-vh-100 flex-column flex-md-row">
        <aside class="col-12 col-md-2 p-0 bg-light flex-shrink-1">
            <nav class="navbar navbar-expand bg-light flex-md-column flex-row align-items-center py-2">
                <div class="collapse navbar-collapse ">
                    <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-around" data-aos="fade-up">
                        <li class="nav-item">
                            <!-- Enllaç per editar el perfil mitjançant id tret del "Auth::user" -->
                            <a class="nav-link p-0 text-center"
                                href="{{ route('profile.edit', [Auth::user()->id]) }}"><img
                                    src="{{ asset('img/icons/profile.svg') }}">
                                <span class="d-none d-md-inline">{{ __('lang.dash_profile') }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-0 text-center" href="#"><img src="{{ asset('img/icons/like.svg') }}">
                                <span class="d-none d-md-inline">{{ __('lang.dash_following') }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-0 text-center" href="{{ LaravelLocalization::localizeUrl('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                                document.getElementById('logout-form').submit();"><img
                                    src="{{ asset('img/icons/close.svg') }}">
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
