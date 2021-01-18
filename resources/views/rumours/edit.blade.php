Edit page

<div class="card-body">
    <!-- Amb l'id que hem agafat del "Auth::user" enviem el formulari per modificar l'usuari en concret -->
    <form method="POST" action="{{ route('rumours.update', ['rumour' => $rumour->id]) }}" class="mt-3">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('lang.form_name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name', $rumour->Title) }}" required autocomplete="name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mt-4 justify-content-center">
            <div class="col-md-6 text-center">
                <button type="submit" class="btn btn-coolture">
                    {{ __('Actualitza') }}
                </button>
            </div>
        </div>
    </form>
</div>
