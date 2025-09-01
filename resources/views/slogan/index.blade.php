@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Welcome list</h3>

{{--            <a href="{{route('slogan.create')}}" class="btn btn-info badge-success float-lg-right"> <i class="fa-solid fa-plus"></i> Add Slogan</a>--}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>file</th>
                    <th>Slogan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($results as $key => $slogan)
                <tr>
                    <td>{{$key+1}}</td>


                    <td><img src="{{$slogan->file}}" alt="" width="80%"></td>
                    <td>{{$slogan->slogan}}</td>
                    <td>{{($slogan->status == 1 ? 'Active' : 'De-Active')}}</td>
                    <td>
                        <a href="{{route('slogan.edit',$slogan->id)}}" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>



{{--                        <a href="{{route('slogan.destroy',$slogan->id)}}" class="btn btn-danger btn-xs"  onclick="event.preventDefault(); document.getElementById('deleteSlogan + {{$slogan->id}}').submit()";> <i class="fa-solid fa-trash-can"></i> Delete</a>--}}

                        <form id="deleteSlogan + {{$slogan->id}}" action="{{route('slogan.destroy',$slogan->id)}}" method="POST" class="d-none">
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
