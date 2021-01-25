@extends('layouts.base')

@section('seoTitle')
    | {{ __('lang.notifications_title') }}
@endsection

@section('content')
    <main id="main" class="main-page">
        @if($user->TotalNotificationChanges()==0)
        {{__('lang.notifications_zero')}}
        @else
        <?php $notifications = $user->NotificationChangesEvent(true); ?>
        @if (count($notifications) != 0)
            #Notficacións Event <br />
            <a href="{{ route('eventNotification', ['event' => 'all']) }}">{{ __('lang.notifications_seen') }}</a>
            @forelse($notifications as $notification)
                <div>
                    <a
                        href="{{ route('eventNotification', ['event' => $notification->Event->id]) }}">{{ $notification->Event->GetTitle() }}</a>
                </div>
            @empty
                <div>{{ __('lang.notifications_not_event_changes') }} </div>
        @endforelse
        @endif

        <?php $notifications = $user->NotificationChangesEventMaker(true); ?>
        @if (count($notifications) != 0)
            #Notficacións EventMaker <br />
            <a href="{{ route('eventMakerNotification', ['eventmaker' => 'all']) }}">{{ __('lang.notifications_seen') }}</a>

            @forelse($notifications as $notification)
                <div>
                    <a
                        href="{{ route('eventMakerNotification', ['eventmaker' => $notification->EventMaker->id]) }}">{{ $notification->EventMaker->GetName() }}</a>
                </div>
            @empty
                <div>{{ __('lang.notifications_not_event_maker_changes') }} </div>
        @endforelse
        @endif

        <?php $notifications = $user->NotificationChangesRumour(true); ?>

        @if (count($notifications) != 0)
            #Notficacións Rumors <br />
            <a href="{{ route('rumourNotification', ['rumour' => 'all']) }}">{{ __('lang.notifications_seen') }}</a>


            @forelse($notifications as $notification)
                <div>
                    <a
                        href="{{ route('rumourNotification', ['rumour' => $notification->Rumour->id]) }}">{{ $notification->Rumour->GetTitle() }}</a>
                </div>
            @empty
                <div>{{ __('lang.notifications_not_rumour_cachanges') }} </div>
        @endforelse
        @endif

        @endif

    </main>
@endsection
