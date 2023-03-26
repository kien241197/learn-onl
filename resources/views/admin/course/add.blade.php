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
                    <form action="{{ route('admin.courses.store') }}" method="POST">
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
                                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    
                                <div class="form-group col-md-6">
                                    <label>Cấp độ</label>
                                    <select class="custom-select" name="level">
                                        <option>------</option>
                                        <option value="{{App\Enums\CourseLevel::LOW}}">{{App\Enums\CourseLevel::getDescription(App\Enums\CourseLevel::LOW)}}</option>
                                        <option value="{{App\Enums\CourseLevel::MEDIUM}}">{{App\Enums\CourseLevel::getDescription(App\Enums\CourseLevel::MEDIUM)}}</option>
                                        <option value="{{App\Enums\CourseLevel::HIGH}}">{{App\Enums\CourseLevel::getDescription(App\Enums\CourseLevel::HIGH)}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Giá</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control">
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
                                </div>
                            </div>
                            <div class="form-group mb-3">
                              <label for="select2Multiple">Gắn thẻ</label>
                              <select class="select2-multiple form-control" name="tags[]" multiple="multiple">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                @endforeach              
                              </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Thời gian bắt đầu</label>
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="time_start">
                                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="form-group col-md-6">
                                    <label>Thời gian kết thúc</label>
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="time_end">
                                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea name="note" class="form-control">{{ old('note') }}</textarea>
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