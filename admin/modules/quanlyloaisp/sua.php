<?php
$sql_sua_loaisp = "SELECT * FROM LoaiSP WHERE MaLSP='$_GET[MaLSP]' LIMIT 1";
$query_sua_loaisp = mysqli_query($mysqli, $sql_sua_loaisp);
?>
<div class="add_product">
	<p>Sửa loại sản phẩm</p>
	<div class="grid_add_product">
		<table class="table_add_product"  style="border-collapse: collapse">
			<form method="POST" action="modules/quanlyloaisp/xuly.php?MaLSP=<?php echo $_GET['MaLSP'] ?>">
				<?php
				while ($dong = mysqli_fetch_array($query_sua_loaisp)) {
				?>
					<!-- <tr>
					<td>Mã loại sản phẩm</td>
					<td><input type="text" value="<?php echo $dong['MaLSP'] ?>"name="Ma_LSP"></td>
				</tr> -->
					<tr>
						<td>Tên danh mục:</td>
						<td><input type="text" value="<?php echo $dong['TenLSP'] ?>" name="TenLSP"></td>
					</tr>

					<tr>
						<td>Mô tả danh mục:</td>
						<td><textarea rows="5" name="MoTaLSP" ><?php echo $dong['MoTaLSP'] ?></textarea></td>
					</tr>
					<tr>
					<td colspan="2" >
						<div class="table_td"><input class="add_submit_thoat" type="submit" name="" value="Huỷ">
						<input class="add_submit" type="submit" name="sualoaisp" value="Lưu"></div></td>
				</tr>
				<?php
				}
				?>
			</form>
		</table>
	</div>
</div>