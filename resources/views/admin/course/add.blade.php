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
                    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên khóa học</label>
                                <input class="form-control" name="name" value="{{ old('name')}}" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Thể loại</label>
                                    <select class="custom-select" name="category">
                                        <option value=''>-------</option>
                                        @foreach($categories as $cate)
                                            <option value="{{ $cate->id }}" {{ $cate->id == old('category') ? 'selected' : '' }}>{{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    
                                <div class="form-group col-md-6">
                                    <label>Cấp độ</label>
                                    <select class="custom-select" name="level">
                                        <option value="">------</option>
                                        <option value="{{App\Enums\CourseLevel::LOW}}" {{ App\Enums\CourseLevel::LOW == old('level') ? 'selected' : '' }}>{{App\Enums\CourseLevel::getDescription(App\Enums\CourseLevel::LOW)}}</option>
                                        <option value="{{App\Enums\CourseLevel::MEDIUM}}" {{ App\Enums\CourseLevel::MEDIUM == old('level') ? 'selected' : '' }}>{{App\Enums\CourseLevel::getDescription(App\Enums\CourseLevel::MEDIUM)}}</option>
                                        <option value="{{App\Enums\CourseLevel::HIGH}}" {{ App\Enums\CourseLevel::HIGH == old('level') ? 'selected' : '' }}>{{App\Enums\CourseLevel::getDescription(App\Enums\CourseLevel::HIGH)}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Giá</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">VNĐ</span>
                                        </div>
                                        <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                                        @if ($errors->has('price'))
                                            <span class="text-danger">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div> 
                                </div>                                
                                <div class="form-group col-md-6">
                                    <label>Giá khuyến mãi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">VNĐ</span>
                                        </div>
                                        <input type="text" class="form-control" name="price_sale" value="{{ old('price_sale') }}">
                                        @if ($errors->has('price_sale'))
                                            <span class="text-danger">{{ $errors->first('price_sale') }}</span>
                                        @endif
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Thời gian khóa học</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="time" value="{{ old('time') }}">
                                        @if ($errors->has('time'))
                                            <span class="text-danger">{{ $errors->first('time') }}</span>
                                        @endif
                                    </div> 
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Ảnh hiển thị</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="image" accept="image/*" onchange="document.getElementById('prv-img-tag').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="image">Chọn file</label>
                                        </div>
                                    </div>
                                    <img src="" id="prv-img-tag" width="200" />
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>File video</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="video" accept="video/*" id="video">
                                            <label class="custom-file-label" for="video">Chọn file</label>
                                        </div>
                                        @if ($errors->has('video'))
                                            <span class="text-danger">{{ $errors->first('video') }}</span>
                                        @endif
                                    </div> 
                                    <iframe id="video_show" width="350" height="250" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                              <label for="select2Multiple">Gắn thẻ</label>
                              <select class="select2-multiple form-control" name="tags[]" multiple="multiple">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>{{ $tag->tag_name }}</option>
                                @endforeach              
                              </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Thời gian bắt đầu</label>
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="time_start" value="{{ old('time_start') }}">
                                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @if ($errors->has('time_start'))
                                        <span class="text-danger">{{ $errors->first('time_start') }}</span>
                                    @endif
                                </div>                                
                                <div class="form-group col-md-6">
                                    <label>Thời gian kết thúc</label>
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="time_end" value="{{ old('time_end') }}">
                                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @if ($errors->has('time_end'))
                                        <span class="text-danger">{{ $errors->first('time_end') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea name="note" class="form-control">{{ old('note') }}</textarea>
                                @if ($errors->has('note'))
                                    <span class="text-danger">{{ $errors->first('note') }}</span>
                                @endif
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Đăng ký</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection