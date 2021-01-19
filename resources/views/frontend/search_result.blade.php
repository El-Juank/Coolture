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
                                    <img src="{{ asset('img/gender/1.jpg') }}" alt="Rock" class="img-fluid">
                                    <div class="details">
                                        <h3><a href="">{{ $result->Title }}</a></h3>
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
