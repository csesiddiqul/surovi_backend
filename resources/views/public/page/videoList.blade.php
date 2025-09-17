@extends('layouts.main_pub')

@push('styles')
<style>
    .achievements h2 {
        font-size: 2rem;
        font-weight: 700;
        display: inline-block;
        position: relative;
    }

    .achievements h2::after {
        content: "";
        position: absolute;
        width: 60%;
        height: 3px;
        background: #198754; /* green underline */
        bottom: 0;
        left: 20%;
        border-radius: 5px;
    }

    .commite-card .card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        height: 100%;
    }

    .commite-card .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .commite-card iframe {
        width: 100%;
        height: 180px;
        border: none;
        border-radius: 12px 12px 0 0;
    }

    .card-body .title {
        font-weight: 600;
        font-size: 1rem;
        color: #212529;
        display: block;
        margin-top: 10px;
        text-decoration: none;
    }

    .card-body .title:hover {
        color: #198754;
    }

    .details {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .readmore {
        font-weight: 500;
        color: #198754;
    }

    .readmore:hover {
        text-decoration: underline;
    }

    /* Pagination center align */
    .pagination {
        justify-content: center;
    }
</style>
@endpush

@section('title')
 Surovi
@endsection

@section('content')

<div class="container">
    <!-- Section Title -->
     <div class="events  text-center p-5">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Video Gallery </h2>
    </div>

    <!-- Search -->
    <form method="GET" action="{{ route('videoGallery') }}" class="mb-5">
        <div class="input-group">
            <input type="text" name="search" class="form-control"
                placeholder="Search by title..."
                value="{{ request('search') }}">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-search me-1"></i> Search
            </button>
        </div>
    </form>

    <!-- Video Gallery Grid -->
    <div class="row g-4">
        @foreach($videogas as $key => $videodata)
            <div class="col-md-3 col-sm-6">
                <div class="commite-card">
                    <div class="card h-100">
                        <iframe src="{{ $videodata->video }}" title="YouTube video player"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                        </iframe>
                        <div class="card-body">
                            <a href="{{ route('videoDetails', $videodata->id) }}" class="title">
                                {{ \Illuminate\Support\Str::limit($videodata->title, 30) }}
                            </a>
                            <p class="details">
                                {{ \Illuminate\Support\Str::limit($videodata->description, 60) }}
                                <a class="readmore" href="{{ route('videoDetails', $videodata->id) }}">Read more...</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $videogas->appends(request()->query())->links() }}
    </div>
</div>

@endsection
