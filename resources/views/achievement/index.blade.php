@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Achievement list</h3>

            <a href="{{route('achievement.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Achievement  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>Img</th>
                    <th>Title</th>
                    <th>description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($achievement as $key => $achievement)
                <tr>
                    <td>{{$key+1}}</td>
                    
                    <td><img src="{{$achievement->img}}" alt="" width="20%"></td>
                   
                    <td>{{$achievement->title}}</td>

                    <td>{{$achievement->description}}</td>
                     <td>{{$achievement->Priority}}</td>
                    <td>{{($achievement->status == 1 ? 'Active' : 'De-Active')}}</td>
                    <td>
                        <a href="{{route('achievement.edit',$achievement->id)}}"  class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>



                        <a href="#" class="btn btn-danger btn-xs"
                        onclick="event.preventDefault();
                                    if(confirm('Are you sure you want to delete this achievement?')) {
                                        document.getElementById('deleteAchievement{{$achievement->id}}').submit();
                                    }">
                        <i class="fa-solid fa-trash-can"></i> Delete
                        </a>

                        <form id="deleteAchievement{{$achievement->id}}" action="{{ route('achievement.destroy', $achievement->id) }}" method="POST" class="d-none">
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
