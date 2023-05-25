<section class="site-course pd-main">
	<div class="container">
		<div class="title-main">
			<h2 class="heading">CÁC KHÓA HỌC TẠI TNB GARMENT</h2>
			<p>{!! $layout->content_kh !!}</p>
		</div>
		<ul class="nav">
			@if(!request()->search)
			<li class="nav-items">
				<a class="nav-link active" data-toggle="tab" href="#tab0">Tất cả khóa học</a>
			</li>
			@foreach($categories as $category)
			<li class="nav-items">
				<a class="nav-link" data-toggle="tab" href="#tab{{ $category->id }}">{{ $category->name }}</a>
			</li>
			@endforeach
			@else
			<li class="nav-items">
				<a class="nav-link active" data-toggle="tab" href="#tab0">Kết quả tìm kiếm "{{ request()->search }}"</a>
			</li>
			@endif
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
									<a class="images" href="{{ route('single', [Illuminate\Support\Str::slug($course->name), $course->id]) }}" title="" tabindex="0">
										<img src="{{ asset($course->image_url) }}" alt="">
										<span>HOT</span>
									</a>
									<h3><a href="{{ route('single', [Illuminate\Support\Str::slug($course->name), $course->id]) }}" tabindex="0">{{ $course->name }}</a></h3>
									<p>{{ $course->note }}</p>
									<div class="price-details">
										<a class="btn-custom" href="{{ route('single', [Illuminate\Support\Str::slug($course->name), $course->id]) }}" tabindex="0">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
										<div class="custom">
											<span class="price">{{ number_format($course->price_sale) }} VND</span>
											<a href="javascript:void(0);" @auth onclick="addToCart(`{{ route('addCart', $course->id) }}`);" @endauth @guest onclick="alert('Đăng nhập để mua khóa học!')" @endguest class="btn-custom" type="submit">Mua Ngay</a>
										</div>
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
									<a class="images" href="{{ route('single',[Illuminate\Support\Str::slug($course->name), $course->id]) }}" title="" tabindex="0">
										<img src="{{ asset($course->image_url) }}" alt="">
										<span>HOT</span>
									</a>
									<h3><a href="{{ route('single',[Illuminate\Support\Str::slug($course->name), $course->id]) }}" tabindex="0">{{ $course->name }}</a></h3>
									<p>{{ $course->note }}</p>
									<div class="price-details">
										<a class="btn-custom" href="{{ route('single', [Illuminate\Support\Str::slug($course->name), $course->id]) }}" tabindex="0">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
										<div class="custom">
											<span class="price">{{ number_format($course->price_sale) }} VND</span>
											<a href="javascript:void(0);" @auth onclick="addToCart(`{{ route('addCart', $course->id) }}`);" @endauth @guest onclick="alert('Đăng nhập để mua khóa học!')" @endguest class="btn-custom" type="submit">Mua Ngay</a>
										</div>
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
