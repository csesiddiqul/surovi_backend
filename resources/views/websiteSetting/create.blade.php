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
                            <h3 class="card-title">Customize website</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('websetting.store')}}" method="post" enctype="multipart/form-data">

                            @if(session('message'))
                                <script>

                                    alert('Create Successful');
                                </script>
                            @endif

                            @csrf
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="exampleInputFile">Logo input</label>
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
                                    <label for="exampleInputTitle">Map Link</label>
                                    <input type="text" value="{{old('map')}}" name="map" class="form-control" id="exampleInputTitle" placeholder="Enter Map link">
                                    @error('map')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Website Phone</label>
                                    <input type="text" value="{{old('phone')}}" name="phone" class="form-control" id="exampleInputTitle" placeholder="Enter phone">
                                    @error('phone')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label for="exampleInputTitle">Webiste Email</label>
                                    <input type="text" value="{{old('email')}}" name="email" class="form-control" id="exampleInputTitle" placeholder="Enter email">
                                    @error('email')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Website Link</label>
                                    <input type="text" value="{{old('weblink')}}" name="weblink" class="form-control" id="exampleInputTitle" placeholder="Enter weblink">
                                    @error('weblink')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Facbook Link</label>
                                    <input type="text" value="{{old('fblink')}}" name="fblink" class="form-control" id="exampleInputTitle" placeholder="Enter fblink">
                                    @error('fblink')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label for="exampleInputTitle">Twitter Link</label>
                                    <input type="text" value="{{old('twitlink')}}" name="twitlink" class="form-control" id="exampleInputTitle" placeholder="Enter twitlink">
                                    @error('twitlink')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label for="exampleInputTitle">Instagram Link</label>
                                    <input type="text" value="{{old('inslink')}}" name="inslink" class="form-control" id="exampleInputTitle" placeholder="Enter inslink">
                                    @error('inslink')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>





                                <div class="form-group">
                                    <label for="exampleInputTitle">Priority</label>
                                    <input type="number" value="{{old('priority')}}" name="priority" class="form-control" id="exampleInputTitle" placeholder="Enter priority">
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
