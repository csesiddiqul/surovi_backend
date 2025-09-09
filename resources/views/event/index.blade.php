@extends('layouts.admin')
@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Event List</h3>

            <a href="{{route('event.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Event  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <form method="Get" action="{{ route('event.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                    placeholder="search by title..."
                    value="{{ request('search') }}">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </form>

            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>

                    <th>Title</th>
                    <th>Img</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($events as $key => $event)
                <tr>
                    <td>{{$key+1}}</td>


                    <td>{!! \Illuminate\Support\Str::limit($event->title ,30)!!}</td>
                    <td>
                        {{
                            $event->event_type == 1 ? 'Up Coming' :
                            ($event->event_type == 2 ? 'Previous' : 'Impact Stories')
                        }}
                    </td>
                    <td><img src="{{$event->img}}" alt="" width="20%"></td>


                    <td>{{$event->Priority}}</td>
                    <td>{{($event->status == 1 ? 'Active' : 'De-Active')}}</td>

                    <td>
                        <a href="{{route('event.edit',$event->id)}}"  class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <a href="{{ route('event.destroy', $event->id) }}"
                            class="btn btn-danger btn-xs"
                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) { document.getElementById('deleteEvent{{ $event->id }}').submit(); }">
                            <i class="fa-solid fa-trash-can"></i> Delete
                            </a>

                            <form id="deleteEvent{{ $event->id }}" action="{{ route('event.destroy', $event->id) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>

        <div class="mt-3">
            {{ $events->appends(request()->query())->links() }}
        </div>

        </div>
        <!-- /.card-body -->
    </div>
@endsection
