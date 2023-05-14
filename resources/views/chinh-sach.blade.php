@extends('layouts.user')

@section('content')
	<section class="site-chinhsach pd-main">
		<div class="container">
			<div class="title-main text-center">
				<h2 class="heading">CHÍNH SÁCH RIÊNG TƯ</h2>
			</div>
		</div>
	    <div class="about-hd">
	    	<div class="container">
	    		{!! $layout->content_chinh_sach !!}
	    	</div>
	    </div>
	    
	</section>
	@include('component.site-res')
@endsection