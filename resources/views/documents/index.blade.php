@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Documents List</h3>

            <a href="{{route('documents.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Documents</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($results as $key => $documentData)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$documentData->title}}</td>
                    <td>{{$documentData->date}}</td>
                    <td>{{$documentData->priority}}</td>
                    <td>{{($documentData->status == 1 ? 'Active' : 'De-Active')}}</td>
                    <td>
                        <a href="{{route('documents.edit',$documentData->id)}}" onclick="return confirm('Are you sure Edit data?')" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>


                        <a href="{{route('documents.destroy',$documentData->id)}}" class="btn btn-danger btn-xs"  onclick="event.preventDefault(); document.getElementById('deleteService + {{$documentData->id}}').submit()";> <i class="fa-solid fa-trash-can"></i> Delete</a>

                        <form id="deleteService + {{$documentData->id}}" action="{{route('documents.destroy',$documentData->id)}}" method="POST" class="d-none">
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
