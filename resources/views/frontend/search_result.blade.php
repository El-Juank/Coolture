@extends('layouts.base')

@section('seoTitle')
    | {{ __('lang.search_result') }}
@endsection

@section('content')

    <main id="main">
        <section id="results">
            <div class="container container-results" data-aos="fade-up">
                <div class="row justify-content-center">
                    @foreach ($results as $result)
                        <a href="">
                            <div class="col-lg-4">
                                <div class="result" data-aos="fade-up" data-aos-delay="100">
                                    <img src="" alt="Rock" class="img-fluid"
                                        onerror="this.onerror=null;this.src='{{ asset('img/image-not-available.png') }}';">
                                    <div class="details">
                                        <h3><a href="{{ route('event', ['event' => $result->id]) }}">{{ $result->Title }}</a>
                                        </h3>
                                        {{-- Per limitar la mida dels textos
                                        --}}
                                        <p>{{ \Illuminate\Support\Str::limit($result->Description, 100, $end = '...') }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
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
