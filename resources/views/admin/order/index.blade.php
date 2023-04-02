@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                        	<label>Show:</label>
                        	<select id="size-limit" name="limit">
	                        	<option value="20" {{ request()->limit == 20 ? 'selected' : '' }}>20</option>
	                        	<option value="50" {{ request()->limit == 50 ? 'selected' : '' }}>50</option>
	                        	<option value="100" {{ request()->limit == 100 ? 'selected' : '' }}>100</option>
	                        </select>
	                    </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 10px">ID</th>
                                    <th style="min-width: 115px;">Tài khoản</th>
                                    <th style="min-width: 100px;">Khóa học</th>
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
		                            <td class="align-middle">{{ $order->user->user_name }}</td>
		                            <td class="align-middle">{{ $order->course->name }}</td>
		                            <td class="align-middle">{{ App\Enums\StatusActive::getDescription($order->is_active) }}</td>
		                            <td class="align-middle">{{ $order->date_active }}</td>
		                            <td class="align-middle">{{ App\Enums\StatusPayment::getDescription($order->payment) }}</td>
		                            <td class="align-middle">{{ $order->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {!! $orders->appends($_GET)->links('pagination.paginate') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection