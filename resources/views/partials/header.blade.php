<header id="header">
    <div class="container d-flex justify-content-center">
        <div id="logo" class="pull-left">
            <a href="{{ url('/') }}" class="scrollto"><img src="{{ asset('img/logo.png') }}" alt=""
                    title="Coolture Logo"></a>
        </div>
        <div id="logo2" class="pull-left">
            <a href="{{ url('/') }}" class="scrollto"><img src="{{ asset('img/favicon.png') }}" alt=""
                    title="Coolture Logo"></a>
        </div>

        <nav class="ml-lg-5 ml-md-3 w-100">
            <ul class="nav-menu">
                <li class="search">
                    <form id="searcher" method="" action="">
                        <div class="input-group mb-4 border rounded-pill p-1">
                            <div class="input-group-prepend border-0">
                                <button id="btn-search" type="button" class="btn btn-link color-corp"><i
                                        class="fa fa-search"></i></button>
                            </div>
                            <input type="search" placeholder="Buscar" aria-describedby="btn-search"
                                class="form-control bg-none border-0">
                        </div>
                    </form>
                </li>

                <li>
                    <div class="dropdown">
                        <button id="btn-language" class="btn" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Tria l'idioma">
                            <img src="{{ asset('img/flags/ca_round.png') }}">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right language">
                            <a class="dropdown-item" href="#fr"><img src="{{ asset('img/flags/es.png') }}">
                                Castellà</a>
                            <a class="dropdown-item" href="#it"><img src="{{ asset('img/flags/en.png') }}">
                                Anglès</a>
                        </div>
                    </div>
                </li>

                @guest
                    <li class="btn-login">
                        <a href="#" data-toggle="modal" data-target="#modalRegisterCenter">
                            <p>Registra't o inicia sessió</p>
                            <i class="fa fa-user-o"></i>
                        </a>
                    </li>
                @else
                    <li class="nav-item user-profile">
                        <a class="nav-link p-0" href="{{ route('home') }}">
                            <img class="user-profile-pic" src="{{ Auth::user()->picture }}" alt="">
                            <span class="ml-2">{{ Auth::user()->name }}</span>
                        </a>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
</header>

@guest
    <div class="modal fade" id="modalRegisterCenter" tabindex="-1" role="dialog" aria-labelledby="modalRegisterCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="mt-4 mb-1">Benvingut a Coolture</h2>
                    <p>Registra't o inicia sessió</p>
                    <div class="mt-5 mb-5">
                        <a class="nav-link" href="{{ route('login') }}">Inicia sessió</a>
                        <span class="login-separator"></span>
                        <a class="nav-link" href="{{ route('register') }}">Registra't</a>
                    </div>
                    <div class="login-terms">
                        <p class="mb-1">Registrant-te acceptes les nostres</p>
                        <p><a href="/toc" rel="nofollow" target="_blank">Condicions d'ús</a>&nbsp;i&nbsp;<a href="/priv"
                                rel="nofollow" target="_blank">Política de privacitat</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endguest
