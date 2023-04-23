@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                        	<label>Show:</label>
                        	<select id="size-limit" name="limit">
	                        	<option value="20" {{ request()->limit == 20 ? 'selected' : '' }}>20</option>
	                        	<option value="50" {{ request()->limit == 50 ? 'selected' : '' }}>50</option>
	                        	<option value="100" {{ request()->limit == 100 ? 'selected' : '' }}>100</option>
	                        </select>
	                    </div>
	                    <div class="ml-auto">
	                    	<a href="{{ route('admin.users.create') }}" class="btn btn-block btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;Thêm mới</a>
	                    </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 10px">ID</th>
                                    <th style="min-width: 100px">Email</th>
                                    <th style="min-width: 100px">Tên thành viên</th>
                                    <th>Số điện thoại</th>
                                    <th>Đơn vị công tác</th>
                                    <th>Địa chỉ</th>
                                    <!-- <th style="min-width: 100px;">Ghi chú</th> -->
                                    <th style="min-width: 100px;">Sản phẩm đã mua</th>
                                    <th style="min-width: 90px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($users as $user)
                                <tr>
                                    <td class="align-middle">{{ $user->id }}</td>
                                    <td class="align-middle">{{ $user->email }}</td>
		                            <td class="align-middle">{{ $user->name }}</td>
		                            <td class="align-middle">{{ $user->phone }}</td>
                                    <td class="align-middle">{{ $user->company }}</td>
                                    <td class="align-middle">{{ $user->address }}</td>
		                            <!-- <td class="align-middle">{{ $user->note }}</td> -->
                                    <td class="align-middle">
                                        @foreach($user->orders as $order)
                                        @if($order->course)
                                        + {{ $order->course->name }}<br>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td style="width: 35px;">
                                    	<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-block btn-primary btn-xs"><i class="fa fa-edit"></i>&nbsp;Sửa</a>
                                    	<button class="btn btn-block btn-danger btn-xs btn-delete-record" data-url="{{ route('admin.users.destroy', $user->id) }}"><i class="fa fa-trash"></i>&nbsp;Xóa</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {!! $users->appends($_GET)->links('pagination.paginate') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection