<?php
$sql_sua_loaisp = "SELECT * FROM LoaiSPC WHERE MaLSPC='$_GET[MaLSPC]' LIMIT 1";
$query_sua_loaisp = mysqli_query($mysqli, $sql_sua_loaisp);
?>
<div class="add_product">
	<p>Sửa loại sản phẩm</p>
	<div class="grid_add_product">
		<table class="table_add_product"  style="border-collapse: collapse">
			<form method="POST" action="modules/quanlyloaispct/xuly.php?MaLSPC=<?php echo $_GET['MaLSPC'] ?>">
				<?php
				while ($dong = mysqli_fetch_array($query_sua_loaisp)) {
				?>
					<!-- <tr>
					<td>Mã loại sản phẩm</td>
					<td><input type="text" value="<?php echo $dong['MaLSP'] ?>"name="Ma_LSP"></td>
				</tr> -->
				<tr>
					<td>Loại sản phẩm</td>
					<td>
					<select name="loaisanpham">
								<?php
								$sql_loaisanpham = "SELECT * FROM LoaiSP ORDER BY MaLSP ASC";
								$query_loaisanpham = mysqli_query($mysqli, $sql_loaisanpham);
								while ($row_loaisanpham = mysqli_fetch_array($query_loaisanpham)) {
									if ($row_loaisanpham['MaLSP'] == $dong['MaLSP']) {
								?>
										<option selected value="<?php echo $row_loaisanpham['MaLSP'] ?>"><?php echo $row_loaisanpham['TenLSP'] ?></option>
									<?php
									} else {
									?>
										<option value="<?php echo $row_loaisanpham['MaLSP'] ?>"><?php echo $row_loaisanpham['TenLSP'] ?></option>
								<?php
									}
								}
								?>
							</select>
					</td>
				</tr>
					<tr>
						<td>Tên loại sản phẩm cụ thể</td>
						<td><input type="text" value="<?php echo $dong['TenLSPC'] ?>" name="TenLSPC"></td>
					</tr>

					<tr>
						<td>Mô tả loại sản phẩm cụ thể</td>
						<td><textarea rows="5" name="MoTaLSPC" ><?php echo $dong['MoTaLSPC'] ?></textarea></td>
					</tr>
					<tr>
					<td colspan="2" >
						<div class="table_td"><input class="add_submit_thoat" type="submit" name="" value="Huỷ">
						<input class="add_submit" type="submit" name="sualoaispct" value="Lưu"></div></td>
				</tr>
				<?php
				}
				?>
			</form>
		</table>
	</div>
</div>