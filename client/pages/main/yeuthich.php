<?php
$user = (isset($_SESSION['dangky'])) ? $_SESSION['dangky'] : [];
$sql_pro = "SELECT * FROM SanPham, SanPhamYeuThich, ThanhVien WHERE SanPhamYeuThich.MaSP = SanPham.MaSP AND SanPhamYeuThich.MaTV= ThanhVien.MaTV AND SanPhamYeuThich.MaTV='".$user['MaTV']."' ORDER BY SanPhamYeuThich.MaSP ASC" ;
$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<?php
$sql_cate = "SELECT * FROM LoaiSPC,LoaiSP WHERE LoaiSPC.MaLSP=LoaiSP.MaLSP AND LoaiSPC.MaLSPC ='$_GET[ma]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<div class="nav">
 	<a class="nav_link" href="../client/index.php">Trang chủ</a>
 	<i class="nav_icon fas fa-chevron-right"></i>
 	<a class="nav_link" href="">Sản phẩm yêu thích</a>

 	
 </div>
<ul class="products">
<?php
while ($row_pro = mysqli_fetch_array($query_pro)) {
?>
	<li>
		<div class="product_item">
			<div class="product_top">
				<a href="index.php?quanly=sanpham&ma=<?php echo $row_pro['MaSP'] ?>" class="product_thumb">
					<img src="../admin/modules/quanlysp/uploads/<?php echo $row_pro['AnhSP'] ?>" />
				</a>
			</div>
			<div class="product_infor">
				<div class="product_price"><?php echo number_format ($row_pro['GiaSP'],0,',','.').'đ' ?></div>
				<div class="product_id"><?php echo $row_pro['TenTH'] ?></div>
				<h2 href="index.php?quanly=sanpham&ma=<?php echo $row['MaSP'] ?>" class="product_name">
				<?php echo $row_pro['TenSP'] ?>
				</h2>
			</div>
		</div>
	</li>
	<?php
}
?>
</ul>
