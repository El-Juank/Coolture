@extends('layouts.dashboard')

@section('seoTitle')
    | {{ __('lang.dash_events') }}
@endsection

@section('content')

    @include('partials.profile_menu')
    <div class="container dashboard">
        <div class="row justify-content-center profile-content" data-aos="fade-up">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-9">
                        <h2 class="mb-1">{{ __('lang.event_admin') }}</h2>
                        <p class="text-secondary">{{ __('lang.event_admin_tagline') }}</p>
                    </div>
                    <div class="col-3 justify-content-end v-center">
                        <a href="{{ route('events.create') }}"
                            class="btn btn-coolture btn-post">{{ __('lang.add_event') }}</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('lang.event_col_title') }}</th>
                                    <th scope="col">{{ __('lang.event_col_user') }}</th>
                                    <th scope="col" class="w-20">{{ __('lang.col_actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->Title }}</td>
                                        <td>{{ $event->User->name }}</td>

                                        <td class="align-middle">
                                            <a href="{{ route('events.edit', ['event' => $event->id]) }}"
                                                class="btn btn-info btn-sm">{{ __('lang.edit') }}</a>

                                            @if (is_null($event->deleted_at))
                                                <form action="{{ route('events.destroy', ['event' => $event->id]) }}"
                                                    method="POST" style="display:inline">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="submit" value="{{ __('lang.delete') }}"
                                                        onclick="return confirm('{{ __('lang.delete_event_confirm') }}')"
                                                        class="btn btn-danger btn-sm">
                                                </form>
                                            @else
                                                <a href="{{ route('events.restore', ['event' => $event->id]) }}"
                                                    class="btn btn-success btn-sm">{{ __('lang.restore') }}</a>
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
