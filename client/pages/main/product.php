<!-- Chi-tiet-san-pham -->
<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
    $user = (isset($_SESSION['dangky'])) ? $_SESSION['dangky'] : [];
    if (!empty($user)) {
        $MaKH = $user['MaTV'];
        $product = $_GET['ma'];
        $query = "SELECT * FROM `SanPhamYeuThich` WHERE `MaTV`='" . $MaKH . "' AND `MaSP`='" . $product . "'";
        $datasql = mysqli_query($mysqli, $query);
        $liked = 0;
        if (mysqli_num_rows($datasql) == 1) {
            $liked = 1;
        }
    } else {
        $liked = 0;
    }
    if (isset($_GET['like']) && !empty($user) && $liked == 0) {
        $MaKH = $user['MaTV'];
        $product = $_GET['ma'];
        $query = "INSERT INTO `SanPhamYeuThich`(`MaTV`, `MaSP`) VALUES ('" . $MaKH . "','" . $product . "')";
        $datasql = mysqli_query($mysqli, $query);
    ?>
        <script>
            window.history.go(-1);
        </script>
    <?php
    } else if (isset($_GET['unlike']) && !empty($user) && $liked == 1) {
        $MaKH = $user['MaTV'];
        $product = $_GET['ma'];
        $query = "DELETE FROM `SanPhamYeuThich` WHERE `MaTV`='" . $MaKH . "' AND `MaSP`='" . $product . "'";
        $datasql = mysqli_query($mysqli, $query);
    ?>
        <script>
            window.history.go(-1);
        </script>
    <?php
    }
    if (isset($_POST['binhluandanhgia']) && !empty($user)) {
		
        $masp = $_POST['maspdanhgia'];
		$danhgia = $_POST['danhgia'];
        $star = $_POST['star'];
        $MaKH = $user['MaTV'];
        $product = $_GET['ma'];
        $date = date("Y-m-d");
        if ($star == 5) $dg = "Rất hài lòng";
        else if ($star == 4) $dg = "Hài lòng";
        else if ($star == 3) $dg = "Bình thường";
        else if ($star == 2) $dg = "Không hài lòng";
        else $dg = "Rất tệ";
        $query = "INSERT INTO `BinhLuan`(`NoiDungBL`, `NgayBL`, `MaTV`, `MaSP`) VALUES ('" . $danhgia . "','" . $date . "','" . $MaKH . "','" . $masp . "')";
        $datasql = mysqli_query($mysqli, $query);
        $query = "SELECT `MaBL` FROM `BinhLuan` WHERE  `NoiDungBL`='" . $danhgia . "' AND `NgayBL`='" . $date . "' AND `MaTV`='" . $MaKH . "' AND `MaSP`='" . $masp . "'";
        $datasql = mysqli_query($mysqli, $query);
        if (mysqli_num_rows($datasql) != 0)
            while ($row = mysqli_fetch_array($datasql, 1)) {
                $MaBL = $row['MaBL'];
            }
        $query = "INSERT INTO `DanhGia`(`SoSao`, `MoTaDG`, `MaBL`) VALUES ('" . $star . "','" . $dg . "','" . $MaBL . "')";
        $datasql = mysqli_query($mysqli, $query);
    ?>
        <script>
            window.history.go(-1);
        </script>
    <?php
    }
    
    ?>


