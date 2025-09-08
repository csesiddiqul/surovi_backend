
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
                            <h3 class="card-title">Create Sponsor Child</h3>
                             <a href="{{route('sponsorChild.index')}}" class="btn btn-sm btn-white float-right"> <i class="fa-solid fa-arrow-left"></i>  Back  </a>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('sponsorChild.store')}}" method="post" enctype="multipart/form-data">
                            @if(session('message'))
                                <script>

                                    //alert('Create Successful');
                                </script>
                            @endif

                            @csrf
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="exampleInputTitle">Name</label>
                                    <input type="text" value="{{old('name')}}" name="name" class="form-control" id="exampleInputName" placeholder="Enter Name">
                                    @error('name')
                                        <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputTitle">Phone Number</label>
                                    <input type="text" value="{{old('phone_number')}}" name="phone_number" class="form-control" id="exampleInputphone_number" placeholder="Enter phone_number">
                                    @error('phone_number')
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

                                    @error('file')
                                    <span class="note-help-block text-danger">
                                                <strong>{{$message}}</strong>
                                            </span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputTitle">Description</label>
                                    <input type="text" value="{{old('description')}}" name="description" class="form-control" id="exampleInputTitle" placeholder="Enter Description">
                                    @error('description')
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
