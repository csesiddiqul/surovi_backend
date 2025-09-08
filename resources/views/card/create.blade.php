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
                            <h3 class="card-title">Create Card</h3>
                             <a href="{{route('card.index')}}" class="btn btn-sm btn-white float-right"> <i class="fa-solid fa-arrow-left"></i>  Back  </a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('card.store')}}" method="post" enctype="multipart/form-data">
                            @if(session('message'))
                                <script>

                                   // alert('Create Successful');
                                </script>
                            @endif

                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputTitle">Name</label>
                                    <input type="text" value="{{old('name')}}" name="name" class="form-control" id="exampleInputTitle" placeholder="Enter Name">
                                    @error('name')
                                        <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputDescription">Description</label>
                                    <textarea class="form-control " name="description"  cols="30" rows="10"></textarea>


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
                                    <label for="exampleInputTitle">Position</label>
                                    <input type="text" value="{{old('position')}}" name="position" class="form-control" id="exampleInputTitle" placeholder="Enter Position">
                                    @error('position')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label for="exampleInputTitle">Mobile</label>
                                    <input type="number" value="{{old('mobile')}}" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile Number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="0" maxlength="11">
                                    @error('mobile')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Email</label>
                                    <input type="email" value="{{old('email')}}" name="email" class="form-control" id="exampleInputTitle" placeholder="Enter Email">
                                    @error('email')
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
    <style>
        /* Chrome, Safari, Edge, Opera */
        #mobile::-webkit-outer-spin-button,
        #mobile::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        #mobile{
            -moz-appearance: textfield;
        }
    </style>
@endsection
