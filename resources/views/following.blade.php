@extends('layouts.dashboard')

@section('seoTitle')
    | {{ __('lang.dash_following') }}
@endsection

@section('content')

    @include('partials.profile_menu')

    <div class="container dashboard">
        <div class="row justify-content-center profile-content" data-aos="fade-up">
            <div class="col-md-12">
                <h2 class="mb-1">{{ __('lang.following_posts') }}</h2>
                <p class="text-secondary">{{ __('lang.following_posts_tagline') }}</p>

                @forelse ($userranges as $userrange)
                    <!-- Taula eventmakers follow -->
                    <div id="events" class="tab-pane active">
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Artista</th>
                                        <th scope="col">Km de seguiment</th>
                                        <th scope="col" class="w-20">Seguiment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>{{ $userrange->EventMaker->GetName() }}</td>
                                            <td>{{ ($userrange->Range)/10 }} km</td>
                                            <td>
                                                {{-- BOTÓ DE UNFOLLOW --}}
                                                <div class="col-12 d-flex flex-row justify-content-center">
                                                    <form action="{{ route('unfollow', ['eventmaker' => $userrange->EventMaker->id]) }}" method="post">
                                                        @csrf
                                                        <input type="submit" value="{{ __('lang.unfollow') }}" class="btn btn-coolture">
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                @empty


                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('Start following your favourite artists!') }}

                        </div>
                    </div>
                @endforelse


            </div>
        </div>
    </div>


    <script type="text/javascript">
        setTimeout(function() {
            $("#header").addClass("header-fixed");
        }, 1);

    </script>
@endsection
