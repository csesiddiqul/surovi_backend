@extends('layouts.main_pub')

@push('styles')
<style>
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
    <div class="achievements text-center mb-4">
        <h2 class="fw-bold d-inline-block position-relative pb-2">
            Our Achievements
        </h2>
    </div>

    {{-- 🔍 Search Bar --}}
    <div class="row mb-4">
        <div class="col-12">
            <form action="{{ route('achievement-list') }}" method="GET" class="search-bar d-flex">
                <input type="text" name="search" value="{{ request('search') }}"
                       class="form-control me-2" placeholder="Search achievements...">
                <button type="submit" class="btn btn-danger">Search</button>
            </form>
        </div>
    </div>

    {{-- Achievement Cards --}}
    <div class="row g-4">
        @forelse ($achievements as $achievement)
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ $achievement->img }}" class="card-img-top" alt="Achievement">

                    <div class="achievements-card-title">
                        <b>{{ $achievement->title }}</b>
                    </div>

                    <div class="card-body">
                        <p class="card-text text-center">
                            {{ \Illuminate\Support\Str::limit(strip_tags(str_replace('&nbsp;', ' ', $achievement->description)), 70) }}
                        </p>
                    </div>

                    <a class="text-decoration-none" href="{{ route('achievement-details', $achievement->id) }}">
                        <div class="achievements-footer text-center">
                            <b>View Details</b>
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

    {{-- Pagination --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $achievements->appends(request()->query())->links() }}
    </div>
</div>
@endsection

@push('js')
<script>
    // Optional JS
</script>
@endpush
