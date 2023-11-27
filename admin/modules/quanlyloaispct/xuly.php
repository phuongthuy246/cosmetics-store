<?php
include('../../config/config.php');
$loaisp=$_POST['loaisanpham'];
$maloai = $_POST['MaLSPC'];
$tenloai = $_POST['TenLSPC'];
$motaloai = $_POST['MoTaLSPC'];
if (isset($_POST['themloaispct'])) {
	$sql_them = "INSERT INTO LoaiSPC(MaLSPC,TenLSPC,MoTaLSPC,MaLSP) VALUE('" . $maloai . "','" . $tenloai . "','" . $motaloai . "','" . $loaisp . "')";
	mysqli_query($mysqli, $sql_them);
	header('Location:../../index.php?action=quanlyloaisanphamct&query=danhsach');
}
elseif (isset($_POST['sualoaispct'])) {
	$sql_update = "UPDATE LoaiSPC SET TenLSPC='" . $tenloai . "',MoTaLSPC='" . $motaloai . "',MaLSP='".$loaisp."' WHERE MaLSPC='$_GET[MaLSPC]'";
	mysqli_query($mysqli, $sql_update);
	header('Location:../../index.php?action=quanlyloaisanphamct&query=danhsach');
}
else {
	$ma = $_GET['MaLSPC'];
	$sql_xoa = "DELETE FROM LoaiSPC WHERE MaLSPC='" . $ma . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:../../index.php?action=quanlyloaisanphamct&query=danhsach');
}
?>