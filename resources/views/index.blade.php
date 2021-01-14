@extends('layouts.base')

@section('seoTitle')
    | Home
@endsection

@section('content')
    <section id="intro">
        <div class="intro-container" data-aos="zoom-in" data-aos-delay="100">
            <h1 class="mb-4 pb-0 mb-5">Què et ve de gust escoltar?</h1>

            <div class="col-md-10 col-md-offset-1">
                <div id="gendersCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                        <div class="carousel-item active">
                            <div class="col-lg-2 col-6">
                                <a href="">
                                    <img class="img-fluid" src="{{ asset('img/icons/icon.svg') }}">
                                    <h2>Rock</h2>
                                </a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-lg-2 col-6">
                                <a href="">
                                    <img class="img-fluid" src="{{ asset('img/icons/icon.svg') }}">
                                    <h2>Pop</h2>
                                </a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-lg-2 col-6">
                                <a href="">
                                    <img class="img-fluid" src="{{ asset('img/icons/icon.svg') }}">
                                    <h2>Indie</h2>
                                </a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-lg-2 col-6">
                                <a href="">
                                    <img class="img-fluid" src="{{ asset('img/icons/icon.svg') }}">
                                    <h2>Reggae</h2>
                                </a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-lg-2 col-6">
                                <a href="">
                                    <img class="img-fluid" src="{{ asset('img/icons/icon.svg') }}">
                                    <h2>Soul</h2>
                                </a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-lg-2 col-6">
                                <a href="">
                                    <img class="img-fluid" src="{{ asset('img/icons/icon.svg') }}">
                                    <h2>Jazz</h2>
                                </a>
                            </div>
                        </div>
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
            </div>

        </div>
    </section>

    <main id="main">
        <section id="featured-genders">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Gèneres destacats</h2>
                    <p>Els gèneres més escoltats del moment</p>
                </div>

                <div class="row">
                    <a href="">
                        <div class="col-lg-6">
                            <div class="speaker" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('img/gender/1.jpg') }}" alt="Speaker 1" class="img-fluid">
                                <div class="details">
                                    <h3><a href="speaker-details.html">Rock</a></h3>
                                    <p>Quas alias incidunt</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="col-lg-6">
                            <div class="speaker" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ asset('img/gender/2.jpg') }}" alt="Speaker 1" class="img-fluid">
                                <div class="details">
                                    <h3><a href="speaker-details.html">Pop</a></h3>
                                    <p>Consequuntur odio aut</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="col-lg-6">
                            <div class="speaker" data-aos="fade-up" data-aos-delay="300">
                                <img src="{{ asset('img/gender/3.jpg') }}" alt="Speaker 1" class="img-fluid">
                                <div class="details">
                                    <h3><a href="speaker-details.html">Indie</a></h3>
                                    <p>Fugiat laborum et</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="col-lg-6">
                            <div class="speaker" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('img/gender/4.jpg') }}" alt="Speaker 1" class="img-fluid">
                                <div class="details">
                                    <h3><a href="speaker-details.html">Electrònica</a></h3>
                                    <p>Debitis iure vero</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>


@endsection
