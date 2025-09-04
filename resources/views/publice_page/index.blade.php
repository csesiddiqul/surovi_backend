@extends('layouts.public')
@section('content')
    <section class="slider">
        <div class="">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
                <div class="carousel-indicators">
                    @foreach($slider as $key => $imge)
                        <button  type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}" class="{{($key == 0 ? 'active' : '')}}" aria-current="true" aria-label="Slide {{$key}}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($slider as $key => $imge)
                        <div class="carousel-item {{($key == 0 ? 'active': '')}}">
                            <img src="{{asset($imge->url)}}" class="d-block w-100 slider-img-con" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="slider_title">{{\Illuminate\Support\Str::limit($imge->title,90)}}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


            <div class="mrcueData">
                    <marquee style=" padding: 3px" direction="" scrolldelay="100" onmouseover="this.stop();" onmouseout="this.start();" >

                        @foreach($updateNews as $data)
                            {{$data->news}}
                        @endforeach


                            <!-- Codes by HTMLcodes.ws -->


                    </marquee>
            </div>

            <div class="overlay">

            </div>
        </div>
    </section>

    <section class="about-news">

    <div class="container">
            <h1 class="title" > welcome to surovi</h1>
            <div class='back-color p-2'>
            <div class="row">






                <div class="col-md-3">
                    <div class="">

                            <img src="{{$slogan->file}}" class="img-fluid">


                    </div>
                </div>

                <div class="col-md-4">
                    <div class="">

                        <p class="welcom-slogan">
                            {{substr($slogan->slogan,0,290)}}
                        </p>

                    </div>

                </div>

                <div class="col-md-5">
                    <div class="">

                        <p class="welcom-slogan">
                            {{\Illuminate\Support\Str::limit(substr($slogan->slogan,290),350)}}
                            <a href="{{route('welcome')}}" class="readmore float-end ">Read More..</a>
                        </p>

                    </div>

                </div>


            </div>
            </div>
        </div>

    </section>










    <!--<section class="plainig">
        <div class="container">
            <div class="row">
                @foreach($services as $key=> $serviceData)
                    <div class="col-sm-12 col-md-4">
                        <div class="plaining-item">
                            <div class="planing-icon">
                                <a href=""><i class="fa-solid {{$serviceData->icon}}"></i></a>
                            </div>
                            <h1 class="title">{{\Illuminate\Support\Str::limit($serviceData->title,30)}}</h1>

                            <p class="plagtin-p">{{\Illuminate\Support\Str::limit($serviceData->description,84)}}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>-->





    <section class="about-news">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="title"  >Notice Board</h1>
                    <div class="about notish-height" data-aos="fade-up" data-aos-duration="1500">
                        <ul class="customBorder">
                            @foreach($notice as $key => $noticeList)
                                <li><i class="isize fa-solid fa-caret-right"></i><a href="{{route('all_notice',$noticeList->id)}}" target="_blank">{{\Illuminate\Support\Str::limit($noticeList->title,105)}}</a></li>


                            @endforeach
                                <a href="{{route('noticelist')}}" class="readmore mt-4">All Notice →</a>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <h1 class="title">SUROVI IS A FAITH</h1>
                    @foreach($card as $key=> $cardData)
                        <div class="commite-card"  data-aos="fade-down" data-aos-duration="1500">
                            <div class="row" >
                                <div class="col-md-12 col-sm-12">
                                    <div class="item  item-control card-height ">
                                        <div class="text-center">
                                            <img class="commite-img" src="{{asset($cardData->img)}}" alt="">
                                            <p class="auth">
                                                {{\Illuminate\Support\Str::limit($cardData->name,15)}} ,
                                                {{\Illuminate\Support\Str::limit($cardData->position,15)}}

                                            </p>
                                            <p class="details-2">{{\Illuminate\Support\Str::limit($cardData->description,40)}}</p>
                                            <a class="readmore float-end px-2 acont" href="{{route('singaleCard',$cardData)}}">Read more →</a>

                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="title">Events</h1>
                    <div class="row">
                        @foreach($event as $key=> $eventData)
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="commite-card" data-aos="fade-up" data-aos-duration="1500">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="item item-control">
                                                        <img src="{{asset($eventData->img)}}"  class="img-fluid box-img">
                                                        <p class="details" >{{\Illuminate\Support\Str::limit($eventData->title,20)}}</p>
                                                        <p class="details">{{ \Illuminate\Support\Str::limit(strip_tags($eventData->description), 30) }}
                                                            <a class="readmore mt-2" href="{{route('singaleEvent',$eventData->id)}}" target="">Read more...</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-4">
                    <h1 class="title">Important link</h1>
                    <div class="">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="about">
                                    <ul class="customBorder">
                                        @foreach($imlink as $key => $link)
                                            <li><i class="fa-solid fa-square-check"></i><a href="{{$link->url}}" target="_blank">{!! \Illuminate\Support\Str::limit($link->title,38) !!}</a></li>
                                        @endforeach


                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <h1 class="title">video</h1>

                                <div class="about">
                                    <div class="row">

                                        @foreach($video as $video)
                                            <div class="col-md-12">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="item item-control">
                                                                <iframe class="lol" src="{{$video->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                <p class="details">{!! \Illuminate\Support\Str::limit($video->title,35) !!}  <a class="readmore mt-2" href="{{route('video_gallery')}}">Read more...</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>





    <section class="blog">
        <div class="container">
            <h1 class="title">News</h1>
            <div class="row">
                @foreach($news as $key => $newsData)
                    <div class="col-md-4">
                        <div class="commite-card" data-aos="flip-right" data-aos-duration="1500">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="item item-control">
                                        <img src="{{$newsData->img}}" class="img-fluid box-img-2">
                                        <p class="details">{{\Illuminate\Support\Str::limit($newsData->title,25)}}</p>
                                        <a class="readmore mt-2" href="{{route('singaleNews',$newsData->id)}}" target="">Read more...</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>


    <section class="blog">
        <div class="container">
            <h1 class="title">Projects</h1>
            <div class="row">
                @foreach($project as $key => $projectData)
                    <div class="col-md-4">
                        <div class="commite-card" data-aos="flip-right" data-aos-duration="1500">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="item item-control">
                                        <img src="{{$projectData->img}}" class="img-fluid box-img-2">
                                        <p class="details">{{\Illuminate\Support\Str::limit($projectData->title,25)}}</p>
                                        <a class="readmore mt-2" href="{{route('singaleProject',$projectData->id)}}" target="">Read more...</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>



    <section class="featured">
        <div class="container">
            <div class="row">
                <h1 class="title">Beautiful Moments </h1>



                @foreach($photoin as $key=> $photo)
                    <div class="col-md-4">
                        <div class="feature-item">
                            <a href="{{route('photo_gallery')}}">
                                <img src="{{$photo->img}}" class="img-fluid box-img-2">
                                <div class="caption">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>


@endsection
