@extends('layouts.public');

@section('content');
<section class="main-about">
			<div class="about-bg">
				<div class="container">
					<h1>Project<span class="about-color">Data</span></h1>
				</div>
			</div>

		</section>



		<div class="container">
			<div class="row">
				<div class="col-md-12">


                    <div class="">
                        <h1 class="title">{{$project->title}}</h1>

                        <img src="{{asset($project->img)}}" class="img-fluid other-img" alt="">
                        <p class="border-ot mt-2 textp">
                            {!! nl2br($project->title) !!}
                            {!! nl2br($project->location_data) !!}
                        </p>

                    </div>
                </div>


			</div>
		</div>




@endsection
