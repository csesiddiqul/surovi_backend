
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
        <div class="achievements text-center my-4">
            <h2 class="fw-bold d-inline-block position-relative pb-2">Executive Committee</h2>
        </div>

        <form method="GET" action="{{ route('Committeelist') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       placeholder="Search by title..."
                       value="{{ request('search') }}">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </form>

    

    <div class="row">
           @foreach($cards as $card)
            <!-- Member 1 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                        <img src="{{$card->img }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>{{ $card->name }}</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>{{ $card->position }}</small>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    <!-- Pagination -->
    <div class="mt-3">
        {{ $cards->appends(request()->query())->links() }}
    </div>
</div>

@endsection


@push('js')
<script>

</script>

@endpush
