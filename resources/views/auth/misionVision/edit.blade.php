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
                            <h3 class="card-title">Updata Development Page</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('developinter.update', $develop->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputTitle">Title 1</label>
                                    <input type="text" value="{{$develop->title_one}}" name="title" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
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
                                    <label for="exampleInputDescription">Description 1</label>
                                    <textarea class="form-control"   name="description" id="exampleInputDescription" cols="30" rows="10">{{$develop->description_one}}</textarea>

                                </div>








                                <div class="form-group">
                                    <label for="exampleInputTitle">Title 2</label>
                                    <input type="text" value="{{$develop->title_tow}}" name="title2" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                    @error('title2')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>




                                <div class="form-group">
                                    <label for="exampleInputDescription">Description 2</label>
                                    <textarea class="form-control"   name="description2" id="exampleInputDescription" cols="30" rows="10">{{$develop->description_tow}}</textarea>

                                </div>




                                <div class="form-group">
                                    <label for="exampleInputTitle">Title 3</label>
                                    <input type="text" value="{{$develop->title_three}}" name="title3" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                    @error('title3')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>




                                <div class="form-group">
                                    <label for="exampleInputDescription">Description 3</label>
                                    <textarea class="form-control"   name="description3" id="exampleInputDescription" cols="30" rows="10">{{$develop->description_three}}</textarea>

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Title 4</label>
                                    <input type="text" value="{{$develop->title_four}}" name="title4" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                    @error('title4')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>




                                <div class="form-group">
                                    <label for="exampleInputDescription">Description 4</label>
                                    <textarea class="form-control"   name="description4" id="exampleInputDescription" cols="30" rows="10">{{$develop->description_four}}</textarea>

                                </div>



                                <div class="form-group">
                                    <label for="exampleInputTitle">Priority</label>
                                    <input type="number" value="{{$develop->Priority}}" name="priority" class="form-control" id="exampleInputTitle" placeholder="Enter priority">
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
                                        <option value="1" {{$develop->status == 1 ? 'selected': ''}}>Active</option>

                                        <option value="2" {{$develop->status == 2 ? 'selected':''}}>De-Active</option>
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
