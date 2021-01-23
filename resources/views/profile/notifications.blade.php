#Notficacións Event <br/>
<a href="{{route('eventNotification',['event'=>'tots'])}}">Seen</a> 
@forelse($user->NotificationChangesEvent(true) as $notification)
<div>
<a href="{{route('eventNotification',['event'=>$notification->Event->id])}}" >{{$notification->Event->Title}}</a>
</div>
@empty
<div>No hi ha notifications d'events </div>
@endforelse
#Notficacións EventMaker <br/>
<a href="{{route('eventMakerNotification',['eventmaker'=>'tots'])}}">Seen</a> 
@forelse($user->NotificationChangesEventMaker(true) as $notification)
<div>
<a href="{{route('eventMakerNotification',['eventmaker'=>$notification->EventMaker->id])}}" >{{$notification->EventMaker->Name}}</a>
</div>
@empty
<div>No hi ha notifications d'event makers </div>
@endforelse
#Notficacións Rumors <br/>
<a href="{{route('rumourNotification',['rumour'=>'tots'])}}">Seen</a> 
@forelse($user->NotificationChangesRumour(true) as $notification)
<div>
<a  href="{{route('rumourNotification',['rumour'=>$notification->Rumour->id])}}" >{{$notification->Rumour->Title}}</a>
</div>
@empty
<div>No hi ha notifications de rumors </div>
@endforelse
