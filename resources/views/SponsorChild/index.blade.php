@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sponsor Child list</h3>

            <a href="{{route('sponsorChild.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add SponsorChild  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="GEt" action="{{ route('sponsorChild.index') }}" class="mb-3" >
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                    placeholder="search by title..."
                    value="{{request('search')}}">
                    <button type="submit" class="btn btn-success">Search</button>

                </div>
            </form>

            <table  class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Img</th>
                    <th>description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($sponsorChilds as $key => $sponsorChild)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$sponsorChild->name}}</td>
                    <td>{{$sponsorChild->phone_number}}</td>
                    <td><img src="{{$sponsorChild->img}}" alt="" width="20%"></td>
                    <td>{{$sponsorChild->description}}</td>
                    <td>{{$sponsorChild->Priority}}</td>
                    <td>{{($sponsorChild->status == 1 ? 'Active' : 'De-Active')}}</td>
                    <td>
                        <a href="{{route('sponsorChild.edit',$sponsorChild->id)}}"  class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>



                        <a href="#" class="btn btn-danger btn-xs"
                        onclick="event.preventDefault();
                                    if(confirm('Are you sure you want to delete this sponsorChild?')) {
                                        document.getElementById('sponsorChild{{$sponsorChild->id}}').submit();
                                    }">
                        <i class="fa-solid fa-trash-can"></i> Delete
                        </a>

                        <form id="sponsorChild{{$sponsorChild->id}}" action="{{ route('sponsorChild.destroy', $sponsorChild->id) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>

                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>


            <div class="mt-3">
                {{ $sponsorChilds->appends(request()->query())->links() }}
            </div>
            

        </div>
        <!-- /.card-body -->
    </div>
@endsection
