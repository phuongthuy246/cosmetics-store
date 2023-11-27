<?php
include('../../config/config.php');
$math = $_POST['MaTH'];
$tenth = $_POST['TenTH'];
//xulyhinhanh
$anhth = $_FILES['AnhTH']['name'];
$anhth_tmp =$_FILES['AnhTH']['tmp_name'];
$anhth = time() . '_' . $anhth;

if (isset($_POST['themth'])) {
	$sql_them = "INSERT INTO ThuongHieu(MaTH,TenTH,AnhTH) VALUES('$math','$tenth','$anhth ')";
	mysqli_query($mysqli, $sql_them);
	move_uploaded_file($anhth_tmp, 'uploads/' .$anhth);
	header('Location:../../index.php?action=quanlythuonghieu&query=danhsach');
}
elseif (isset($_POST['suath'])) {
	if ( $anhth != '') {
		
		move_uploaded_file($anhth_tmp, 'uploads/' .$anhth);
		$sql_update = "UPDATE ThuongHieu SET  TenTH='" . $tenth . "', AnhTH='" . $anhth . "' WHERE MaTH ='$_GET[MaTH]'";
		$sql = "SELECT * FROM ThuongHieu WHERE MaTH = '$_GET[MaTH]' LIMIT 1";

		// $sql_update = "UPDATE ThuongHieu SET  TenTH='$tenth',`AnhTH`='$anhth' WHERE MaTH='".$_GET['MaTH']."'";
		// $sql = "SELECT * FROM ThuongHieu WHERE MaTH = '".$_GET['MaTH']."' LIMIT 1";
		$query = mysqli_query($mysqli, $sql);
		
		while ($row = mysqli_fetch_array($query)) {
			
			unlink('uploads/' . $row['AnhTH']);
		}
	}

	else {
		$sql_update = "UPDATE ThuongHieu SET  TenTH='" . $tenth . "',AnhTH='" . $anhth . "' WHERE MaTH='$_GET[MaTH]'";
		// $sql_update = "UPDATE ThuongHieu SET  TenTH='$tenth',`AnhTH`='$anhth' WHERE MaTH='".$_GET['MaTH']."'";

	}
	if(mysqli_query($mysqli, $sql_update)===TRUE){

		echo"<script type='text/javascript'>
		alert('Cập nhật thương hiệu thành công!');
		document.location='../../index.php?action=quanlythuonghieu&query=danhsach';
	</script>";

	}else{
		echo"<script type='text/javascript'>
		alert('Cập nhật thương hiệu không thành công!');
		document.location='../../index.php?action=quanlythuonghieu&query=danhsach';
	</script>";
	}
	// mysqli_query($mysqli, $sql_update);
	// header('Location:../../index.php?action=quanlythuonghieu&query=danhsach');
}
else {
	$ma = $_GET['MaTH'];
	$sql_xoa = "DELETE FROM ThuongHieu WHERE MaTH='$ma'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:../../index.php?action=quanlythuonghieu&query=danhsach');
}
?>