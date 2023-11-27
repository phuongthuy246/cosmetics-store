<?php
$sql_lietke_kh = "SELECT * FROM BinhLuan, ThanhVien, SanPham, DanhGia WHERE BinhLuan.MaTV=ThanhVien.MaTV AND BinhLuan.MaSP=SanPham.MaSP AND DanhGia.MaBL=BinhLuan.MaBL  ORDER BY BinhLuan.MaBL DESC";
$query_lietke_kh = mysqli_query($mysqli, $sql_lietke_kh);
?>
<div class="list_product">
	<p>Danh sách bình luận</p>
	<div class="list_product_btn">
		<form class="list_form_search" action="?action=quanlykh&query=timkiem" method="POST">
			<div class="product_btn_search">
				<input type="text"class="product_search_input"placeholder="Tìm kiếm bình luận..."name="keyword"style="border-right: none;"	/>
				<button class="btn_submit" type="submit" name="search" value="Tìm kiếm"><i class="fas fa-search"></i></button>
			</div>
		</form>	
		<!-- <button class="list_btn_add"><a class="btn_sub" href="?action=quanlykh&query=them"><i class="them_icon fas fa-plus"></i>Thêm mới</a></button> -->
	</div>
	<!-- <button class="btn_add"><a class="btn_sub" href="?action=quanlyloaisanpham&query=them"><i class="them_icon fas fa-plus"></i>Thêm loại sản phẩm</a></button> -->
	<table class="table_product"  style="border-collapse: collapse">
		<tr class="table_head">
			<th>STT</th>
			<th>Tên khách hàng</th>
			<th style="width: 456px;">Nội dung bình luận</th>
			<th style="width: 360px;">Sản phẩm</th>
			<th>Số sao</th>
		</tr>
		<?php
		$i = 0;
		while ($row = mysqli_fetch_array($query_lietke_kh)) {
			$i++;
		?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['TenTV'] ?></td>
				<td><?php echo $row['NoiDungBL'] ?></td>
				<td><?php echo $row['TenSP'] ?></td>
				<td><?php echo $row['SoSao'] ?></td>
				<td>
					<!-- <a class="table_sua" href="?action=quanlyloaisanpham&query=sua&MaLSP=<?php echo $row['MaLSP'] ?>"><i class="them_icon fas fa-edit"></i>Sửa</a> -->
				
					<!-- <a class="table_del" onclick="return Del('<?php echo $row['TenTV'] ?>')" href="modules/quanlyloaisp/xuly.php?MaLSP=<?php echo $row['MaLSP'] ?>"><i class="them_icon fas fa-trash-alt"></i>Xoá</a> -->
				</td>
				
			</tr>
		<?php
		}
		?>
	</table>
</div>
<script>
	function Del(name) {
		return confirm("Bạn chắc chắn muốn xoá loại sản phẩm: " + name + "?");
	}
</script>