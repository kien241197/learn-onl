@extends('layouts.user')

@section('content')
    <section class="site-cart pd-main">
        <div class="container">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="title-main">
                <h1 class="text-center heading">Giỏ hàng</h1>
            </div>
            <div class="row">
                <div class="col col-md-12">
                    <table class="">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên khóa học</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="datarow">
                            <tr>
                                <td>1</td>
                                <td>
                                    <img class="w-100 d-block" style="max-width:200px;" src="assets/images/a1.png" class="hinhdaidien">
                                </td>
                                <td><a href="#">BÍ QUYẾT THIẾT LẬP KẾ HOẠCH VÀ KPI</a></td>
                                <td class="text-right">2</td>
                                <td class="text-right price">11,800,000.00</td>
                                <td class="text-right price">23,600,000</td>
                                <td>
                                    
                                    <a id="delete_1" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <img class="w-100 d-block" style="max-width:200px;" src="assets/images/a1.png" class="hinhdaidien">
                                </td>
                                <td><a href="#">BÍ QUYẾT THIẾT LẬP KẾ HOẠCH VÀ KPI</a></td>
                                <td class="text-right">4</td>
                                <td class="text-right price">2,699,000.00</td>
                                <td class="text-right price">1,0796,000</td>
                                <td>
                                    <a id="delete_2" data-sp-ma="6" class="btn btn-danger btn-delete-sanpham">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <img class="w-100 d-block" style="max-width:200px;" src="assets/images/a1.png" class="hinhdaidien">
                                </td>
                                <td><a href="#">BÍ QUYẾT THIẾT LẬP KẾ HOẠCH VÀ KPI</a></td>
                                <td class="text-right">8</td>
                                <td class="text-right price">1,4990,000.00</td>
                                <td class="text-right price">119,920,000</td>
                                <td>
                                    
                                    <a id="delete_3" data-sp-ma="4" class="btn btn-danger btn-delete-sanpham">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="price-total"><span>Tổng tiền thanh toán:</span> 20.000.000đ</div>
                    <div class="custom-button">
                        <a href="index.php" class="btn btn-back btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Quay
                        về trang chủ</a>
                        <a href="checkout.php" class="btn btn-blue"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection