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


                <!-- Taula eventmakers follow -->
                <div id="events" class="tab-pane active">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('lang.artists') }}</th>
                                        <th scope="col">Km de seguiment</th>
                                        <th scope="col" class="w-20">{{ __('lang.following') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($userranges as $userrange)

                                        <tr>
                                            <td>{{ $userrange->EventMaker->GetName() }}</td>
                                            <td>{{ $userrange->Range / 10 }} km</td>
                                            <td>
                                                {{-- BOTÓ DE UNFOLLOW --}}
                                                <div class="col-12 d-flex flex-row justify-content-center">
                                                    <form
                                                        action="{{ route('unfollow', ['eventmaker' => $userrange->EventMaker->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="submit" value="{{ __('lang.unfollow') }}"
                                                            class="btn btn-coolture">
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    @empty

                                        <tr>
                                            <td colspan="3" class="text-center">
                                                @if (session('status'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif

                                                {{ __('lang.no_following') }}
                                            </td>


                                        </tr>

                                    @endforelse
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
