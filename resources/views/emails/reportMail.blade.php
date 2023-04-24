<!DOCTYPE html>
<html>
<head>
    <title>TNBONLINE.COM</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p><b>Tên khóa học: </b>{{ $mailData['lesson']['chapter']['course']['name'] }}</p>
    <p><b>Bài học: </b>{{ $mailData['lesson']['name'] }}</p>
     
    <p>Học viên báo lỗi video bài học này.</p>
    <p>Vui lòng đăng nhập page quản trị để kiểm tra bài học!</p>
</body>
</html>