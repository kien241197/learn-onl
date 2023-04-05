@extends('layouts.user')

@section('content')
    <section class="site-checkout pd-main">
        <div class="container">
            <form class="needs-validation" name="frmthanhtoan" method="post" action="#">
                <input type="hidden" name="kh_tendangnhap" value="dnpcuong">
                <div class="py-5 title-main text-center">
                    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                    <h2 class="heading">Thanh toán</h2>
                    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
                </div>
                <div class="row">
                    <!-- <div class="col-lg-8">
                        <h4 class="title mb-4">Thông tin khách hàng</h4>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="kh_ten">Họ tên</label>
                                <input type="text" class="form-control" name="kh_ten" id="kh_ten" value="Dương Nguyễn Phú Cường" readonly="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="kh_gioitinh">Giới tính</label>
                                <input type="text" class="form-control" name="kh_gioitinh" id="kh_gioitinh" value="Nam" readonly="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="kh_diachi">Địa chỉ</label>
                                <input type="text" class="form-control" name="kh_diachi" id="kh_diachi" value="130 Xô Viết Nghệ Tỉnh" readonly="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="kh_dienthoai">Điện thoại</label>
                                <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai" value="0915659223" readonly="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="kh_email">Email</label>
                                <input type="text" class="form-control" name="kh_email" id="kh_email" value="phucuong@ctu.edu.vn" readonly="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="kh_ngaysinh">Ngày sinh</label>
                                <input type="text" class="form-control" name="kh_ngaysinh" id="kh_ngaysinh" value="11/6/1989" readonly="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="kh_cmnd">CMND</label>
                                <input type="text" class="form-control" name="kh_cmnd" id="kh_cmnd" value="362209685" readonly="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="kh_cmnd">Nơi cấp</label>
                                <input type="text" class="form-control" name="kh_cmnd" id="kh_cmnd" value="CA HÀ NỘI" readonly="">
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-4 mb-4">
                        <h4 class="d-flex mb-top justify-content-between align-items-center mb-4">
                            <span class="title">Giỏ hàng</span>
                            <span class="badge badge-secondary badge-pill">2</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <input type="hidden" name="sanphamgiohang[1][sp_ma]" value="2">
                            <input type="hidden" name="sanphamgiohang[1][gia]" value="11800000.00">
                            <input type="hidden" name="sanphamgiohang[1][soluong]" value="2">

                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="">BÍ QUYẾT THIẾT LẬP KẾ HOẠCH VÀ KPI</h6>
                                    <small class="text-muted">11.800.000 x 2</small>
                                </div>
                                <span class="text-muted">23.600.000</span>
                            </li>
                            <input type="hidden" name="sanphamgiohang[2][sp_ma]" value="4">
                            <input type="hidden" name="sanphamgiohang[2][gia]" value="14990000.00">
                            <input type="hidden" name="sanphamgiohang[2][soluong]" value="8">

                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="">BÍ QUYẾT THIẾT LẬP KẾ HOẠCH VÀ KPI</h6>
                                    <small class="text-muted">14.990.000 x 8</small>
                                </div>
                                <span class="text-muted">11.992.000</span>
                            </li>
                            <li class="list-group-item total d-flex justify-content-between">
                                <span>Tổng thành tiền</span>
                                <strong>14.352.000</strong>
                            </li>
                        </ul>
                        <div class="tt">
                            <h4 class="title">Phương thức thanh toán</h4>
                            <ul class="nav">
                                <li class="nav-items">
                                    <a class="nav-link active" data-toggle="tab" href="#tab1">
                                        <img src="{{ asset('home/images/logo-1.jpg') }}" alt="">
                                    </a>
                                </li>
                                <li class="nav-items">
                                    <a class="nav-link" data-toggle="tab" href="#tab2">
                                        <img src="{{ asset('home/images/logo-2.png') }}" alt="">
                                    </a>
                                </li>
                                <li class="nav-items">
                                    <a class="nav-link" data-toggle="tab" href="#tab3">
                                        <img src="{{ asset('home/images/logo-3.png') }}" alt="">
                                    </a>
                                </li>
                            </ul> 
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="qrcode">
                                    <div class="id-qr">
                                        <img src="{{ asset('home/images/qr.png') }}" alt="">
                                    </div>
                                    <div class="information">
                                        <ul>
                                            <li>
                                                <span>Chủ tài khoản:</span>
                                                <span><strong>Mai Văn Huy</strong></span>
                                            </li>
                                            <li>
                                                <span>Ngân hàng:</span>
                                                <span><strong>Vietcombank</strong></span>
                                            </li>
                                            <li>
                                                <span>Chi nhánh:</span>
                                                <span><strong>Thành công Số 2 Duy Tân</strong></span>
                                            </li>
                                            <li>
                                                <span>Tổng số tiền cần thanh toán:</span>
                                                <span><strong>14.352.000 Vnđ</strong></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <div class="qrcode">
                                    <div class="id-qr">
                                        <img src="{{ asset('home/images/qrnomo.png') }}" alt="">
                                    </div>
                                    <div class="information">
                                        <ul>
                                            <li>
                                                <span>Chủ tài khoản:</span>
                                                <span><strong>Mai Văn Huy</strong></span>
                                            </li>
                                            <li>
                                                <span>Ví điện tử:</span>
                                                <span><strong>Momo</strong></span>
                                            </li>
                                            <li>
                                                <span>Tổng số tiền cần thanh toán:</span>
                                                <span><strong>14.352.000 Vnđ</strong></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab3">
                                <div class="qrcode">
                                    <div class="id-qr">
                                        <img src="{{ asset('home/images/qrpay.png') }}" alt="">
                                    </div>
                                    <div class="information">
                                        <ul>
                                            <li>
                                                <span>Chủ tài khoản:</span>
                                                <span><strong>Mai Văn Huy</strong></span>
                                            </li>
                                            <li>
                                                <span>Ví điện tử:</span>
                                                <span><strong>VNPAY</strong></span>
                                            </li>
                                            <li>
                                                <span>Tổng số tiền cần thanh toán:</span>
                                                <span><strong>14.352.000 Vnđ</strong></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <button class="btn-custom" type="submit" name="btnDatHang">Đặt hàng</button>
                </div>
            </form>
        </div>
    </section>
@endsection