<?php
$sql_sua_loaisp = "SELECT * FROM PhuongThucVanChuyen WHERE MaPT='$_GET[MaPT]' LIMIT 1";
$query_sua_loaisp = mysqli_query($mysqli, $sql_sua_loaisp);
?>
<div class="add_product">
	<p>Sửa hình thức vận chuyển</p>
	<div class="grid_add_product">
		<table class="table_add_product"  style="border-collapse: collapse">
			<form method="POST" action="modules/quanlyptvc/xuly.php?MaPT=<?php echo $_GET['MaPT'] ?>">
				<?php
				while ($dong = mysqli_fetch_array($query_sua_loaisp)) {
				?>
					<!-- <tr>
					<td>Mã loại sản phẩm</td>
					<td><input type="text" value="<?php echo $dong['MaLSP'] ?>"name="Ma_LSP"></td>
				</tr> -->
					<tr><td>Tên hình thức vận chuyển</td>
						<td><input type="text" value="<?php echo $dong['TenPT'] ?>" name="TenPT"></td>
					</tr>

					<tr><td>Giá tiền</td>
						<td><input type="text" value="<?php echo $dong['GiaPT'] ?>" name="GiaPT"></td>
					</tr>
					<tr>
					<td colspan="2" >
						<div class="table_td">
							<input class="add_submit_thoat" type="reset" name="" value="Huỷ">
						<input class="add_submit" type="submit" name="suaptvc" value="Lưu"></div></td>
				</tr>
				<?php
				}
				?>
			</form>
		</table>
	</div>
</div>