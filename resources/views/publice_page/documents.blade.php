@extends('layouts.public');

@section('content');

<section class="main-about">
			<div class="about-bg" style="margin-top: -1%;">
				<div class="container">
					<h1><span class="about-color"> Publications</span></h1>
				</div>
			</div>

		</section>


		<section class="container mr-con">

		<table id="example" class="table table-striped" style="width:100%">
			<thead>
				<tr>
				<th scope="col">SL</th>
				<th scope="col">Title</th>
				<th scope="col">Date</th>
				<th scope="col">file</th>

				</tr>
			</thead>


            @foreach($results as $key => $documentData)


                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{!! \Illuminate\Support\Str::limit($documentData->title,40) !!}</td>
                    <td>{{$documentData->date}}</td>
                    <td><a href="{{$documentData->file}}" target="_blank"><i class="fa-solid fa-file-pdf"></i></a></td>

                </tr>


            @endforeach

		</table>

		</section>

@endsection
