<!-- ======= Header ======= -->
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <a href="{{ url('/') }}" class="scrollto"><img src="{{ asset('img/logo.png') }}" alt=""
                    title="Coolture Logo"></a>
        </div>

        <nav>
            <ul class="nav-menu">
                <li>
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
                        <div class="dropdown-menu dropdown-menu-right text-right language">
                            <a class="dropdown-item" href="#fr"><img src="{{ asset('img/flags/es.png') }}"> Castellà</a>
                            <a class="dropdown-item" href="#it"><img src="{{ asset('img/flags/en.png') }}"> Anglès</a>
                        </div>
                    </div>
                </li>
                <li class="btn-login"><a href="">Registra't o inicia sessió</a></li>
            </ul>
        </nav>
    </div>
</header>
