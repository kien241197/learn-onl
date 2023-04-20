<section class="site-huongdan pd-main">
	<div class="container">
		<div class="title-main">
			<h2 class="heading">HƯỚNG DẪN SỬ DỤNG NỀN TẢNG</h2>
			<p>{!! $layout->content_hd !!}</p>
		</div>
	</div>
	<div class="banner-hd">
        <div class="items">
            <img class="w-100 d-block" src="{{ asset($layout->banner_hd) }}" alt="">
        </div>
    </div>
    <div class="about-hd">
    	<div class="container">
    		@if(!request()->is('/'))
    		<div class="about-gv">
    			<img class="w-100 d-block" src="{{ asset('home/images/ab.jpg') }}" alt="">
    		</div>
    		@endif
    		<a class="btn-custom" href="{{ $layout->link_hd }}">VIDEO HƯỚNG DẪN</a>
    		<div class="video">
    			<div class="row">
    				<div class="col-md-6">
    					<div class="video-details">
    						{!! $layout->video_hd_1 !!}
    					</div>
    				</div>
    				<div class="col-md-6">
    					<div class="video-details">
    						{!! $layout->video_hd_2 !!}
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    
</section>
