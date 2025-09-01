@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Video list</h3>

            <a href="{{route('videogal.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Video  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>Title</th>
                    <th>video</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($video as $key=> $videodata)
                <tr>
                    <td>{{$key+1}}</td>


                    <td>{!! \Illuminate\Support\Str::limit($videodata->title ,60)!!}</td>

                    <td>


                        {{$videodata->video}}

                    </td>


                    <td>{!! \Illuminate\Support\Str::limit($videodata->description ,80)!!}</td>

                    <td>{{$videodata->Priority}}</td>

                    <td>{{($videodata->status == 1 ? 'Active' : 'De-Active')}}</td>

                    <td>
                        <a href="{{route('videogal.edit',$videodata->id)}}" onclick="return confirm('Are you sure Edit data?')" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>





                        <a href="{{route('event.destroy',$videodata->id)}}" class="btn btn-danger btn-xs"  onclick="event.preventDefault(); document.getElementById('deleteNews + {{$videodata->id}}').submit()";> <i class="fa-solid fa-trash-can"></i> Delete</a>

                        <form id="deleteNews + {{$videodata->id}}" action="{{route('videogal.destroy',$videodata->id)}}" method="POST" class="d-none">
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
