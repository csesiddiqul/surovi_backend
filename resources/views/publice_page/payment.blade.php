@extends('layouts.public');

@section('content');



        <section class="main-about">
			<div class="about-bg">
				<div class="container">
					<h1 style="margin-top:5%; color:#d00b01;">Donate Now</span></h1>
				</div>
			</div>

		</section>


          <!-- =======Donate Info======= -->
        <section id="contact" class="contact">
            <div class="container py-4" style="background-color: #f1f5f9;"> {{-- light gray bg --}}
                <div class="section-title text-center">
                    <h6 class="font-17" style="font-size: 20px; font-weight: 600; color: #1e293b;">Donate Information</h6>
                </div>
            </div>


            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-12 col-md-12 col-sm-12 m-auto">
                        <form method="POST" id="donateForm" class="php-email-form rounded">
                            @csrf
                            <input type="hidden" name="donation_id" value="{{ $donate_id }}">

                            <div class="row">
                                {{-- Donor Name --}}
                                <div class="col-md-6 form-group mb-4">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Donor Name" value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Donate Account --}}
                                <div class="col-md-6 form-group mb-4">
                                    <select class="form-select @error('account') is-invalid @enderror" name="account">
                                        <option selected disabled>Select Donate Account</option>
                                        @foreach($accountt as $data)
                                            <option value="{{ $data->title }}" {{ old('account') == $data->title ? 'selected' : '' }}>
                                                {{ $data->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('account')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Amount BDT --}}
                                <div class="col-md-6 form-group mb-4">
                                    <input type="number" class="form-control @error('rnumber') is-invalid @enderror" name="rnumber" placeholder="Amount BDT" value="{{ old('rnumber') }}">
                                    @error('rnumber')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Account Number --}}
                                <div class="col-md-6 form-group mb-4">
                                    <input type="number" class="form-control @error('dnumber') is-invalid @enderror" name="dnumber" placeholder="Account Number" value="{{ old('dnumber') }}">
                                    @error('dnumber')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Txn ID --}}
                                <div class="col-md-6 form-group mb-4">
                                    <input type="text" class="form-control @error('txnid') is-invalid @enderror" name="txnid" placeholder="Txn ID" value="{{ old('txnid') }}">
                                    @error('txnid')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Subject --}}
                                <div class="col-md-6 form-group mb-4">
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                                    @error('subject')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Message --}}
                            <div class="form-group mt-1">
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Message">{{ old('message') }}</textarea>
                                @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="text-center mt-4 mb-4">
                                <button type="submit" class="btn btn-primary w-100" id="donateSubmitBtn">SUBMIT NOW</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    <!-- =======Donate Info======= -->
    <!--=======End Breadcrumbs=======-->

    <!-- =======Donate Accounts======= -->
    <section id="event" class="event donate-now2 py-4" style="background: #f7f8fa;">
        <div class="container" data-aos="fade-up">
            <p class="donateeee"></p>
            <div class="row">
                @foreach($account as $account)
                <div class="col-md-4 col-lg-4 mb-4">
                    <div class="card-body bg-white rounded p-3 text-center border"  style="margin: 0px;">
                        <img src="{{asset('backend/img/account')}}/{{$account->image}}" class="img-fluid rounded" alt="">
                        <h4 class="mt-3 mb-0">Donate via {{$account->title}} Account</h4>
                        <div class="mt-0">
                            <p class="">@php echo $account->description; @endphp</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- =======Donate Accounts======= -->




<script>
$(document).ready(function () {
    $('#donateForm').on('submit', function (e) {
        e.preventDefault();

        let form = $(this)[0];
        let formData = new FormData(form);
        $('#donateSubmitBtn').text('Sending...').attr('disabled', true);

        $.ajax({
            url: '{{ route('donate.custom') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function (response) {
                if (response.status === 200) {
                    Swal.fire(
                        '✅ Success!',
                        response.message || 'Donation submitted successfully!',
                        'success'
                    );
                    $('#donateForm')[0].reset();
                } else {
                    Swal.fire('Oops!', 'Something went wrong.', 'error');
                }
                $('#donateSubmitBtn').text('SUBMIT NOW').attr('disabled', false);
            },
            error: function (xhr) {
                let msg = 'Something went wrong. Please check your inputs.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }
                Swal.fire('Error', msg, 'error');
                $('#donateSubmitBtn').text('SUBMIT NOW').attr('disabled', false);
            }
        });
    });
});
</script>

@endsection
