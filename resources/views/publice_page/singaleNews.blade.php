@extends('layouts.public');

@section('content');
<section class="main-about">
    <div class="about-bg">
        <div class="container">
            <h1>About-	<span class="about-color">Event</span></h1>
        </div>
    </div>

</section>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">{{$news->title}}</h1>

            <img src="{{asset($news->img)}}" class="img-fluid other-img" alt="">
            <p class="border-ot mt-2 textp">
                {!! $news->description !!}
            </p>
        </div>


    </div>
</div>





@endsection
