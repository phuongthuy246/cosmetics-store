<?php

if(isset($_POST['search'])){
	$keyword = $_POST['keyword'];
}
$sql_lietke_sp = "SELECT * FROM SanPham, LoaiSPC, ThuongHieu WHERE SanPham.MaLSPC=LoaiSPC.MaLSPC AND SanPham.MaTH= ThuongHieu.MaTH AND SanPham.TenSP LIKE '%".$keyword."%'";
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>
<div class="list_product">
	<p>Danh sách sản phẩm</p>
	<div class="list_product_btn">
		<form class="list_form_search" action="?action=quanlysanpham&query=timkiem" method="POST">
			<div class="product_btn_search">
				<input type="text"class="product_search_input"placeholder="Tìm kiếm sản phẩm..."name="keyword"style="border-right: none;"	/>
				<button class="btn_submit" type="submit" name="search" value="Tìm kiếm"><i class="fas fa-search"></i></button>
			</div>
		</form>	
		<button class="list_btn_add"><a class="btn_sub" href="?action=quanlysanpham&query=them"><i class="them_icon fas fa-plus"></i>Thêm mới</a></button>
	</div>
	<table class="table_product"  style="border-collapse: collapse">
  		<tr class="table_head">
			<th>STT</th>
			<th>Mã sản phẩm</th>
			<th>Tên sản phẩm</th>
			<th>Ảnh sản phẩm</th>
			<th>Giá sản phẩm</th>
			<th>Số lượng</th>
			<th>Loại sản phẩm</th>
			<th>Thương hiệu</th>
			<th>Thao tác</th>
  		</tr>
		<?php
		$i = 0;
		while($row = mysqli_fetch_array($query_lietke_sp)){
			$i++;
			?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $row['MaSP']?></td>
			<td style="width: 200px;"><?php echo $row['TenSP']?></tdstyle=>
			<td><img src="modules/quanlysp/uploads/<?php echo $row['AnhSP']?>" width="150px"></td>
			
			<td><?php echo number_format ($row['GiaSP'],0,',','.').'đ'?></td>
			<td><?php echo $row['SoLuongSP']?></td>
			<td><?php echo $row['TenLSPC']?></td>
			<td><?php echo $row['TenTH']?></td>
			<td>
				<a class="table_sua" href="?action=quanlysanpham&query=sua&MaSP=<?php echo $row['MaSP']?>">Sửa</a>
				<a class="table_del" onclick="return Del('<?php echo $row['TenSP']?>')" href="modules/quanlysp/xuly.php?MaSP=<?php echo $row['MaSP']?>">Xoá</a>
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

				
