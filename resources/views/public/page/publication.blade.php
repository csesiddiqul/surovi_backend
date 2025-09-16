@extends('layouts.main_pub')

@push('styles')
<style>

    .event-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        margin-bottom: 40px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #f8f9fa ;
    }
    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0,0,0,0.2);
    }

    .event-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .events-card-title {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #3b3b3b;
    }

    .event-card .card-text {
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .event-card {
            flex-direction: column !important;
        }
        .event-card .col-md-6 {
            margin-bottom: 20px;
        }
        .events-card-title {
            font-size: 1.4rem;
        }
    }
</style>
@endpush

@section('title')
Photo Details
@endsection
@section('content')

        <div class="events  text-center mb-4">
            <h2 class="fw-bold d-inline-block position-relative p-5">Our Publication </h2>
        </div>

    <section class="container mr-con pb-3">

        <form method="GET" action="{{ route('publication', ['type' => 'annual-report']) }}" class="mb-5">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                        placeholder="Search by title..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
        </form>

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date</th>
                        <th scope="col">file</th>
                    </tr>
                </thead>
                @foreach($results as $key => $documentData)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{!! \Illuminate\Support\Str::limit($documentData->title,40) !!}</td>
                        <td>{{$documentData->date}}</td>
                        <td><a href="{{$documentData->file}}" target="_blank"><i class="fa-solid fa-file-pdf"></i></a></td>

                    </tr>
                @endforeach
            </table>
		</section>
    <!-- Pagination -->
        <div class="mt-3">
            {{ $results->appends(request()->query())->links() }}
        </div>
@endsection

@push('js')
<script>
// Optional JS
</script>
@endpush
