@extends('layouts.admin')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                     <div class="card card-danger">

                       <div class="card-header">
                            <h3 class="card-title">Create Photo</h3>
                             <a href="{{route('photo_admin.index')}}" class="btn btn-sm btn-white float-right"> <i class="fa-solid fa-arrow-left"></i>  Back  </a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('photo_admin.store')}}" method="post" enctype="multipart/form-data">
                            @if(session('message'))
                                <script>

                                    alert('Create Successful');
                                </script>
                            @endif

                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputStatus">Photo Group</label>
                                    <select class="form-control form-select" name="group_id" id="exampleInputStatus">

                                        <option value="">Chose</option>

                                        @foreach($photoGroup as $key=> $groupData)
                                            <option value="{{$groupData->id}}">{{$groupData->group_name}}</option>
                                        @endforeach


                                    </select>

                                    @error('group_id')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputTitle">Title</label>
                                    <input type="text" value="{{old('title')}}" name="title" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                    @error('title')
                                        <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputDescription">Description</label>
                                    <textarea class="editor form-control" name="description" id="editor" cols="30" rows="10"></textarea>


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

                                    @error('file')
                                    <span class="note-help-block text-danger">
                                                <strong>{{$message}}</strong>
                                            </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Priority</label>
                                    <input type="number" value="{{old('priority')}}" name="priority" class="form-control" id="exampleInputTitle" placeholder="Enter priority" min="0">
                                    @error('priority')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>




                                <div class="form-group">
                                    <label for="exampleInputStatus">Status</label>
                                    <select class="form-control form-select" name="status" id="exampleInputStatus">
                                        <option value="">Chose</option>
                                        <option value="1">Active</option>
                                        <option value="2">De-Active</option>
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
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->




                </div>

            </div><!-- /.container-fluid -->
    </section>
@endsection
