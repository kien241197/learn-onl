<section class="site-about pd-main">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="images">
					<img class="w-100 d-block" src="{{ asset($layout->image_gt) }}" alt="">
				</div>
			</div>
			<div class="col-md-7">
				<div class="content">
					<h3>{!! $layout->title_gt !!}</h3>
					{!! $layout->content_gt !!}
					<div class="flow">
						<h4>Theo dõi thầy Trần Ngọc Bình</h4>
						<ul>
							<li><a href="{{ $layout->link_fb }}"><i class="fa-brands fa-square-facebook"></i></a></li>
							<li><a href="{{ $layout->link_zl }}"><img style="width:35px;" src="{{asset('home/images/2zalo.png')}}" alt=""></a></li>
							<li><a href="{{ $layout->link_tiktok }}"><i class="fa-brands fa-tiktok"></i></a></li>
							<li><a href="{{ $layout->link_lkin }}"><i class="fa-brands fa-linkedin"></i></a></li>
							<li><a href="{{ $layout->link_ytb }}"><i class="fa-brands fa-square-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>