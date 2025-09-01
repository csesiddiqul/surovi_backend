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
                            <h3 class="card-title">Update slider</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('manu.update', $menu->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">


                                <div class="form-group">
                                    <label for="exampleInputTitle">Name</label>
                                    <input type="text" value="{{$menu->name}}" name="name" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                    @error('name')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label for="exampleInputStatus">Parents Menu</label>
                                    <select class="form-control form-select" name="prantsId" id="exampleInputStatus">

                                        <option value="0">Choose</option>
                                        @foreach($menudata as $key=> $menu_option)
                                            <option value="{{$menu_option->id}}"  {{$menu->prantsId == $menu_option->id ? 'selected': ''}}>{{$menu_option->name}}</option>
                                        @endforeach


                                    </select>

                                    @error('type')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputStatus">Type</label>
                                    <select class="form-control form-select" name="type" id="exampleInputStatus">
                                        <option value="">Chose</option>
                                        <option value="1" {{$menu->type == 1 ? 'selected': ''}}>Url</option>
                                        <option value="2" {{$menu->type == 2 ? 'selected': ''}}>Dropdown</option>
                                    </select>

                                    @error('type')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputTitle">Slug</label>
                                    <input type="text" value="{{$menu->slug}}" name="slug" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                    @error('slug')
                                    <span class="note-help-block text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label for="exampleInputTitle">Priority</label>
                                    <input type="number" value="{{$menu->Priority}}" name="priority" class="form-control" id="exampleInputTitle" placeholder="Enter priority">
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
                                        <option value="1" {{$menu->status == 1 ? 'selected': ''}}>Active</option>
                                        <option value="2" {{$menu->status == 2 ? 'selected':''}} >De-Active</option>
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
