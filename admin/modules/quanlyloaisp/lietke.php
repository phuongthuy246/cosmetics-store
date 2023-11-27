<?php
$sql_lietke_loaisp = "SELECT * FROM LoaiSP ORDER BY MaLSP ASC";
$query_lietke_loaisp = mysqli_query($mysqli, $sql_lietke_loaisp);
?>
<div class="list_product">
	<p>Danh sách loại sản phẩm</p>
	<div class="list_product_btn">
		<form class="list_form_search" action="?action=quanlysanpham&query=timkiem" method="POST">
			<div class="product_btn_search">
				<input type="text"class="product_search_input"placeholder="Tìm kiếm loại sản phẩm..."name="keyword"style="border-right: none;"	/>
				<button class="btn_submit" type="submit" name="search" value="Tìm kiếm"><i class="fas fa-search"></i></button>
			</div>
		</form>	
		<button class="list_btn_add"><a class="btn_sub" href="?action=quanlyloaisanpham&query=them"><i class="them_icon fas fa-plus"></i>Thêm mới</a></button>
	</div>
	<!-- <button class="btn_add"><a class="btn_sub" href="?action=quanlyloaisanpham&query=them"><i class="them_icon fas fa-plus"></i>Thêm loại sản phẩm</a></button> -->
	<table class="table_product"  style="border-collapse: collapse">
		<tr class="table_head">
			<th>STT</th>
			<th>Mã loại sản phẩm</th>
			<th>Tên loại sản phẩm</th>
			<th>Mô tả loại sản phẩm</th>
			<th>Thao tác</th>
		</tr>
		<?php
		$i = 0;
		while ($row = mysqli_fetch_array($query_lietke_loaisp)) {
			$i++;
		?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['MaLSP'] ?></td>
				<td><?php echo $row['TenLSP'] ?></td>
				<td><?php echo $row['MoTaLSP'] ?></td>
				<td>
					<a class="table_sua" href="?action=quanlyloaisanpham&query=sua&MaLSP=<?php echo $row['MaLSP'] ?>"><i class="them_icon fas fa-edit"></i>Sửa</a>
				
					<a class="table_del" onclick="return Del('<?php echo $row['TenLSP'] ?>')" href="modules/quanlyloaisp/xuly.php?MaLSP=<?php echo $row['MaLSP'] ?>"><i class="them_icon fas fa-trash-alt"></i>Xoá</a>
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