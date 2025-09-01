@extends('layouts.public');

@section('content');
<section class="main-about">
			<div class="about-bg">
				<div class="container">
					<h1 style="margin-top:5%; color:#d00b01;">Impact Stories <span class="about-color"> Detail</span></h1>
				</div>
			</div>

		</section>



		<div class="container">
			<div class="row">
				<div class="col-md-12">


                    <div class="">
                        <h1 class="title">{{$event->title}}</h1>

                        <img src="{{asset($event->img)}}" class="img-fluid other-img" alt="">
                        <p class="border-ot mt-2 textp">
                            {!! $event->description !!}
                        </p>

                    </div>
                </div>


			</div>
		</div>




@endsection
