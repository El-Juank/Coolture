@extends('layouts.base')

@section('seoTitle')
    | {{ $eventmaker->GetName() }}
@endsection

@section('content')
    <div class="eventmaker-header" style="background-image:url('{{ asset($eventmaker->ImgCover->Url()) }}');">
    </div>
    <div class="container eventmaker-container" data-aos="fade-up">
        {{-- Informació EVENTMAKER --}}
        <div class="row">
            <div class="col-12 ml-auto mr-auto text-center">
                <img alt="Circle Image" class="img-circle p-0 img-outline"
                    src='{{ asset($eventmaker->ImgProfile->Url()) }} '>
            </div>
            <div class="col-12 ml-auto mr-auto text-center">
                <div class="section-header">
                    <h2>{{ $eventmaker->GetName() }}</h2>
                </div>
            </div>

            {{-- Descripció --}}
            <div class="col-md-6 ml-auto mr-auto text-center">
                <p>{{ $eventmaker->GetDescription() }}</p>
            </div>

            {{-- Seguidors --}}
            <div class="col-12 ml-auto mr-auto text-center">
                <strong>{{ count($eventmaker->Followers) }}</strong>
                <p><strong>{{ __('lang.followers') }}</strong></p>

                @auth
                    @if ($eventmaker->IsNotified(Auth::user()))
                        <form action="{{ route('eventmaker_unNotify', ['eventmaker' => $eventmaker->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-coolture">
                                <i class="fa fa-bell-slash"></i>
                                {{__('lang.deactive_notifications')}}
                            </button>
                        </form> <br>
                    @else
                        <form action="{{ route('eventmaker_notify', ['eventmaker' => $eventmaker->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-coolture">
                                <i class="fa fa-bell"></i>
                                  {{__('lang.active_notifications')}}
                            </button>
                        </form><br>
                    @endif

                    @if (Auth::user()->IsFollowing($eventmaker))
                        {{-- BOTÓ DE UNFOLLOW --}}
                        <div class="col-12 d-flex flex-row mb-5 justify-content-center">
                            <form action="{{ route('unfollow', ['eventmaker' => $eventmaker->id]) }}" method="post">
                                @csrf
                                <input type="submit" value="{{ __('lang.unfollow') }}" class="btn btn-coolture">
                            </form>
                        </div>
                    @else
                        {{-- BOTÓ DE FOLLOW --}}
                        <div class="col-12 d-flex flex-row-reverse mb-5 justify-content-center">
                            <form action="{{ route('follow', ['eventmaker' => $eventmaker->id]) }}" method="post">
                                @csrf
                                <input type="submit" value="{{ __('lang.follow') }}" class="btn btn-coolture">
                            </form>
                        </div>
                    @endif
                @endauth
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
                            @forelse ($eventmaker->Events as $event)
                                <a href="{{ route('event', ['event' => $event->id]) }}">
                                    <div class="col-lg-4 col-md-6 d-md-flex align-items-stretch">
                                        <div class="result bg-coolture" data-aos="fade-up" data-aos-delay="100">
                                            <img alt="Rock" class="img-fluid img-bg" src='{{ asset($event->ImgPreview->Url()) }} '>
                                            <div class="details">
                                                <h3><a href="{{ route('event', ['event' => $event->id]) }}">{{ \Illuminate\Support\Str::limit($event->GetTitle(), 25, $end = '...') }}</a>
                                                </h3>
                                                {{-- Per limitar la mida dels textos --}}
                                                <p>{{ \Illuminate\Support\Str::limit($event->GetDescription(), 40, $end = '...') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                <div class="col-lg-12">
                                    <div class="result">
                                        <h4 class="text-center pt-3"> {{ __('lang.no_events_yet') }}</h4>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </section>
            </div>

            {{-- Rumors de l'artista --}}
            <div class="tab-pane fade text-center" id="rumours" role="tabpanel">
                <section id="results">
                    <div class="container" data-aos="fade-up">
                        <div class="row justify-content-center">
                            @forelse($eventmaker->Rumours as $rumour)
                                <a href="{{ route('rumour', ['rumour' => $rumour->id]) }}">
                                    <div class="col-lg-4 col-md-6 d-md-flex align-items-stretch">
                                        <div class="result bg-coolture" data-aos="fade-up" data-aos-delay="100">
                                            <img alt="" class="img-fluid"
                                                src="{{asset($rumour->ImgPreview->Url())}}">
                                            <div class="details">
                                                <h3><a href="{{ route('rumour', ['rumour' => $rumour->id]) }}">{{ \Illuminate\Support\Str::limit($rumour->GetTitle(), 25, $end = '...') }}</a>
                                                </h3>
                                                {{-- Per limitar la mida dels textos --}}
                                                <p>{{ \Illuminate\Support\Str::limit($rumour->GetDescription(), 40, $end = '...') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                <div class="col-lg-12">
                                    <div class="result">
                                        <h4 class="text-center pt-3"> {{ __('lang.no_rumours_yet') }}</h4>
                                    </div>
                                </div>
                            @endforelse
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
