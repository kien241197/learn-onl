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
	                    	<a href="{{ route('admin.categories.create') }}" class="btn btn-block btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;Thêm mới</a>
	                    </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 10px">ID</th>
                                    <th style="min-width: 115px;">Thể loại</th>
                                    <th style="min-width: 100px;">Ghi chú</th>
                                    <th style="min-width: 100px;">Ngày tạo</th>
                                    <th style="min-width: 90px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($categories as $category)
                                <tr>
                                    <td class="align-middle">{{ $category->id }}</td>
		                            <td class="align-middle">{{ $category->name }}</td>
                                    <td class="align-middle">{{ $category->note }}</td>
		                            <td class="align-middle">{{ $category->created_at }}</td>
                                    <td style="width: 35px;">
                                    	<a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-block btn-primary btn-xs"><i class="fa fa-edit"></i>&nbsp;Sửa</a>
                                    	<button class="btn btn-block btn-danger btn-xs btn-delete-record" data-url="{{ route('admin.categories.destroy', $category->id) }}"><i class="fa fa-trash"></i>&nbsp;Xóa</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {!! $categories->appends($_GET)->links('pagination.paginate') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection