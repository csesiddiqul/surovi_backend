@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Website Setting</h3>


        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SI</th>
                    <th>Logo</th>
                    <th>Logo Name</th>
                    <th>Address</th>
                    <th>Map</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Weblink</th>
                    <th>Facebook Link</th>
                    <th>Twitter Link</th>
                    <th>Instagram Link</th>
                    <th>priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($websetting as $key => $webData)
                <tr>
                    <td>{{$key+1}}</td>


                    <td><img src="{{$webData->logo}}" alt="" width="20%"></td>
                    <td>{{\Illuminate\Support\Str::limit($webData->logo_name,10)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($webData->logo_name,10)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($webData->mapUrl,10)}}</td>
                    <td>{{$webData->phone}}</td>
                    <td>{{\Illuminate\Support\Str::limit($webData->email,10)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($webData->websiteLink,10)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($webData->facbookLink,10)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($webData->twitter,10)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($webData->instagram,10)}}</td>

                    <td>{{$webData->Priority}}</td>
                    <td>{{($webData->status == 1 ? 'Active' : 'De-Active')}}</td>
                    <td>
                        <a href="{{route('websetting.edit',$webData->id)}}" onclick="myFunction()" class="btn btn-success btn-xs"><i class="fa-solid fa-pen-to-square"></i> Edit</a>


                        <script>
                            function myFunction() {

                                if (confirm("edit_data") == true) {

                                } else {

                                }
                                document.getElementById("demo").innerHTML = text;
                            }
                        </script>



                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
