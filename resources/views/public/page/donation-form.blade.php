@extends('layouts.main_pub')

@section('title')
 Surovi Donate SSLCommerz
@endsection

@section('content')

    <div class="container my-4">
        <div class="row">

        <div class="col-md-6">






            <div class="card ">

                <div class="jakat-img">

                        <img src="{{ asset('backend/img/donation/' . $selectedDonation->image) }}" class="card-img-top image" alt="...">

                </div>
                <div class="service-card-title">
                    <b>{{$selectedDonation->title}}</b>
                </div>
                <div class="card-body">
                    <p class="card-text">

                        {!!  $selectedDonation->description !!}
                    </p>
                </div>

            </div>
        </div>

            <div class="col-md-6">
                <div class="card ">
                    <div class="donateJaket-title">
                        <b class="text-uppercase">{{ $selectedDonation->type }}</b>
                    </div>
                    <form  action="{{ url('/pay') }}" method="POST" class="needs-validation">


                          @if ($selectedDonation->type == 'sponsor-child')
                            <div class="">
                                <div class="sponsorChild">
                                        <label for="searchChildInput" class="form-label">Search Child by Name or Phone</label>
                                        <input type="text" class="form-control" id="searchChildInput" placeholder="Enter Name or Phone" required>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <ul class="list-group" id="childList"
                                    style="position:absolute; z-index:9999; background:#fff; width:95%; max-height:200px; overflow-y:auto; border-radius:0.25rem; left:50%; transform:translateX(-50%);">
                                </ul>
                            </div>
                        @endif

                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />

                        <div class="jakat-form">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputName4" class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" id="inputName4" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputPhone4" class="form-label">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" id="inputPhone4" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="total_amount" class="form-label">Amount (BDT)</label>
                                    <input type="number" name="total_amount" class="form-control" id="total_amount" min="10" required>
                                </div>


                                <input type="hidden" id="selectedChildId" name="child_id">
                                <input type="hidden" id="type" value="{{ $selectedDonation->type }}" name="type">
                                <input type="hidden" id="donate_id" value="{{ $selectedDonation->id }}" name="donate_id">
                                <input type="hidden" id="type" value="{{ $selectedDonation->type }}" name="type">
                            </div>
                        </div>

                        <div class="donate-card-button">
                            <button type="submit" class="btn custom-donate-btn">Donate</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

   <!-- donation  Section -->
<div class="container">
    <div class="donation text-center">
    <h1>DONATION</h1>
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

                        </div>
                    </div>
                 </a>
            </div>
        @endforeach
    </div>
</div>
 <!-- donation  Section -->


@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){

    $('#searchChildInput').on('keyup', function(){
        let query = $(this).val();

        if(query.length < 2){
            $('#childList').empty();
            return;
        }

        $.ajax({
            url: "{{ route('sponsor.child.search') }}",
            type: "GET",
            data: { query: query },
            success: function(data){
                $('#childList').empty();

                if(data.length === 0){
                    $('#childList').append('<div class="list-group-item">No Child Found</div>');
                } else {
                    $.each(data, function(index, child){
                        let imgPath = child.img ? child.img : 'https://via.placeholder.com/50';

                        let card = `
                        <div class="list-group-item list-group-item-action child-item d-flex align-items-center mb-2" style="cursor:pointer;" data-id="${child.id}">
                            <img src="${imgPath}" alt="${child.name}" class="rounded-circle me-3" style="width:50px; height:50px; object-fit:cover;">
                            <div>
                                <div class="fw-bold">${child.name}</div>
                                <small class="text-muted">${child.phone_number}</small>
                            </div>
                        </div>
                        `;
                        $('#childList').append(card);
                    });
                }
            }
        });
    });

    // select child
    $(document).on('click', '.child-item', function(){
        let id = $(this).data('id');
        let name = $(this).find('div > .fw-bold').text();

        $('#searchChildInput').val(name);
        $('#selectedChildId').val(id);
        $('#childList').empty();
    });
});
</script>

@endpush
