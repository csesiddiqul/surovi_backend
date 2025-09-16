
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
            <div class="achievements text-center p-5">
                <h2 class="fw-bold d-inline-block position-relative pb-2">
                    Our Video Gallery
                </h2>
            </div>

            <form method="GET" action="{{ route('videoGallery') }}" class="mb-5">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                        placeholder="Search by title..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </form>

            <div class="row ">
                @foreach($videogas as $key=> $videodata)
                    <div class="col-md-3 pb-4">
                        <div class="commite-card ">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <a class="text-decoration-none" href="{{ route('videoDetails', $videodata->id)}}">
                                        <div class="item item-control">
                                            <iframe class="lol" src="{{$videodata->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <p class="details"> </p>
                                            <a class="text-decoration-none" href="{{ route('videoDetails', $videodata->id)}}" class="title">{{\Illuminate\Support\Str::limit($videodata->title,20)}}</a>

                                            <p  class="details">{{\Illuminate\Support\Str::limit($videodata->description,30)}} <a class="readmore mt-2 text-decoration-none" href="{{ route('videoDetails', $videodata->id)}}"></br>Read more...</a></p>

                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Pagination -->
                        <div class="mt-3">
                            {{ $videogas->appends(request()->query())->links() }}
                        </div>
                    </div>
                @endforeach
            </div>
    </div>

@endsection
@push('js')
    <script>
    </script>
@endpush
