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
            <h3 class="card-title">Menu list</h3>
            <a href="{{route('manu.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Menu  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>Name</th>
                    <th>Parent ID</th>
                    <th>Type</th>
                    <th>Slug</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Menu Type</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($menu as $key => $menudata)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$menudata->name}}</td>
                        <td>{{$menudata->prantsId == 0 ? '' : $menudata->parent->name}}</td>
                        <td>{{$menudata->type == 1 ? 'url' : 'Dropdwon' }}</td>
                        <td>{!! \Illuminate\Support\Str::limit(nl2br($menudata->slug),10) !!}</td>
                        <td>{{$menudata->Priority}}</td>
                        <td>{{($menudata->status == 1 ? 'Active' : 'De-Active')}}</td>
                        <td>{{$menudata->menu_type == 1 ? 'Static' : 'Dynamic'}}</td>
                        <td>
                            <a href="{{route('manu.edit',$menudata->id)}}" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>



                            @if($menudata->menu_type != 1)

                            <a href="{{route('manu.destroy',$menudata->id)}}" class="btn btn-danger btn-xs"  onclick="event.preventDefault(); document.getElementById('deleteNotice'+{{$menudata->id}}).submit()";> <i class="fa-solid fa-trash-can"></i> Delete</a>
                            @endif

                            <form id="deleteNotice{{$menudata->id}}" action="{{route('manu.destroy',$menudata->id)}}" method="POST" class="d-none">
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
