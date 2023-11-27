<!-- Chi-tiet-san-pham -->
 <?php
 $sql_detail = "SELECT * FROM SanPham, LoaiSPC, LoaiSP, ThuongHieu WHERE SanPham.MaLSPC = LoaiSPC.MaLSPC AND SanPham.MaTH= ThuongHieu.MaTH AND LoaiSPC.MaLSP=LoaiSP.MaLSP AND SanPham.MaSP = '$_GET[ma]' LIMIT 1";
 $query_detail = mysqli_query($mysqli, $sql_detail);

 $sql_de = "SELECT * FROM SanPham, LoaiSPC, LoaiSP, ThuongHieu WHERE SanPham.MaLSPC = LoaiSPC.MaLSPC AND SanPham.MaTH= ThuongHieu.MaTH AND LoaiSPC.MaLSP=LoaiSP.MaLSP AND SanPham.MaSP = '$_GET[ma]' LIMIT 1";
 $query_de = mysqli_query($mysqli, $sql_de);
 $row_de = mysqli_fetch_array($query_de);
 ?>




<div class="nav">
 	<a class="nav_link" href="../client/index.php">Trang chủ</a>
 	<i class="nav_icon fas fa-chevron-right"></i>
 	<a class="nav_link" href=""><?php echo $row_de['TenLSP'] ?></a>
	 <i class="nav_icon fas fa-chevron-right"></i>
 	<a class="nav_link" href=""><?php echo $row_de['TenLSPC'] ?></a>
	 <i class="nav_icon fas fa-chevron-right"></i>
 	<a class="nav_link" href=""><?php echo $row_de['TenSP'] ?></a>
 	
 </div>
 <div class="product-detail">
 	<div class="product-detail-left">
	 <?php

