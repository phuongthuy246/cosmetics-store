<?php
if(isset($_POST['search'])){
	$keyword = $_POST['keyword'];
}
$sql_lietke_loaispct = "SELECT * FROM LoaiSPC,LoaiSP WHERE LoaiSPC.MaLSP=LoaiSP.MaLSP AND LoaiSPC.TenLSPC LIKE '%".$keyword."%'";
$query_lietke_loaispct = mysqli_query($mysqli, $sql_lietke_loaispct);
?>
<div class="list_product">
	<p>Danh sách loại sản phẩm cụ thể</p>
	<div class="list_product_btn">
		<form class="list_form_search" action="?action=quanlyloaisanphamct&query=timkiem" method="POST">
			<div class="product_btn_search">
				<input type="text"class="product_search_input"placeholder="Tìm kiếm ..."name="keyword"style="border-right: none;"	/>
				<button class="btn_submit" type="submit" name="search" value="Tìm kiếm"><i class="fas fa-search"></i></button>
			</div>
		</form>	
		<button class="list_btn_add"><a class="btn_sub" href="?action=quanlyloaisanphamct&query=them"><i class="them_icon fas fa-plus"></i>Thêm mới</a></button>
	</div>
	<table class="table_product"  style="border-collapse: collapse">
		<tr class="table_head">
			<th>STT</th>
			<th>Mã loại sản phẩm cụ thể</th>
			<th>Tên loại sản phẩm cụ thể</th>
			<th>Mô tả loại sản phẩm cụ thể</th>
			<th>Loại sản phẩm</th>
			<th>Thao tác</th>
		</tr>
		<?php
		$i = 0;
		while ($row = mysqli_fetch_array($query_lietke_loaispct)) {
			$i++;
		?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['MaLSPC'] ?></td>
				<td><?php echo $row['TenLSPC'] ?></td>
				<td><?php echo $row['MoTaLSPC'] ?></td>
				<td><?php echo $row['TenLSP'] ?></td>
				<td>
					<a class="table_sua" href="?action=quanlyloaisanphamct&query=sua&MaLSPC=<?php echo $row['MaLSPC'] ?>"><i class="them_icon fas fa-edit"></i>Sửa</a>
				
					<a class="table_del" onclick="return Del('<?php echo $row['TenLSPC'] ?>')" href="modules/quanlyloaispct/xuly.php?MaLSPC=<?php echo $row['MaLSPC'] ?>"><i class="them_icon fas fa-trash-alt"></i>Xoá</a>
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

