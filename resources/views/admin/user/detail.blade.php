@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thành viên <b>{{ $user->user_name }}</b></h3>
                    </div>
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên thành viên</label>
                                <input name="name" class="form-control" value="{{ $user->name }}" readonly>                          
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="name" class="form-control" value="{{ $user->email }}" readonly>                          
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input name="phone" class="form-control" value="{{ $user->phone }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ghi chú</label>
                                <textarea name="note" class="form-control" readonly>{{ $user->note }}</textarea>
                            </div>
                            <div class="card-footer text-center">
                                <!-- <button type="submit" class="btn btn-primary">Sửa đổi</button> -->
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection