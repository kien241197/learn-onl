@extends('layouts.user')

@section('content')
    <section class="site-video-k pd-main">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="video">
                        <video controls controlsList="">
                            <source src="{{ asset('home/images/video.mp4') }}" type="video/mp4">
                            <source src="{{ asset('home/images/video.ogg') }}" type="video/ogg">
                        </video>
                        <div class="phone-opacity">
                            Phùng Thanh Sơn - 0123456789
                        </div>
                    </div>
                    <div class="flex-custom">
                        <div class="function">
                            <a class="error" href="#">Báo lỗi <span>!</span></a>
                            <a class="autoplay" href="#">Autoplay <i class="fa-solid fa-circle-play"></i></a>
                            <a class="next-time" href="#"><span>10</span> <i class="fa-solid fa-arrow-rotate-left"></i></a>
                            <a class="next-time" href="#"><span>10</span> <i class="fa-solid fa-arrow-rotate-right"></i></a>
                            <a class="next" href="#">Bài sau <i class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="form">
                        <h2>Bài 1: My Story</h2>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab1">Thảo luận</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab2">Tài liệu</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab1">
                                <form action="">
                                   <div class="form-group">
                                        <textarea rows="3" class="form-control" placeholder="Nhập nội dung câu hỏi"></textarea>
                                   </div>
                                    <button class="btn-custom" type="submit">Gửi câu hỏi</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <p><strong>Tài liệu học tập được cung cập độc quyền từ hệ thống học của TNB</strong></p>
                                <a class="btn-custom" href="{{ asset('home/images/video.mp4') }}" download="Tài liệu học tập">Download Tài liệu học tập</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="content-video">
                        <div class="htbh">
                            <p>Hoàn thành <span>6/19</span> bài học</p>
                            <div class="line">
                                <span style="width:30%"></span>
                            </div>
                        </div>
                        <div class="list-bh" id="style-3">
                            <div class="items">
                                <h3><span>Phần 1: Thương hiệu & Thương hiệu cá nhân</span></h3>
                                <ul>
                                    <li><a href="#">Bài 1: My Story</a> <span>07:01</span></li>
                                    <li><a href="#">Bài 2: Thế nào là thương hiệu cá nhân</a> <span>07:01</span></li>
                                    <li><a href="#">Bài 3: Các loại hình thương hiệu</a> <span>07:01</span></li>
                                    <li><a href="#">Bài 4: Các loại hình thương hiệu</a> <span>07:01</span></li>
                                    <li><a href="#">Bài 5: Các loại hình thương hiệu</a> <span>07:01</span></li>
                                </ul>
                            </div>
                            <div class="items">
                                <h3><span>Phần 2: Quy trình xây dựng</span></h3>
                                <ul>
                                    <li><a class="active" href="#">Bài 6: My Story</a> <span>07:01</span></li>
                                    <li><a href="#">Bài 7: Thế nào là thương hiệu cá nhân</a> <span>07:01</span></li>
                                    <li><a href="#">Bài 8: Các loại hình thương hiệu</a> <span>07:01</span></li>
                                    <li><a href="#">Bài 9: Các loại hình thương hiệu</a> <span>07:01</span></li>
                                    <li><a href="#">Bài 10: Các loại hình thương hiệu</a> <span>07:01</span></li>
                                </ul>
                            </div>
                            <div class="items">
                                <h3><span>Phần 2: Quy trình truyền thông</span></h3>
                                <ul>
                                    <li><a href="#">Bài 11: My Story</a> <span>07:01</span></li>
                                    <li><a href="#">Bài 12: Thế nào là thương hiệu cá nhân</a> <span>07:01</span></li>
                                    <li><a href="#">Bài 13: Các loại hình thương hiệu</a> <span>07:01</span></li>
                                    <li><a href="#">Bài 14: Các loại hình thương hiệu</a> <span>07:01</span></li>
                                    <li><a href="#">Bài 15: Các loại hình thương hiệu</a> <span>07:01</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection