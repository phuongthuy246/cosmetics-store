<?php
$sql_lietke_dh = "SELECT * FROM Gio_Hang,Khach_Hang WHERE Gio_Hang.ID_KH=Khach_Hang.ID_KH ORDER BY Gio_Hang.ID_GH DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<div class="list_product">
	<p>Danh sách đơn hàng</p>
	<table class="table_product" border="1" style="border-collapse: collapse">
		<tr class="table_head">
			<th>STT</th>
			<th>Mã đơn hàng</th>
			<th>Tên khách hàng</th>
			<th>Địa chỉ</th>
			<th>Email</th>
			<th>Số điện thoại</th>
			<th>Tình trạng</th>
			<th>Ngày đặt</th>
			<th></th>
			f
		</tr>
		<?php
		$i = 0;
		while ($row = mysqli_fetch_array($query_lietke_dh)) {
			$i++;
		?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $row['Ma_GH'] ?></td>
				<td><?php echo $row['HoTen_KH'] ?></td>
				<td><?php echo $row['DiaChi_KH'] ?></td>
				<td><?php echo $row['Email_KH'] ?></td>
				<td><?php echo $row['SDT_KH'] ?></td>
				<td>
					<?php if ($row['TrangThai'] == 1) {
						echo '<a  href="modules/quanlydonhang/xuly.php?code=' . $row['Ma_GH'] . '" style="color:#04ad57;">Đơn hàng mới</a>';
					} else {
						echo 'Đã xử lý';
					}

					?>

				</td>
				<td><?php echo $row['NgayDat'] ?></td>
				<td>
					<a href="index.php?action=sanpham&query=xemdonhang&code=<?php echo $row['Ma_GH'] ?>" style="color:#1961ad;">Xem đơn hàng</a>
				</td>

			</tr>
		<?php
		}
		?>
	</table>
</div>