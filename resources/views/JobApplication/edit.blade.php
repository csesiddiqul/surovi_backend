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
                            <h3 class="card-title">Updata Service</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('JobApplication.update', $jobAppli->id)}}" method="post">
                            @csrf
                            @method('PUT')




                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputTitle">Project Title</label>
                                    <input type="text" value="{{$jobAppli->title}}" name="title" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                    @error('title')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputDescription"> Location (District & City Corporation/Pourasava)</label>
                                    <textarea class="form-control"   name="Location" id="exampleInputDescription" cols="30" rows="10">{{$jobAppli->description}}</textarea>

                                </div>



                                    <div class="form-group">
                                        <label for="exampleInputTitle">Title</label>
                                        <input type="text" value="{{$jobAppli->Type}}" name="Type" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                        @error('Type')
                                        <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror

                                    </div>

                                <div class="form-group">
                                    <label for="exampleInputStatus">Status</label>
                                    <select class="form-control form-select" name="status" id="exampleInputStatus">
                                        <option value="">Choose</option>
                                        <option value="1" {{$jobAppli->status == 1 ? 'selected': ''}}>Active</option>
                                        <option value="2" {{$jobAppli->$jobAppli == 2 ? 'selected':''}}>De-Active</option>
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
