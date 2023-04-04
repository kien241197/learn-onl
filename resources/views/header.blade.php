<header class="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-2">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('home/images/logo.png') }}" alt="">
                    </a>
                    <div class="js-menu-mobile">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="menu">
                    <ul>
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><a href="{{ route('khoa-hoc') }}">Khóa học</a></li>
                        <li><a href="{{ route('huong-dan') }}">Hướng dẫn sử dụng</a></li>
                        <li><a href="#">Thư viện</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                    <div class="icon-search"><i class="fa-solid fa-magnifying-glass"></i></div>
                    <div class="login">
                    	@guest
                        <a class="btn-custom" href="{{ route('getRegister') }}">Đăng ký</a>
                        <a class="btn-custom" href="{{ route('getLogin') }}">Đăng nhập</a>
                        @endguest
                        @auth
                        <a href="{{ route('info') }}">Xin chào, {{ Auth::user()->name }}</a>
                        <a class="btn-custom" href="{{ route('getLogout') }}"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>