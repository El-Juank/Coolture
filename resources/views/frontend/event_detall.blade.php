@extends('layouts.base')

@section('seoTitle')
    | {{ $event->Title }}
@endsection

@section('content')
    <main id="main" class="main-page">
        <section id="event-details">
            <div class="container mb-5" data-aos="fade-up">
                <div class="section-header">
                    <h2>{{ $event->Title }}</h2>
                    <p>{{ $event->EventMaker->Name }}</p>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-lg-1 mb-5">
                        <img src="{{--{{ asset($event->ImgEvent->Url()) }}--}}"
                            alt="{{ $event->Title }}" class="img-fluid"
                            onerror="this.onerror=null;this.src='{{ asset('img/image-not-available.png') }}';">
                    </div>

                    <div class="col-md-6">
                        <div class="details">
                            <p>{{ $event->Description }}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item borderless">
                                    <i class="fa fa-map-marker"></i>
                                    @if (isset($city->error))
                                        Localitat no disponible
                                    @else
                                        {{$city->display_name}}
                                    @endif
                                </li>
                                <li class="list-group-item borderless">
                                    <i class="fa fa-calendar"></i>
                                    {{ $event->InitDate }}
                                </li>
                                <li class="list-group-item borderless">
                                    <i class="fa fa-clock-o"></i>
                                    {{ $event->Duration }}
                                </li>
                                {{--<li class="list-group-item borderless">
                                    {{ $event->Published }}
                                </li>--}}
                            </ul>
                            {{--{{ $event->Location->Lat }}
                            {{ $event->Location->Lon }}--}}
                            {{-- LIKES TOTALS A L'EVENT --}}
                            <i class="fa fa-thumbs-o-up"></i>
                            {{ $likes }}
                        </div>
                    </div>
                </div>
            </div>

            <section class="content-item" id="comments">
                <div class="container">
                    <div class="row">
                        {{-- FORMULARI PER CREAR MISSATGE DE
                        L'EVENT--}}
                        {{-- Cal posar la caixa amb els errors--}}
                        <div class="col-12">
                            <form action="{{ route('eventmessage', ['event' => $event->id]) }}" method="post">
                                @csrf
                                <h3 class="pull-left">{{ __('lang.new_comment') }}</h3>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-3 col-lg-2 hidden-xs">
                                            <img class="user-img" src="" alt=""
                                                onerror="this.onerror=null;this.src='{{ asset('img/user-image-not-available.png') }}';">
                                        </div>
                                        <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                            <textarea name="eventmessage_text" id="eventmessage_text"
                                                class="@error('eventmessage_text') is-invalid @enderror form-control"
                                                placeholder="{{ __('lang.comment_placeholder') }}" required=""></textarea>
                                        </div>
                                    </div>
                                    <input type="submit" value="{{ __('lang.post_comment') }}"
                                        class="btn btn-coolture pull-right">
                                </fieldset>
                            </form>

                            <h3>{{ $messages->count() }} {{ __('lang.event_comments') }}</h3>

                            {{-- MOSTRA MISSATGES DE L'EVENT --}}
                            @forelse ($messages as $message)
                                <div class="media">
                                    <a class="pull-left" href="#"><img class="media-object" src="" alt=""
                                            onerror="this.onerror=null;this.src='{{ asset('img/user-image-not-available.png') }}';"></a>
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
