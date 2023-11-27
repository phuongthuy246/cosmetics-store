<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

	<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
	<link rel="shortcut icon" href="../../NLN/client/images/Favicon.png" type="image/x-icon" />

	<title>Trang quản lý</title>
</head>


<body>
	<!-- <h3 class="title">Welcome to AdminCP</h3> -->
	<?php
	include("modules/header.php");
	?>
	<div class="wrapper">
		<?php
		include("config/config.php");

		include("modules/menu.php");
		include("modules/main.php");

		?>
	</div>
	<?php
	include("modules/footer.php");
	?>
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->

	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
	<!-- <script>
		CKEDITOR.replace('MoTa_LSP');
		CKEDITOR.replace('MoTa_SP');
	</script> -->
	<!-- <script type="text/javascript">
		$(document).ready(function() {
			thongke();
			var char = new Morris.Bar({

				element: 'chart',

				xkey: 'date',

				ykeys: ['order', 'sales', 'quantity'],

				labels: ['Đơn hàng', 'Doanh thu', 'Số lượng bán', 'Số lượng']
			});
			$('.select-date').change(function() {
				var thoigian = $(this).val();
				if (thoigian == '7ngay') {
					var text = '7 ngày qua';
				} else if (thoigian == '28ngay') {
					var text = '28 ngày qua';
				} else if (thoigian == '90ngay') {
					var text = '90 ngày qua';
				} else {
					var text = '365 ngày qua';
				}

				$.ajax({
					url: "modules/thongke.php",
					method: "POST",
					dataType: "JSON",
					data: {
						thoigian: thoigian
					},
					success: function(data) {
						char.setData(data);
						$('#text-date').text(text);
					}
				});
			})

			function thongke() {
				var text = '365 ngày qua';
				$('#text-date').text(text);
				$.ajax({
					url: "modules/thongke.php",
					method: "POST",
					dataType: "JSON",
					success: function(data) {
						char.setData(data);
						$('#text-date').text(text);
					}
				});
			}
		});
	</script> -->
</body>
<script src="https://kit.fontawesome.com/72a902116d.js" crossorigin="anonymous"></script>
<script src="../admin/js/script.js" type="text/javascript"></script>
</html>