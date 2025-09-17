@extends('layouts.main_pub')

@push('styles')
<style>
    /* Section Header */
    .main-about {
        margin-top: 4rem;
        margin-bottom: 2rem;
        text-align: center;
    }

    .main-about h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #212529;
        position: relative;
        display: inline-block;
        padding-bottom: .5rem;
    }

    .main-about h1::after {
        content: "";
        width: 60%;
        height: 3px;
        background: #198754; /* Bootstrap success green */
        position: absolute;
        bottom: 0;
        left: 20%;
        border-radius: 2px;
    }

    /* Card-like content */
    .content-box {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,.08);
        padding: 1.5rem;
        margin-bottom: 2rem;
        transition: all .3s ease-in-out;
    }

    .content-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(0,0,0,.15);
    }

    .content-box h2 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: #198754;
    }

    .content-box p {
        font-size: 1rem;
        color: #495057;
        line-height: 1.6;
    }

    .img-side {
        border-radius: 10px;
        object-fit: cover;
        max-height: 200px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
</style>
@endpush

@section('content')

    @foreach($devlopment as $key=> $devlopment)




        <div class="container">
             <div class="achievements text-center my-4">
                <h2 class="fw-bold d-inline-block position-relative p-4">Mission & Vision</h2>
            </div>
            <div class="row g-4">
                <!-- Left side -->
                <div class="col-lg-8">
                    <div class="content-box">
                        <p><strong>{{ $devlopment->title_one }}</strong></p>
                        <div class="row g-3 align-items-start">
                            <div class="col-md-4">
                                <img src="{{ $devlopment->img }}" class="img-fluid img-side" alt="Image">
                            </div>
                            <div class="col-md-8">
                                <p>{!! nl2br($devlopment->description_one) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right side -->
                <div class="col-lg-4">
                    <div class="content-box">
                        <p><strong>{{ $devlopment->title_tow }}</strong></p>
                        <p>{!! nl2br($devlopment->description_tow) !!}</p>
                    </div>

                    <div class="content-box">
                        <p><strong>{{ $devlopment->title_three }}</strong></p>
                        <p>{!! nl2br($devlopment->description_three) !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Full width content -->
        <div class="container">
            <div class="row g-4">
                <div class="col-12">
                    <div class="content-box">
                        <p><strong>{{ $devlopment->title_four }}</strong></p>
                        <p>{{ $devlopment->description_four }}</p>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endsection
