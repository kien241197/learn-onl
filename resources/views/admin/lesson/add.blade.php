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
                    <form action="{{ route('admin.lessons.store', [$courseId, $chapterId]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên bài học</label>
                                <input class="form-control" name="name" value="{{ old('name')}}" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Tên tài liệu</label>
	                                <input class="form-control" name="document_name" value="{{ old('document_name')}}">
	                                @if ($errors->has('document_name'))
	                                    <span class="text-danger">{{ $errors->first('document_name') }}</span>
	                                @endif
                                </div>
                                    
                                <div class="form-group col-md-6">
                                    <label>File tài liệu</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="document" id="document">
                                            <label class="custom-file-label" for="document">Chọn file</label>
                                        </div>
                                        @if ($errors->has('document'))
                                            <span class="text-danger">{{ $errors->first('document') }}</span>
                                        @endif
                                    </div>
                                    <div id="file-upload-filename"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>File video</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="video" name="video" accept="video/*">
                                            <label class="custom-file-label" for="video">Chọn file</label>
                                        </div>
                                        @if ($errors->has('video'))
                                            <span class="text-danger">{{ $errors->first('video') }}</span>
                                        @endif
                                    </div> 
                                    <div class="input-group">
                                        <select class="form-control custom-select" id="lesson-video" name="lesson_video_path">
                                            <option value="">(Chọn từ bài học khác)</option>
                                            @foreach($lessons as $item)
                                            <option value="{{ asset($item->video_path) }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>                                        
                                    </div>
                                    <iframe id="video_show" width="350" height="250" title="YouTube video player" frameborder="0" allow="" allowfullscreen></iframe>
                                </div>
                                <!-- <div class="form-group col-md-6">
                                    <label>Video từ bài học khác</label>
                                    <div class="form-group">
                                        <input type="text" class="hidden" id="" name="video_copy">
                                        <button class="btn btn-primary" type="button">Select</button>
                                    </div>
                                </div> -->
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