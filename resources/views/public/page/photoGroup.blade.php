@extends('layouts.main_pub')

@push('styles')
<style>
    /* Section Heading */
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
        background: #198754;
        bottom: 0;
        left: 20%;
        border-radius: 5px;
    }

    /* Card Design */
    .card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    .card img {
        height: 220px;
        object-fit: cover;
    }

    .achievements-card-title {
        font-size: 1.1rem;
        text-align: center;
        padding: 10px;
        background: #f8f9fa;
        font-weight: 600;
        border-bottom: 1px solid #e9ecef;
    }

    .card-body {
        padding: 1rem;
    }

    .card-body p {
        font-size: 0.95rem;
        color: #6c757d;
    }

    .achievements-footer {
        background: #198754;
        color: #fff;
        padding: 0.7rem;
        transition: background 0.3s ease-in-out;
    }

    .achievements-footer:hover {
        background: #157347;
        cursor: pointer;
    }

    .search-bar {
        max-width: 500px;
        margin: 0 auto 20px auto;
    }
</style>
@endpush

@section('title')
    Achievement Details
@endsection

@section('content')

<div class="container">
    <!-- Section Title -->

      <div class="events  text-center p-5">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Our Photo Album</h2>
    </div>

    <!-- Search -->
    <form method="GET" action="{{ route('photo_gallery') }}" class="mb-5 search-bar">
        <div class="input-group">
            <input type="text" name="search" class="form-control"
                   placeholder="Search by title..."
                   value="{{ request('search') }}">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-search me-1"></i> Search
            </button>
        </div>
    </form>

    <!-- Cards -->
    <div class="row g-4 pb-4">
        @forelse ($photogas as $photoga)
            <div class="col-md-4 col-sm-6">
                <div class="card h-100">
                     <a class="text-decoration-none" href="{{ route('photo_gallery', $photoga->id) }}">
                    <img src="{{ $photoga->img }}" class="card-img-top" alt="Achievement">

                    <div class="achievements-card-title">
                        {{ $photoga->group_name }}
                    </div>

                    <div class="card-body">
                        <p class="card-text text-center">
                            {{ \Illuminate\Support\Str::limit(strip_tags(str_replace('&nbsp;', ' ', $photoga->description)), 70) }}
                        </p>
                    </div>



                    </a>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>No achievements found.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $photogas->appends(request()->query())->links() }}
    </div>
</div>

@endsection

@push('js')
<script>
    // Optional JS (future enhancement: lightbox, filter, etc.)
</script>
@endpush
