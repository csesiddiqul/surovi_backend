

@extends('layouts.public');

@section('content')


		<section class="main-about">
			<div class="about-bg">
				<div class="container">
					<h1>Gallery- 	 <span class="about-color">Photo</span></h1>
				</div>
			</div>

		</section>

		<section class="blog">
			<div class="container">
				<h1 class="title">Photo Gallery</h1>
					<div class="row">

                    @foreach($photoga as $key=> $photodata)

                            <div class="col-md-4">
                                <div class="commite-card">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <a href="#">
                                                <div class="item item-control">
                                                    <img src="{{$photodata->img}}" class="ptogaimg">
                                                    <a href="" class="title">{!! \Illuminate\Support\Str::limit($photodata->title,18) !!}</a>
                                                    <p class="details">

                                                        <a class="readmore mt-2" href="{{route('singalePhoto',$photodata->id)}}">Read more...</a></p>
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
