@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Photo Group list</h3>

            <a href="{{route('photogroup.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add group  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="Get" action="{{ route('photogroup.index') }}" class="mb-3">
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

                @foreach($gpds as $key=> $groupdata)
                <tr>
                    <td>{{$key+1}}</td>


                    <td>{!! \Illuminate\Support\Str::limit($groupdata->group_name ,20)!!}</td>

                    <td><img src="{{$groupdata->img}}" alt="" width="20%"></td>
                    <td>{{$groupdata->priority}}</td>

                    <td>{{($groupdata->status == 1 ? 'Active' : 'De-Active')}}</td>
                    <td>
                        <a href="{{route('photogroup.edit',$groupdata->id)}}" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>


                        <a href="{{ route('event.destroy', $groupdata->id) }}"
                            class="btn btn-danger btn-xs"
                            onclick="event.preventDefault();
                                        if(confirm('Are you sure you want to delete this item?')) {
                                            document.getElementById('deleteNews{{$groupdata->id}}').submit();
                                        }">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </a>

                        <form id="deleteNews{{$groupdata->id}}"
                            action="{{ route('photogroup.destroy', $groupdata->id) }}"
                            method="POST"
                            class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>

                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
           <!-- Pagination -->
        <div class="mt-3">
            {{ $gpds->appends(request()->query())->links() }}
        </div>

        </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
