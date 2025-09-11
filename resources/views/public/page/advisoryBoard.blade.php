
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
            <h2 class="fw-bold d-inline-block position-relative pb-2">Advisory  Board</h2>
        </div>

        <form method="GET" action="{{ route('advisoryBoard') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       placeholder="Search by title..."
                       value="{{ request('search') }}">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </form>

        <div class="row g-4">
            @foreach($advisoryCommittees as $advisoryCommittee)
            <!-- Member 1 -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="executive-committe-card border-0 shadow overflow-hidden text-center p-3">
                    <div class="executive-committe-img ">
                        <img src="{{ $advisoryCommittee->img }}" class="img-fluid" alt="...">
                    </div>
                    <div class="executive-name mb-1">
                        <b>{{$advisoryCommittee->title }}</b>
                    </div>
                    <div class="executive-title text-muted">
                        <small>{{$advisoryCommittee->designation }}</small>
                    </div>
                </div>
            </div>
            @endforeach


        </div>

         <div class="mt-3">
          {{ $advisoryCommittees->appends(request()->query())->links() }}

        </div>
    </div>
@endsection


@push('js')
<script>

</script>

@endpush
