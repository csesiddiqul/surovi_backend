@extends('layouts.public');

@section('content');

<section class="main-about">
			<div class="about-bg" style="margin-top: -1%;">
				<div class="container">
					<h1 style="margin-top:6%;">Projects- <span class="about-color">Ongoing Projects</span></h1>
				</div>
			</div>

		</section>


		<section class="container mr-con">

		<table id="example" class="table table-striped" style="width:100%">
			<thead>
				<tr>
				<th scope="col">SL</th>
				<th scope="col">Project Title</th>
				<th scope="col">Project Image</th>
				<th scope="col"> Location (District & City Corporation/Pourasava)</th>

				<th scope="col">Project Activists and Beneficiaries</th>
				</tr>
			</thead>


            @foreach($ongoing as $key => $porojectData)


                <tr>

                    <th scope="row">{{$key+1}}</th>
                    <td>
                        <a href="{{route('singaleProject',$porojectData->id)}}" target="_blank">
                            {{$porojectData->title}}
                        </a>
                    </td>
                    <td><img src="{{$porojectData->img}}" alt="" width="5%"></td>
                    <td>{!! $porojectData->location_data !!}</td>
                    <td>{{$porojectData->typeBenef}}</td>

                </tr>


            @endforeach

		</table>

		</section>

@endsection
