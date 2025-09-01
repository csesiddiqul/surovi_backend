@extends('layouts.public');

@section('content');

<section class="main-about">
    <div class="about-bg">
        <div class="container">
            <h1>All-	 <span class="about-color"> Notice</span></h1>
        </div>
    </div>

</section>



<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="title">{{$notice->title}} </h1>

            <p>
                Date: {{date('d F, Y',strtotime($notice->created_at))}}
            </p>
            <p class="textp mt-2 border-ot ">



                      {{$notice->description}}

            </p>




@php
    $file = new SplFileInfo($notice->file);
    $ext  = $file->getExtension();
@endphp
        @if ($ext == 'pdf')
           <a href="{{$notice->file}}">Dwonlode</a>
        @else
          <img src="{{asset($notice->file)}}" class="img-fluid  mb-5" alt="">
        @endif





        </div>

        <div class="col-md-4">
            <h1 class="title"  >Notice Board</h1>
            <div class="about notish-height" data-aos="fade-up" data-aos-duration="1500">
                <ul class="customBorder">


                    @foreach($all_notice as $key=> $noticeData)

                        <li><i class="isize fa-solid fa-caret-right"></i><a href="{{route('all_notice',$noticeData->id)}}">{{\Illuminate\Support\Str::limit($noticeData->title,40)}} </a></li>
                    @endforeach

                    <div class="clearfix"></div>
                </ul>
            </div>
        </div>


    </div>
</div>



@endsection
