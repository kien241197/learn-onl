@extends('layouts.user')

@section('content')
	<section class="site-dieukhoan pd-main">
		<div class="container">
			<div class="title-main text-center">
				<h2 class="heading">ĐIỀU KHOẢN SỬ DỤNG</h2>
			</div>
		</div>
	    <div class="about-hd">
	    	<div class="container">
	    		{!! $layout->content_dieu_khoan !!}
	    	</div>
	    </div>
	    
	</section>
	@include('component.site-res')
@endsection