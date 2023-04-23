<section class="site-res" id="form-res">
	<div class="container">
		<div class="title-main">
			<h2 class="heading">ĐĂNG KÝ NHẬN TƯ VẤN KHÓA HỌC CỦA TNB</h2>
		</div>
		<form action="{{ route('singnUpConsultation') }}" method="POST" class="form">
			@csrf
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" placeholder="Họ và tên" type="text" name="name" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" placeholder="Điện thoại" type="text" name="phone" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" placeholder="Email" type="text" name="email" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<select class="form-control" name="address">
							<option value="">Tỉnh thành</option>
							<option value="An Giang">An Giang
							<option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu
							<option value="Bắc Giang">Bắc Giang
							<option value="Bắc Kạn">Bắc Kạn
							<option value="Bạc Liêu">Bạc Liêu
							<option value="Bắc Ninh">Bắc Ninh
							<option value="Bến Tre">Bến Tre
							<option value="Bình Định">Bình Định
							<option value="Bình Dương">Bình Dương
							<option value="Bình Phước">Bình Phước
							<option value="Bình Thuận">Bình Thuận
							<option value="Bình Thuận">Bình Thuận
							<option value="Cà Mau">Cà Mau
							<option value="Cao Bằng">Cao Bằng
							<option value="Đắk Lắk">Đắk Lắk
							<option value="Đắk Nông">Đắk Nông
							<option value="Điện Biên">Điện Biên
							<option value="Đồng Nai">Đồng Nai
							<option value="Đồng Tháp">Đồng Tháp
							<option value="Đồng Tháp">Đồng Tháp
							<option value="Gia Lai">Gia Lai
							<option value="Hà Giang">Hà Giang
							<option value="Hà Nam">Hà Nam
							<option value="Hà Tĩnh">Hà Tĩnh
							<option value="Hải Dương">Hải Dương
							<option value="Hậu Giang">Hậu Giang
							<option value="Hòa Bình">Hòa Bình
							<option value="Hưng Yên">Hưng Yên
							<option value="Khánh Hòa">Khánh Hòa
							<option value="Kiên Giang">Kiên Giang
							<option value="Kon Tum">Kon Tum
							<option value="Lai Châu">Lai Châu
							<option value="Lâm Đồng">Lâm Đồng
							<option value="Lạng Sơn">Lạng Sơn
							<option value="Lào Cai">Lào Cai
							<option value="Long An">Long An
							<option value="Nam Định">Nam Định
							<option value="Nghệ An">Nghệ An
							<option value="Ninh Bình">Ninh Bình
							<option value="Ninh Thuận">Ninh Thuận
							<option value="Phú Thọ">Phú Thọ
							<option value="Quảng Bình">Quảng Bình
							<option value="Quảng Bình">Quảng Bình
							<option value="Quảng Ngãi">Quảng Ngãi
							<option value="Quảng Ninh">Quảng Ninh
							<option value="Quảng Trị">Quảng Trị
							<option value="Sóc Trăng">Sóc Trăng
							<option value="Sơn La">Sơn La
							<option value="Tây Ninh">Tây Ninh
							<option value="Thái Bình">Thái Bình
							<option value="Thái Nguyên">Thái Nguyên
							<option value="Thanh Hóa">Thanh Hóa
							<option value="Thừa Thiên Huế">Thừa Thiên Huế
							<option value="Tiền Giang">Tiền Giang
							<option value="Trà Vinh">Trà Vinh
							<option value="Tuyên Quang">Tuyên Quang
							<option value="Vĩnh Long">Vĩnh Long
							<option value="Vĩnh Phúc">Vĩnh Phúc
							<option value="Yên Bái">Yên Bái
							<option value="Phú Yên">Phú Yên
							<option value="Tp.Cần Thơ">Tp.Cần Thơ
							<option value="Tp.Đà Nẵng">Tp.Đà Nẵng
							<option value="Tp.Hải Phòng">Tp.Hải Phòng
							<option value="Tp.Hà Nội">Tp.Hà Nội
							<option value="TP  HCM">TP HCM
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<textarea class="form-control" placeholder="Lời nhắn" type="text" name="content"></textarea>
					</div>
				</div>
				<div class="col-md-12">
					<button class="btn-custom" type="submit">Đăng ký ngay</button>
				</div>
			</div>
		</form>
	</div>
</section>