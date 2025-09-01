@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Slider list</h3>

            <a href="{{route('slider.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Slider  </a>

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

                @foreach($results as $key => $slider)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$slider->title}}</td>
                    <td><img src="{{$slider->url}}" alt="" width="20%"></td>


                    <td>{{$slider->Priority}}</td>
                    <td>{{($slider->status == 1 ? 'Active' : 'De-Active')}}</td>
                    <td>
                        <a href="{{route('slider.edit',$slider->id)}}" onclick="return confirm('Are you sure Edit data?')" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>



                        <a href="{{route('slider.destroy',$slider->id)}}" class="btn btn-danger btn-xs"  onclick="event.preventDefault(); document.getElementById('deleteSlider + {{$slider->id}}').submit()";> <i class="fa-solid fa-trash-can"></i> Delete</a>

                        <form id="deleteSlider + {{$slider->id}}" action="{{route('slider.destroy',$slider->id)}}" method="POST" class="d-none">
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
