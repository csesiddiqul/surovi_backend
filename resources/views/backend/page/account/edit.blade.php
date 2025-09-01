@extends('layouts.admin')
@section('title') Account Edit - Admin-Panel @endsection
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <form class="form p-2" action="{{route('account.update', $account->id)}}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PATCH')
              <div class="card-body">
                  <div class="d-flex justify-content-between mb-2">
                    <h5 class="">Edit Account</h5>
                    <div class="">
                      <a href="{{Route('account.index')}}"><i class="material-icons text-white rounded-circle bg-primary p-1">keyboard_backspace</i></a>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                  <label class="col-form-label  col-12 col-md-2 col-lg-2">Title</label>
                  <div class="col-sm-12 col-md-9">
                      <input type="text" name="title" id="title" value="{{$account->title}}" class="form-control">
                      @error('title')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label col-12 col-md-2 col-lg-2">Image</label>
                    <div class="col-sm-12 col-md-4">
                    <div class="img-views">
                      <label class="input-preview text-center" for="img"><input ,="" class="input-preview__src btn btn-dark" id="img" name="image" type="file" /></label>
                    </div>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-4">
                      <div class="img-views">
                        <img src="{{asset('backend/img/account')}}/{{$account->image}}" alt="" class="img-fluid input-preview" width="300">
                        </div>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label col-12 col-md-2 col-lg-2">Account Info</label>
                    <div class="col-sm-12 col-md-9">
                        <textarea class="form-control summernote" name="description" id="description" rows="5">{{$account->description}}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label col-12 col-md-2 col-lg-2">Status</label>
                    <div class="col-sm-12 col-md-9">
                        <select class="form-control selectric rounded" name="status" id="status" required>
                            <option value="1" {{$account->status == 1 ? 'selected': ''}}>Active</option>
                            <option value="2" {{$account->status == 2 ? 'selected':''}}>De-Active</option>
                        </select>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label col-12 col-md-2 col-lg-2">Priority</label>
                    <div class="col-sm-12 col-md-9">
                        <input type="number" name="priority" id="priority" value="{{$account->priority}}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label col-12 col-md-2 col-lg-2"></label>
                    <div class="col-sm-12 col-md-9">
                        <button type="submit"  class="btn btn-primary">Update</button>
                    </div>
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

@section('script')

@endsection



