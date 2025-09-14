@extends('layouts.admin')

@section('content')
<div class="card">


    <div class="card-header">
            <h3 class="card-title">Success Story  list</h3>
            <a href="{{route('succesStory.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Video  </a>
    </div>

    <!-- Search -->
    <div class="card-body">

        <form method="GET" action="{{ route('succesStory.index') }}" class="mb-3">
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
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($succesStorys as $key => $succesStory)
                <tr>
                    <td>{{ $succesStorys->firstItem() + $key }}</td>


                    <td>
                        <img src="{{ asset($succesStory->img) }}" alt="succesStory image" width="120" class="img-thumbnail">
                    </td>
                     <td>{{ $succesStory->title }}</td>
                    <td>{{ $succesStory->description }}</td>
                    <td>{{ $succesStory->Priority }}</td>
                    <td>
                        <span class="badge {{ $succesStory->status == 1 ? 'bg-success' : 'bg-danger' }}">
                            {{ $succesStory->status == 1 ? 'Active' : 'De-Active' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('succesStory.edit',$succesStory->id) }}" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>

                        <a href="#" class="btn btn-danger btn-sm"
                           onclick="event.preventDefault();
                               if(confirm('Are you sure you want to delete this succesStory?')) {
                                   document.getElementById('deleteSuccesStory{{ $succesStory->id }}').submit();
                               }">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </a>

                        <form id="deleteSuccesStory{{ $succesStory->id }}"
                              action="{{ route('succesStory.destroy', $succesStory->id) }}"
                              method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No succesStory found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $succesStorys->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
