@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sửa</h3>
                    </div>
                    <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
                    	@csrf
                    	@method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên thẻ</label>
                                <input class="form-control" name="tag_name" value="{{ old('tag_name', $tag->tag_name)}}" required>
                                @if ($errors->has('tag_name'))
					                <span class="text-danger">{{ $errors->first('tag_name') }}</span>
				                @endif
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection