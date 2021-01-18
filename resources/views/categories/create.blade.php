NOVA CATEGORIA

{{--
    1. Cal preparar is-invalid css
--}}

{{-- Box de errors --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


{{-- Formulari per modificar nom --}}
<form action="{{route('categories.store')}}" method="post">
    @csrf
    <label for="name">Nom de la categoria:</label>
    <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror" value="{{old('name')}}" ><br>

    <input type="submit" value="Crear" class="btn btn-success">
</form>
