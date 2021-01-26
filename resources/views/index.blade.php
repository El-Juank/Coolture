@extends('layouts.base')

@section('seoTitle')
    | {{ __('lang.home_seo_title') }}
@endsection

@section('content')
    <section id="intro">
        <div class="intro-container" data-aos="zoom-in" data-aos-delay="100">
            <h1 class="mb-4 pb-0 mb-5">{{ __('lang.home_intro') }}</h1>
            <div class="col-md-10 col-md-offset-1">
                <div id="gendersCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                    <?php $first=true;?>
                    @foreach($categories as $category)
                        <div class="carousel-item @if($first) active @endif ">
                         <?php $first=false; ?>

                            <div class="col-lg-2 col-6">
                                <a href="{{route('categorySearch',['category'=>$category->id])}}">
                                    <img class="img-fluid genre-icon" src="{{ asset($category->Icon->Url()) }}">
                                    <h3 class="text-white">{{$category->GetName()}}</h3>
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <a class="carousel-control-prev w-auto" href="#gendersCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next w-auto" href="#gendersCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
                <a href="{{ route('search_result' ) }}" class="about-btn scrollto mt-4">{{__('lang.home_see_all')}}</a>
            </div>

        </div>
    </section>

    <main id="main">

        {{-- Esdeveniments destacats --}}
        <section id="featured-genders">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>{{ __('lang.home_featured_events') }}</h2>
                    <p>{{ __('lang.home_featured_events_tagline') }}</p>
                </div>
                <div class="row">
                @foreach($events as $event)
                    <a href="{{route('event',['event'=>$event->id])}}">
                        <div class="col-lg-3">
                            <div class="gender" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset($event->ImgPreview->Url()) }}"  class="img-fluid">
                                <div class="details">
                                    <h3><a href="{{route('event',['event'=>$event->id])}}">{{$event->EventMaker->GetName()}}</a></h3>
                                    <p>{{$event->GetTitle()}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                </div>
            </div>
        </section>

        {{-- Rumors destacats --}}
        <section id="featured-genders" class="section-with-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>{{ __('lang.home_featured_rumours') }}</h2>
                    <p>{{ __('lang.home_featured_rumours_tagline') }}</p>
                </div>

                <div class="row">
                @foreach($rumours as $rumour)
                    <a href="{{route('rumour',['rumour'=>$rumour->id])}}">
                        <div class="col-lg-3">
                            <div class="gender" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset($rumour->ImgPreview->Url()) }}"  class="img-fluid">
                                <div class="details">
                                    <h3><a href="{{route('rumour',['rumour'=>$rumour->id])}}">@if($rumour->HasEventMaker()){{$rumour->EventMaker->GetName()}} @else ? @endif</a></h3>
                                    <p>{{$rumour->GetTitle()}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                </div>
            </div>
        </section>

        {{-- Artistes destacats --}}
        <section id="featured-genders">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>{{ __('lang.home_featured_eventmakers') }}</h2>
                    <p>{{ __('lang.home_featured_eventmakers_tagline') }}</p>
                </div>
                <div class="row">
                @foreach($eventmakers as $eventmaker)
                    <a href="{{route('eventmaker',['eventmaker'=>$eventmaker->id])}}">
                        <div class="col-lg-3">
                            <div class="gender" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset($eventmaker->ImgProfile->Url()) }}" class="img-fluid">
                                <div class="details">
                                    <h3><a href="{{route('eventmaker',['eventmaker'=>$eventmaker->id])}}">{{$eventmaker->GetName()}}</a></h3>
                                     <p>{{ \Illuminate\Support\Str::limit($eventmaker->GetDescription(), 100, $end = '...') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                </div>
            </div>
        </section>

    </main>

@endsection
