@extends('layouts.main_pub')

@push('styles')
<style>
    .section-title {
        font-size: 1.75rem;
        font-weight: 600;
        margin-bottom: 1.25rem;
        color: #333;
        border-bottom: 2px solid #0d6efd;
        display: inline-block;
        padding-bottom: .25rem;
    }
    .info-card {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: .5rem;
        padding: 1.5rem;
        text-align: center;
        height: 100%;
        transition: .2s;
    }
    .info-card i {
        font-size: 1.8rem;
        color: #dc2323;
        margin-bottom: .5rem;
    }
    .info-card:hover {
        background: #fff;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,.05);
    }
</style>
@endpush

@section('title', 'Surovi')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row g-5">

            <!-- Map -->
            <div class="col-12">
                <strong class="section-title">MAP</strong>
                <div class="ratio ratio-16x9">
                    <iframe src="{{ $results->mapUrl }}" style="border:0;" allowfullscreen loading="lazy"></iframe>
                </div>
            </div>

            <!-- Info -->
            <div class="col-12">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="info-card">
                            <i class="fa-solid fa-location-dot"></i>
                            <h5 class="fw-semibold mb-1">Address</h5>
                            <p class="mb-0 small text-muted">{{ $results->address }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card">
                            <i class="fa-solid fa-phone"></i>
                            <h5 class="fw-semibold mb-1">Phone</h5>
                            <p class="mb-0 small text-muted">{{ $results->phone }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card">
                            <i class="fa-solid fa-envelope"></i>
                            <h5 class="fw-semibold mb-1">Email</h5>
                            <p class="mb-0 small text-muted">{{ $results->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comment Form -->
            <div class="col-12">
                <h2 class="section-title">Comment</h2>
                <form action="{{ route('send.email') }}" method="post" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                    </div>
                    <div class="col-12">
                        <textarea name="message" class="form-control" rows="4" placeholder="Your Message..." required></textarea>
                    </div>
                    <div class="col-12 text-end">
                        <button type="reset" class="btn btn-outline-secondary">Clear</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
