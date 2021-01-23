ELEMENTS DEL RUMOR
<br>
<br>
<br>
<br>
<br>
{{-- INFORMACIÓ SOBRE EL RUMOR --}}
{{$rumour->Title}}
{{$rumour->Description}}
{{$rumour->created_at->diffForHumans()}}

{{-- User que ha publicat el rumor --}}
{{$rumour->User->name}}

{{-- Artista --}}
{{$rumour->EventMaker->name}}

{{-- No se si ho farem servir però és descripció de l'artista de que va el rumor --}}
{{$rumour->EventMaker->Description}}

{{-- Nivell de confiança que té en el rumor aquell usuari que el publica (0-100%) --}}
{{$rumour->OwnTrust}}





@extends('layouts.base')

@section('seoTitle')
    | {{ $rumour->Title }}
@endsection

@section('content')
    <main id="main" class="main-page">
        <section id="event-details">
            <div class="container mb-5" data-aos="fade-up">
                <div class="section-header">
                    <h2>{{ $rumour->Title }}</h2>
                    <p>{{ $rumour->EventMaker->Name }}</p>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-lg-1 mb-5">
                        <img src="{{--{{ asset($rumour->ImgEvent->Url()) }}--}}"
                            alt="{{ $rumour->Title }}" class="img-fluid"
                            onerror="this.onerror=null;this.src='{{ asset('img/default/image-not-available.png') }}';">
                    </div>

                    <div class="col-md-6">
                        <div class="details">
                            <p>{{ $rumour->Description }}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item borderless">
                                    <i class="fa fa-map-marker"></i>
                                    Els rumours no tenen CITY ni dates... però cal posar funcionalitat de confirmar o algo així...?
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

                            {{-- LIKES TOTALS A L'RUMOUR + BOTO DE DONAR LIKE --}}
                            <div class="pull-right h2">
                                @if ($rumour->HasLike(Auth::user()))
                                    <form action="{{route('rumour_unlike', ['rumour' => $rumour->id])}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn">
                                            <i class="fa fa-thumbs-o-up"></i>
                                            {{ $likes }}
                                        </button>
                                    </form>
                                @else
                                    <form action="{{route('rumour_like', ['rumour' => $rumour->id])}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn">
                                            <i class="fa fa-thumbs-o-up"></i>
                                            {{ $likes }}
                                        </button>
                                    </form>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <section class="content-item" id="comments">
                <div class="container">
                    <div class="row">

                        {{-- FORMULARI PER CREAR MISSATGE DEL RUMOUR--}}
                        {{-- Cal posar la caixa amb els errors--}}
                        <div class="col-12">
                            <form action="{{ route('rumourmessage', ['rumour' => $rumour->id]) }}" method="post">
                                @csrf
                                <h3 class="pull-left">{{ __('lang.new_comment') }}</h3>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-3 col-lg-2 hidden-xs">
                                            <img class="user-img" src="" alt=""
                                                onerror="this.onerror=null;this.src='{{ asset('img/default/user-image-not-available.png') }}';">
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

                            <h3>{{ $messages->count() }} {{ __('lang.rumour_comments') }}</h3>

                            {{-- MOSTRA MISSATGES DE L'rumour --}}
                            @forelse ($messages as $message)
                                <div class="media">
                                    <a class="pull-left" href="#"><img class="media-object" src="" alt=""
                                            onerror="this.onerror=null;this.src='{{ asset('img/default/user-image-not-available.png') }}';"></a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $message->User->name }}
                                        </h4>
                                        <p>{{ $message->Message }}</p>
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
