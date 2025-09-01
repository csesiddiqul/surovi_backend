@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cntent list</h3>

            <a href="{{route('page.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Content  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>Menu</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Img</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($page as $key => $pageData)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$pageData->manuid}}</td>


                    <td>{!! \Illuminate\Support\Str::limit($pageData->title ,20)!!}</td>

                    <td>{!! \Illuminate\Support\Str::limit($pageData->description ,60)!!}</td>


                    <td><img src="{{$pageData->img}}" alt="" width="20%"></td>


                    <td>{{($pageData->status == 1 ? 'Active' : 'De-Active')}}</td>
                    <td>
                        <a href="{{route('page.edit',$pageData->id)}}" onclick="return confirm('Are you sure Edit data?')" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>





                        <a href="{{route('page.destroy',$pageData->id)}}" class="btn btn-danger btn-xs"  onclick="event.preventDefault(); document.getElementById('deleteSlider + {{$pageData->id}}').submit()";> <i class="fa-solid fa-trash-can"></i> Delete</a>

                        <form id="deleteSlider + {{$pageData->id}}" action="{{route('page.destroy',$pageData->id)}}" method="POST" class="d-none">
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
