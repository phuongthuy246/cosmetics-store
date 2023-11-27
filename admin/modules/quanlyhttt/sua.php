<?php
$sql_sua_loaisp = "SELECT * FROM HinhThucThanhToan WHERE MaHTTT='$_GET[MaHTTT]' LIMIT 1";
$query_sua_loaisp = mysqli_query($mysqli, $sql_sua_loaisp);
?>
<div class="add_product">
	<p>Sửa hình thức thanh toán</p>
	<div class="grid_add_product">
		<table class="table_add_product"  style="border-collapse: collapse">
			<form method="POST" action="modules/quanlyhttt/xuly.php?MaHTTT=<?php echo $_GET['MaHTTT'] ?>">
				<?php
				while ($dong = mysqli_fetch_array($query_sua_loaisp)) {
				?>
					<!-- <tr>
					<td>Mã loại sản phẩm</td>
					<td><input type="text" value="<?php echo $dong['MaLSP'] ?>"name="Ma_LSP"></td>
				</tr> -->
					<tr>
						<td>Tên hình thức thanh toán</td>
						<td><input type="text" value="<?php echo $dong['TenHTTT'] ?>" name="TenHTTT"></td>
					</tr>

					
					<tr>
					<td colspan="2" >
						<div class="table_td">
							<input class="add_submit_thoat" type="reset" name="" value="Huỷ">
						<input class="add_submit" type="submit" name="suahttt" value="Lưu"></div></td>
				</tr>
				<?php
				}
				?>
			</form>
		</table>
	</div>
</div>