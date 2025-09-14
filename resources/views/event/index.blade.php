@extends('layouts.admin')

@section('content')
<div class="card">


    <div class="card-header">
            <h3 class="card-title">Success Story  list</h3>
            <a href="{{route('event.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add event  </a>
    </div>

    <!-- Search -->
    <div class="card-body">

        <form method="GET" action="{{ route('event.index') }}" class="mb-3">
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
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $key => $event)
                <tr>
                    <td>{{ $events->firstItem() + $key }}</td>


                    <td>
                        <img src="{{ asset($event->img) }}" alt="event  image" width="120" class="img-thumbnail">
                    </td>
                     <td>{{ $event->title }}</td>
                    <td>{{ $event->Priority }}</td>
                    <td>
                        <span class="badge {{ $event->status == 1 ? 'bg-success' : 'bg-danger' }}">
                            {{ $event->status == 1 ? 'Active' : 'De-Active' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('event.edit',$event->id) }}" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>

                        <a href="#" class="btn btn-danger btn-sm"
                           onclick="event.preventDefault();
                               if(confirm('Are you sure you want to delete this event ?')) {
                                   document.getElementById('deleteEvent{{ $event->id }}').submit();
                               }">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </a>

                        <form id="deleteEvent{{ $event->id }}"
                              action="{{ route('event.destroy', $event->id) }}"
                              method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No event  found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $events->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
