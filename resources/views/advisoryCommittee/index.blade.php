@extends('layouts.admin')

@section('content')
<div class="card">


    <div class="card-header">
            <h3 class="card-title">Advisory Committee list</h3>
            <a href="{{route('advisoryCommittee.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add New  </a>
    </div>

    <!-- Search -->
    <div class="card-body">
        <form method="GET" action="{{ route('advisoryCommittee.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       placeholder="Search by title..."
                       value="{{ request('search') }}">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </form>

        <!-- Slider Table -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>SI</th>
                    <th>Img</th>
                    <th>Title</th>
                    <th>designation</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($results as $key => $advisoryCommittee)
                <tr>
                    <td>{{ $results->firstItem() + $key }}</td>

                    <td>
                        <img src="{{ asset($advisoryCommittee->img) }}" alt="advisoryCommittee image" width="120" class="img-thumbnail">
                    </td>
                    <td>{{ $advisoryCommittee->title }}</td>
                    <td>{{ $advisoryCommittee->designation }}</td>
                    <td>{{ $advisoryCommittee->priority }}</td>
                    <td>
                        <span class="badge {{ $advisoryCommittee->status == 1 ? 'bg-success' : 'bg-danger' }}">
                            {{ $advisoryCommittee->status == 1 ? 'Active' : 'De-Active' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('advisoryCommittee.edit',$advisoryCommittee->id) }}" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>


                         <a href="#" class="btn btn-danger btn-sm"
                           onclick="event.preventDefault();
                               if(confirm('Are you sure you want to delete this advisoryCommittee?')) {
                                   document.getElementById('deleteAdvisoryCommittee{{ $advisoryCommittee->id }}').submit();
                               }">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </a>

                        <form id="deleteAdvisoryCommittee{{ $advisoryCommittee->id }}"
                              action="{{ route('advisoryCommittee.destroy', $advisoryCommittee->id) }}"
                              method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>



                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No advisoryCommittees found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $results->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
