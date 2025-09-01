@extends('layouts.admin')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Updata Project</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('project.update', $projectData->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')




                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputTitle">Project Title</label>
                                    <input type="text" value="{{$projectData->title}}" name="title" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                    @error('title')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Image input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="file" value="{{old('file')}}" class="form-control" id="">
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>

                                    @error('file')
                                    <span class="note-help-block text-danger">
                                                <strong>{{$message}}</strong>
                                            </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputDescription"> Location (District & City Corporation/Pourasava)</label>
                                    <textarea class="form-control editor"   name="Location" id="editor" cols="30" rows="10">{{$projectData->location_data}}</textarea>

                                </div>



                                    <div class="form-group">
                                        <label for="exampleInputTitle">Project Activists and Beneficiaries</label>
                                        <input type="text" value="{{$projectData->typeBenef}}" name="typeBenef" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                        @error('Type')
                                        <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror

                                    </div>


                                <div class="form-group">
                                    <label for="exampleInputStatus">Project Type</label>
                                    <select class="form-control form-select" name="projectType" id="exampleInputStatus">
                                        <option value="">Choose</option>
                                        <option value="1" {{$projectData->projectType == 1 ? 'selected': ''}}>Ongoing</option>
                                        <option value="2" {{$projectData->projectType == 2 ? 'selected':''}}>Complate</option>
                                    </select>

                                    @error('projectType')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputTitle">Priority</label>
                                    <input type="number" value="{{$projectData->Priority}}" name="Priority" class="form-control" id="exampleInputTitle" placeholder="Enter priority" min="0">
                                    @error('Priority')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputStatus">Status</label>
                                    <select class="form-control form-select" name="status" id="exampleInputStatus">
                                        <option value="">Choose</option>
                                        <option value="1" {{$projectData->status == 1 ? 'selected': ''}}>Active</option>
                                        <option value="2" {{$projectData->jobAppli == 2 ? 'selected':''}}>De-Active</option>
                                    </select>

                                    @error('status')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Updata</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->



                </div>

            </div><!-- /.container-fluid -->
    </section>
@endsection
