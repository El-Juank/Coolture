@extends('layouts.base')

@section('seoTitle')
    | {{ __('lang.post_rules_seo_title') }}
@endsection

@section('content')
    <section id="post-rules">
        <div class="container generic-container" data-aos="fade-up">

            <div class="section-header">
                <h2>Normes de publicació</h2>
            </div>
            <p>Si el contingut que publiques en Coolture incompleix alguna d'aquestes regles de convivència, o va en contra
                de les
                disposicions legals vigents o de bons costums, el retirarem i t'enviarem un correu electrònic indicant el
                motiu pel qual s'ha retirat. Tingues en compte que, si l'incompliment és greu o el realitzes de forma
                reiterada, podem desactivar el teu usuari.</p>

            <p>A continuació trobaràs gran part del contingut que <strong>no pots publicar a
                    Coolture</strong>:
            </p>
            <ul>
                <li>Anuncios de búsqueda (compro, busco...).&nbsp;</li>
                <li>Acciones ilegales y/o peligrosas.</li>
                <li>Bromas, contenido falso, deshonesto, ambiguo, incorrecto o que induzca al engaño o redirija a
                    contenidos no permitidos.</li>
                <li>Publicidad, spamming, cadenas de correos, esquemas piramidales, marketing multinivel , amenazas
                    y/o fraude.</li>
                <li>Enlace para dirigir tráfico a otras páginas web o apps.</li>
                <li>Entradas a eventos, entradas generales y billetes de transporte.</li>
                <li>Tarjetas regalo.</li>
                <li>Infracción a la propiedad intelectual o los derechos industriales, incluyendo patentes, marcas
                    registradas, copyrights o secretos comerciales.</li>
                <li>Infracción a los derechos de privacidad.</li>
                <li>Desnudos de personas en las que aparecen visiblemente genitales, pezones de mujer sin cubrir, anos
                    o nalgas. Se permite publicar fotografías de pinturas, esculturas y otras obras de arte que muestren
                    desnudos.</li>
                <li>Denunciar el comportamiento de otros usuarios de la aplicación. En caso de tener problemas con
                    algún comprador o vendedor, puedes denunciarlo desde la conversación que hayáis mantenido.
                </li>
                <li>No está permitida cualquier manifestación de discriminación, intolerancia y/u ofensas
                    raciales.</li>
                <li>No está permitida la publicación de anuncios cuyo contenido promueva, apoye o conmemore grupos de
                    odio o intolerancia.</li>
                <li>Relacionados o recuperados de desastres naturales, escenas de crimen, accidentes o
                    tragedias.</li>
            </ul>
        </div>
    </section>
@endsection
