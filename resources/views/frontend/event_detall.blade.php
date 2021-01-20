
ELEMENTS DE L'EVENT

{{-- INFORMACIÓ SOBRE L'EVENT --}}
{{$event->Title}}
{{$event->Description}}
{{$event->EventMaker->Name}}

{{$event->Location->Lat}}
{{$event->Location->Lon}}

{{-- {{asset($event->ImgEvent->Url())}} --}}

{{$event->InitDate}}
{{$event->Duration}}
{{$event->Published}}

{{-- LIKES TOTALS A L'EVENT --}}
{{$likes}}



{{-- FORMULARI PER CREAR MISSATGE DE L'EVENT --}}
{{-- Cal posar la caixa amb els errors --}}

<div class="panel panel-default">
    <div class="panel-heading">Write your comment</div>

    <div class="panel-body">

        <form action="{{route('eventmessage',['event'=>$event->id]) }}" method="post">
            @csrf

            <label for="eventmessage_text">Escriu el teu comentari:</label>
            <textarea name="eventmessage_text" id="eventmessage_text" cols="30" rows="10" class="@error('eventmessage_text') is-invalid @enderror">{{old('eventmessage_text')}}</textarea>
            <br>

            <input type="submit" value="Crear" class="btn btn-success">
        </form>
    </div>
</div>



{{-- MOSTRA MISSATGES DE L'EVENT --}}

@forelse ($messages as $message)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $message->User->name }} says...

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
            <p>Be the first to comment this event!</p>
        </div>
    </div>
@endforelse


