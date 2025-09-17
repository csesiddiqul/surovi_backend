
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


           <!-- event  Section -->
    <div class="container pb-4">
        <div class="achievements text-center my-4">
            <h2 class="fw-bold d-inline-block position-relative p-4">Events & News</h2>
        </div>

        <form method="GET" action="{{ route('evenNews') }}" class="mb-5">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       placeholder="Search by title..."
                       value="{{ request('search') }}">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </form>

        <div class="row g-4 ">
            @foreach ($events as $event)

                <div class="col-md-4">
                    <div class="card ">
                        <img class="stories-img" src="{{ $event->img }}" class="card-img-top" alt="...">
                        <div class="stories-title">
                            <b>{!! Str::limit($event->title, 25, '..') !!}</b>
                        </div>


                        <a class="text-decoration-none" href="{{ route('eventDetail',$event->id) }}">
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
            {{ $events->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
@push('js')
<script>

</script>

@endpush
