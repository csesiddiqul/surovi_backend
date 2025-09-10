@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Card list</h3>

            <a href="{{route('card.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add card </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">

               <form method="Get" action="{{ route('card.index') }}" class="mb-3">
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
                    <th>Name</th>
                    <th>Img</th>
                    <th>Position</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($cards as $key => $cardData)
                <tr>
                    <td>{{$key+1}}</td>

                    <td>{!! \Illuminate\Support\Str::limit($cardData->name ,20) !!}</td>

                    <td><img src="{{$cardData->img}}" alt="" width="20%"></td>

                    <td>{!! \Illuminate\Support\Str::limit($cardData->position,40) !!}</td>
                    <td>{!! \Illuminate\Support\Str::limit($cardData->mobile,40) !!}</td>
                    <td>{!! \Illuminate\Support\Str::limit($cardData->email,40) !!}</td>


                    <td>{{$cardData->Priority}}</td>
                    <td>{{($cardData->status == 1 ? 'Active' : 'De-Active')}}</td>

                    <td>
                        <a href="{{route('card.edit',$cardData->id)}}"  class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                        <a href="#" class="btn btn-danger btn-xs"
                            onclick="if(confirm('Are you sure you want to delete this card?')) {
                                event.preventDefault();
                                document.getElementById('deletecard{{ $cardData->id }}').submit();
                            } else {
                                event.preventDefault();
                            }">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </a>

                        <form id="deletecard{{ $cardData->id }}" action="{{ route('card.destroy', $cardData->id) }}" method="POST" class="d-none">
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
                {{ $cards->appends(request()->query())->links() }}
            </div>

        </div>
        <!-- /.card-body -->
    </div>
@endsection
