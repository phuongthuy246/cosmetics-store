<?php
include('../../config/config.php');
$loaisp = $_POST['loaisanpham'];
$thuonghieu= $_POST['thuonghieu'];
$masp = $_POST['MaSP'];
$tensp = $_POST['TenSP'];
$giasp = $_POST['GiaSP'];
//xulyhinhanh
$anhsp = $_FILES['AnhSP']['name'];
$anhsp_tmp = $_FILES['AnhSP']['tmp_name'];
$anhsp = time() . '_' . $anhsp;


$soluongsp = $_POST['SoLuongSP'];
$thongtin = $_POST['ThongTinSP'];
$thanhphan = $_POST['ThanhPhanSP'];
$huongdan = $_POST['HuongDanSD'];

if (isset($_POST['themsp'])) {
	$sql_them = "INSERT INTO SanPham(MaLSPC,MaTH,MaSP,TenSP,GiaSP,AnhSP,SoLuongSP,ThongTinSP,ThanhPhanSP,HuongDanSD) VALUES('$loaisp','$thuonghieu','$masp','$tensp ','$giasp ','$anhsp','$soluongsp',' $thongtin','$thanhphan','$huongdan')";
	mysqli_query($mysqli, $sql_them);
	// $output = "<script>console.log('abc')</script>";
	// echo $output;
	move_uploaded_file($anhsp_tmp, 'uploads/' . $anhsp);
	header('Location:../../index.php?action=quanlysanpham&query=danhsach');
}
elseif (isset($_POST['suasp'])) {
	if ($anhsp != '') {
		move_uploaded_file($anhsp_tmp, 'uploads/' . $anhsp);

		$sql_update = "UPDATE SanPham SET  MaLSPC='" . $loaisp . "',MaTH='" . $thuonghieu . "',TenSP='" . $tensp . "',GiaSP='" . $giasp . "',AnhSP='" . $anhsp . "',SoLuongSP='" . $soluongsp . "',ThongTinSP='" . $thongtin . "',ThanhPhanSP='" . $thanhphan . "',HuongDanSD='" . $huongdan . "' WHERE MaSP='$_GET[MaSP]'";
		$sql = "SELECT * FROM SanPham WHERE MaSP = '$_GET[MaSP]' LIMIT 1";
		$query = mysqli_query($mysqli, $sql);
		while ($row = mysqli_fetch_array($query)) {
			unlink('uploads/' . $row['AnhSP']);
		}
	}

	else {

		$sql_update = "UPDATE SanPham SET  MaLSPC='" . $loaisp . "',MaTH='" . $thuonghieu . "',TenSP='" . $tensp . "',GiaSP='" . $giasp . "',AnhSP='" . $anhsp . "',SoLuongSP='" . $soluongsp . "',ThongTinSP='" . $thongtin . "',ThanhPhanSP='" . $thanhphan . "',HuongDanSD='" . $huongdan . "' WHERE MaSP='$_GET[MaSP]'";

	}
	mysqli_query($mysqli, $sql_update);
	header('Location:../../index.php?action=quanlysanpham&query=danhsach');
}
else {

	$ma = $_GET['MaSP'];
	$sql = "SELECT * FROM SanPham WHERE MaSP = '$ma' LIMIT 1";
	$query = mysqli_query($mysqli, $sql);
	while ($row = mysqli_fetch_array($query)) {
		unlink('uploads/' . $row['AnhSP']);
	}
	$sql_xoa = "DELETE FROM SanPham WHERE MaSP='" . $ma . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:../../index.php?action=quanlysanpham&query=danhsach');
}
?>