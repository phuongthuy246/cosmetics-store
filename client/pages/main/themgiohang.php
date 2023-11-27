
<?php
session_start();
include('../../../admin/config/config.php');

if (isset($_GET['tang'])) {
	$ma = $_GET['tang'];
	foreach ($_SESSION['giohang'] as $cart_item) {
		if ($cart_item['ma'] != $ma) {
			$product[] = array('TenSP' => $cart_item['TenSP'], 'ma' => $cart_item['ma'], 'SoLuongSP' => $cart_item['SoLuongSP'], 'GiaSP' => $cart_item['GiaSP'], 'AnhSP' => $cart_item['AnhSP']);
			$_SESSION['giohang'] = $product;
		} else {
			$tangsoluong = $cart_item['SoLuongSP'] + 1;
			if ($cart_item['SoLuongSP'] <= 9) {

				$product[] = array('TenSP' => $cart_item['TenSP'], 'ma' => $cart_item['ma'], 'SoLuongSP' => $tangsoluong, 'GiaSP' => $cart_item['GiaSP'], 'AnhSP' => $cart_item['AnhSP']);
			} else {
				$product[] = array('TenSP' => $cart_item['TenSP'], 'ma' => $cart_item['ma'], 'SoLuongSP' => $cart_item['SoLuongSP'], 'GiaSP' => $cart_item['GiaSP'], 'AnhSP' => $cart_item['AnhSP']);
			}
			$_SESSION['giohang'] = $product;
		}
	}
	header('Location:../../index.php?quanly=giohang');
}

if (isset($_GET['giam'])) {
	$ma = $_GET['giam'];
	foreach ($_SESSION['giohang'] as $cart_item) {
		if ($cart_item['ma'] != $ma) {
			$product[] = array('TenSP' => $cart_item['TenSP'], 'ma' => $cart_item['ma'], 'SoLuongSP' => $cart_item['SoLuongSP'], 'GiaSP' => $cart_item['GiaSP'], 'AnhSP' => $cart_item['AnhSP']);
			$_SESSION['giohang'] = $product;
		} else {
			$giamsoluong = $cart_item['SoLuongSP'] - 1;
			if ($cart_item['SoLuongSP'] > 1) {

				$product[] = array('TenSP' => $cart_item['TenSP'], 'ma' => $cart_item['ma'], 'SoLuongSP' => $giamsoluong, 'GiaSP' => $cart_item['GiaSP'], 'AnhSP' => $cart_item['AnhSP']);
			} else {
				$product[] = array('TenSP' => $cart_item['TenSP'], 'ma' => $cart_item['ma'], 'SoLuongSP' => $cart_item['SoLuongSP'], 'GiaSP' => $cart_item['GiaSP'], 'AnhSP' => $cart_item['AnhSP']);
			}
			$_SESSION['giohang'] = $product;
		}
	}
	header('Location:../../index.php?quanly=giohang');
}

if (isset($_SESSION['giohang']) && isset($_GET['xoa'])) {
	$ma = $_GET['xoa'];
	foreach ($_SESSION['giohang'] as $cart_item) {

		if ($cart_item['ma'] != $ma) {
			$product[] = array('TenSP' => $cart_item['TenSP'], 'ma' => $cart_item['ma'], 'SoLuongSP' => $cart_item['SoLuongSP'], 'GiaSP' => $cart_item['GiaSP'], 'AnhSP' => $cart_item['AnhSP']);
		}
		$_SESSION['giohang'] = $product;
		header('Location:../../index.php?quanly=giohang');
	}
}

if (isset($_POST['themgiohang'])) {
	// session_destroy();
	$ma = $_GET['MaSP'];
	$soluong = 1;
	$sql = "SELECT *FROM SanPham, ThuongHieu WHERE SanPham.MaTH=ThuongHieu.MaTH AND SanPham.MaSP='" . $ma . "' LIMIT 1";
	$query = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($query);
	if ($row) {
		$new_product = array(array('TenSP' => $row['TenSP'], 'ma' => $ma, 'SoLuongSP' => $soluong, 'GiaSP' => $row['GiaSP'], 'AnhSP' => $row['AnhSP']));

		if (isset($_SESSION['giohang'])) {
			$found = false;
			foreach ($_SESSION['giohang'] as $cart_item) {
				if ($cart_item['ma'] == $ma) {
					$product[] = array('TenSP' => $cart_item['TenSP'], 'ma' => $cart_item['ma'], 'SoLuongSP' => $soluong + 1, 'GiaSP' => $cart_item['GiaSP'], 'AnhSP' => $cart_item['AnhSP']);
					$found = true;
				} else {
					$product[] = array('TenSP' => $cart_item['TenSP'], 'ma' => $cart_item['ma'], 'SoLuongSP' => $cart_item['SoLuongSP'], 'GiaSP' => $cart_item['GiaSP'], 'AnhSP' => $cart_item['AnhSP']);
				}
			}
			if ($found == false) {
				$_SESSION['giohang'] = array_merge($product, $new_product);
			} else {
				$_SESSION['giohang'] = $product;
			}
		} else {
			$_SESSION['giohang'] = $new_product;
		}
	}
	header('Location:../../index.php?quanly=giohang');
	// print_r($_SESSION['giohang']);
}


?>