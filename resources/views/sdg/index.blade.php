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
            <h3 class="card-title">SDG List || <a href="{{route('sdg.edit',1)}}">Edit SDG Page Content</a> </h3>

            <a href="{{route('sdg.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add SDG  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="Get" action="{{ route('sdg.index') }}" class="mb-3">
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
                    <th>Goal</th>
                    <th>Title</th>
                    <th>Img</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($sdgs as $key => $sdgData)
                <tr>
                    <td>{{$key+1}}</td>

                    <td>{!! \Illuminate\Support\Str::limit($sdgData->goal ,30)!!}</td>
                    <td>{!! \Illuminate\Support\Str::limit($sdgData->title ,30)!!}</td>
                    <td><img src="{{$sdgData->img}}" alt="" width="20%"></td>


                    <td>{{$sdgData->Priority}}</td>
                    <td>{{($sdgData->status == 1 ? 'Active' : 'De-Active')}}</td>

                    <td>
                        <a href="{{route('sdg.edit',$sdgData->id)}}"  class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <a href="{{ route('sdg.destroy', $sdgData->id) }}"
                            class="btn btn-danger btn-xs"
                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) { document.getElementById('deleteSDG{{ $sdgData->id }}').submit(); }">
                            <i class="fa-solid fa-trash-can"></i> Delete
                            </a>

                            <form id="deleteSDG{{ $sdgData->id }}" action="{{ route('sdg.destroy', $sdgData->id) }}" method="POST" class="d-none">
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
            {{ $sdgs->appends(request()->query())->links() }}
        </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
