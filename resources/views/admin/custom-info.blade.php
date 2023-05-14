@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Logo -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Logo Website</h3>
                    </div>
                    <form action="{{ route('admin.info.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Logo</label>
                                    <div class="input-group mb-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="logo" id="logo" accept="image/*" onchange="document.getElementById('prv-img-tag-logo').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="logo">Chọn file</label>
                                        </div>
                                    </div>
                                    <img src="{{ asset($layout->logo) }}" id="prv-img-tag-logo" style="width: 100%;" />
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    	<!-- Banner -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Banner Top</h3>
                    </div>
                    <form action="{{ route('admin.info.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Banner 1</label>
                                    <div class="input-group mb-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="banner_1" id="banner_1" accept="image/*" onchange="document.getElementById('prv-img-tag1').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="banner_1">Chọn file</label>
                                        </div>
                                    </div>
                                    <img src="{{ asset($layout->banner_1) }}" id="prv-img-tag1" style="width: 100%;" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Banner 2</label>
                                    <div class="input-group mb-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="banner_2" id="banner_2" accept="image/*" onchange="document.getElementById('prv-img-tag2').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="banner_2">Chọn file</label>
                                        </div>
                                    </div>
                                    <img src="{{ asset($layout->banner_2) }}" id="prv-img-tag2" style="width: 100%;" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Banner 3</label>
                                    <div class="input-group mb-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="banner_3" id="banner_3" accept="image/*" onchange="document.getElementById('prv-img-tag3').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="banner_3">Chọn file</label>
                                        </div>
                                    </div>
                                    <img src="{{ asset($layout->banner_3) }}" id="prv-img-tag3" style="width: 100%;"  />
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Giới thiệu -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Giới thiệu</h3>
                    </div>
                    <form action="{{ route('admin.info.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Ảnh</label>
                                    <div class="input-group mb-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_gt" id="image_gt" accept="image/*" onchange="document.getElementById('prv-img-tag-gt').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="image_gt">Chọn file</label>
                                        </div>
                                    </div>
                                    <img src="{{ asset($layout->image_gt) }}" id="prv-img-tag-gt" style="width: 100%;" />
                                </div>
                                <div class="form-group col-md-6">
                                	<div class="row">
                                		<label>Tiêu đề</label>
		                                <textarea name="title_gt" class="form-control">{{ old('title_gt', $layout->title_gt) }}</textarea>
                                	</div>
                                	<div class="row">
                                		<label>Nội dung</label>
		                                <textarea rows="6" name="content_gt" class="form-control">{{ old('content_gt', $layout->content_gt) }}</textarea>
                                	</div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Link app -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Mạng xã hội</h3>
                    </div>
                    <form action="{{ route('admin.info.update') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Facebook</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="link_fb" value="{{ old('link_fb', $layout->link_fb) }}">
                                    </div> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Zalo</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="link_zl" value="{{ old('link_zl', $layout->link_zl) }}">
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Twitter</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="link_tw" value="{{ old('link_tw', $layout->link_tw) }}">
                                    </div> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Instagram</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="link_ins" value="{{ old('link_ins', $layout->link_ins) }}">
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Youtube</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="link_ytb" value="{{ old('link_ytb', $layout->link_ytb) }}">
                                    </div> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Google+</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="link_google" value="{{ old('link_google', $layout->link_google) }}">
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Tiktok</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="link_tiktok" value="{{ old('link_tiktok', $layout->link_tiktok) }}">
                                    </div> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label>LinkedIn</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="link_lkin" value="{{ old('link_lkin', $layout->link_lkin) }}">
                                    </div> 
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Khóa học         -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Khóa học</h3>
                    </div>
                    <form action="{{ route('admin.info.update') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                        		<label>Nội dung giới thiệu</label>
                                <textarea rows="6" name="content_kh" class="form-control">{{ old('content_kh', $layout->content_kh) }}</textarea>
                        	</div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Hướng dẫn -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Hướng dẫn</h3>
                    </div>
                    <form action="{{ route('admin.info.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                        		<label>Nội dung giới thiệu</label>
                                <textarea rows="2" name="content_hd" class="form-control">{{ old('content_hd', $layout->content_hd) }}</textarea>
                        	</div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Banner hướng dẫn</label>
                                    <div class="input-group mb-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="banner_hd" id="banner_hd" accept="image/*" onchange="document.getElementById('prv-img-tag_hd').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="banner_hd">Chọn file</label>
                                        </div>
                                    </div>
                                    <img src="{{ asset($layout->banner_hd) }}" id="prv-img-tag_hd" style="width: 100%;" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Link video hướng dẫn</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="link_hd" value="{{ old('link_hd', $layout->link_hd) }}">
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
	                            <div class="form-group col-md-6">
	                        		<label>Video HD 1</label>
	                                <textarea rows="3" name="video_hd_1" class="form-control">{{ old('video_hd_1', $layout->video_hd_1) }}</textarea>
	                        	</div>
	                        	<div class="form-group col-md-6">
	                        		<label>Video HD 2</label>
	                                <textarea rows="3" name="video_hd_2" class="form-control">{{ old('video_hd_2', $layout->video_hd_2) }}</textarea>
	                        	</div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Cảm nhận học viên -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Cảm nhận của học viên</h3>
                    </div>
                    <form action="{{ route('admin.info.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Link "Chìa khóa thành công..."</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="link_nx" value="{{ old('link_nx', $layout->link_nx) }}">
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
	                            <div class="form-group col-md-6">
	                        		<label>Video cảm nhận 1</label>
	                                <textarea rows="3" name="video_nx_1" class="form-control">{{ old('video_nx_1', $layout->video_nx_1) }}</textarea>
	                        	</div>
	                        	<div class="form-group col-md-6">
	                        		<label>Video cảm nhận 2</label>
	                                <textarea rows="3" name="video_nx_2" class="form-control">{{ old('video_nx_2', $layout->video_nx_2) }}</textarea>
	                        	</div>
                            </div>
                            <div class="row">
                            	<div class="col-md-6">
		                            <div class="row">
		                                <div class="form-group col-md-6">
		                                    <label>Ảnh HV 1</label>
		                                    <div class="input-group mb-1">
		                                        <div class="custom-file">
		                                            <input type="file" class="custom-file-input" name="avt_nx_1" id="avt_nx_1" accept="image/*" onchange="document.getElementById('prv-img-tag-nx-1').src = window.URL.createObjectURL(this.files[0])">
		                                            <label class="custom-file-label" for="avt_nx_1">Chọn file</label>
		                                        </div>
		                                    </div>
		                                    <img src="{{ asset($layout->avt_nx_1) }}" id="prv-img-tag-nx-1" style="width: 100%;" />
		                                </div>
		                                <div class="form-group col-md-6">
		                                	<div class="row">
		                                		<label>Tên HV 1</label>
				                                <input type="text" class="form-control" name="name_nx_1" value="{{ old('name_nx_1', $layout->name_nx_1) }}">
		                                	</div>
		                                	<div class="row">
		                                		<label>Chức vụ</label>
				                                <input type="text" class="form-control" name="office_nx_1" value="{{ old('office_nx_1', $layout->office_nx_1) }}">
		                                	</div>
											<div class="row">
		                                		<label>Nội dung</label>
				                                <textarea rows="4" name="content_nx_1" class="form-control">{{ old('content_nx_1', $layout->content_nx_1) }}</textarea>
		                                	</div>
		                                </div>
		                            </div>                            		
                            	</div>
                            	<div class="col-md-6">
		                            <div class="row">
		                                <div class="form-group col-md-6">
		                                    <label>Ảnh HV 2</label>
		                                    <div class="input-group mb-1">
		                                        <div class="custom-file">
		                                            <input type="file" class="custom-file-input" name="avt_nx_2" id="avt_nx_2" accept="image/*" onchange="document.getElementById('prv-img-tag-nx-2').src = window.URL.createObjectURL(this.files[0])">
		                                            <label class="custom-file-label" for="avt_nx_2">Chọn file</label>
		                                        </div>
		                                    </div>
		                                    <img src="{{ asset($layout->avt_nx_2) }}" id="prv-img-tag-nx-2" style="width: 100%;" />
		                                </div>
		                                <div class="form-group col-md-6">
		                                	<div class="row">
		                                		<label>Tên HV 2</label>
				                                <input type="text" class="form-control" name="name_nx_2" value="{{ old('name_nx_2', $layout->name_nx_2) }}">
		                                	</div>
		                                	<div class="row">
		                                		<label>Chức vụ</label>
				                                <input type="text" class="form-control" name="office_nx_2" value="{{ old('office_nx_2', $layout->office_nx_2) }}">
		                                	</div>
											<div class="row">
		                                		<label>Nội dung</label>
				                                <textarea rows="4" name="content_nx_2" class="form-control">{{ old('content_nx_2', $layout->content_nx_2) }}</textarea>
		                                	</div>
		                                </div>
		                            </div>                            		
                            	</div>                           	
                            </div>
                            <div class="row">
                            	<div class="col-md-6">
		                            <div class="row">
		                                <div class="form-group col-md-6">
		                                    <label>Ảnh HV 3</label>
		                                    <div class="input-group mb-1">
		                                        <div class="custom-file">
		                                            <input type="file" class="custom-file-input" name="avt_nx_3" id="avt_nx_3" accept="image/*" onchange="document.getElementById('prv-img-tag-nx-3').src = window.URL.createObjectURL(this.files[0])">
		                                            <label class="custom-file-label" for="avt_nx_3">Chọn file</label>
		                                        </div>
		                                    </div>
		                                    <img src="{{ asset($layout->avt_nx_3) }}" id="prv-img-tag-nx-3" style="width: 100%;" />
		                                </div>
		                                <div class="form-group col-md-6">
		                                	<div class="row">
		                                		<label>Tên HV 3</label>
				                                <input type="text" class="form-control" name="name_nx_3" value="{{ old('name_nx_3', $layout->name_nx_3) }}">
		                                	</div>
		                                	<div class="row">
		                                		<label>Chức vụ</label>
				                                <input type="text" class="form-control" name="office_nx_3" value="{{ old('office_nx_3', $layout->office_nx_3) }}">
		                                	</div>
											<div class="row">
		                                		<label>Nội dung</label>
				                                <textarea rows="4" name="content_nx_3" class="form-control">{{ old('content_nx_3', $layout->content_nx_3) }}</textarea>
		                                	</div>
		                                </div>
		                            </div>                            		
                            	</div>
                            	<div class="col-md-6">
		                            <div class="row">
		                                <div class="form-group col-md-6">
		                                    <label>Ảnh HV 4</label>
		                                    <div class="input-group mb-1">
		                                        <div class="custom-file">
		                                            <input type="file" class="custom-file-input" name="avt_nx_4" id="avt_nx_4" accept="image/*" onchange="document.getElementById('prv-img-tag-nx-4').src = window.URL.createObjectURL(this.files[0])">
		                                            <label class="custom-file-label" for="avt_nx_4">Chọn file</label>
		                                        </div>
		                                    </div>
		                                    <img src="{{ asset($layout->avt_nx_4) }}" id="prv-img-tag-nx-4" style="width: 100%;" />
		                                </div>
		                                <div class="form-group col-md-6">
		                                	<div class="row">
		                                		<label>Tên HV 4</label>
				                                <input type="text" class="form-control" name="name_nx_4" value="{{ old('name_nx_4', $layout->name_nx_4) }}">
		                                	</div>
		                                	<div class="row">
		                                		<label>Chức vụ</label>
				                                <input type="text" class="form-control" name="office_nx_4" value="{{ old('office_nx_4', $layout->office_nx_4) }}">
		                                	</div>
											<div class="row">
		                                		<label>Nội dung</label>
				                                <textarea rows="4" name="content_nx_4" class="form-control">{{ old('content_nx_4', $layout->content_nx_4) }}</textarea>
		                                	</div>
		                                </div>
		                            </div>                            		
                            	</div>                           	
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Banner Giữa Trang -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Banner giữa</h3>
                    </div>
                    <form action="{{ route('admin.info.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Banner giữa 1</label>
                                    <div class="input-group mb-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="banner_4" id="banner_4" accept="image/*" onchange="document.getElementById('prv-img-tag4').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="banner_4">Chọn file</label>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="link_banner_4" id="link_banner_4" placeholder="Link" value="{{ $layout->link_banner_4 }}">
                                    <img src="{{ asset($layout->banner_4) }}" id="prv-img-tag4" style="width: 100%;" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Banner giữa 2</label>
                                    <div class="input-group mb-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="banner_5" id="banner_5" accept="image/*" onchange="document.getElementById('prv-img-tag5').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="banner_5">Chọn file</label>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="link_banner_5" id="link_banner_5" placeholder="Link" value="{{ $layout->link_banner_5 }}">
                                    <img src="{{ asset($layout->banner_5) }}" id="prv-img-tag5" style="width: 100%;" />
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Thông tin liên hệ -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin liên lạc</h3>
                    </div>
                    <form action="{{ route('admin.info.update') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Địa chỉ</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="address" value="{{ old('address', $layout->address) }}">
                                    </div> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" value="{{ old('email', $layout->email) }}">
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Điện thoại</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone', $layout->phone) }}">
                                    </div> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label>MSDN</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="code" value="{{ old('code', $layout->code) }}">
                                    </div> 
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Hình ảnh page Đăng ký, Đăng nhập -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Đăng ký/Đăng nhập</h3>
                    </div>
                    <form action="{{ route('admin.info.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Hình ảnh hiển thị</label>
                                    <div class="input-group mb-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_login" id="image_login" accept="image/*" onchange="document.getElementById('prv-img-tag-login').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="image_login">Chọn file</label>
                                        </div>
                                    </div>
                                    <img src="{{ asset($layout->image_login) }}" id="prv-img-tag-login" style="width: 100%;" />
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Hình ảnh page chi tiết khóa học -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Chi tiết khóa học</h3>
                    </div>
                    <form action="{{ route('admin.info.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Hình ảnh giáo viên thu nhỏ</label>
                                    <div class="input-group mb-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="icon_teacher" id="icon-teacher" accept="image/*" onchange="document.getElementById('prv-img-icon-teacher').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="icon-teacher">Chọn file</label>
                                        </div>
                                    </div>
                                    <img src="{{ asset($layout->icon_teacher) }}" id="prv-img-icon-teacher" style="width: 100%;" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Hình ảnh giáo viên</label>
                                    <div class="input-group mb-1">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_teacher" id="image-teacher" accept="image/*" onchange="document.getElementById('prv-img-teacher').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="image-teacher">Chọn file</label>
                                        </div>
                                    </div>
                                    <img src="{{ asset($layout->image_teacher) }}" id="prv-img-teacher" style="width: 100%;" />
                                </div>
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