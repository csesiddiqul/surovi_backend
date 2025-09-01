@extends('layouts.public');

@section('content');

<section class="main-about">
			<div class="about-bg">
				<div class="container">
					<h1><span class="about-color">All Notice</span></h1>
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
				<th scope="col">Description</th>
				<th scope="col">Action</th>


				</tr>
			</thead>


            @foreach($results as $key => $noticeData)


                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{!! \Illuminate\Support\Str::limit($noticeData->title,40) !!}</td>
                    <td>{{date('d F y',strtotime($noticeData->created_at))}}</td>
                    <td>{!! \Illuminate\Support\Str::limit($noticeData->description,40) !!}</td>
                    <td>
                        <a href="{{route('all_notice',$noticeData->id)}}"> <i class="fa-solid fa-eye"></i></a>
                        <a href="{{$noticeData->file}}" target="_blank"><i class="fas fa-file"></i></a>
                    </td>

                </tr>


            @endforeach

		</table>

		</section>

@endsection
