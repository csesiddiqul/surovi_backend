@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Account list</h3>

            <a href="{{route('donate_info.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>

                    <th>Donation Name</th>
                      <th>Donor Name</th>

                      <th>Account</th>
                      <th>Amount</th>
                      <th>TXN ID</th>
                      <th>Number</th>
                       <th>Action</th>
                    </tr>
                </thead>
             <tbody>
                     @foreach ($donateinfo as  $donateinfo)
                    <tr>
                       <td>{{$donateinfo->donation->title}}</td>
                     <td>{{$donateinfo->name}}</td>
                      <td>{{$donateinfo->account}}</td>
                      <td>{{$donateinfo->rnumber}}</td>
                      <td>{{$donateinfo->txnid}}</td>
                      <td>{{$donateinfo->dnumber}}</td>
                      <td>
                        <div class="d-flex">
                       <a href="{{ route('donate_info.destroy', $donateinfo->id) }}"
                        class="btn btn-danger btn-xs"
                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this donate_info?')) { document.getElementById('deletedonate_info{{ $donateinfo->id }}').submit(); }">
                        <i class="fa-solid fa-trash-can"></i> Delete
                        </a>

                        <form id="deletedonate_info{{ $donateinfo->id }}" action="{{ route('donate_info.destroy', $donateinfo->id) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>

                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>


@endsection














