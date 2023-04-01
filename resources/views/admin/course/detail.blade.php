@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title"><i class="fa fa-book"></i>&nbsp;{{ $course->name }}  ({{ $countLesson }} Bài)</h3>
                        <div class="ml-auto">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalAddChapter" class="btn btn-block btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;Chương</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="dd">
                            <ol class="dd-list">
                                <!-- Chương -->
                                @forelse($course->chapters as $chapter)
                                <li class="dd-item" data-id="1">
                                    <div class="dd-handle d-flex justify-content-between">
                                        <h5><i class="fa fa-list"></i>&nbsp;<b>{{ $chapter->name }}</b></h5>
                                        <div>
                                            <a href="{{ route('admin.lessons.create', [$course->id, $chapter->id]) }}"><i class="fa fa-plus"></i>&nbsp;Bài</a> | 
                                            <a href="javascript:void(0);" class="btn-edit-chapter" data-bs-toggle="modal" data-bs-target="#modalEditChapter-{{ $chapter->id }}"><i class="fa fa-edit"></i>&nbsp;Sửa</a> | 
                                            <a href="javascript:void(0);" class="btn-delete-record" data-url="{{ route('admin.chapters.destroy', [$course->id, $chapter->id]) }}"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
                                        </div>
                                    </div>
                                    <ol class="dd-list">
                                        <!-- Bài học -->
                                        @foreach($chapter->lessons as $lesson)
                                        <li class="dd-item" data-id="4">
                                            <div class="dd-handle d-flex justify-content-between">
                                                <a href="{{ route('admin.lessons.edit', [$course->id, $chapter->id, $lesson->id]) }}"><i class="fa fa-play"></i>&nbsp;{{ $lesson->name }}</a>
                                                <div>
                                                    <a class="btn-delete-record" href="javascript:void(0);" data-url="{{ route('admin.lessons.destroy', [$course->id, $chapter->id, $lesson->id]) }}"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        <!-- Hết bài học -->
                                    </ol>
                                </li>

                                <div class="modal fade" id="modalEditChapter-{{ $chapter->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title" id="exampleModalLabel">Sửa chương</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="container">
                                                <div class="">
                                                    <form action="{{ route('admin.chapters.update', [$course->id, $chapter->id]) }}" method="POST">
                                                      @csrf
                                                      @method('PUT')
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="name-chapter">Tên chương</label>
                                                                <input type="text" class="form-control" id="name-chapter" name="name_chapter" placeholder="Nhập tên chương..." value="{{ $chapter->name }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer text-center">
                                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                                        </div>
                                                    </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    @empty
                                    <li class="text-center"><h4>No Data</h4></li>
                                    @endforelse
                                <!-- Hết Chương -->
                            </ol>
                        </div>
                        <div class="card-footer text-center">
                            <!-- <button type="submit" class="btn btn-primary">Thay đổi</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal fade" id="modalAddChapter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title" id="exampleModalLabel">Thêm chương mới</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="">
                    <form action="{{ route('admin.chapters.store', $course->id) }}" method="POST">
                      @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name-chapter">Tên chương</label>
                                <input type="text" class="form-control" id="name-chapter" name="name_chapter" placeholder="Nhập tên chương..." required>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection