@extends('layouts.admin')
@section('title') Donations Add - Admin-Panel @endsection
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card card-danger">

            <div class="card-header">
                <h3 class="card-title">Create Donations</h3>
                <a href="{{route('donations.index')}}" class="btn btn-sm btn-white float-right"> <i class="fa-solid fa-arrow-left"></i>  Back  </a>
            </div>

            <form class="form p-4" action="{{Route('donations.store')}}" method="post" enctype="multipart/form-data">
              @csrf
                  <div class="form-group row mb-4">
                    <label class="col-form-label col-12 col-md-2 col-lg-2">Title</label>
                    <div class="col-sm-12 col-md-9">
                      <input type="text" name="title" id="title" class="form-control">
                      @error('title')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>


                   <div class="form-group row mb-4">
                  <label class="col-form-label col-12 col-md-2 col-lg-2">Type</label>
                  <div class="col-sm-12 col-md-9">
                      <select class="form-control selectric rounded" name="type" id="type" required>
                      <option value="">Select</option>
                       <option value="school-feeding-edu">School Feeding & Education Materials</option>
                        <option value="zakat">Zakat</option>
                        <option value="sponsor-child">Sponsor a Child</option>
                      </select>
                      @error('type')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  </div>


                  <div class="form-group row mb-4">
                    <label class="col-form-label col-12 col-md-2 col-lg-2">Image</label>
                    <div class="col-sm-12 col-md-4">
                      <div class="img-views">
                        <label class="input-preview text-center" for="img"><input ,="" class="input-preview__src btn btn-dark" id="img" name="image" type="file" /></label>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label col-12 col-md-2 col-lg-2">Description</label>
                        <div class="col-sm-12 col-md-9">
                            <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                  <div class="form-group row mb-4">
                  <label class="col-form-label col-12 col-md-2 col-lg-2">Status</label>
                  <div class="col-sm-12 col-md-9">
                      <select class="form-control selectric rounded" name="status" id="status">
                      <option value="">Select</option>
                      <option value="1">Active</option>
                      <option value="2">De-Active</option>
                      </select>
                      @error('status')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  </div>

                  <div class="form-group row mb-4">
                  <label class="col-form-label col-12 col-md-2 col-lg-2">Priority</label>
                  <div class="col-sm-12 col-md-9">
                      <input type="number" name="priority" id="priority" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label col-12 col-md-2 col-lg-2"></label>
                    <div class="col-sm-12 col-md-9">
                        <button type="submit"  class="btn btn-success">Create</button>
                    </div>
                  </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection




