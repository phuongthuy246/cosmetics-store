<?php
$sql_lietke_loaisp = "SELECT * FROM PhuongThucVanChuyen ORDER BY MaPT ASC";
$query_lietke_loaisp = mysqli_query($mysqli, $sql_lietke_loaisp);
?>
<div class="list_product">
	<p>Danh sách hình thức vận chuyển</p>
	<div class="list_product_btn">
		<form class="list_form_search" action="?action=quanlyptvc&query=timkiem" method="POST">
			<div class="product_btn_search">
				<input type="text"class="product_search_input"placeholder="Tìm kiếm..."name="keyword"style="border-right: none;"	/>
				<button class="btn_submit" type="submit" name="search" value="Tìm kiếm"><i class="fas fa-search"></i></button>
			</div>
		</form>	
		<button class="list_btn_add"><a class="btn_sub" href="?action=quanlyptvc&query=them"><i class="them_icon fas fa-plus"></i>Thêm mới</a></button>
	</div>
	<!-- <button class="btn_add"><a class="btn_sub" href="?action=quanlyloaisanpham&query=them"><i class="them_icon fas fa-plus"></i>Thêm loại sản phẩm</a></button> -->
	<table class="table_product"  style="border-collapse: collapse">
		<tr class="table_head">
			<th>STT</th>
			<th>Mã hình thức vận chuyển</th>
			<th>Tên hình thức vận chuyển</th>
			<th>Giá tiền</th>
			<th>Thao tác</th>
		</tr>
		<?php
		$i = 0;
		while ($row = mysqli_fetch_array($query_lietke_loaisp)) {
			$i++;
		?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['MaPT'] ?></td>
				<td><?php echo $row['TenPT'] ?></td>
				<td><?php echo number_format ($row['GiaPT'],0,',','.').'đ'?></td>
				<td>
					<a class="table_sua" href="?action=quanlyptvc&query=sua&MaPT=<?php echo $row['MaPT'] ?>"><i class="them_icon fas fa-edit"></i>Sửa</a>
				
					<a class="table_del" onclick="return Del('<?php echo $row['TenPT'] ?>')" href="modules/quanlyptvc/xuly.php?MaPT=<?php echo $row['MaPT'] ?>"><i class="them_icon fas fa-trash-alt"></i>Xoá</a>
				</td>
				
			</tr>
		<?php
		}
		?>
	</table>
</div>
<script>
	function Del(name) {
		return confirm("Bạn chắc chắn muốn xoá hình thức vận chuyển: " + name + "?");
	}
</script>