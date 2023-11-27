
<?php
if(isset($_POST['timkiem'])){
	$tukhoa = $_POST['tukhoa'];
}
$sql_pro = "SELECT * FROM SanPham, LoaiSPC, ThuongHieu WHERE SanPham.MaLSPC = LoaiSPC.MaLSPC AND SanPham.MaTH= ThuongHieu.MaTH AND SanPham.TenSP LIKE '%".$tukhoa."%' ";
$query_pro = mysqli_query($mysqli, $sql_pro);
// $row_title = mysqli_fetch_array($query_pro);
?>
<div class="nav">
 	<a class="nav_link" href="../client/index.php">Trang chủ</a>
 	<i class="nav_icon fas fa-chevron-right"></i>
 	<a class="nav_link" href="">Từ khoá</a>
	<i class="nav_icon fas fa-chevron-right"></i>
 	<a class="nav_link" href=""><?php echo $_POST['tukhoa'] ?></a>
 	
 </div>
<ul class="products">
<?php
while ($row = mysqli_fetch_array($query_pro)) {
?>
	<li>
		<div class="product_item">
			<div class="product_top">
				<a href="index.php?quanly=sanpham&ma=<?php echo $row['MaSP'] ?>" class="product_thumb">
					<img src="../admin/modules/quanlysp/uploads/<?php echo $row['AnhSP'] ?>" />
				</a>
			</div>
			<div class="product_infor">
				<div class="product_price"><?php echo number_format ($row['GiaSP'],0,',','.').'đ' ?></div>
				<div class="product_id"><?php echo $row['TenTH'] ?></div>
				<h2 href="index.php?quanly=sanpham&ma=<?php echo $row['MaSP'] ?>" class="product_name">
				<?php echo $row['TenSP'] ?>
				</h2>
			</div>
		</div>
	</li>
	<?php
}
?>
</ul>
