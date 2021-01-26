@extends('layouts.base')

@section('seoTitle')
    | {{ __('lang.search_result') }}
@endsection

@section('content')

    <main id="main">
        <section id="results">
            {{-- Resultats de la cerca --}}
            <div class="container container-results " data-aos="fade-up">
                {{-- Botons de filtrar la cerca --}}
                <ul class="nav nav-pills mb-3 justify-content-around" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                            aria-controls="pills-home" aria-selected="true">{{ __('lang.events') }} <span
                                class="badge badge-dark"> {{ count($events) }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                            aria-controls="pills-profile" aria-selected="false">{{ __('lang.rumours') }} <span
                                class="badge badge-dark"> {{ count($rumours) }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                            aria-controls="pills-contact" aria-selected="false">{{ __('lang.artists') }} <span
                                class="badge badge-dark"> {{ count($eventmakers) }}</span></a>
                    </li>
                </ul>
                {{-- Resultats de filtrar la cerca --}}
                <div class="tab-content" id="pills-tabContent">
                    {{-- Esdeveniments --}}
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row justify-content-center">
                            @forelse ($events as $eventTransition)
                                <a href="">
                                    <div class="col-lg-4">
                                        <div class="result" data-aos="fade-up" data-aos-delay="100">
                                            <img src="{{ asset($eventTransition->ImgPreview->Url()) }}"
                                                class="img-fluid">
                                            <div class="details">
                                                <h3><a
                                                        href="{{ route('event', ['event' => $eventTransition->id]) }}">{{ $eventTransition->GetTitle() }}</a>
                                                </h3>
                                                {{-- Per limitar la mida dels textos
                                                --}}
                                                <p>{{ \Illuminate\Support\Str::limit($eventTransition->GetDescription(), 100, $end = '...') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="col-lg-3">
                                    <div class="result text-center mt-5" data-aos="fade-up" data-aos-delay="100">
                                        <img class="img-fluid w-50" src="{{ asset(App\File::ImgNotFound()->Url()) }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="result">
                                        <h3 class="text-center"> {{__('lang.search_no_results')}}</h3>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    {{-- Rumours --}}
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="row justify-content-center">
                                @forelse ($rumours as $rumourTranslation)
                                    <a href="">
                                        <div class="col-lg-4">
                                            <div class="result" data-aos="fade-up" data-aos-delay="100">
                                                <img src="{{ $rumourTranslation->ImgPreview->Url() }}"
                                                    class="img-fluid">
                                                <div class="details">
                                                    <h3><a
                                                            href="{{ route('rumour', ['rumour' => $rumourTranslation->id]) }}">{{ $rumourTranslation->GetTitle() }}</a>
                                                    </h3>
                                                    {{-- Per limitar la mida dels textos
                                                    --}}
                                                    <p>{{ \Illuminate\Support\Str::limit($rumourTranslation->GetDescription(), 100, $end = '...') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="col-lg-3">
                                        <div class="result text-center mt-5" data-aos="fade-up" data-aos-delay="100">
                                            <img class="img-fluid w-50" src="{{ asset(App\File::ImgNotFound()->Url()) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="result">
                                            <h3 class="text-center">{{ __('lang.search_no_results') }}</h3>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    {{-- Artistes --}}
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="row justify-content-center">
                                @forelse ($eventmakers as $eventmakerTranslation)
                                    <a href="">
                                        <div class="col-lg-4">
                                            <div class="result" data-aos="fade-up" data-aos-delay="100">
                                                <img src="{{ asset($eventmakerTranslation->ImgProfile->Url()) }}"
                                                    alt="Rock" class="img-fluid">
                                                <div class="details">
                                                    <h3><a
                                                            href="{{ route('eventmaker', ['eventmaker' => $eventmakerTranslation->id]) }}">{{ $eventmakerTranslation->GetName() }}</a>
                                                    </h3>
                                                    {{-- Per limitar la mida dels textos
                                                    --}}
                                                    <p>{{ \Illuminate\Support\Str::limit($eventmakerTranslation->GetDescription(), 100, $end = '...') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="col-lg-3">
                                        <div class="result" data-aos="fade-up" data-aos-delay="100">
                                            <img class="img-fluid" src="{{ asset(App\File::ImgNotFound()->Url()) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="result">
                                            <h3 class="text-center">{{ __('lang.search_no_results') }}</h3>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </section>
    </main>

    <script type="text/javascript">
        setTimeout(function() {
            $("#header").addClass("header-fixed");
        }, 1);

    </script>
@endsection
