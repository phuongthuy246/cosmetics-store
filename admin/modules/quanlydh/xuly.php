<?php
require('../../../carbon/autoload.php');
include('../../config/config.php');

use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
if (isset($_GET['code'])) {
	$code_cart = $_GET['code'];
	$sql_update = "UPDATE Gio_Hang SET TrangThai= 0 WHERE Ma_GH='" . $code_cart . "'";
	$query = mysqli_query($mysqli, $sql_update);

	$sql_lietke_dh = "SELECT * FROM Chi_Tiet_GH,San_Pham WHERE Chi_Tiet_GH.Ma_SP=San_Pham.Ma_SP AND Chi_Tiet_GH.Ma_GH='$code_cart' ORDER BY Chi_Tiet_GH.ID_CT DESC";
	$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);


	$sql_thongke = "SELECT * FROM Thong_Ke WHERE Ngay_TK='$now'";
	$query_thongke = mysqli_query($mysqli, $sql_thongke);

	$soluongmua = 0;
	$doanhthu = 0;

	while ($row = mysqli_fetch_array($query_lietke_dh)) {
		$soluongmua += $row['SoLuong'];
		$doanhthu += $row['Gia_SP'];
	}

	if (mysqli_num_rows($query_thongke) == 0) {
		$soluongban = $soluongmua;
		$doanhthu = $doanhthu;
		$donhang = 1;
		$sql_update_thongke = mysqli_query($mysqli, "INSERT INTO Thong_Ke (Ngay_TK,SoLuong_TK,DoanhThu_TK,DonHang_TK) VALUE('$now','$soluongban','$doanhthu','$donhang')");
	} elseif (mysqli_num_rows($query_thongke) != 0) {

		while ($row_tk = mysqli_fetch_array($query_thongke)) {
			$soluongban = $row_tk['SoLuong_TK'] + $soluongban;
			$doanhthu = $row_tk['DoanhThu_TK'] + $doanhthu;
			$donhang = $row_tk['DonHang_TK'] + 1;


			$sql_update_thongke = mysqli_query($mysqli, "UPDATE Thong_Ke SET SoLuong_TK='$soluongban',DoanhThu_TK='$doanhthu',DonHang_TK='$donhang' WHERE Ngay_TK='$now'");
		}
	}
	header('Location:../../index.php?action=quanlydonhang&query=danhsach');
}
