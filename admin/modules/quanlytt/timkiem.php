<?php
if(isset($_POST['search'])){
	$keyword = $_POST['keyword'];
}
$sql_lietke_tt = "SELECT * FROM TinTuc,LoaiTT WHERE TinTuc.MaLTT=LoaiTT.MaLTT AND TinTuc.TenTT LIKE '%".$keyword."%'";
$query_lietke_tt = mysqli_query($mysqli, $sql_lietke_tt);
?>
<div class="list_product">
	<p>Danh sách tin tức</p>
	<div class="list_product_btn">
		<form class="list_form_search" action="?action=quanlytintuc&query=timkiem" method="POST">
			<div class="product_btn_search">
				<input type="text"class="product_search_input"placeholder="Tìm kiếm tin tức..."name="keyword"style="border-right: none;"	/>
				<button class="btn_submit" type="submit" name="search" value="Tìm kiếm"><i class="fas fa-search"></i></button>
			</div>
		</form>	
		<button class="list_btn_add"><a class="btn_sub" href="?action=quanlytintuc&query=them"><i class="them_icon fas fa-plus"></i>Thêm mới</a></button>
	</div>
	<!-- <button class="btn_add"><a class="btn_sub" href="?action=quanlyloaisanpham&query=them"><i class="them_icon fas fa-plus"></i>Thêm loại sản phẩm</a></button> -->
	<table class="table_product"  style="border-collapse: collapse">
		<tr class="table_head">
			<th>STT</th>
			<th>Mã tin tức</th>
			<th>Tên tin tức</th>
			<!-- <th>Mô tả tin tức</th> -->
			<!-- <th>Nội dung tin tức</th> -->
			<th>Hình ảnh</th>
			<th>Loại tin tức</th>
			<th>Thao tác</th>

		</tr>
		<?php
		$i = 0;
		while ($row = mysqli_fetch_array($query_lietke_tt)) {
			$i++;
		?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['MaTT'] ?></td>
				<td style="width: 230px;"><?php echo $row['TenTT'] ?></td>
				<!-- <td><?php echo $row['MoTaTT'] ?></td> -->
				<!-- <td><?php echo $row['NoiDungTT'] ?></td> -->
				<td><img src="modules/quanlytt/uploads/<?php echo $row['AnhTT']?>" width="150px"></td>
				<td><?php echo $row['TenLTT'] ?></td>
				<td>
					<a class="table_sua" href="?action=quanlytintuc&query=sua&MaTT=<?php echo $row['MaTT'] ?>"><i class="them_icon fas fa-edit"></i>Sửa</a>
				
					<a class="table_del" onclick="return Del('<?php echo $row['TenTT'] ?>')" href="modules/quanlytt/xuly.php?MaTT=<?php echo $row['MaTT'] ?>"><i class="them_icon fas fa-trash-alt"></i>Xoá</a>
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

