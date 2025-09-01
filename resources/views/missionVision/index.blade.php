@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Mission & Vision</h3>

{{--            <a href="{{route('developinter.create')}}" class="btn btn-info badge-success float-lg-right"> <i class="fa-solid fa-plus"></i> Add Content  </a>--}}

        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Img</th>

                    <th>Title 2</th>
                    <th>Description 2</th>


                    <th>Title 3</th>
                    <th>Description 3</th>

                    <th>Title 4</th>
                    <th>Description 4</th>

                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($pageData as $key => $pageData)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$pageData->title_one}}</td>
                    <td>{{$pageData->description_one}}</td>
                    <td><img src="{{$pageData->img}}" alt="" width="20%"></td>

                    <td>{{$pageData->title_tow}}</td>
                    <td>{{$pageData->description_tow }}</td>

                    <td>{{$pageData->title_three}}</td>
                    <td>{{$pageData->description_three}}</td>

                    <td>{{$pageData->title_four}}</td>
                    <td>{{$pageData->description_four}}</td>


                    <td>{{($pageData->status == 1 ? 'Active' : 'De-Active')}}</td>
                    <td>
                        <a href="{{route('missionVision.edit',$pageData->id)}}" onclick="return confirm('Are you sure Edit data?')" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>





{{--                        <a href="{{route('developinter.destroy',$pageData->id)}}" class="btn btn-danger btn-xs"  onclick="event.preventDefault(); document.getElementById('deleteSlider + {{$pageData->id}}').submit()";> <i class="fa-solid fa-trash-can"></i> Delete</a>--}}
{{--                        <a class="btn btn-info btn-xs" href="{{route('notice.show',$pageData->id)}}">Show</a>--}}

                        <form id="deleteSlider + {{$pageData->id}}" action="{{route('slider.destroy',$pageData->id)}}" method="POST" class="d-none">
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
