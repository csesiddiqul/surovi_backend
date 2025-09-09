@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Project List</h3>

            <a href="{{route('project.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Project</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <form method="Get" action="{{ route('project.index') }}" class="mb-3">
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
                    <th>Img</th>
                    <th>Project Activists and Beneficiaries</th>
                    <th>Type of project</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($projects as $key=> $projectData)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$projectData->title}}</td>
                        <td><img src="{{$projectData->img}}" alt="" width="20%"></td>

                        <td>{{$projectData->typeBenef}}</td>

                        <td>{{($projectData->projectType == 1 ? 'Ongoing' : 'Complate')}}</td>
                        <td>{{$projectData->Priority}}</td>

                        <td>{{($projectData->status == 1 ? 'Active' : 'De-Active')}}</td>
                        <td>
                            <a href="{{route('project.edit',$projectData->id)}}" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>


                        <a href="#" class="btn btn-danger btn-sm"
                           onclick="event.preventDefault();
                               if(confirm('Are you sure you want to delete this project?')) {
                                   document.getElementById('deleteProject{{ $projectData->id }}').submit();
                               }">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </a>

                        <form id="deleteProject{{ $projectData->id }}"
                              action="{{ route('project.destroy', $projectData->id) }}"
                              method="POST" class="d-none">
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
                {{ $projects->appends(request()->query())->links() }}
            </div>

        </div>
        <!-- /.card-body -->
    </div>
@endsection
