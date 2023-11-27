<?php
include('../../config/config.php');
$maloai = $_POST['MaLSP'];
$tenloai = $_POST['TenLSP'];
$motaloai = $_POST['MoTaLSP'];
if (isset($_POST['themloaisp'])) {
	$sql_them = "INSERT INTO LoaiSP(MaLSP,TenLSP,MoTaLSP) VALUE('" . $maloai . "','" . $tenloai . "','" . $motaloai . "')";
	mysqli_query($mysqli, $sql_them);
	header('Location:../../index.php?action=quanlyloaisanpham&query=danhsach');
}
elseif (isset($_POST['sualoaisp'])) {
	$sql_update = "UPDATE LoaiSP SET TenLSP='" . $tenloai . "',MoTaLSP='" . $motaloai . "' WHERE MaLSP='$_GET[MaLSP]'";
	mysqli_query($mysqli, $sql_update);
	header('Location:../../index.php?action=quanlyloaisanpham&query=danhsach');
}
else {
	$ma = $_GET['MaLSP'];
	$sql_xoa = "DELETE FROM LoaiSP WHERE MaLSP='" . $ma . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:../../index.php?action=quanlyloaisanpham&query=danhsach');
}
?>