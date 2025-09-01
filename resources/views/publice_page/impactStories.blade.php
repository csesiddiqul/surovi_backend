

@extends('layouts.public');

@section('content')
		<section class="main-about">
			<div class="about-bg">
				<div class="container">
					<h1 style="margin-top:7%; color:#d00b01;"><span class="about-color">Impact Stories</span></h1>
				</div>
			</div>

		</section>

		<section class="blog">
			<div class="container">

					<div class="row">

                        @foreach($results as $key=> $event)
                            <div class="col-md-4">
                                <div class="commite-card">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <a href="#">
                                                <div class="item item-control">
                                                    <img src="{{$event->img}}" class="ptogaimg">
                                                    <a href="" class="title">{!! \Illuminate\Support\Str::limit($event->title,14) !!} </a>
                                                    <p class="details">
                                                        <a class="readmore mt-2" href="{{route('impact.stories.detail',$event->id)}}" >Read more...</a></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

		</section>




@endsection
