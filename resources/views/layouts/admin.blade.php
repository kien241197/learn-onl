<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>LEARN ONLINE | {{ $title }}</title>

<!-- Font Awesome Icons -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/jquery-datetimepicker/jquery.datetimepicker.min.css') }}"/ >
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('public/image/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

    <!-- Header -->
    @include('admin.header')

    <!-- Sidebar -->
    @include('admin.side-bar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $title }}</h1>
          </div><!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div> --><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
    <div class="loading-div hidden">
        <div class="loader-img"></div>
    </div>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('public/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('public/js/jquery.datetimepicker.full.min.js') }}"></script>
<script src="{{ asset('public/js/app.js') }}"></script>
@if(session()->has('Flash'))
<script type="text/javascript">
  let urlRedirect = "{{ session()->get('Flash')[0]['urlRedirect'] }}";
  Swal.fire({
    title: "{{ session()->get('Flash')[0]['message'] }}",
    text: '',
    confirmButtonText: 'OK',
    icon: "{{ session()->get('Flash')[0]['mode'] }}",
  }).then(function() {
    if (urlRedirect != ""){
      window.location = urlRedirect;
    }
  });
</script>
@endif
@php
    session()->forget('Flash');
@endphp
</body>
</html>
