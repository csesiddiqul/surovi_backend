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
                            <h3 class="card-title">Updata card</h3>



            <a href="{{route('sdg.index')}}" class="btn btn-sm btn-outline-primary float-right"> <i class="fa-solid fa-arrow-left"></i>  Back  </a>

                        </div>





                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('sdg.update', $sdg->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">


                                @if ($sdg->id != 1)
                                    <div class="form-group">
                                        <label for="goal">SDG</label>
                                        <input type="text" value="{{$sdg->goal}}" name="goal" class="form-control" id="goal" placeholder="Enter Goal">
                                        @error('goal')
                                            <span class="note-help-block text-danger">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputTitle">Title</label>
                                        <input type="text" value="{{$sdg->title}}" name="title" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                        @error('title')
                                        <span class="note-help-block text-danger">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endif










                               <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="file">Upload New Image</label>

                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="file" id="file" class="custom-file-input">
                                                <label class="custom-file-label" for="file">Choose image</label>
                                            </div>

                                        </div>

                                        @error('file')
                                            <small class="text-danger d-block mt-1">{{ $message }}</small>
                                        @enderror

                                        @if(isset($sdg) && $sdg->id == 1 && $sdg->img)
                                            <div class="mt-3">
                                                <label  for="file">Current Image:</label><br>
                                                <img src="{{ asset($sdg->img) }}" alt="Current Image" class="img-thumbnail shadow-sm" style="max-width: 200px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label for="exampleInputDescription">Description</label>
                                    <textarea class="editor form-control" name="description" id="editor" cols="30" rows="10">{{$sdg->description}}</textarea>
                                </div>




                                @if ($sdg->id != 1)

                                    <div class="form-group">
                                        <label for="exampleInputTitle">Priority</label>
                                        <input type="number" value="{{$sdg->Priority}}" name="priority" class="form-control" id="exampleInputTitle" placeholder="Enter priority" min="0">
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
                                            <option value="1" {{$sdg->status == 1 ? 'selected': ''}}>Active</option>

                                            <option value="2" {{$sdg->status == 2 ? 'selected':''}}>De-Active</option>
                                        </select>

                                        @error('status')
                                        <span class="note-help-block text-danger">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                @endif

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
