
<?php
$sql_lietke_dh = "SELECT * FROM DonHang,ThanhVien,HinhThucThanhToan,PhuongThucVanCHuyen WHERE DonHang.MaTV=ThanhVien.MaTV AND DonHang.MaHTTT=HinhThucThanhToan.MaHTTT AND DonHang.MaPT=PhuongThucVanChuyen.MaPT ORDER BY DonHang.MaDH DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<div class="list_product">
	<p>Danh sách đơn hàng</p>
	<div class="list_product_btn">
		<form class="list_form_search" action="?action=quanlykh&query=timkiem" method="POST">
			<div class="product_btn_search">
				<input type="text"class="product_search_input"placeholder="Tìm kiếm đơn hàng..."name="keyword"style="border-right: none;"	/>
				<button class="btn_submit" type="submit" name="search" value="Tìm kiếm"><i class="fas fa-search"></i></button>
			</div>
		</form>	
		<!-- <button class="list_btn_add"><a class="btn_sub" href="?action=quanlykh&query=them"><i class="them_icon fas fa-plus"></i>Thêm mới</a></button> -->
	</div>
	<!-- <button class="btn_add"><a class="btn_sub" href="?action=quanlyloaisanpham&query=them"><i class="them_icon fas fa-plus"></i>Thêm loại sản phẩm</a></button> -->
	<table class="table_product"  style="border-collapse: collapse">
		<tr class="table_head">
			<th>STT</th>
			<th>Mã đơn hàng</th>
			<th>Tên khách hàng</th>
			<th>Số điện thoại</th>
			<th style="width: 250px;">Địa chỉ</th>
			<th>Hình thức thanh toán</th>
			<th>Hình thức vận chuyển</th>
			<th>Tình trạng</th>
			<th>Ngày đặt</th>
			<th></th>
		</tr>
		<?php
		$i = 0;
		while ($row = mysqli_fetch_array($query_lietke_dh)) {
			$i++;
		?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $row['MaDH'] ?></td>
				<td><?php echo $row['TenTV'] ?></td>
				<td><?php echo $row['SDTTV'] ?></td>
				<td><?php echo $row['DiaChiTV'] ?></td>
				<td><?php echo $row['TenHTTT'] ?></td>
				<td><?php echo $row['TenPT'] ?></td>
				
				<td><select name="cars" id="cars" style="color: #257506;height: 29px;border: 1px solid #d2d2d2;border-radius: 3px;">
				<option value="volvo">Chờ xác nhận </option>
				<option value="volvo">Đã xác nhận </option>
				<option value="saab">Đang giao</option>
				<option value="mercedes">Đã giao</option>
				<option value="audi">Huỷ đơn hàng</option>
				</select></td>
				<td><?php echo $row['NgayDat'] ?></td>
				<td><a href="?action=quanlydh&query=xemdonhang" style="color: var(--pink-color);    padding-left: 3px;text-decoration: none;">Xem đơn hàng</a></td>
				
				
			</tr>
		<?php } ?>
	
	</table>
</div>
<script>
	function Del(name) {
		return confirm("Bạn chắc chắn muốn xoá loại sản phẩm: " + name + "?");
	}
</script>