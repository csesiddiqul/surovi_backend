
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

<div class="container">
        <div class="achievements text-center my-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">On-Going Projects</h2>
        </div>

           <form method="GET" action="{{ route('ongoing') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       placeholder="Search by title..."
                       value="{{ request('search') }}">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </form>

        <div class="row g-4">
            @foreach ($projects as $project)
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="{{ $project->img }}"  class="card-img-top" alt="">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">   <b> {{ $project->title}}</b></h5>
                            <p class="card-text">dd {{ rtrim(substr(str_replace('&nbsp;', ' ', strip_tags(string: $project->location_data)), 0, 70)) }}{{ strlen(strip_tags($project->location_data)) > 100 ? '...' : '' }}</p>
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
            <!-- Pagination -->
        <div class="mt-3">
            {{ $projects->appends(request()->query())->links() }}
        </div>
    </div>

@endsection


@push('js')
<script>

</script>

@endpush
