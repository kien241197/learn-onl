@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thêm</h3>
                    </div>
                    <form action="{{ route('admin.users.store') }}" method="POST">
                    	@csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tài khoản đăng nhập</label>
                                <input class="form-control" name="user_name" value="{{ old('user_name')}}" required>
                                @if ($errors->has('user_name'))
					                <span class="text-danger">{{ $errors->first('user_name') }}</span>
				                @endif
                            </div>
                            <div class="form-group">
                                <label>Tên đại lý</label>
                                <input name="name" class="form-control" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
					                <span class="text-danger">{{ $errors->first('name') }}</span>
				                @endif                               
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input name="phone" class="form-control" value="{{ old('phone') }}" required>
                                @if ($errors->has('phone'))
					                <span class="text-danger">{{ $errors->first('phone') }}</span>
				                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ghi chú</label>
                                <textarea name="note" class="form-control">{{ old('note') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
					                <span class="text-danger">{{ $errors->first('password') }}</span>
				                @endif
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Đăng ký</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection