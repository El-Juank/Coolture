@extends('layouts.dashboard')

@section('seoTitle')
    | {{ __('lang.dash_users') }}
@endsection

@section('content')

    @include('partials.profile_menu')
    <div class="container dashboard">
        <div class="row justify-content-center profile-content" data-aos="fade-up">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-9">
                        <h2 class="mb-1">{{ __('lang.user_admin') }}</h2>
                        <p class="text-secondary">{{ __('lang.user_admin_tagline') }}</p>
                    </div>
                    <div class="col-3 justify-content-end v-center">
                        <a href="{{ route('users.create') }}" class="btn btn-coolture">{{ __('lang.add_user') }}</a>
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
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->Country_id }}</td>

                                        <td>
                                            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                class="btn btn-info">Editar</a>

                                            @if (is_null($user->deleted_at))
                                                <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                    method="POST" style="display:inline">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                                </form>
                                            @else
                                                <a href="{{ route('users.restore', ['user' => $user->id]) }}"
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


