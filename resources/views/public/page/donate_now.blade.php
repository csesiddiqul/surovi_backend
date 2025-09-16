


@extends('layouts.main_pub')

@push('styles')
    <style>
        /* body{
            color: rgb(165, 112, 218);
        } */
    </style>
@endpush

@section('title')
 Surovi Donate
@endsection
@section('content')

  <div class="container py-4" data-aos="fade-up">
            <div class="achievements text-center mb-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Donation</h2>
        </div>

    <div class="row">
        @foreach($donations as $donation)
            <div class="col-md-6 col-lg-4 mb-4">
                   <a href="{{ route('pub.donate', ['id' => $donation->id, 'type' => $donation->type]) }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 rounded">
                        <img src="{{ asset('backend/img/donation/' . $donation->image) }}"
                            class="card-img-top rounded-top"
                            alt="Donation Image"
                            style="height: 250px; object-fit: cover;">

                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title text-primary mb-2 text-dark text-center">{!! Str::limit($donation->title, 30, '...')  !!}</h6>

                            <a class="text-decoration-none" href="{{ route('pub.donate', ['id' => $donation->id, 'type' => $donation->type]) }}">
                        <div class="achievements-footer text-center">
                            <b class="">View Details</b>
                        </div>
                    </a>
                        </div>
                    </div>
                 </a>
            </div>
        @endforeach
    </div>
  </div>
@endsection


@push('js')
<script>

</script>

@endpush
