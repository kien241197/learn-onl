@extends('layouts.user')

@section('content')
    <section class="site-user pd-main">
        <div class="container">
            <div class="title-main text-center">
                <h2 class="heading">Quản lý thông tin</h2>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar-menu">
                        <ul class="nav">
                            <li><a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
                            <li class="nav-items">
                                <a class="nav-link active" data-toggle="tab" href="#tab1"><i class="fa-solid fa-user"></i> Thông tin cá nhân</a>
                            </li>
                            <li class="nav-items">
                                <a class="nav-link" data-toggle="tab" href="#tab2"><i class="fa-solid fa-chalkboard"></i> Khóa học đã mua</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="content-user">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <form action="{{ route('changeInfo') }}" method="POST">
                                	@csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Họ và tên</label>
                                                <input class="form-control" value="{{ old('name', $user->name) }}" type="text" name="name">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Giới tính</label>
                                                <input class="form-control" value="Nam" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Địa chỉ</label>
                                                <input class="form-control" value="130 Xô Viết Nghệ Tỉnh" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Số điện thoại</label>
                                                <input class="form-control" value="0915659223" type="text">
                                            </div>
                                        </div> -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input class="form-control" value="{{ $user->email }}" type="text" readonly>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Ngày sinh</label>
                                                <input class="form-control" value="11/6/1989" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">CMND/CCCD</label>
                                                <input class="form-control" value="362209685" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nơi cấp</label>
                                                <input class="form-control" value="CA HÀ NỘI" type="text">
                                            </div>
                                        </div> -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Mật khẩu</label>
                                                <input class="form-control"  type="password" value="" name="old_password">
                                                @if ($errors->has('old_password'))
                                                    <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Mật khẩu mới</label>
                                                <input class="form-control"  type="password" value="" name="password">
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn-custom" type="submit">Thay đổi thông tin</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <div class="kh-dm">
                                    <table>
                                    	@foreach($user->orders as $order)
                                        <tr>
                                            <td style="width: 240px;">
                                                <img src="{{ asset($order->course->image_url) }}" alt="">
                                            </td>
                                            <td>
                                                <a class="title" href="#">{{ $order->course->name }}</a>
                                            </td>
                                            <td>
                                                Thời hạn: {{ \Carbon\Carbon::parse($order->course->publish_end)->format('d-m-Y') }}
                                            </td>
                                            <td>
                                            	@if($order->is_active == \App\Enums\StatusActive::NOT)
                                            	<span class="badge badge-secondary p-2">Chưa kích hoạt</span>
                                            	@elseif($order->course->publish_end < \Carbon\Carbon::now()->format('Y-m-d H:i:s'))
                                            	<span class="badge badge-secondary p-2">Hết hạn</span>
                                            	@elseif(count($order->course->chapters) && count($order->course->chapters->first()->lessons))
                                            	<a class="btn-custom" href="{{ route('lesson', $order->course->chapters->first()->lessons->first()->id) }}" target="_blank">Học ngay</a>
                                            	@endif
                                            </td>
                                        </tr>
										@endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection