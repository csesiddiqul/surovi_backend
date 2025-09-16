@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Donations list</h3>

            <a href="{{route('donations.create')}}" class="btn btn-info badge-success float-right">

                <i class="fa-solid fa-plus"></i> Add  </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="Get" action="{{ route('donations.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                    placeholder="search by title..."
                    value="{{ request('search') }}">
                    <button type="submit" class="btn btn-cuccess">Search</button>
                </div>
            </form>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>

                     <th>Title</th>
                     <th>type</th>
                      <th>Image</th>
                      <th>Status</th>
                       <th>Action</th>
                </tr>
                </thead>
             <tbody>
                  @foreach ($donations as $key => $donation)
                    <tr>
                      <td> {{$key+1}} </td>
                      <td>{{$donation->title}}</td>
                      <td>{{$donation->type}}</td>
                      <td>
                            <img alt="image" src="{{asset('backend/img/donation')}}/{{ $donation->image }}" width="60" height="40">
                      </td>
                      <td class="">{{$donation->status == 1 ? 'Active' : 'De-active'}}</td>
                      <td>
                        <div class="d-flex">
                       <a href="{{Route('donations.edit', $donation->id)}}" class="btn btn-warning mr-1"><i class="fas fa-edit"></i></a>

                        {{-- <a href="{{ route('donations.destroy', $donation->id) }}"
                        class="btn btn-danger btn-xs"
                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this donation?')) { document.getElementById('deletedonation{{ $donation->id }}').submit(); }">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </a>

                        <form id="deletedonation{{ $donation->id }}" action="{{ route('donations.destroy', $donation->id) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form> --}}



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














