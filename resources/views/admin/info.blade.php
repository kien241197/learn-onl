@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin cá nhân</h3>
                    </div>
                    <form id="quickForm" novalidate="novalidate">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tài khoản đăng nhập</label>
                                <input class="form-control" value="admin" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên đại lý</label>
                                <input type="email" name="email" class="form-control is-invalid" id="exampleInputEmail1" placeholder="Enter email" aria-describedby="exampleInputEmail1-error" aria-invalid="true">
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">Please enter a email address</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="email" name="email" class="form-control is-invalid" id="exampleInputEmail1" placeholder="Enter email" aria-describedby="exampleInputEmail1-error" aria-invalid="true">
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">Please enter a email address</span>
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="terms" class="custom-control-input is-invalid" id="exampleCheck1" aria-describedby="terms-error">
                                    <label class="custom-control-label" for="exampleCheck1">Đổi mật khẩu</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật khẩu hiện tại</label>
                                <input type="password" name="password" class="form-control is-invalid" id="exampleInputPassword1" placeholder="Password" aria-describedby="exampleInputPassword1-error" readonly>
                                <span id="exampleInputPassword1-error" class="error invalid-feedback">Please provide a password</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật khẩu mới</label>
                                <input type="password" name="password" class="form-control is-invalid" id="exampleInputPassword1" placeholder="Password" aria-describedby="exampleInputPassword1-error" readonly>
                                <span id="exampleInputPassword1-error" class="error invalid-feedback">Please provide a password</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Xác nhận mật khẩu mới</label>
                                <input type="password" name="password" class="form-control is-invalid" id="exampleInputPassword1" placeholder="Password" aria-describedby="exampleInputPassword1-error" readonly>
                                <span id="exampleInputPassword1-error" class="error invalid-feedback">Please provide a password</span>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
</section>
@endsection