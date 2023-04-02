@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" id="accordion">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">[{{ $lesson->chapter->course->name }}] {{ $lesson->name }}</b></h3>
                    </div>
                    <div class="card-body">
						@foreach($lesson->comments as $comment)
						    <div class="display-comment p-2 border rounded">
						        <div class="d-flex justify-content-between">
						        	<strong>{{ $comment->user->name }}</strong>
						        	<small>@if($comment->seen == 0)<small class="badge badge-danger">MỚI</small>@endif{{ $comment->created_at }}</small>
						        </div>
						        <div class="p-2 border border-light rounded bg-success text-white">{{ $comment->content }}</div>
						        <a data-toggle="collapse" href="#rep-comment-{{ $comment->id }}" aria-expanded="false" class="ml-4">Phản hồi</a>
						        <form method="POST" action="{{ route('admin.comments.reply', $comment->id) }}" id="rep-comment-{{ $comment->id }}" class="collapse ml-4" data-parent="#accordion">
						            @csrf
						            <div class="form-group">
						                <textarea type=text name=content class="form-control" required></textarea>
						            </div>
						            <div class="form-group">
						                <input type=submit class="btn btn-warning" value="Phản hồi" />
						            </div>
						        </form>
								@foreach($comment->replies as $reply)
								    <div class="display-comment ml-4">
								        <div class="d-flex justify-content-between">
								        	<strong>{{ Auth::user()->name }}</strong>
								        	<small>{{ $reply->created_at }}</small>
								        </div>
								        <div class="p-2 border border-light rounded bg-secondary text-white">{{ $reply->content }}</div>
								    </div>
								@endforeach
						    </div>
						@endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection