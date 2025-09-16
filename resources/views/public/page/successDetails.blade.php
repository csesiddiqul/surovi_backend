@extends('layouts.main_pub')

@push('styles')
<style>

    .succesStory-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        margin-bottom: 40px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #f8f9fa ;
    }
    .succesStory-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0,0,0,0.2);
    }

    .succesStory-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .succesStorys-card-title {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #3b3b3b;
    }

    .succesStory-card .card-text {
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .succesStory-card {
            flex-direction: column !important;
        }
        .succesStory-card .col-md-6 {
            margin-bottom: 20px;
        }
        .succesStorys-card-title {
            font-size: 1.4rem;
        }
    }
</style>
@endpush

@section('title')
Success Story Details
@endsection

@section('content')
<div class="container">
    <div class="succesStorys  text-center p-5">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Our Succes Story Details </h2>
    </div>

    <div class="card succesStory-card p-3">
        <div class="row g-0 align-items-center">


            <!-- Image Left -->
            <div class="col-md-6">
                <img src="{{ $succesStory->img }}" alt="Event Image" class="succesStory-img">
            </div>

            <!-- Text Right -->
            <div class="col-md-6 p-4">

                <div class="succesStorys-card-title">{{ $succesStory->title }} </div>
                <p class="card-text">
                    {!! $succesStory->description !!}
                </p>


            </div>
        </div>
    </div>





</div>
@endsection

@push('js')
<script>
// Optional JS
</script>
@endpush
