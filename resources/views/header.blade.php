<header class="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-2">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset($layout->logo) }}" alt="">
                    </a>
                    <div class="js-menu-mobile">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="icon-search-mb">
                        <a class="js-search-mb" href="javascript:void(0)"><i class="fa-solid fa-search"></i></a>
                    </div>
                    <div class="search js-form-search-mb">
                        <form class="form-search" action="{{ route('khoa-hoc') }}">
                            <input class="form-control" type="text" placeholder="Tìm kiếm..." name="search">
                            <button type="submit">Tìm kiếm</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="menu">
                    <ul>
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><a href="{{ route('khoa-hoc') }}">Khóa học</a></li>
                        <li><a href="{{ route('huong-dan') }}">Hướng dẫn sử dụng</a></li>
                        <li><a href="https://tnbgarment.edu.vn/category/thu-vien-kien-thuc/" target="b_lank">Thư viện</a></li>
                        <li><a href="https://tnbgarment.edu.vn/lien-he/">Liên hệ</a></li>
                    </ul>
                    <div class="icon-search">
                        <a class="js-search" href="javascript:void(0)"><i class="fa-solid fa-search"></i></a>
                        <div class="search js-form-search">
                            <form class="form-search" action="{{ route('khoa-hoc') }}">
                                <input class="form-control" type="text" placeholder="Tìm kiếm..." name="search">
                                <button type="submit">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                    @auth
                    <div class="icon-search" id="div-cart">
                        <a href="{{ route('cart') }}"><i class="fa-solid fa-shopping-cart"></i></a>
                        @if(\Cart::count() > 0)
                        <span id="count-cart">{{ \Cart::count() }}</span>
                        @endif
                    </div>
                    @endauth
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