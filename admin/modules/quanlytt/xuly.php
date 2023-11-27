<?php
require('../../../carbon/autoload.php');
include('../../config/config.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
// $now->format('d-m-Y');

$loaitintuc=$_POST['loaitintuc'];
$matt = $_POST['MaTT'];
$tentt = $_POST['TenTT'];
$anhtt = $_FILES['AnhTT']['name'];
$anhtt_tmp =$_FILES['AnhTT']['tmp_name'];
$anhtt = time() . '_' . $anhtt;
$mota=$_POST['MoTaTT'];
$noidung=$_POST['NoiDungTT'];

//xulyhinhanh


if (isset($_POST['themtt'])) {
	$sql_them = "INSERT INTO TinTuc(MaLTT,MaTT,TenTT,AnhTT,NgayTT, MoTaTT, NoiDungTT) VALUES('$loaitintuc','$matt','$tentt','$anhtt','$now','$mota','$noidung')";
	mysqli_query($mysqli, $sql_them);
	move_uploaded_file($anhtt_tmp, 'uploads/' .$anhtt);
	header('Location:../../index.php?action=quanlytintuc&query=danhsach');
}
elseif (isset($_POST['suatt'])) {
	if ( $anhtt != '') {
		
		move_uploaded_file($anhtt_tmp, 'uploads/' .$anhtt);
		$sql_update = "UPDATE TinTuc SET  MaLTT='".$loaitintuc."', TenTT='" . $tentt . "', AnhTT='" . $anhtt . "',NgayTT='".$now."',MoTaTT='".$mota."',NoiDungTT='".$noidung."' WHERE MaTT ='$_GET[MaTT]'";
		$sql = "SELECT * FROM TinTuc WHERE MaTT = '$_GET[MaTT]' LIMIT 1";

		// $sql_update = "UPDATE ThuongHieu SET  TenTH='$tenth',`AnhTH`='$anhth' WHERE MaTH='".$_GET['MaTH']."'";
		// $sql = "SELECT * FROM ThuongHieu WHERE MaTH = '".$_GET['MaTH']."' LIMIT 1";
		$query = mysqli_query($mysqli, $sql);
		
		while ($row = mysqli_fetch_array($query)) {
			
			unlink('uploads/' . $row['AnhTT']);
		}
	}

	else {
		$sql_update = "UPDATE TinTuc SET  MaLTT='".$loaitintuc."', TenTT='" . $tentt . "', AnhTT='" . $anhtt . "',NgayTT='".$now."',MoTaTT='".$mota."',NoiDungTT='".$noidung."' WHERE MaTT ='$_GET[MaTT]'";
		// $sql_update = "UPDATE ThuongHieu SET  TenTH='$tenth',`AnhTH`='$anhth' WHERE MaTH='".$_GET['MaTH']."'";

	}
	if(mysqli_query($mysqli, $sql_update)===TRUE){

		echo"<script type='text/javascript'>
		alert('Cập nhật tin tức thành công!');
		document.location='../../index.php?action=quanlytintuc&query=danhsach';
	</script>";

	}else{
		echo"<script type='text/javascript'>
		alert('Cập nhật tin tức không thành công!');
		document.location='../../index.php?action=quanlytintuc&query=danhsach';
	</script>";
	}
	// mysqli_query($mysqli, $sql_update);
	// header('Location:../../index.php?action=quanlythuonghieu&query=danhsach');
}
else {
	$ma = $_GET['MaTT'];
	$sql_xoa = "DELETE FROM TinTuc WHERE MaTT='$ma'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:../../index.php?action=quanlytintuc&query=danhsach');
}
?>