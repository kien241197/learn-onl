@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
			<div class="col-12">
				@foreach($lessons as $lesson)
				<div class="card {{ $lesson->comments_count > 0 ? 'card-danger' : 'card-primary' }} card-outline">
					<a class="d-block w-100" href="{{ route('admin.comments.show', $lesson->id) }}">
						<div class="card-header d-flex">
							<h4 class="card-title w-100">
							{{ '[' . $lesson->chapter->course->name . '] ' . $lesson->name }}
							</h4>
							@if($lesson->comments_count > 0)
							<small class="badge badge-danger d-flex align-items-center text-decoration-none">{{ $lesson->comments_count }}&nbsp;<i class="fa fa-comment"></i></small>
							@endif
						</div>
					</a>
				</div>
				@endforeach

			    <div class="card-footer clearfix">
			        {!! $lessons->appends($_GET)->links('pagination.paginate') !!}
			    </div>
			</div>
        </div>
    </div>
</section>
@endsection