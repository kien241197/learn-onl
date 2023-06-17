@extends('layouts.user')

@section('content')
    <script type="text/javascript">
		function next(time) {
			var video = document.getElementById("video-lesson");
			var currentTime = video.currentTime;
			video.currentTime = Number(currentTime) + Number(time);
		};
		function prev(time) {
			var video = document.getElementById("video-lesson");
			var currentTime = video.currentTime;
			video.currentTime = Number(currentTime) - Number(time);
		};
		function autoPlay(ele) {
			var video = document.getElementById("video-lesson");
			if(!video.getAttribute('autoplay')) {
				setCookie('autoplay', true, 0.5);
				video.setAttribute('autoplay', 'autoplay');
				$(ele).addClass("next");				
				video.play();
			} else {
				setCookie('autoplay', false);
				video.removeAttribute('autoplay');
				$(ele).removeClass("next");	
			}
		};
		$( document ).ready(function() {
			let autoplay = getCookie('autoplay');
			if(autoplay) {
				var video = document.getElementById("video-lesson");
				video.setAttribute('autoplay', 'autoplay');
				$('.autoplay').addClass("next");
				video.play();
			}
		});

    </script>
    <section class="site-video-k pd-main">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="video">
                        <video controls controlsList="nodownload" id="video-lesson" data-url="{{ route('postHistory', $lesson->id) }}">
                            <source src="{{ asset($lesson->video_path) }}" type="video/mp4">
                            <source src="{{ asset($lesson->video_path) }}" type="video/ogg">
                        </video>
                        <div class="phone-opacity">
                            {{ Auth::user()->name . ' – ' . Auth::user()->phone }}
                        </div>
                    </div>
                    <div class="flex-custom">
                        <div class="function">
                            <a class="error" id="report-video" href="javascript:void(0);" data-url="{{ route('reportVideo', $lesson->id) }}">Báo lỗi <span>!</span></a>
                            <a class="autoplay" href="javascript:void(0);" onclick="autoPlay(this);">Autoplay <i class="fa-solid fa-circle-play"></i></a>
                            <a class="next-time" href="javascript:void(0);" onclick="prev(10);"><span>10</span> <i class="fa-solid fa-arrow-rotate-left"></i></a>
                            <a class="next-time" href="javascript:void(0);" onclick="next(10);"><span>10</span> <i class="fa-solid fa-arrow-rotate-right"></i></a>
                            @if($nextLesson)
                            <a class="next" id="next-lesson" href="{{ route('lesson', $nextLesson->id) }}">Bài sau <i class="fa-solid fa-chevron-right"></i></a>
							@endif
                        </div>
                    </div>
                    <div class="form">
                        <h2>{{ $lesson->name }}</h2>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab1">Tài liệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab2">Thảo luận</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                        	<div class="tab-pane fade active show" id="tab1">
                                <p><strong>Tài liệu học tập được cung cập độc quyền từ hệ thống học của TNB</strong></p>
                                @if($lesson->document_path)
                                <a class="btn-custom" href="{{ asset($lesson->document_path) }}" download="{{ $lesson->document_name }}"><i class="fa fa-download"></i> {{ $lesson->document_name }}</a>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="tab2">
                            	<div class="card-comments">
	                            	<div class="direct-chat-messages" id="box-comment">
	                            		@foreach($lesson->comments as $comment)
		                            		@if($comment->type == 2)
												<div class="direct-chat-msg right">
													<img class="direct-chat-img" src="{{ asset('home/images/icon-user.png') }}" alt="message user image">
													<div class="direct-chat-text text-white">
													{{ $comment->content }}
													</div>
												</div>
												@foreach($comment->replies as $reply)
												<div class="direct-chat-msg">
													<img class="direct-chat-img" src="{{ asset('home/images/user.png') }}" alt="message user image">
													<div class="direct-chat-text">
													{{ $reply->content }}
													</div>
												</div>
												@endforeach 
											@endif
										@endforeach                           		
	                            	</div>                           		
                            	</div>
                                <form action="">
                                   <div class="form-group">
                                        <textarea rows="3" id="comment" class="form-control" placeholder="Nhập nội dung câu hỏi"></textarea>
                                   </div>
                                    <button class="btn-custom" type="button" id="send-comment" data-url="{{ route('postComment', $lesson->id) }}">Gửi câu hỏi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="content-video">
                        <div class="htbh">
                            <p>Hoàn thành <span>{{ $history }}/{{ $totalLesson }}</span> bài học</p>
                            <div class="line">
                                <span style="width:{{ $history*100/$totalLesson }}%"></span>
                            </div>
                        </div>
                        @php 
                        $TimeVideo = ['9:09','9:56','6:29','6:09','5:35','4:37','00'];
                        @endphp
                        <div class="list-bh" id="style-3">
                        	@foreach($lesson->chapter->course->chapters as $chapter)
                            <div class="items">
                                <h3><span>{{ $chapter->name }}</span></h3>
                                <ul>
                                	@foreach($chapter->lessons as $key => $itemLesson)
                                    <li><a href="{{ route('lesson', $itemLesson->id) }}" class="{{ $itemLesson->id == $lesson->id ? 'active' : '' }}">{{ $itemLesson->name }}</a> <span>{{ $TimeVideo[$key] }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
    .card-comments {
	    overflow-x: hidden;
	    padding: 0;
	    position: relative;
        flex: 1 1 auto;
	    min-height: 1px;
        word-wrap: break-word;
    }	
    .direct-chat-messages {
	    transition: -webkit-transform .5s ease-in-out;
	    transition: transform .5s ease-in-out;
	    transition: transform .5s ease-in-out,-webkit-transform .5s ease-in-out;
	    transform: translate(0,0);
	    max-height: 250px;
	    overflow: auto;
	    padding: 10px;
    }
    .direct-chat-msg {
    	margin-bottom: 10px;
    }
    .direct-chat-text {
	    border-radius: 0.3rem;
	    background-color: #d2d6de;
	    border: 1px solid #d2d6de;
	    color: #444;
	    margin: 5px 0 0 50px;
	    padding: 5px 10px;
	    position: relative;
	}
	.direct-chat-msg::after {
	    display: block;
	    clear: both;
	    content: "";
	}
	.direct-chat-text::after, .direct-chat-text::before {
	    border: solid transparent;
	    border-right-color: #d2d6de;
	    content: " ";
	    height: 0;
	    pointer-events: none;
	    position: absolute;
	    right: 100%;
	    top: 15px;
	    width: 0;
	}
	.direct-chat-text::before {
	    border-width: 6px;
	    margin-top: -6px;
	}
	.direct-chat-primary .right>.direct-chat-text {
	    background-color: #007bff;
	    border-color: #007bff;
	    color: #fff;
	}
	.right .direct-chat-text {
	    margin-left: 0;
	    margin-right: 50px;
	    background-color: #00b18a;
	}
	.right .direct-chat-text::after, .right .direct-chat-text::before {
	    border-left-color: #00b18a;
	    border-right-color: transparent;
	    left: 100%;
	    right: auto;
	}
	.right>.direct-chat-text::after, .direct-chat-primary .right>.direct-chat-text::before {
	    border-left-color: #00b18a;
	}
	.direct-chat-img {
	    border-radius: 50%;
	    float: left;
	    height: 40px;
	    width: 40px;
	}
	img {
	    vertical-align: middle;
	    border-style: none;
	}
	.right .direct-chat-img {
	    float: right;
	}
    </style>
@endsection
