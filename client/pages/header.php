<?php
include('../admin/config/config.php');
$err = [];

if (isset($_POST['dangky'])) {
	$hoten = $_POST['ten'];
	$sdt = $_POST['sdt'];
	$diachi = $_POST['diachi'];
	$email = $_POST['email'];
	$matkhau = $_POST['psw'];
	$matkhau2 = $_POST['repsw'];
	$check = "SELECT *FROM ThanhVien WHERE EmailTV='$email'";
	// echo'<p>'.$check.'</p>';
	if (empty($hoten)) {
		$err['ten'] = 'Bạn chưa nhập tên';
	}
	if (empty($sdt)) {
		$err['sdt'] = 'Bạn chưa nhập số điện thoại';
	}
	if (empty($diachi)) {
		$err['diachi'] = 'Bạn chưa nhập địa chỉ';
	}
	if (empty($email)) {
		$err['email'] = 'Bạn chưa nhập email';
	}

	if (empty($matkhau)) {
		$err['psw'] = 'Bạn chưa nhập mật khẩu';
	}
	if ($matkhau != $matkhau2) {
		$err['repsw'] = 'Mật khẩu không trùng khớp';
	}

	if (empty($err)) {
		$password = md5($matkhau, false);
		$sql_dangky =  "INSERT INTO ThanhVien(TenTV,SDTTV,DiaChiTV,EmailTV,Password) VALUE ('" . $hoten . "','" . $sdt . "','" . $diachi . "','" . $email . "','" . $password . "')";
		mysqli_query($mysqli, $sql_dangky);
		if ($sql_dangky) {
			echo '<script>alert("Đăng ký thành công")</script>';

			$_SESSION['dangky'] = $hoten;
			$_SESSION['id_kh'] = mysqli_insert_id($mysqli);
			// header('Location: index.php?quanly=giohang');

			// header('Location:login.php');
		}
	}
}
?>
<?php
session_start();
include('../admin/config/config.php');
if (isset($_POST['dangnhap'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM ThanhVien WHERE EmailTV='" . $email . "' AND Password='" . $password . "' LIMIT 1 ";
	$row = mysqli_query($mysqli, $sql);
	$count = mysqli_num_rows($row);
	if ($count > 0) {
		$row_data = mysqli_fetch_array($row);
		$_SESSION['dangky'] = $row_data;
		$_SESSION['id_kh'] = $row_data['MaTV'];
		header("Location:./index.php");
	} else {
		$sql1 = "SELECT * FROM Admin WHERE EmailAD='" . $email . "' AND Password='" . $password . "' LIMIT 1 ";
		$row1 = mysqli_query($mysqli, $sql1);
		$count1 = mysqli_num_rows($row1);
		if ($count1 > 0) {
			$row_data = mysqli_fetch_array($row1);
			$_SESSION['admin'] = $row_data;
			$_SESSION['ia_ad'] = $row_data['MaAD'];
			header("Location:../admin/index.php");
		}
		// echo '<script>alert("Username hoặc mật khẩu không đúng, vui lòng nhập lại")</script>';
	}
}
?>
<?php
// include('../admincp/config/config.php');
session_start();
// $user = [];
$user = (isset($_SESSION['dangky'])) ? $_SESSION['dangky'] : [];

if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
	unset($_SESSION['dangky']);
	header('Location:./index.php');
}

?>
<nav><img src="./images/ship.jpeg" alt="" /></nav>
<div class="header">
	<div class="header-first">
		<div class="header-first-grid">
			<a href="./index.php" class="logo">
				<img src="./images/Logo.png" alt="" />
			</a>
			<form class="search" action="index.php?quanly=timkiem" method="POST">
				<input type="text" class="search-input-product" placeholder="Tìm kiếm sản phẩm, thương hiệu bạn mong muốn..." name="tukhoa" />
				<button class="search-btn" type="submit" name="timkiem">
					<i class="search-btn-icon fas fa-search"></i>
				</button>
			</form>

			<div class="header-box">
				<a href="index.php?quanly=giohang" class="header_cart">
					<i class="header_cart-icon fas fa-shopping-bag"></i>
					<p class="account-title">Giỏ <br />hàng</p>
				</a>
				<div class="user-wrap">
					<?php if (isset($user['EmailTV'])) { ?>
						<a href="" class="account">
							<i class="header-box-icon fas fa-user"></i>
							<p class="account-title">Chào </i><?php echo $user['TenTV'] ?> ! <br />Tài khoản</p>
						</a>
						<div class="user-list">
							<span class="arrow_sub_login"><span class="icon_carret_down"></span></span>
							<div class="user-content">
								<div class="item-loggedin">
									<a href="">
										<i class="loggedin-icon far fa-file-alt"></i>Tài
										khoản của bạn
									</a>
								</div>
								<div class="item-loggedin">
									<a href="index.php?quanly=donhang">
										<i class="loggedin-icon far fa-list-alt"></i>Quản lý
										đơn hàng
									</a>
								</div>
								<div class="item-loggedin">
									<a href="index.php?quanly=sanphamyt">
										<i class="loggedin-icon far fa-heart"></i>Sản phẩm
										yêu thích
									</a>
								</div>
								<div class="item-loggedin" >
									<a href="./index.php?dangxuat=1">
										<i class=" loggedin-icon fas fa-sign-out-alt"></i>Thoát
									</a>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<a href="" class="account">
							<i class="header-box-icon fas fa-user-alt"></i>
							<p class="account-title">Đăng ký/Đăng nhập<br />Tài khoản</p>
						</a>
						<div class="user-list">
							<span class="arrow_sub_login"><span class="icon_carret_down"></span></span>
							<div class="user-content">
								<p class="list-title-login">Đăng nhập với Thithi Beauty</p>

								<div class="btn-login">
									<button class="btn-login-main" onclick="document.getElementById('id01').style.display='block'">
										Đăng nhập
									</button>
								</div>

								<p class="list-title-register">
									Bạn chưa có tài khoản?
									<button class="link-register" onclick="document.getElementById('id02').style.display='block'">
										ĐĂNG KÝ NGAY
									</button>
								</p>
							</div>
						</div>
					<?php } ?>

				</div>
				<a href="#" class="support">
					<i class="header-box-icon fas fa-phone-alt"></i>
					<p class="account-title">
						Hỗ trợ<br />
						khách hàng
					</p>
				</a>
			</div>
		</div>
	</div>
	<?php
$sql_loaisanpham = "SELECT * FROM LoaiSP ORDER BY MaLSP ASC";
$query_loaisanpham = mysqli_query($mysqli, $sql_loaisanpham);
?>
	<div class="header-second-menu">
		<ul class="menu-list">
			<li class="menu-item">
				<a class="menu-item-link-home" href=""><i class="icon-bar fas fa-bars"></i></a>
				<div class="menu-item-dropdown">
					<ul class="menu-item-dropdown-list">
					<?php
						$sql_loaitt = "SELECT * FROM LoaiTT ORDER BY MaLTT ASC";
						$query_loaitt = mysqli_query($mysqli, $sql_loaitt);
						?>
						<?php
						while ($row_loaitt = mysqli_fetch_array($query_loaitt)) {
						?>
					<li class="item-dropdown-list">
							<a class="dropdown-list-product" href="index.php?quanly=tintuc&ma=<?php echo $row_loaitt['MaLTT']?>"><?php echo $row_loaitt['TenLTT']?></a>
						</li>
						<?php
}
?>
					</ul>
				</div>
			</li>
			
			<?php
			while ($row_loaisanpham = mysqli_fetch_array($query_loaisanpham)) {
			?>
			<li class="menu-item">
				<a class="menu-item-link" href=""><?php echo $row_loaisanpham['TenLSP']?><i class="fas fa-angle-down"></i></a>
				<div class="menu-item-dropdown">
					<ul class="menu-item-dropdown-list">
					<?php
					$sql_loaispct = "SELECT * FROM LoaiSPC WHERE LoaiSPC.MaLSP = '".$row_loaisanpham['MaLSP']."' ORDER BY MaLSPC ASC ";
					$query_loaispct = mysqli_query($mysqli, $sql_loaispct);
					?>
					<?php
			while ($row_loaispct = mysqli_fetch_array($query_loaispct)) {
			?>
						<li class="item-dropdown-list">
							<a class="dropdown-list-product" href="index.php?quanly=loaisanpham&ma=<?php echo $row_loaispct['MaLSPC']?>"><?php echo $row_loaispct['TenLSPC']?></a>
						</li>
						<?php
						}
						?>
						
					</ul>

					<!-- <div class="menu-item-dropdown-img">
						<img src="./images/mp.png" alt="" />
					</div> -->
				</div>
			</li>
			<?php
}
?>
		</ul>
			
	</div>
</div>
<!-- Modal-dangnhap -->

<div id="id01" class="modal">
	<form class="modal-content-login animate" action="" method="post">
		<div class="imgcontainer">
			<p style="
                                color: var(--main);
                                font-weight: bold;
                                margin-bottom: 0;
                                font-size: 15px;
                            ">
				ĐĂNG NHẬP TÀI KHOẢN
			</p>
			<span onclick="document.getElementById('id01').style.display='none'" class="close-modal-login" title="Close Modal">&times;</span>
		</div>

		<div class="modal-container">
			<div class="modal-item-login">
				<input class="uname" type="text" placeholder="Nhập email hoặc số điện thoại" name="email" required />
				<i class="icon-login-modal fas fa-envelope"></i>
			</div>

			<div class="modal-item-login">
				<input class="psw" type="password" placeholder="Nhập mật khẩu" name="password" required />
				<i class="icon-login-modal fas fa-lock"></i>
			</div>
			<div style="margin: 5px 0; font-size: 13px">
				<input type="checkbox" checked="checked" name="remember" style="margin: 2px; margin-left: 0" />Nhớ mật khẩu
			</div>
			<button class="login-submit" type="submit" name="dangnhap">Đăng nhập</button>
			<p class="modal-login-register">
				Bạn chưa có tài khoản?
				<button class="modal-login-link-register" data-dismiss="modal" onclick="
                                    document.getElementById('id02').style.display='block'
                                    document.getElementById('id01').style.display='none'    
                                ">
					ĐĂNG KÝ NGAY
				</button>
			</p>
		</div>

		<!-- <div class="modal-container" style="background-color: #f1f1f1">
                        <button
                            type="button"
                            onclick="document.getElementById('id01').style.display='none'"
                            class="cancelbtn"
                        >
                            Cancel
                        </button>
                        <span class="forgot">Forgot <a href="#">password?</a></span>
                    </div> -->
	</form>
</div>
<!-- Modal-dangky -->

<div id="id02" class="modal">
	<form class="modal-content-login animate" action="" method="post">
		<div class="imgcontainer">
			<p style="
                                color: var(--main);
                                font-weight: bold;
                                margin-bottom: 0;
                                font-size: 15px;
                            ">
				ĐĂNG KÝ TÀI KHOẢN
			</p>
			<span onclick="document.getElementById('id02').style.display='none'" class="close-modal-login" title="Close Modal">&times;</span>
		</div>

		<div class="modal-container">
			<div class="modal-item-login">
				<input class="uname" type="text" placeholder="Nhập email" name="email" required />
				<i class="icon-login-modal fas fa-envelope"></i>
			</div>
			<div class="modal-item-login">
				<input class="psw" type="text" placeholder="Họ tên" name="ten" required />
				<i class="icon-login-modal fas fa-user"></i>
			</div>
			<div class="modal-item-login">
				<input class="psw" type="text" placeholder="Địa chỉ" name="diachi" required />
				<i class="icon-login-modal fas fa-map-marker-alt"></i>
			</div>
			<div class="modal-item-login">
				<input class="uname" type="text" placeholder="Nhập số điện thoại" name="sdt" required />
				<i class="icon-login-modal fas fa-envelope"></i>
			</div>
			<div class="modal-item-login">
				<input class="psw" type="password" placeholder="Nhập mật khẩu" name="psw" required />
				<i class="icon-login-modal fas fa-lock"></i>
			</div>
			<div class="modal-item-login">
				<input class="psw" type="password" placeholder="Nhập lại mật khẩu" name="repsw" required />
				<i class="icon-login-modal fas fa-shield-alt"></i>
			</div>

			<button class="login-submit" type="submit" name="dangky">Đăng ký</button>
			<p class="modal-login-register">
				Bạn đã có tài khoản?
				<button class="modal-login-link-register" data-dismiss="modal" onclick="
                                    document.getElementById('id01').style.display='block'
                                    document.getElementById('id02').style.display='none'
                                ">
					ĐĂNG NHẬP
				</button>
			</p>
		</div>

		<!-- <div class="modal-container" style="background-color: #f1f1f1">
                        <button
                            type="button"
                            onclick="document.getElementById('id01').style.display='none'"
                            class="cancelbtn"
                        >
                            Cancel
                        </button>
                        <span class="forgot">Forgot <a href="#">password?</a></span>
                    </div> -->
	</form>
</div>


