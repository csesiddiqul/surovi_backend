@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Program List</h3>

            <a href="{{route('service.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Program</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>

                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($results as $key => $service)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$service->icon}}</td>
                    <td>{{$service->title}}</td>
                    <td>{!! \Illuminate\Support\Str::limit($service->description ,40) !!}</td>
                    <td>{{($service->status == 1 ? 'Active' : 'De-Active')}}</td>
                    <td>
                        <a href="{{route('service.edit',$service->id)}}" onclick="return confirm('Are you sure Edit data?')" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>


                        <a href="{{route('service.destroy',$service->id)}}" class="btn btn-danger btn-xs"  onclick="event.preventDefault(); document.getElementById('deleteService + {{$service->id}}').submit()";> <i class="fa-solid fa-trash-can"></i> Delete</a>

                        <form id="deleteService + {{$service->id}}" action="{{route('service.destroy',$service->id)}}" method="POST" class="d-none">
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
