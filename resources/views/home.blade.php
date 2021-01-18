@extends('layouts.dashboard')

@section('seoTitle')
    | {{ __('lang.profile_seo', ['name' => Auth::user()->name]) }}
@endsection

@section('content')

    @include('partials.profile_menu')

    <div class="container dashboard">
        <div class="row justify-content-center profile-content" data-aos="fade-up">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-9">
                        <h2 class="mb-1">{{ __('lang.your_posts') }}</h2>
                        <p class="text-secondary">{{ __('lang.your_posts_tagline') }}</p>
                    </div>
                    <div class="col-3 justify-content-end v-center">
                        <a href="{{ route('post_concert') }}" class="btn btn-coolture">{{ __('lang.post_event') }}</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>

                </div>

                {{-- Taula on mostra els events que ha publicat l'usuari --}}
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Data creació</th>
                                    <th scope="col">Title event</th>
                                    <th scope="col">EventMaker name</th>
                                    <th scope="col">Funcions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->created_at }}</td>
                                        <td>{{ $event->Title }}</td>
                                        <td>{{ $event->EventMaker->Name }}</td>

                                        <td>
                                            <a href="{{ route('events.edit', ['event' => $event->id]) }}"
                                                class="btn btn-info">Editar</a>

                                            @if (is_null($event->deleted_at))
                                                <form action="{{ route('events.destroy', ['event' => $event->id]) }}"
                                                    method="POST" style="display:inline">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                                </form>
                                            @else
                                                <a href="{{ route('events.restore', ['event' => $event->id]) }}"
                                                    class="btn btn-success">Recuperar</a>
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>



                {{-- Taula on mostra els rumors que ha publicat l'usuari --}}
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Data creació</th>
                                    <th scope="col">Title rumor</th>
                                    <th scope="col">EventMaker rumor</th>
                                    <th scope="col">Funcions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rumours as $rumour)
                                    <tr>
                                        <td>{{ $rumour->created_at }}</td>
                                        <td>{{ $rumour->Title }}</td>
                                        <td>{{ $rumour->EventMaker->Name }}</td>

                                        <td>

                                            <a href="{{ route('rumours.edit', ['rumour' => $rumour->id]) }}"
                                                class="btn btn-info">Editar</a>

                                            @if (is_null($rumour->deleted_at))
                                                <form action="{{ route('rumours.destroy', ['rumour' => $rumour->id]) }}"
                                                    method="POST" style="display:inline">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                                </form>
                                            @else
                                                <a href="{{ route('rumours.restore', ['rumour' => $rumour->id]) }}"
                                                    class="btn btn-success">Recuperar</a>
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <script type="text/javascript">
        setTimeout(function() {
            $("#header").addClass("header-fixed");
        }, 1);

    </script>
@endsection
