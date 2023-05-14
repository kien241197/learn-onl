@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Page Điều khoản -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Điều khoản sử dụng</h3>
                    </div>
                    <form action="{{ route('admin.pageOther.update') }}" method="POST">
                        @csrf
                        <div class="card-body">                 
	                    	<div class="row">
	                    		<label>Nội dung page</label>
	                            <textarea name="content_dieu_khoan" class="form-control">{{ old('content_dieu_khoan', $layout->content_dieu_khoan) }}</textarea>
	                    	</div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		<!-- Page Chính sách -->
		<div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Chính sách riêng tư</h3>
                    </div>
                    <form action="{{ route('admin.pageOther.update') }}" method="POST">
                        @csrf
                        <div class="card-body">                 
	                    	<div class="row">
	                    		<label>Nội dung page</label>
	                            <textarea name="content_chinh_sach" class="form-control">{{ old('content_chinh_sach', $layout->content_chinh_sach) }}</textarea>
	                    	</div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection