
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

