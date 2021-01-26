 @extends('layouts.base')

 @section('seoTitle')
     |{{ $category->GetName() }}
 @endsection

 @section('content')
 <div class="container">
     <main id="main">
         <section id="results">

             <div id="gendersCarousel" class="carousel slide w-100" data-ride="carousel">
                 <div class="carousel-inner w-100 row" role="listbox">
                @foreach ($eventmakers as $eventmaker)
                <a href="{{route('eventmaker',['eventmaker'=>$eventmaker->id])}}">
                        <div class="col-lg-3 searchResult">
                            <div class="gender" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset($eventmaker->ImgProfile->Url()) }}" class="img-fluid "
                                   >
                                <div class="details">
                                    <h3><a href="{{route('eventmaker',['eventmaker'=>$eventmaker->id])}}">
                                    {{$eventmaker->GetName()}}</a></h3>
                                     <p>{{ \Illuminate\Support\Str::limit($eventmaker->GetDescription(), 50, $end = '...') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

                     @foreach ($eventmakers as $eventmaker)


                         @foreach ($eventmaker->Events as $event)
                             <a href="{{ route('event', ['event' => $event->id]) }}">
                                 <div class="col-lg-3 searchResult">
                                     <div class="gender" data-aos="fade-up" data-aos-delay="100">
                                         <img src="{{ asset($event->ImgPreview->Url()) }}" class="img-fluid">
                                         <div class="details">
                                             <h3>
                                             <a href="{{ route('event', ['event' => $event->id]) }}">
                                             {{ $event->EventMaker->GetName() }}</a>
                                             </h3>
                                             <p>{{ $event->GetTitle() }}</p>
                                         </div>
                                     </div>
                                 </div>
                             </a>
                         @endforeach

                         @foreach ($eventmaker->Rumours as $rumour)
                             <a href="{{ route('rumour', ['rumour' => $rumour->id]) }}">
                                 <div class="col-lg-3 searchResult">
                                     <div class="gender" data-aos="fade-up" data-aos-delay="100">
                                         <img src="{{ asset($rumour->ImgPreview->Url()) }}" class="img-fluid">
                                         <div class="details">
                                             <h3><a href="{{ route('rumour', ['rumour' => $rumour->id]) }}">
                                                     @if ($rumour->HasEventMaker())
                                                         {{ $rumour->EventMaker->GetName() }}
                                                     @else
                                                         ???
                                                     @endif
                                                 </a></h3>
                                             <p>{{ $rumour->GetTitle() }}</p>
                                         </div>
                                     </div>
                                 </div>
                             </a>
                         @endforeach
                     @endforeach
                 </div>
               </div>  
             </div>
         </section>
     </main>
 @endsection
