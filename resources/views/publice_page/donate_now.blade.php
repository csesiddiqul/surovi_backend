@extends('layouts.public');

@section('content');
<section class="main-about">
			<div class="about-bg">
				<div class="container">
					<h1 style="margin-top:5%; color:#d00b01;">Donate Now</span></h1>
				</div>
			</div>

		</section>


  <div class="container py-5" data-aos="fade-up">
    <div class="row">
        @foreach($donations as $donation)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded">
                    <img src="{{ asset('backend/img/donation/' . $donation->image) }}"
                         class="card-img-top rounded-top"
                         alt="Donation Image"
                         style="height: 250px; object-fit: cover;">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary mb-4">{{ $donation->title }}</h5>


                        <div class="mt-auto">
                            <a href="{{ route('pub.donate',$donation->id) }}" class="btn btn-outline-primary w-100 rounded-pill">
                                <i class="fa-solid fa-hand-holding-heart me-2"></i> DONATE NOW
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>




@endsection
