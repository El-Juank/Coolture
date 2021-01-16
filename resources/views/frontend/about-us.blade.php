@extends('layouts.base')

@section('seoTitle')
    | {{ __('lang.about_seo_title') }}
@endsection

@section('content')
    <section id="about-us">
        <div class="container generic-container" data-aos="fade-up">
            <div class="section-header">
                <h2>Qui som?</h2>
            </div>
            <p><strong>Sobre nosaltres</strong></p>
            <p>Coolture és una plataforma per trobar tot tipus d'esdeveniments, desde festivals de música fins a exposicions
                d'art temporals.
            </p>
            <p><strong>Contacte</strong></p>
            <p>Coolture Technologies, S.L.<br>

                Direcció: Carrer Migdia, 40, 1, 2, 17002 Girona <br>

                <a href="mailto:info@coolture.com" class="link">info@coolture.com</a>
            </p>
        </div>
    </section>
@endsection
