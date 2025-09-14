
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

<div class="container py-5">
        <div class="achievements text-center my-4">

            <h2 class="fw-bold d-inline-block position-relative pb-2">Success Story</h2>
        </div>
             <form method="GET" action="{{ route('succesStory') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       placeholder="Search by title..."
                       value="{{ request('search') }}">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </form>

        <div class="row g-4">
            @foreach($succesStorys as $succesStory)
            <!-- Story Item -->
            <div class="col-md-3 col-sm-6">
                <div class="card story-card border-0 shadow h-100 text-center">
                    <div class="story-img overflow-hidden">
                        <img src="{{$succesStory->img }}" class="img-fluid" alt="Story Image">
                    </div>
                    <div class="executive-name mb-1">
                        <b>{{$succesStory->title }}</b>
                    </div>
                    <div class="card-body">

                        <p class="story-title text-muted mb-0">{{$succesStory->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

               <!-- Pagination -->
        <div class="mt-3">
            {{ $succesStorys->appends(request()->query())->links() }}
        </div>

    </div>
@endsection


@push('js')
<script>

</script>

@endpush
