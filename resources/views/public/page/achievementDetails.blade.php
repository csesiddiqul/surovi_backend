@extends('layouts.main_pub')

@push('styles')
<style>

    .achievement-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        margin-bottom: 40px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #f8f9fa ;
    }
    .achievement-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0,0,0,0.2);
    }

    .achievement-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .achievements-card-title {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #3b3b3b;
    }

    .achievement-card .card-text {
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .achievement-card {
            flex-direction: column !important;
        }
        .achievement-card .col-md-6 {
            margin-bottom: 20px;
        }
        .achievements-card-title {
            font-size: 1.4rem;
        }
    }
</style>
@endpush

@section('title')
Achievement Details
@endsection

@section('content')
<div class="container">
    <div class="achievements  text-center mb-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Our Achievements Details </h2>
    </div>

    <div class="card achievement-card p-3">
        <div class="row g-0 align-items-center">


            <!-- Image Left -->
            <div class="col-md-6">
                <img src="{{ $achievement->img }}" alt="Achievement Image" class="achievement-img">
            </div>

            <!-- Text Right -->
            <div class="col-md-6 p-4">

                <div class="achievements-img">
                            <img class="acivment-imgas" src="{{ asset('client/img/achivement3.png')}}" alt="">
                </div>
                <div class="achievements-card-title">{{ $achievement->title }} </div>
                <p class="card-text">
                    {!! $achievement->description !!}
                </p>


            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4 class="fw-bold mb-4 border-start border-4 border-danger ps-3">Related</h4>
    </div>

    <div class="row g-4 mb-4">
        @forelse ($achievements as $achievement)
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden hover-card">
                    <img src="{{ $achievement->img }}" class="card-img-top" alt="Achievement">

                    <div class="card-body text-center p-3">
                        <h6 class="fw-bold text-dark mb-2">{{ $achievement->title }}</h6>
                        <p class="card-text small text-muted">
                            {{ \Illuminate\Support\Str::limit(strip_tags(str_replace('&nbsp;', ' ', $achievement->description)), 70) }}
                        </p>
                    </div>

                    <div class="card-footer bg-danger text-white text-center py-2">
                        <a href="{{ route('achievement-details', $achievement->id) }}"
                        class="text-white fw-semibold text-decoration-none d-block">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">No achievements found.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection

@push('js')
<script>
// Optional JS
</script>
@endpush
