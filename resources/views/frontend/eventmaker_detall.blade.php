@extends('layouts.base')

@section('seoTitle')
    | {{ $eventmaker->Name }}
@endsection

@section('content')
    <div class="container generic-container" data-aos="fade-up">
        {{-- Informació EVENTMAKER --}}
        <div class="row">
            <div class="col-12 ml-auto mr-auto text-center">
                <img src="" alt="Circle Image" class="img-circle p-0 img-responsive"
                    onerror="this.onerror=null;this.src='{{ asset('img/default/user-image-not-available.png') }}';">
            </div>
            <div class="col-12 ml-auto mr-auto text-center">
                <div class="section-header">
                    <h2>{{ $eventmaker->Name }}</h2>
                </div>
            </div>

            {{-- Descripció --}}
            <div class="col-md-6 ml-auto mr-auto text-center">
                <p>{{ $eventmaker->Description }}</p>
            </div>

            {{-- Seguidors --}}
            <div class="col-12 ml-auto mr-auto text-center">
                <strong>{{ count($eventmaker->Followers) }}</strong>
                <p><strong>Followers</strong></p>
            </div>

            {{-- BOTÓ DE FOLLOW --}}
            <div class="col-6 d-flex flex-row-reverse mb-5">
                <form action="{{ route('follow', ['eventmaker' => $eventmaker->id]) }}" method="post">
                    @csrf
                    <input type="submit" value="Follow" class="btn btn-coolture">
                </form>
            </div>

            {{-- BOTÓ DE UNFOLLOW --}}
            <div class="col-6 d-flex flex-row mb-5">
                <form action="{{ route('unfollow', ['eventmaker' => $eventmaker->id]) }}" method="post">
                    @csrf
                    <input type="submit" value="Unfollow" class="btn btn-coolture">
                </form>
            </div>
        </div>

        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#events" role="tab">{{ __('lang.events') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#rumours" role="tab">{{ __('lang.rumours') }}</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content card">
            {{-- Esdeveniments de l'artista --}}
            <div class="tab-pane fade show active text-center" id="events" role="tabpanel">
                <section id="results">
                    <div class="container" data-aos="fade-up">
                        <div class="row justify-content-center">
                            @foreach ($eventmaker->Events as $event)
                                <a href="">
                                    <div class="col-lg-4">
                                        <div class="result" data-aos="fade-up" data-aos-delay="100">
                                            <img src="" alt="Rock" class="img-fluid"
                                                onerror="this.onerror=null;this.src='{{ asset('img/default/image-not-available.png') }}';">
                                            <div class="details">
                                                <h3><a
                                                        href="{{ route('event', ['event' => $event->id]) }}">{{ $event->Title }}</a>
                                                </h3>
                                                {{-- Per limitar la mida dels
                                                textos
                                                --}}
                                                <p>{{ \Illuminate\Support\Str::limit($event->Description, 100, $end = '...') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>

            {{-- Rumors de l'artista --}}
            <div class="tab-pane fade text-center" id="rumours" role="tabpanel">
                <section id="results">
                    <div class="container" data-aos="fade-up">
                        <div class="row justify-content-center">
                            @foreach ($eventmaker->Rumours as $rumour)
                                <a href="">
                                    <div class="col-lg-4">
                                        <div class="result" data-aos="fade-up" data-aos-delay="100">
                                            <img src="" alt="" class="img-fluid"
                                                onerror="this.onerror=null;this.src='{{ asset('img/default/image-not-available.png') }}';">
                                            <div class="details">
                                                <h3><a
                                                        href="{{ route('rumour', ['rumour' => $rumour->id]) }}">{{ $rumour->Title }}</a>
                                                </h3>
                                                {{-- Per limitar la mida dels
                                                textos
                                                --}}
                                                <p>{{ \Illuminate\Support\Str::limit($rumour->Description, 100, $end = '...') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        setTimeout(function() {
            $("#header").addClass("header-fixed");
        }, 1);

    </script>
@endsection
