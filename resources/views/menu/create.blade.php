
@php
    $menudata = \App\Models\Menu::where('prantsId',0)->get();
@endphp

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
                            <h3 class="card-title">Create Menu</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('manu.store')}}" method="post" enctype="multipart/form-data">
                            @if(session('message'))
                                <script>

                                    //alert('Create Successful');
                                </script>
                            @endif

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputTitle">name</label>
                                    <input type="text" value="{{old('name')}}" name="name" class="form-control" id="exampleInputTitle" placeholder="Enter menu name">
                                    @error('name')
                                        <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputStatus">Type</label>
                                    <select class="form-control form-select" name="type" id="exampleInputStatus">
                                        <option value="">Chose</option>
                                        <option value="1">Url</option>
                                        <option value="2">Dropdown</option>
                                    </select>

                                    @error('type')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputStatus">Prants Menu</label>
                                    <select class="form-control form-select" name="prantsid" id="exampleInputStatus">

                                        <option value="0">Chose</option>

                                        @foreach($menudata as $key=> $menu)
                                            <option value="{{$menu->id}}">{{$menu->name}}</option>
                                        @endforeach


                                    </select>

                                    @error('type')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">slug</label>
                                    <input type="text" value="{{old('slug')}}" name="slug" class="form-control" id="exampleInputTitle" placeholder="Enter slug">
                                    @error('slug')
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
