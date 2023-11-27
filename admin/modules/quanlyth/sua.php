<?php
$sql_sua_th = "SELECT * FROM ThuongHieu WHERE MaTH='$_GET[MaTH]' LIMIT 1";
$query_sua_th = mysqli_query($mysqli, $sql_sua_th);
?>
<div class="add_product">
	<p>Sửa loại sản phẩm</p>
	<div class="grid_add_product">
		<table class="table_add_product"  style="border-collapse: collapse">
			<form method="POST" action="modules/quanlyth/xuly.php?MaTH=<?php echo $_GET['MaTH'] ?>" enctype="multipart/form-data">
				<?php
				while ($dong = mysqli_fetch_array($query_sua_th)) {
				?>
					<!-- <tr>
					<td>Mã loại sản phẩm</td>
					<td><input type="text" value="<?php echo $dong['MaLSP'] ?>"name="Ma_LSP"></td>
				</tr> -->
					<tr>
						<td>Tên thương hiệu:</td>
						<td><input type="text" value="<?php echo $dong['TenTH'] ?>" name="TenTH"></td>
					</tr>

					<tr>
						<td>Ảnh thương hiệu:</td>
						<td><input type="file" name="AnhTH">
							<img src="modules/quanlyth/uploads/<?php echo $dong['AnhTH'] ?>" width="150px"></td>
					</tr>
					<tr>
					<td colspan="2" >
						<div class="table_td"><input class="add_submit_thoat" type="submit" name="" value="Huỷ">
						<input class="add_submit" type="submit" name="suath" value="Lưu"></div></td>
				</tr>
				<?php
				}
				?>
			</form>
		</table>
	</div>
</div>