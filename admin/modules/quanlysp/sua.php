<?php
$sql_sua_sp = "SELECT * FROM SanPham WHERE MaSP='$_GET[MaSP]' LIMIT 1";
$query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);
?>
<div class="add_product">
	<p>Sửa sản phẩm</p>
	<div class="grid_add_product">
		<table class="table_add_product" style="border-collapse: collapse">
			<?php
			while ($row = mysqli_fetch_array($query_sua_sp)) {
			?>
				<form method="POST" action="modules/quanlysp/xuly.php?MaSP=<?php echo $row['MaSP'] ?>" enctype="multipart/form-data">
					<tr>
						<td>Danh mục</td>
						<td>
							<select name="loaisanpham">
								<?php
								$sql_loaisanpham = "SELECT * FROM LoaiSPC ORDER BY MaLSPC ASC";
								$query_loaisanpham = mysqli_query($mysqli, $sql_loaisanpham);
								while ($row_loaisanpham = mysqli_fetch_array($query_loaisanpham)) {
									if ($row_loaisanpham['MaLSPC'] == $row['MaLSPC']) {
								?>
										<option selected value="<?php echo $row_loaisanpham['MaLSPC'] ?>"><?php echo $row_loaisanpham['TenLSPC'] ?></option>
									<?php
									} else {
									?>
										<option value="<?php echo $row_loaisanpham['MaLSPC'] ?>"><?php echo $row_loaisanpham['TenLSPC'] ?></option>
								<?php
									}
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Thương hiệu</td>
						<td>
							<select name="thuonghieu">
								<?php
								$sql_thuonghieu = "SELECT * FROM ThuongHieu ORDER BY MaTH ASC";
								$query_thuonghieu = mysqli_query($mysqli, $sql_thuonghieu);
								while ($row_thuonghieu = mysqli_fetch_array($query_thuonghieu)) {
									if ($row_thuonghieu['MaTH'] == $row['MaTH']) {
								?>
										<option selected value="<?php echo $row_thuonghieu['MaTH'] ?>"><?php echo $row_thuonghieu['TenTH'] ?></option>
									<?php
									} else {
									?>
										<option value="<?php echo $row_thuonghieu['MaTH'] ?>"><?php echo $row_thuonghieu['TenTH'] ?></option>
								<?php
									}
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Tên sản phẩm</td>
						<td><input type="text" value="<?php echo $row['TenSP'] ?>" name="TenSP"></td>
					</tr>
					<tr>
						<td>Ảnh sản phẩm</td>
						<td>
							<input type="file" name="AnhSP">
							<img src="modules/quanlysp/uploads/<?php echo $row['AnhSP'] ?>" width="150px">
						</td>
					</tr>
					<tr>
						<td>Giá sản phẩm</td>
						<td><input type="text" value="<?php echo $row['GiaSP'] ?>" name="GiaSP"></td>
					</tr>
					<tr>
						<td>Số lượng sản phẩm</td>
						<td><input type="text" value="<?php echo $row['SoLuongSP'] ?>" name="SoLuongSP"></td>
					</tr>
					<tr>
						<td>Thông tin sản phẩm</td>
						<td><textarea rows="5" name="ThongTinSP" style="resize: none"><?php echo $row['ThongTinSP'] ?></textarea></td>
					</tr>
					<tr>
						<td>Thành phần sản phẩm</td>
						<td><textarea rows="5" name="ThanhPhanSP" style="resize: none"><?php echo $row['ThanhPhanSP'] ?></textarea></td>
					</tr>
					<tr>
						<td>Hướng dẫn sử dụng</td>
						<td><textarea rows="5" name="HuongDanSD" style="resize: none"><?php echo $row['HuongDanSD'] ?></textarea></td>
					</tr>
					<tr>
					<td colspan="2" >
						<div class="table_td"><input class="add_submit_thoat" type="submit" name="" value="Huỷ">
						<input class="add_submit" type="submit" name="suasp" value="Lưu"></div></td>
				</tr>

				</form>
			<?php
			}
			?>
		</table>
	</div>
</div>