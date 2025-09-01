@extends('layouts.public');

@section('content')


<section class="main-about">
			<div class="about-bg">
				<div class="container">
					<h1 style="margin-top:7%; color:#d00b01;"><span class="about-color"> CAREER</span></h1>
				</div>
			</div>

		</section>


	<section class="container mr-con">

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
              <th scope="col">SL</th>
              <th scope="col">job Title</th>
              <th scope="col"> Location (District & City Corporation/Pourasava)</th>

              <th scope="col">Description</th>
            </tr>
        </thead>

        <tbody>

        @foreach($jobApp as $key => $jobData)


            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$jobData->title}}</td>
              <td>{{$jobData->location}}</td>
              <td>{{$jobData->Type}}</td>
            </tr>


        @endforeach


        </tbody>

    </table>

	</section>





@endsection
