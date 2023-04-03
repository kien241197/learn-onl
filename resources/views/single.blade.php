@extends('layouts.user')

@section('content')
    <section class="site-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content">
                        <div class="title">
                            <h1>{{ $course->category->name }}</h1>
                            <p>{{ $course->category->note }}</p>
                        </div>
                        <div class="thong-ke">
                            <div class="raiting col-custom">
                                <span>4.5</span>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <span class="gray">(2000)</span>
                            </div>
                            <div class="user text col-custom">
                                <i class="fa-solid fa-user"></i>
                                <p>800 Người đã đăng ký</p>
                            </div>
                            <div class="time text col-custom">
                                <i class="fa-solid fa-clock"></i>
                                <p>Thời gian update <strong>{{ \Carbon\Carbon::parse($course->created_at)->format('m/Y') }}</strong></p>
                            </div>
                        </div>
                        <div class="athour">
                            <img src="{{ asset('home/images/user.png') }}" alt="">
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
                                    <p>{{ App\Enums\CourseLevel::getDescription($course->level) }}</p>
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
                            <h4>Flow us</h4>
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-square-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-square-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-square-youtube"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-square-google-plus"></i></a></li>
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
                            <button class="btn-custom" type="submit">Thêm vào giỏ hàng</button>
                            <button class="btn-custom" type="submit">Mua Ngay</button>
                        </div>
                    </div>
                    <div class="video-about pd-main">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="images">
                                    <img class="w-100 d-block" src="{{ asset('home/images/ab.jpg') }}" alt="">
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
                                    <a class="btn-custom" href="#">Đăng ký tư vấn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flow destop-none">
                        <h4>Flow us</h4>
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-square-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-square-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-square-youtube"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-square-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="the_content">
        <div class="container">
            <div class="content">
                <p>Chủ đề về quản lý nhân sự trong ngành may mặc là một vấn đề rất quan trọng để đảm bảo hiệu quả sản xuất và phát triển bền vững của ngành. Với sự cạnh tranh khốc liệt của thị trường, việc tìm kiếm, thu hút và giữ chân nhân sự tốt là một yếu tố quan trọng để đảm bảo sự phát triển của doanh nghiệp</p>
                <p>Trong bài viết này, chúng ta sẽ tìm hiểu về những hoạt động quản lý nhân sự trong ngành may mặc, bao gồm cả đào tạo và phát triển nhân sự, tạo môi trường làm việc tích cực, cải tiến quy trình sản xuất và nhiều hơn nữa. Nội dung này cung cấp cho bạn những kiến thức cần thiết để hiểu và áp dụng các chiến lược quản lý nhân sự hiệu quả trong ngành may mặc.</p>
                <p>Hãy cùng tìm hiểu và khám phá những thông tin hữu ích về quản lý nhân sự trong ngành may mặc nhé!</p>
                <p class="text-center">
                    <img src="{{ asset('home/images/single.jpg') }}" alt="">
                </p>
                <h3><strong>Tầm quan trọng của quản lý hiệu quả nhân sự trong ngành may mặc</strong></h3>
                <p>Quản lý nhân sự là yếu tố quan trọng giúp cho các doanh nghiệp trong ngành may mặc có thể đáp ứng nhu cầu sản xuất, cạnh tranh và phát triển. Việc quản lý hiệu quả nhân sự sẽ giúp cho doanh nghiệp có được sự linh hoạt trong quản lý nguồn lực và chi phí, tăng cường hiệu quả sản xuất và nâng cao chất lượng sản phẩm.</p>
            </div>
        </div>
    </section>
    <section class="site-single-lq">
        <div class="container">
            <div class="title-main">
                <h2 class="heading">Các khóa học liên quan</h2>
                <p>Quản trị sản xuất may công nghiệp tại Việt Nam</p>
            </div>
            <div class="row">
				@foreach($courses as $course)
					<div class="col-xl-4 col-md-6 mb-30">
						<div class="content-products">
							<a class="images" href="{{ route('single', $course->id) }}" title="" tabindex="0">
								<img src="{{ asset($course->image_url) }}" alt="">
								<span>HOT</span>
							</a>
							<h3><a href="{{ route('single', $course->id) }}" tabindex="0">{{ $course->name }}</a></h3>
							<p>{{ $course->note }}</p>
							<div class="price-details">
								<a class="btn-custom" href="{{ route('single', $course->id) }}" tabindex="0">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
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