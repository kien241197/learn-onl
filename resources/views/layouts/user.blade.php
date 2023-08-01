<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>ĐÀO TẠO QUẢN TRỊ MAY MẶC{{ isset($title) ? ' - '.$title : '' }}</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	@include('library.header-css')
    @include('library.footer-js')

</head>
<!-- oncontextmenu="return false;" -->
<body>
@include('header')
<main>
	@yield('content')
</main>
@include('footer')
<script type="text/javascript" src="{{ asset('home/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 @if (session('tokenLimit') && session('tokenLimit') != '')
    <script type="text/javascript">
        localStorage.setItem('myToken', "{{ session('tokenLimit') }}");
    </script>
 @endif
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