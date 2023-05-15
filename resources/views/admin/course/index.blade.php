@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                        	<label>Show:</label>
                        	<select id="size-limit" name="limit">
	                        	<option value="20" {{ request()->limit == 20 ? 'selected' : '' }}>20</option>
	                        	<option value="50" {{ request()->limit == 50 ? 'selected' : '' }}>50</option>
	                        	<option value="100" {{ request()->limit == 100 ? 'selected' : '' }}>100</option>
	                        </select>
	                    </div>
	                    <div class="ml-auto">
	                    	<a href="{{ route('admin.courses.create') }}" class="btn btn-block btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;Thêm mới</a>
	                    </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 10px">ID</th>
                                    <th style="min-width: 115px;">Khóa học</th>
                                    <th style="min-width: 100px">Thể loại</th>
                                    <th style="min-width: 100px">Thời gian</th>
                                    <th style="min-width: 100px">Cấp độ</th>
                                    <th>Giá</th>
                                    <th>Giá KM</th>
                                    <th style="min-width: 100px;">Ngày bắt đầu</th>
                                    <th style="min-width: 100px;">Ngày hết hạn</th>
                                    <th style="min-width: 90px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($courses as $course)
                                <tr>
                                    <td class="align-middle">{{ $course->id }}</td>
		                            <td class="align-middle"><b><a href="{{ route('admin.courses.show', $course->id) }}">{{ $course->name }}</a></b></td>
                                    <td class="align-middle">{{ $course->category ? $course->category->name : 'Chưa phân loại'}}</td>
                                    <td class="align-middle">{{ $course->time }} Giờ</td>
		                            <td class="align-middle">{{ $course->level ? App\Enums\CourseLevel::getDescription($course->level) : 'Thêm độ khó của khóa học' }}</td>
		                            <td class="align-middle">{{ number_format($course->price) }} VNĐ</td>
                                    <td class="align-middle">{{ number_format($course->price_sale) }} VNĐ</td>
		                            <td class="align-middle">{{ $course->publish_start }}</td>
                                    <td class="align-middle">{{ $course->publish_end }}</td>
                                    <td style="width: 35px;">
                                    	<a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-block btn-primary btn-xs"><i class="fa fa-edit"></i>&nbsp;Sửa</a>
                                    	<button class="btn btn-block btn-danger btn-xs btn-delete-record" data-url="{{ route('admin.courses.destroy', $course->id) }}"><i class="fa fa-trash"></i>&nbsp;Xóa</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {!! $courses->appends($_GET)->links('pagination.paginate') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection