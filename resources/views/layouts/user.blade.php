<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ĐÀO TẠO QUẢN TRỊ MAY MẶC</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	@include('library.header-css')

</head>
<!-- oncontextmenu="return false;" -->
<body>
@include('header')
<main>
	@yield('content')
</main>
@include('footer')
@include('library.footer-js')
</body>
</html>