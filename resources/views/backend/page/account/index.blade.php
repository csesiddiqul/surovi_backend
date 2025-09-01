@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Account list</h3>

            <a href="{{route('account.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                     <th>Title</th>
                      <th>Image</th>
                      <th>Status</th>
                       <th>Action</th>
                </tr>
                </thead>
             <tbody>
                  @foreach ($account as $key => $account)
                    <tr>
                      <td> {{$key+1}} </td>
                      <td>{{$account->title}}</td>
                      <td>
                            <img alt="image" src="{{asset('backend/img/account')}}/{{ $account->image }}" width="60" height="40">
                      </td>
                      <td class="">{{$account->status == 1 ? 'Active' : 'De-active'}}</td>
                      <td>
                        <div class="d-flex">
                       <a href="{{Route('account.edit', $account->id)}}" class="btn btn-warning mr-1"><i class="fas fa-edit"></i></a>

                       <a href="{{ route('account.destroy', $account->id) }}"
                        class="btn btn-danger btn-xs"
                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this account?')) { document.getElementById('deleteaccount{{ $account->id }}').submit(); }">
                        <i class="fa-solid fa-trash-can"></i> Delete
                        </a>

                        <form id="deleteaccount{{ $account->id }}" action="{{ route('account.destroy', $account->id) }}" method="POST" class="d-none">
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














