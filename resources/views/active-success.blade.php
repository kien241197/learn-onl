@extends('layouts.user')

@section('content')
<section class="pd-main">
	<div class="container">
		<div class="title-main text-center">
			<h2 class="heading">Kích hoạt khóa học thành công</h2>
			<p>Truy cập <a href="{{ route('info') }}#tab2">danh sách khóa học đã mua</a> để tham gia khóa học của bạn.</p>
		</div>
	</div>
	<div class="banner-hd">
        <div class="items">
            <img class="w-100 d-block" src="{{ asset('home/images/banner1.png') }}" alt="">
        </div>
    </div>
</section>
@endsection