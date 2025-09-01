@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Job Application List</h3>

            <a href="{{route('JobApplication.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Job Application</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>

                    <th>icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($jobAppli as $key => $jobApplidata)
                    <tr>
                        <td>{{$key+1}}</td>

                        <td>{{$jobApplidata->title}}</td>
                        <td>{{$jobApplidata->Location}}</td>
                        <td>{{$jobApplidata->Type}}</td>

                        <td>{{($jobApplidata->status == 1 ? 'Active' : 'De-Active')}}</td>
                        <td>
                            <a href="{{route('JobApplication.edit',$jobApplidata->id)}}" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>


                            <a href="{{route('JobApplication.destroy',$jobApplidata->id)}}" class="btn btn-danger btn-xs"  onclick="event.preventDefault(); document.getElementById('deleteService + {{$jobApplidata->id}}').submit()";> <i class="fa-solid fa-trash-can"></i> Delete</a>

                            <form id="deleteService + {{$jobApplidata->id}}" action="{{route('JobApplication.destroy',$jobApplidata->id)}}" method="POST" class="d-none">
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
