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
                            <h3 class="card-title">Add Mission</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('developinter.store')}}" method="post" enctype="multipart/form-data">
                            @if(session('message'))
                                <script>

                                    alert('Create Successful');
                                </script>
                            @endif

                            @csrf
                            <div class="card-body">
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


                                </div>





                                <div class="form-group">
                                    <label for="exampleInputTitle">Title 2</label>
                                    <input type="text" value="{{old('title2')}}" name="title2" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                    @error('title2')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputDescription">Description 2</label>
                                    <textarea class="form-control" name="description2" id="editor" cols="30" rows="10"></textarea>


                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Title 3</label>
                                    <input type="text" value="{{old('title3')}}" name="title3" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                    @error('title3')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputDescription">Description 3</label>
                                    <textarea class="form-control" name="description3" id="editor" cols="30" rows="10"></textarea>


                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Title 4</label>
                                    <input type="text" value="{{old('title4')}}" name="title4" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                    @error('title4')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputDescription">Descriptionv 4</label>
                                    <textarea class="form-control" name="description4" id="editor" cols="30" rows="10"></textarea>


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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->



                </div>

            </div><!-- /.container-fluid -->
    </section>
@endsection
