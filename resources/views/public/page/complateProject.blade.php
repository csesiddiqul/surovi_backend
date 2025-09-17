
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

<div class="container pb-4">
        <div class="achievements text-center p-5">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Complete Projects</h2>
        </div>

        <form method="GET" action="{{ route('complete') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       placeholder="Search by title..."
                       value="{{ request('search') }}">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </form>

        <div class="row g-4">
            @foreach ($complates as $complate)
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="{{ $complate->img }}"  class="card-img-top" alt="">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">   <b> {{ $complate->title}}</b></h5>
                            <p class="card-text">dd {{ rtrim(substr(str_replace('&nbsp;', ' ', strip_tags(string: $complate->location_data)), 0, 70)) }}{{ strlen(strip_tags($complate->location_data)) > 100 ? '...' : '' }}</p>
                        </div>
                         <a class="text-decoration-none" href="{{ route('completeDetails',$complate->id) }}">
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
            {{ $complates->appends(request()->query())->links() }}
        </div>
    </div>
@endsection


@push('js')
<script>

</script>

@endpush
