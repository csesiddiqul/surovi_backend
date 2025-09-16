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
        <h2 class="fw-bold d-inline-block position-relative p-4">
            Our Photo Gellary
        </h2>
    </div>
      <form method="GET" action="{{ route('photo_gallery') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       placeholder="Search by title..."
                       value="{{ request('search') }}">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </form>
    {{-- 🔍 Search Bar --}}
    <div class="row mb-4">
        <div class="col-12">

        </div>
    </div>

    {{-- Achievement Cards --}}
    <div class="row g-4 pb-4">
        @forelse ($photogas as $photoga)
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ $photoga->img }}" class="card-img-top" alt="Achievement">

                    <div class="achievements-card-title">
                        <b>{{ $photoga->title }}</b>
                    </div>

                    <div class="card-body">
                        <p class="card-text text-center">
                            {{ \Illuminate\Support\Str::limit(strip_tags(str_replace('&nbsp;', ' ', $photoga->description)), 70) }}
                        </p>
                    </div>

                    <a class="text-decoration-none" href="{{ route('photoDetails', $photoga->id) }}">
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
        {{ $photogas->appends(request()->query())->links() }}
    </div>
</div>





        @endsection

@push('js')
<script>
    // Optional JS
</script>
@endpush
