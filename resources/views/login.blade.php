<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ĐÀO TẠO QUẢN TRỊ MAY MẶC</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/slick/slick-theme.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/responsive.css') }}">
</head>

<body>
<main>
    <section class="site-login">
        <div class="row m-0">
            <div class="col-lg-6 col-custom p-0">
                <div class="images">
                    <img class="w-100 d-block" src="{{ asset($layout->image_login) }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-custom p-0">
                <div class="logo">
                    <ul>
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><a href="{{ route('khoa-hoc') }}">Khóa học</a></li>
                        <li><a href="{{ route('huong-dan') }}">Hướng dẫn sử dụng</a></li>
                        <li><a href="#">Thư viện</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                    <a href="{{ route('home') }}">
                        <img src="{{ asset($layout->logo) }}" alt="">
                    </a>
                </div>
                <div class="content">

                    <div class="form">
                        <h3>Đăng nhập</h3>
                        <p>Bạn chưa có tài khoản? <a href="{{ route('getRegister') }}">Đăng ký miễn phí ngay</a></p>
                         @if (session('status'))
					         <ul>
					             <li class="text-danger text-center"> {{ session('status') }}</li>
					         </ul>
					     @endif
                        <form action="{{ route('postLogin') }}" method="POST">
                        	@csrf
                            <input type="hidden" name="limit_token" id="limit-token">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <button class="btn-custom " type="submit">Đăng nhập</button>
                            </div>
                            <div class="form-group text-center">
                                <label><a href="{{ route('forgotPass') }}">Quên mật khẩu?</a></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script type="text/javascript" src="{{ asset('home/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/js/main.js') }}"></script>
    <script>
        $('#limit-token').val(localStorage.getItem("myToken"));
    </script>
</body>

</html>