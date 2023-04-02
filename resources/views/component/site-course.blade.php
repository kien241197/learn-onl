<section class="site-course pd-main">
	<div class="container">
		<div class="title-main">
			<h2 class="heading">CÁC KHÓA HỌC TẠI TNB GARMENT</h2>
			<p>Quản trị sản xuất may công nghiệp tại Việt Nam</p>
		</div>
		<ul class="nav">
			<li class="nav-items">
				<a class="nav-link active" data-toggle="tab" href="#tab0">Tất cả khóa học</a>
			</li>
			@foreach($categories as $category)
			<li class="nav-items">
				<a class="nav-link" data-toggle="tab" href="#tab{{ $category->id }}">{{ $category->name }}</a>
			</li>
			@endforeach
		</ul>
	</div>
	<div class="site-solutions">
		<div class="container">
			<div class="tab-content">
				<div class="tab-pane fade active show" id="tab0">
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
				@foreach($categories as $category)
				<div class="tab-pane fade" id="tab{{ $category->id }}">
					<div class="row">
						@foreach($category->courses as $course)
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
				@endforeach
			</div>
		</div>
	</div>
</section>
