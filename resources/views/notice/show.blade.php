@extends('layouts.admin')
@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Notice Show</h3>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
            Title : {{$notice->title}} <br>

            Description : {{$notice->description}}
        </div>
        <!-- /.card-body -->
    </div>
@endsection
