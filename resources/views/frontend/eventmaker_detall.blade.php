

{{-- Informació EVENTMAKER --}}
{{$eventmaker->Name}}
{{$eventmaker->Description}}

{{-- Seguidors  --}}
{{count($eventmaker->Followers)}}



{{-- BOTÓ DE FOLLOW --}}
<form action="{{route('follow', ['eventmaker' => $eventmaker->id])}}" method="post">
    @csrf
    <input type="submit" value="Follow" class="btn btn-success">
</form>

{{-- BOTÓ DE UNFOLLOW --}}
<form action="{{route('unfollow', ['eventmaker' => $eventmaker->id])}}" method="post">
    @csrf
    <input type="submit" value="Unfollow" class="btn btn-success">
</form>

{{-- Esdeveniments de l'artista --}}
<main id="main">
    <section id="results">
        <div class="container container-results" data-aos="fade-up">
            <div class="row justify-content-center">
                @foreach ($eventmaker->Events as $event)
                    <a href="">
                        <div class="col-lg-4">
                            <div class="result" data-aos="fade-up" data-aos-delay="100">
                                <img src="" alt="Rock" class="img-fluid"
                                    onerror="this.onerror=null;this.src='{{ asset('img/default/image-not-available.png') }}';">
                                <div class="details">
                                    <h3><a
                                            href="{{ route('event', ['event' => $event->id]) }}">{{ $event->Title }}</a>
                                    </h3>
                                    {{-- Per limitar la mida dels textos
                                    --}}
                                    <p>{{ \Illuminate\Support\Str::limit($event->Description, 100, $end = '...') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</main>



{{-- Rumors de l'artista --}}
<main id="main">
    <section id="results">
        <div class="container container-results" data-aos="fade-up">
            <div class="row justify-content-center">
                @foreach ($eventmaker->Rumours as $rumour)
                    <a href="">
                        <div class="col-lg-4">
                            <div class="result" data-aos="fade-up" data-aos-delay="100">
                                <img src="" alt="Rock" class="img-fluid"
                                    onerror="this.onerror=null;this.src='{{ asset('img/default/image-not-available.png') }}';">
                                <div class="details">
                                    <h3><a
                                            href="{{ route('rumour', ['rumour' => $rumour->id]) }}">{{ $rumour->Title }}</a>
                                    </h3>
                                    {{-- Per limitar la mida dels textos
                                    --}}
                                    <p>{{ \Illuminate\Support\Str::limit($rumour->Description, 100, $end = '...') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</main>
