
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

    <div class="container p-5">
            <div class="events  text-center p-5">
                <h2 class="fw-bold d-inline-block position-relative pb-2">Our Video Details </h2>
            </div>

        <div class="card event-card pb-5">
            <div class="row g-0 align-items-center">
                <iframe class="lol" src="{{ $videogas->video}}" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                    <p class="details"> </p>

                <!-- Text Right -->
                <div class="col-md-6 p-4">

                    <div class="events-card-title">{{ $videogas->title }} </div>
                    <p class="card-text">
                        {!! $videogas->description !!}
                    </p>
                </div>
            </div>
        </div>

    </div>


@endsection

@push('js')
<script>

</script>

@endpush
