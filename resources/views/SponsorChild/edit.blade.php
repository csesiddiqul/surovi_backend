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
                            <h3 class="card-title">Updata AponsorChild</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('sponsorChild.update', $sponsorChild->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" value="{{$sponsorChild->name}}" name="name" class="form-control" id="exampleInputName" placeholder="Enter Name">
                                    @error('name')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>

                                    <div class="form-group">
                                    <label for="exampleInputTitle">Phone Number</label>
                                    <input type="text" value="{{$sponsorChild->phone_number}}" name="phone_number" class="form-control" id="exampleInputTitle" placeholder="Enter Phone Number">
                                    @error('phone_number')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>

                            
                                <div class="form-group">
                                    <label for="exampleInputFile">Image Input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="file"   class="form-control" >
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
                                    <label for="exampleInputTitle">Description</label>
                                    <input type="text" value="{{$sponsorChild->description}}" name="description" class="form-control" id="exampleInputTitle" placeholder="Enter Description">
                                    @error('description')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>






                                <div class="form-group">
                                    <label for="exampleInputTitle">Priority</label>
                                    <input type="number" value="{{$sponsorChild->Priority}}" name="priority" class="form-control" id="exampleInputTitle" placeholder="Enter priority" min="0">
                                    @error('priority')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>





                                <div class="form-group">
                                    <label for="exampleInputStatus">Status</label>
                                    <select class="form-control form-select" name="status" id="exampleInputStatus">
                                        <option value="">Choose</option>
                                        <option value="1" {{$sponsorChild->status == 1 ? 'selected': ''}}>Active</option>

                                        <option value="2" {{$sponsorChild->status == 2 ? 'selected':''}}>De-Active</option>
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
