@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Photo list</h3>

            <a href="{{route('photo_admin.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Photo  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>Title</th>
                    <th>Img</th>
                    <th>Group Name</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($photoGa as $key=> $photodata)
                <tr>
                    <td>{{$key+1}}</td>


                    <td>{!! \Illuminate\Support\Str::limit($photodata->title ,20)!!}</td>

                    <td><img src="{{$photodata->img}}" alt="" width="20%"></td>


                    <td>  @foreach($group as $gdata)

                              {{$photodata->group_id == $gdata->id ? $gdata->group_name : ''}}

                        @endforeach </td>


                    <td>{!! \Illuminate\Support\Str::limit($photodata->description ,30)!!}</td>

                    <td>{{$photodata->Priority}}</td>

                    <td>{{($photodata->status == 1 ? 'Active' : 'De-Active')}}</td>

                    <td>
                        <a href="{{route('photo_admin.edit',$photodata->id)}}"  class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>



                        <a href="#" class="btn btn-danger btn-sm" onclick="
                               event.preventDefault();
                               if(confirm('Are you sure you want to delete this Data?')) {
                                   document.getElementById('phGallary{{ $photodata->id }}').submit();
                               }
                               ">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </a>

                        <form id="phGallary{{ $photodata->id }}" action="{{ route('photo_admin.destroy', $photodata->id) }}"
                              method="POST" class="d-none">
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
