@extends('layouts.user')

@section('content')
    <section class="site-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content">
                        <div class="title">
                            <h1>{{ $course->name }}</h1>
                            <p>{{ $course->note }}</p>
                        </div>
                        <div class="thong-ke">
                            <div class="raiting col-custom">
                                <span>{{ $course->star }}</span>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <span class="gray">({{ $course->star_number }})</span>
                            </div>
                            <div class="user text col-custom">
                                <i class="fa-solid fa-user"></i>
                                <p>{{ $course->people_number }} Người đã đăng ký</p>
                            </div>
                            <div class="time text col-custom">
                                <i class="fa-solid fa-clock"></i>
                                <p>Thời gian update <strong>{{ \Carbon\Carbon::parse($course->created_at)->format('m/Y') }}</strong></p>
                            </div>
                        </div>
                        <div class="athour">
                            <img src="{{ asset($layout->icon_teacher) }}" alt="">
                            <p>Thầy: <strong>Trần Ngọc Bình</strong></p>
                        </div>
                        <div class="list">
                            <ul>
                                <li>
                                    <span>
                                        <i class="fa-solid fa-file-video"></i>
                                        Bài học
                                    </span>
                                    <p>{{ $countLesson }}</p>
                                </li>
                                <li>
                                    <span>
                                        <i class="fa-solid fa-chalkboard-user"></i>
                                        Chuyên gia
                                    </span>
                                    <p>01</p>
                                </li>
                                <li>
                                    <span>
                                        <i class="fa-solid fa-clock"></i>
                                        Thời gian
                                    </span>
                                    <p>{{ $course->time }} Giờ</p>
                                </li>
                                <li>
                                    <span>
                                        <i class="fa-solid fa-chart-simple"></i>
                                        Kỹ năng
                                    </span>
                                    <p>{{ $course->level ? App\Enums\CourseLevel::getDescription($course->level) : 'Không cấp độ' }}</p>
                                </li>
                                <li>
                                    <span>
                                        <i class="fa-solid fa-language"></i>
                                        Ngôn ngữ
                                    </span>
                                    <p>Tiếng việt</p>
                                </li>
                                <li>
                                    <span>
                                        <i class="fa-solid fa-certificate"></i>
                                        Giấy chứng nhận
                                    </span>
                                    <p>Có</p>
                                </li>
                                <li>
                                    <span>
                                        <i class="fa-solid fa-link"></i>
                                        Truy cập học lại
                                    </span>
                                    <p>Có</p>
                                </li>
                            </ul>
                        </div>
                        <div class="flow mobile-none">
                            <h4>Theo dõi thầy Trần Ngọc Bình</h4>
                            <ul>
                                <li><a href="{{ $layout->link_fb }}"><i class="fa-brands fa-square-facebook"></i></a></li>
                                <li><a style="font-size: 15px; font-weight: bold; color: #2196F3" href="{{ $layout->link_zl }}">Zalo</a></li>
                                <li><a href="{{ $layout->link_tiktok }}"><i class="fa-brands fa-tiktok"></i></a></li>
                                <li><a href="{{ $layout->link_lkin }}"><i class="fa-brands fa-linkedin"></i></a></li>
                                <li><a href="{{ $layout->link_ytb }}"><i class="fa-brands fa-square-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="video-content">
                        <div class="video">
                            <iframe width="560" height="315" src="{{ asset($course->video_demo_path) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="price">
                            <div class="price-km">{{ number_format($course->price_sale) }}đ</div>
                            <div class="price-t">{{ number_format($course->price) }}đ</div>
                        </div>
                        <div class="addtocart">
                            <a href="javascript:void(0);" @auth onclick="addToCart(`{{ route('addCart', $course->id) }}`);" @endauth @guest onclick="alert('Đăng nhập để mua khóa học!')" @endguest class="btn-custom" type="submit">Thêm vào giỏ hàng</a>
                            <a href="javascript:void(0);" onclick="buyNow(`{{ route('buyCourse', $course->id) }}`);" class="btn-custom" type="submit">Mua Ngay</a>
                        </div>
                    </div>
                    <div class="video-about pd-main">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="images">
                                    <img class="w-100 d-block" src="{{ asset($layout->image_teacher) }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="content">
                                    <h3>HỌC CÙNG CHUYÊN GIA <br>
                                    HÀNG ĐẦU TRONG NGÀNH</h3>
                                    <ul>
                                        <li>Ông <strong>Trần Ngọc Bình</strong></li>
                                        <li>Chủ tịch HĐQT TNB GARMENT</li>
                                    </ul>
                                    <p>Chuyên gia đào tạo hàng đầu về Quản trị sản xuất <br>
                                    may công nghiệp tại Việt Nam</p>
                                    <a class="btn-custom" href="#form-res">Đăng ký tư vấn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flow destop-none">
                        <h4>Theo dõi thầy Trần Ngọc Bình</h4>
                        <ul>
                            <li><a href="{{ $layout->link_fb }}"><i class="fa-brands fa-square-facebook"></i></a></li>
                            <li><a href="{{ $layout->link_zl }}"><i class="fa-brands fa-square-zalo"></i></a></li>
                            <li><a href="{{ $layout->link_tiktok }}"><i class="fa-brands fa-square-tiktok"></i></a></li>
                            <li><a href="{{ $layout->link_lkin }}"><i class="fa-brands fa-linkedin"></i></a></li>
                            <li><a href="{{ $layout->link_ytb }}"><i class="fa-brands fa-square-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="the_content">
        <div class="container">
            <div class="content">
                <p>{!! $course->detail_content !!}</p>
            </div>
        </div>
    </section>
    <section class="site-single-lq">
        <div class="container">
            <div class="title-main">
                <h2 class="heading">Các khóa học liên quan</h2>
                <p>Quản trị sản xuất may công nghiệp tại Việt Nam</p>
            </div>
            <div class="slick-single-lq">
				@foreach($courses as $course)
					<div class="items">
						<div class="content-products">
							<a class="images" href="{{ route('single', [Illuminate\Support\Str::slug($course->name), $course->id]) }}" title="" tabindex="0">
								<img src="{{ asset($course->image_url) }}" alt="">
								<span>HOT</span>
							</a>
							<h3><a href="{{ route('single', [Illuminate\Support\Str::slug($course->name), $course->id]) }}" tabindex="0">{{ $course->name }}</a></h3>
							<p>{{ $course->note }}</p>
							<div class="price-details">
								<a class="btn-custom" href="{{ route('single', [Illuminate\Support\Str::slug($course->name), $course->id]) }}" tabindex="0">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
								<span class="price">{{ number_format($course->price_sale) }} VND</span>
							</div>
						</div>
					</div>
				@endforeach
            </div>
        </div>
    </section>
    @include('component.site-res')
@endsection