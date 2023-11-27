<?php
$code = $_GET['code'];
$sql_lietke_dh = "SELECT * FROM Chi_Tiet_GH,San_Pham WHERE Chi_Tiet_GH.Ma_SP=San_Pham.Ma_SP AND Chi_Tiet_GH.Ma_GH='" . $code . "' ORDER BY Chi_Tiet_GH.ID_CT DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<div class="list_product">
	<p>Thông tin đơn hàng</p>
	<table class="table_product" border="1" style="border-collapse: collapse">
		<tr class="table_head">
			<th>STT</th>
			<th>Mã đơn hàng</th>
			<th>Tên sản phẩm</th>
			<th>Số lượng</th>
			<th>Đơn giá</th>
			<th>Thành tiền</th>

		</tr>
		<?php
		$i = 0;
		$tongtien = 0;
		while ($row = mysqli_fetch_array($query_lietke_dh)) {
			$i++;
			$thanhtien = $row['Gia_SP'] * $row['SoLuong'];
			$tongtien += $thanhtien;
		?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $row['Ma_GH'] ?></td>
				<td><?php echo $row['Ten_SP'] ?></td>
				<td><?php echo $row['SoLuong'] ?></td>
				<td><?php echo number_format($row['Gia_SP'], 0, ',', '.') . 'đ'; ?></td>
				<td><?php echo number_format($thanhtien, 0, ',', '.') . 'đ'; ?></td>



			</tr>
		<?php
		}
		?>
		<tr>
			<td colspan="6">
				<p>Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . 'đ'; ?>
			</td>
		</tr>
	</table>
</div>