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
                    @empty(count($products->toArray()))
                    <h1 class="h3 text-center p-5 text-danger">Giỏ hàng đang trống</h1>
                    @else
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
                            @php
                                $index = 0;
                            @endphp
                            @foreach($products as $key => $product)
                            @php
                                $index += 1;
                            @endphp
                            <tr>
                                <td>{{ $index }}</td>
                                <td>
                                    <img class="w-100 d-block" style="max-width:200px;" src="{{ asset($product->options['image']) }}" class="hinhdaidien">
                                </td>
                                <td><a href="{{ route('single', [Illuminate\Support\Str::slug($product->name), $product->id]) }}">{{ $product->name }}</a></td>
                                <td class="text-right">{{ $product->qty }}</td>
                                <td class="text-right price">{{ number_format($product->price) }}</td>
                                <td class="text-right price">{{ number_format($product->price * $product->qty) }}</td>
                                <td>
                                    
                                    <a id="delete_1" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" onclick="removeToCart(`{{ route('delCart', $key) }}`)">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="price-total"><span>Tổng tiền thanh toán:</span> {{ number_format((int)str_replace(',', '', \Cart::subtotal(0))) }} VND</div>
                    @endempty
                    <div class="custom-button">
                        <a href="{{ route('home') }}" class="btn btn-back btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Quay
                        về trang chủ</a>
                        @if(count($products->toArray()))
                        <a href="{{ route('checkout') }}" class="btn btn-blue"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Xác nhận</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection