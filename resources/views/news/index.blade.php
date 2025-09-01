@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">News list</h3>

            <a href="{{route('news.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add News  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>Title</th>
                    <th>Img</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($news as $key => $newsData)
                <tr>
                    <td>{{$key+1}}</td>


                    <td>{!! \Illuminate\Support\Str::limit($newsData->title ,30)!!}</td>

                    <td><img src="{{$newsData->img}}" alt="" width="20%"></td>


              
                    <td>{{$newsData->Priority}}</td>
                    <td>{{($newsData->status == 1 ? 'Active' : 'De-Active')}}</td>

                    <td>
                        <a href="{{route('news.edit',$newsData->id)}}" onclick="return confirm('Are you sure Edit data?')" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>





                        <a href="{{route('news.destroy',$newsData->id)}}" class="btn btn-danger btn-xs"  onclick="event.preventDefault(); document.getElementById('deleteNews + {{$newsData->id}}').submit()";> <i class="fa-solid fa-trash-can"></i> Delete</a>

                        <form id="deleteNews + {{$newsData->id}}" action="{{route('news.destroy',$newsData->id)}}" method="POST" class="d-none">
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
