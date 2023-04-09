<!DOCTYPE html>
<html>
<head>
    <title>TNB.COM</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p><b>Tên khóa học: </b>{{ $course->name }}</p>
    <p><b>Giá khóa học: </b>{{ number_format($course->name) }} VND</p>
    <p><b>Nội dung khóa học: </b>{{ $course->note }}</p>
  
    <p>Vui lòng click <a href="{{ route('activeCourse', $code) }}" target="_blank">VÀO ĐÂY</a> để kích hoạt khóa học.</p>
    <p>Đăng nhập vào <a href="{{ route('home') }}">Website TNB</a> để tham gia khóa học sau khi kích hoạt.</p>
     
    <p>Cảm ơn bạn đã tin tưởng TNB</p>
</body>
</html>