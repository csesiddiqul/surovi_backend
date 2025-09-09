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
            <a href="{{route('importantLink.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Link  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <form method="Get" action="{{ route('importantLink.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                    placeholder="search by title..."
                    value="{{ request('search') }}">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </form>

            <table class="table table-bordered table-hover">
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

                @foreach($importantLinks as $key => $imlink)
                    <tr>
                        <td>{{$key+1}}</td>

                        <td>{!! \Illuminate\Support\Str::limit($imlink->title,25) !!}</td>
                        <td>{!! \Illuminate\Support\Str::limit($imlink->url,25) !!}</td>

                        <td>{{$imlink->Priority}}</td>

                        <td>{{($imlink->status == 1 ? 'Active' : 'De-Active')}}</td>
                        <td>
                            <a href="{{route('importantLink.edit',$imlink->id)}}" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                                <a href="{{ route('importantLink.destroy', $imlink->id) }}"
                                    class="btn btn-danger btn-xs"
                                        onclick="event.preventDefault();
                                                    if(confirm('Are you sure you want to delete this link?')) {
                                                    document.getElementById('deleteNotice{{$imlink->id}}').submit();
                                                }">
                                        <i class="fa-solid fa-trash-can"></i> Delete
                                </a>

                                <form id="deleteNotice{{$imlink->id}}"
                                    action="{{ route('importantLink.destroy', $imlink->id) }}"
                                    method="POST"
                                    class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $importantLinks->appends(request()->query())->links() }}
            </div>

        </div>
        <!-- /.card-body -->
    </div>
@endsection
