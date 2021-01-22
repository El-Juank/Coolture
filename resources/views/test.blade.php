Nom:{{$eventMaker->translate('ca')->Name}}<br>
<ul>
@foreach($eventMaker->Followers as $follower)
<li>{{$follower->name}}</li>
@endforeach
</ul>