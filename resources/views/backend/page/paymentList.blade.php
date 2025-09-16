@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Payment list</h3>

    </div>
    <!-- /.card-header -->
   <div class="card-body">

    <form method="GET" action="{{ route('payments') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-success">Search</button>
        </div>
    </form>

    <!-- Responsive wrapper start -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Donation Type</th>
                    <th>Donor Name</th>
                    <th>Donor Email</th>
                    <th>Donor Phone Number</th>
                    <th>Sponsored Child</th>
                    <th>Amount</th>
                    <th>TXN ID</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                <tr>
                    <td>{{ ucfirst($payment->type) }}</td>
                    <td>{{ $payment->name }}</td>
                    <td>{{ $payment->email }}</td>
                    <td>{{ $payment->phone }}</td>
                    <td>
                        @if($payment->sponsorChild)
                            {{ $payment->sponsorChild->name }} ({{ $payment->sponsorChild->phone_number }})
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $payment->amount }} {{ $payment->currency }}</td>
                    <td>{{ $payment->transaction_id }}</td>
                    <td>
                        @php
                            switch($payment->status) {
                                case 'Pending':
                                    $badge = 'bg-warning text-dark';
                                    break;
                                case 'Success':
                                    $badge = 'bg-success';
                                    break;
                                case 'failed':
                                case 'Canceled':
                                    $badge = 'bg-danger';
                                    break;
                                default:
                                    $badge = 'bg-secondary';
                            }
                        @endphp
                        <span class="badge {{ $badge }}">{{ $payment->status }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Responsive wrapper end -->

    <div class="mt-3">
        {{ $payments->appends(request()->query())->links() }}
    </div>

</div>

    <!-- /.card-body -->
</div>
@endsection
