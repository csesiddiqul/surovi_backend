@extends('layouts.public');

@section('content');
<section class="main-about">
			<div class="about-bg">
				<div class="container">
					<h1 style="margin-top:8%; color:#d00b01;">Information-<span class="about-color">Photo</span></h1>
				</div>
			</div>

		</section>



		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="title">{{$result->title}}</h1>

					<img src="{{asset($result->img)}}" class="img-fluid other-img" alt="">
					<p class="border-ot mt-2 textp mb-2">
					{!! nl2br($result->description) !!}
					</p>
				</div>


			</div>
		</div>




@endsection