while ($row_detail = mysqli_fetch_array($query_detail)) {
?>
 		<form class="product-detail-main" method="POST" action="pages/main/themgiohang.php?MaSP=<?php echo $row_detail['MaSP']?>">
 			<div class="product-detail-img">
 				<img src="../admin/modules/quanlysp/uploads/<?php echo $row_detail['AnhSP'] ?>" alt="" />
 			</div>
 			<div class="product-detail-info-main">
 				<h3 class="product-detail-brand"><?php echo $row_detail['TenTH'] ?></h3>
 				<h3 class="product-detail-name">
				 <?php echo $row_detail['TenSP'] ?>
 				</h3>
 				<div class="product-rate-star">
 					<div class="product-rate-grid">
 						<label class="star-top star-5" for=""></label>
 						<label class="star-top star-4" for=""></label>
 						<label class="star-top star-3" for=""></label>
 						<label class="star-top star-2" for=""></label>
 						<label class="star-top star-1" for=""></label>
 						<div class="all-evaluated">2 đánh giá</div> |
 						<div class="product-code">Mã sản phẩm: <?php echo $row_detail['MaSP'] ?></div>
 					</div>

 					<i class="heart-icon far fa-heart"></i>
 				</div>
 				<div class="product-price">
 					<h2><?php echo number_format ($row_detail['GiaSP'],0,',','.').'đ' ?></h2>
 				</div>
 				<div class="product-soluong">Số lượng:
 					<input type="number" class="product_quantity" name="quantity" min="1" max="10" value="1" />
 				</div>
 				<div class="add-product-cart">
 					<button class="add-cart" type="submit" name="themgiohang" ><i class="fas fa-cart-plus"></i>Giỏ hàng</button>
 					<button class="buy-now" type="submit">Mua ngay</button>
 				</div>

 			</div>
 		</form>
 		<div class="product-detail-motasp">
 			<div class="section-croll">
 				<a class="tab_sub_croll" href="#thongtinsp">Thông tin sản phẩm</a>
 				<a class="tab_sub_croll" href="#thanhphansp">Thành phần sản phẩm</a>
 				<a class="tab_sub_croll" href="#danhgiasp">Đánh giá</a>
 			</div>
 			<div id="thongtinsp" class="product-motasp-main">
 				<div class="product-motasp-grid">

 					<p class="product-motasp-thongtin">


					 <?php echo $row_detail['ThongTinSP'] ?>
 					</p>
 					<div class="thongtin-img">
 						<img src="../admin/modules/quanlysp/uploads/<?php echo $row_detail['AnhSP'] ?>" alt="" class="product-motasp-thongtin-img" />
 					</div>

 					<div class="product-motasp-title">Hướng dẫn sử dụng</div>
 					<div class="product-motasp-thongtin">
					 <?php echo $row_detail['HuongDanSD'] ?>
 					</div>
 				</div>
 				<div class="hidding"></div>
 				<button type="submit" class="btn-dis" onclick="hidding(this)">
 					Xem thêm nội dung
 				</button>
 			</div>

 		</div>
 		<div id="thanhphansp" class="product-motasp-thanhphan">
 			<div class="product-motasp-title">Thành phần chính</div>
 			<div class="product-motasp-thanhphan-main">
			 <?php echo $row_detail['ThanhPhanSP'] ?>
 			</div>
 		</div>
	
 		<div id="danhgiasp" class="product-motasp-thanhphan">
 			<div class="product-motasp-title">Đánh giá</div>
 			<form action="" method="POST" class="form-danhgia">
 				<div class="form-danhgia-text">Đánh giá sản phẩm này *</div>
 				<input type="text" name="maspdanhgia" value="" hidden required />
 				<div class="form-danhgia-grid">
 					<div class="form-danhgia-star">
 						<input class="star star-5" id="star-5" type="radio" name="star" value="5" required />
 						<label class="star star-5" for="star-5"></label>
 						<input class="star star-4" id="star-4" type="radio" name="star" value="4" required />
 						<label class="star star-4" for="star-4"></label>
 						<input class="star star-3" id="star-3" type="radio" name="star" value="3" required />
 						<label class="star star-3" for="star-3"></label>
 						<input class="star star-2" id="star-2" type="radio" name="star" value="2" required />
 						<label class="star star-2" for="star-2"></label>
 						<input class="star star-1" id="star-1" type="radio" name="star" value="1" required />
 						<label class="star star-1" for="star-1"></label>
 					</div>
 				</div>

 				<div>
 					<div class="form-danhgia-text2">Mô tả nhận xét *</div>
 					<textarea name="danhgia" class="danhgia" placeholder="Nhập mô tả tại đây" required></textarea>
 				</div>

 				<div class="box-danhgia">
 					<button type="submit"  name="binhluandanhgia" class="btn-danhgia">
 						Đánh giá
 					</button>
 				</div>
 			</form>
 		</div>
 		<div class="product-motasp-thanhphan">
 			<div class="product-motasp-title">Tất cả đánh giá</div>
 			<div class="product-evaluated">
 				<div class="product-evaluated-main">
 					<div class="product-evaluated-grid">
 						<i class="icon-user-evaluated fas fa-user-circle"></i>
 						<div class="product-evaluated-usr">
 							<b>4 <i class="star-evaluated fas fa-star"></i> | Hài lòng</b>
 							<div class="user-evaluated"><b>Văn Phương Thuỳ</b></div>
 						</div>
 					</div>
 					<div class="time-evaluated">20: 39 | 25/03/2022</div>
 				</div>
 				<div class="product-evaluated-content">Sản phẩm khá tốt, nhẹ, phù hợp nhiều loại da, mình sẽ tiếp tục mua.</div>
 			</div>
 			<div class="product-evaluated">
 				<div class="product-evaluated-main">
 					<div class="product-evaluated-grid">
 						<i class="icon-user-evaluated fas fa-user-circle"></i>
 						<div class="product-evaluated-usr">
 							<b>5 <i class="star-evaluated fas fa-star"></i> | Rất hài lòng</b>
 							<div class="user-evaluated"><b>Lê Ngọc Huỳnh</b></div>
 						</div>
 					</div>
 					<div class="time-evaluated">12: 39 | 29/03/2022</div>
 				</div>
 				<div class="product-evaluated-content">Theo mình thấy thì loại này mình xài hợp quá trời :(( lựa chọn hàng đầu cho da nhạy cảm mình í. Hồi đợt mua chai to bị chôm mất đau gần chớt, nma khuyên mn nên sử dụng loại này nhe</div>
 			</div>

 		</div>
		 <?php
		 }
		 ?>
 	</div>
 	<div class="product-detail-right">
		 <div class="product-detail__right_title" style="font-weight: 500;color: var(--main);margin: 20px 0 16px 0;text-align: center;">MIỄN PHÍ VẬN CHUYỂN</div>
		 <div class="product-detail__right_content">
			<img src="./images/icons/icon_footer_2.svg" style="width: 83px;height: 66px;"  />
			<p>
Giao Nhanh Miễn Phí 2H (Cà Mau - Bạc Liêu - Đồng Tháp - Trà Vinh - Cần Thơ). Trễ tặng 100K</p>
		 </div>
		 <div class="product-detail__right_content">
			<img src="./images/icons/icon_footer_4.svg" style="width: 82px;margin-left: 10px;margin-right: 10px;height: 66px;" />
			<p>
		 Phát hiện hàng giả, bạn trả hàng và nhận thêm 110% giá trị.</p>
		 </div>
		 <div class="product-detail__right_content">
			<img src="./images/icons/icon_footer_3.svg" style="margin-left: 12px;width: 66px;"  />
			<p style="margin-right: 78px;">
			Đổi trả</br>trong 14 ngày</p>
		 </div>
		 <div class="product-detail__right_content">
			<img src="./images/icons/icon_footer_1.svg" style="margin-top: 10px;width: 67px;margin-left: 12px;" />
			<p style="margin-right: 36px;margin-right: 74px;
    margin-top: 10px;">
			Thanh toán </br> khi nhận hàng</p>
		 </div>
	 </div>
	
 </div>