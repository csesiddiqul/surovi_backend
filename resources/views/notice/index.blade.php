@extends('layouts.admin')
@section('content')

    {{--{{$notice = 1}}--}}

    {{--    @if($notice == 1)--}}
    {{--        <script>--}}
    {{--            alert("Successful Insarting");--}}
    {{--        </script>--}}
    {{--    @endif--}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Notice List</h3>
            <a href="{{route('notice.create')}}" class="btn btn-info badge-success float-right "> <i class="fa-solid fa-plus"></i> Add Notice</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>file</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($results as $key => $notice)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$notice->title}}</td>
                        <td>{!! \Illuminate\Support\Str::limit(nl2br($notice->description),10) !!}</td>
                        <td><a href="{{$notice->file}}" target="_blank"><i class="fas fa-file"></i></a></td>
                        <td>{{$notice->Priority}}</td>
                        <td>{{($notice->status == 1 ? 'Active' : 'De-Active')}}</td>
                        <td>
                            <a href="{{route('notice.edit',$notice->id)}}" onclick="return confirm('Are you sure Edit data?')" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>


                            <a class="btn btn-info btn-xs" onclick="return confirm('Are you sure Show data?')" href="{{route('notice.show',$notice->id)}}">Show</a>

                            <a href="{{route('notice.destroy',$notice->id)}}" class="btn btn-danger btn-xs"  onclick="event.preventDefault(); document.getElementById('deleteNotice'+{{$notice->id}}).submit()";> <i class="fa-solid fa-trash-can"></i> Delete</a>

                            <form id="deleteNotice{{$notice->id}}" action="{{route('notice.destroy',$notice->id)}}" method="POST" class="d-none">
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
