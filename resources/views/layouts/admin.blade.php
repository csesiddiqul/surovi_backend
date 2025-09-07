@php

    $logoData = \App\Models\websiteSetting::first();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surovi | Dashboard</title>
    <link rel="icon" type="image/png" href="{{$logoData->logo}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->

    <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}} ">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href=" {{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}} ">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href=" {{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href=" {{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href=" {{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <!-- BS Stepper -->
    <link rel="stylesheet" href=" {{asset('admin/plugins/bs-stepper/css/bs-stepper.min.css')}}">


    <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jodit@4.6.2/es2021/jodit.fat.min.css" /> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jodit/4.2.47/es2021/jodit.min.css"/>


</head>
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Theme style -->
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


    @include('sweetalert::alert')

    <!-- Navbar -->
     @include('adinc.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('adinc.sidebar')

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->


                <!-- Main content -->
                @yield('content')
                <!-- /.content -->


            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; {{date('d-m-y')}} <a href="https://adminlte.io">Surovi</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/4.2.47/es2021/jodit.min.js"></script>

<script>
  const editor = Jodit.make('#editor', {
    toolbarAdaptive: true,
    toolbarSticky: true,
    height: 400,
    uploader: {
      insertImageAsBase64URI: true
    }
  });
</script>



<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>



<!-- AdminLTE for demo purposes -->




<!-- DataTables  & Plugins -->
<script src=" {{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src=" {{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src=" {{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src=" {{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src=" {{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src=" {{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src=" {{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
<script src=" {{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src=" {{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src=" {{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src=" {{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src=" {{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- ChartJS -->


<!-- AdminLTE for demo purposes -->
<script>
    $(function () {
        $('#example2').DataTable();
    });
</script>


</body>
</html>
