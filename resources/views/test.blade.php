{{$user->id}}
{{$user->name}}<br>
<br><br>//notification changes event<br>
@foreach($user->NotificationChangesEvent(true) as $notification)
{{$notification->Event->Title}}<br/>
{{$notification->Event->SetLike($user)}}
{{$notification->Event->NotificationChangeSeen($user)}}
@endforeach
<br><br>//notification2<br>
@foreach($user->NotificationChangesEvent(true) as $notification)
{{$notification->Event->Title}}<br/>
@endforeach
<br><br>//Roles<br>
@foreach($user->Roles as $rol)
{{$rol->Name}}<br/>
@endforeach
<br><br>//Country
{{$user->Country->Name}}
