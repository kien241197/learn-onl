<section class="site-feedback pd-main">
	<div class="container">
		<div class="title">
			<h2 class="heading">CẢM NHẬN CỦA HỌC VIÊN</h2>
			<a class="btn-custom" href="{{ $layout->link_nx }}">CHÌA KHÓA THÀNH CÔNG CỦA BẠN <i class="fa-solid fa-arrow-right"></i></a>
		</div>
		<div class="video-list">
			<div class="row">
				<div class="col-md-6">
					<div class="video">
						{!! $layout->video_nx_1 !!}
					</div>
				</div>
				<div class="col-md-6">
					<div class="video">
						{!! $layout->video_nx_2 !!}
					</div>
				</div>
			</div>
		</div>

		<div class="slick-feedback">
			<!-- Start -->
			<div class="items">
				<div class="custom">
					<div class="avata">
						<img src="{{ asset($layout->avt_nx_1) }}" alt="">
						<div class="text">
							<h3>{{ $layout->name_nx_1 }}</h3>
							<span>{{ $layout->office_nx_1 }}</span>
						</div>
					</div>
					<p>{!! $layout->content_nx_1 !!}</p>
				</div>
			</div>
			<!-- End -->
			<!-- Start -->
			<div class="items">
				<div class="custom">
					<div class="avata">
						<img src="{{ asset($layout->avt_nx_2) }}" alt="">
						<div class="text">
							<h3>{{ $layout->name_nx_2 }}</h3>
							<span>{{ $layout->office_nx_2 }}</span>
						</div>
					</div>
					<p>{!! $layout->content_nx_2 !!}</p>
				</div>
			</div>
			<!-- End -->
			<!-- Start -->
			<div class="items">
				<div class="custom">
					<div class="avata">
						<img src="{{ asset($layout->avt_nx_3) }}" alt="">
						<div class="text">
							<h3>{{ $layout->name_nx_3 }}</h3>
							<span>{{ $layout->office_nx_3 }}</span>
						</div>
					</div>
					<p>{!! $layout->content_nx_3 !!}</p>
				</div>
			</div>
			<!-- End -->
			<!-- Start -->
			<div class="items">
				<div class="custom">
					<div class="avata">
						<img src="{{ asset($layout->avt_nx_4) }}" alt="">
						<div class="text">
							<h3>{{ $layout->name_nx_4 }}</h3>
							<span>{{ $layout->office_nx_4 }}</span>
						</div>
					</div>
					<p>{!! $layout->content_nx_4 !!}</p>
				</div>
			</div>
			<!-- End -->
		</div>
		<div class="site-mxh pd-main" style="padding-bottom: 0;">
			<div class="title d-block">
				<h2 class="heading">Theo dõi TNB GARMENT trên các mạng xã hội</h2>
				<div class="content">
					<p>Cập nhật những&nbsp;tin tức – <strong>bài học&nbsp;mới nhất</strong>,&nbsp;lan tỏa&nbsp;tri thức,&nbsp;<strong>kết nối&nbsp;cộng đồng Doanh nhân may mặc Việt Nam</strong></p>
				</div>
			</div>
			<div class="mxh">
				<ul>
					<li>
						<a href="{{ $layout->link_fb }}">
							<img width="179" height="86" src="https://tnbgarment.edu.vn/wp-content/uploads/2022/10/facebook.png" alt="https://www.facebook.com/chuyengiamaymactnb">
						</a>
					</li>
					<li>
						<a href="{{ $layout->link_tiktok }}">
							<img width="179" height="86" src="https://tnbgarment.edu.vn/wp-content/uploads/2022/10/tiktok.png" alt="">
						</a>
					</li>
					<li>
						<a href="{{ $layout->link_ytb }}">
							<img width="179" height="86" src="https://tnbgarment.edu.vn/wp-content/uploads/2022/10/youtube.png" alt="https://www.youtube.com/channel/UChTurvIDOTG86PK_cWFGjnw/videos">
						</a>
					</li>
					<li>
						<a href="{{ $layout->link_zl }}">
							<img width="179" height="86" src="https://tnbgarment.edu.vn/wp-content/uploads/2022/10/zalo.png" alt="https://zalo.me/0911475883">
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="banner-hd slick-items-custom slick-banner">
	@if($layout->banner_4 != '')
	<div class="items">
		<a href="{{ $layout->link_banner_4 }}">
			<img class="w-100 d-block" src="{{ asset($layout->banner_4) }}" alt="">
		</a>
	</div>
	@endif
	@if($layout->banner_5 != '')
	<div class="items">
		<a href="{{ $layout->link_banner_5 }}">
			<img class="w-100 d-block" src="{{ asset($layout->banner_5) }}" alt="">
		</a>
	</div>
	@endif
</div>