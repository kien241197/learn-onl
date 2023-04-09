<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>ĐÀO TẠO QUẢN TRỊ MAY MẶC</title>
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
 @if (session('tokenLimit') && session('tokenLimit') != '')
    <script type="text/javascript">
        localStorage.setItem('myToken', "{{ session('tokenLimit') }}");
    </script>
 @endif
</body>
</html>