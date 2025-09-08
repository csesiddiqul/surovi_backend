
@extends('layouts.main_pub')

@push('styles')
    <style>
    .card img {
        object-fit: cover;
        width: 100%;
        height: auto;
    }
    .card-body p {
        text-align: justify;
    }
    </style>
@endpush

@section('title')
 Surovi
@endsection
@section('content')
<div class="container my-5">
    <div class="row g-4 align-items-start">

        {{-- যদি image থাকে --}}
        @if($page->img)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <img src="{{ $page->img }}" class="card-img-top rounded-3" alt="Page Image">
                </div>
            </div>
        @endif

        {{-- Description --}}
        <div class="{{ $page->img ? 'col-md-8' : 'col-md-12' }}">
            <div class="card border-0 shadow-sm p-4 h-100">
                <div class="card-body">
                    <p class="text-muted" style="line-height: 1.8; font-size: 1rem;">
                        {!! \Illuminate\Support\Str::limit(substr($page->description, 0), 650) !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm p-4">
                <div class="card-body">
                    <p class="text-muted" style="line-height: 1.8; font-size: 1rem;">
                        {!! $page->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>

</script>
@endpush
