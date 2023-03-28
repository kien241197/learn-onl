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
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                    	@csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên thể loại</label>
                                <input class="form-control" name="name" value="{{ old('name')}}" required>
                                @if ($errors->has('name'))
					                <span class="text-danger">{{ $errors->first('name') }}</span>
				                @endif
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea name="note" class="form-control">{{ old('note') }}</textarea>
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