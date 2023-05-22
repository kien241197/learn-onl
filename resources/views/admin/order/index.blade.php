@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered" id="table-order">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 10px">ID</th>
                                    <th style="min-width: 115px;">Tài khoản</th>
                                    <th style="min-width: 100px;">Khóa học</th>
                                    <th style="min-width: 100px;">Đơn giá</th>
                                    <th style="min-width: 100px;">Trạng thái kích hoạt</th>
                                    <th style="min-width: 100px;">Thời gian kích hoạt</th>
                                    <th style="min-width: 100px;">Trạng thái thanh toán</th>
                                    <th style="min-width: 100px;">Ngày mua</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($orders as $order)
                                <tr>
                                    <td class="align-middle">{{ $order->id }}</td>
		                            <td class="align-middle">{{ $order->user ? $order->user->name : 'Đã xóa' }}</td>
		                            <td class="align-middle">{{ $order->course ? $order->course->name : 'Đã xóa' }}</td>
                                    <td class="align-middle">{{ $order->course ? number_format($order->course->price_sale) : '' }} VNĐ</td>
		                            <td class="align-middle">{{ App\Enums\StatusActive::getDescription($order->is_active) }}</td>
		                            <td class="align-middle">{{ $order->date_active }}</td>
		                            <td class="align-middle">{{ App\Enums\StatusPayment::getDescription($order->payment) }}</td>
		                            <td class="align-middle">{{ $order->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection