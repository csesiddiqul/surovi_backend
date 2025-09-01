




@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Scroll News list</h3>

            <a href="{{route('updateNews.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add News</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>News</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($results as $key=> $updateNews)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{!! \Illuminate\Support\Str::limit($updateNews->news ,36) !!}</td>
                        <td>{{$updateNews->Priority}}</td>
                        <td>{{($updateNews->status == 1 ? 'Active' : 'De-Active')}}</td>


                        <td>
                            <a href="{{route('updateNews.edit',$updateNews->id)}}" onclick="return confirm('Are you sure Edit data?')" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>


                            <a href="{{route('updateNews.destroy',$updateNews->id)}}" class="btn btn-danger btn-xs"  onclick="event.preventDefault(); document.getElementById('deleteService + {{$updateNews->id}}').submit()";> <i class="fa-solid fa-trash-can"></i> Delete</a>

                            <form id="deleteService + {{$updateNews->id}}" action="{{route('updateNews.destroy',$updateNews->id)}}" method="POST" class="d-none">
                                @csrf

                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
