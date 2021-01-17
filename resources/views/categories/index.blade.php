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
                        <a href="{{ route('categories.create') }}" class="btn btn-coolture">{{ __('lang.add_gender') }}</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>COL1</td>
                                <td>COL2</td>
                            </tr>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->Name }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                            class="btn btn-info">Editar</a>

                                        @if (is_null($category->deleted_at))
                                            <form action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                                method="POST" style="display:inline">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" value="Eliminar" class="btn btn-danger">
                                            </form>
                                        @else
                                            <a href="{{ route('categories.restore', ['category' => $category->id]) }}"
                                                class="btn btn-success">Recuperar</a>
                                        @endif
                                    </td>
                                </tr>

                            @endforeach

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
