
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

<div class="container pb-5">
    <div class="events  text-center p-5">
            <h2 class="fw-bold d-inline-block position-relative pb-2"> Notice Board</h2>
    </div>

    <!-- Search Form -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('noticeBoard') }}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                           placeholder="🔍 Search by title..."
                           value="{{ request('search') }}">
                    <button type="submit" class="btn btn-success px-4">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Notices Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-success text-center">
                    <tr>
                        <th scope="col" style="width: 5%;">SL</th>
                        <th scope="col" style="width: 25%;"> Title</th>
                              <th scope="col" style="width: 25%;">Type</th>
                        <th scope="col" style="width: 45%;">Description</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($jobApps as $key => $jobData)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $jobData->title }}</td>
                            <td><a href="{{ $jobData->file }}">
                                Download</a></td>
                            <td>{!! $jobData->description !!}</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                🚫 No notices found!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $jobApps->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection


@push('js')
<script>

</script>

@endpush
