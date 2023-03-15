@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sửa</h3>
                    </div>
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    	@csrf
                    	@method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tài khoản đăng nhập</label>
                                <input class="form-control" name="user_name" value="{{ $user->user_name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tên đại lý</label>
                                <input name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                @if ($errors->has('name'))
					                <span class="text-danger">{{ $errors->first('name') }}</span>
				                @endif                               
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                                @if ($errors->has('phone'))
					                <span class="text-danger">{{ $errors->first('phone') }}</span>
				                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ghi chú</label>
                                <textarea name="note" class="form-control">{{ old('note', $user->note) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật khẩu <span class="text-info">(để trống nếu không thay đổi)</span></label>
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
					                <span class="text-danger">{{ $errors->first('password') }}</span>
				                @endif
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Sửa đổi</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection