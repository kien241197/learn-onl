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
        <div class="row m-0">
            <div class="col-lg-6 col-custom p-0">
                <div class="images">
                    <img class="w-100 d-block" src="{{ asset($layout->image_login) }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-custom p-0">
                <div class="content">
                    <div class="form">
                        <h3>Đăng ký</h3>
                        <p>Bạn đã có tài khoản? <a href="{{ route('getLogin') }}">Đăng nhập ngay</a></p>
                         @if (session('status'))
					         <ul>
					             <li class="text-danger text-center"> {{ session('status') }}</li>
					         </ul>
					     @endif
                        <form action="{{ route('postRegister') }}" method="POST">
                        	@csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="{{ old('email') }}" name="email" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Họ và tên</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
	                                    @if ($errors->has('name'))
	                                        <span class="text-danger">{{ $errors->first('name') }}</span>
	                                    @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Đơn vị công tác</label>
                                        <input type="text" class="form-control" name="company" value="{{ old('company') }}" required>
                                        @if ($errors->has('company'))
                                            <span class="text-danger">{{ $errors->first('company') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" class="form-control" name="password" required>
		                                @if ($errors->has('password'))
		                                    <span class="text-danger">{{ $errors->first('password') }}</span>
		                                @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
                                        <input type="password" class="form-control" name="password_confirmation" required>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn-custom w-100" type="submit">Đăng ký</button>
                            </div>
                            <div class="form-group text-center">
                                <label>Đăng ký bằng cách khác</label>
                            </div>
                            <div class="login">
                                <a class="btn-custom" href="#">Đăng ký bằng Facebook</a>
                                <a class="btn-custom" href="#">Đăng ký bằng Google</a>
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
        
    </script>
</body>

</html>