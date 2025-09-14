
@extends('layouts.main_pub')

@push('styles')
    <style>
        /* body{
            color: rgb(165, 112, 218);
        } */
    </style>
@endpush

@section('title')
 Surovi
@endsection
@section('content')
    <!-- carousel Section -->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade container" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-inner" style="border-radius: 12px; overflow: hidden;">
        @foreach ($sliders as $key => $slider)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset($slider->url) }}" class="d-block w-100" alt="{{ $slider->title ?? 'Slider Image' }}">

                @if(isset($slider->title))
                    <div class="carousel-caption d-none d-md-block slider-caption">
                        <h5 class="animated-caption">{{ $slider->title }}</h5>
                    </div>
                @endif
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
    <!--end carousel Section -->


    <!-- Project Section -->
    <div class="container">
        <div class="row history">

            @foreach ($ourWorks as $ourWork)


            <div class="col-md-3 ">
                <a class="text-decoration-none  history-translateY" href="{{ route('pages',$ourWork['slug']) }}">
                    <div class="card card-b-color">
                        <div class="card-title-history">
                            <b class="font-15"> {!! Str::limit($ourWork['name'], 14, '..') !!}</b>
                        </div>
                        <div class="card-body">
                           <p class="card-text">
                                {{ \Illuminate\Support\Str::limit(strip_tags(str_replace('&nbsp;', ' ', $ourWork['description'])), 150, '..') }}
                            </p>

                        </div>

                    </div>
                </a>
            </div>
            @endforeach

            <!-- card2 Section -->
            <!-- our services  Section -->

        </div>
    </div>
   <!--end Project Section -->


    <!-- Achievements   Section -->
    <div class="container">
        <div class="achievements  text-center mb-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Our Achievements </h2>
        </div>
        <div class="row g-4">
            @foreach ($achievements as $achievement)
                <div class="col-md-4">
                    <div class="card ">
                        <img src="{{ $achievement->img}}" class="card-img-top" alt="...">
                        <div class="achievements-img">
                            <img class="acivment-imgas" src="{{ asset('client/img/achivement3.png')}}" alt="">
                        </div>
                        <div class="achievements-card-title">
                            <b> {{ $achievement->title}}</b>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-center">
                                {{ rtrim(substr(str_replace('&nbsp;', ' ', strip_tags(string: $achievement->description)), 0, 70)) }}{{ strlen(strip_tags($achievement->description)) > 100 ? '...' : '' }}
                            </p>
                        </div>
                        <a class="text-decoration-none" href="{{ route('achievement-details',$achievement->id) }}">
                            <div class="achievements-footer text-center">
                                <b class="">View Details</b>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="text-center mt-4">
            <a href="{{ route('achievement-list') }}" class="btn btn-outline-danger px-5 py-2 rounded-pill shadow-sm"
                style="transition: all 0.4s;">
                <i class="bi bi-trophy me-2"></i> See All Achievements
            </a>
        </div>




    </div>

    <!--end Achievements   Section -->


    <!-- project  Section -->
    <div class="container">
        <div class="achievements text-center my-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">On-Going Projects</h2>
        </div>
        <div class="row g-4">


            @foreach ($projects as $project)
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('client/img/img4.jpg') }}"  class="card-img-top" alt="">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">   <b> {{ $project->title}}</b></h5>
                            <p class="card-text">dd {{ rtrim(substr(str_replace('&nbsp;', ' ', strip_tags(string: $project->location_data)), 0, 70)) }}{{ strlen(strip_tags($achievement->location_data)) > 100 ? '...' : '' }}</p>
                        </div>
                        <a class="text-decoration-none" href="#">
                            <div class="achievements-footer text-center">
                                <b class="">View Details</b>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach



        </div>


        <div class="text-center mt-4">
            <a href="{{ route('ongoing') }}" class="btn btn-outline-danger px-5 py-2 rounded-pill shadow-sm"
                style="transition: all 0.4s;">
                <i class="bi bi-rocket-takeoff-fill me-2"></i> See All On-Going Projects
            </a>
        </div>
    </div>

    <!-- project  Section -->

    <!-- photo  Section

    <div class="container">
        <div class="achievements text-center my-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Photo</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="photo-card position-relative text-center">
                    <a href="./img/donation_2.png" class="glightbox" data-gallery="donation-gallery"
                        data-title="Donate Jakat">
                        <img src="./img/donation_2.png" class="card-img-top" alt="Donation">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </a>

                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card position-relative text-center">
                    <a href="./img/donation_6.png" class="glightbox" data-gallery="donation-gallery"
                        data-title="Sponsor A Child">
                        <img src="./img/donation_6.png" class="card-img-top" alt="Donation">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </a>

                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card position-relative text-center">
                    <a href="./img/donation_4.png" class="glightbox" data-gallery="donation-gallery"
                        data-title="General Donated">
                        <img src="./img/donation_4.png" class="card-img-top" alt="Donation">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </a>

                </div>
            </div>



            <div class="col-md-4">
                <div class="photo-card position-relative text-center">
                    <a href="./img/donation_2.png" class="glightbox" data-gallery="donation-gallery"
                        data-title="Donate Jakat">
                        <img src="./img/donation_2.png" class="card-img-top" alt="Donation">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </a>

                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card position-relative text-center">
                    <a href="./img/donation_6.png" class="glightbox" data-gallery="donation-gallery"
                        data-title="Sponsor A Child">
                        <img src="./img/donation_6.png" class="card-img-top" alt="Donation">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </a>

                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card position-relative text-center">
                    <a href="./img/donation_4.png" class="glightbox" data-gallery="donation-gallery"
                        data-title="General Donated">
                        <img src="./img/donation_4.png" class="card-img-top" alt="Donation">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </a>

                </div>
            </div>
        </div>


    </div>
