
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
    <div id="carouselExampleCaptions" class="carousel slide container">
    <!-- Slides -->
    <div class="carousel-inner" style="border-radius: 8px;">
        @foreach ($sliders as $key => $slider)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset($slider->url) }}" class="d-block w-100" alt="{{ $slider->title ?? 'Slider Image' }}">

                @if(isset($slider->title))
                    <div class="carousel-caption d-none d-md-block slider-caption">
                        <h5>{{ $slider->title }}</h5>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    <!-- carousel Section -->


    <!-- Project Section -->
    <div class="container">
        <div class="row history">
            <div class="col-md-3 ">
                <a class="text-decoration-none  history-translateY" href="#">
                    <div class="card card-b-color">
                        <div class="card-title-history">
                            <b class="font-15">Education and Skill Development</b>
                        </div>
                        <div class="card-body">

                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer with supporting text below
                                supporting.</p>
                        </div>

                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a class="text-decoration-none history-translateY" href="#">
                    <div class="card card-b-color">
                        <div class="card-title-history">
                            <b class="font-15">Water, Sanitation & Hygiene (WASH) </b>
                        </div>
                        <div class="card-body">

                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer with supporting text below
                                supporting.</p>
                        </div>

                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a class="text-decoration-none history-translateY" href="#">
                    <div class="card card-b-color">
                        <div class="card-title-history">
                            <b class="font-15">Emergency Response & Humanitarian Support </b>
                        </div>
                        <div class="card-body">

                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer with supporting text below
                                supporting.</p>
                        </div>

                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a class="text-decoration-none history-translateY" href="#">
                    <div class="card card-b-color">
                        <div class="card-title-history">
                            <b class="font-15">Sponsorship & Scholarship</b>
                        </div>
                        <div class="card-body pb-2">

                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer with supporting text below
                                supporting. This content is a little bit.

                            </p>
                        </div>
                    </div>
                </a>
            </div>


            <!-- card2 Section -->
            <!-- our services  Section -->

        </div>
    </div>



    <!-- Achievements   Section -->
    <div class="container">
        <div class="achievements  text-center mb-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Our Achievements</h2>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="card ">
                    <img src="{{ asset('client/img/acivment2.png') }}" class="card-img-top" alt="...">
                    <div class="achievements-img">
                        <img class="acivment-imgas" src="{{ asset('client/img/achivement3.png')}}" alt="">
                    </div>
                    <div class="achievements-card-title">
                        <b> international</b>
                    </div>
                    <div class="card-body">

                        <p class="card-text text-center">This is a wider card with supporting text below .
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
                    <img src="{{ asset('client/img/acivment2.png') }}" class="card-img-top" alt="...">
                    <div class="achievements-img">
                        <img class="acivment-imgas" src="{{ asset('client/img/achivement3.png') }}" alt="">
                    </div>
                    <div class="achievements-card-title">
                        <b> international</b>
                    </div>
                    <div class="card-body">

                        <p class="card-text text-center">This is a wider card with supporting text below .
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
                            <img src="{{ asset('client/img/acivment2.png') }}" class="card-img-top" alt="...">
                    <div class="achievements-img">
                        <img class="acivment-imgas" src="{{ asset('client/img/achivement3.png') }}" alt="">
                    </div>
                    <div class="achievements-card-title">
                        <b> international</b>
                    </div>
                    <div class="card-body">

                        <p class="card-text text-center">This is a wider card with supporting text below .
                            supporting.</p>
                    </div>
                    <a class="text-decoration-none" href="#">
                        <div class="achievements-footer text-center">
                            <b class="">View Details</b>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Achievements   Section -->
    <!-- project  Section -->
    <div class="container">
        <div class="achievements text-center my-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">On-Going Projects</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ asset('client/img/img4.jpg') }}"  class="card-img-top" alt="">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Safe Water & Sanitation </h5>
                        <p class="card-text">Kurigram, Sunamgonj & Lakshmipur District in Bangladesh</p>
                    </div>
                    <a class="text-decoration-none" href="#">
                        <div class="achievements-footer text-center">
                            <b class="">View Details</b>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ asset('client/img/img4.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Hands in Girls Health (HIGH)</h5>
                        <p class="card-text"> Narayangonj and Laxmipur Pourasava Laxmipur Pourasava </p>
                    </div>
                    <a class="text-decoration-none" href="#">
                        <div class="achievements-footer text-center">
                            <b class="">View Details</b>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ asset('client/img/img5.jpg') }}" class="card-img-top" alt="Diagnostic">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold"> Qurbani/Udhiya in Bangladesh</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural.</p>
                    </div>
                    <a class="text-decoration-none" href="#">
                        <div class="achievements-footer text-center">
                            <b class="">View Details</b>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ asset('client/img/img4.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Safe Water & Sanitation </h5>
                        <p class="card-text">Kurigram, Sunamgonj & Lakshmipur District in Bangladesh</p>
                    </div>
                    <a class="text-decoration-none" href="#">
                        <div class="achievements-footer text-center">
                            <b class="">View Details</b>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ asset('client/img/img5.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Hands in Girls Health (HIGH)</h5>
                        <p class="card-text"> Narayangonj and Laxmipur Pourasava Laxmipur Pourasava </p>
                    </div>
                    <a class="text-decoration-none" href="#">
                        <div class="achievements-footer text-center">
                            <b class="">View Details</b>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ asset('client/img/img6.jpg') }}" class="card-img-top" alt="Diagnostic">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold"> Qurbani/Udhiya in Bangladesh</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural </p>
                    </div>
                    <a class="text-decoration-none" href="#">
                        <div class="achievements-footer text-center">
                            <b class="">View Details</b>
                        </div>
                    </a>
                </div>
            </div>
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
            <div class="col-md-4">
                <div class="card ">
                    <img class="stories-img" src="{{ asset('client/img/bolg2.png') }}" class="card-img-top" alt="...">
                    <div class="stories-title">
                        <b>সুরভি'র রামাদান প্রোগ্রাম-২০২৫</b>
                    </div>

                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer with supporting text below
                            supporting.</p>
                    </div>
                    <div class="stories-card-footer text-center">
                        <b class="">View Details</b>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card ">
                    <img class="stories-img" src="{{ asset('client/img/blog3.png') }}" class="card-img-top" alt="...">
                    <div class="stories-title">
                        <b>২১শে ফেব্রুয়ারি ২০২৫</b>
                    </div>

                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer with supporting text below
                            supporting.</p>
                    </div>
                    <div class="stories-card-footer text-center">
                        <b class="">View Details</b>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card ">
                    <img class="stories-img" src="{{ asset('client/img/blog5.png') }}" class="card-img-top" alt="...">
                    <div class="stories-title">
                        <b>ডা. জুবাইদা রহমান এর সুরভি পরিদর্শন</b>
                    </div>

                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer with supporting text below
                            supporting.</p>
                    </div>
                    <div class="stories-card-footer text-center">
                        <b class="">View Details</b>
                    </div>
                </div>
            </div>




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

            <!-- Member 1 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                        <img src="{{ asset('client/img/executive2.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Eng. Kaji Ali Ashraf</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Executive Member (Dve)</small>
                    </div>
                </div>
            </div>

            <!-- Member 2 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                        <img src="{{ asset('client/img/executive3.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Eng. Mohd Habibur Rahman</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Treasurer</small>
                    </div>
                </div>
            </div>

            <!-- Member 3 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                        <img src="{{ asset('client/img/executive2.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Dr. Md. Zahidul Islam</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Senior Vice President</small>
                    </div>
                </div>
            </div>

            <!-- Member 4 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                        <img src="{{ asset('client/img/executive2.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Eng. Kaji Ali Ashraf</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Executive Member (Dve)</small>
                    </div>
                </div>
            </div>

            <!-- Member 5 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                     <img src="{{ asset('client/img/executive3.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Eng. Mohd Habibur Rahman</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Treasurer</small>
                    </div>
                </div>
            </div>

            <!-- Member 6 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                   <img src="{{ asset('client/img/executive2.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Dr. Md. Zahidul Islam</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Senior Vice President</small>
                    </div>
                </div>
            </div>

            <!-- Member 7 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
               <img src="{{ asset('client/img/executive3.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Md. Khosed Ali Sarker</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Vice President</small>
                    </div>
                </div>
            </div>

            <!-- Member 8 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                      <img src="{{ asset('client/img/executive2.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Dr. Md. Zahidul Islam</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Senior Vice President</small>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="container">
        <div class="achievements text-center my-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Advisory Committee</h2>
        </div>
        <div class="row g-4">

            <!-- Member 1 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                        <img src="{{ asset('client/img/executive2.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Eng. Kaji Ali Ashraf</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Executive Member (Dve)</small>
                    </div>
                </div>
            </div>

            <!-- Member 2 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                        <img src="{{ asset('client/img/executive3.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Eng. Mohd Habibur Rahman</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Treasurer</small>
                    </div>
                </div>
            </div>

            <!-- Member 3 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                        <img src="{{ asset('client/img/executive2.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Dr. Md. Zahidul Islam</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Senior Vice President</small>
                    </div>
                </div>
            </div>

            <!-- Member 4 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                        <img src="{{ asset('client/img/executive2.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Eng. Kaji Ali Ashraf</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Executive Member (Dve)</small>
                    </div>
                </div>
            </div>

            <!-- Member 5 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                     <img src="{{ asset('client/img/executive3.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Eng. Mohd Habibur Rahman</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Treasurer</small>
                    </div>
                </div>
            </div>

            <!-- Member 6 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                   <img src="{{ asset('client/img/executive2.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Dr. Md. Zahidul Islam</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Senior Vice President</small>
                    </div>
                </div>
            </div>

            <!-- Member 7 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
               <img src="{{ asset('client/img/executive3.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Md. Khosed Ali Sarker</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Vice President</small>
                    </div>
                </div>
            </div>

            <!-- Member 8 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                      <img src="{{ asset('client/img/executive2.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>Dr. Md. Zahidul Islam</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>Senior Vice President</small>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- story   Section -->
    <div class="container py-5">
        <div class="achievements text-center my-4">

            <h2 class="fw-bold d-inline-block position-relative pb-2">Success Story</h2>
        </div>

        <div class="row g-4">

            <!-- Story Item -->
            <div class="col-md-3 col-sm-6">
                <div class="card story-card border-0 shadow h-100 text-center">
                    <div class="story-img overflow-hidden">
                        <img src="{{ asset('client/img/blog5.png') }}" class="img-fluid" alt="Story Image">
                    </div>
                    <div class="card-body">

                        <p class="story-title text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Facilis, amet?</p>
                    </div>
                </div>
            </div>

            <!-- Story Item -->
            <div class="col-md-3 col-sm-6">
                <div class="card story-card border-0 shadow h-100 text-center">
                    <div class="story-img overflow-hidden">
                            <img src="{{ asset('client/img/blog3.png') }}" class="img-fluid" alt="Story Image">
                    </div>
                    <div class="card-body">

                        <p class="story-title text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Facilis, amet?</p>
                    </div>
                </div>
            </div>

            <!-- Story Item -->
            <div class="col-md-3 col-sm-6">
                <div class="card story-card border-0 shadow h-100 text-center">
                    <div class="story-img overflow-hidden">
                            <img src="{{ asset('client/img/blog5.png') }}" class="img-fluid" alt="Story Image">
                    </div>
                    <div class="card-body">

                        <p class="story-title text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Facilis, amet?</p>
                    </div>
                </div>
            </div>

            <!-- Story Item -->
            <div class="col-md-3 col-sm-6">
                <div class="card story-card border-0 shadow h-100 text-center">
                    <div class="story-img overflow-hidden">
                         <img src="{{ asset('client/img/bolg2.png') }}" class="img-fluid" alt="Story Image">
                    </div>
                    <div class="card-body">

                        <p class="story-title text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Facilis, amet?</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
@endsection
