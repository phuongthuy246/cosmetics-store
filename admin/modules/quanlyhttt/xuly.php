<?php
include('../../config/config.php');
$maloai = $_POST['MaHTTT'];
$tenloai = $_POST['TenHTTT'];
if (isset($_POST['themhttt'])) {
	$sql_them = "INSERT INTO HinhThucThanhToan(MaHTTT,TenHTTT) VALUE('" . $maloai . "','" . $tenloai . "')";
	mysqli_query($mysqli, $sql_them);
	header('Location:../../index.php?action=quanlyhttt&query=danhsach');
}
elseif (isset($_POST['suahttt'])) {
	$sql_update = "UPDATE HinhThucThanhToan SET TenHTTT='" . $tenloai . "' WHERE MaHTTT='$_GET[MaHTTT]'";
	mysqli_query($mysqli, $sql_update);
	header('Location:../../index.php?action=quanlyhttt&query=danhsach');
}
else {
	$ma = $_GET['MaHTTT'];
	$sql_xoa = "DELETE FROM HinhThucThanhToan WHERE MaHTTT='" . $ma . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:../../index.php?action=quanlyhttt&query=danhsach');
}
?>