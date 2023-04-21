<!DOCTYPE html>
<html>
<head>
    <title>TNBONLINE.COM</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p><b>Tên khóa học: </b>{{ $mailData['course']['name'] }}</p>
    <p><b>Giá khóa học: </b>{{ number_format($mailData['course']['price_sale']) }} VND</p>
    <p><b>Nội dung khóa học: </b>{{ $mailData['course']['note'] }}</p>
  
    <p>Vui lòng click <a href="{{ route('activeCourse', $mailData['code']) }}" target="_blank">VÀO ĐÂY</a> để kích hoạt khóa học.</p>
    <p>Đăng nhập vào <a href="{{ route('home') }}">Website TNB</a> để tham gia khóa học sau khi kích hoạt.</p>
     
    <p>Cảm ơn bạn đã tin tưởng TNB</p>
</body>
</html>