-->

    <!-- photo  Section -->

    <!-- event  Section -->
    <div class="container">
        <div class="achievements text-center my-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Events & News</h2>
        </div>
        <div class="row g-4">
            @foreach ($events as $event)

             <div class="col-md-4">
                <div class="card ">
                    <img class="stories-img" src="{{ $event->img}}" class="card-img-top" alt="...">
                    <div class="stories-title">
                        <b>{{ $event->title}}</b>
                    </div>

                    <div class="card-body">
                        <p class="card-text">{{ $event->description}}</p>
                    </div>
                    <div class="stories-card-footer text-center">
                        <b class="">View Details</b>
                    </div>
                </div>
            </div>

            @endforeach


        </div>

         <div class="text-center mt-4">
            <a href="all-achievements" class="btn btn-outline-danger px-5 py-2 rounded-pill shadow-sm"
                style="transition: all 0.4s;">
                <i class="bi bi-newspaper me-2"></i> Events & News
            </a>
        </div>
    </div>
    <!-- event  Section -->



    <!-- notice  Section -->

    <div class="container">
        <div class="achievements text-center my-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Notice</h2>
        </div>
        <div class="row g-4">

            <div class="col-md-12">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <table class="table table-hover align-middle">
                            <thead class="table-danger">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <img src="{{ asset('client/img/blog3.png') }}" alt="Notice" class="img-thumbnail me-2"
                                            style="width:80px; height:60px; object-fit:cover;">
                                        <b>সহযোগিতা পারে থ্যালাসেমিয়া </b>
                                    </td>
                                    <td>২৩ আগস্ট ২০২৫</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-success">View Details</a>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <img src="{{ asset('client/img/blog5.png') }}" alt="Notice" class="img-thumbnail me-2"
                                            style="width:80px; height:60px; object-fit:cover;">
                                        <b>সহযোগিতা পারে থ্যালাসেমিয়া </b>
                                    </td>
                                    <td>২৩ আগস্ট ২০২৫</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-success">View Details</a>
                                    </td>
                                </tr>

                                <!-- আরও নোটিশ যোগ করতে পারবেন -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- notice  Section -->

    <!-- donation  Section -->
    <div class="container">
        <div class="achievements text-center my-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Donation</h2>
        </div>
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card ">
                    <img src="{{ asset('client/img/donation_2.png') }}" class="card-img-top" alt="...">
                    <div class="service-card-title">
                        <b>Donate Jakat</b>
                    </div>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer with supporting text below
                            supporting.</p>
                    </div>
                    <a class="text-decoration-none" href="#">
                        <div class="achievements-footer text-center">
                            <b class="">View Details</b>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card ">
                    <img src="{{ asset('client/img/donation_6.png') }}" class="card-img-top" alt="...">
                    <div class="service-card-title">
                        <b>Sponsor A Child</b>
                    </div>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer with supporting text below
                            supporting.</p>
                    </div>
                    <a class="text-decoration-none" href="#">
                        <div class="achievements-footer text-center">
                            <b class="">View Details</b>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card ">
                    <img src="{{ asset('client/img/donation_4.png') }}" class="card-img-top" alt="...">
                    <div class="service-card-title">
                        <b>General Donate</b>
                    </div>
                    <div class="card-body">

                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer with supporting text below
                            supporting.</p>
                    </div>
                    <a class="text-decoration-none" href="#">
                        <div class="achievements-footer text-center">
                            <b class="">Donate Now</b>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- donation  Section -->

    <!-- donexecutive   Section -->


    <div class="container">
        <div class="achievements text-center my-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Executive Committee</h2>
        </div>
        <div class="row g-4">

            @foreach($cards as $card)

            <!-- Member 1 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                        <img src="{{$card->img }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>{{ $card->name }}</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>{{ $card->position }}</small>
                    </div>
                </div>
            </div>
             @endforeach
        </div>

          <div class="text-center mt-4">
            <a href="{{ route('Committeelist') }}" class="btn btn-outline-danger px-5 py-2 rounded-pill shadow-sm"
                style="transition: all 0.4s;">
                <i class="bi bi-rocket-takeoff-fill me-2"></i> See All Executive Committee
            </a>
        </div>
    </div>



    <div class="container">
        <div class="achievements text-center my-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Advisory Committee</h2>
        </div>
        <div class="row g-4">
            @foreach($advisoryCommittees as $advisoryCommittee)
            <!-- Member 1 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                        <img src="{{ $advisoryCommittee->img }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>{{$advisoryCommittee->title }}</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>{{$advisoryCommittee->designation }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('advisoryBoard') }}" class="btn btn-outline-danger px-5 py-2 rounded-pill shadow-sm"
                style="transition: all 0.4s;">
                <i class="bi bi-rocket-takeoff-fill me-2"></i> See All Advisory Committee
            </a>
        </div>

    </div>

    <!-- story   Section -->
    <div class="container py-5">
        <div class="achievements text-center my-4">

            <h2 class="fw-bold d-inline-block position-relative pb-2">Success Story</h2>
        </div>

        <div class="row g-4">
            @foreach($succesStorys as $succesStory)
            <!-- Story Item -->
            <div class="col-md-3 col-sm-6">
                <div class="card story-card border-0 shadow h-100 text-center">
                    <div class="story-img overflow-hidden">
                        <img src="{{$succesStory->img }}" class="img-fluid" alt="Story Image">
                    </div>
                    <div class="executive-name mb-1">
                        <b>{{$succesStory->title }}</b>
                    </div>
                    <div class="card-body">

                        <p class="story-title text-muted mb-0">{{$succesStory->description }}</p>
                    </div>
                </div>


            </div>
            @endforeach
        </div>
         <div class="text-center mt-4">
                    <a href="{{ route('succesStory') }}" class="btn btn-outline-danger px-5 py-2 rounded-pill shadow-sm"
                        style="transition: all 0.4s;">
                        <i class="bi bi-rocket-takeoff-fill me-2"></i> See All Success Story
                    </a>
                </div>
    </div>

    </div>
@endsection


@push('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var myCarousel = document.querySelector('#carouselExampleCaptions');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 4000,   // 4 seconds
        ride: 'carousel',
        pause: false       // hover করলে pause হবে না
    });
});
</script>

@endpush
