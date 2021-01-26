{{-- Fa quan s'ha publicat --}}
{{--{{ $rumour->created_at->diffForHumans() }}--}}

{{-- Artista --}}
{{--{{ $rumour->EventMaker->name }}--}}

{{-- No se si ho farem servir però és descripció de l'artista de que va el rumor
--}}
{{--{{ $rumour->EventMaker->Description }}--}}

{{-- Nivell de confiança que té en el rumor aquell usuari que el publica (0-100%)
--}}
{{--{{ $rumour->OwnTrust }}--}}

@extends('layouts.base')

@section('seoTitle')
    | {{ $rumour->GetTitle() }}
@endsection

@section('content')
    <main id="main" class="main-page">
        <section id="event-details">
            <div class="container mb-5" data-aos="fade-up">
                {{-- INFORMACIÓ SOBRE EL RUMOR --}}
                <div class="section-header text-center">
                    <h2>{{ $rumour->GetTitle() }}</h2>
                    {{-- User que ha publicat el rumor --}}
                    <a href="{{ route('eventmaker', ['eventmaker' => $rumour->EventMaker->id]) }}">
                        <p>{{ $rumour->EventMaker->GetName() }}</p>
                    </a>
                    <p>{{ $rumour->User->name }}</p>
                     @auth
                        @if ($rumour->IsNotified(Auth::user()))
                            <form action="{{ route('rumour_unNotify', ['rumour' => $rumour->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-coolture">
                                    <i class="fa fa-bell-slash"></i>
                                    Desactivar notificacions
                                </button>
                            </form>
                        @else
                            <form action="{{ route('rumour_notify', ['rumour' => $rumour->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-coolture">
                                    <i class="fa fa-bell"></i>
                                    Activar notificacions
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>

                <div class="row">
                    <div class="col-md-6 mb-lg-1 mb-5">
                        <img alt="{{ $rumour->GetTitle() }}" class="img-fluid"
                            src='{{ asset(App\File::ImgRumourDetail()->Url()) }}'>
                    </div>

                    <div class="col-md-6">
                        <div class="details">
                            <p>{{ $rumour->GetDescription() }}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item borderless">
                                    <i class="fa fa-map-marker"></i>
                                    Els rumours no tenen CITY ni dates... però cal posar funcionalitat de confirmar o algo
                                    així...?
                                    {{-- @if (isset($city->error))
                                        Localitat no disponible
                                        @else
                                        {{ $city->display_name }}
                                    @endif --}}
                                </li>
                                <li class="list-group-item borderless">
                                    <i class="fa fa-calendar"></i>
                                    {{ $rumour->InitDate }}
                                </li>
                                <li class="list-group-item borderless">
                                    <i class="fa fa-clock-o"></i>
                                    {{ $rumour->Duration }}
                                </li>
                                {{--<li class="list-group-item borderless">
                                    {{ $rumour->Published }}
                                </li>--}}
                            </ul>
                            {{--{{ $rumour->Location->Lat }}
                            {{ $rumour->Location->Lon }}--}}

                            {{-- LIKES TOTALS A L'RUMOUR + BOTO DE DONAR LIKE
                            --}}
                            <div class="pull-right pt-lg-5 h2">
                                @auth
                                    @if ($rumour->HasLike(Auth::user()))
                                        <form action="{{ route('rumour_unlike', ['rumour' => $rumour->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-coolture">
                                                <i class="fa fa-thumbs-o-down"></i>
                                                {{ $likes }}
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('rumour_like', ['rumour' => $rumour->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-coolture">
                                                <i class="fa fa-thumbs-o-up"></i>
                                                {{ $likes }}
                                            </button>
                                        </form>
                                    @endif
                                @endauth

                                @guest
                                    <a class="btn btn-coolture" href="#" data-toggle="modal"
                                        data-target="#modalRegisterCenter"><i class="fa fa-thumbs-o-up"
                                            style="color: #fff !important;"></i>{{ $likes }}</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content-item" id="comments">
                <div class="container">
                    <div class="row">

                        {{-- FORMULARI PER CREAR MISSATGE DEL
                        RUMOUR--}}
                        {{-- Cal posar la caixa amb els errors--}}
                        <div class="col-12">
                            @auth
                                <form action="{{ route('rumourmessage', ['rumour' => $rumour->id]) }}" method="post">
                                    @csrf
                                    <h3 class="pull-left">{{ __('lang.new_comment') }}</h3>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-sm-3 col-lg-2 hidden-xs">
                                                <img class="user-img" alt=""
                                                    src='{{ asset(Auth::user()->ImgProfile->Url()) }}'>
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                                <textarea name="rumourmessage_text" id="rumourmessage_text"
                                                    class="@error('rumourmessage_text') is-invalid @enderror form-control"
                                                    placeholder="{{ __('lang.comment_placeholder') }}" required=""></textarea>
                                            </div>
                                        </div>
                                        <input type="submit" value="{{ __('lang.post_comment') }}"
                                            class="btn btn-coolture pull-right">
                                    </fieldset>
                                </form>
                            @endauth

                            @guest
                                <div class="mt-5 mb-5 text-center">
                                    <div class="card pt-3 pb-3 d-flex align-items-center" style="background-color: #f6f7fd;">
                                        <p class="pt-5 pb-4"><a href="{{ LaravelLocalization::localizeUrl('register') }}"
                                                class="link">{{ __('lang.header_register') }}</a>
                                            {{ __('lang.or') }} <a href="{{ LaravelLocalization::localizeUrl('login') }}"
                                                class="link">{{ __('lang.header_login') }}</a>
                                            {{ __('lang.to_leave_comment') }}
                                        </p>
                                    </div>
                                </div>
                            @endguest

                            <h3>{{ $messages->count() }} {{ __('lang.event_comments') }}</h3>

                            {{-- MISSATGES DEL RUMOR --}}

                            {{-- Si està logejat mostra'ls
                            tots--}}
                            @auth
                            <?php $mgs=$messages; ?>
                            @endauth
                            @guest
                             <?php $mgs=$messages->take(3); ?>
                            @endguest
                            @forelse ($mgs as $message)
                                <div class="media">

                                    <a class="pull-left" href="#"><img class="media-object"  alt=""
                                           src='{{ asset($message->User->ImgProfile->Url()) }}'></a>

                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $message->User->name }}
                                        </h4>
                                        <p>{{ $message->GetMessage() }}</p>
                                        <ul class="list-unstyled list-inline media-detail pull-left">
                                            <li><i class="fa fa-calendar"></i>{{ $message->created_at->diffForHumans() }}</li>
                                            {{--<li><i class="fa fa-thumbs-up"></i></li>
                                            --}}
                                        </ul>
                                        {{--<ul
                                            class="list-unstyled list-inline media-detail pull-right">
                                            <li class=""><a href="">Like</a></li>
                                        </ul>--}}
                                    </div>
                                </div>
                            @empty
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <p>{{ __('lang.empty_comments') }}</p>
                                    </div>
                                </div>
                            @endforelse
                            @guest
                                @if ($messages->count() >= 3)
                                    <div class="mt-5 mb-5 text-center">
                                        <div class="card pt-3 pb-3 d-flex align-items-center"
                                            style="background-color: #f6f7fd;">
                                            <p class="pt-5 pb-4"><a href="{{ LaravelLocalization::localizeUrl('register') }}"
                                                    class="link">{{ __('lang.header_register') }}</a>
                                                {{ __('lang.or') }} <a href="{{ LaravelLocalization::localizeUrl('login') }}"
                                                    class="link">{{ __('lang.header_login') }}</a>
                                                {{ __('lang.to_see_comments') }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endguest
                        </div>
                    </div>
                </div>
            </section>

        </section>
    </main>

    <script type="text/javascript">
        setTimeout(function() {
            $("#header").addClass("header-fixed");
        }, 1);

    </script>
@endsection
