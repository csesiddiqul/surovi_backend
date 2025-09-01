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
                        <form action="{{route('websetting.update', $websiteSetting->id)}}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

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
                                            <input type="file" name="file" value="" class="form-control" id="">
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
                                    <label for="exampleInputTitle">Logo Name</label>
                                    <input type="text" value="{{$websiteSetting->logo_name }}" name="logoName" class="form-control" id="exampleInputTitle" placeholder="Enter Map link">
                                    @error('logoName')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Address</label>
                                    <input type="text" value="{{$websiteSetting->address}}" name="address" class="form-control" id="exampleInputTitle" placeholder="Enter Map link">
                                    @error('address')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Map Link</label>
                                    <input type="text" value="{{$websiteSetting->mapUrl}}" name="map" class="form-control" id="exampleInputTitle" placeholder="Enter Map link">
                                    @error('map')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Website Phone</label>
                                    <input type="text" value="{{$websiteSetting->phone}}" name="phone" class="form-control" id="exampleInputTitle" placeholder="Enter phone">
                                    @error('phone')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label for="exampleInputTitle">Webiste Email</label>
                                    <input type="text" value="{{$websiteSetting->email}}" name="email" class="form-control" id="exampleInputTitle" placeholder="Enter email">
                                    @error('email')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Website Link</label>
                                    <input type="text" value="{{$websiteSetting->websiteLink}}" name="weblink" class="form-control" id="exampleInputTitle" placeholder="Enter weblink">
                                    @error('weblink')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Facbook Link</label>
                                    <input type="text" value="{{$websiteSetting->facbookLink}}" name="fblink" class="form-control" id="exampleInputTitle" placeholder="Enter fblink">
                                    @error('fblink')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label for="exampleInputTitle">Twitter Link</label>
                                    <input type="text" value="{{$websiteSetting->twitter}}" name="twitlink" class="form-control" id="exampleInputTitle" placeholder="Enter twitlink">
                                    @error('twitlink')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label for="exampleInputTitle">Instagram Link</label>
                                    <input type="text" value="{{$websiteSetting->instagram}}" name="inslink" class="form-control" id="exampleInputTitle" placeholder="Enter inslink">
                                    @error('inslink')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>





                                <div class="form-group">
                                    <label for="exampleInputTitle">Priority</label>
                                    <input type="number" value="{{$websiteSetting->Priority}}" name="priority" class="form-control" id="exampleInputTitle" placeholder="Enter priority">
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
                                        <option value="1" {{$websiteSetting->status == 1 ? 'selected': ''}}>Active</option>
                                        <option value="2" {{$websiteSetting->status == 2 ? 'selected':''}}>De-Active</option>
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
