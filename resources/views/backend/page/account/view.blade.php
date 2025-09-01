@extends('layouts.admin')
@section('title') Slider View - Admin Panel @endsection
@section('content')
<div class="main-content" style="padding-top:100px!important;">
  <section class="section">
    <div class="section-body">
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card card-primary author-box">
            <div class="card-body">
              <div class="d-flex justify-content-between mb-3">
                  <h5>Slider View</h5>
                  <div class="">
                  <a href="{{Route('slider.index')}}"><i class="material-icons text-white rounded-circle bg-primary p-1">keyboard_backspace</i></a>
                  </div>
              </div>
              <div class="author-box-center mt-3">
                  <img alt="image" src="{{asset('backend/img/slider')}}/{{$slider->image}}" class="img-fluid mb-4" height="100%" width="100%">
                <div class="clearfix"></div>
                <div class="author-box-name mt-4">
                  <div class="row text-left">
                      <div class="col-md-2">
                          <h6>Title :</h6>
                      </div>
                      <div class="col-md-10">
                          <h6>{{$slider->title}}</h6>
                      </div>

                      <div class="col-md-2">
                          <h6>Description :</h6>
                      </div>
                      <div class="col-md-9">
                        <h6>
                          @php
                            echo $slider->description;
                          @endphp
                        </h6>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

