@extends('layouts.base')

@section('seoTitle')
    | {{ __('lang.how_it_works_seo_title') }}
@endsection

@section('content')
    <section id="faq">

        <div class="container generic-container" data-aos="fade-up">

            <div class="section-header">
                <h2>Com funciona</h2>
            </div>

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-9">
                    <ul id="faq-list">

                        <li>
                            <a data-toggle="collapse" class="collapsed" href="#faq1">Què és Coolture? <i
                                    class="fa fa-minus-circle"></i></a>
                            <div id="faq1" class="collapse" data-parent="#faq-list">
                                <p>
                                    Coolture és una agenda d'esdeveniments on els pots filtrar per categoria, data o ciutat
                                    i
                                    trobar noves propostes.
                                </p>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#faq2" class="collapsed">Com puc registrar-me? <i
                                    class="fa fa-minus-circle"></i></a>
                            <div id="faq2" class="collapse" data-parent="#faq-list">
                                <p>
                                    Crea el teu compte és molt senzill. Fes click en el botó "Registra't o inicia sessió",
                                    facilita'ns un e-mail
                                    i escull una contrasenya per poder accedir a Coolture de forma segura.
                                    També pots registrar-te de forma més ràpida amb el botó "Registra't amb Facebook". En
                                    aquest cas, tingues en compte que el correu electrònic al qual t'enviarem notificacions
                                    serà el del teu compte de Facebook. Assegura't que és un email vàlid i està operatiu!.
                                </p>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#faq3" class="collapsed">La meva informació de Coolture és
                                pública? <i class="fa fa-minus-circle"></i></a>
                            <div id="faq3" class="collapse" data-parent="#faq-list">
                                <p>
                                    No. Coolture és una xarxa social privada i segura. No indexem informació en cap
                                    cercador. Més informació a la pàgina de <a href="{{ route('privacy_policy') }}"
                                        class="inner-link">Política
                                        de Privacitat</a>.
                                </p>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#faq4" class="collapsed">Com puc seguir els esdeveniments que
                                m'interessen? <i class="fa fa-minus-circle"></i></a>
                            <div id="faq4" class="collapse" data-parent="#faq-list">
                                <p>
                                    Busca el nom de l'esdeveniment a la barra superior de cerca i entra en la seva
                                    publicació. Fes click en el botó "Seguir" i no et perdis les seves properes novetats.
                                    Podràs veure els esdeveniments que segueixes dins de l'àrea privada del teu perfil.
                                </p>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#faq5" class="collapsed">Notificacions? <i
                                    class="fa fa-minus-circle"></i></a>
                            <div id="faq5" class="collapse" data-parent="#faq-list">
                                <p>
                                    Segueix els esdeveniment que t'interesin així com als teus artistes favorits i sigues el
                                    primer en assabentar-te de qualsevol novetat.
                                </p>
                            </div>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#faq6" class="collapsed">Vull buscar gent amb la qual anar a un
                                cesdeveniment, com puc fer-ho? <i class="fa fa-minus-circle"></i></a>
                            <div id="faq6" class="collapse" data-parent="#faq-list">
                                <p>
                                    Trobaràs una secció de comentaris a baix de cada publicació d'esdeveniments. En aquest
                                    xat públic podràs parlar amb més seguidors de l'esdeveniment.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </section>
@endsection
