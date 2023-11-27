

<?php

$sql_pro = "SELECT * FROM ThuongHieu ORDER BY RAND() LIMIT 6";
$query_pro = mysqli_query($mysqli, $sql_pro);

?>
<div class="newarrival">
	<h5 class="newarrival_title">THƯƠNG HIỆU NỔI BẬT</h5>
</div>
<ul class="products">
<?php
    while ($row = mysqli_fetch_array($query_pro)) {
    ?>
	
		<div class="product_item_th">
			<div class="product_top_th">
					<img src="../admin/modules/quanlyth/uploads/<?php echo $row['AnhTH'] ?>" />
				</a>
			</div>
			
		</div>
	
	<?php
    }
    ?>c
	
</ul>
<?php

$sql_pro = "SELECT * FROM SanPham,LoaiSPC,ThuongHieu WHERE SanPham.MaLSPC = LoaiSPC.MaLSPC AND SanPham.MaTH = ThuongHieu.MaTH ORDER BY RAND() LIMIT 10";
$query_pro = mysqli_query($mysqli, $sql_pro);

?>
<div class="newarrival">
	<h5 class="newarrival_title">SẢN PHẨM NỔI BẬT</h5>
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
				<div class="product_price"><?php echo number_format($row['GiaSP'], 0, ',', '.') . 'đ' ?></div>
				<div class="product_id"><?php echo $row['TenTH'] ?></div>
				<h2 href="index.php?quanly=sanpham&ma=<?php echo $row['Ma_SP'] ?>" class="product_name">
				<?php echo $row['TenSP'] ?>
				</h2>
			</div>
		</div>
	</li>
	<?php
    }
    ?>
	
</ul>
