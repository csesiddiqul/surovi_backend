

@extends('layouts.public');

@section('content')
		<section class="main-about">
			<div class="about-bg">
				<div class="container">
					<h1 style="margin-top:7%; color:#d00b01;"><span class="about-color">Events</span></h1>
				</div>
			</div>

		</section>

		<section class="blog">
			<div class="container">

					<div class="row">

                        @foreach($results as $key=> $event)

                        @if($event->event_type == 1)
                            <div class="col-md-4">
                                <div class="commite-card">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <a href="#">
                                                <div class="item item-control">
                                                    <img src="{{$event->img}}" class="ptogaimg">
                                                    <a href="" class="title">{!! \Illuminate\Support\Str::limit($event->title,14) !!} </a>
                                                    <p class="details">
                                                        <a class="readmore mt-2" href="{{route('singaleEvent',$event->id)}}" >Read more...</a></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div>

		</section>




        <section class="main-about">
            <div class="about-bg">
                <div class="container">
                    <h1> Previous - <span class="about-color">Events</span></h1>
                </div>
            </div>

        </section>
        <section class="blog">
            <div class="container">

                <div class="row">

                    @foreach($results as $key=> $event)

                        @if($event->event_type == 2)
                            <div class="col-md-4">
                                <div class="commite-card">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <a href="#">
                                                <div class="item item-control">
                                                    <img src="{{$event->img}}" class="ptogaimg">
                                                    <a href="" class="title">{!! \Illuminate\Support\Str::limit($event->title,14) !!} </a>
                                                    <p class="details">


                                                        {!! \Illuminate\Support\Str::limit(nl2br($event->description),17) !!}



                                                        <a class="readmore mt-2" href="{{route('singaleEvent',$event->id)}}" >Read more...</a></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>

        </section>

@endsection
