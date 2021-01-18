@extends('layouts.dashboard')

@section('seoTitle')
    | {{ __('lang.dash_genders') }}
@endsection

@section('content')

    @include('partials.profile_menu')
    <div class="container dashboard">
        <div class="row justify-content-center profile-content" data-aos="fade-up">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-9">
                        <h2 class="mb-1">{{ __('lang.gender_admin') }}</h2>
                        <p class="text-secondary">{{ __('lang.gender_admin_tagline') }}</p>
                    </div>
                    <div class="col-3 justify-content-end v-center">
                        <a href="{{ route('events.create') }}" class="btn btn-coolture">{{ __('lang.add_gender') }}</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">COL1</th>
                                    <th scope="col">COL2</th>
                                    <th scope="col">COL3</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->Title }}</td>
                                        <td>{{ $event->User_id }}</td>

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
            </div>
        </div>
    </div>
    <script type="text/javascript">
        setTimeout(function() {
            $("#header").addClass("header-fixed");
        }, 1);

    </script>
@endsection
