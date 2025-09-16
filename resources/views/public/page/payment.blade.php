@extends('layouts.main_pub')

@section('title')
 Surovi Donate SSLCommerz
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0">💳 Secure Payment</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ url('/pay') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="customer_name" class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="customer_name" class="form-control" id="customer_name"
                                   placeholder="John Doe" value="John Doe" required>
                            <div class="invalid-feedback">
                                Valid customer name is required.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label fw-semibold">Mobile</label>
                            <div class="input-group">
                                <span class="input-group-text">+88</span>
                                <input type="text" name="customer_mobile" class="form-control" id="mobile"
                                       placeholder="01711xxxxxx" value="01711xxxxxx" required>
                                <div class="invalid-feedback">
                                    Your Mobile number is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" name="customer_email" class="form-control" id="email"
                                   placeholder="you@example.com" value="you@example.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="total_amount" class="form-label fw-semibold">Total Amount <span class="text-danger">*</span></label>
                            <input type="number" name="total_amount" class="form-control" id="total_amount"
                                   placeholder="Enter Amount" value="" required min="10">
                            <div class="invalid-feedback">
                                Please enter a valid total amount (minimum 10).
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button class="btn btn-primary btn-lg" type="submit">
                                🚀 Continue to Checkout
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted text-center small">
                    Powered by <strong>SSLCommerz</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // Bootstrap real-time validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms).forEach(function (form) {
            // Submit check
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)

            // Real-time input check
            var inputs = form.querySelectorAll('input')
            inputs.forEach(function (input) {
                input.addEventListener('input', function () {
                    if (input.checkValidity()) {
                        input.classList.remove('is-invalid')
                        input.classList.add('is-valid')
                    } else {
                        input.classList.remove('is-valid')
                        input.classList.add('is-invalid')
                    }
                })
            })
        })
    })()
</script>
@endpush
