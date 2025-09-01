
@extends('layouts.public');

@section('content')


		<section class="main-about">
			<div class="about-bg">
				<div class="container">
					<h1 style="margin-top:7%; color:#d00b01;">Gallery- 	 <span class="about-color">Photo</span></h1>
				</div>
			</div>

		</section>

{{--        <img src="{{$photoga->img}}" class="ptogaimg">--}}

		<section class="blog">
			<div class="container">
				<h1 class="title">Photo Group Gallery</h1>
					<div class="row">

                        @foreach($photo_groups as $key=> $groupData)

                            <div class="col-md-4">
                                <div class="commite-card">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <a href="#">
                                                <div class="item item-control">



                                                    <img src="{{$groupData->img}}" class="ptogaimg">



                                                    <a href="" class="title">{{$groupData->group_name}}</a>
                                                    <p class="details">

                                                        <a class="readmore mt-2" href="{{route('singalegroup',$groupData->id)}}">Read more...</a></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


            </div>

		</section>


@endsection
