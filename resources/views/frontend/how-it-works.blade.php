@extends('layouts.base')

@section('seoTitle')
    | {{ __('lang.how_it_works_title') }}
@endsection

@section('content')
    <section id="faq">

        <div class="container generic-container" data-aos="fade-up">

            <div class="section-header">
                <h2>{{ __('lang.how_it_works_title') }}</h2>
            </div>

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-9">
                    <ul id="faq-list">

                        <li>
                            <a data-toggle="collapse" class="collapsed" href="#faq1">{{ __('lang.faq1') }}<i
                                    class="fa fa-minus-circle"></i></a>
                            <div id="faq1" class="collapse" data-parent="#faq-list">
                                <p>{{ __('lang.faq1_answer') }}</p>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#faq2" class="collapsed">{{ __('lang.faq2') }}<i
                                    class="fa fa-minus-circle"></i></a>
                            <div id="faq2" class="collapse" data-parent="#faq-list">
                                <p>{{ __('lang.faq2_answer') }}</p>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#faq3" class="collapsed">{{ __('lang.faq3') }}<i
                                    class="fa fa-minus-circle"></i></a>
                            <div id="faq3" class="collapse" data-parent="#faq-list">
                                <p>{{ __('lang.faq3_answer') }}<a href="{{ route('privacy_policy') }}"
                                        class="inner-link">{{ __('lang.privacy_policy_title') }}</a>.</p>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#faq4" class="collapsed">{{ __('lang.faq4') }}<i
                                    class="fa fa-minus-circle"></i></a>
                            <div id="faq4" class="collapse" data-parent="#faq-list">
                                <p>{{ __('lang.faq4_answer') }}</p>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#faq5" class="collapsed">{{ __('lang.faq5') }}<i
                                    class="fa fa-minus-circle"></i></a>
                            <div id="faq5" class="collapse" data-parent="#faq-list">
                                <p>{{ __('lang.faq5_answer') }}</p>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#faq6" class="collapsed">{{ __('lang.faq6') }}<i
                                    class="fa fa-minus-circle"></i></a>
                            <div id="faq6" class="collapse" data-parent="#faq-list">
                                <p>{{ __('lang.faq6_answer') }}</p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </section>

    <script type="text/javascript">
        setTimeout(function() {
            $("#header").addClass("header-fixed");
        }, 1);

    </script>
@endsection
