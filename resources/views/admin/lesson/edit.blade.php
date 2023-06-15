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
                    <form action="{{ route('admin.lessons.update', [$courseId, $chapterId, $lesson->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên bài học</label>
                                <input class="form-control" name="name" value="{{ old('name', $lesson->name)}}" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Tên tài liệu</label>
	                                <input class="form-control" name="document_name" value="{{ old('document_name', $lesson->document_name)}}">
	                                @if ($errors->has('document_name'))
	                                    <span class="text-danger">{{ $errors->first('document_name') }}</span>
	                                @endif
                                </div>
                                    
                                <div class="form-group col-md-6">
                                    <label>File tài liệu</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="hidden" name="old_document" id="old_document" value="{{ $lesson->document_path }}">
                                            <input type="file" class="custom-file-input" name="document" id="document">
                                            <label class="custom-file-label" for="document">Chọn file</label>
                                        </div>
                                        @if ($errors->has('document'))
                                            <span class="text-danger">{{ $errors->first('document') }}</span>
                                        @endif
                                    </div>
                                    <div id="file-upload-filename">
                                        @if($lesson->document_path)
                                        <i class="fa fa-file"></i> <a class="" href="{{ asset($lesson->document_path) }}" download="{{ $lesson->document_name }}">{{ $lesson->document_name }}</a> <a href="javascript:void(0)" class="pl-1 pr-1 remove-file"><b>X</b></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                                    <iframe id="video_show" width="350" height="250" src="{{ asset($lesson->video_path) }}" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea name="note" class="form-control">{{ old('note', $lesson->note) }}</textarea>
                                @if ($errors->has('note'))
                                    <span class="text-danger">{{ $errors->first('note') }}</span>
                                @endif
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection