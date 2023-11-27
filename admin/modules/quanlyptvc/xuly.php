<?php
include('../../config/config.php');
$maloai = $_POST['MaPT'];
$tenloai = $_POST['TenPT'];
$gia = $_POST['GiaPT'];
if (isset($_POST['themptvc'])) {
	$sql_them = "INSERT INTO PhuongThucVanChuyen(MaPT,TenPT,GiaPT) VALUE('" . $maloai . "','" . $tenloai . "','" . $gia . "')";
	mysqli_query($mysqli, $sql_them);
	header('Location:../../index.php?action=quanlyptvc&query=danhsach');
}
elseif (isset($_POST['suaptvc'])) {
	$sql_update = "UPDATE PhuongThucVanChuyen SET TenPT='" . $tenloai . "',GiaPT='" . $gia . "' WHERE MaPT='$_GET[MaPT]'";
	mysqli_query($mysqli, $sql_update);
	header('Location:../../index.php?action=quanlyptvc&query=danhsach');
}
else {
	$ma = $_GET['MaPT'];
	$sql_xoa = "DELETE FROM PhuongThucVanChuyen WHERE MaPT='" . $ma . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:../../index.php?action=quanlyptvc&query=danhsach');
}
?>