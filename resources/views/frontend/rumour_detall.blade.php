
ELEMENTS DEL RUMOR

{{-- INFORMACIÓ SOBRE EL RUMOR --}}
{{$rumour->Title}}
{{$rumour->Description}}
{{$rumour->created_at->diffForHumans()}}

{{-- User que ha publicat el rumor --}}
{{$rumour->User->name}}

{{-- Artista --}}
{{$rumour->EventMaker->Name}}

{{-- No se si ho farem servir però és descripció de l'artista de que va el rumor --}}
{{$rumour->EventMaker->Description}}

{{-- Nivell de confiança que té en el rumor aquell usuari que el publica (0-100%) --}}
{{$rumour->OwnTrust}}

{{-- LIKES TOTALS A L'EVENT --}}
{{$likes}}



{{-- FORMULARI PER CREAR MISSATGE DL RUMOUR --}}
{{-- Cal posar la caixa amb els errors --}}

<div class="panel panel-default">
    <div class="panel-heading">Write your comment</div>

    <div class="panel-body">

        <form action="{{route('rumourmessage',['rumour'=>$rumour->id]) }}" method="post">
            @csrf

            <label for="rumourmessage_text">Escriu el teu comentari:</label>
            <textarea name="rumourmessage_text" id="rumourmessage_text" cols="30" rows="10" class="@error('rumourmessage_text') is-invalid @enderror">{{old('rumourmessage_text')}}</textarea>
            <br>

            <input type="submit" value="Crear" class="btn btn-success">
        </form>
    </div>
</div>


{{-- MOSTRA MISSATGES DE L'EVENT --}}

@forelse ($messages as $message)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $message->user->name }} says...

            <span class="pull-right">{{ $message->created_at->diffForHumans() }}</span>
        </div>

        <div class="panel-body">
            <p>{{ $message->Message }}</p>
        </div>
    </div>
@empty
    <div class="panel panel-default">
        <div class="panel-heading">Not Found!!</div>

        <div class="panel-body">
            <p>Be the first to comment this rumour!</p>
        </div>
    </div>
@endforelse
