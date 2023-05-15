<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ĐÀO TẠO QUẢN TRỊ MAY MẶC</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('home/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/slick/slick-theme.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/responsive.css') }}">
    <style type="text/css">
        .loading {
          position: fixed;
          z-index: 999;
          height: 2em;
          width: 2em;
          overflow: show;
          margin: auto;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
        }

        /* Transparent Overlay */
        .loading:before {
          content: '';
          display: block;
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
            background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

          background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
        }

        /* :not(:required) hides these rules from IE9 and below */
        .loading:not(:required) {
          /* hide "loading..." text */
          font: 0/0 a;
          color: transparent;
          text-shadow: none;
          background-color: transparent;
          border: 0;
        }

        .loading:not(:required):after {
          content: '';
          display: block;
          font-size: 10px;
          width: 1em;
          height: 1em;
          margin-top: -0.5em;
          -webkit-animation: spinner 150ms infinite linear;
          -moz-animation: spinner 150ms infinite linear;
          -ms-animation: spinner 150ms infinite linear;
          -o-animation: spinner 150ms infinite linear;
          animation: spinner 150ms infinite linear;
          border-radius: 0.5em;
          -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
        box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
        }

        /* Animation */

        @-webkit-keyframes spinner {
          0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
          }
          100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
        @-moz-keyframes spinner {
          0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
          }
          100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
        @-o-keyframes spinner {
          0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
          }
          100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
        @keyframes spinner {
          0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
          }
          100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
    </style>
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
                        <h3>Quên mật khẩu</h3>
                        @if (session('status'))
                             <ul>
                                 <li class="text-danger text-center"> {{ session('status') }}</li>
                             </ul>
                         @endif
                        <form action="{{ route('postForgot') }}" method="POST">
                        	@csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Nhập email đã đăng ký" required>
                                <div class="mt-2 text-right">
	                                <label><a href="javascript:void(0);" id="get-code-reset">Nhận mã xác thực</a></label>
	                            </div>
                            </div>
                            <div class="form-group">
                                <label>Mã xác thực</label>
                                <input type="text" class="form-control" name="code" placeholder="Gồm 6 ký tự được gửi tới email" required>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu mới</label>
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu mới" required>
                            </div>
                            <div class="form-group">
                                <button class="btn-custom " type="submit">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="loading" style="display: none;">Loading&#8230;</div>
<script type="text/javascript" src="{{ asset('home/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/js/main.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#limit-token').val(localStorage.getItem("myToken"));
    $(document).on('click', '#get-code-reset', function () {
        if(!$('input[name=email]').val()) return;
        $('.loading').css('display', 'block');
        $.post( "{{ route('sendCode') }}", { email: $('input[name=email]').val() })
          .done(function( data ) {
            $('.loading').css('display', 'none');
            alert('Vui lòng truy cập hòm thư để nhận mã xác thực!');
          })
          .fail(function() {
            $('.loading').css('display', 'none');
            alert( "Có lỗi xảy ra, hãy thử lại!" );
          });
    });
</script>
</body>

</html>