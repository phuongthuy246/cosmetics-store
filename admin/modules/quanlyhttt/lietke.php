<?php
$sql_lietke_loaisp = "SELECT * FROM HinhThucThanhToan ORDER BY MaHTTT ASC";
$query_lietke_loaisp = mysqli_query($mysqli, $sql_lietke_loaisp);
?>
<div class="list_product">
	<p>Danh sách hình thức thanh toán</p>
	<div class="list_product_btn">
		<form class="list_form_search" action="?action=quanlyhttt&query=timkiem" method="POST">
			<div class="product_btn_search">
				<input type="text"class="product_search_input"placeholder="Tìm kiếm..."name="keyword"style="border-right: none;"	/>
				<button class="btn_submit" type="submit" name="search" value="Tìm kiếm"><i class="fas fa-search"></i></button>
			</div>
		</form>	
		<button class="list_btn_add"><a class="btn_sub" href="?action=quanlyhttt&query=them"><i class="them_icon fas fa-plus"></i>Thêm mới</a></button>
	</div>
	<!-- <button class="btn_add"><a class="btn_sub" href="?action=quanlyloaisanpham&query=them"><i class="them_icon fas fa-plus"></i>Thêm loại sản phẩm</a></button> -->
	<table class="table_product"  style="border-collapse: collapse">
		<tr class="table_head">
			<th>STT</th>
			<th>Mã hình thức thanh toán</th>
			<th>Tên hình thức thanh toán</th>
			<th>Thao tác</th>
		</tr>
		<?php
		$i = 0;
		while ($row = mysqli_fetch_array($query_lietke_loaisp)) {
			$i++;
		?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['MaHTTT'] ?></td>
				<td><?php echo $row['TenHTTT'] ?></td>
				<td>
					<a class="table_sua" href="?action=quanlyhttt&query=sua&MaHTTT=<?php echo $row['MaHTTT'] ?>"><i class="them_icon fas fa-edit"></i>Sửa</a>
				
					<a class="table_del" onclick="return Del('<?php echo $row['TenHTTT'] ?>')" href="modules/quanlyhttt/xuly.php?MaHTTT=<?php echo $row['MaHTTT'] ?>"><i class="them_icon fas fa-trash-alt"></i>Xoá</a>
				</td>
				
			</tr>
		<?php
		}
		?>
	</table>
</div>
<script>
	function Del(name) {
		return confirm("Bạn chắc chắn muốn xoá hình thức thanh toán: " + name + "?");
	}
</script>