@extends('layouts.main_pub')

@push('styles')
<style>

    .event-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        margin-bottom: 40px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #f8f9fa ;
    }
    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0,0,0,0.2);
    }

    .event-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .events-card-title {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #3b3b3b;
    }

    .event-card .card-text {
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .event-card {
            flex-direction: column !important;
        }
        .event-card .col-md-6 {
            margin-bottom: 20px;
        }
        .events-card-title {
            font-size: 1.4rem;
        }
    }
</style>
@endpush

@section('title')
Event Details
@endsection

@section('content')
<div class="container">
    <div class="events  text-center mb-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Our Events & News Details </h2>
    </div>

    <div class="card event-card p-3">
        <div class="row g-0 align-items-center">


            <!-- Image Left -->
            <div class="col-md-6">
                <img src="{{ $event->img }}" alt="Event Image" class="event-img">
            </div>

            <!-- Text Right -->
            <div class="col-md-6 p-4">

                <div class="events-card-title">{{ $event->title }} </div>
                <p class="card-text">
                    {!! $event->description !!}
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