<?php
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
    if (isset($_GET['ma'])) {

        $query = "SELECT * FROM SanPham, LoaiSPC, LoaiSP, ThuongHieu WHERE SanPham.MaLSPC = LoaiSPC.MaLSPC AND SanPham.MaTH= ThuongHieu.MaTH AND LoaiSPC.MaLSP=LoaiSP.MaLSP AND SanPham.MaSP = '$_GET[ma]'";
        $datasql = mysqli_query($mysqli, $query);
        if (mysqli_num_rows($datasql) != 0) {
            $row = mysqli_fetch_array($datasql, 1);
    		?>
			<div class="product-detail-main" >
				<div class="product-detail-img">
					<img src="../admin/modules/quanlysp/uploads/<?php echo $row['AnhSP'] ?>" alt="" />
				</div>
				<div class="product-detail-info-main">
					<h3 class="product-detail-brand"><?php echo $row['TenTH'] ?></h3>
					<h3 class="product-detail-name">
					
					</h3>
					<div class="product-rate-star">
						<div class="product-rate-grid">
							<label class="star-top star-5" for=""></label>
							<label class="star-top star-4" for=""></label>
							<label class="star-top star-3" for=""></label>
							<label class="star-top star-2" for=""></label>
							<label class="star-top star-1" for=""></label>
							<div class="all-evaluated">2 đánh giá</div> |
							<div class="product-code">Mã sản phẩm: <?php echo $row['MaSP'] ?></div>
						</div>

						<i <?php if (!empty($user)) {
							 ?> onclick="window.location.href+='<?php if ($liked >= 1) echo "&unlike=true";
                            else echo "&like=true"; ?>'" <?php } ?> class="heart-icon fa<?php if ($liked >= 1) { echo "s";} else { echo "r";}?> fa-heart"></i>
					</div>
					<div class="product-price">
						<h2><?php echo number_format ($row['GiaSP'],0,',','.').'đ' ?></h2>
					</div>
					<div class="product-soluong">Số lượng: <?php echo $row['SoLuongSP']?>
						<!-- <input type="number" class="product_quantity" name="quantity" min="1" max="" value="1" />
						<input type="hidden" name="MaSP" value=""/> -->
					</div>
					<form class="add-product-cart" method="POST" action="pages/main/themgiohang.php?MaSP=<?php echo $row['MaSP']?>">
						<button class="add-cart" type="submit" name="themgiohang"  ><i class="fas fa-cart-plus"></i>Giỏ hàng</button>
						<button class="buy-now" type="">Mua ngay</button>
					</form>
				</div>
			</div>
			<div class="product-detail-motasp">
				<div class="section-croll">
					<a class="tab_sub_croll" href="#thongtinsp">Thông tin sản phẩm</a>
					<a class="tab_sub_croll" href="#thanhphansp">Thành phần sản phẩm</a>
					<a class="tab_sub_croll" href="#danhgiasp">Đánh giá</a>
				</div>
				<div id="thongtinsp" class="product-motasp-main">
					<div class="product-motasp-grid">

						<p class="product-motasp-thongtin">


						<?php echo $row['ThongTinSP'] ?>
						</p>
						<div class="thongtin-img">
							<img src="../admin/modules/quanlysp/uploads/<?php echo $row['AnhSP'] ?>" alt="" class="product-motasp-thongtin-img" />
						</div>

						<div class="product-motasp-title">Hướng dẫn sử dụng</div>
						<div class="product-motasp-thongtin">
						<?php echo $row['HuongDanSD'] ?>
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
				<?php echo $row['ThanhPhanSP'] ?>
				</div>
			</div>
			<div id="danhgiasp" class="product-motasp-thanhphan">
				<div class="product-motasp-title">Đánh giá</div>
				<form action="" method="POST" class="form-danhgia">
					<div class="form-danhgia-text">Đánh giá sản phẩm này *</div>
					<input type="text" name="maspdanhgia" value="<?php echo $_GET['ma'] ?>" hidden required />
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
			<?php
                $query = "SELECT * FROM `DanhGia` a JOIN (SELECT b.*,`MaBL`,`NoiDungBL`,`NgayBL`,`MaSP` FROM `BinhLuan` a JOIN `ThanhVien` b ON (a.`MaTV`=b.`MaTV`)) b ON (a.`MaBL`=b.`MaBL`) WHERE `MaSP`='" . $row['MaSP'] . "'";
                $datasql = mysqli_query($mysqli, $query);
			?>
				<div class="product-motasp-title">Tất cả đánh giá</div>
				<?php if (mysqli_num_rows($datasql) == 0) { ?>
                <div class="no_rate">
                <img src="../client/images/dg.png" class="dgia" alt="..." style="padding-left: 394px;padding-top: 10px;"/>
                <p style="margin-bottom: 0;padding-left: 390px;padding-top: 20px;"> Chưa có đánh giá </p>
                </div>
				<?php } else while ($row1 = mysqli_fetch_array($datasql, 1)) { ?>
				<div class="product-evaluated">
					<div class="product-evaluated-main">
						<div class="product-evaluated-grid">
							<i class="icon-user-evaluated fas fa-user-circle"></i>
							<div class="product-evaluated-usr">
								<b><?php echo $row1['SoSao']?><i class="star-evaluated fas fa-star"></i> | <?php echo $row1['MoTaDG']?></b>
								<div class="user-evaluated"><b><?php echo $row1['TenTV']; ?></b></div>
							</div>
						</div>
						<div class="time_evaluated"><?php echo $row1['NgayBL']?></div>
					</div>
					<div class="product-evaluated-content"><?php echo $row1['NoiDungBL']; ?></div>
				</div>
				<?php } ?>
				
			</div>
			<?php
		
	}
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
 <script>const time_evaluated = document.querySelectorAll(".time_evaluated")
time_evaluated.forEach((element) => {
	const date = new Date(element.innerHTML)
	element.innerHTML = `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`
})</script>