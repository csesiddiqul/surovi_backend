@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->


            <!-- Main content -->
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>01</td>
                            <td>Hasn alli</td>
                            <td>Hasn00kg@gmail.com</td>
                            <td> <span class="badge bg-success">Admin</span></td>
                            <td>
                                <a href="#"> <span class="badge bg-primary"><i class="fa-solid fa-pen-to-square "></i></span> </a>
                                <a href="#"> <span class="badge badge-danger"><i class="fa-solid fa-trash-can"></i></span> </a>
                            </td>
                        </tr>

                        <tr>
                            <td>02</td>
                            <td>Rakib alli</td>
                            <td>Rasn00kg@gmail.com</td>
                            <td> <span class="badge bg-success">Superadmin</span></td>
                            <td>
                                <a href="#"> <span class="badge bg-primary"><i class="fa-solid fa-pen-to-square "></i></span> </a>
                                <a href="#"> <span class="badge badge-danger"><i class="fa-solid fa-trash-can"></i></span> </a>
                            </td>
                        </tr>


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.content -->


        </div><!--/. container-fluid -->
    </section>




@endsection
