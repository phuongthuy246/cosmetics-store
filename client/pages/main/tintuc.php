<?php
$sql_loaisanpham = "SELECT * FROM LoaiSP ORDER BY MaLSP ASC";
$query_loaisanpham = mysqli_query($mysqli, $sql_loaisanpham);
?>
<?php
$sql_tt = "SELECT * FROM TinTuc WHERE TinTuc.MaLTT = '$_GET[ma]' ORDER BY MaTT ASC";
$query_tt = mysqli_query($mysqli, $sql_tt);
?>
<?php
$sql_ltt = "SELECT * FROM LoaiTT WHERE  LoaiTT.MaLTT ='$_GET[ma]' LIMIT 1 ";
$query_ltt = mysqli_query($mysqli, $sql_ltt);
$row_ltt = mysqli_fetch_array($query_ltt);
?>
 <div class="nav">
 	<a class="nav_link" href="../client/index.php">Trang chủ</a>
 	<i class="nav_icon fas fa-chevron-right"></i>
 	<a class="nav_link" href=""><?php echo $row_ltt['TenLTT'] ?></a>
 	
 </div>
<div class="tintuc__container">
	<div class="tintuc__sidebar">
		<h1 class="tintuc__title">DANH MỤC SẢN PHẨM</h1>
		<?php
		while ($row_loaisanpham = mysqli_fetch_array($query_loaisanpham)) {
		?>
		<div class="tintuc__parent">
		
			<a href=""><i class="fas fa-angle-right"></i><?php echo $row_loaisanpham['TenLSP']?>
			</a>
			<?php
			$sql_loaispct = "SELECT * FROM LoaiSPC WHERE LoaiSPC.MaLSP = '".$row_loaisanpham['MaLSP']."' ORDER BY MaLSPC ASC ";
			$query_loaispct = mysqli_query($mysqli, $sql_loaispct);
			?>
			<?php
			while ($row_loaispct = mysqli_fetch_array($query_loaispct)) {
			?>
			<a class="tintuc__child" href="index.php?quanly=loaisanpham&ma=<?php echo $row_loaispct['MaLSPC']?>"><i class="fas fa-caret-right"></i><?php echo $row_loaispct['TenLSPC']?></a>
			<?php
			}
			?>
		</div>
		<?php
		}?>
		
	</div>
	<div class="tintuc__main">
	<div class="tintuc__main__grid">
		<div class="tintuc__box">
			<h1 class="tintuc__grid_title"><?php echo $row_ltt['TenLTT'] ?></h1>
		</div>
		<?php
		while ($row_tt = mysqli_fetch_array($query_tt)) {
		?>
		<div class="tintuc__content">
		
			<img class="tintuc__img" src="../admin/modules/quanlytt/uploads/<?php echo $row_tt['AnhTT'] ?>" />
			<div class="tintuc__item">
				<a class="tintuc__item_link" href="http://"><h1 class="tintuc__name"><?php echo $row_tt['TenTT'] ?>
				</h1></a>
				<p class="tintuc__ngay"> <?php echo $row_tt['NgayTT'] ?></p>
				<p class="tintuc__mota"><?php echo $row_tt['MoTaTT'] ?>
				</p>
				<a class="tintuc__btn" href="">Xem tiếp</a>
			</div>
		
		</div>
		<?php 
		}
		?>
	</div>
		
	</div>
</div>
