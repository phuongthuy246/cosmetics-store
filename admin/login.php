<?php
	session_start();
	include('config/config.php');
	if (isset($_POST['dangnhap'])){
		$taikhoan = $_POST['username'];
		$matkhau = md5($_POST['password']);
		$sql = "SELECT * FROM Admin WHERE UserName='".$taikhoan."' AND Password='".$matkhau."' LIMIT 1 ";
		$row = mysqli_query($mysqli,$sql);
		$count =mysqli_num_rows($row);
		if ($count>0){
			$_SESSION['dangnhap'] =$taikhoan;
			header("Location:index.php");
		}else{
            // echo '<script language="javascript">';
            // echo 'alert("Username hoặc mật khẩu không đúng, vui lòng nhập lại")';
            // echo '</script>';
			echo '<script>alert("Username hoặc mật khẩu không đúng, vui lòng nhập lại")</script>';
			// header("Location:login.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="../image/icon.png" type="image/x-icon" />
        <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
            rel="stylesheet"
        />
        <title>Đăng nhập</title>
    </head>

    <body style="background-image: url('../image/admin.jpeg');">
        <div class="form" >
            <form class="form-container" action="" autocomplete="off" method="POST" >
                <div class="form-header">
                    <h3 class="form-heading">Đăng nhập</h3>
                </div>
                <div class="form-component">
                    <div class="form-group">
                        <label for=""><i class="fas fa-user"></i></label>
                        <input type="text" class="form-input" name="username" placeholder="Tên đăng nhập" />
                    </div>
                    <div class="form-group">
                        <label for=""><i class="fas fa-lock"></i></label>
                        <input type="password" class="form-input" name="password" placeholder="Mật khẩu" />
                    </div>
                </div>
                <div class="form-submit">
                    <input type="submit" class="btn-sub" name="dangnhap" value="Đăng nhập"/>
                </div>
            </form>
        </div>
    </body>
    <script src="https://kit.fontawesome.com/72a902116d.js" crossorigin="anonymous"></script>
	<!-- <script type="text/javascript" src="https://cdnjs.cloundflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</html>
