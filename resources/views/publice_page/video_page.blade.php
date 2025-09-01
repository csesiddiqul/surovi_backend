@extends('layouts.public');

@section('content');
<section class="main-about">
			<div class="about-bg">
				<div class="container">
					<h1>	<span class="about-color">Video</span></h1>
				</div>
			</div>

		</section>



		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="title">{{$result->title}}</h1>

                    <iframe width="560" height="315"  src="{{$result->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

					<p class="border-ot mt-2 textp">
						{{$result->description}}
					</p>
				</div>


			</div>
		</div>




@endsection
