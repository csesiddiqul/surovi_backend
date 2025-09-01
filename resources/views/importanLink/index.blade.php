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
            <h3 class="card-title">Important link list</h3>
            <a href="{{route('importanLink.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Link  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>Title</th>
                    <th>url</th>
                    <th>pirority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($importanLink as $key => $imlink)
                    <tr>
                        <td>{{$key+1}}</td>

                        <td>{!! \Illuminate\Support\Str::limit($imlink->title,25) !!}</td>
                        <td>{!! \Illuminate\Support\Str::limit($imlink->url,25) !!}</td>

                        <td>{{$imlink->Priority}}</td>

                        <td>{{($imlink->status == 1 ? 'Active' : 'De-Active')}}</td>
                        <td>
                            <a href="{{route('importanLink.edit',$imlink->id)}}" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <a href="{{route('importanLink.destroy',$imlink->id)}}" class="btn btn-danger btn-xs"  onclick="event.preventDefault(); document.getElementById('deleteNotice'+{{$imlink->id}}).submit()";> <i class="fa-solid fa-trash-can"></i> Delete</a>

                            <form id="deleteNotice{{$imlink->id}}" action="{{route('importanLink.destroy',$imlink->id)}}" method="POST" class="d-none">
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
