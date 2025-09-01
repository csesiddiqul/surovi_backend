@extends('backend.master')
@section('title') Donation Info - Admin Panel @endsection
@section('content')
<div class="main-content" style="padding-top:100px!important;">
  <section class="section">
    <div class="section-body">
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card card-primary author-box">
            <div class="card-body">
              <div class="d-flex justify-content-between mb-0">
                  <h5>Donation Info </h5>
                  <div class="">
                  <a href="{{Route('donate_info.index')}}"><i class="material-icons text-white rounded-circle bg-primary p-1">keyboard_backspace</i></a>
                  </div>
              </div>
                <div class="author-box-name mt-0">
                  <div class="row text-left">
                      <div class="col-md-12">
                        <h6 class="my-3">Donor Name: <strong>{{$donateinfo->name}}</strong></h6>
                        <h6 class="my-3">Account Name: <strong>{{$donateinfo->account}}</strong></h6>
                        <h6 class="my-3">Donate Amount: <strong>{{$donateinfo->rnumber}} BDT</strong></h6>
                        <h6 class="my-3">TXN ID: <strong>{{$donateinfo->txnid}}</strong></h6>
                        <h6 class="my-3">Donor Number: <strong>{{$donateinfo->dnumber}}</strong></h6>
                        <h6 class="my-3">Subject: <strong>{{$donateinfo->subject}}</strong></h6>
                        <h6 class="my-3">Message: <strong>{{$donateinfo->message}}</strong></h6>
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

