<?php
if(isset($_POST['search'])){
	$keyword = $_POST['keyword'];
}
$sql_lietke_th = "SELECT * FROM ThuongHieu WHERE TenTH LIKE '%".$keyword."%'";
$query_lietke_th = mysqli_query($mysqli, $sql_lietke_th);
?>
<div class="list_product">
	<p>Danh sách thương hiệu</p>
	<div class="list_product_btn">
		<form class="list_form_search" action="?action=quanlythuonghieu&query=timkiem" method="POST">
			<div class="product_btn_search">
				<input type="text"class="product_search_input"placeholder="Tìm kiếm thương hiệu..."name="keyword"style="border-right: none;"	/>
				<button class="btn_submit" type="submit" name="search" value="Tìm kiếm"><i class="fas fa-search"></i></button>
			</div>
		</form>	
		<button class="list_btn_add"><a class="btn_sub" href="?action=quanlythuonghieu&query=them"><i class="them_icon fas fa-plus"></i>Thêm mới</a></button>
	</div>
	<table class="table_product"  style="border-collapse: collapse">
		<tr class="table_head">
			<th>STT</th>
			<th>Mã thương hiệu</th>
			<th>Tên thương hiệu</th>
			<th>Ảnh thương hiệu</th>
			<th>Thao tác</th>
		</tr>
		<?php
		$i = 0;
		while ($row = mysqli_fetch_array($query_lietke_th)) {
			$i++;
		?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['MaTH'] ?></td>
				<td><?php echo $row['TenTH'] ?></td>
				<td><img src="modules/quanlyth/uploads/<?php echo $row['AnhTH']?>" width="150px"></td>
				<td>
					<a class="table_sua" href="?action=quanlythuonghieu&query=sua&MaTH=<?php echo $row['MaTH'] ?>"><i class="them_icon fas fa-edit"></i>Sửa</a>
				
					<a class="table_del" onclick="return Del('<?php echo $row['TenTH'] ?>')" href="modules/quanlyth/xuly.php?MaTH=<?php echo $row['MaTH'] ?>"><i class="them_icon fas fa-trash-alt"></i>Xoá</a>
				</td>
				
			</tr>
		<?php
		}
		?>
	</table>
</div>
<script>
	function Del(name){
		return confirm("Bạn chắc chắn muốn xoá sản phẩm: " + name + "?");
	}
</script>

