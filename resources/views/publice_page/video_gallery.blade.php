@extends('layouts.public');

@section('content')


    <section class="main-about">
        <div class="about-bg">
            <div class="container">
                <h1 style="margin-top:7%; color:#d00b01;">Gallery- 	 <span class="about-color">Video</span></h1>
            </div>
        </div>

    </section>

    <section class="blog">
        <div class="container">
            <h1 class="title">Video Gallery</h1>
            <div class="row">


                @foreach($videoga as $key=> $videodata)
                    <div class="col-md-3">
                        <div class="commite-card">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <a href="">
                                        <div class="item item-control">


                                            <iframe class="lol" src="{{$videodata->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <p class="details"> </p>


                                            <a href="" class="title">{{\Illuminate\Support\Str::limit($videodata->title,20)}}</a>

                                            <p class="details">{{\Illuminate\Support\Str::limit($videodata->description,30)}} <a class="readmore mt-2" href="{{route('singaleVideo',$videodata->id)}}">Read more...</a></p>


                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
        @endforeach

    </section>


@endsection
