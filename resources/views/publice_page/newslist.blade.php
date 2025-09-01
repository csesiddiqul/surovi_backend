

@extends('layouts.public');

@section('content')


		<section class="main-about">
			<div class="about-bg">
				<div class="container">
					<h1><span class="about-color">News</span></h1>
				</div>
			</div>

		</section>

		<section class="blog">
			<div class="container">

					<div class="row">

                        @foreach($results as $key=> $newsData)

                            <div class="col-md-4">
                                <div class="commite-card">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <a href="#">
                                                <div class="item item-control">
                                                    <img src="{{$newsData->img}}" class="ptogaimg">
                                                    <a href="" class="title">{!! \Illuminate\Support\Str::limit($newsData->title,18) !!}</a>
                                                    <p class="details">


                                                        {!! \Illuminate\Support\Str::limit(nl2br($newsData->description),20) !!}

                                                        <a class="readmore mt-2" href="{{route('singaleNews',$newsData->id)}}">Read more...</a></p>
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
