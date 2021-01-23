@extends('layouts.base')

@section('seoTitle')
    | {{ __('lang.about_title') }}
@endsection

@section('content')
    <section id="about-us">
        <div class="container generic-container" data-aos="fade-up">
            <div class="section-header">
                <h2>{{ __('lang.about_title') }}</h2>
            </div>
            <p><strong>{{ __('lang.about_tagline') }}</strong></p>
            <p>{{ __('lang.about_text') }}</p>
            <p><strong>{{ __('lang.contact') }}</strong></p>
            <p>Coolture Technologies, S.L.<br>

                {{ __('lang.address') }}: Carrer Migdia, 40, 1, 2, 17002 Girona <br>

                <a href="mailto:info@coolture.com" class="link">info@coolture.com</a>
            </p>
        </div>
    </section>

    <script type="text/javascript">
        setTimeout(function() {
            $("#header").addClass("header-fixed");
        }, 1);

    </script>
@endsection
